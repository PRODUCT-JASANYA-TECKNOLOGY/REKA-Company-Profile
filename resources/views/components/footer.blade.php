<footer class="border-t border-gray-200 bg-white">
    <div class="max-w-7xl mx-auto px-5 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-10">
            <div class="lg:col-span-2">
                <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="REKA"
                        class="h-10 mb-4" /></a>
                <p class="text-sm leading-relaxed text-gray-500 max-w-xs mb-5">REKA adalah unit solusi digital dari
                    Jasanya.id yang berfokus pada pengembangan software dan sistem bisnis yang scalable &amp; reliable.
                </p>
                <div
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500 border border-gray-200 mb-4">
                    Bagian dari <a href="https://jasanya.id" target="_blank"
                        class="font-semibold text-gray-950 flex items-center gap-1">Jasanya.id
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-2.5 h-2.5">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                            <polyline points="15 3 21 3 21 9" />
                            <line x1="10" x2="21" y1="14" y2="3" />
                        </svg>
                    </a></div>
                <div class="flex flex-col gap-2 mb-4">
                    <a href="mailto:hello@solusidigital.jasanya.id"
                        class="text-sm text-gray-500 hover:text-gray-950 transition-colors flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-3.5 h-3.5">
                            <rect width="20" height="16" x="2" y="4" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                        hello@solusidigital.jasanya.id</a>
                    <a href="https://wa.me/6281234567890"
                        class="text-sm text-gray-500 hover:text-gray-950 transition-colors flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-3.5 h-3.5">
                            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                        </svg>
                        +62 812-3456-7890</a>
                </div>
                <div class="flex gap-2">
                    <a href="#"
                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-950 hover:text-white transition-colors"
                        aria-label="Linkedin">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-4 h-4">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                            <rect width="4" height="12" x="2" y="9" />
                            <circle cx="4" cy="4" r="2" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-950 hover:text-white transition-colors"
                        aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-4 h-4">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-950 hover:text-white transition-colors"
                        aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-4 h-4">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="font-grotesk text-sm font-semibold mb-4">Layanan</h4>
                <ul class="flex flex-col gap-2.5 list-none">
                    <li><a href="{{ route('layanan') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Custom Software</a>
                    </li>
                    <li><a href="{{ route('layanan') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Web Development</a>
                    </li>
                    <li><a href="{{ route('layanan') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Mobile App</a></li>
                    <li><a href="{{ route('layanan') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">DevOps</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-grotesk text-sm font-semibold mb-4">Perusahaan</h4>
                <ul class="flex flex-col gap-2.5 list-none">
                    <li><a href="{{ route('home') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('proses') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Proses Kerja</a></li>
                    <li><a href="{{ route('portofolio') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Portofolio</a></li>
                    <li><a href="{{ route('blog.index') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Blog</a></li>
                    <li><a href="{{ route('kontak') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Kontak</a></li>
                </ul>
            </div>
            <div class="lg:col-span-1">
                <h4 class="font-grotesk text-sm font-semibold mb-4">Produk</h4>
                <ul class="flex flex-col gap-2.5 list-none">
                    <li><a href="{{ route('produk.index') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">REKA CMS</a></li>
                    <li><a href="{{ route('produk.index') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">REKA Analytics</a></li>
                    <li><a href="{{ route('produk.index') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">REKA HRM</a></li>
                    <li><a href="{{ route('produk.index') }}"
                            class="text-sm text-gray-500 hover:text-gray-950 transition-colors">REKA POS</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Cert bar -->
    <div class="border-t border-gray-200 px-5 lg:px-8 py-8">
        <div
            class="max-w-7xl mx-auto flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 flex-wrap">
            <div class="flex items-center gap-5 flex-wrap">
                <div class="flex items-center gap-2.5">
                    <img src="{{ asset('images/jasanya.png') }}" alt="Jasanya" class="h-7 w-auto" />
                    <span class="font-grotesk text-lg font-bold text-yellow-500 tracking-[-0.03em]">Jasanya.id</span>
                </div>
                <div class="flex gap-2">
                    <a href="#"
                        class="w-7 h-7 rounded-full flex items-center justify-center bg-gray-100 border border-gray-200 text-gray-500 hover:bg-gray-300 transition-colors"
                        aria-label="Linkedin">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-3.5 h-3.5">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                            <rect width="4" height="12" x="2" y="9" />
                            <circle cx="4" cy="4" r="2" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-7 h-7 rounded-full flex items-center justify-center bg-gray-100 border border-gray-200 text-gray-500 hover:bg-gray-300 transition-colors"
                        aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-3.5 h-3.5">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-7 h-7 rounded-full flex items-center justify-center bg-gray-100 border border-gray-200 text-gray-500 hover:bg-gray-300 transition-colors"
                        aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-3.5 h-3.5">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex items-center gap-3 flex-wrap">
                <div class="flex items-center gap-2 px-3 py-2 rounded-lg bg-gray-100 border border-gray-200">
                    <div class="w-6 h-6 rounded bg-gray-950 flex items-center justify-center"><span
                            class="text-white font-bold" style="font-size:7px">KI</span></div>
                    <div>
                        <p class="font-grotesk text-xs font-semibold leading-none">Kominfo</p>
                        <p class="text-[10px] text-gray-500 mt-0.5">Terdaftar</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 px-3 py-2 rounded-lg bg-gray-100 border border-gray-200">
                    <div class="w-6 h-6 rounded bg-gray-950 flex items-center justify-center"><span
                            class="text-white font-bold" style="font-size:7px">ISO</span></div>
                    <div>
                        <p class="font-grotesk text-xs font-semibold leading-none">ISO 27001</p>
                        <p class="text-[10px] text-gray-500 mt-0.5">Certified</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 px-3 py-2 rounded-lg bg-gray-100 border border-gray-200">
                    <div class="w-6 h-6 rounded bg-gray-900 flex items-center justify-center"><span
                            class="text-white font-extrabold" style="font-size:6px">DMCA</span></div>
                    <div>
                        <p class="font-grotesk text-xs font-semibold leading-none">DMCA</p>
                        <p class="text-[10px] text-gray-500 mt-0.5">Protected</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-200 px-5 lg:px-8 pt-8 pb-12">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-gray-400 font-medium font-sans">&copy; {{ date('Y') }} REKA &mdash; Bagian dari
                ekosistem Jasanya.id. Semua hak dilindungi.</p>
            {{-- <p class="text-xs text-gray-400 font-mono">solusidigital.jasanya.id</p> --}}
        </div>
    </div>
</footer>
