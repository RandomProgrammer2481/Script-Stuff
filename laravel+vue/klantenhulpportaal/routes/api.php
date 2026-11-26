<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Note;
use App\Models\Reaction;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    
    //Tickets

    Route::get('/tickets', [TicketController::class, 'index'])->can('viewAny', Ticket::class);

    Route::post('/tickets', [TicketController::class, 'store'])->can('create', Ticket::class);

    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->can('view', 'ticket');

    Route::patch('/tickets/{ticket}/assignee', [TicketController::class, 'assign'])->can('assignAdmin', Ticket::class);

    Route::patch('/tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->can('updateStatus', Ticket::class);

    Route::patch('/tickets/{ticket}', [TicketController::class, 'update'])->can('update', 'ticket');

    //Authentication
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    //Categories
    Route::get('/categories', [CategoryController::class, 'index'])->can('viewAny', Category::class);

    Route::post('/categories', [CategoryController::class, 'store'])->can('create', Category::class);

    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->can('update', 'category');

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->can('forceDelete', 'category');

    //Notes
    Route::get('/tickets/{ticket}/notes', [NoteController::class, 'indexByTicket'])->can('viewAny', Note::class);
    
    Route::post('/tickets/{ticket}/notes', [NoteController::class, 'store'])->can('create', Note::class);

    Route::patch('/notes/{note}', [NoteController::class, 'update'])->can('update', 'note');

    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->can('forceDelete', 'note');
    
    //Statuses
    Route::get('/statuses', [StatusController::class, 'index'])->can('viewAny', Status::class);

    //Reactions
    Route::get('/tickets/{ticket}/reactions', [ReactionController::class, 'indexByTicket'])->can('view', 'ticket');
    
    Route::post('/reactions', [ReactionController::class, 'store'])->can('create', Reaction::class);

    Route::patch('/reactions/{reaction}', [ReactionController::class, 'update'])->can('update', 'reaction');
    
    //Users
    Route::get('/users', [UserController::class, 'index'])->can('viewAny', User::class);

    Route::get('/users/admins', [UserController::class, 'getAdmins'])->can('viewAdmins', User::class);
});

Route::middleware(['guest:sanctum'])->group(function () {
    Route::post('/auth/login', [AuthController::class, 'login']);

    Route::post('/auth/forgot-password', [UserController::class, 'requestPasswordResetLink'])->name('password.forgot');

    Route::post('/auth/reset-password', [UserController::class, 'resetPassword'] )->name('password.reset');
});



Route::get('/auth/me', [AuthController::class, 'me']);