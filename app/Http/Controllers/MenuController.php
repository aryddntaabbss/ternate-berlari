<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function index() {
        return view('backend.menu',[
            'menu'=>Menu::all()
        ]);
    }
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255', // NIDN harus unik
        ]);

        // Simpan data dosen ke database
        Menu::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        notify()->success('Menu Berhasil Di Tambahkan');
        return redirect()->back();
    }

     // Fungsi untuk mengupdate data dosen
     public function update(Request $request, $id)
     {
         // Validasi input
         $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
         ]);
 
         // Cari dosen yang akan diupdate
         $menu = Menu::findOrFail($id);
 
         // Update data dosen
         $menu->update([
             'name' => $request->name,
             'url' => $request->url,
         ]);
 
         notify()->success('Menu Berhasil Di Perbaharui');
         return redirect()->back();
     }
 
     // Fungsi untuk menghapus dosen
     public function destroy($id)
     {
         // Cari dosen yang akan dihapus
         $dosen = Menu::findOrFail($id);
 
         // Hapus data dosen dari database
         $dosen->delete();
 
         notify()->success('Data Dosen Berhasil Di Hapus');
         return redirect()->back();
     }
}
