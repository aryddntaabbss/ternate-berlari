@extends('frontend.layouts.main')

@section('body')
    @include('frontend.layouts.header')
    @php
        $tanggalEvent = \Carbon\Carbon::parse($settings['tanggal_event']);
    @endphp
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
                        @if ($road_race->nama == 21)
                            <li>✔️ Jersey Finisher</li>
                        @endif
                    </ul>
                </div>

                <!-- Form Pendaftaran -->
                <div class="w-full bg-white p-6 shadow-xl rounded-lg" data-aos="fade-up" data-aos-duration="1500">

                    <form
                        @if (!$tanggalEvent->isPast()) action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data" @endif
                        class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        @csrf

                        <!-- Nama Lengkap -->
                        <div class="col-span-1">
                            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
        @error('nama_lengkap') border-red-500 @enderror"
                                value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NIK -->
                        <div class="col-span-1">
                            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                            <input type="number" name="nik" id="nik" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
        @error('nik') border-red-500 @enderror"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pekerjaan -->
                        <div class="col-span-1">
                            <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                            <input type="text" name="pekerjaan" id="pekerjaan" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
        @error('pekerjaan') border-red-500 @enderror"
                                value="{{ old('pekerjaan') }}">
                            @error('pekerjaan')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="col-span-1">
                            <label for="no_tlp" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input type="number" name="no_tlp" id="no_tlp" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
        @error('no_tlp') border-red-500 @enderror"
                                value="{{ old('no_tlp') }}">
                            @error('no_tlp')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="col-span-1">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <input type="text" name="alamat" id="alamat" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
        @error('alamat') border-red-500 @enderror"
                                value="{{ old('alamat') }}">
                            @error('alamat')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Komunitas -->
                        <div class="col-span-1">
                            <label for="komunitas" class="block text-sm font-medium text-gray-700">Komunitas</label>
                            <input type="text" name="komunitas" id="komunitas" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
        @error('komunitas') border-red-500 @enderror"
                                value="{{ old('komunitas') }}">
                            @error('komunitas')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Riwayat Penyakit -->
                        <div class="col-span-1">
                            <label for="riwayat_penyakit" class="block text-sm font-medium text-gray-700">Riwayat
                                Penyakit</label>
                            <input type="text" name="riwayat_penyakit" id="riwayat_penyakit" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
        @error('riwayat_penyakit') border-red-500 @enderror"
                                value="{{ old('riwayat_penyakit') }}">
                            @error('riwayat_penyakit')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kontak Darurat -->
                        <div class="col-span-1">
                            <label for="kontak_darurat" class="block text-sm font-medium text-gray-700">Kontak
                                Darurat</label>
                            <input type="text" name="kontak_darurat" id="kontak_darurat" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
        @error('kontak_darurat') border-red-500 @enderror"
                                value="{{ old('kontak_darurat') }}">
                            @error('kontak_darurat')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Golongan Darah -->
                        <div class="col-span-1">
                            <label for="golongan_darah" class="block text-sm font-medium text-gray-700">Golongan
                                Darah</label>
                            <select name="golongan_darah" id="golongan_darah" required
                                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
        @error('golongan_darah') border-red-500 @enderror">
                                <option value="">-- Pilih Golongan Darah --</option>
                                <option value="a" {{ old('golongan_darah') == 'a' ? 'selected' : '' }}>A</option>
                                <option value="b" {{ old('golongan_darah') == 'b' ? 'selected' : '' }}>B</option>
                                <option value="ab" {{ old('golongan_darah') == 'ab' ? 'selected' : '' }}>AB</option>
                                <option value="o" {{ old('golongan_darah') == 'o' ? 'selected' : '' }}>O</option>
                            </select>
                            @error('golongan_darah')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="id_road_race" id="" value="{{ $road_race->id }}">
                        @if ($road_race->nama == 10)
                            <!-- Kategori Usia -->
                            <div class="col-span-1">
                                <label for="kategori_usia" class="block text-sm font-medium text-gray-700">Kategori
                                    Usia</label>
                                <select name="id_kategori" id="kategori_usia" required
                                    class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                                @error('id_kategori') border-red-500 @enderror">
                                    <option value="">-- Pilih Kategori Usia --</option>
                                    @foreach ($kategori as $ku)
                                        @if ($ku->id != 1)
                                            <option value="{{ $ku->id }}"
                                                {{ old('id_kategori') == $ku->id ? 'selected' : '' }}>
                                                {{ $ku->name }} ({{ $ku->umur }})
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        @else
                            <input type="hidden" name="id_kategori" id="" value="1">
                        @endif

                        <!-- Size Jersey -->
                        <div class="col-span-1">
                            <label for="size_jersey" class="block text-sm font-medium text-gray-700">Size Jersey</label>
                            <select name="size_jersey" id="size_jersey" required
                                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                                @error('size_jersey') border-red-500 @enderror">
                                <option value="">-- Pilih Size Jersey --</option>
                                <option value="S" {{ old('size_jersey') == 'S' ? 'selected' : '' }}>S</option>
                                <option value="M" {{ old('size_jersey') == 'M' ? 'selected' : '' }}>M</option>
                                <option value="L" {{ old('size_jersey') == 'L' ? 'selected' : '' }}>L</option>
                                <option value="XL" {{ old('size_jersey') == 'XL' ? 'selected' : '' }}>XL</option>
                                <option value="XXL" {{ old('size_jersey') == 'XXL' ? 'selected' : '' }}>XXL</option>
                                <option value="3XL" {{ old('size_jersey') == '3XL' ? 'selected' : '' }}>3XL</option>
                                <option value="4XL" {{ old('size_jersey') == '4XL' ? 'selected' : '' }}>4XL</option>
                            </select>
                            @error('size_jersey')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Bukti Bayar -->
                        <div class="col-span-1">
                            <label for="bukti_bayar" class="block text-sm font-medium pb-1 text-gray-700">
                                Bukti Bayar (Upload Gambar)
                                <span class="ml-1 text-blue-500 cursor-pointer relative group">
                                    <!-- Icon for info -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zm-8-6a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm1 4H9v7h2V8z" />
                                    </svg>
                                    <!-- Tooltip message -->
                                    <div
                                        class="absolute hidden group-hover:block bg-gray-800 text-white text-xs rounded px-2 py-1 mt-1 w-48">
                                        File gambar harus dalam format PNG, JPG, atau JPEG, dengan ukuran maksimal 2 MB.
                                    </div>
                                </span>
                            </label>
                            <input type="file" name="bukti_bayar" id="bukti_bayar" accept="image/*" required
                                class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">

                            @error('bukti_bayar')
                                <p class="text-sm text-red-600 mt-1 ml-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Checkbox untuk Kesehatan -->
                        <div class="col-span-1 md:col-span-2 flex items-center">
                            <input type="checkbox" name="chek_sehat" id="chek_sehat" class="mr-2"
                                {{ old('chek_sehat') ? 'checked' : '' }}>
                            <label for="chek_sehat" class="text-sm text-gray-700">
                                Saya menyetujui dan secara langsung menyatakan sehat jasmani dan rohani.
                            </label>
                            @error('chek_sehat')
                                <p class="text-sm text-red-600 mt-1 ml-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Checkbox untuk Syarat dan Ketentuan -->
                        <div class="col-span-1 md:col-span-2 flex items-center">
                            <input type="checkbox" name="syarat_ketentuan" id="syarat_ketentuan" class="mr-2"
                                {{ old('syarat_ketentuan') ? 'checked' : '' }}>
                            <label for="syarat_ketentuan" class="text-sm text-gray-700">
                                Saya menyetujui
                                <a href="{{ url('/Menu/syarat-ketentuan') }}" class="text-indigo-500 hover:underline"
                                    target="_blank">
                                    Syarat dan Ketentuan
                                </a>
                            </label>
                            @error('syarat_ketentuan')
                                <p class="text-sm text-red-600 mt-1 ml-2">{{ $message }}</p>
                            @enderror
                        </div>



                        {{-- <!-- Tombol Submit -->
                        <div class="col-span-1 md:col-span-2 flex justify-center">
                            <button type="submit" id="submit_button"
                                class="w-full py-2 px-4 bg-indigo-500 text-white font-semibold rounded-md shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed"
                                disabled>
                                Daftar
                            </button>
                        </div> --}}


                        @if (!$tanggalEvent->isPast())
                            <!-- Tombol Submit -->
                            <div class="col-span-1 md:col-span-2 flex justify-center">
                                <button type="submit" id="submit_button"
                                    class="w-full py-2 px-4 bg-indigo-500 text-white font-semibold rounded-md shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed">
                                    Daftar
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const syaratKetentuan = $('#syarat_ketentuan');
            const cekSehat = $('#chek_sehat');
            const submitButton = $('#submit_button');

            // Set initial disabled state based on both checkbox statuses
            submitButton.prop('disabled', !(syaratKetentuan.is(':checked') && cekSehat.is(':checked')));

            // Event listener for checkbox changes
            syaratKetentuan.on('change', function() {
                submitButton.prop('disabled', !(syaratKetentuan.is(':checked') && cekSehat.is(':checked')));
            });

            cekSehat.on('change', function() {
                submitButton.prop('disabled', !(syaratKetentuan.is(':checked') && cekSehat.is(':checked')));
            });
        });
    </script>

    <!-- Scroll to Top Button -->
    @include('frontend.components.to-top')
@endsection
