<!-- Footer -->
<footer class="bg-gray-100 text-black">
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <!-- Column for Footer Text -->
            <div class="mb-4 md:mb-0 md:w-1/2 md:flex md:justify-start">
                <p>{{ $settings['footer'] ?? '' }}</p>
            </div>
            <!-- Column for Social Media Links -->
            <nav class="flex md:w-1/2 space-x-4 justify-end">
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