<?php

use App\Http\Controllers\Api\RecipeController;
use Illuminate\Support\Facades\Route;

/**
 * @apiDefine RecipeResourceSuccess
 * @apiSuccess {Number} id ID da receita.
 * @apiSuccess {Object} category Categoria da receita
 * @apiSuccess {String} name Nome da receita.
 * @apiSuccess {String} description Descrição da receita.
 * @apiSuccess {String} image URL da imagem do icone da receita.
 * @apiSuccess {Number} cooking_time Tempo de preparo da receita.
 * @apiSuccess {Number} portion Número de porções da receita.
 * @apiSuccess {Array} preparing Passo a passo do preparo da receita.
 * @apiSuccess {Array} ingredients Listagem com os ingredientes da receita.
 * @apiSuccess {String} note Anotações de dicas sobre a receita.
 * @apiSuccess {String} slug URL do caminho da receita.
 * @apiSuccess {Timestamp} created_at Momento de criação da receita.
 */

/**
 * @api {get} /recipes Listar Receitas
 * @apiDescription Obtém a listagrem de todas as receitas no sistema
 * @apiName ListarReceitas
 * @apiGroup Receita
 * @apiVersion 0.0.1
 *
 * @apiUse RecipeResourceSuccess
 */
Route::get('/recipes', [RecipeController::class, 'index']);

/**
 * @api {get} /recipes/category/:category Listar Receitas por Categoria
 * @apiDescription Obtém a listagrem de todas as receitas de determinada categoria
 * @apiName ListarReceitasByCategory
 * @apiGroup Receita
 * @apiVersion 0.0.1
 *
 * @apiUse RecipeResourceSuccess
 */
Route::get('/recipes/category/{category}', [RecipeController::class, 'findByCategory']);

/**
 * @api {get} /recipes/slug/:slug Obter Receita (Slug)
 * @apiDescription Obtém a receita no sistema pelo slug
 * @apiName ObterReceita
 * @apiGroup Receita
 * @apiVersion 0.0.1
 *
 * @apiParam (URL) {Number} recipe ID da receita
 *
 * @apiUse RecipeResourceSuccess
 */
Route::get('/recipes/slug/{slug}', [RecipeController::class, 'findBySlug']);

/**
 * @api {get} /recipes/id/:id Obter Receita (Id)
 * @apiDescription Obtém a receita no sistema pelo id
 * @apiName ObterReceitaById
 * @apiGroup Receita
 * @apiVersion 0.0.1
 *
 * @apiParam (URL) {Number} recipe ID da receita
 *
 * @apiUse RecipeResourceSuccess
 */
Route::get('/recipes/id/{recipe}', [RecipeController::class, 'findById']);

Route::middleware('auth:api')->group(function () {
    /**
     * @api {post} /recipes Cadastrar Receita
     * @apiDescription Cadastra uma nova receita no sistema
     * @apiName CadastrarReceita
     * @apiGroup Receita
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam {Number} category_id ID da categoria relacionada a receita.
     * @apiParam {String} name Nome da receita.
     * @apiParam {String} description Descrição da receita.
     * @apiParam {File} image URL da imagem de destaque da receita.
     * @apiParam {Array} ingredients Listagem com os ingredientes da receita.
     * @apiParam {String} image URL da imagem de destaque da receita.
     *
     *
     * @apiUse RecipeResourceSuccess
     */
    Route::post('/recipes', [RecipeController::class, 'store']);

    /**
     * @api {put} /recipes/:recipe Editar Receita
     * @apiDescription Edita uma receita no sistema
     * @apiName EditarReceita
     * @apiGroup Receita
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} recipe ID da receita
     *
     * @apiParam {String} name Nome da receita.
     * @apiParam {String} description Descrição da receita.
     * @apiParam {File} image URL da imagem de destaque da receita.
     * @apiParam {Array} ingredients Listagem com os ingredientes da receita.
     *
     * @apiUse CategoryResourceSuccess
     */
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update']);

    /**
     * @api {delete} /recipes/:recipe Remover Receita
     * @apiDescription Remove uma receita do sistema.
     * @apiName RemoverReceita
     * @apiGroup Receita
     * @apiVersion 0.0.1
     *
     * @apiUse ApiAccessToken
     *
     * @apiParam (URL) {Number} recipe ID da receita.
     */
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy']);
});
