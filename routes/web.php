<?php

use App\Http\Controllers\CreatecardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

Route::post('/users/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register');

Route::post('/users/register', [RegisterController::class, 'store']);

Route::post('/users/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login/{provider}', [RegisterController::class, 'providerRedirect']);

Route::get('/login/{provider}/callback', [RegisterController::class, 'providerCallback']);

Route::get('/forgot-password', [UserController::class, 'forgotPassword']);

Route::get('/card/create', [CreateCardController::class, 'create']);

Route::post('/card/create', [CreateCardController::class, 'store']);
