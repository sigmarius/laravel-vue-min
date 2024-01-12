<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::controller(AuthController::class)
    ->group(function () {
        Route::post('/login', 'login')->name('login')->middleware('guest');
        Route::delete('/logout', 'logout')->name('logout')->middleware('auth');
    });

Route::inertia('/login', 'Login', ['title' => 'Login']);

Route::controller(IndexController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/about', 'about')->name('about');
    });

Route::middleware('auth')
    ->group(function () {
        Route::resource('/users', UserController::class);
    });

