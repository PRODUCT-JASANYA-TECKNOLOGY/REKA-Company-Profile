<section class="py-20">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 flex flex-col gap-16">
    @forelse ($layanans as $index => $layanan)
      <div class="grid lg:grid-cols-2 gap-12 items-start pb-16 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
        <div class="{{ $index % 2 != 0 ? 'lg:order-2' : '' }}">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-gray-100">
              <i data-lucide="{{ $layanan->icon }}" class="w-5 h-5"></i>
            </div>
            <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-500 border border-gray-200">
              {{ $layanan->category?->nama ?? 'Layanan' }}
            </span>
          </div>
          <h2 class="font-grotesk text-3xl font-bold tracking-[-0.02em] mb-4">{{ $layanan->nama }}</h2>
          <p class="text-[0.9375rem] leading-relaxed text-gray-500 mb-8">{{ $layanan->deskripsi }}</p>
          <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gray-950 text-white text-sm font-medium hover:bg-gray-800 transition-colors">
            Konsultasi Gratis <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
          </a>
        </div>
        <div class="{{ $index % 2 != 0 ? 'lg:order-1' : '' }} bg-white border border-gray-200 rounded-xl p-7">
          @if($layanan->tools->isNotEmpty())
            <p class="text-[0.7rem] font-semibold uppercase tracking-widest text-gray-400 mb-3">Teknologi</p>
            <div class="flex flex-wrap gap-2 mb-5">
              @foreach ($layanan->tools as $tool)
                <span class="px-3 py-1.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500 border border-gray-200">
                  {{ $tool->nama }}
                </span>
              @endforeach
            </div>
          @endif
          
          <div class="{{ $layanan->tools->isNotEmpty() ? 'border-t border-gray-200 pt-5' : '' }}">
            <p class="text-[0.7rem] font-semibold uppercase tracking-widest text-gray-400 mb-3">Yang Anda Dapatkan</p>
            <ul class="flex flex-col gap-2 list-none">
              @foreach ($layanan->lingkup as $item)
                <li class="flex items-center gap-2.5 text-sm text-gray-500">
                  <div class="w-1.5 h-1.5 rounded-full bg-gray-950 flex-shrink-0"></div>
                  {{ $item }}
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    @empty
      <div class="py-20 text-center text-gray-400">
        Belum ada data layanan tersedia.
      </div>
    @endforelse
  </div>
</section>
