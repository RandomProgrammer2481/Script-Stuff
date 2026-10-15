<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// To do:
// Make an seeder and factory for chats and messages
// make an view to show all the chats you're in
// Make an view to show one specific chat
// Make it so when as the poster of an advertisement if you click a bid it opens a chat with them or makes it if there is none
// Make a functioning Navbar



// User Registration
Route::get('/register', [UserController::class, 'create'])->name('users.create');
Route::post('/register', [UserController::class, 'store'])->name('users.store');


//Logging in/out
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('sessions.store');
Route::get('/logout', [SessionController::class, 'destroy'])->name('logout');


// Password reset
Route::get('/forgot-password',[PasswordController::class, 'show'])->middleware('guest')->name('password.request');
Route::post('/forgot-password',[PasswordController::class, 'create'] )->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}',[PasswordController::class, 'edit'] )->middleware('guest')->name('password.reset');
Route::post('/reset-password',[PasswordController::class, 'update'] )->middleware('guest')->name('password.update');


// !! TOO MESSY, CHANGE THIS INTO A CONTROLLER LATER !!
// Email verification 
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//Advertisements
Route::get('/advertisements/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
Route::post('/advertisements/create', [AdvertisementController::class, 'store'])->name('advertisements.store');
Route::get('/users/{user}/advertisements',[AdvertisementController::class, 'byUser'])->name('user.advertisements.index');
Route::get('/advertisements', [AdvertisementController::class, 'index'])->name('advertisements.index');
Route::get('/advertisements/{advertisement}/edit',[AdvertisementController::class, 'edit'])->name('advertisements.edit');
Route::put('/advertisements/{advertisement}/edit',[AdvertisementController::class, 'update'])->name('advertisements.update');
Route::delete('/advertisements/{advertisement}',[AdvertisementController::class, 'destroy'])->name('advertisements.delete');
Route::get('/advertisements/{advertisement}', [AdvertisementController::class, 'show'])->name('advertisements.show');

//Bids
Route::post('/advertisements/{advertisement}', [BidController::class, 'store'])->name('bids.store');

//Chats
Route::get('/chats', [ChatController::class, 'index'])->name('chats.index');
Route::get('/chats/{chat}', [ChatController::class, 'show'])->name('chats.show');
Route::post('/chats', [ChatController::class, 'store'])->name('chats.store');
Route::get('/chats/create/{user}', [ChatController::class, 'create'])->name('chats.create');

//Messages
Route::post('/chats/{chat}', [MessageController::class, 'store'])->name('messages.store');

Route::get('/advertisements/{advertisement}/promote', [AdvertisementController::class, 'promote'])->name('advertisements.promote');

Route::get('/dashboard', function () {if(Auth::check()){return view('dashboard');}else{return redirect(route('login'));}})->name('dashboard');

Route::redirect('/', '/advertisements');