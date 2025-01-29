<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->middleware('auth');

Route::get('/login', [VerificationController::class, 'login'])->middleware('guest')->name('login');

Route::post('/users/login', [VerificationController::class, 'authenticate']);

Route::get('/register', [VerificationController::class, 'register'])->middleware('guest')->name('register');

Route::post('/users/register', [VerificationController::class, 'store']);

Route::post('/users/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login/{provider}', [RegisterController::class, 'providerRedirect']);

Route::get('/login/{provider}/callback', [RegisterController::class, 'providerCallback']);

Route::get('/forgot-password', [UserController::class, 'forgotPassword']);

Route::get('/card/create', [CardController::class, 'create']);

Route::post('/card/create', [CardController::class, 'store']);

Route::get('/card/show/{card}', [CardController::class, 'show']);

Route::delete('card/delete/{card}', [CardController::class, 'delete']);

Route::get('/card/edit/{card}', [CardController::class, 'edit']);

Route::put('/card/edit/{card}', [CardController::class, 'update']);
