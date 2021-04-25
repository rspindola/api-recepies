<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

/**
 * @apiDefine CategoryResourceSuccess
 * @apiSuccess {Number} id ID da categoria.
 * @apiSuccess {String} name Nome da categoria.
 * @apiSuccess {String} description Descrição da categoria.
 * @apiSuccess {String} icon URL da imagem do icone da categoria.
 * @apiSuccess {Timestamp} created_at Momento de criação da categoria.
 * @apiSuccess {Timestamp} updated_at Momento de atualização da categoria.
 */

/**
 * @api {get} /categories Listar Categorias
 * @apiDescription Obtém a listagrem de todas as categorias no sistema
 * @apiName ListarCategorias
 * @apiGroup Categoria
 * @apiVersion 0.0.1
 *
 * @apiUse CategoryResourceSuccess
 */
Route::get('/categories', [CategoryController::class, 'index']);

Route::middleware('auth:api')->group(function () {
    /**
     * @api {post} /categories Cadastrar Categoria
     * @apiDescription Cadastra uma nova categoria no sistema
     * @apiName CadastrarCategoria
     * @apiGroup Categoria
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam {String} name Nome da categoria.
     * @apiParam {String} description Descrição da categoria.
     * @apiParam {String} icon URL da imagem do icone da categoria.
     *
     * @apiUse CategoryResourceSuccess
     */
    Route::post('/categories', [CategoryController::class, 'store']);

    /**
     * @api {get} /categories/:category Obter Categoria
     * @apiDescription Obtém a categoria no sistema pelo id
     * @apiName ObterCategoria
     * @apiGroup Categoria
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} category ID da categoria
     *
     * @apiUse CategoryResourceSuccess
     */
    Route::get('/categories/{category}', [CategoryController::class, 'show']);

    /**
     * @api {put} /categories/:category Editar Categoria
     * @apiDescription Edita uma categoria no sistema
     * @apiName EditarCategoria
     * @apiGroup Categoria
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} category ID da categoria
     *
     * @apiParam {String} name Nome da categoria.
     * @apiParam {String} description Descrição da categoria.
     * @apiParam {String} icon URL da imagem do icone da categoria.
     *
     * @apiUse CategoryResourceSuccess
     */
    Route::put('/categories/{category}', [CategoryController::class, 'update']);

    /**
     * @api {delete} /categories/:category Remover Categoria
     * @apiDescription Remove uma categoria do sistema.
     * @apiName RemoverCategoria
     * @apiGroup Categoria
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} category ID da categoria.
     */
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
});
