<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FilmContorller;
use App\Http\Controllers\API\GenerController;
use App\Http\Controllers\Admin\UserController;

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





Route::controller(API\AuthController::class)->group(function(){
    Route::post('register', 'register')->name('api.register');
    Route::post('login', 'login')->name('api.login');
});

Route::middleware('auth:api')->group(function(){
    Route::get('/film','API\FilmController@index')->name('api.films');
    Route::post('/film/store','API\FilmController@store')->name('api.films.store');
    Route::get('/geners','API\AuthController@register')->name('api.geners');
});
