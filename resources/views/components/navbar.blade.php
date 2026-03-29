<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-transparent transition-[border-color,box-shadow] duration-300">
    <div class="max-w-7xl mx-auto px-5 lg:px-8 h-16 flex items-center justify-between">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="REKA" class="h-10 w-auto object-contain block" />
        </a>
        <ul class="hidden lg:flex items-center gap-6 list-none">
            <li><a href="{{ route('home') }}"      class="nav-link-item text-sm font-medium hover:text-gray-950 transition-colors {{ request()->routeIs('home') ? 'text-gray-950 font-semibold' : 'text-gray-500' }}">Beranda</a></li>
            <li><a href="{{ route('layanan') }}"   class="nav-link-item text-sm font-medium hover:text-gray-950 transition-colors {{ request()->routeIs('layanan') ? 'text-gray-950 font-semibold' : 'text-gray-500' }}">Layanan</a></li>
            <li><a href="{{ route('proses') }}"    class="nav-link-item text-sm font-medium hover:text-gray-950 transition-colors {{ request()->routeIs('proses') ? 'text-gray-950 font-semibold' : 'text-gray-500' }}">Proses</a></li>
            <li><a href="{{ route('portofolio') }}" class="nav-link-item text-sm font-medium hover:text-gray-950 transition-colors {{ request()->routeIs('portofolio') ? 'text-gray-950 font-semibold' : 'text-gray-500' }}">Portofolio</a></li>
            <li><a href="{{ route('produk.index') }}" class="nav-link-item text-sm font-medium hover:text-gray-950 transition-colors {{ request()->routeIs('produk.*') ? 'text-gray-950 font-semibold' : 'text-gray-500' }}">Produk</a></li>
            <li><a href="{{ route('blog.index') }}" class="nav-link-item text-sm font-medium hover:text-gray-950 transition-colors {{ request()->routeIs('blog.*') ? 'text-gray-950 font-semibold' : 'text-gray-500' }}">Blog</a></li>
            <li><a href="{{ route('kontak') }}"    class="nav-link-item text-sm font-medium hover:text-gray-950 transition-colors {{ request()->routeIs('kontak') ? 'text-gray-950 font-semibold' : 'text-gray-500' }}">Kontak</a></li>
        </ul>
        <a href="{{ route('kontak') }}" class="hidden lg:inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-gray-950 text-white text-sm font-medium hover:bg-gray-800 transition-colors">Mulai Proyek</a>
        <button id="hamburger" class="lg:hidden p-2 rounded-lg" aria-label="Menu">
            <i data-lucide="menu" class="w-5 h-5"></i>
        </button>
    </div>
    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-200 bg-white">
        <ul class="px-5 py-4 flex flex-col gap-3 list-none">
            <li><a href="{{ route('home') }}"          class="nav-link-item text-base font-medium hover:text-gray-950 block py-1 {{ request()->routeIs('home') ? 'text-gray-950 font-semibold' : 'text-gray-600' }}">Beranda</a></li>
            <li><a href="{{ route('layanan') }}"       class="nav-link-item text-base font-medium hover:text-gray-950 block py-1 {{ request()->routeIs('layanan') ? 'text-gray-950 font-semibold' : 'text-gray-600' }}">Layanan</a></li>
            <li><a href="{{ route('proses') }}"        class="nav-link-item text-base font-medium hover:text-gray-950 block py-1 {{ request()->routeIs('proses') ? 'text-gray-950 font-semibold' : 'text-gray-600' }}">Proses</a></li>
            <li><a href="{{ route('portofolio') }}"    class="nav-link-item text-base font-medium hover:text-gray-950 block py-1 {{ request()->routeIs('portofolio') ? 'text-gray-950 font-semibold' : 'text-gray-600' }}">Portofolio</a></li>
            <li><a href="{{ route('produk.index') }}"  class="nav-link-item text-base font-medium hover:text-gray-950 block py-1 {{ request()->routeIs('produk.*') ? 'text-gray-950 font-semibold' : 'text-gray-600' }}">Produk</a></li>
            <li><a href="{{ route('blog.index') }}"    class="nav-link-item text-base font-medium hover:text-gray-950 block py-1 {{ request()->routeIs('blog.*') ? 'text-gray-950 font-semibold' : 'text-gray-600' }}">Blog</a></li>
            <li><a href="{{ route('kontak') }}"        class="nav-link-item text-base font-medium hover:text-gray-950 block py-1 {{ request()->routeIs('kontak') ? 'text-gray-950 font-semibold' : 'text-gray-600' }}">Kontak</a></li>
        </ul>
        <div class="px-5 pb-5">
            <a href="{{ route('kontak') }}" class="flex items-center justify-center gap-2 px-6 py-3 rounded-full bg-gray-950 text-white text-sm font-medium">Mulai Proyek</a>
        </div>
    </div>
</nav>
