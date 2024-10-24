<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'deskripsi_tentang' => 'required|string',
            'gambar_tentang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil data pertama dari model Tentang
        $tentang = Tentang::first();

        // Update deskripsi_tentang
        $tentang->deskripsi_tentang = $request->input('deskripsi_tentang');

        // Cek apakah ada gambar_tentang yang diupload
        if ($request->hasFile('gambar_tentang')) {
            $file = $request->file('gambar_tentang');

            // Hapus gambar_tentang lama jika ada
            if ($tentang->gambar_tentang) {
                Storage::disk('public')->delete($tentang->gambar_tentang);
            }

            // Simpan gambar_tentang baru di storage
            $path = $file->store('gambar_tentang', 'public');
            
            // Simpan path gambar_tentang di database
            $tentang->gambar_tentang = $path;
        }

        // Simpan perubahan
        $tentang->save();

        notify()->success('Tentang Website Berhasil Di Ubah');
        return redirect()->back();
    }
}
