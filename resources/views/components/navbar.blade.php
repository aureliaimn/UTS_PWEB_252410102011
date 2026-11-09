@props(['username' => null])

@php
    $menu = [
        ['dashboard', 'Dashboard'],
        ['pengelolaan', 'Pengelolaan Stok'],
        ['profile', 'Profil'],
    ];
@endphp

<header class="bg-[#5C4033] text-white">
    <nav class="mx-auto flex max-w-5xl flex-wrap items-center justify-between px-5 py-3">
        <a href="{{ route('dashboard', ['username' => $username]) }}" class="flex items-center gap-2 text-lg font-extrabold">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Teras Kopi" class="h-7 w-7">
            Teras Kopi
        </a>

        <button type="button" id="tombol-menu" aria-label="Buka menu" aria-expanded="false" aria-controls="menu-navbar"
                class="rounded-md p-2 hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-white md:hidden">
            <svg id="ikon-buka" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg id="ikon-tutup" class="hidden h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M6 6l12 12M18 6L6 18"/>
            </svg>
        </button>

        <ul id="menu-navbar" class="hidden w-full flex-col gap-1 pt-3 text-sm md:flex md:w-auto md:flex-row md:items-center md:pt-0">
            @foreach ($menu as [$rute, $label])
                <li>
                    <a href="{{ route($rute, ['username' => $username]) }}"
                       class="block rounded-md px-3 py-2 md:py-1.5 {{ request()->routeIs($rute) ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
                        {{ $label }}
                    </a>
                </li>
            @endforeach
            <li>
                <a href="{{ route('login') }}" class="block rounded-md px-3 py-2 hover:bg-white/10 md:py-1.5">Keluar</a>
            </li>
        </ul>
    </nav>
</header>

<script>
    (function () {
        var tombol = document.getElementById('tombol-menu');
        var menu = document.getElementById('menu-navbar');
        var ikonBuka = document.getElementById('ikon-buka');
        var ikonTutup = document.getElementById('ikon-tutup');

        tombol.addEventListener('click', function () {
            var terbuka = menu.classList.toggle('hidden') === false;
            tombol.setAttribute('aria-expanded', terbuka);
            tombol.setAttribute('aria-label', terbuka ? 'Tutup menu' : 'Buka menu');
            ikonBuka.classList.toggle('hidden', terbuka);
            ikonTutup.classList.toggle('hidden', !terbuka);
        });
    })();
</script>