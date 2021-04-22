<?php

namespace App\Http\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;
use App\Notifications\PasswordChangedNotification;

class UserService
{

    /**
     * Realiza o login com o usuário
     *
     * @param string $email
     * @param string $password
     * @param boolean $onlyToken
     * @return User $user | array $tokenData
     */
    public function login($email, $password, $onlyToken = false)
    {
        // TODO Sincronizar usuário da ASPIN

        $user = User::findByEmail($email);

        if (!$user) {
            abort(400, 'Usuário ou senha inválido!');
        }

        if (Hash::check($password, $user->password)) {
            if ($onlyToken) {
                return $this->generateToken($user);
            } else {
                return $user;
            }
        } else {
            abort(400, 'Usuário ou senha inválido!');
        }
    }

    /**
     * Altera a senha do usuário
     *
     * @param User $user
     * @param string $oldPassword
     * @param string $newPassword
     * @return boolean
     */
    public function changePassword(User $user, $oldPassword, $newPassword)
    {
        if (Hash::check($oldPassword, $user->password)) {
            // TODO Trocar senha do usuário na ASPIN.

            $user->password = bcrypt($newPassword);
            $user->save();
            $user->notify(new PasswordChangedNotification());

            return true;
        } else {
            return false;
        }
    }

    /**
     * Gera o token do usuário
     *
     * @param User $user
     * @param string $tokenName
     * @return array
     */
    public function generateToken(User $user, $tokenName = 'Laravel Password Grant Client')
    {
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $interval = Passport::personalAccessTokensExpireIn();
        $expiresIn = date_create('@0')->add($interval)->getTimestamp();

        return [
            'token_type' => 'Bearer',
            'access_token' => $token,
            'expires_in' => $expiresIn
        ];
    }
}
