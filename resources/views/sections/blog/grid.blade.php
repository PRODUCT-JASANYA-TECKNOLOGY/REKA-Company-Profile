<section class="py-12 pb-20">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <p class="text-[0.7rem] font-semibold uppercase tracking-widest text-gray-400 mb-6">Artikel Lainnya</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach($articles as $art)
      @if($art['id'] != $featured['id'])
      <a href="{{ route('blog.show', $art['id']) }}" class="group bg-white border border-gray-200 rounded-xl overflow-hidden flex flex-col hover:-translate-y-1 hover:shadow-lg transition-[transform,box-shadow] duration-200">
        <div class="h-44 overflow-hidden"><img src="{{ $art['img'] }}" alt="" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" /></div>
        <div class="p-5 flex flex-col flex-1">
          <div class="flex items-center gap-2 mb-3"><span class="text-[0.65rem] font-semibold px-2 py-0.5 rounded-full bg-gray-950 text-white">{{ $art['cat'] }}</span><span class="text-xs text-gray-500 flex items-center gap-1"><i data-lucide="clock" class="w-2.5 h-2.5"></i> {{ $art['waktu'] }}</span></div>
          <h3 class="font-grotesk text-[0.9375rem] font-bold leading-snug mb-2 flex-1">{{ $art['judul'] }}</h3>
          <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
            <span class="text-xs text-gray-500 flex items-center gap-1"><i data-lucide="calendar" class="w-2.5 h-2.5"></i> {{ $art['tanggal'] }}</span>
            <span class="text-xs font-medium flex items-center gap-1">Baca <i data-lucide="arrow-right" class="w-2.5 h-2.5 group-hover:translate-x-0.5 transition-transform"></i></span>
          </div>
        </div>
      </a>
      @endif
      @endforeach
    </div>
  </div>
</section>
