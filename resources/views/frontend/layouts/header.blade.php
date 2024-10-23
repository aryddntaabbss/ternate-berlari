<!-- Responsive Header -->
<header class="bg-gray-50 shadow-md w-full">
    <nav class="border-gray-200 px-4 lg:px-6 py-2.5">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <!-- Logo -->
            <a href="#" class="flex items-center">
                <img src="{{ asset('assets/img/Logo.png') }}" class="mr-3 h-10 sm:h-14" alt="Logo" />
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
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="#"
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
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 rounded lg:border-0 lg:p-2 hover:bg-yellow-500 hover:text-white">Data
                            Peserta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- JavaScript for Menu Toggle -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>