<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Password, DB};

use App\Models\User;
use App\Http\Requests\Api\Auth\SendResetPasswordLinkRequest;
use App\Http\Resources\User\UserResource;
use Laravel\Passport\Passport;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'avatar' => [],
            'phone' => ['nullable', 'regex:/^\d{2}\s\d{8,9}$/'],
            'gender' => [Rule::in(['M', 'F'])],
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('TESTE')->accessToken;
        $interval = Passport::personalAccessTokensExpireIn();
        $expiresIn = date_create('@0')->add($interval)->getTimestamp();

        return response([
            'user' => new UserResource($user),
            'token_type' => 'Bearer',
            'access_token' => $accessToken,
            'expires_in' => $expiresIn
        ]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('TESTE')->accessToken;
        $interval = Passport::personalAccessTokensExpireIn();
        $expiresIn = date_create('@0')->add($interval)->getTimestamp();

        return response([
            'user' => new UserResource(auth()->user()),
            'token_type' => 'Bearer',
            'access_token' => $accessToken,
            'expires_in' => $expiresIn
        ]);
    }

    /**
     * Realiza logout
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();

        $response = 'Token revogado com sucesso!';
        return response($response, 200);
    }

    /**
     * Envia o link de redefinição de senha para o email do usuário
     *
     * @param SendResetPasswordLinkRequest $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetPasswordLink(SendResetPasswordLinkRequest $request)
    {
        $email = $request->email;

        // Verificando se o usuário já possui um token gerado em menos de 5 minutos.
        $hasRecentToken = DB::table('password_resets')->where('email', $email)
            ->where('created_at', '>=', now()->subMinutes(5)->toDateTimeString())->exists();

        if ($hasRecentToken) {
            abort(400, 'Você solicitou a redefinição de senha recentemente, verifique seu email ou aguarde pelo menos 5 minutos para solicitar novamente.');
        }

        // Se o usuário não acessou antes....
        if (!User::whereEmail($email)->exists()) {
            // TODO Sincronizar os dados do usuário ASPIN na base local
            // Se o usuário não existir na ASPIN, lançar um erro.
        }

        $response = Password::broker()->sendResetLink(
            $request->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            return trans($response);
        } else {
            abort(500, "Erro ao enviar link de redefinição de senha!");
        }
    }
}
