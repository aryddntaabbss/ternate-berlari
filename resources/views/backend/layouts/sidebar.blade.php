<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-people"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="{{ route('peserta.index') }}">
                <i class="bi bi-people"></i>
                <span>Data Peserta</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="{{ route('menu') }}">
                <i class="bi bi-people"></i>
                <span>Menu</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="{{ route('pages') }}">
                <i class="bi bi-people"></i>
                <span>Pages</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Kategori</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('road-race.index') }}">
                        <i class="bi bi-circle"></i><span>Kategori Road Race</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kategori.index') }}">
                        <i class="bi bi-circle"></i><span>Kategori Lari</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="">
                <i class="bi bi-people"></i>
                <span>Kategori Lari</span>
            </a>
        </li><!-- End Profile Page Nav --> --}}
        {{-- <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="">
                <i class="bi bi-people"></i>
                <span>Manajemen User</span>
            </a>
        </li><!-- End Profile Page Nav --> --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="{{ route('settings') }}">
                <i class="bi bi-people"></i>
                <span>Pengaturan</span>
            </a>
        </li><!-- End Profile Page Nav -->
    </ul>

</aside><!-- End Sidebar-->
