<div class="max-w-7xl mx-auto px-5 lg:px-8 pb-20">
  <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-950 transition-colors mt-6 mb-8"><i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Blog</a>
  <div class="grid lg:grid-cols-4 gap-12">
    <!-- Article -->
    <div class="lg:col-span-3">
      <div class="flex flex-wrap items-center gap-3 mb-5">
        <span class="text-[0.7rem] font-semibold px-2.5 py-1 rounded-full bg-gray-950 text-white">{{ $article['category_name'] }}</span>
        <span class="text-xs text-gray-500 flex items-center gap-1"><i data-lucide="clock" class="w-3 h-3"></i> {{ $article['reading_time_label'] }}</span>
        <span class="text-xs text-gray-500 flex items-center gap-1"><i data-lucide="calendar" class="w-3 h-3"></i> {{ $article['published_at_human'] }}</span>
      </div>
      <h1 class="font-grotesk text-3xl sm:text-4xl font-bold tracking-[-0.03em] mb-6 leading-snug">{{ $article['title'] }}</h1>
      <div class="border-l-4 border-gray-200 pl-5 mb-8">
        <p class="text-lg leading-relaxed text-gray-500">{{ $article['excerpt'] }}</p>
      </div>
      <div class="prose-content">
          {!! $article['content_html'] !!}
      </div>
      <!-- CTA box -->
      <div class="mt-10 p-7 rounded-xl bg-dark border border-dark-border">
        <h3 class="font-grotesk text-xl font-bold text-white mb-2">Butuh Solusi untuk Bisnis Anda?</h3>
        <p class="text-sm text-[#9a9a9a] mb-5">Tim REKA siap membantu Anda mengimplementasikan solusi terbaik. Konsultasi gratis.</p>
        <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white text-gray-950 text-sm font-medium hover:bg-gray-100 transition-colors">Konsultasi Sekarang <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i></a>
      </div>
    </div>
    <!-- Sidebar -->
    <div>
      <div class="sticky top-24">
        <p class="text-[0.7rem] font-semibold uppercase tracking-widest text-gray-400 mb-4">Artikel Terkait</p>
        @foreach($related as $rel)
        <a href="{{ $rel['url'] }}" class="flex flex-col overflow-hidden rounded-xl border border-gray-200 mb-3 hover:shadow-md transition-shadow group">
          <div class="h-24 overflow-hidden"><img src="{{ $rel['image_url'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="" /></div>
          <div class="p-4"><span class="text-[0.65rem] font-bold text-gray-950">{{ $rel['category_name'] }}</span><p class="font-grotesk text-sm font-semibold leading-snug mt-1">{{ $rel['title'] }}</p></div>
        </a>
        @endforeach
        
        <div class="p-5 rounded-xl bg-gray-100 border border-gray-200 mt-5">
          <p class="font-grotesk text-sm font-bold mb-2">Siap Mulai Proyek?</p>
          <p class="text-[0.8125rem] text-gray-500 mb-4">Konsultasi gratis dengan tim REKA.</p>
          <a href="{{ route('kontak') }}" class="flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-gray-950 text-white text-sm font-medium hover:bg-gray-800 transition-colors">Hubungi Kami</a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .prose-content p { font-size:.9375rem; line-height:1.85; color:#4a4a4a; margin-bottom:1.25rem; }
  .prose-content strong { color:#0d0d0d; font-weight:600; }
  .prose-content h3 { font-family:'Space Grotesk',sans-serif; font-size:1.125rem; font-weight:700; margin:1.75rem 0 .75rem; color:#0d0d0d; }
  .prose-content ul { list-style:none; display:flex; flex-direction:column; gap:.5rem; margin-bottom:1.25rem; padding-left:1rem; }
  .prose-content ul li { font-size:.875rem; color:#6b6b6b; line-height:1.65; }
  .prose-content ul li::before { content:'\2022'; margin-right:.625rem; color:#0d0d0d; }
</style>
