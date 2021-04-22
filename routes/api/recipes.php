<?php

use App\Http\Controllers\Api\RecipeController;
use Illuminate\Support\Facades\Route;

/**
 * @apiDefine RecipeResourceSuccess
 * @apiSuccess {Number} id ID da receita.
 * @apiSuccess {String} name Nome da receita.
 * @apiSuccess {String} description Descrição da receita.
 * @apiSuccess {String} icon URL da imagem do icone da receita.
 * @apiSuccess {Timestamp} created_at Momento de criação da receita.
 */

Route::middleware('auth:api')->group(function () {
    Route::get('/recipes', [RecipeController::class, 'index']);
    Route::post('/recipes', [RecipeController::class, 'store']);
    Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update']);
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy']);
});
