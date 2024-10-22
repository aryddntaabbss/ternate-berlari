<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BerandaController::class, 'index'])->name('home');
