<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->middleware('auth');

Route::get('/login', [AuthenticationController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/login', [AuthenticationController::class, 'authenticate']);

Route::get('/register', [AuthenticationController::class, 'register'])->name('register')->middleware('guest');

Route::post('/users/register', [AuthenticationController::class, 'store']);

Route::post('/users/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/login/{provider}', [AuthenticationController::class, 'providerRedirect']);

Route::get('/login/{provider}/callback', [AuthenticationController::class, 'providerCallback']);

Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('forgot-password');
