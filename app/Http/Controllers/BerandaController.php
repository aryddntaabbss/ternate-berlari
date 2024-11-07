<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Peserta;
use App\Models\Tentang;
use App\Models\Rekening;
use App\Models\RoadRace;
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
        $kategori = Kategori::all();

        $road_race = RoadRace::all();
        // Retrieve the first "Tentang" entry from the database
        $tentang = Tentang::first();

        // Prepare other data
        $data = [
            'title' => 'Selamat Datang di Beranda!',
            'description' => 'Selamat Datang di Laman Resmi Ternate Berlari',
            'tentang' => $tentang, // Pass the "tentang" data to the view
            'road_race' => $road_race, // Pass the "road_race" data to the view
            'kategori' => $kategori, // Pass the "kategori" data to the view
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
        $data_peserta = Peserta::latest()->get();

        // Return ke view 'frontend.pages.data-peserta' dengan data peserta
        return view('frontend.pages.data-peserta', compact('data_peserta'));
    }

    public function daftar($id)
    {
        $road_race = RoadRace::findOrFail($id);
        $bank = Rekening::first();

        // Return ke view 'frontend.pages.daftar' dengan daftar
        return view('frontend.pages.daftar', [
            'bank' => $bank,
            'road_race' => $road_race,
            'kategori' => Kategori::all(),
        ]);
    }

    public function store(Request $request)
    {
     
            // Validasi data permintaan yang masuk
           $data =  $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'nik' => 'required|string|size:16|unique:peserta', // Sesuaikan panjang maksimal sesuai kebutuhan Anda
                // 'golongan_darah' => 'required|string|max:3',
                'golongan_darah' => 'required|string|in:A,B,AB,O',
                'pekerjaan' => 'required|string|max:255',
                'no_tlp' => 'required|string|max:15|min:11', // Sesuaikan panjang maksimal sesuai kebutuhan Anda
                'alamat' => 'required|string|max:255',
                'komunitas' => 'required|string|max:255',
                'riwayat_penyakit' => 'required|string|max:255',
                'kontak_darurat' => 'required|string|max:15', // Sesuaikan panjang maksimal sesuai kebutuhan Anda
               'id_kategori' => 'required|exists:kategori,id',
                'id_road_race' => 'required|exists:road_race,id',
                // 'size_jersey' => 'required|string',
                'size_jersey' => 'required|string|in:S,M,L,XL,XXL,3XL,4XL',
                'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan panjang maksimal sesuai kebutuhan Anda
            ], [
                'bukti_bayar.max' => 'Ukuran Gambar tidak boleh lebih dari 2 MB',
            ]);

            // Menangani unggahan file
            $file = $request->file('bukti_bayar');

            // Simpan gambar_tentang baru di storage
            $path = $file->store('bukti_bayar', 'public');
            
            // Simpan path gambar_tentang di database
            // $tentang->gambar_tentang = $path;

            // $fileName = time() . '_' . $request->bukti_bayar->getClientOriginalName();
            // $request->bukti_bayar->move(public_path('uploads'), $fileName);

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
                'id_kategori' => $request->id_kategori,
                'id_road_race' => $request->id_road_race,
                'size_jersey' => $request->size_jersey,
                'bukti_bayar' => $path,
            ]);

            notify()->success('Peserta berhasil didaftarkan.');
            return redirect('/data-peserta');
        
    }
}
