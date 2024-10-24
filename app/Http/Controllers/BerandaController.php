<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Rekening;
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
        $bank = Rekening::first();

        // Return ke view 'frontend.pages.daftar' dengan daftar
        return view('frontend.pages.daftar', compact('bank'));
    }

    public function store(Request $request)
    {
        // Validasi data permintaan yang masuk
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:16', // Sesuaikan panjang maksimal sesuai kebutuhan Anda
            'golongan_darah' => 'required|string|max:3',
            'pekerjaan' => 'required|string|max:255',
            'no_tlp' => 'required|string|max:15', // Sesuaikan panjang maksimal sesuai kebutuhan Anda
            'alamat' => 'required|string|max:255',
            'komunitas' => 'required|string|max:255',
            'riwayat_penyakit' => 'required|string|max:255',
            'kontak_darurat' => 'required|string|max:15', // Sesuaikan panjang maksimal sesuai kebutuhan Anda
            'kategori_usia' => 'required|string',
            'size_jersey' => 'required|string',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan panjang maksimal sesuai kebutuhan Anda
        ]);

        // Menangani unggahan file
        $fileName = time() . '_' . $request->bukti_bayar->getClientOriginalName();
        $request->bukti_bayar->move(public_path('uploads'), $fileName);

        // Buat peserta baru
        Peserta::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'golongan_darah' => $request->golongan_darah,
            'pekerjaan' => $request->pekerjaan,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'komunitas' => $request->komunitas,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'kontak_darurat' => $request->kontak_darurat,
            'kategori_usia' => $request->kategori_usia,
            'size_jersey' => $request->size_jersey,
            'bukti_bayar' => $fileName,
        ]);

        notify()->success('Peserta berhasil didaftarkan.');
        return redirect('/data-peserta');
    }
}
