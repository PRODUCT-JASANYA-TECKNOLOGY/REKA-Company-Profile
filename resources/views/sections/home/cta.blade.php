<section class="py-24 lg:py-32 bg-gray-950 relative overflow-hidden text-center border-t border-gray-900">
  <!-- Base Background -->
  <div class="absolute inset-0 bg-gray-950"></div>
  
  <!-- Glowing Orbs -->
  <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-[120px] -translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>
  <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gray-600/20 rounded-full blur-[120px] translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

  <!-- Dot Pattern Overlay -->
  <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCI+CjxjaXJjbGUgY3g9IjEiIGN5PSIxIiByPSIxIiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIi8+Cjwvc3ZnPg==')] opacity-50 pointer-events-none"></div>
  
  <div class="relative max-w-4xl mx-auto px-5 lg:px-8 z-10">
    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[0.7rem] font-bold tracking-widest uppercase bg-gray-800 text-yellow-500 border border-gray-700 mb-6">Siap Mulai?</span>
    <h2 class="font-grotesk text-4xl sm:text-5xl lg:text-6xl font-bold tracking-[-0.04em] text-white mb-6 leading-tight">Bangun Produk Digital<br><span class="text-gray-400">Anda Sekarang</span></h2>
    <p class="text-base sm:text-lg leading-relaxed text-gray-400 max-w-2xl mx-auto mb-10">Konsultasikan kebutuhan proyek Anda dengan tim REKA. Gratis, tanpa komitmen, dan kami siap membantu Anda menemukan solusi terbaik.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
      <a href="{{ route('kontak') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-full bg-white text-gray-950 text-sm font-bold hover:bg-gray-100 hover:scale-105 transition-all shadow-lg">Mulai Proyek <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
      <a href="{{ route('portofolio') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-full bg-transparent text-white text-sm font-bold border border-gray-700 hover:bg-gray-800 transition-colors">Lihat Portofolio</a>
    </div>
  </div>
</section>
