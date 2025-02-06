<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

Route::post('/users/login', [UserController::class, 'authenticate']);

Route::get('/register', [UserController::class, 'register'])->middleware('guest')->name('register');

Route::post('/users/register', [UserController::class, 'store']);

Route::post('/users/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login/{provider}', [RegisterController::class, 'providerRedirect']);

Route::get('/login/{provider}/callback', [RegisterController::class, 'providerCallback']);

Route::get('/forgot-password', [UserController::class, 'forgotPassword']);

Route::get('/card/create', [CardController::class, 'create'])->middleware('auth');

Route::post('/card/create', [CardController::class, 'store'])->middleware('auth');

Route::get('/card/show/{card}', [CardController::class, 'show'])->middleware('auth')->name('card.show');

Route::delete('card/delete/{card}', [CardController::class, 'delete'])->middleware('auth');

Route::get('/card/edit/{card}', [CardController::class, 'edit'])->middleware('auth');

Route::put('/card/edit/{card}', [CardController::class, 'update'])->middleware('auth');

Route::get('/settings', [UserController::class, 'settings'])->middleware('auth');
