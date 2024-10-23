<?php

namespace Database\Seeders;

use App\Models\Peserta;
use App\Models\RoadRace;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        Setting::create([
            'name' => 'logo',
            'value' => 'assets/img/Logo.png',
        ]);

        Setting::create([
            'name' => 'footer',
            'value' => 'Ternate Berlari 2024',
        ]);
        Setting::create([
            'name' => 'tanggal_event',
            'value' => '15/15/2024',
        ]);
        RoadRace::create([
            'nama' => '5',
            'biaya' => '175',
        ]);
        RoadRace::create([
            'nama' => '10',
            'biaya' => '200',
        ]);
        RoadRace::create([
            'nama' => '21',
            'biaya' => '350',
        ]);

        Peserta::create([
            'nama_lengkap' => 'Ahmad Syahroni',
            'nik' => '1234567890123456',
            'golongan_darah' => 'A',
            'pekerjaan' => 'Karyawan Swasta',
            'no_tlp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 10, Jakarta',
            'komunitas' => 'Komunitas A',
            'riwayat_penyakit' => 'Tidak ada',
            'kontak_darurat' => '081234567891',
            'kategori_usia' => 'Dewasa',
            'size_jersey' => 'L',
            'bukti_bayar' => 'assets/img/Logo.png',
        ]);

        Peserta::create([
            'nama_lengkap' => 'Dewi Sartika',
            'nik' => '2345678901234567',
            'golongan_darah' => 'O',
            'pekerjaan' => 'Guru',
            'no_tlp' => '082234567891',
            'alamat' => 'Jl. Jenderal Sudirman No. 20, Bandung',
            'komunitas' => 'Komunitas B',
            'riwayat_penyakit' => 'Asma',
            'kontak_darurat' => '081234567892',
            'kategori_usia' => 'Dewasa',
            'size_jersey' => 'M',
            'bukti_bayar' => 'assets/img/Logo.png',
        ]);

        DB::table('deskripsi_website')->insert([
            'url' => 'http://localhost/',
            'logo' => 'Ternate Berlari',
            'title' => 'Ternate Berlari',
            'keyword' => 'website,laravel,local',
            'deskripsi' => 'This is the description for my website.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
