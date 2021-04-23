<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\User\{ChangePasswordRequest, UserRequest, CheckEmailRequest};
use App\Http\Resources\User\UserResource;
use App\Http\Services\User\UserService;


class UserController extends Controller
{

    /**
     * Login - v1
     *
     * @param LoginRequest $request
     * @return array
     */
    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        $userService = new UserService();
        $response = $userService->login($email, $password, true);

        $response['status'] = 200;
        return $response;
    }

    /**
     * Obtém as informações do usuário autenticado.
     *
     * @param Request $request
     * @return UserResource $user
     */
    public function getMe(Request $request)
    {
        return new UserResource($request->user());
    }

    /**
     * Altera a senha do usuário autenticado.
     *
     * @param ChangePasswordRequest $request
     * @return string
     */
    public function changePasswordMe(ChangePasswordRequest $request)
    {
        $user = $request->user();
        $userService = new UserService();
        $result = $userService->changePassword($user, $request->old_password, $request->new_password);

        if ($result) {
            return 'Senha alterada com sucesso!';
        } else {
            abort(400, 'Não foi possível alterar a senha!');
        }
    }

    /**
     * Edita o usuário autenticado.
     *
     * @param UserRequest $request
     * @return UserResource $user
     */
    public function editMe(UserRequest $request)
    {
        $user = $request->user();

        $data = $request->only('name', 'avatar', 'phone', 'gender');

        $user->update($data);
        $user->refresh();

        return new UserResource($user);
    }

    /**
     * Verifica se o email já tá cadastrado na base local ou no CRM.
     *
     * @param CheckEmailRequest $request
     * @return boolean
     */
    public function checkEmail(CheckEmailRequest $request)
    {
        // TODO Verificar se o usuário está registrado na ASPIN, se não, verificar se está registrado na API

        $response = (bool)User::findByEmail($request->input('email', '')) ? 1 : 0;
        return $response;
    }

    /**
     * Verifica se o email já tá cadastrado na base local ou no CRM.
     *
     * @param UserRequest $request
     * @return User $user
     */
    public function create(UserRequest $request)
    {
        $data = $request->only('name', 'email', 'password', 'gender', 'avatar', 'phone');

        // TODO Verificar se o email já está registrado no CRM

        $data['password'] = bcrypt($data['password']);
        $data['origin'] = 'API';
        $data['status'] = 'X';

        $user = User::create($data);

        $userService = new UserService();
        $user->auth = $userService->generateToken($user);

        return $user;
    }

    // TODO subscribeMe
}
