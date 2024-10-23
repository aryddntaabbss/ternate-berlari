@extends('frontend.layouts.main')

@section('body')

<!-- Section untuk Data Peserta -->
<section class="mt-20">
    <div class="w-full max-w-7xl mx-auto">
        <h2 class="text-4xl font-bold text-gray-800 text-center pb-5" data-aos="fade-up" data-aos-duration="1500">
            FORM PENDAFTARAN
        </h2>

        <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-6 space-y-6 md:space-y-0">
            <!-- Card Paket -->
            <div class="w-96 bg-white border rounded-lg p-6 text-center shadow-xl" data-aos="fade-up"
                data-aos-duration="1500">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-200 p-3 border-1 rounded-md text-sm text-gray-400 mb-2 text-left">
                    <!-- Kolom Pertama -->
                    <div class="space-y-2 w-40 font-bold">
                        <p class="text-sm font-medium text-gray-700">Nama Bank</p>
                        <p class="text-sm font-medium text-gray-700">No Rekening</p>
                        <p class="text-sm font-medium text-gray-700">Nama Rekening</span></p>
                    </div>

                    <!-- Kolom Kedua -->
                    <div class="space-y-2 w-40 font-semibold">
                        <p class="text-gray-600">: Bank BRI</p>
                        <p class="text-gray-600">: 12345678910</p>
                        <p class="text-gray-600">: Aryaddinata</p>
                    </div>
                </div>
                <h3 class="text-5xl font-bold text-gray-600 mb-2">21<span class="text-base">KM</span></h3>
                <div class="text-2xl font-bold text-yellow-400 mb-2">Rp350.000</div>

                <ul class="text-sm text-gray-400 space-y-2 m-4 text-left">
                    <li>✔️ Jersey Running</li>
                    <li>✔️ Medali</li>
                    <li>✔️ BIB</li>
                    <li>✔️ Jersey Finisher</li>
                </ul>
            </div>

            <!-- Form Pendaftaran -->
            <div class="w-full bg-white p-6 shadow-xl rounded-lg" data-aos="fade-up" data-aos-duration="1500">
                <form action="" method="POST" enctype="multipart/form-data"
                    class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="col-span-1 w">
                        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="col-span-1">
                        <label for="no_tlp" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" name="no_tlp" id="no_tlp" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Riwayat Penyakit -->
                    <div class="col-span-1">
                        <label for="riwayat_penyakit" class="block text-sm font-medium text-gray-700">Riwayat
                            Penyakit</label>
                        <input type="text" name="riwayat_penyakit" id="riwayat_penyakit" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Kategori Usia -->
                    <div class="col-span-1">
                        <label for="kategori_usia" class="block text-sm font-medium text-gray-700">Kategori Usia</label>
                        <select name="kategori_usia" id="kategori_usia" required
                            class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">-- Pilih Kategori Usia --</option>
                            <option value="anak-anak">Anak-Anak</option>
                            <option value="remaja">Remaja</option>
                            <option value="dewasa">Dewasa</option>
                            <option value="lansia">Lansia</option>
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
                    <div class="col-span-2 flex justify-center">
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
<button id="scrollToTopBtn"
    class="fixed bottom-16 right-4 z-50 hidden p-3 bg-yellow-500 shadow-lg text-white rounded-full hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
    </svg>
</button>

@endsection

@section('js')
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script for Scroll to Top Button -->
<script>
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollToTopBtn.classList.remove('hidden');
        } else {
            scrollToTopBtn.classList.add('hidden');
        }
    });

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
@endsection