@extends('frontend.layouts.main')

@section('body')

<!-- Section untuk Data Peserta -->
<section class="section mt-5">
    <div class="w-full mx-auto px-4">
        <h2 class="text-4xl font-bold text-gray-800 text-center pb-5" data-aos="fade-up" data-aos-duration="15000">
            DAFTAR PESERTA</h2>
        <div class="bg-white shadow-md rounded-lg" data-aos="fade-up" data-aos-duration="15000">
            <div class="p-6">
                <!-- Table with striped rows -->
                <div class="overflow-x-auto">
                    <table class=" min-w-full bg-white text-center border border-gray-300 rounded-lg">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-300">Nama Lengkap</th>
                                <th class="py-2 px-4 border-b border-gray-300">No Tlp</th>
                                <th class="py-2 px-4 border-b border-gray-300">Ukuran Jersey</th>
                                <th class="py-2 px-4 border-b border-gray-300">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_peserta as $peserta)
                            <!-- Looping data dari controller -->
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b border-gray-300">{{ $peserta->nama_lengkap }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $peserta->no_tlp }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $peserta->size_jersey }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">
                                    <a class="inline-block px-3 py-1 rounded-lg text-white {{ $peserta->status == 'terverifikasi' ? 'bg-green-500' : 'bg-red-500' }}"
                                        onclick="confirmStatusChange({{ $peserta->id }}, '{{ $peserta->status }}')">
                                        {{ ucfirst($peserta->status) }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Table with striped rows -->
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