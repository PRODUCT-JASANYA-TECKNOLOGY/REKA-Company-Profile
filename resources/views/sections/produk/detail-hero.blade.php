<div class="pt-28 pb-12 border-b border-gray-200 white-grid-section bg-white" id="page-header">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <a href="{{ route('produk.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-950 transition-colors mb-6" ><i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Semua Produk</a>
    <div class="flex items-center gap-4 mb-4">
      <div id="prod-icon" class="w-14 h-14 rounded-2xl flex items-center justify-center bg-gray-100"><i data-lucide="{{ collect(explode(' ', $product['icon']))->first() }}" class="w-6 h-6"></i></div>
      <div><p id="prod-cat" class="text-sm text-gray-500 mb-1">{{ $product['cat'] }}</p><h1 id="prod-name" class="font-grotesk text-3xl sm:text-4xl font-bold tracking-[-0.03em]">{{ $product['nama'] }}</h1></div>
    </div>
    <p id="prod-tagline" class="text-lg text-gray-500 max-w-xl leading-relaxed">{{ $product['tagline'] }}</p>
  </div>
</div>
