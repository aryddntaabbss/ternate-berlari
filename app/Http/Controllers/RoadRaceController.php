<?php

namespace App\Http\Controllers;

use App\Models\RoadRace;
use Illuminate\Http\Request;

class RoadRaceController extends Controller
{
    function index() {
        return view('backend.road_race',[
            'road_races'=>RoadRace::all(),
        ]);
    }
    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'biaya' => 'required',
            'paling_laris' => 'boolean',
        ]);

        // Jika paling_laris di-set true, set semua lainnya menjadi false
        if ($request->paling_laris) {
            RoadRace::where('paling_laris', true)->update(['paling_laris' => false]);
        }

        RoadRace::create([
            'nama' => $request->nama,
            'biaya' => $request->biaya,
            'paling_laris' => $request->paling_laris ?? false,
        ]);

        notify()->success('Kategori Road Race Website Berhasil Di Ubah');
        return redirect()->back();
    }

    // Mengupdate data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'biaya' => 'required',
            'paling_laris' => 'boolean',
        ]);

        // Temukan data yang akan di-update
        $road_race = RoadRace::findOrFail($id);

        // Jika paling_laris di-set true, set semua lainnya menjadi false
        if ($request->paling_laris) {
            RoadRace::where('paling_laris', true)->update(['paling_laris' => false]);
        }

        // Update data
        $road_race->update([
            'nama' => $request->nama,
            'biaya' => $request->biaya,
            'paling_laris' => $request->paling_laris ?? false,
        ]);

        notify()->success('Kategori Road Race Website Berhasil Di Ubah');
        return redirect()->back();
    }

    // Metode untuk mengubah paling laris
    public function changePalingLaris($id)
    {
        // Temukan data yang akan diubah status paling larisnya
        $road_race = RoadRace::findOrFail($id);

        // Set semua data lain paling_laris menjadi false
        RoadRace::where('paling_laris', true)->update(['paling_laris' => false]);

        // Set data yang dipilih menjadi paling laris
        $road_race->paling_laris = true;
        $road_race->save();

        notify()->success('Kategori Road Race Website Berhasil Di Ubah');
        return redirect()->back();
    }

    public function destroy($id)
{
    // Temukan data berdasarkan ID
    $roadRace = RoadRace::findOrFail($id);
    
    // Hapus data
    $roadRace->delete();

    return redirect()->route('road-race.index')->with('success', 'Data Road Race berhasil dihapus.');
}

}
