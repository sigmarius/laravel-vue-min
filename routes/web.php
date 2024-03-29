<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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

Route::controller(AuthController::class)
    ->group(function () {
        Route::match(['get', 'delete'], '/logout', 'logout')->name('logout')->middleware('auth');

        Route::middleware('guest')->group(function () {
            //      стандартная авторизация
            Route::get('/login', 'showLoginForm')->name('login');
            //      регистрация через Inertia
            //Route::inertia('/login', 'Login', ['title' => 'Login']);

            Route::post('/login', 'login')->name('login');

            Route::get('/forgot_password', 'showForgotPasswordForm')->name('forgot_password');
            Route::post('/forgot_password_process', 'forgotPassword')->name('forgot_password_process');

            Route::get('/register', 'showRegisterForm')->name('register');
            Route::post('/register_process', 'register')->name('register_process');
        });
    });

Route::controller(IndexController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/about', 'about')->name('about');

        Route::get('/contacts', 'showContactForm')->name('contacts');
        Route::post('/contact_form_process', 'contactForm')->name('contact_form_process');
    });

Route::controller(PostController::class)
    ->group(function () {
        Route::get('posts', 'index')->name('posts.index');
        Route::get('posts/{id}', 'show')->name('posts.show');
    });

Route::middleware('auth')
    ->group(function () {
        Route::resource('/users', UserController::class);

        Route::post('posts/comment/{id}', [PostController::class, 'addComment'])->name('comment');
    });

Route::controller(ChatController::class)
    ->group(function () {
        Route::get('/chat', 'index')->name('chat');
        Route::get('/chat/messages', 'messages');
        Route::post('/chat/send', 'send');
    });
