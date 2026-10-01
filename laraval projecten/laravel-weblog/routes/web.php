<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::put('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{blog}', [BlogController::class, 'show'] )->name('blogs.show');
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

Route::put('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::put('/categories/new', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/users/{account}', [UserController::class, 'show'])->name('users.user');
Route::post('/login', [LoginController::class, 'authenticate'])->name('users.authenticate');
Route::get('/login', [LoginController::class, 'index'])->name('users.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('users.logout');

Route::get('/premium', [UserController::class, 'premium'])->name('premium.show');
Route::patch('/premium/update', [UserController::class, 'set_premium'])->name('premium.set');

Route::redirect('/', '/blogs', 302);

Route::get('/403', function () {return view('errors.403');})->name('errors.403');
