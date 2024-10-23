<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_bank' => 'required|string|max:255',
            'no_rekening' => 'required|string|max:50',
            'nama_rekening' => 'required|string|max:255',
        ]);

        // Ambil data bank pertama
        $bank = Rekening::first();

        if (!$bank) {
            notify()->error('Data Tidak Ditemukan');
            return redirect()->back();
        }

        // Update data bank
        $bank->update([
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening,
            'nama_rekening' => $request->nama_rekening,
        ]);

        notify()->success('Data Rekening Berhasil Di Ubah');
        return redirect()->back();
    }
}
