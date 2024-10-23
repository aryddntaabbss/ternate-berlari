<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DeskripsiWebsiteController extends Controller
{
    public function updateEnv($url)
    {
        $path = base_path('.env');
        $envContents = File::get($path);

        // Update APP_URL
        $envContents = preg_replace('/^APP_URL=(.*)$/m', 'APP_URL=' . $url, $envContents);

        File::put($path, $envContents);
    }
    // Memperbarui data di database
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'logo' => 'nullable|image|mimes:png|max:2048', // Menambahkan validasi untuk gambar
            'url' => 'required|url',
            'title' => 'required|string|max:255',
            'keyword' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $deskripsiWebsite = DeskripsiWebsite::findOrFail($id);
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($deskripsiWebsite->logo && Storage::disk('public')->exists($deskripsiWebsite->logo)) {
                Storage::disk('public')->delete($deskripsiWebsite->logo);
            }
        
            // Upload logo baru dan simpan di folder 'uploads/logo'
            $logoPath = $request->file('logo')->store('uploads/logo', 'public');
        }else {
            // Jika tidak ada logo baru, tetap gunakan logo lama
            $logoPath = $deskripsiWebsite->logo;
        }


        // Cari dan update data
        $deskripsiWebsite = DeskripsiWebsite::findOrFail($id);
        $deskripsiWebsite->update([
            'logo' => $logoPath,
            'url' => $request->url,
            'title' => $request->title,
            'keyword' => $request->keyword,
            'deskripsi' => $request->deskripsi,
        ]);

         // Panggil fungsi untuk update APP_URL di .env
        $this->updateEnv($request->url);

        notify()->success('Deskripsi Website Berhasil Di Ubah');
        return redirect()->back();
    }
}
