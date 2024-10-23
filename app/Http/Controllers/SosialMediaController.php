<?php

namespace App\Http\Controllers;

use App\Models\SosialMedia;
use Illuminate\Http\Request;

class SosialMediaController extends Controller
{
    public function update(Request $request)
    {
        // dd($request);
         // Validasi input
         $request->validate([
            'facebook' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'youtube' => 'required|string|max:255',
        ]);

        // Update setiap media sosial berdasarkan nama_sosmed
        $socialMedias = ['facebook', 'twitter', 'instagram', 'youtube'];

        foreach ($socialMedias as $namaSosmed) {
            SosialMedia::where('nama_sosmed', ucfirst($namaSosmed))
                ->update(['url' => $request->input($namaSosmed)]);
        }

        notify()->success('Sosial Media Website Berhasil Di Ubah');
        return redirect()->back();
    }
}
