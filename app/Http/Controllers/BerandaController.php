<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Menampilkan halaman beranda.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'title' => 'Selamat Datang di Beranda!',
            'description' => 'Selamat Datang di Laman Resmi Ternate Berlari',
        ];

        return view('frontend.pages.index', $data);
    }

    /**
     * Menampilkan halaman data peserta di frontend.
     *
     * @return \Illuminate\View\View
     */
    public function peserta()
    {
        // Ambil data peserta dari database
        $data_peserta = Peserta::all();

        // Return ke view 'frontend.pages.data-peserta' dengan data peserta
        return view('frontend.pages.data-peserta', compact('data_peserta'));
    }

    public function daftar()
    {

        // Return ke view 'frontend.pages.daftar' dengan daftar
        return view('frontend.pages.daftar');
    }
}
