<!-- Hero Section -->
<section
    class="min-h-screen flex items-center bg-gradient-to-t from-gray-100 to-yellow-400 justify-center px-24 md:px-8 lg:px-16">
    <div class="grid mx-auto gap-6 md:gap-8 lg:py-16 lg:grid-cols-12">
        <!-- Teks Hero -->
        <div class="place-self-center col-span-2 lg:col-span-7 lg:text-left">
            <div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none text-white mb-4">
                    Selamat datang di Website {{ $websiteTitle }}
                </h1>
                <p class="text-lg font-semibold md:text-xl lg:text-2xl text-white mb-6 lg:mb-8">
                    {{ $websiteTitle }} adalah sebuah ajang lari yang menyatukan komunitas pecinta olahraga di Ternate,
                    menawarkan
                    pengalaman lari di antara pemandangan indah serta budaya kaya khas Kepulauan Maluku Utara.
                </p>
            </div>

            <!-- Waktu Hitung Mundur -->
            <div class="mb-6">
                <div id="countdown"
                    class="text-xl md:text-2xl flex justify-center lg:justify-center gap-2 font-semibold text-yellow-400 font-shadow-xl">
                    <div class="block w-16 md:w-20 bg-white p-2 rounded text-center shadow-lg">
                        <span id="days">00</span>
                        <div class="text-xs md:text-sm text-yellow-400 mt-2 font-bold">Hari</div>
                    </div>
                    <div class="block w-16 md:w-20 bg-white p-2 rounded text-center shadow-lg">
                        <span id="hours">00</span>
                        <div class="text-xs md:text-sm text-yellow-400 mt-2 font-bold">Jam</div>
                    </div>
                    <div class="block w-16 md:w-20 bg-white p-2 rounded text-center shadow-lg">
                        <span id="minutes">00</span>
                        <div class="text-xs md:text-sm text-yellow-400 mt-2 font-bold">Menit</div>
                    </div>
                    <div class="block w-16 md:w-20 bg-white p-2 rounded text-center shadow-lg">
                        <span id="seconds">00</span>
                        <div class="text-xs md:text-sm text-yellow-400 mt-2 font-bold">Detik</div>
                    </div>
                </div>
                @php
                    $tanggalEvent = \Carbon\Carbon::parse($settings['tanggal_event']);
                @endphp
                @if (!$tanggalEvent->isPast())
                    <div class="mt-6 lg:mt-9 justify-self-center">
                        <a href="#pendaftaran"
                            class="block w-full lg:w-52 px-3 py-2 text-center text-xl font-bold bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 shadow-xl">
                            Daftar Sekarang
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Gambar Hero -->
        <div class="hidden lg:flex lg:col-span-5 justify-center lg:justify-end items-center">
            <img src="{{ asset('assets/img/hero.png') }}" alt="Running Girl"
                class="w-80 max-w-xl md:max-w-md lg:max-w-lg h-auto object-contain">
        </div>
    </div>
</section>


<!-- Script Hitung Mundur -->
<script>
    // Mendefinisikan waktu target acara dari Blade
    var eventDate = new Date("{{ $settings['tanggal_event'] }}").getTime();

    // Fungsi untuk update hitungan mundur setiap detik
    var countdownTimer = setInterval(function() {
        // Mendapatkan waktu saat ini
        var now = new Date().getTime();

        // Jarak antara waktu sekarang dan event
        var distance = eventDate - now;

        // Kalkulasi hari, jam, menit, detik
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Menampilkan hasil dalam elemen dengan id="countdown"
        document.getElementById("days").textContent = days < 10 ? "0" + days : days;
        document.getElementById("hours").textContent = hours < 10 ? "0" + hours : hours;
        document.getElementById("minutes").textContent = minutes < 10 ? "0" + minutes : minutes;
        document.getElementById("seconds").textContent = seconds < 10 ? "0" + seconds : seconds;

        // Jika hitungan mundur selesai
        if (distance < 0) {
            clearInterval(countdownTimer);
            document.getElementById("countdown").innerHTML = "";
        }
    }, 1000);
</script>
