<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::patch('/tickets/{ticket}/assignee', [TicketController::class, 'assign']);

    Route::patch('/tickets/{ticket}/status', [TicketController::class, 'updateStatus']);

    Route::post('/categories', [CategoryController::class, 'store']);

    Route::put('/categories/{category}', [CategoryController::class, 'update']);

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

    Route::get('/users', [UserController::class, 'index']);

    Route::get('/users/admins', [UserController::class, 'getAdmins']);
 
    Route::get('/tickets/{ticket}', [TicketController::class, 'show']);

    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);

    Route::get('/tickets/{ticket}/reactions', [ReactionController::class, 'index']);

    Route::post('/tickets/{ticket}/reactions', [ReactionController::class, 'store']);

    Route::get('/tickets', [TicketController::class, 'index']);

    Route::post('/tickets', [TicketController::class, 'store']);

    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/categories', [CategoryController::class, 'index']);

    Route::get('/statuses', [StatusController::class, 'index']);

    Route::get('/auth/me', [AuthController::class, 'me']);
});

// Guest only routes go here
Route::middleware(['guest'])->group(function () {
    Route::post('/auth/login', [AuthController::class, 'login']);

    Route::post('/auth/forgot-password', [UserController::class, 'requestPasswordResetLink'])->name('password.forgot');

    Route::post('/auth/reset-password', [UserController::class, 'resetPassword'] )->name('password.reset');
});

