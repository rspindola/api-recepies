<?php

use App\Http\Controllers\Api\AccessTokenController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

/**
 * @api {post} /oauth/token Obter Token
 * @apiDescription Obtém o token de acesso (access_token)
 * @apiName OauthToken
 * @apiGroup Auth
 * @apiVersion 0.0.1
 *
 * @apiParam {String} grant_type Tipo de autorizaçao (`client_credentials` para aplicações e `password` para usuários).
 * @apiParam {Number} client_id ID do cliente
 * @apiParam {String} client_secret Chave de segurança do cliente
 * @apiParam {String} [username] Email do usuário
 * @apiParam {String} [password] Senha do usuário
 * @apiParam {String} [scope] Escopos da API (separados por espaço)
 *
 * @apiSuccess {String} token_type Tipo de token
 * @apiSuccess {String} expires_in Tempo de vida do token (em segundos)
 * @apiSuccess {String} access_token Token de acesso
 */
Route::post('oauth/token', [AccessTokenController::class, 'issueToken']);

Route::post('/login', [AuthController::class, 'login']);

/**
 * @api {post} /register Cadastrar Usuário
 * @apiDescription Cadastra um novo usuário
 * @apiName CadastrarUsuario
 * @apiGroup Auth
 * @apiVersion 0.0.1
 *
 * @apiUse ApiAccessToken
 *
 * @apiPermission users.create
 *
 * @apiParam {String} name Nome do usuário.
 * @apiParam {String} email Email do usuário.
 * @apiParam {String} password Senha do usuário.
 * @apiParam {String} [gender] Sexo do usuário. (M, F)
 * @apiParam {String} [avatar] Avatar do usuário.
 * @apiParam {String} [phone] Celular do usuário.
 *
 * @apiSuccess {String} name Nome do usuário.
 * @apiSuccess {String} gender Sexo do usuário. (M, F)
 * @apiSuccess {String} email Email do usuário.
 * @apiSuccess {String} avatar Avatar do usuário.
 * @apiSuccess {String} phone Celular do usuário.
 * @apiSuccess {String} origin Origem do registro do usuário.
 * @apiSuccess {String} status Status do usuário.
 * @apiSuccess {String} horoscope Horóscopo do usuário. (Signo em minúsculo e sem acentuação, exemplo: leao)
 * @apiSuccess {String} team Nome do time do usuário. (flamengo, fluminense, botafogo, vasco)
 * @apiSuccess {Timestamp} created_at Momento de criação do usuário.
 * @apiSuccess {Object} auth Informações de autenticação.
 * @apiSuccess {String} auth.access_token Token de acesso
 * @apiSuccess {String} auth.token_type Tipo do token
 * @apiSuccess {Number} auth.expires_in Tempo de validade do token
 */
Route::post('/register', [AuthController::class, 'register']);

/**
 * @api {post} /forgot-password Esqueci Senha
 * @apiDescription Envia o link de redefinição de senha para o email do usuário
 * @apiName EsqueciSenha
 * @apiGroup Auth
 * @apiVersion 0.0.1
 *
 * @apiParam {String} email Email do usuário
 *
 * @apiSuccess {String} status Status da operação
 */
Route::post('/forgot-password', [AuthController::class, 'sendResetPasswordLink']);

Route::middleware('auth:api')->group(function () {

    /**
     * @api {get} /logout Revogar Token
     * @apiDescription Revoga o token de acesso do usuário
     * @apiName Logout
     * @apiGroup Auth
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiSuccess {String} response Mensagem de sucesso
     */
    Route::get('/logout', [AuthController::class, 'logout']);
});
