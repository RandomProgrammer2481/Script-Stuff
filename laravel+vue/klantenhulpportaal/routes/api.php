<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Models\Reaction;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index'])->can('viewAny', Ticket::class);

    Route::post('/tickets', [TicketController::class, 'store'])->can('create', Ticket::class);

    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->can('view', 'ticket');

    Route::patch('/tickets/{ticket}/assignee', [TicketController::class, 'assign'])->can('update', 'ticket');

    Route::patch('/tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->can('update', 'ticket');

    Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->can('update', 'ticket');

    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/categories', [CategoryController::class, 'index']);

    Route::post('/categories', [CategoryController::class, 'store']);

    Route::put('/categories/{category}', [CategoryController::class, 'update']);

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

    Route::get('/notes/{ticket_id?}', [NoteController::class, 'index']);
    
    Route::post('/notes', [NoteController::class, 'store']);

    Route::put('/notes/{note}', [NoteController::class, 'update']);

    Route::delete('/notes/{note}', [NoteController::class, 'destroy']);
    
    Route::get('/statuses', [StatusController::class, 'index']);

    Route::get('/reactions/{ticket_id?}', [ReactionController::class, 'index'])->can('viewAny', Reaction::class);
    
    Route::post('/reactions', [ReactionController::class, 'store'])->can('create', Reaction::class);

    Route::put('/reactions/{reaction}', [ReactionController::class, 'update'])->can('update', 'reaction');
  
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/users/admins', [UserController::class, 'getAdmins']);
});

Route::middleware(['guest:sanctum'])->group(function () {
    Route::post('/auth/login', [AuthController::class, 'login']);

    Route::post('/auth/forgot-password', [UserController::class, 'requestPasswordResetLink'])->name('password.forgot');

    Route::post('/auth/reset-password', [UserController::class, 'resetPassword'] )->name('password.reset');
});

Route::get('/auth/me', [AuthController::class, 'me']);


