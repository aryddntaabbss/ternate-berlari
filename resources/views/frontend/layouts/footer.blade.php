<!-- Footer -->
<footer class="bg-gray-100 text-black">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between">
            <p>{{ $settings['footer'] ?? '' }}</p>
            {{-- <p>{{ $settings['tanggal_event'] ?? '' }}</p> --}}
            <nav class="space-x-4">
                <a href="#" class="hover:text-yellow-500">Privacy Policy</a>
                <a href="#" class="hover:text-yellow-500">Terms of Service</a>
            </nav>
        </div>
    </div>
</footer>