<section id="klien" class="py-24 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-5 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[0.7rem] font-medium tracking-widest uppercase bg-gray-100 text-gray-500 border border-gray-200">Our Partners</span>
            <h2 class="font-grotesk text-4xl sm:text-5xl font-bold tracking-[-0.03em] mt-3">Dipercaya Oleh<br><span class="text-gray-300">Brand Ternama</span></h2>
            <p class="mt-5 text-gray-500 max-w-2xl mx-auto">Kami bangga berkontribusi pada kesuksesan berbagai brand ternama melalui solusi digital yang kami bangun untuk membantu mereka tumbuh lebih jauh.</p>
        </div>

        {{-- Filters Section --}}
        <div class="flex flex-col sm:flex-row gap-4 mb-12 justify-center">
            @if($industries->isNotEmpty())
            <div class="relative min-w-[220px]">
                <select id="industry-filter" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-5 py-3 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-blue-600 transition-all cursor-pointer">
                    <option value="all">Semua Industri</option>
                    @foreach($industries as $industry)
                        <option value="{{ $industry->id }}">{{ $industry->nama }}</option>
                    @endforeach
                </select>
                <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </div>
            </div>
            @endif

            @if($technologies->isNotEmpty())
            <div class="relative min-w-[220px]">
                <select id="tech-filter" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-5 py-3 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-blue-600 transition-all cursor-pointer">
                    <option value="all">Semua Teknologi</option>
                    @foreach($technologies as $tech)
                        <option value="{{ $tech->id }}">{{ $tech->nama }}</option>
                    @endforeach
                </select>
                <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </div>
            </div>
            @endif
        </div>

        {{-- Clients Grid --}}
        <div id="clients-grid" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 border-l border-t border-gray-100">
            @forelse($klients as $klient)
                <div class="client-card h-32 sm:h-40 flex items-center justify-center p-6 border-r border-b border-gray-100 hover:bg-gray-50 transition-colors duration-300 group relative overflow-hidden"
                     data-industry="{{ $klient->category && $klient->category->type == 'Industry' ? $klient->category->id : '' }}"
                     data-tech="{{ $klient->category && $klient->category->type == 'Technology' ? $klient->category->id : '' }}">
                    
                    @php
                        $logoPath = (string) ($klient->logo ?? '');
                        $logoUrl = str_starts_with($logoPath, 'http://') || str_starts_with($logoPath, 'https://')
                            ? $logoPath
                            : asset('storage/' . ltrim($logoPath, '/'));
                    @endphp

                    <img src="{{ $logoUrl }}" alt="{{ $klient->nama }}" class="max-w-[65%] max-h-[45%] object-contain filter grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500" />
                </div>
            @empty
                <div class="col-span-full py-20 text-center text-gray-400 border-r border-b border-gray-100">
                    Belum ada data klien tersedia.
                </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const industryFilter = document.getElementById('industry-filter');
        const techFilter = document.getElementById('tech-filter');
        const grid = document.getElementById('clients-grid');
        const cards = grid.querySelectorAll('.client-card');

        function filterClients() {
            const industry = industryFilter ? industryFilter.value : 'all';
            const tech = techFilter ? techFilter.value : 'all';

            cards.forEach(card => {
                const cardIndustry = card.getAttribute('data-industry');
                const cardTech = card.getAttribute('data-tech');

                let show = true;
                if (industry !== 'all') {
                    if (cardIndustry !== industry) show = false;
                }
                if (tech !== 'all') {
                    if (cardTech !== tech) show = false;
                }

                if (show) {
                    card.removeAttribute('hidden');
                    card.classList.remove('hidden');
                    card.classList.add('flex');
                } else {
                    card.setAttribute('hidden', '');
                    card.classList.remove('flex');
                    card.classList.add('hidden');
                }
            });
        }

        if (industryFilter) industryFilter.addEventListener('change', filterClients);
        if (techFilter) techFilter.addEventListener('change', filterClients);
    });
</script>
