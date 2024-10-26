@extends('frontend.layouts.main')

@section('body')
@include('frontend.layouts.header')
@include('frontend.layouts.hero')

<!-- Pricing Section -->
<section id="pendaftaran" class="mx-auto pb-12 px-4 max-w-5xl">
    <h2 class="text-3xl font-bold text-yellow-400 text-center py-16" data-aos="fade-up">PENDAFTARAN</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($road_race as $road_races)
        <div class="border rounded-lg my-3 p-6 text-center shadow-xl" data-aos="fade-up">
            <h3 class="text-5xl font-bold text-gray-600 mb-2">{{ $road_races->nama }} <span class="text-base">KM</span>
            </h3>
            <div class="text-2xl font-bold text-yellow-400 mb-2">Rp.
                {{ $road_races->biaya}}
            </div>
            <a href="{{ route('daftar', $road_races->id) }}"
                class="block py-2 px-4 mt-9 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 mb-4">
                Pilih Paket
            </a>
            <ul class="text-sm text-gray-400 space-y-2 mb-4 text-left">
                <li>✔️ Jersey Running</li>
                <li>✔️ Medali</li>
                <li>✔️ BIB</li>
            </ul>
        </div>
        @endforeach
    </div>
</section>

<!-- Tentang Section -->
<section id="about" class="mx-auto px-4 py-12 flex flex-col md:flex-row gap-9 justify-center items-center">
    <!-- Image -->
    <div class="lg:flex lg:col-span-5 justify-end items-center" data-aos="fade-right">
        <img src="{{ asset('storage/' . ($tentang->gambar_tentang ?? 'tentang.png')) }}" alt="Tentang Image"
            class="h-3/6 max-h-[300px] object-contain">
    </div>

    <!-- Text -->
    <div class="w-full md:w-1/2 md:pl-8" data-aos="fade-up">
        <h2 class="text-3xl font-bold text-yellow-400 mb-4" data-aos="fade-up">TENTANG KAMI</h2>
        <p class="text-gray-600 mb-4">
            {!! $tentang->deskripsi_tentang ?? 'Tentang kami tidak ditemukan.' !!}
        </p>
    </div>
</section>

<!-- Kategori Section -->
<section id="kategori" class="mx-auto px-4 text-center py-8">
    <h2 class="text-3xl font-bold text-yellow-400 mb-4" data-aos="fade-up">KATEGORI PELARI</h2>
    <div class="sm:mt-8 bg-cover bg-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6 py-8 md:px-8 justify-items-center bg-none sm:bg-[url('/assets/img/road.png')]"
        data-aos="zoom-out">
        @foreach ($data_peserta as $kp)
        {{-- ([
        ['title' => 'Pelajar Pria/Wanita', 'age' => '15 - 17 Tahun'],
        ['title' => 'Elit(Atlet) Pria/Wanita', 'age' => '17 - 34 Tahun'],
        ['title' => 'Hobbies Pria/Wanita', 'age' => '18 - 34 Tahun'],
        ['title' => 'Master A Pria/Wanita', 'age' => '35 - 44 Tahun'],
        ['title' => 'Master B Pria/Wanita', 'age' => '45 - 50 Tahun'],
        ['title' => 'Master C Pria/Wanita', 'age' => '50 Tahun +']
        ] as $category) --}}
        <div class="bg-zinc-800 bg-opacity-95 p-6 rounded-lg shadow-md transition duration-300 text-center w-full sm:w-48"
            data-aos="fade-up">
            <h3 class="text-md font-semibold text-white">{{ $kp->kategori->name }} {{ $kp->kategori->gender }}
            </h3>
            <p class="mt-2 text-gray-300">{{ $kp->kategori->umur }} Tahun</p>
        </div>
        @endforeach
    </div>
</section>

<!-- Shirt Size -->
<section id="jersey" class="mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Header -->
    <h2 class="col-span-1 md:col-span-2 text-3xl font-bold text-yellow-400 mb-6 text-center" data-aos="fade-up">UKURAN
        JERSEY</h2>

    <!-- Column 1: Pria -->
    <div data-aos="fade-right">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Ukuran Jersey Pria</h2>
        <div class="flex justify-center items-center mb-6">
            <img src="{{ asset('assets/img/man.png') }}" alt="Men's Shirt" class="w-full max-w-xs rounded-lg">
        </div>
        <div>
            <table class="w-full border-collapse border border-gray-300 text-center">
                <thead>
                    <tr>
                        <th class="border py-2 px-4 bg-gray-200">Ukuran</th>
                        <th class="border py-2 px-4 bg-gray-200">Lebar Dada (cm)</th>
                        <th class="border py-2 px-4 bg-gray-200">Panjang Jersey (cm)</th>
                        <th class="border py-2 px-4 bg-gray-200">Panjang Lengan (cm)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border py-2 px-4">S</td>
                        <td class="border py-2 px-4">48</td>
                        <td class="border py-2 px-4">68</td>
                        <td class="border py-2 px-4">21</td>
                    </tr>
                    <tr>
                        <td class="border py-2 px-4">M</td>
                        <td class="border py-2 px-4">50</td>
                        <td class="border py-2 px-4">70</td>
                        <td class="border py-2 px-4">22</td>
                    </tr>
                    <tr>
                        <td class="border py-2 px-4">L</td>
                        <td class="border py-2 px-4">52</td>
                        <td class="border py-2 px-4">72</td>
                        <td class="border py-2 px-4">23</td>
                    </tr>
                    <tr>
                        <td class="border py-2 px-4">XL</td>
                        <td class="border py-2 px-4">54</td>
                        <td class="border py-2 px-4">74</td>
                        <td class="border py-2 px-4">24</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Column 2: Wanita -->
    <div data-aos="fade-left">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Ukuran Jersey Wanita</h2>
        <div class="flex justify-center items-center mb-6">
            <img src="{{ asset('assets/img/woman.png') }}" alt="Women's Shirt" class="w-full max-w-xs rounded-lg">
        </div>
        <div>
            <table class="w-full border-collapse border border-gray-300 text-center">
                <thead>
                    <tr>
                        <th class="border py-2 px-4 bg-gray-200">Ukuran</th>
                        <th class="border py-2 px-4 bg-gray-200">Lebar Dada (cm)</th>
                        <th class="border py-2 px-4 bg-gray-200">Panjang Jersey (cm)</th>
                        <th class="border py-2 px-4 bg-gray-200">Panjang Lengan (cm)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border py-2 px-4">S</td>
                        <td class="border py-2 px-4">44</td>
                        <td class="border py-2 px-4">64</td>
                        <td class="border py-2 px-4">19</td>
                    </tr>
                    <tr>
                        <td class="border py-2 px-4">M</td>
                        <td class="border py-2 px-4">46</td>
                        <td class="border py-2 px-4">66</td>
                        <td class="border py-2 px-4">20</td>
                    </tr>
                    <tr>
                        <td class="border py-2 px-4">L</td>
                        <td class="border py-2 px-4">48</td>
                        <td class="border py-2 px-4">68</td>
                        <td class="border py-2 px-4">21</td>
                    </tr>
                    <tr>
                        <td class="border py-2 px-4">XL</td>
                        <td class="border py-2 px-4">50</td>
                        <td class="border py-2 px-4">70</td>
                        <td class="border py-2 px-4">22</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Scroll to Top Button -->
@include('frontend.components.to-top')

@endsection