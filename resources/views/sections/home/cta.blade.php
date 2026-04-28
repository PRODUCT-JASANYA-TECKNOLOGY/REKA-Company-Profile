<section class="py-24 lg:py-40 relative overflow-hidden text-center border-t border-gray-900" style="background: linear-gradient(180deg, #0a0a0a 0%, #1a1a1a 50%, #0a0a0a 100%);">
  <!-- Dynamic Background Elements -->
  <div class="absolute inset-0 z-0">
    <!-- Main Center Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[100%] h-[100%] bg-blue-600/[0.05] rounded-full blur-[120px] pointer-events-none"></div>
    
    <!-- Animated Grid with more visibility -->
    <div class="absolute inset-0 opacity-40" 
         style="background-image: radial-gradient(rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 30px 30px;">
    </div>

    <!-- Glowing Lines -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-yellow-500/20 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-blue-500/20 to-transparent"></div>

    <!-- Floating Orbs with distinct colors -->
    <div class="absolute -top-24 -left-24 w-80 h-80 bg-yellow-500/10 rounded-full blur-[80px] anim-float"></div>
    <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-blue-500/10 rounded-full blur-[80px] anim-float-delayed"></div>
  </div>

  <!-- Content -->
  <div class="relative max-w-4xl mx-auto px-5 lg:px-8 z-10 scroll-reveal">
    <div class="reveal-item inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[0.7rem] font-bold tracking-[0.2em] uppercase bg-white/[0.05] backdrop-blur-md text-yellow-500 border border-yellow-500/20 mb-10 opacity-0">
      <span class="relative flex h-2 w-2">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
      </span>
      Mulai Transformasi
    </div>
    
    <h2 class="reveal-item font-grotesk text-5xl sm:text-6xl lg:text-7xl font-bold tracking-[-0.04em] text-white mb-8 leading-[1.1] opacity-0">
      Wujudkan Ide Digital<br>
      <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-300 to-gray-500">Menjadi Realita</span>
    </h2>
    
    <p class="reveal-item text-lg sm:text-xl leading-relaxed text-gray-300 max-w-2xl mx-auto mb-12 font-medium opacity-0">
      Konsultasikan kebutuhan proyek Anda dengan tim REKA. Kami menghadirkan solusi teknologi yang tepat guna, efisien, dan siap berkembang bersama bisnis Anda.
    </p>

    <div class="reveal-item flex flex-col sm:flex-row gap-5 justify-center items-center opacity-0">
      <a href="{{ route('kontak') }}" class="w-full sm:w-auto group relative inline-flex items-center justify-center gap-3 px-10 py-4 rounded-full bg-white text-gray-950 text-sm font-bold transition-all hover:scale-105 active:scale-95 shadow-[0_0_40px_rgba(255,255,255,0.1)]">
        Diskusi Proyek 
        <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
      </a>
      <a href="{{ route('portofolio') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-10 py-4 rounded-full bg-white/[0.05] text-white text-sm font-bold border border-white/10 backdrop-blur-sm hover:bg-white/10 hover:border-white/20 transition-all active:scale-95">
        Eksplorasi Karya
      </a>
    </div>
  </div>
</section>

@push('styles')
<style>
  /* Scroll Animation States */
  .reveal-item {
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
  }
  
  .reveal-active .reveal-item {
    opacity: 1 !important;
    transform: translateY(0);
  }

  /* Delay for each item to create staggered effect */
  .reveal-active .reveal-item:nth-child(1) { transition-delay: 0.1s; }
  .reveal-active .reveal-item:nth-child(2) { transition-delay: 0.25s; }
  .reveal-active .reveal-item:nth-child(3) { transition-delay: 0.4s; }
  .reveal-active .reveal-item:nth-child(4) { transition-delay: 0.55s; }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
  }
  .anim-float {
    animation: float 6s ease-in-out infinite;
  }
  .anim-float-delayed {
    animation: float 8s ease-in-out infinite;
    animation-delay: 2s;
  }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        root: null,
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-active');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const revealSection = document.querySelector('.scroll-reveal');
    if (revealSection) {
        observer.observe(revealSection);
    }
});
</script>
@endpush