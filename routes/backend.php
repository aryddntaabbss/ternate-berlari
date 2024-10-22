<?php

use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/data-peserta', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('/data-peserta/{id}', [PesertaController::class, 'show'])->name('peserta.show');
    Route::delete('/data-peserta/{id}', [PesertaController::class, 'destroy'])->name('peserta.destroy');
    Route::post('/data-peserta/{id}/update-status', [PesertaController::class, 'updateStatus'])->name('peserta.updateStatus');

});

