<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{blog}', [BlogController::class, 'show'] )->name('blogs.show');
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

Route::post('/blogs/{blog}', [CommentController::class, 'store'])->name('comments.store');

Route::get('/users/{account}', [UserController::class, 'show'])->name('users.user');
Route::post('/login', [LoginController::class, 'authenticate'])->name('users.authenticate');
Route::get('/login', [LoginController::class, 'index'])->name('users.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('users.logout');

Route::redirect('/', '/blogs', 302);