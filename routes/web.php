<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/',  [IndexController::class, 'index'])->middleware('auth');

Route::get('/login', [AuthenticationController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/login', [AuthenticationController::class, 'authenticate']);

Route::get('/register', [AuthenticationController::class, 'register'])->name('register')->middleware('guest');

Route::post('/users/register', [AuthenticationController::class, 'store']);
