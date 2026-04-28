<section class="relative min-h-screen flex flex-col justify-center overflow-hidden bg-white">
    <!-- Base Grid Pattern -->
    <div class="grid-pattern absolute inset-0 opacity-40"></div>
    
    <!-- Ambient Moving Blobs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="blob-1 absolute w-[500px] h-[500px] rounded-full bg-gray-100/50 blur-[100px] -top-48 -left-24 anim-blob"></div>
        <div class="blob-2 absolute w-[400px] h-[400px] rounded-full bg-gray-50/80 blur-[80px] top-1/2 -right-24 anim-blob animation-delay-2000"></div>
        <div class="blob-3 absolute w-[300px] h-[300px] rounded-full bg-gray-100/40 blur-[60px] bottom-0 left-1/3 anim-blob animation-delay-4000"></div>
    </div>

    <div class="absolute inset-0 pointer-events-none"
        style="background:radial-gradient(ellipse 80% 60% at 50% 0%,rgba(255,255,255,.9) 0%,transparent 70%)"></div>
    <div class="absolute bottom-0 left-0 right-0 h-40 pointer-events-none"
        style="background:linear-gradient(to top,#fff,transparent)"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8 pt-28 pb-24">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="anim-fade-up">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[0.7rem] font-medium tracking-widest uppercase bg-gray-100 text-gray-500 border border-gray-200 mb-8">
                    <span class="w-2 h-2 rounded-full bg-gray-950 inline-block"></span>Solusi Digital Profesional
                </div>
                <h1
                    class="font-grotesk text-5xl sm:text-6xl lg:text-7xl font-bold leading-tight tracking-[-0.04em] mb-6">
                    Kami Bangun<br><span class="text-gray-400">Sistem Digital</span><br>yang Tumbuh
                </h1>
                <p class="text-lg leading-relaxed text-gray-500 mb-10 max-w-lg">Dari website hingga sistem digital
                    &mdash; kami membantu Anda menciptakan solusi yang cepat, scalable, dan siap
                    digunakan untuk kebutuhan bisnis.</p>
                <div class="flex flex-wrap gap-3 mb-12">
                    <a href="{{ route('kontak') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gray-950 text-white text-sm font-medium border border-gray-950 hover:bg-gray-800 transition-colors group">
                        Mulai Proyek <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover:translate-x-0.5 transition-transform"></i>
                    </a>
                    <a href="{{ route('layanan') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-transparent text-gray-950 text-sm font-medium border border-gray-200 hover:bg-gray-100 hover:border-gray-400 transition-colors">Lihat
                        Layanan</a>
                </div>
                <div class="flex flex-wrap gap-8">
                    <div>
                        <div class="font-grotesk text-2xl font-bold">50+</div>
                        <div class="text-xs text-gray-500 mt-0.5">Proyek Selesai</div>
                    </div>
                    <div>
                        <div class="font-grotesk text-2xl font-bold">98%</div>
                        <div class="text-xs text-gray-500 mt-0.5">Klien Puas</div>
                    </div>
                    <div>
                        <div class="font-grotesk text-2xl font-bold">5 Thn</div>
                        <div class="text-xs text-gray-500 mt-0.5">Pengalaman</div>
                    </div>
                </div>
            </div>
            <!-- Hero visual -->
            <div class="relative hidden lg:flex items-center justify-center">
                <div class="relative w-full max-w-md">
                    <div class="anim-float rounded-2xl overflow-hidden border border-gray-200 bg-white shadow-xl">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-gray-100 border-b border-gray-200">
                            <div class="w-2.5 h-2.5 rounded-full bg-gray-300"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-gray-300"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-gray-300"></div>
                            <div class="ml-4 flex-1 h-5 rounded-md bg-gray-200"></div>
                        </div>
                        <div class="p-6 hero-code" id="hero-typewriter-code">
                            <div class="flex gap-3 mb-2.5 line" data-line="1">
                                <span class="text-gray-400">01</span>
                                <span class="code-content"><span class="text-gray-700">const</span> <span class="text-gray-900">solusi</span> <span class="text-gray-500">=</span> <span class="text-gray-700">await</span> <span class="text-gray-900">reka</span><span class="text-gray-500">.</span><span class="text-gray-800">bangun</span><span class="text-gray-500">({</span></span>
                            </div>
                            <div class="flex gap-3 mb-2.5 line" data-line="2">
                                <span class="text-gray-400">02</span>
                                <span class="code-content ml-4"><span class="text-gray-600">tipe</span><span class="text-gray-500">:</span> <span class="text-gray-800">&ldquo;scalable&rdquo;</span><span class="text-gray-500">,</span></span>
                            </div>
                            <div class="flex gap-3 mb-2.5 line" data-line="3">
                                <span class="text-gray-400">03</span>
                                <span class="code-content ml-4"><span class="text-gray-600">kualitas</span><span class="text-gray-500">:</span> <span class="text-gray-800">&ldquo;enterprise&rdquo;</span><span class="text-gray-500">,</span></span>
                            </div>
                            <div class="flex gap-3 mb-2.5 line" data-line="4">
                                <span class="text-gray-400">04</span>
                                <span class="code-content ml-4"><span class="text-gray-600">tepat_waktu</span><span class="text-gray-500">:</span> <span class="text-gray-700">true</span></span>
                            </div>
                            <div class="flex gap-3 mb-4 line" data-line="5">
                                <span class="text-gray-400">05</span>
                                <span class="code-content"><span class="text-gray-500">});</span></span>
                            </div>
                            <div class="pt-4 border-t border-gray-200">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-gray-500"></div><span
                                        class="text-gray-500 text-[0.7rem]">Membangun solusi...</span>
                                </div>
                                <div id="deploy-status" class="flex items-center gap-2 opacity-0 transition-opacity duration-500">
                                    <div class="w-1.5 h-1.5 rounded-full" style="background:#4a7c59"></div><span
                                        class="text-[0.7rem]" style="color:#4a7c59">&check; Deploy berhasil</span>
                                </div>
                            </div>
                        </div>

@push('styles')
<style>
    /* Background Blob Animations */
    @keyframes blob-float {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    .anim-blob {
        animation: blob-float 15s ease-in-out infinite;
    }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }

    .code-content { display: inline-block; min-height: 1.25rem; }
    .cursor::after {
        content: '_';
        display: inline-block;
        margin-left: 2px;
        animation: blink 0.8s step-end infinite;
        color: #0d0d0d;
        font-weight: bold;
    }
    @keyframes blink {
        from, to { opacity: 1; }
        50% { opacity: 0; }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const lines = document.querySelectorAll('#hero-typewriter-code .line');
    const status = document.getElementById('deploy-status');
    
    // Simpan konten asli dan kosongkan line
    const originalContents = Array.from(lines).map(line => {
        const contentEl = line.querySelector('.code-content');
        const content = contentEl.innerHTML;
        const wrapper = contentEl;
        wrapper.innerHTML = ''; // Kosongkan
        return { wrapper, content };
    });

    async function typeHtml(html, container) {
        const temp = document.createElement('div');
        temp.innerHTML = html;
        
        return new Promise(async (resolve) => {
            async function walk(nodes, target) {
                for (let node of nodes) {
                    if (node.nodeType === Node.TEXT_NODE) {
                        const text = node.textContent;
                        for (let char of text) {
                            target.appendChild(document.createTextNode(char));
                            await new Promise(r => setTimeout(r, 15 + Math.random() * 25));
                        }
                    } else {
                        const clone = node.cloneNode(false);
                        target.appendChild(clone);
                        await walk(node.childNodes, clone);
                    }
                }
            }
            
            container.classList.add('cursor');
            await walk(temp.childNodes, container);
            container.classList.remove('cursor');
            resolve();
        });
    }

    async function startTyping() {
        await new Promise(r => setTimeout(r, 800)); // Delay awal
        
        for (let item of originalContents) {
            await typeHtml(item.content, item.wrapper);
            await new Promise(r => setTimeout(r, 150)); // Jeda antar baris
        }

        // Tampilkan status deploy setelah selesai
        if (status) status.classList.replace('opacity-0', 'opacity-100');
    }

    startTyping();
});
</script>
@endpush
                    </div>
                    <div
                        class="absolute -top-4 -right-4 rounded-xl px-4 py-2.5 bg-white border border-gray-200 shadow-md font-grotesk">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full anim-pulse" style="background:#4a7c59"></div>
                            <span class="text-sm font-medium">Sistem Online</span>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-4 -left-8 rounded-xl px-4 py-3 bg-white border border-gray-200 shadow-md">
                        <div class="text-[0.7rem] text-gray-500 mb-1">Skor Performa</div>
                        <div class="font-grotesk text-2xl font-bold">99/100</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40">
        <span class="text-[0.65rem] tracking-widest uppercase text-gray-500">Gulir</span>
        <div class="w-2 h-2 rounded-full bg-gray-950 anim-scroll-dot"></div>
    </div>
</section>