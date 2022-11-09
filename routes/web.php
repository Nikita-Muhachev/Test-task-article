<?php

use App\Http\Controllers\ArticleViewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('', [ArticleViewsController::class, 'main']);

Route::prefix('articles')->group(function () {
    Route::get('', [ArticleViewsController::class, 'articles']);

    Route::prefix('{article}')->group(function () {
        Route::get('', [ArticleViewsController::class, 'article']);
    });
});
