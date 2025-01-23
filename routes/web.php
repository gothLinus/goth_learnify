<?php

use App\Http\Controllers\CreatecardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->middleware('auth');

Route::get('/login', [RegisterController::class, 'login'])->middleware('guest');

Route::post('/users/login', [RegisterController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');

Route::post('/users/register', [RegisterController::class, 'store']);

Route::post('/users/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login/{provider}', [RegisterController::class, 'providerRedirect']);

Route::get('/login/{provider}/callback', [RegisterController::class, 'providerCallback']);

Route::get('/forgot-password', [UserController::class, 'forgotPassword']);

Route::get('/create/card', [CreateCardController::class, 'create']);

Route::post('/create/card', [CreateCardController::class, 'store']);
