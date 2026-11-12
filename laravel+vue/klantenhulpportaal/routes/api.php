<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index']);

    Route::post('/tickets', [TicketController::class, 'store']);

    Route::get('/tickets/{ticket}', [TicketController::class, 'show']);

    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/categories', [CategoryController::class, 'index']);

    Route::get('/reactions', [ReactionController::class, 'index']);
});

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::post('/forgot-password', [UserController::class, 'requestPasswordResetLink'])->name('password.forgot');

    Route::post('/reset-password', [UserController::class, 'resetPassword'] )->name('password.reset');
});

Route::get('/auth/me', [AuthController::class, 'me']);


