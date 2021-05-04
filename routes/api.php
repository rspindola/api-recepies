<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * @apiDefine ApiAccessToken
 * @apiHeader {String} Authorization Token gerado (access_token)
 */

/*
|--------------------------------------------------------------------------
| Rotas de autenticação
|--------------------------------------------------------------------------
|
| POST /oauth/token
| POST /forgot-password
| GET  /logout
|
*/

Route::name('auth')->group(base_path('routes/api/auth.php'));

/*
|--------------------------------------------------------------------------
| Rotas do Usuário
|--------------------------------------------------------------------------
|
| GET /users/:user
|
*/
Route::name('users')->group(base_path('routes/api/users.php'));

/*
|--------------------------------------------------------------------------
| Rotas de Categorias
|--------------------------------------------------------------------------
|
| GET /categories
| POST /categories
| PUT /categories/:category
| GET /categories/:category
| DELETe /categories/:category
|
*/
Route::name('categories')->group(base_path('routes/api/categories.php'));

/*
|--------------------------------------------------------------------------
| Rotas de Receitas
|--------------------------------------------------------------------------
|
| GET /recipes
| POST /recipes
| PUT /recipes/:recipe
| GET /recipes/:recipe
| DELETe /recipes/:recipe
|
*/
Route::name('recipes')->group(base_path('routes/api/recipes.php'));

/*
|--------------------------------------------------------------------------
| Rotas de Favoritos
|--------------------------------------------------------------------------
|
| GET /favorites
| POST /favorites/save
| DELETE /favorites/remove
|
*/
Route::name('favorites')->group(base_path('routes/api/favorites.php'));

/*
|--------------------------------------------------------------------------
| Rotas de Cards
|--------------------------------------------------------------------------
|
| GET /cards
| POST /cards
| PUT /cards/:card
| GET /cards/:card
| DELETe /cards/:card
|
*/
Route::name('cards')->group(base_path('routes/api/cards.php'));
