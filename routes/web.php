<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParticipanController;
use App\Http\Controllers\RoleuserController;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;

// auth
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout']);


// roleadmin
Route::middleware(['auth'])->group(function () {

    // Route::middleware([UserAccess::class . ':superadmin'])->group(function () {
    //     Route::get('dashboard/superadmin', [RoleuserController::class, 'admin']);
    // });

    // Route::middleware([UserAccess::class . ':peserta'])->group(function () {
    //     Route::get('dashboard/peserta', [RoleuserController::class, 'participans']);
    // });
    Route::get('/logout', [RoleuserController::class, 'logout']);
});

//Dashboard Access
Route::middleware(['auth'])->group(function () {
    Route::middleware([UserAccess::class . ':superadmin'])->group(function () {
        Route::get('dashboard/superadmin', [RoleuserController::class, 'admin']);
    });

    Route::middleware([UserAccess::class . ':peserta'])->group(function () {
        Route::get('dashboard/peserta', [ParticipanController::class, 'index']);
    });
    Route::middleware([UserAccess::class . ':peserta'])->group(function () {
        Route::get('dashboard/peserta/show', [ParticipanController::class, 'show']);
    });

    Route::middleware([UserAccess::class . ':peserta'])->group(function () {
        Route::get('dashboard/peserta/create', [ParticipanController::class, 'create']);
    });
    Route::post('/logout', [ParticipanController::class, 'logout'])->name('logout');
});
