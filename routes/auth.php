<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PassportController;
use Illuminate\Http\Request;

Route::middleware('guest')->group(function () {
    Route::get('register', [PassportController::class, 'viewRegister'])->name('register');
    Route::post('register', [PassportController::class, 'register']);

    Route::get('login', [PassportController::class, 'viewLogin'])->name('login');
    Route::post('login', [PassportController::class, 'login']);

//    Route::get('oauth/authorize', [PassportController::class, 'viewAuthorize'])->name('authorize');
});
Route::middleware('auth')->group(function() {
    Route::post('logout', [PassportController::class, 'logout'])->name('logout');
});
