<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('backend.kategori_lari', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'umur' => 'required',
            'gender' => 'required|string',
        ]);

        Kategori::create($request->all());

        notify()->success('Kategori Lari Berhasil Di Tambahkan');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'umur' => 'required',
            'gender' => 'required|string',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        notify()->success('Kategori Lari Berhasil Di Ubah');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        notify()->success('Kategori Lari Berhasil Di Ubah');
        return redirect()->back();
    }
}
