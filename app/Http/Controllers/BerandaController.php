<?php

namespace App\Http\Controllers;

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
        // Anda bisa mengirim data ke view jika diperlukan.
        $title = 'Selamat Datang di Beranda!';
        $description = 'Selamat Datang Laman Resmi Ternate Berlari';

        // Return ke view 'beranda'
        return view('frontend.pages.index', compact('title', 'description'));
    }
}
