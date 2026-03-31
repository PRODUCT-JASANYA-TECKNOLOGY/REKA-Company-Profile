<section class="py-14 border-t border-b border-gray-200 overflow-hidden">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 flex flex-col md:flex-row items-center gap-8">
    <div class="flex-shrink-0 text-center md:text-left">
      <p class="text-sm text-gray-500">Dipercaya oleh<br /><span class="font-grotesk text-[1.1rem] font-semibold text-gray-950">bisnis terkemuka</span></p>
    </div>
    <div class="hidden md:block w-px h-12 bg-gray-200"></div>
    <div class="flex-1 overflow-hidden relative">
      <div class="absolute left-0 top-0 bottom-0 w-16 z-10 pointer-events-none" style="background:linear-gradient(to right,#fff,transparent)"></div>
      <div class="absolute right-0 top-0 bottom-0 w-16 z-10 pointer-events-none" style="background:linear-gradient(to left,#fff,transparent)"></div>
      <div class="flex">
        <div class="anim-marquee flex gap-5">
          @forelse ($marqueeKlients ?? [] as $klient)
            <div class="flex-shrink-0 flex items-center gap-2.5 px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-100 min-w-[130px]">
              @if ($klient->has_logo)
                <img src="{{ $klient->logo_url }}" alt="{{ $klient->nama }}" class="w-7 h-7 rounded-lg object-cover flex-shrink-0" loading="lazy">
              @else
                <div class="w-7 h-7 rounded-lg bg-gray-950 flex items-center justify-center flex-shrink-0">
                  <span class="text-white font-bold font-grotesk" style="font-size:8px">{{ $klient->initial ?: 'KL' }}</span>
                </div>
              @endif
              <span class="text-sm font-medium text-gray-600 font-grotesk">{{ $klient->nama }}</span>
            </div>
          @empty
            <div class="flex-shrink-0 flex items-center gap-2.5 px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-100 min-w-[130px]">
              <div class="w-7 h-7 rounded-lg bg-gray-950 flex items-center justify-center flex-shrink-0">
                <span class="text-white font-bold font-grotesk" style="font-size:8px">KL</span>
              </div>
              <span class="text-sm font-medium text-gray-600 font-grotesk">Klient</span>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</section>
