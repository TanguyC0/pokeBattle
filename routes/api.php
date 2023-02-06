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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('web')->group(function () {
    Route::get('/user', [App\Http\Controllers\ProfileController::class, 'jauge']);
    Route::post('/favorite', [App\Http\Controllers\ProfileController::class, 'setFavorite']);
    Route::post('/updateTeam', [App\Http\Controllers\TeamController::class, 'switchPokemon']);
    Route::get('/bag', [App\Http\Controllers\BagController::class, 'index']);
    Route::get('/box', [App\Http\Controllers\BoxController::class, 'index']);
});