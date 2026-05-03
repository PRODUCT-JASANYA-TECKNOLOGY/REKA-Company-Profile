<section class="py-12 border-b border-gray-200">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <p class="text-[0.7rem] font-semibold uppercase tracking-widest text-gray-400 mb-5">Artikel Terbaru</p>
    <a href="{{ $featured['url'] }}" class="grid lg:grid-cols-2 border border-gray-200 rounded-xl overflow-hidden group hover:-translate-y-1 hover:shadow-lg transition-[transform,box-shadow] duration-200">
      <div class="relative overflow-hidden" style="height:300px"><img src="{{ $featured['image_url'] }}" alt="" class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-500" /></div>
      <div class="p-8 bg-white">
        <div class="flex items-center gap-3 mb-4"><span class="text-[0.7rem] font-semibold px-2.5 py-1 rounded-full bg-gray-950 text-white">{{ $featured['category_name'] }}</span></div>
        <h2 class="font-grotesk text-2xl font-bold tracking-tight mb-4 leading-snug">{{ $featured['title'] }}</h2>
        <p class="text-sm leading-relaxed text-gray-500 mb-6">{{ $featured['excerpt'] }}</p>
        <span class="text-sm font-medium flex items-center gap-2">Baca Selengkapnya <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform"></i></span>
      </div>
    </a>
  </div>
</section>
