<section class="py-24 lg:py-32 bg-white">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid lg:grid-cols-5 gap-16">
      <div class="lg:col-span-2">
        <p class="text-[0.7rem] font-medium tracking-widest uppercase text-gray-500 mb-4">Frequently Asked Questions (FAQ)</p>
        <h2 class="font-grotesk text-3xl sm:text-4xl font-bold tracking-[-0.03em] mb-5 leading-tight">Apa itu REKA?</h2>
        <p class="text-sm leading-relaxed text-gray-500 mb-8">REKA adalah unit solusi digital dari ekosistem Jasanya.id, berfokus pada pengembangan software, aplikasi web &amp; mobile, serta sistem digital yang scalable untuk bisnis dari berbagai skala.</p>
        <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full border border-gray-200 text-gray-950 text-sm font-medium hover:bg-gray-100 hover:border-gray-400 transition-colors">Masih ada pertanyaan? <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i></a>
      </div>

      <div class="lg:col-span-3">
        @forelse ($faqs as $faq)
          <div class="faq-item border-b border-gray-200">
            <button class="faq-question w-full flex items-start justify-between gap-4 py-6 bg-transparent border-none cursor-pointer text-left">
              <span class="font-grotesk text-base font-bold text-gray-950">{{ $faq->pertanyaan }}</span>
              <div class="faq-icon mt-1">
                <i data-lucide="plus" class="w-3 h-3 text-gray-500"></i>
              </div>
            </button>
            <div class="faq-answer">
              <p class="text-sm leading-relaxed text-gray-500 pb-6 pr-8">{!! nl2br(e($faq->jawaban)) !!}</p>
            </div>
          </div>
        @empty
          <div class="faq-item border-b border-gray-200">
            <div class="py-6">
              <p class="text-sm leading-relaxed text-gray-500">FAQ belum tersedia.</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </div>
</section>
