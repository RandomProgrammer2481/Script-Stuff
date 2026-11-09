<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/tickets', [TicketController::class, 'index'])->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/auth/me', [AuthController::class, 'me']);

Route::post('/forgot-password', [UserController::class, 'requestPasswordResetLink'])->middleware('guest')->name('password.forgot');

Route::post('/reset-password', [UserController::class, 'resetPassword'] )->middleware('guest')->name('password.reset');