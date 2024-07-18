<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiphyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */


Route::post('register', [RegisterController::class, 'register']);
Route::any('login', [RegisterController::class, 'login'])->name('login');


Route::middleware('auth:api')->group( function () {
    //gestion de busquedas
    Route::get('search-gifs', [GiphyController::class, 'search']);
    Route::get('search-by-id', [GiphyController::class, 'searchById']);

    //gestion de favoritos
    Route::get('favorites', [FavoriteController::class, 'index']);
    Route::post('favorites', [FavoriteController::class, 'store']);
    Route::delete('favorites', [FavoriteController::class, 'destroy']);
});
