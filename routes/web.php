<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group.
|
*/

// Route untuk halaman beranda
Route::get('/', [BerandaController::class, 'index'])->name('index');
Route::get('/data-peserta', [BerandaController::class, 'peserta'])->name('peserta');
Route::get('/daftar/{id}', [BerandaController::class, 'daftar'])->name('daftar');
Route::post('/peserta/store', [BerandaController::class, 'store'])->name('peserta.store');

Route::get('/Menu/{pages:slug}', [PageController::class, 'show'])->name('blank');


// Route yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// Include route tambahan
require __DIR__ . '/auth.php';
require __DIR__ . '/backend.php';
