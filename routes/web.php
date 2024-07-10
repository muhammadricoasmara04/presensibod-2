<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleuserController;
use Illuminate\Support\Facades\Route;

// auth
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout']);


// roleadmin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [RoleuserController::class, 'admin']);
});
