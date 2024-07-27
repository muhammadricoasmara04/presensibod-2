<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParticipanController;
use App\Http\Controllers\RoleuserController;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::middleware([UserAccess::class . ':superadmin'])->group(function () {
        Route::get('dashboard/superadmin', [RoleuserController::class, 'admin']);
    });

    Route::middleware([UserAccess::class . ':peserta'])->group(function () {
        Route::get('dashboard', [ParticipanController::class, 'index'])->middleware('auth');
        Route::get('dashboard/show', [ParticipanController::class, 'show']);
        Route::get('dashboard/create', [ParticipanController::class, 'create']);
        Route::post('dashboard/store', [ParticipanController::class, 'store']);
    });
});
