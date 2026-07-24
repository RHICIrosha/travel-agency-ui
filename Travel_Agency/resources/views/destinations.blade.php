@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Poppins:wght@300;400;500;600&display=swap');
    
    .font-serif { font-family: 'Playfair Display', serif; }
    .font-sans { font-family: 'Poppins', sans-serif; }
    
    /* Subtle noise texture for premium glassmorphism feel */
    .bg-noise {
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
    }
</style>

<main class="relative overflow-hidden pt-24 pb-20 mx-auto max-w-7xl px-6 lg:px-10 font-sans">
    
    <div class="flex items-center gap-2 text-xs text-emerald-100/60 mb-6 reveal-up tracking-wider uppercase font-medium">
        <a href="/" class="hover:text-yellow-400 transition-colors duration-300">Home</a>
        <span class="text-emerald-500/50">/</span>
        <span class="text-white">Destinations</span>
    </div>

    @php
        $settings = \App\Models\SiteSetting::getSettings();
        $heroImage = $settings->destinations_hero_image 
            ? Storage::url($settings->destinations_hero_image) 
            : 'https://images.unsplash.com/photo-1588614959060-4d144f28b207?q=80&w=2000&auto=format&fit=crop';
    @endphp

    <div class="relative rounded-[2.5rem] overflow-hidden mb-20 reveal-up min-h-[55vh] flex items-center justify-center p-8 lg:p-16 border border-white/5 shadow-2xl">
        <img src="{{ $heroImage }}" alt="Sri Lanka Nature" class="absolute inset-0 w-full h-full object-cover">
        
        <div class="absolute inset-0 bg-gradient-to-b from-[#020a05]/95 via-emerald-950/85 to-[#020a05]/95"></div>
        
        <div class="absolute inset-0 bg-noise opacity-[0.04] mix-blend-overlay pointer-events-none"></div>
        
        <div class="relative z-10 text-center max-w-4xl mx-auto flex flex-col items-center">
            <span class="text-emerald-400 font-medium tracking-[0.2em] text-sm mb-4 uppercase">{{ $settings->destinations_hero_subtitle ?? 'Discover The Pearl' }}</span>
            <h1 class="text-5xl font-serif font-bold text-white sm:text-6xl lg:text-7xl mb-6 tracking-tight drop-shadow-xl">
                {!! str_replace('Sri Lanka', '<span class="text-emerald-300 font-medium italic">Sri Lanka</span>', nl2br(e($settings->destinations_hero_title ?? 'Explore Sri Lanka'))) !!}
            </h1>
            <p class="text-base sm:text-lg text-emerald-50/80 max-w-2xl leading-relaxed font-light">
                From golden sun-kissed beaches to misty ancient mountains, discover the absolute best locations to add to your ultimate Sri Lankan itinerary.
            </p>
        </div>
    </div>

    <section class="mb-24">
        <div class="flex items-center gap-4 mb-10 reveal-up">
            <div class="w-10 h-10 rounded-full bg-emerald-500/10 flex items-center justify-center border border-emerald-500/20">
                <span class="text-xl">📸</span>
            </div>
            <h2 class="text-3xl font-serif font-bold text-white">Most Popular <span class="text-emerald-400 font-light italic">Destinations</span></h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6 group/grid perspective-1000">
            @foreach($destinations as $index => $destination)
            @php
                $imgSrc = !empty($destination->image_url)
                    ? (str_starts_with($destination->image_url, 'http') ? $destination->image_url : Storage::url($destination->image_url))
                    : '';
                
                $delayClasses = ['delay-100', 'delay-200', 'delay-300', 'delay-500'];
                $cardDelay = $delayClasses[$index % 4];
            @endphp
            
            <div
                class="dest-card relative h-64 sm:h-80 rounded-[1.5rem] overflow-hidden shine-border reveal-up {{ $cardDelay }} cursor-pointer transition-all duration-500 ease-out hover:-translate-y-3 hover:shadow-[0_20px_40px_-15px_rgba(16,185,129,0.3)] hover:!opacity-100 group-hover/grid:opacity-40"
                data-name="{{ $destination->name }}"
                data-description="{{ $destination->description }}"
                data-img="{{ $imgSrc }}"
            >
                @if(!empty($imgSrc))
                    <img src="{{ $imgSrc }}" alt="{{ $destination->name }}" class="w-full h-full object-cover transition-transform duration-700 ease-out hover:scale-110">
                @else
                    <div class="w-full h-full bg-emerald-900/20 flex items-center justify-center p-4 text-center">
                        <span class="text-emerald-500 font-medium">{{ $destination->name }}</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent pointer-events-none opacity-90"></div>
                
                <div class="absolute bottom-6 left-6 right-6 pointer-events-none transform transition-transform duration-500 group-hover:translate-y-0">
                    <h3 class="text-white font-serif font-bold text-xl leading-snug drop-shadow-lg">{{ $destination->name }}</h3>
                    <div class="h-1 w-8 bg-emerald-500 rounded-full mt-3 opacity-0 transition-opacity duration-300 dest-card-indicator"></div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section>
        <div class="flex items-center gap-4 mb-12 border-t border-white/5 pt-16 reveal-up">
            <div class="w-10 h-10 rounded-full bg-emerald-500/10 flex items-center justify-center border border-emerald-500/20">
                <span class="text-xl">🗺️</span>
            </div>
            <h2 class="text-3xl font-serif font-bold text-white">The Master <span class="text-emerald-400 font-light italic">List</span></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories as $index => $category)
            @php
                $listDelays = ['', 'delay-100', 'delay-200'];
                $listDelay = $listDelays[$index % 3];
                
                $locationsByRegion = $category->locations->groupBy('region');
                $hasRegions = !$locationsByRegion->has('');
            @endphp
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up {{ $listDelay }} border border-white/5 shadow-xl hover:border-emerald-500/20 transition-colors duration-500">
                <div class="h-52 overflow-hidden relative group">
                    @if(!empty($category->image_url))
                        <img src="{{ str_starts_with($category->image_url, 'http') ? $category->image_url : Storage::url($category->image_url) }}" alt="{{ $category->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    @else
                        <div class="w-full h-full bg-emerald-950/40 flex items-center justify-center p-4 text-center">
                            <span class="text-emerald-500 font-medium">{{ $category->name }}</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] via-[#020a05]/50 to-transparent"></div>
                    <h3 class="absolute bottom-5 left-6 text-2xl font-serif font-bold text-white flex items-center gap-3 drop-shadow-md">
                        <span class="text-2xl drop-shadow-none">{{ $category->icon }}</span> {{ $category->name }}
                    </h3>
                </div>
                
                <div class="p-7 flex-1 bg-[#020a05] relative">
                    <div class="absolute inset-0 bg-noise opacity-[0.02] pointer-events-none"></div>
                    
                    @if($hasRegions)
                        @foreach($locationsByRegion as $region => $locations)
                        <div class="mb-6 relative z-10 last:mb-0">
                            <h4 class="text-[10px] font-bold text-emerald-400/80 uppercase tracking-[0.15em] mb-3">{{ $region }}</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($locations as $location)
                                <span class="bg-white/[0.03] border border-white/10 text-emerald-50 text-xs px-3.5 py-1.5 rounded-full hover:bg-emerald-500/20 hover:border-emerald-500/40 hover:text-white transition-all duration-300 cursor-pointer shadow-sm">
                                    {{ $location->name }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="flex flex-wrap gap-2 relative z-10">
                            @foreach($locationsByRegion->get('') ?? [] as $location)
                            <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 text-xs px-3.5 py-1.5 rounded-full hover:bg-emerald-500/30 transition-all duration-300 cursor-pointer">
                                {{ $location->name }}
                            </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main>

<div id="dest-popover" class="fixed z-[9999] pointer-events-none opacity-0 scale-95 transition-all duration-300 ease-out font-sans" style="width:480px; max-width:92vw;">
    <div class="flex rounded-[1.75rem] overflow-hidden shadow-[0_30px_100px_rgba(0,0,0,0.8)] border border-white/10 backdrop-blur-3xl bg-[#020a05]/85">
        <div id="dest-popover-img-wrap" class="w-2/5 shrink-0 relative min-h-[220px]">
            <img id="dest-popover-img" src="" alt="" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-[#020a05]/90"></div>
        </div>
        <div class="w-3/5 p-7 flex flex-col justify-center gap-3">
            <span class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest">Featured</span>
            <h3 id="dest-popover-name" class="text-2xl font-serif font-bold text-white leading-tight drop-shadow-md"></h3>
            <p id="dest-popover-desc" class="text-[13px] text-emerald-50/70 leading-relaxed font-light line-clamp-4"></p>
        </div>
    </div>
</div>

<script>
(function () {
    const cards = document.querySelectorAll('.dest-card');
    const popover = document.getElementById('dest-popover');
    const popImg = document.getElementById('dest-popover-img');
    const popImgWrap = document.getElementById('dest-popover-img-wrap');
    const popName = document.getElementById('dest-popover-name');
    const popDesc = document.getElementById('dest-popover-desc');

    let visible = false;

    function showPopover(card) {
        const name = card.dataset.name || '';
        const desc = card.dataset.description || '';
        const img = card.dataset.img || '';
        
        // Show indicator line on hovered card
        const indicator = card.querySelector('.dest-card-indicator');
        if(indicator) indicator.style.opacity = '1';

        popName.textContent = name;
        popDesc.textContent = desc;

        if (img) {
            popImg.src = img;
            popImg.alt = name;
            popImgWrap.style.display = '';
        } else {
            popImgWrap.style.display = 'none';
        }

        positionPopover(card);

        popover.classList.remove('opacity-0', 'scale-95');
        popover.classList.add('opacity-100', 'scale-100');
        visible = true;
    }

    function hidePopover(card) {
        const indicator = card.querySelector('.dest-card-indicator');
        if(indicator) indicator.style.opacity = '0';
        
        popover.classList.add('opacity-0', 'scale-95');
        popover.classList.remove('opacity-100', 'scale-100');
        visible = false;
    }

    function positionPopover(card) {
        const rect = card.getBoundingClientRect();
        const pw = popover.offsetWidth || 480;
        const ph = popover.offsetHeight || 220;
        const margin = 16; // slightly increased margin for breathing room
        const vw = window.innerWidth;
        const vh = window.innerHeight;

        let top = rect.top + rect.height / 2 - ph / 2;
        top = Math.max(margin, Math.min(top, vh - ph - margin));

        let left = rect.right + margin;
        if (left + pw > vw - margin) {
            left = rect.left - pw - margin;
        }
        if (left < margin) {
            left = margin;
        }

        popover.style.top = top + 'px';
        popover.style.left = left + 'px';
    }

    cards.forEach(card => {
        card.addEventListener('mouseenter', () => showPopover(card));
        card.addEventListener('mouseleave', () => hidePopover(card));
        card.addEventListener('mousemove', () => { if (visible) positionPopover(card); });
    });
})();
</script>
@endsection