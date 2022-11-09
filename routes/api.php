<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleViewsController;
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

Route::prefix('articles')->group(function () {
    Route::get('', [ArticleController::class, 'index']);

    Route::prefix('{article}')->group(function () {
        Route::get('', [ArticleController::class, 'show']);
        Route::put('like', [ArticleController::class, 'addLike']);
        Route::put('view', [ArticleController::class, 'addView']);
        Route::post('comment', [ArticleViewsController::class, 'addComment']);
    });
});
