<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;

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


Route::get('/', function () {
    return view('website.index');
})->middleware(['auth', 'verified']);
/*
Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('auth');*/



Route::get('/dashboard', [DashboardController::class,'index'])
->middleware(['auth', 'verified'])
->name('dashboard');

Auth::routes();
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users','UserController', ['except' => ['show', 'create', 'store']]);

});


//Route::resource('/admin/users','Admin\UserController', ['except' => ['show', 'create', 'store']]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
