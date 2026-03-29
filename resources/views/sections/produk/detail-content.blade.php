<section class="py-12 pb-20">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <!-- Gallery -->
    <div class="mb-10" x-data="{ currentImg: 0, images: {{ json_encode($product['galleries']) }} }">
      <div class="relative rounded-xl overflow-hidden mb-3 bg-gray-100 border border-gray-200" style="height:380px">
        <img :src="images[currentImg]" alt="Screenshot" class="w-full h-full object-cover transition-opacity duration-300" />
        <button @click="currentImg = currentImg === 0 ? images.length - 1 : currentImg - 1" class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-white border border-gray-200 flex items-center justify-center shadow-sm hover:bg-gray-100 transition-colors"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
        <button @click="currentImg = (currentImg + 1) % images.length" class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-white border border-gray-200 flex items-center justify-center shadow-sm hover:bg-gray-100 transition-colors"><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2">
            <template x-for="(img, i) in images">
                <button @click="currentImg = i" :class="currentImg === i ? 'bg-gray-900 border-none w-2 h-2 rounded-full cursor-pointer transition-colors active' : 'bg-gray-400 border-none w-2 h-2 rounded-full cursor-pointer transition-colors'"></button>
            </template>
        </div>
      </div>
      <div class="flex gap-3">
          <template x-for="(img, i) in images">
              <div @click="currentImg = i" :class="currentImg === i ? 'flex-1 rounded-xl overflow-hidden border-2 border-gray-950 cursor-pointer transition-colors active' : 'flex-1 rounded-xl overflow-hidden border-2 border-gray-200 cursor-pointer transition-colors'" style="height:72px">
                  <img :src="img" class="w-full h-full object-cover" />
              </div>
          </template>
      </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-10">
      <div class="lg:col-span-2">
        <h2 class="font-grotesk text-2xl font-bold mb-4">Tentang {{ $product['nama'] }}</h2>
        <p class="text-[0.9375rem] leading-relaxed text-gray-500 mb-8">{{ $product['desc'] }}</p>
        <h3 class="font-grotesk text-xl font-bold mb-4">Fitur Lengkap</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-10">
            @foreach($product['fitur'] as $fitur)
            <div class="flex items-center gap-3 p-4 rounded-xl bg-gray-100 border border-gray-200">
                <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <span class="text-sm text-gray-600">{{ $fitur }}</span>
            </div>
            @endforeach
        </div>
        <h3 class="font-grotesk text-xl font-bold mb-4">Ulasan Pengguna</h3>
        <div class="flex flex-col gap-3">
          <div class="p-5 rounded-xl bg-gray-100 border border-gray-200"><div class="flex items-center gap-2 mb-2"><span class="text-gray-700">&#9733;&#9733;&#9733;&#9733;&#9733;</span><span class="font-grotesk text-xs font-semibold">Arif H.</span><span class="text-xs text-gray-500">&mdash; RetailNow</span></div><p class="text-sm text-gray-500">Sangat mudah digunakan, tim kami langsung produktif dari hari pertama.</p></div>
          <div class="p-5 rounded-xl bg-gray-100 border border-gray-200"><div class="flex items-center gap-2 mb-2"><span class="text-gray-700">&#9733;&#9733;&#9733;&#9733;&#9733;</span><span class="font-grotesk text-xs font-semibold">Sarah K.</span><span class="text-xs text-gray-500">&mdash; LogiStar</span></div><p class="text-sm text-gray-500">Support-nya responsif dan fiturnya benar-benar sesuai kebutuhan kami.</p></div>
          <div class="p-5 rounded-xl bg-gray-100 border border-gray-200"><div class="flex items-center gap-2 mb-2"><span class="text-gray-700">&#9733;&#9733;&#9733;&#9733;</span><span class="font-grotesk text-xs font-semibold">Fajar M.</span><span class="text-xs text-gray-500">&mdash; FinancePro</span></div><p class="text-sm text-gray-500">Kualitas produknya bagus. Menunggu beberapa fitur yang masih dalam pengembangan.</p></div>
        </div>
      </div>
      <div class="lg:col-span-1">
        <div class="sticky top-24 bg-gray-100 border border-gray-200 rounded-xl p-6">
          <p class="text-xs text-gray-500 mb-1">Harga mulai dari</p>
          <p class="font-grotesk text-2xl font-bold mb-3">{{ $product['harga'] }}</p>
          <span class="inline-block text-[0.7rem] font-semibold px-2.5 py-1 rounded-full mb-5 {{ $product['status'] == 'Available' ? 'bg-gray-950 text-white' : 'bg-gray-100 text-gray-500 border border-gray-200' }}">{{ $product['status'] }}</span>
          <a href="{{ route('kontak') }}" class="flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-gray-950 text-white text-sm font-medium hover:bg-gray-800 transition-colors mb-2.5">Mulai Sekarang <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i></a>
          <a href="{{ route('kontak') }}" class="flex items-center justify-center gap-2 px-6 py-3 rounded-xl border border-gray-200 text-gray-950 text-sm font-medium hover:bg-white transition-colors">Minta Demo</a>
        </div>
      </div>
    </div>
  </div>
</section>
