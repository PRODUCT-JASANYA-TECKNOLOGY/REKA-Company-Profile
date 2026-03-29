<section class="py-24 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-5 lg:px-8">
        <div class="mb-14 lg:mb-16 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-2xl">
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-gray-100 px-3 py-1 text-[0.7rem] font-medium uppercase tracking-widest text-gray-500">
                    Cara Kami Bekerja
                </span>
                <h2
                    class="mt-4 font-grotesk text-4xl font-bold leading-tight tracking-[-0.03em] text-gray-950 sm:text-5xl">
                    Proses yang Jelas
                    <span class="block text-gray-300">Dari Ide ke Produk</span>
                </h2>
                <p class="mt-4 max-w-xl text-sm leading-relaxed text-gray-500 sm:text-base">
                    Setiap proyek berjalan dengan alur yang terukur. Anda selalu tahu apa yang sedang dikerjakan, kapan
                    milestone selesai, dan apa langkah berikutnya.
                </p>
            </div>

            {{-- <a href="{{ route('proses') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-transparent text-gray-950 text-sm font-medium border border-gray-200 hover:bg-gray-100 hover:border-gray-400 transition-colors flex-shrink-0">
        Lihat Detail Proses
        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
      </a> --}}
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <article
                class="sticky-note pcard relative rounded-[1.4rem] border border-gray-200 bg-gray-100 p-7 shadow-note transition-all duration-300"
                style="transform:rotate(-2deg)">
                <span class="absolute -top-2 left-5 z-20 flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gray-300 opacity-70"></span>
                    <span class="relative inline-flex h-3 w-3 rounded-full bg-gray-900 ring-2 ring-white"></span>
                </span>
                <div
                    class="mb-4 inline-flex rounded-lg border border-gray-300 bg-white/70 px-2.5 py-1 font-grotesk text-[0.65rem] font-bold tracking-[0.18em] text-gray-700">
                    01</div>
                <h3 class="font-grotesk text-2xl font-bold text-gray-950">Discover</h3>
                <p class="mt-3 text-sm leading-relaxed text-gray-700">Memahami konteks bisnis, pain point, dan target
                    pengguna untuk memastikan solusi tepat sasaran.</p>
            </article>

            <article
                class="sticky-note pcard relative rounded-[1.4rem] border border-gray-200 bg-gray-100 p-7 shadow-note transition-all duration-300"
                style="transform:rotate(1.6deg)">
                <span class="absolute -top-2 left-5 z-20 flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gray-300 opacity-70"></span>
                    <span class="relative inline-flex h-3 w-3 rounded-full bg-gray-900 ring-2 ring-white"></span>
                </span>
                <div
                    class="mb-4 inline-flex rounded-lg border border-gray-300 bg-white/70 px-2.5 py-1 font-grotesk text-[0.65rem] font-bold tracking-[0.18em] text-gray-700">
                    02</div>
                <h3 class="font-grotesk text-2xl font-bold text-gray-950">Design</h3>
                <p class="mt-3 text-sm leading-relaxed text-gray-700">Menyusun arsitektur sistem, user flow, dan
                    prioritas fitur agar pengembangan lebih fokus.</p>
            </article>

            <article
                class="sticky-note pcard relative rounded-[1.4rem] border border-gray-200 bg-gray-100 p-7 shadow-note transition-all duration-300"
                style="transform:rotate(-1.4deg)">
                <span class="absolute -top-2 left-5 z-20 flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gray-300 opacity-70"></span>
                    <span class="relative inline-flex h-3 w-3 rounded-full bg-gray-900 ring-2 ring-white"></span>
                </span>
                <div
                    class="mb-4 inline-flex rounded-lg border border-gray-300 bg-white/70 px-2.5 py-1 font-grotesk text-[0.65rem] font-bold tracking-[0.18em] text-gray-700">
                    03</div>
                <h3 class="font-grotesk text-2xl font-bold text-gray-950">Build</h3>
                <p class="mt-3 text-sm leading-relaxed text-gray-700">Implementasi sprint-by-sprint dengan demo rutin
                    agar progres tetap transparan dan terukur.</p>
            </article>

            <article
                class="sticky-note pcard relative rounded-[1.4rem] border border-gray-200 bg-gray-100 p-7 shadow-note transition-all duration-300"
                style="transform:rotate(2deg)">
                <span class="absolute -top-2 left-5 z-20 flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gray-300 opacity-70"></span>
                    <span class="relative inline-flex h-3 w-3 rounded-full bg-gray-900 ring-2 ring-white"></span>
                </span>
                <div
                    class="mb-4 inline-flex rounded-lg border border-gray-300 bg-white/70 px-2.5 py-1 font-grotesk text-[0.65rem] font-bold tracking-[0.18em] text-gray-700">
                    04</div>
                <h3 class="font-grotesk text-2xl font-bold text-gray-950">Launch</h3>
                <p class="mt-3 text-sm leading-relaxed text-gray-700">Deploy, monitoring, handoff, dan pendampingan awal
                    untuk memastikan produk siap dipakai.</p>
            </article>
        </div>
    </div>
</section>
