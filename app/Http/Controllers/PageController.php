<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    function index() {
        return view('backend.pages',[
            'pages'=>Page::all()
        ]);
    }
    function create() {
        return view('backend.create_pages',[
            'menu'=>Menu::all()
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'content' => 'required|string',
            'status' => 'required|in:aktif,tidak',
            'menu_id' => 'required|integer',
        ]);

        // Hilangkan domain dari slug, simpan hanya slug
        $slug = Str::after($request->input('slug'), config('app.url') . '/');

        // Simpan data ke database
        Page::create([
            'name' => $request->input('name'),
            'slug' => $slug,
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'menu_id' => $request->input('menu_id'),
        ]);

        notify()->success('Halaman Berhasil Di Tambahkan');
        return redirect()->route('pages');
    }

    // Method to show the edit form
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $menu = Menu::all(); // Assuming you have a Menu model for the dropdown

        return view('backend.edit_pages', compact('page', 'menu'));
    }

    // Method to handle the update request
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $id,
            'content' => 'required|string',
            'status' => 'required|in:aktif,tidak',
            'menu_id' => 'required|integer',
        ]);

        // Hilangkan domain dari slug, simpan hanya slug
        $slug = Str::after($request->input('slug'), config('app.url') . '/');

        // Temukan halaman berdasarkan ID dan update data
        $page = Page::findOrFail($id);
        $page->update([
            'name' => $request->input('name'),
            'slug' => $slug,
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'menu_id' => $request->input('menu_id'),
        ]);

        notify()->success('Halaman Berhasil Di Update');
        return redirect()->route('pages');
    }

    public function destroy($id)
    {
        // Temukan menu berdasarkan ID
        $page = Page::findOrFail($id);

        // Hapus menu
        $page->delete();

        notify()->success('Halaman Berhasil Di Hapus');
        return redirect()->route('pages');
    }
}
