@extends('frontend.layouts.main')

@section('body')
@include('frontend.layouts.header')

<!-- Section untuk Data Peserta -->
<section class="mt-4 px-5">
    <div class="w-full max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 text-center pb-5" data-aos="fade-up" data-aos-duration="1500">
            FORM PENDAFTARAN
        </h2>

        <div class="flex flex-col md:flex-row justify-center space-y-6 md:space-y-0 md:space-x-6">
            <!-- Card Paket -->
            <div class="w-full lg:w-3/6 bg-white border rounded-lg xl:p-6 p-3 text-center shadow-xl" data-aos="fade-up"
                data-aos-duration="1500">
                <div
                    class="grid lg:w-full grid-cols-2 gap-2 bg-gray-200 p-3 border rounded-md text-sm text-gray-400 mb-2 text-left">
                    <!-- Kolom Pertama -->
                    <div class="space-y-2 font-bold">
                        <p class="text-sm font-medium text-gray-700">Nama Bank</p>
                        <p class="text-sm font-medium text-gray-700">No Rekening</p>
                        <p class="text-sm font-medium text-gray-700">Nama Rekening</p>
                    </div>

                    <!-- Kolom Kedua -->
                    <div class="space-y-2 w-40 md:w-auto font-semibold">
                        <p class="text-gray-600">: {{ $bank->nama_bank }}</p>
                        <p class="text-gray-600">: {{ $bank->no_rekening }}</p>
                        <p class="text-gray-600">: {{ $bank->nama_rekening }}</p>
                    </div>
                </div>
                <h3 class="text-5xl font-bold text-gray-600 mb-2">{{ $road_race->nama }}<span
                        class="text-base">KM</span></h3>
                <div class="text-2xl font-bold text-yellow-400 mb-2">Rp. {{ $road_race->biaya }}</div>

                <ul class="text-sm text-gray-400 space-y-2 m-4 text-left">
                    <li>✔️ Jersey Running</li>
                    <li>✔️ Medali</li>
                    <li>✔️ BIB</li>
                    <li>✔️ Jersey Finisher</li>
                </ul>
            </div>

            <!-- Form Pendaftaran -->
            <div class="w-full bg-white p-6 shadow-xl rounded-lg" data-aos="fade-up" data-aos-duration="1500">
                <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data"
                    class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="col-span-1">
                        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- NIK -->
                    <div class="col-span-1">
                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" name="nik" id="nik" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Pekerjaan -->
                    <div class="col-span-1">
                        <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="col-span-1">
                        <label for="no_tlp" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" name="no_tlp" id="no_tlp" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Alamat -->
                    <div class="col-span-1">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <input type="text" name="alamat" id="alamat" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Komunitas -->
                    <div class="col-span-1">
                        <label for="komunitas" class="block text-sm font-medium text-gray-700">Komunitas</label>
                        <input type="text" name="komunitas" id="komunitas" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Riwayat Penyakit -->
                    <div class="col-span-1">
                        <label for="riwayat_penyakit" class="block text-sm font-medium text-gray-700">Riwayat
                            Penyakit</label>
                        <input type="text" name="riwayat_penyakit" id="riwayat_penyakit" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Kontak Darurat -->
                    <div class="col-span-1">
                        <label for="kontak_darurat" class="block text-sm font-medium text-gray-700">Kontak
                            Darurat</label>
                        <input type="text" name="kontak_darurat" id="kontak_darurat" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Golongan Darah -->
                    <div class="col-span-1">
                        <label for="golongan_darah" class="block text-sm font-medium text-gray-700">Golongan
                            Darah</label>
                        <select name="golongan_darah" id="golongan_darah" required
                            class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">-- Pilih Golongan Darah --</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="ab">AB</option>
                            <option value="o">O</option>
                        </select>
                    </div>

                    <input type="hidden" name="id_road_race" id="" value="{{ $road_race->id }}">
                    <!-- Kategori Usia -->
                    <div class="col-span-1">
                        <label for="kategori_usia" class="block text-sm font-medium text-gray-700">Kategori Usia</label>
                        <select name="id_kategori" id="kategori_usia" required
                            class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">-- Pilih Kategori Usia --</option>
                            @foreach ($kategori as $ku)
                            <option value="{{ $ku->id }}">{{ $ku->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Size Jersey -->
                    <div class="col-span-1">
                        <label for="size_jersey" class="block text-sm font-medium text-gray-700">Size Jersey</label>
                        <select name="size_jersey" id="size_jersey" required
                            class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">-- Pilih Size Jersey --</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>

                    <!-- Bukti Bayar -->
                    <div class="col-span-1">
                        <label for="bukti_bayar" class="block text-sm font-medium pb-1 text-gray-700">Bukti Bayar
                            (Upload
                            Gambar)</label>
                        <input type="file" name="bukti_bayar" id="bukti_bayar" accept="image/*" required
                            class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Tombol Submit -->
                    <div class="col-span-1 md:col-span-2 flex justify-center">
                        <button type="submit"
                            class="w-full py-2 px-4 bg-indigo-500 text-white font-semibold rounded-md shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Scroll to Top Button -->
@include('frontend.components.to-top')

@endsection

@section('js')
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection