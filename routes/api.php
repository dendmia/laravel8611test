<?php

use App\Http\Controllers\Blog\Api\CategoryController;
use App\Http\Controllers\Blog\Api\PostController;
use App\Http\Controllers\TestApiController;
use App\Http\Middleware\TestApiMiddleware;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test_get', [TestApiController::class, 'testGet'])->middleware(TestApiMiddleware::class);

Route::get('/post', [PostController::class, 'index']);
Route::post('/post', [PostController::class, 'store']);
Route::put('/post/{id}', [PostController::class, 'update'])->whereNumber('id');

Route::get('/category/{categoryId}', [CategoryController::class, 'get'])->whereNumber('categoryId');
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store']);
