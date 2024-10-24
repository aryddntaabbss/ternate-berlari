<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\Setting;
use App\Models\SosialMedia;
use App\Models\Tentang;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index() {
        return view('backend.settings',[
            'bank'=>Rekening::first(),
            'tentang'=>Tentang::first(),
        ]);
    }

    public function updateFooter(Request $request)
    {
        $request->validate([
            'footer_text' => 'required|string|max:255',
        ]);

        Setting::where('name', 'footer')->update([
            'value' => $request->footer_text,
        ]);

        notify()->success('Footer Website Berhasil Di Ubah');
        return redirect()->back();
    }

    public function updateEventDate(Request $request)
    {
        $request->validate([
            'event_date' => 'required|date',
        ]);

        Setting::where('name', 'tanggal_event')->update([
            'value' => $request->event_date,
        ]);

        notify()->success('Tanggal Event Berhasil Di Ubah');
        return redirect()->back();
    }
}
