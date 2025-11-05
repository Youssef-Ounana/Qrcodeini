<?php

use App\Http\Controllers\QrcodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;




Route::middleware('guest')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('user/register', [UserController::class, 'showRegistrationForm'])->name('user.register');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('user/auth', [UserController::class, 'login'])->name('user.auth');
});

Route::middleware('auth')->group(function() {
   
    Route::resource('qrcodes', QrcodeController::class)->except(['show']);
    Route::resource('qrcodes', QrcodeController::class)->except(['show']);
    Route::post('user/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
});