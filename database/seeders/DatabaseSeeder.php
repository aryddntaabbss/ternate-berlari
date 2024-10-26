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
            'password' => Hash::make('admin123'),
        ]);

        Setting::create([
            'name' => 'footer',
            'value' => '© Copyright Ternate Berlari 2024. All Rights Reserved.',
        ]);
        Setting::create([
            'name' => 'tanggal_event',
            'value' => '2024-10-25',
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

        DB::table('deskripsi_website')->insert([
            'url' => 'http://localhost/',
            'logo' => 'Ternate Berlari',
            'title' => 'Ternate Berlari',
            'keyword' => 'website,laravel,local',
            'deskripsi' => 'This is the description for my website.',
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
            'nama_bank' => 'Bank Central Asia (BCA)',
            'no_rekening' => '1234567890',
            'nama_rekening' => 'John Doe',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tentang')->insert([
            'deskripsi_tentang' => 'Isi Tentang Website Ini',
            'gambar_tentang' => 'hero.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        RoadRace::create([
            'nama' => '10',
            'biaya' => 180000,
            'paling_laris' => true,
        ]);
        Kategori::create([
            'name' => 'Pelajar',
            'umur' => '30 - 20',
            'gender' => 'Pria/Wanita',
        ]);
        Kategori::create([
            'name' => 'Mahasiswa',
            'umur' => '30 - 20',
            'gender' => 'Pria/Wanita',
        ]);

        Menu::create([
            'name' => 'Lainnya',
            'url' => '#!',
            'status' => 'aktif',
        ]);

        Page::create([
            'name' => 'Syarat & Ketentuan',
            'content' => '<div><strong>Syarat dan Ketentuan Ternate Berlari<br></strong><br></div><div><strong>1. Pendaftaran Peserta</strong></div><div>Pendaftaran hanya dapat dilakukan secara online melalui situs resmi <strong>Ternate Berlari</strong>.</div><div>Peserta diwajibkan mengisi data diri dengan benar dan lengkap.</div><div>Biaya pendaftaran yang telah dibayarkan <strong>tidak dapat dikembalikan</strong> dalam kondisi apapun.</div><div>Peserta harus berusia minimal <strong>15 tahun</strong> pada hari perlombaan, kecuali kategori khusus yang diatur oleh panitia.</div><div><br></div><div><strong>2. Kriteria Peserta</strong></div><div>Peserta wajib dalam kondisi <strong>sehat jasmani dan rohani</strong>. Jika diperlukan, panitia berhak meminta surat keterangan sehat dari dokter.</div><div>Peserta yang memiliki riwayat kesehatan tertentu (seperti jantung atau asma) <strong>wajib</strong> berkonsultasi dengan dokter terlebih dahulu.</div><div>Peserta dilarang menggunakan <strong>narkoba</strong> atau <strong>doping</strong> selama acara berlangsung.</div><div><br></div><div><strong>3. Kategori Lomba dan Jarak Tempuh</strong></div><div>Lomba akan dibagi dalam beberapa kategori berdasarkan jarak tempuh:</div><div><strong>5K</strong> – Kategori Fun Run</div><div><strong>10K</strong> – Kategori Umum</div><div><strong>21K</strong> – Half Marathon</div><div>Peserta harus memilih kategori lomba saat pendaftaran dan tidak bisa mengganti kategori setelah pendaftaran selesai.</div><div><br></div><div><strong>4. Perlengkapan dan Nomor Dada</strong></div><div>Setiap peserta wajib menggunakan <strong>nomor dada</strong> yang telah disediakan oleh panitia.</div><div>Peserta tidak diperbolehkan mengganti atau memodifikasi nomor dada.</div><div>Peserta harus mengenakan pakaian dan sepatu olahraga yang sesuai dan aman untuk berlari.</div><div><br></div><div><strong>5. Peraturan Selama Lomba</strong></div><div>Peserta wajib mematuhi <strong>rute lomba</strong> yang telah ditentukan oleh panitia.</div><div>Dilarang menggunakan kendaraan atau alat bantu selama lomba berlangsung.</div><div>Jika ditemukan peserta melakukan <strong>kecurangan</strong>, seperti memotong rute, peserta akan didiskualifikasi.</div><div>Peserta yang tidak mampu menyelesaikan lomba di waktu yang telah ditentukan <strong>akan dinyatakan gagal</strong>.</div><div><br></div><div><strong>6. Keamanan dan Pertolongan Medis</strong></div><div>Tim medis dan petugas keamanan akan disiagakan di sepanjang rute dan garis finish.</div><div>Jika peserta mengalami kondisi darurat, diharapkan segera mencari bantuan ke pos medis terdekat.</div><div>Panitia tidak bertanggung jawab atas cedera atau kecelakaan yang terjadi akibat kelalaian peserta.</div><div><br></div><div><strong>7. Hadiah dan Penghargaan</strong></div><div>Hadiah dan penghargaan akan diberikan kepada <strong>juara 1, 2, dan 3</strong> di setiap kategori.</div><div>Pajak hadiah ditanggung oleh <strong>pemenang</strong> sesuai dengan ketentuan peraturan pajak yang berlaku.</div><div>Panitia berhak membatalkan kemenangan jika ditemukan kecurangan atau pelanggaran.</div><div><br></div><div><strong>8. Perubahan dan Pembatalan Acara</strong></div><div>Panitia berhak melakukan <strong>perubahan rute</strong> atau <strong>jadwal lomba</strong> jika terdapat keadaan darurat atau cuaca buruk.</div><div>Jika acara terpaksa dibatalkan karena alasan di luar kendali panitia, biaya pendaftaran tidak dapat dikembalikan.</div><div><br></div><div><strong>9. Hak Cipta dan Dokumentasi</strong></div><div>Peserta memberikan izin kepada panitia untuk menggunakan foto atau video dokumentasi acara untuk kepentingan promosi tanpa kompensasi tambahan.</div><div>Peserta dilarang menggunakan logo dan materi promosi <strong>Ternate Berlari</strong> tanpa izin tertulis dari panitia.</div><div><br></div><div><strong>10. Persetujuan Peserta</strong></div><div>Dengan mengikuti acara <strong>Ternate Berlari</strong>, peserta dianggap telah membaca, memahami, dan menyetujui semua syarat dan ketentuan yang berlaku.</div><div>Keputusan panitia bersifat <strong>mutlak</strong> dan tidak dapat diganggu gugat.</div><div><br></div><div>Dokumen ini memastikan bahwa semua peserta memahami dan mematuhi aturan serta memberikan perlindungan kepada panitia dan peserta. Anda dapat menyesuaikan isi ini jika diperlukan agar sesuai dengan kebijakan khusus acara <strong>Ternate Berlari</strong>.</div>',
            'slug' => 'syarat-ketentuan',
            'menu_id' => 1, // Sesuaikan ID menu (2 = About)
            'status' => 'aktif',
        ]);
    }
}
