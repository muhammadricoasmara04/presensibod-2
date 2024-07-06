<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login.index', [
//         'title' => 'Login'
//     ]);
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
