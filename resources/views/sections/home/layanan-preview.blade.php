<section class="py-24 lg:py-32 white-grid-section bg-white">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-14">
      <div>
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[0.7rem] font-medium tracking-widest uppercase bg-gray-100 text-gray-500 border border-gray-200">Apa yang Kami Lakukan</span>
        <h2 class="font-grotesk text-4xl sm:text-5xl font-bold tracking-[-0.03em] mt-3">Layanan untuk<br><span class="text-gray-300">skala bisnis Anda</span></h2>
      </div>
      <a href="{{ route('layanan') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-transparent text-gray-950 text-sm font-medium border border-gray-200 hover:bg-gray-100 hover:border-gray-400 transition-colors flex-shrink-0">Lihat Semua <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i></a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      @forelse ($layanans as $layanan)
        <div class="bg-white border border-gray-200 rounded-xl p-7 flex flex-col hover:-translate-y-0.5 hover:shadow-card-hover hover:border-gray-400 transition-[transform,box-shadow,border-color] duration-200">
          <div class="w-10 h-10 rounded-[10px] flex items-center justify-center bg-gray-100 text-gray-900 mb-5">
            <i data-lucide="{{ $layanan->icon }}" class="w-4.5 h-4.5"></i>
          </div>
          <h3 class="font-grotesk text-[0.9375rem] font-semibold mb-2">{{ $layanan->nama }}</h3>
          <p class="text-sm leading-relaxed text-gray-500 flex-1">{{ $layanan->deskripsi }}</p>
          <div class="mt-5 pt-5 border-t border-gray-200">
            <span class="text-xs text-gray-400">{{ $layanan->category?->nama ?? 'Layanan' }}</span>
          </div>
        </div>
      @empty
        <div class="col-span-full py-12 text-center text-gray-400">
          Belum ada layanan yang tersedia.
        </div>
      @endforelse
    </div>
  </div>
</section>
