<?php

use App\Http\Controllers\ArticleController;
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

    Route::prefix('articles')->group(function () {
        Route::get('{article}', [ArticleController::class, 'show']);
        Route::put('{article}/like', [ArticleController::class, 'addLike']);
        Route::put('{article}/view', [ArticleController::class, 'addView']);
        Route::post('{article}/comment', [ArticleController::class, 'addComment']);
    });
});
