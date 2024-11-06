<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Page;
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
            'password' => Hash::make('T3rnateRunn1ng@2024'),
        ]);

        Setting::create([
            'name' => 'footer',
            'value' => '© Copyright Ternate Berlari 2024. All Rights Reserved.',
        ]);
        Setting::create([
            'name' => 'tanggal_event',
            'value' => '2024-12-08',
        ]);
        RoadRace::create([
            'nama' => '5',
            'biaya' => '175.000',
        ]);
        RoadRace::create([
            'nama' => '10',
            'biaya' => '200.000',
        ]);
        RoadRace::create([
            'nama' => '21',
            'biaya' => '350.000',
        ]);

        

        DB::table('deskripsi_website')->insert([
            'url' => 'https://ternate-berlari.com/',
            'logo' => 'uploads/logo/qUIXXAuurXHnx0mb5k7uynDOXTcAsT91m2lvhaRm.png',
            'title' => 'Ternate Berlari',
            'keyword' => 'pesona ternate, ternate berlari',
            'deskripsi' => 'Ternate Berlari adalah sebuah ajang lari yang menyatukan komunitas pecinta olahraga di Ternate, menawarkan pengalaman lari di antara pemandangan indah serta budaya kaya khas Kepulauan Maluku Utara. Melalui acara ini, kami berkomitmen menginspirasi gaya hidup sehat, mempererat kebersamaan, dan mempromosikan keindahan alam Ternate kepada masyarakat luas.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('sosial_media')->insert([
            ['nama_sosmed' => 'Facebook', 'url' => 'https://facebook.com/', 'created_at' => now(), 'updated_at' => now()],
            ['nama_sosmed' => 'Twitter', 'url' => 'https://twitter.com/', 'created_at' => now(), 'updated_at' => now()],
            ['nama_sosmed' => 'Instagram', 'url' => 'https://instagram.com/', 'created_at' => now(), 'updated_at' => now()],
            ['nama_sosmed' => 'YouTube', 'url' => 'https://youtube.com/', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('rekening')->insert([
            'nama_bank' => 'BNI',
            'no_rekening' => '1817092410',
            'nama_rekening' => 'Ternate Sport Tourism',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tentang')->insert([
            'deskripsi_tentang' => 'Ternate Berlari adalah sebuah ajang lari yang menyatukan komunitas pecinta olahraga di Ternate, menawarkan pengalaman lari di antara pemandangan indah serta budaya kaya khas Kepulauan Maluku Utara. Melalui acara ini, kami berkomitmen menginspirasi gaya hidup sehat, mempererat kebersamaan, dan mempromosikan keindahan alam Ternate kepada masyarakat luas.',
            'gambar_tentang' => 'gambar_tentang/Cxa5okWzDdBghZ25F6hVOr6eOJqEViXT5qgtkwxn.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Kategori::create([
            'name' => 'Tidak Ada',
            'umur' => 'Tidak Ada',
            'gender' => 'Tidak Ada',
        ]);

        Kategori::create([
            'name' => 'Pelajar',
            'umur' => '15 - 17',
            'gender' => 'Pria/Wanita',
        ]);

        Kategori::create([
            'name' => 'Elit (Atlet)',
            'umur' => '17 - 34',
            'gender' => 'Pria/Wanita',
        ]);
        Kategori::create([
            'name' => 'HOBBIES',
            'umur' => '18 - 34',
            'gender' => 'Pria/Wanita',
        ]);
        Kategori::create([
            'name' => 'MASTER A',
            'umur' => '35 - 44',
            'gender' => 'Pria/Wanita',
        ]);
        Kategori::create([
            'name' => 'MASTER B',
            'umur' => '45 - 50',
            'gender' => 'Pria/Wanita',
        ]);
        Kategori::create([
            'name' => 'MASTER C',
            'umur' => '50+',
            'gender' => 'Pria/Wanita',
        ]);

        Menu::create([
            'name' => 'Lainnya',
            'url' => '#!',
            'status' => 'aktif',
        ]);

        Page::create([
            'name' => 'Syarat & Ketentuan',
            'content' => '<div><strong>Peraturan dan Ketentuan Ternate Berlari 2024</strong><br>
<br>#Semua Peserta diwajibkan Membaca dan Memahami Peraturan dan Ketentuan sebelum Mendaftar Untuk Event Ternate Berlari.<br>
<br>1. Peserta Ternate Berlari adalah mereka yang mendaftar Resmi&nbsp; secara Online (Google Form) maupun secara Offline sebagai Peserta Ternate Berlari 2024.
<br>
<br>2. Peserta Ternate Berlari 2024 Kategori Atlet wajib mendaftarkan diri di kategori Elite Atlet, apabila ketahuan mendaftar di kategori Umum (Hobies) akan di diskualifikasi.
<br>
<br>3. Event Ternate Berlari sifatnya Lifestyle, tidak terikat dengan peraturan Resmi PB PASI. Segala Peraturan dan Ketentuan ditetapkan oleh penyelenggara Event.
<br>
<br>4. Event Ternate Berlari dibagi 3 Kategori, 5K Fun Run, 10K Race dan 21K Fun (Upgrade KM) bagi peserta yang ingin HM.
<br>
<br>5. Kategori 10K Race, Penyelenggara akan menggunakan Juri/wasit yang berlisensi dari PASI.
<br>
<br>6. Kategori Pelajar yang berumur dibawah 15 Tahun tidak diperkenankan mengikuti/mendaftar 10K Race tetapi penyelenggara mengarahkan kategori 5K Fun Run.
<br>
<br>7. Hadiah Podium/Pemenang pada kategori masing-masing berupa uang tunai yang nominalnya telah ditentukan oleh penyelenggara.
<br>
<br>8. Peserta Ternate Berlari 2024 tidak memiliki riwayat penyakit yang membahayakan dan memastikan dirinya dalam kondisi sehat sebelum mendaftar dan saat pelaksanaan Event.
<br>
<br>9. Penyelenggara Event Ternate Berlari dapat mengubah peraturan dan ketentuan sesuai dengan kebijakan sendiri tanpa pemberitahuan sebelumnya.
<br>
<br>10. Hal-hal yang belum tercantum dalam peraturan dan ketentuan ini akan disampaikan kemudian oleh penyelenggara event.</div>',
            'slug' => 'syarat-ketentuan',
            'menu_id' => 1, // Sesuaikan ID menu (2 = About)
            'status' => 'aktif',
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
            'size_jersey' => 'L',
            'bukti_bayar' => 'assets/img/Logo.png',
            'id_road_race' => 1,
            'id_kategori' => 1,
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
            'size_jersey' => 'M',
            'bukti_bayar' => 'assets/img/Logo.png',
            'id_road_race' => 2,
            'id_kategori' => 2,

        ]);
    }
}
