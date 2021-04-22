<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/**
 * @apiDefine UserResourceSuccess
 * @apiSuccess {Number} id ID do usuário.
 * @apiSuccess {String} name Nome do usuário.
 * @apiSuccess {String} email Email do usuário.
 * @apiSuccess {String} gender Gênero do usuário.
 * @apiSuccess {String} avatar URL do avatar do usuário.
 * @apiSuccess {String} phone Telefone do usuário.
 * @apiSuccess {String} origin Origem da criação do usuário.
 * @apiSuccess {String} status Situação do usuário.
 * @apiSuccess {String} horoscope Horóscopo do usuário.
 * @apiSuccess {String} team Time do usuário.
 * @apiSuccess {Timestamp} created_at Momento de criação do usuário.
 */

Route::middleware('auth:api')->group(function () {

    /**
     * @api {get} /users/:user Obter Usuário
     * @apiDescription Obtém as informações do usuário
     * @apiName ObterUsuario
     * @apiGroup Usuário
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number|String} user ID do usuário ou use `me` para utilizar o usuário autenticado
     *
     * @apiUse UserResourceSuccess
     */
    Route::get('/users/me', [UserController::class, 'getMe']);

    /**
     * @api {get} /users/:user/products Obter Produtos
     * @apiDescription Obtém os produtos do usuário
     * @apiName ObterProdutos
     * @apiGroup Usuário
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} user ID do usuário ou use `me` para utilizar o usuário autenticado
     *
     * @apiSuccess {Number} id ID da relação entre usuário e produto.
     * @apiSuccess {Number} user_id ID do usuário.
     * @apiSuccess {Number} product_id ID do produto.
     * @apiSuccess {String} crm_subscriber_id Código da assinatura no CRM.
     * @apiSuccess {String} status Status da assinatura no CRM.
     * @apiSuccess {Timestamp} expires_at Data de expiração da assinatura.
     * @apiSuccess {Object} product Produto.
     * @apiSuccess {Number} product.id ID do produto.
     * @apiSuccess {String} product.crm_code Código do plano no CRM.
     * @apiSuccess {String} product.name Nome do produto.
     * @apiSuccess {String} product.description Descrição do produto.
     * @apiSuccess {Number} product.value Valor do produto.
     * @apiSuccess {Object} address Endereço.
     * @apiSuccess {Number} address.id ID do endereço.
     * @apiSuccess {String} address.neighborhood Bairro do endereço.
     * @apiSuccess {String} address.zip_code CEP do endereço.
     * @apiSuccess {String} address.city Cidade do endereço.
     * @apiSuccess {String} address.complement Complemento do endereço.
     * @apiSuccess {String} address.state Estado do endereço.
     * @apiSuccess {String} address.street Logradouro do endereço.
     * @apiSuccess {String} address.number Número do endereço.
     * @apiSuccess {Timestamp} address.created_at Momento de criação do endereço.
     */
    Route::get('/users/me/products', [UserController::class, 'getProductsMe']);

    /**
     * @api {put} /users/:user/change-password Alterar Senha
     * @apiDescription Altera a senha do usuário
     * @apiName AlterarSenhaUsuario
     * @apiGroup Usuário
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} user ID do usuário ou use `me` para utilizar o usuário autenticado
     *
     * @apiParam {String} old_password Senha Antiga
     * @apiParam {String} new_password Nova Senha
     *
     * @apiSuccess {String} status Situação da atualização
     */
    Route::put('/users/me/change-password', [UserController::class, 'changePasswordMe']);

    /**
     * @api {put} /users/:user Editar Usuário
     * @apiDescription Edita um usuário
     * @apiName EditarUsuario
     * @apiGroup Usuário
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} user ID do usuário ou use `me` para utilizar o usuário autenticado
     *
     * @apiParam {String} [name] Nome do usuário.
     * @apiParam {String} [avatar] Avatar do usuário.
     * @apiParam {String} [phone] Celular do usuário.
     * @apiParam {String} [gender] Sexo do usuário. (M, F)
     * @apiParam {String} [horoscope] Horóscopo do usuário. (Signo em minúsculo e sem acentuação, exemplo: leao)
     * @apiParam {String} [team] Nome do time do usuário. (flamengo, fluminense, botafogo, vasco)
     *
     * @apiUse UserResourceSuccess
     */
    Route::put('/users/me', [UserController::class, 'editMe']);

    /**
     * @api {post} /users/:user/subscribe Cadastrar Assinatura
     * @apiDescription Cadastra uma nova assinatura para o usuário
     * @apiName CadastrarAssinatura
     * @apiGroup Usuário
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} user ID do usuário ou use `me` para utilizar o usuário autenticado
     *
     * @apiParam {String} zip_code CEP do assinante.
     * @apiParam {String} plan Código do plano contratado.
     * @apiParam {Number} card_number Número do cartão.
     * @apiParam {String} card_expires Validade do cartão. (MMAA)
     * @apiParam {Number} card_cvv CVV do cartão.
     * @apiParam {String} [password] Senha do usuário.
     * @apiParam {String} [seller_email] Email do vendedor. (para a comissão)
     * @apiParam {String} [phone] Telefone do usuário. (Formato: 21 000000000)
     * @apiParam {String} [number] Número do endereço do usuário.
     * @apiParam {String} [complement] Complemento do endereço do usuário.
     * @apiParam {String} [newspaper_place] Local de entrega do impresso.
     * @apiParam {String} [crm] Registro médico. (obrigatório caso plano escolhido seja: ODIADIG10)
     *
     * @apiSuccess {Number} codigo_assinante Código do assinante
     * @apiSuccess {Number} codigo_contrato Código do contrato
     */
    Route::post('/users/me/subscribe', [UserController::class, 'subscribeMe']);
});

// APIs de aplicações (Machine-to-machine)

/**
 * @api {get} /users/status Obter Status
 * @apiDescription Obtém o status do usuário
 * @apiName ObterStatusUsuario
 * @apiGroup Usuário
 * @apiVersion 0.0.1
 *
 * @apiUse ApiAccessToken
 *
 * @apiPermission users.get-status
 *
 * @apiParam {String} email Email do usuário
 * @apiParam {String} plan Plano do usuário
 *
 * @apiSuccess {String} status Status do usuário (A = ativo)
 */
Route::get('/users/status', [UserController::class, 'getStatusByEmail'])->middleware('client:users.get-status');

/**
 * @api {get} /users/email/check Verificar Email
 * @apiDescription Verifica se o email já está registrado no CRM ou na base da API.
 * @apiName VerificarEmailUsuario
 * @apiGroup Usuário
 * @apiVersion 0.0.1
 *
 * @apiUse ApiAccessToken
 *
 * @apiPermission users.get-status
 *
 * @apiParam {String} email Email do usuário
 *
 * @apiSuccess {Boolean} exists Retorna 1 caso o usuário já esteja cadastrado e 0 caso não.
 */
Route::get('/users/email/check', [UserController::class, 'checkEmail'])->middleware('client:users.get-status');

/**
 * @api {post} /users Cadastrar Usuário
 * @apiDescription Cadastra um novo usuário
 * @apiName CadastrarUsuario
 * @apiGroup Usuário
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
 * @apiParam {String} [horoscope] Horóscopo do usuário. (Signo em minúsculo e sem acentuação, exemplo: leao)
 * @apiParam {String} [team] Nome do time do usuário. (flamengo, fluminense, botafogo, vasco)
 *
 * @apiSuccess {String} name Nome do usuário.
 * @apiSuccess {String} gender Sexo do usuário. (M, F)
 * @apiSuccess {String} email Email do usuário.
 * @apiSuccess {String} avatar Avatar do usuário.
 * @apiSuccess {String} phone Celular do usuário.
 * @apiSuccess {String} origin Origem do registro do usuário.
 * @apiSuccess {String} status Status do usuário.
 * @apiSuccess {Timestamp} created_at Momento de criação do usuário.
 * @apiSuccess {Object} auth Informações de autenticação.
 * @apiSuccess {String} auth.access_token Token de acesso
 * @apiSuccess {String} auth.token_type Tipo do token
 * @apiSuccess {Number} auth.expires_in Tempo de validade do token
 */
Route::post('/users', [UserController::class, 'create']);
