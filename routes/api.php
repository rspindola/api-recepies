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
|
*/
Route::name('categories')->group(base_path('routes/api/categories.php'));

/*
|--------------------------------------------------------------------------
| Rotas de Receitas
|--------------------------------------------------------------------------
|
| GET /recipes
|
*/
Route::name('recipes')->group(base_path('routes/api/recipes.php'));
