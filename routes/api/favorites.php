<?php

use App\Http\Controllers\Api\FavoriteController;
use Illuminate\Support\Facades\Route;

/**
 * @apiDefine FavoriteResourceSuccess
 * @apiSuccess {Number} id ID da receita.
 * @apiSuccess {Object[]} category Categoria da receita
 * @apiSuccess {String} name Nome da receita.
 * @apiSuccess {String} description Descrição da receita.
 * @apiSuccess {String} image URL da imagem do icone da receita.
 * @apiSuccess {String} slug URL do caminho da receita.
 * @apiSuccess {Array} ingredients Listagem com os ingredientes da receita.
 * @apiSuccess {Timestamp} created_at Momento de criação da receita.
 */

Route::middleware('auth:api')->group(function () {
    /**
     * @api {post} /favorites Listar Favoritos
     * @apiDescription Obtém a listagrem das receitas favoritas do usuário
     * @apiName ListarFavoritos
     * @apiGroup Favoritos
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiUse FavoriteResourceSuccess
     */
    Route::get('/favorites', [FavoriteController::class, 'index']);

    /**
     * @api {post} /favorites/save Cadastrar Favorito
     * @apiDescription Cadastra uma receita como favorita do usuário
     * @apiName CadastrarFavorito
     * @apiGroup Favoritos
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam {Number} recipe_id ID da receita favoritada.
     */
    Route::post('/favorites/save', [FavoriteController::class, 'store']);

    /**
     * @api {delete} /favorites/remove Remover Favorito
     * @apiDescription Remove uma receita do sistema.
     * @apiName RemoverFavorito
     * @apiGroup Favoritos
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam {Number} recipe_id ID da receita favoritada.
     */
    Route::post('/favorites/remove', [FavoriteController::class, 'destroy']);
});
