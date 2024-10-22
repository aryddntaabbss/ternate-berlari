@extends('frontend.layouts.main')

@section('body')
@section('outmain')
@include('frontend.layouts.header')
@include('frontend.layouts.hero')
@endsection

<!-- Pricing Section -->
<section id="pendaftaran" class="mx-auto py-12 px-4 max-w-7xl">
    <h2 class="text-4xl font-bold text-gray-800 text-center py-16">Pendaftaran</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Paket Single -->
        <div class="border rounded-lg p-6 text-center shadow-xl">
            <h3 class="text-5xl font-bold text-gray-600 mb-2">5<span class="text-base">KM</span></h3>
            <div class="text-2xl font-bold text-yellow-400 mb-2">Rp175.000</div>
            <a href="#" class="block py-2 px-4 mt-9 bg-yellow-400 text-white rounded-lg hover:bg-yellow-400 mb-4">Pilih
                Paket</a>
            <ul class="text-sm text-gray-400 space-y-2 mb-4 text-left">
                <li>✔️ Jersey Running</li>
                <li>✔️ Medali</li>
                <li>✔️ BIB</li>
            </ul>
        </div>

        <!-- Paket Premium -->
        <div class="border-2 rounded-lg p-6 text-center shadow-xl border-yellow-400 relative">
            <div class="absolute  bg-yellow-400 text-white py-1">
                {{-- <p class="text-sm font-bold">PALING LARIS!</p> --}}
            </div>
            <h3 class="text-5xl font-bold text-gray-600 mb-2">10<span class="text-base">KM</span></h3>
            <div class="text-2xl font-bold text-yellow-400 mb-2">Rp200.000</div>
            <a href="#" class="block py-2 px-4 mt-9 bg-yellow-400 text-white rounded-lg hover:bg-yellow-400 mb-4">Pilih
                Paket</a>
            <ul class="text-sm text-gray-400 space-y-2 mb-4 text-left">
                <li>✔️ Jersey Running</li>
                <li>✔️ Medali</li>
                <li>✔️ BIB</li>
            </ul>
        </div>

        <!-- Paket Business -->
        <div class="border rounded-lg p-6 text-center shadow-xl">
            <h3 class="text-5xl font-bold text-gray-600 mb-2">21<span class="text-base">KM</span></h3>
            <div class="text-2xl font-bold text-yellow-400 mb-2">Rp350.000</div>
            <a href="#" class="block py-2 px-4 mt-9 bg-yellow-400 text-white rounded-lg hover:bg-yellow-400 mb-4">Pilih
                Paket</a>
            <ul class="text-sm text-gray-400 space-y-2 mb-4 text-left">
                <li>✔️ Jersey Running</li>
                <li>✔️ Medali</li>
                <li>✔️ BIB</li>
                <li>✔️ Jersey Finisher</li>
            </ul>
        </div>
    </div>
</section>

<!-- Image and Text Section -->
<section class="mx-auto px-4 py-12 flex flex-col md:flex-row gap-9 justify-center items-center">
    <!-- Image  -->
    <div class="lg:flex lg:col-span-5 justify-end items-center">
        <img src="{{ asset('assets/img/running-girl.png') }}" alt="Running Girl"
            class="h-3/6 max-h-[300px] object-contain">
    </div>

    <!-- Text -->
    <div class="w-full md:w-1/2 md:pl-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Engaging Title Goes Here</h2>
        <p class="text-gray-600 mb-4">
            This is an example of a paragraph placed to the right of the image. It can be used to provide
            additional information or context related to the image shown. The layout adjusts automatically
            to maintain a responsive appearance across different screen sizes.
        </p>
        <p class="text-gray-600">
            The layout uses a flexbox to align the image and text side by side on larger screens, while
            stacking them vertically on smaller screens for better readability.
        </p>
    </div>
</section>

<!-- Kategori Section -->
<section class="mx-auto px-4 justify-center items-center text-center py-12">
    <h2 class="text-4xl font-bold text-gray-800 mb-4">Kategori Berlari</h2>
    <!-- Menggunakan flexbox dan grid untuk meratakan card ke tengah secara responsif -->
    <div class="sm:mt-8 bg-cover bg-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6 py-10 md:px-20 justify-items-center
               bg-none sm:bg-[url('/assets/img/road.png')]">
        <!-- Feature Card 1 -->
        <div
            class="bg-zinc-800 bg-opacity-95 p-6 rounded-lg shadow-md transition duration-300 text-center w-full sm:w-64">
            <h3 class="text-xl font-semibold text-white">Pelajar Pria/Wanita</h3>
            <p class="mt-2 text-gray-300">15 - 17 Tahun</p>
        </div>

        <!-- Feature Card 2 -->
        <div
            class="bg-zinc-800 bg-opacity-95 p-6 rounded-lg shadow-md transition duration-300 text-center w-full sm:w-64">
            <h3 class="text-xl font-semibold text-white">Elit(Atlet) Pria/Wanita</h3>
            <p class="mt-2 text-gray-300">17 - 34 Tahun</p>
        </div>

        <!-- Feature Card 3 -->
        <div
            class="bg-zinc-800 bg-opacity-95 p-6 rounded-lg shadow-md transition duration-300 text-center w-full sm:w-64">
            <h3 class="text-xl font-semibold text-white">Hobbies Pria/Wanita</h3>
            <p class="mt-2 text-gray-300">18 - 34 Tahun</p>
        </div>

        <!-- Feature Card 4 -->
        <div
            class="bg-zinc-800 bg-opacity-95 p-6 rounded-lg shadow-md transition duration-300 text-center w-full sm:w-64">
            <h3 class="text-xl font-semibold text-white">Master A Pria/Wanita</h3>
            <p class="mt-2 text-gray-300">35 - 44 Tahun</p>
        </div>

        <!-- Feature Card 5 -->
        <div
            class="bg-zinc-800 bg-opacity-95 p-6 rounded-lg shadow-md transition duration-300 text-center w-full sm:w-64">
            <h3 class="text-xl font-semibold text-white">Master B Pria/Wanita</h3>
            <p class="mt-2 text-gray-300">45 - 50 Tahun</p>
        </div>

        <!-- Feature Card 5 -->
        <div
            class="bg-zinc-800 bg-opacity-95 p-6 rounded-lg shadow-md transition duration-300 text-center w-full sm:w-64">
            <h3 class="text-xl font-semibold text-white">Master C Pria/Wanita</h3>
            <p class="mt-2 text-gray-300">50 Tahun +</p>
        </div>
    </div>
</section>

<!-- Shirt Size -->
<section class="mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Header -->
    <h2 class="col-span-1 md:col-span-2 text-4xl font-bold text-gray-800 mb-6 text-center">Ukuran Baju</h2>

    <!-- Column 1: Pria -->
    <div>
        <!-- Image -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Ukuran Baju Pria</h2>
        <div class="flex justify-center items-center mb-6">
            <img src="{{ asset('assets/img/man.png') }}" alt="Men's Shirt" class="w-full max-w-xs rounded-lg">
        </div>

        <!-- Tabel Ukuran Pria -->
        <div>
            <table class="w-full border-collapse border border-gray-300 text-center">
                <thead>
                    <tr>
                        <th class="border py-2 px-4 bg-gray-200">Ukuran</th>
                        <th class="border py-2 px-4 bg-gray-200">Lebar Dada (cm)</th>
                        <th class="border py-2 px-4 bg-gray-200">Panjang Baju (cm)</th>
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
    <div>
        <!-- Image -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Ukuran Baju Wanita</h2>
        <div class="flex justify-center items-center mb-6">
            <img src="{{ asset('assets/img/woman.png') }}" alt="Women's Shirt" class="w-full max-w-xs rounded-lg">
        </div>

        <!-- Tabel Ukuran Wanita -->
        <div>
            <table class="w-full border-collapse border border-gray-300 text-center">
                <thead>
                    <tr>
                        <th class="border py-2 px-4 bg-gray-200">Ukuran</th>
                        <th class="border py-2 px-4 bg-gray-200">Lebar Dada (cm)</th>
                        <th class="border py-2 px-4 bg-gray-200">Panjang Baju (cm)</th>
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
<button id="scrollToTopBtn"
    class="fixed bottom-28 right-4 z-50 hidden p-3 bg-yellow-500 shadow-xl text-white rounded-full hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
    </svg>
</button>

<!-- JavaScript for Scroll to Top Button -->
<script>
    // Get the button
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    // Show/hide button on scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollToTopBtn.classList.remove('hidden');
        } else {
            scrollToTopBtn.classList.add('hidden');
        }
    });

    // Scroll to top when the button is clicked
    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>

@include('frontend.layouts.footer')
@endsection