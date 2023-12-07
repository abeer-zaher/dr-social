<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Film\FilmController;
use App\Http\Controllers\Gener\GenerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Website\WebsiteController;


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


Route::get('/',[WebsiteController::class,'index'])
->middleware(['auth', 'verified'])
->name('auth');



//Route dashboard


Route::get('/dashboard',[DashboardController::class,'index'])
->middleware(['auth','verified'])
->name('dashboard');



//Route roles
Auth::routes();

Route::get('/ajaxupload', [RegisterController::class,'upload']);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users','UserController', ['except' => ['show', 'create', 'store']]);

});


//Route film
Route::controller(FilmController::class)->group(function(){
    Route::get('/film','index')->name('films');
    Route::get('/film/create', 'create')->name('films.create');
    Route::post('/film/store', 'store')->name('films.store');
    Route::get('/film/destroy/{id}', 'destroy')->name('films.destroy');

});

//Rout gener

Route::controller(GenerController::class)->group(function(){
    Route::get('/gener', 'index')->name('geners');
    Route::get('/gener/create','create')->name('geners.create');
    Route::post('/gener/store', 'store')->name('geners.store');
    Route::post('/gener/destroy/{id}','destroy')->name('geners.destroy');

});


//Route home
Route::get('/home', [HomeController::class, 'index'])->name('home');
