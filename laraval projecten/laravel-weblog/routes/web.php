<?php

use Illuminate\Support\Facades\Route;


Route::get('/blogs', function () {
    return view('blogs.index');
})->name('blogs.index');

Route::get('/blogs/create', function () {
    return view('blogs.create');
})->name('blogs.create');

Route::post('/blogs', function () {})->name('blogs.store');
Route::get('/blogs/{blog}', function () {})->name('blogs.show');
Route::get('/blogs/{blog}/edit', function () {})->name('blogs.edit');
Route::put('/blogs/{blog}', function () {})->name('blogs.update');
Route::delete('/blogs/{blog}', function () {})->name('blogs.destroy');

// Route::get('/login', function () {});
// Route::get('/users/{user}', function () {});

Route::redirect('/', '/blogs', 302);