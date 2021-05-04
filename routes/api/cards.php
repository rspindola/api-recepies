<?php

use App\Http\Controllers\Api\CardController;
use Illuminate\Support\Facades\Route;

/**
 * @apiDefine CardResourceSuccess
 * @apiSuccess {Number} id ID do card.
 * @apiSuccess {String} title Nome do card.
 * @apiSuccess {String} description Descrição do card.
 * @apiSuccess {String} color Cor do card em valor hexadecimal.
 * @apiSuccess {Timestamp} created_at Momento de criação do card.
 */

Route::middleware('auth:api')->group(function () {
    /**
     * @api {get} /cards Listar Cards
     * @apiDescription Obtém a listagem de todos os cards do usuario
     * @apiName ListarCards
     * @apiGroup Card
     * @apiVersion 0.0.1
     *
     * @apiUse CardResourceSuccess
     */
    Route::get('/cards', [CardController::class, 'index']);

    /**
     * @api {post} /cards Cadastrar Card
     * @apiDescription Cadastra um novo card no sistema
     * @apiName CadastrarCard
     * @apiGroup Card
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam {String} title Titulo do card.
     * @apiParam {String} description Descrição do card.
     * @apiParam {String} color Cor do card em valor hexadecimal.
     *
     * @apiUse CardResourceSuccess
     */
    Route::post('/cards', [CardController::class, 'store']);

    /**
     * @api {get} /cards/:card Obter Card
     * @apiDescription Obtém o card no sistema pelo id
     * @apiName ObterCard
     * @apiGroup Card
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} card ID do card
     *
     * @apiUse CardResourceSuccess
     */
    Route::get('/cards/{card}', [CardController::class, 'show']);

    /**
     * @api {put} /cards/:card Editar Card
     * @apiDescription Edita um card no sistema
     * @apiName EditarCard
     * @apiGroup Card
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} card ID do card
     * @apiParam {String} title Titulo do card.
     * @apiParam {String} description Descrição do card.
     * @apiParam {String} color Cor do card em valor hexadecimal.
     *
     * @apiUse CardResourceSuccess
     */
    Route::put('/cards/{card}', [CardController::class, 'update']);

    /**
     * @api {delete} /cards/:card Remover Card
     * @apiDescription Remove um card do sistema.
     * @apiName RemoverCard
     * @apiGroup Card
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} card ID do card.
     */
    Route::delete('/cards/{card}', [CardController::class, 'destroy']);
});
