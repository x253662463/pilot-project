<?php

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

Route::post('/user/login', [\App\Http\Controllers\Api\UserController::class, 'login']);

Route::group(['path' => '/','middleware' => 'api'], function () {
    Route::get('/user', [\App\Http\Controllers\Api\UserController::class, 'index']);
    Route::delete('/user/{id}', [\App\Http\Controllers\Api\UserController::class, 'destroy']);
});
