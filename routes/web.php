<?php

use App\Http\Controllers\QrcodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('qrcodes',QrcodeController::class)->except(['show']);