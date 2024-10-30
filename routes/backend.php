<?php

use App\Http\Controllers\DeskripsiWebsiteController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\RoadRaceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SosialMediaController;
use App\Http\Controllers\TentangController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    $data = DB::table('peserta')
    ->join('road_race', 'peserta.id_road_race', '=', 'road_race.id')
    ->select('road_race.nama as nama_road_race', DB::raw('COUNT(peserta.id) as total'))
    ->groupBy('road_race.nama')
    ->get();

    $data2 = DB::table('peserta')
    ->join('kategori', 'peserta.id_kategori', '=', 'kategori.id')
    ->select('kategori.name as name_kategori', DB::raw('COUNT(peserta.id) as total'))
    ->where('kategori.id', '!=', 1) // Filter untuk menghilangkan id_kategori = 1
    ->groupBy('kategori.name')
    ->get();
        // dd($data);
    return view('backend.dashboard', compact('data','data2'));
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
    Route::get('/export-peserta', [PesertaController::class, 'exportPeserta'])->name('export.peserta');
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
    Route::post('/social-media/update', [SosialMediaController::class, 'update'])->name('social-media.update');
    Route::post('/update-footer', [SettingController::class, 'updateFooter'])->name('update-footer');
    Route::post('/update-event-date', [SettingController::class, 'updateEventDate'])->name('update-event-date');
    Route::post('/banks/update', [RekeningController::class, 'update'])->name('banks.update');
    Route::post('/tentang/update', [TentangController::class, 'update'])->name('tentang.update');
    // road-race
    // Route untuk menampilkan daftar road-race
    Route::get('/road-race', [RoadRaceController::class, 'index'])->name('road-race.index');
    // Route untuk menampilkan form tambah road-race
    Route::get('/road-race/create', [RoadRaceController::class, 'create'])->name('road-race.create');
    // Route untuk menyimpan data baru
    Route::post('/road-race', [RoadRaceController::class, 'store'])->name('road-race.store');
    // Route untuk menampilkan form edit road-race
    Route::get('/road-race/{id}/edit', [RoadRaceController::class, 'edit'])->name('road-race.edit');
    // Route untuk mengupdate data road-race
    Route::put('/road-race/{id}', [RoadRaceController::class, 'update'])->name('road-race.update');
    // Route untuk menghapus data road-race
    Route::delete('/road-race/{id}', [RoadRaceController::class, 'destroy'])->name('road-race.destroy');
    // Route untuk mengubah status paling laris
    Route::get('/road-race/{id}/paling-laris', [RoadRaceController::class, 'changePalingLaris'])->name('road-race.changePalingLaris');
    // kategori lari
    Route::resource('kategori', KategoriController::class);
});

