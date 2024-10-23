<?php

use App\Http\Controllers\DeskripsiWebsiteController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
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
    // menu
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
     // pages
     Route::get('/pages', [PageController::class, 'index'])->name('pages');
     Route::get('/create-pages', [PageController::class, 'create'])->name('pages.create');
     Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
     Route::delete('/pages/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
     // Route for showing the edit form
    Route::get('/edit-pages/{id}', [PageController::class, 'edit'])->name('pages.edit');
    // Route for handling the update request
    Route::put('/edit-pages/{id}', [PageController::class, 'update'])->name('pages.update');
    // settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::put('/deskripsi-website/{id}/update', [DeskripsiWebsiteController::class, 'update'])->name('deskripsi_website.update');
});

