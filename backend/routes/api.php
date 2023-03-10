<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\LocaleController;

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

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
});
Route::get('locales', LocaleController::class);
Route::get('image/{folder}/{file}', ImageController::class);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('business', BusinessController::class)->except('store');
    Route::prefix('auth')->group(function () {
        Route::get('logout', [LoginController::class, 'logout']);
    });
});
