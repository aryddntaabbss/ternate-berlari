<?php
namespace App\Exports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PesertaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Mengambil koleksi data dari model Peserta
     */
    public function collection()
    {
        return Peserta::all([
            'nama_lengkap',
            'nik',
            'golongan_darah',
            'pekerjaan',
            'no_tlp',
            'alamat',
            'komunitas',
            'riwayat_penyakit',
            'kontak_darurat',
            'size_jersey',
            'bukti_bayar',
            'status',
            'id_road_race',
            'id_kategori',
            'created_at'
        ]);
    }

    /**
     * Menentukan header kolom
     */
    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'NIK',
            'Golongan Darah',
            'Pekerjaan',
            'No Telepon',
            'Alamat',
            'Komunitas',
            'Riwayat Penyakit',
            'Kontak Darurat',
            'Size Jersey',
            'Bukti Bayar',
            'Status',
            
            'Kategiori Road Race',
            'Kategori Usia',
            'Tanggal Dibuat',
        ];
    }

    /**
     * Menentukan format tiap baris data
     */
    public function map($peserta): array
    {
        return [
            $peserta->nama_lengkap,
            $peserta->nik,
            $peserta->golongan_darah,
            $peserta->pekerjaan,
            $peserta->no_tlp,
            $peserta->alamat,
            $peserta->komunitas,
            $peserta->riwayat_penyakit,
            $peserta->kontak_darurat,
            $peserta->size_jersey,
            $peserta->bukti_bayar,
            $peserta->status,
            
            $peserta->roadRace->nama,
            $peserta->kategori->name === 'Tidak Ada' ? '-' : $peserta->kategori->name,
            $peserta->created_at->timezone('Asia/Jayapura')->format('Y-m-d H:i:s'),
        ];
    }
}
