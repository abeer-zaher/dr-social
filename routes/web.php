<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WebsiteController;

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
/*
Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified']);*/


Route::get('/',[WebsiteController::class,'index'])->middleware(['auth', 'verified'])
->name('auth');
                     


//Route dashboard
Route::get('/dashboard', [DashboardController::class,'index'])
->middleware(['auth', 'verified'])
->name('dashboard');




//Route roles
Auth::routes();
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users','UserController', ['except' => ['show', 'create', 'store']]);

});

  
//Route film
Route::get('/film','FilmController@index')->name('films');

Route::get('/film/create','FilmController@create')->name('films.create');

Route::post('/film/store','FilmController@store')->name('films.store');

Route::get('/film/destroy/{id}','FilmController@destroy')->name('films.destroy');

//Rout gener

Route::get('/gener','GenerController@index')->name('geners');

Route::get('/gener/create','GenerController@create')->name('geners.create');

Route::post('/gener/store','GenerController@store')->name('geners.store');

Route::get('/gener/destroy/{id}','GenerController@destroy')->name('geners.destroy');


 
//Route home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
