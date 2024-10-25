<!-- Footer -->
<footer class="bg-gray-100 text-black">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between">
            <p>{{ $settings['footer'] ?? '' }}</p>
            <nav class="space-x-4">
                <a href="{{ $socialMedia['Instagram'] ?? '' }}" class="hover:text-yellow-500"><i
                        class="fa-brands fa-instagram"></i></a>
                <a href="{{ $socialMedia['Facebook'] ?? '' }}" class="hover:text-yellow-500"><i
                        class="fa-brands fa-facebook-f"></i></a>
                <a href="{{ $socialMedia['YouTube'] ?? '' }}" class="hover:text-yellow-500"><i
                        class="fa-brands fa-youtube"></i></a>
                <a href="{{ $socialMedia['Twitter'] ?? '' }}" class="hover:text-yellow-500"><i
                        class="fa-brands fa-twitter"></i></a>
            </nav>
        </div>
    </div>
</footer>