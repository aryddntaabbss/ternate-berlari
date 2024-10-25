<!-- Responsive Header -->
<header class="top-0 left-0 w-full py-2 bg-white shadow-md z-50">
    <nav class="border-gray-200 px-4 lg:px-6 py-1">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <!-- Logo -->
            <a href="{{ route('index') }}" class="flex items-center">
                <img src="{{ asset('storage/' . $websiteLogo) }}" class="mr-3 h-10 sm:h-10" alt="Logo" />
            </a>

            <!-- Hamburger Button -->
            <button id="menu-toggle" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>

            <!-- Navigation Links -->
            <div class="hidden w-full lg:flex lg:w-auto" id="mobile-menu">
                <ul class="flex flex-col font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{ route('index') }}"
                            class="block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:text-primary-700 lg:p-2 hover:bg-yellow-500 hover:text-white"
                            aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#about"
                            class="block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:text-primary-700 lg:p-2 hover:bg-yellow-500 hover:text-white"
                            aria-current="page">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="#kategori"
                            class="block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:text-primary-700 lg:p-2 hover:bg-yellow-500 hover:text-white"
                            aria-current="page">Kategori</a>
                    </li>
                    <li>
                        <a href="#jersey"
                            class="block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:text-primary-700 lg:p-2 hover:bg-yellow-500 hover:text-white"
                            aria-current="page">Ukuran Baju</a>
                    </li>

                    @foreach ($menus as $menu)
                    <!-- Dropdown -->
                    <li class="group" id="dropdown">
                        <button
                            class="block py-2 pr-4 pl-3 rounded-sm lg:bg-transparent lg:text-primary-700 lg:p-2 hover:bg-yellow-500 hover:text-white"
                            aria-haspopup="true" aria-expanded="false">
                            {{ $menu->name }}
                        </button>
                        <!-- Dropdown Content -->
                        <div class="absolute hidden group-hover:block bg-white shadow-xl mt-2 py-2 px-2 rounded border-2 border-gray-200 focus:border-yellow-500 focus:ring-yellow-500 w-40 z-10"
                            id="dropdown-menu">
                            @foreach ($menu->pages as $item)
                            <a href="{{ route('blank', $item->slug) }}"
                                class="block w-auto px-2 rounded-sm py-2 text-sm text-gray-700 hover:bg-yellow-500 hover:text-white">
                                {{ $item->name }}
                            </a>
                            @endforeach
                        </div>
                    </li>
                    @endforeach

                    <li>
                        <a href="{{ route('peserta') }}"
                            class="block py-2 pr-4 pl-3 rounded lg:border-0 lg:p-2 hover:bg-yellow-500 hover:text-white">Data
                            Peserta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- JavaScript for Menu Toggle and Dropdown -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Dropdown functionality
    const dropdownButton = document.querySelector('#dropdown > button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>