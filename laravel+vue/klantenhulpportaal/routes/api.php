<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index']);

    Route::post('/tickets', [TicketController::class, 'store']);

    Route::get('/tickets/{ticket}', [TicketController::class, 'show']);

    Route::patch('/tickets/{ticket}/assign', [TicketController::class, 'assign']);

    Route::patch('/tickets/{ticket}/updateStatus', [TicketController::class, 'updateStatus']);

    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);

    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/categories', [CategoryController::class, 'index']);

    Route::post('/categories', [CategoryController::class, 'store']);

    Route::put('/categories/{category}', [CategoryController::class, 'update']);

    Route::delete('/categories/{category}', [CategoryController::class, 'delete']);
    
    Route::get('/statuses', [StatusController::class, 'index']);

    Route::get('/reactions/{ticket_id?}', [ReactionController::class, 'index']);

    Route::get('/users', [UserController::class, 'index']);

    Route::get('/users/admins', [UserController::class, 'getAdmins']);
});

Route::middleware(['guest'])->group(function () {
    Route::post('/auth/login', [AuthController::class, 'login']);

    Route::post('/auth/forgot-password', [UserController::class, 'requestPasswordResetLink'])->name('password.forgot');

    Route::post('/auth/reset-password', [UserController::class, 'resetPassword'] )->name('password.reset');
});

Route::get('/auth/me', [AuthController::class, 'me']);


