<section class="py-16">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      @foreach($products as $p)
      <div class="bg-white border border-gray-200 rounded-xl flex flex-col hover:-translate-y-1 hover:shadow-xl hover:border-gray-400 transition-[transform,box-shadow,border-color] duration-200">
        <div class="p-7 pb-5">
          <div class="flex items-start justify-between mb-5">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-gray-100"><i data-lucide="{{ collect(explode(' ', $p['icon']))->first() }}" class="w-5 h-5"></i></div>
                <div><p class="text-xs text-gray-500">{{ $p['cat'] }}</p><h3 class="font-grotesk text-lg font-bold">{{ $p['nama'] }}</h3></div>
            </div>
            <span class="text-[0.7rem] font-semibold px-2.5 py-1 rounded-full flex-shrink-0 {{ $p['status'] == 'Available' ? 'bg-gray-950 text-white' : 'bg-gray-100 text-gray-500 border border-gray-200' }}">{{ $p['status'] }}</span>
          </div>
          <p class="text-sm font-medium mb-2">{{ $p['tagline'] }}</p>
          <p class="text-sm leading-relaxed text-gray-500">{{ $p['desc'] }}</p>
        </div>
        <div class="px-7 py-5 border-t border-gray-200 flex-1">
          <p class="text-[0.7rem] font-semibold uppercase tracking-widest text-gray-400 mb-3">Fitur Utama</p>
          <div class="grid grid-cols-2 gap-2">
            @foreach($p['fitur'] as $fitur)
            <div class="flex items-start gap-2 text-xs text-gray-500"><div class="w-1.5 h-1.5 rounded-full bg-gray-950 flex-shrink-0 mt-1"></div>{{ $fitur }}</div>
            @endforeach
          </div>
        </div>
        <div class="px-7 py-5 border-t border-gray-200 flex items-center justify-between">
          <div><p class="text-xs text-gray-500">Mulai dari</p><p class="font-grotesk font-bold text-base">{{ $p['harga'] }}</p></div>
          @if($p['status'] == 'Available')
          <a href="{{ route('produk.show', $p['id']) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-950 text-white text-[0.8125rem] font-medium hover:bg-gray-800 transition-colors">Pelajari <i data-lucide="arrow-right" class="w-3 h-3"></i></a>
          @else
          <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-gray-200 text-gray-400 text-[0.8125rem] font-medium cursor-default opacity-60">Segera Hadir</span>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
