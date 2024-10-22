<!-- Hero Section -->
<section class="h-screen flex items-center bg-gradient-to-t from-gray-100 to-yellow-400 justify-center">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-32 lg:py-16 lg:grid-cols-12">
        <!-- Teks Hero -->
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">
                Selamat datang di Website Ternate Berlari
            </h1>
            <p class="max-w-2xl mb-6 font-light text-white lg:mb-8 md:text-lg lg:text-xl">
                From checkout to global sales tax compliance, companies around the world use Flowbite to simplify their
                payment stack.
            </p>

            <!-- Waktu Hitung Mundur -->
            <div class="mb-6">
                <div id="countdown" class="text-3xl flex gap-5 justify-center font-semibold text-yellow-400">
                    <div class="block w-20 bg-white p-3 rounded text-center shadow-lg">
                        <span id="days">00</span>
                        <div class="text-sm text-gray-600 mt-2 font-bold">Hari</div>
                    </div>
                    <div class="block w-20 bg-white p-3 rounded text-center shadow-lg">
                        <span id="hours">00</span>
                        <div class="text-sm text-gray-600 mt-2 font-bold">Jam</div>
                    </div>
                    <div class="block w-20 bg-white p-3 rounded text-center shadow-lg">
                        <span id="minutes">00</span>
                        <div class="text-sm text-gray-600 mt-2 font-bold">Menit</div>
                    </div>
                    <div class="block w-20 bg-white p-3 rounded text-center shadow-lg">
                        <span id="seconds">00</span>
                        <div class="text-sm text-gray-600 mt-2 font-bold">Detik</div>
                    </div>
                </div>
                <div class="justify-self-center"><a href="#pendaftaran"
                        class="block text-3xl w-96 justify-center text-center font-bold py-5 px-4 mt-9 bg-yellow-400 text-white rounded-lg hover:bg-yellow-400 shadow-xl mb-4">Daftar
                        Sekarang</a>
                </div>

            </div>
        </div>

        <!-- Gambar Hero -->
        <div class="hidden lg:flex lg:col-span-5 justify-end items-center">
            <img src="{{ asset('assets/img/running-girl.png') }}" alt="Running Girl"
                class="h-5/6 max-h-[500px] object-contain">
        </div>
    </div>
</section>

<!-- Script Hitung Mundur -->
<script>
    // Set waktu tujuan acara (contoh: 31 Desember 2024 pukul 00:00:00)
    const eventDate = new Date("December 31, 2024 00:00:00").getTime();

    // Update countdown setiap detik
    const countdownTimer = setInterval(function() {
        // Waktu saat ini
        const now = new Date().getTime();

        // Jarak antara sekarang dan waktu acara
        const distance = eventDate - now;

        // Perhitungan hari, jam, menit, dan detik
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Tampilkan hasil dalam elemen dengan id="countdown"
        document.getElementById("days").innerHTML = days < 10 ? "0" + days : days;
        document.getElementById("hours").innerHTML = hours < 10 ? "0" + hours : hours;
        document.getElementById("minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
        document.getElementById("seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;

        // Jika hitungan mundur selesai
        if (distance < 0) {
            clearInterval(countdownTimer);
            document.getElementById("countdown").innerHTML = "Event Sedang Berlangsung!";
        }
    }, 1000);
</script>