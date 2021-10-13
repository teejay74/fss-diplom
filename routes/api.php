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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test-api', [\App\Http\Controllers\ApiTestController::class, 'test']);


Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/movie-save', [\App\Http\Controllers\MovieController::class, 'store']);
Route::get('/get-movie', [\App\Http\Controllers\MovieController::class, 'index']);
Route::post('/hall-save', [\App\Http\Controllers\HallController::class, 'store']);
Route::get('/get-hall', [\App\Http\Controllers\HallController::class, 'index']);
Route::post('/hall-delete', [\App\Http\Controllers\HallController::class, 'deleteHall']);
Route::post('/get-current-hall', [\App\Http\Controllers\HallController::class, 'getCurrentHall']);
Route::post('/update-hall', [\App\Http\Controllers\HallController::class, 'updateHall']);
Route::post('/update-price', [\App\Http\Controllers\HallController::class, 'updatePrice']);
Route::post('/get-seat', [\App\Http\Controllers\SeatController::class, 'index']);
Route::post('/save-sessions', [\App\Http\Controllers\MovieShowController::class, 'saveSessions']);
Route::post('/get-sessions', [\App\Http\Controllers\MovieShowController::class, 'index']);
Route::post('/get-movie-today', [\App\Http\Controllers\MovieShowController::class, 'showMoviesToday']);
