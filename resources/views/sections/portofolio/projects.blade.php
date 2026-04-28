<section class="py-16">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      @forelse ($portofolios as $item)
        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-[transform,box-shadow] duration-200 flex flex-col">
          <div class="h-44 relative overflow-hidden bg-gray-100">
            @php
                $thumbPath = (string) ($item->thumbnail ?? '');
                $thumbUrl = str_starts_with($thumbPath, 'http://') || str_starts_with($thumbPath, 'https://')
                    ? $thumbPath
                    : asset('storage/' . ltrim($thumbPath, '/'));
            @endphp
            <img src="{{ $thumbUrl }}" alt="{{ $item->nama }}" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/10"></div>
            
            <div class="absolute bottom-3 left-3">
              <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 border border-gray-200">
                {{ $item->tanggal_proyek?->format('Y') ?? '2024' }}
              </span>
            </div>
            @if($item->klient)
              <div class="absolute top-3 right-3">
                <span class="text-[0.7rem] font-semibold px-2.5 py-1 rounded-full bg-gray-950/80 backdrop-blur-sm text-white">
                  {{ $item->klient->nama }}
                </span>
              </div>
            @endif
          </div>
          <div class="p-6 flex flex-col flex-1">
            <div class="text-xs text-gray-500 mb-2">{{ $item->category?->nama ?? 'Project' }}</div>
            <h3 class="font-grotesk text-lg font-bold mb-3">{{ $item->nama }}</h3>
            <p class="text-sm leading-relaxed text-gray-500 flex-1 mb-5">{{ $item->deskripsi }}</p>
            
            @if($item->tools->isNotEmpty())
              <div class="flex flex-wrap gap-1.5">
                @foreach ($item->tools as $tool)
                  <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-500 border border-gray-200">
                    {{ $tool->nama }}
                  </span>
                @endforeach
              </div>
            @endif
          </div>
        </div>
      @empty
        <div class="col-span-full py-20 text-center text-gray-400">
          Belum ada data portofolio tersedia.
        </div>
      @endforelse
    </div>
  </div>
</section>
