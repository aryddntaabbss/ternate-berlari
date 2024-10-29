<?php

namespace App\Http\Controllers;

use App\Exports\PesertaExport;
use App\Models\Peserta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    function index() {
        return view('backend.data_peserta',[
            'data_peserta' => Peserta::with(['kategori'])->get()
        ]);
    }
    public function show($id)
    {
        // Ambil data peserta berdasarkan ID
        $peserta = Peserta::with(['roadRace','kategori'])->findOrFail($id);

        // Return ke view detail peserta
        return view('backend.peserta_show', compact('peserta'));
    }

    public function destroy($id)
    {
        // Cari data peserta berdasarkan ID
        $peserta = Peserta::findOrFail($id);

        // Hapus data peserta
        $peserta->delete();

        notify()->success('Peserta berhasil dihapus.');
        // Redirect ke halaman peserta dengan pesan sukses
        return redirect()->route('peserta.index');
    }
    public function updateStatus(Request $request, $id)
    {
        // Cari peserta berdasarkan ID
        $peserta = Peserta::findOrFail($id);

        // Update status peserta
        $peserta->status = $request->status;
        $peserta->save();

        // Kembalikan respon berhasil
        notify()->success('Status peserta berhasil diubah.');
        return response()->json(['success' => true, 'message' => '']);
    }

    public function exportPeserta()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $fileName = 'peserta_data_' . $timestamp . '.xlsx';

        return Excel::download(new PesertaExport, $fileName);
    }

}
