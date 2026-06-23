@extends('layouts.app')

@section('content')
<main class="relative overflow-hidden">

    {{-- ============================================================ --}}
    {{-- SECTION 1: HERO                                             --}}
    {{-- ============================================================ --}}
    <section class="grid-pattern relative">
        <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(ellipse 70% 60% at 15% 50%, rgba(250,204,21,0.06) 0%, transparent 65%), radial-gradient(ellipse 55% 70% at 85% 15%, rgba(34,197,94,0.07) 0%, transparent 60%);"></div>

        <div class="mx-auto max-w-7xl px-6 lg:px-10 pt-28 pb-16">
            <div class="grid items-center gap-12 lg:grid-cols-[1fr_1fr]">

                {{-- LEFT: Hero Text --}}
                <div class="relative z-10 reveal-up">
                    {{-- Badge --}}
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-amber-200 shadow-lg backdrop-blur">
                        <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse inline-block flex-shrink-0"></span>
                        {{ $settings->hero_badge }}
                    </span>

                    {{-- Heading --}}
                    <h1 class="mt-5 font-extrabold tracking-tight text-white" style="font-size: clamp(2.8rem, 6vw, 5rem); line-height: 1.06; letter-spacing: -0.02em;">
                        {{ $settings->hero_heading_line1 }}<br>
                        <span style="color: #facc15; text-shadow: 0 0 60px rgba(250,204,21,0.5), 0 0 20px rgba(250,204,21,0.3);">{{ $settings->hero_heading_highlight }}</span><br>
                        {{ $settings->hero_heading_line2 }}
                    </h1>

                    <p class="mt-5 max-w-lg text-base leading-7 text-emerald-100/65 sm:text-lg sm:leading-8">
                        {{ $settings->hero_subtext }}
                    </p>

                    {{-- CTA Buttons --}}
                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="{{ $settings->hero_cta_primary_url }}" id="hero-plan-journey" class="group inline-flex items-center gap-2 rounded-full bg-yellow-400 px-7 py-3.5 font-bold text-emerald-950 transition-all hover:scale-[1.04] hover:shadow-[0_0_30px_rgba(250,204,21,0.4)]">
                            {{ $settings->hero_cta_primary_label }}
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ $settings->hero_cta_secondary_url }}" id="hero-explore-tours" class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/5 px-7 py-3.5 font-semibold text-white backdrop-blur transition hover:bg-white/10">
                            {{ $settings->hero_cta_secondary_label }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>

                    {{-- Trust Stats --}}
                    <div class="mt-10 flex flex-wrap items-center gap-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-yellow-400/15 border border-yellow-400/25 flex items-center justify-center text-lg">🏆</div>
                            <div>
                                <p class="text-white font-bold text-base leading-none">{{ $settings->hero_stat1_value }}</p>
                                <p class="text-emerald-100/50 text-xs mt-0.5">{{ $settings->hero_stat1_label }}</p>
                            </div>
                        </div>
                        <div class="w-px h-7 bg-white/10 hidden sm:block"></div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-emerald-500/15 border border-emerald-500/25 flex items-center justify-center text-lg">⭐</div>
                            <div>
                                <p class="text-white font-bold text-base leading-none">{{ $settings->hero_stat2_value }}</p>
                                <p class="text-emerald-100/50 text-xs mt-0.5">{{ $settings->hero_stat2_label }}</p>
                            </div>
                        </div>
                        <div class="w-px h-7 bg-white/10 hidden sm:block"></div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-emerald-500/15 border border-emerald-500/25 flex items-center justify-center text-lg">🗺️</div>
                            <div>
                                <p class="text-white font-bold text-base leading-none">{{ $settings->hero_stat3_value }}</p>
                                <p class="text-emerald-100/50 text-xs mt-0.5">{{ $settings->hero_stat3_label }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Image Cards 2-column grid --}}
                <div class="relative reveal-scale">
                    <div class="absolute -left-8 top-8 h-40 w-40 rounded-full bg-yellow-400/20 blur-3xl floaty pointer-events-none"></div>
                    <div class="absolute right-0 bottom-8 h-36 w-36 rounded-full bg-emerald-500/15 blur-3xl floaty pointer-events-none" style="animation-delay:-3s;"></div>

                    <div class="grid grid-cols-2 gap-4">

                        {{-- LEFT inner column: tall image + stat --}}
                        <div class="flex flex-col gap-4">
                            <div class="glass-panel shine-border overflow-hidden rounded-[1.75rem] relative group" style="height:320px;">
                                <img src="{{ $settings->hero_image_1 ? asset('storage/' . $settings->hero_image_1) : 'https://images.unsplash.com/photo-1588416936097-41850ab3d86d?auto=format&fit=crop&w=900&q=80' }}"
                                     alt="Sigiriya Lion Rock"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#020a05]/85 via-transparent to-transparent"></div>
                                <div class="absolute top-3 left-3 rounded-xl bg-black/50 px-3 py-2 border border-white/10 backdrop-blur">
                                    <p class="text-[9px] uppercase tracking-widest text-yellow-400">Live Route</p>
                                    <p class="text-[10px] text-white mt-0.5">Colombo → Ella → Galle</p>
                                </div>
                                <div class="absolute bottom-4 left-4">
                                    <span class="text-[10px] uppercase tracking-wider text-yellow-400 font-semibold">Heritage</span>
                                    <p class="text-white font-bold text-sm mt-0.5">Sigiriya Lion Rock</p>
                                </div>
                            </div>
                            <div class="glass-panel shine-border rounded-[1.5rem] p-5">
                                <p class="text-[10px] uppercase tracking-wider text-emerald-100/50">Most Popular</p>
                                <p class="text-2xl font-extrabold text-white mt-1">10 Days</p>
                                <p class="text-xs text-emerald-100/55 mt-1">Island Discovery Package</p>
                            </div>
                        </div>

                        {{-- RIGHT inner column: two images + stat --}}
                        <div class="flex flex-col gap-4">
                            <div class="glass-panel shine-border overflow-hidden rounded-[1.75rem] relative group" style="height:190px;">
                                <img src="{{ $settings->hero_image_2 ? asset('storage/' . $settings->hero_image_2) : 'https://images.unsplash.com/photo-1612099453261-b04df0e4c44a?auto=format&fit=crop&w=800&q=80' }}"
                                     alt="Yala Wildlife Safari"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#020a05]/85 via-transparent to-transparent"></div>
                                <div class="absolute bottom-3 left-4">
                                    <span class="text-[10px] uppercase tracking-wider text-yellow-400 font-semibold">Wildlife</span>
                                    <p class="text-white font-bold text-sm mt-0.5">Yala National Park</p>
                                </div>
                            </div>
                            <div class="glass-panel shine-border overflow-hidden rounded-[1.75rem] relative group" style="height:190px;">
                                <img src="{{ $settings->hero_image_3 ? asset('storage/' . $settings->hero_image_3) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80' }}"
                                     alt="Ella Hill Country"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#020a05]/85 via-transparent to-transparent"></div>
                                <div class="absolute bottom-3 left-4">
                                    <span class="text-[10px] uppercase tracking-wider text-yellow-400 font-semibold">Hill Country</span>
                                    <p class="text-white font-bold text-sm mt-0.5">Ella &amp; Tea Trails</p>
                                </div>
                            </div>
                            <div class="glass-panel shine-border rounded-[1.5rem] p-5">
                                <p class="text-[10px] uppercase tracking-wider text-emerald-100/50">Travel Style</p>
                                <p class="text-2xl font-extrabold text-white mt-1">Premium</p>
                                <p class="text-xs text-emerald-100/55 mt-1">International Standard</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 2: ABOUT US                                         --}}
    {{-- ============================================================ --}}
    <section id="about" class="mx-auto max-w-7xl px-6 py-24 lg:px-10">
        <div class="grid gap-12 lg:grid-cols-2 items-center">

            {{-- Left: Images collage --}}
            <div class="relative reveal-scale">
                <div class="absolute -top-4 -left-4 w-48 h-48 bg-yellow-400/10 rounded-full blur-3xl floaty"></div>
                <div class="absolute bottom-0 right-0 w-40 h-40 bg-emerald-500/15 rounded-full blur-3xl floaty" style="animation-delay:-2s;"></div>

                <div class="grid grid-cols-2 gap-4 relative z-10">
                    <div class="glass-panel shine-border overflow-hidden rounded-[1.5rem] row-span-2">
                        <img src="{{ $settings->about_image_1 ? asset('storage/' . $settings->about_image_1) : 'https://images.unsplash.com/photo-1567254790-5c5bc11d0d27?auto=format&fit=crop&w=800&q=80' }}" alt="Sri Lanka ancient temple" class="w-full h-full object-cover" style="min-height:340px;">
                    </div>
                    <div class="glass-panel shine-border overflow-hidden rounded-[1.5rem]">
                        <img src="{{ $settings->about_image_2 ? asset('storage/' . $settings->about_image_2) : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80' }}" alt="Sri Lanka beach" class="w-full h-48 object-cover">
                    </div>
                    <div class="glass-panel shine-border overflow-hidden rounded-[1.5rem]">
                        <img src="{{ $settings->about_image_3 ? asset('storage/' . $settings->about_image_3) : 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80' }}" alt="Wildlife safari" class="w-full h-48 object-cover">
                    </div>
                </div>

                <div class="absolute -bottom-4 left-4 glass-panel shine-border rounded-2xl px-5 py-4 z-20 shadow-xl">
                    <p class="text-xs uppercase tracking-wider text-yellow-400 mb-1">{{ $settings->about_since_year }}</p>
                    <p class="text-white font-bold text-lg leading-none">{{ $settings->about_experience_label }}</p>
                </div>
            </div>

            {{-- Right: About text (DB) --}}
            <div class="reveal-up">
                <p class="text-sm uppercase tracking-[0.35em] text-yellow-400 mb-3">{{ $settings->about_badge }}</p>
                <h2 class="text-3xl font-bold text-white sm:text-4xl lg:text-5xl leading-tight">
                    {{ $settings->about_heading_line1 }}<br>
                    <span class="text-emerald-400">{{ $settings->about_heading_highlight }}</span><br>
                    {{ $settings->about_heading_line2 }}
                </h2>

                @if($settings->about_paragraph1)
                    <p class="mt-6 text-emerald-100/70 leading-8 text-base">{{ $settings->about_paragraph1 }}</p>
                @endif
                @if($settings->about_paragraph2)
                    <p class="mt-4 text-emerald-100/70 leading-8 text-base">{{ $settings->about_paragraph2 }}</p>
                @endif
                @if($settings->about_paragraph3)
                    <p class="mt-4 text-emerald-100/70 leading-8 text-base">{{ $settings->about_paragraph3 }}</p>
                @endif

                <div class="mt-8 flex gap-4 flex-wrap">
                    <a href="{{ $settings->about_cta_primary_url }}" class="rounded-full bg-yellow-400 px-6 py-3 font-bold text-emerald-950 transition hover:scale-[1.03] hover:shadow-[0_0_25px_rgba(250,204,21,0.3)]">
                        {{ $settings->about_cta_primary_label }}
                    </a>
                    <a href="/tours" class="rounded-full border border-white/15 bg-white/5 px-6 py-3 font-semibold text-white backdrop-blur transition hover:bg-white/10">
                        View All Tours
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 3: WHY CHOOSE ZENORA TRAVELS                        --}}
    {{-- ============================================================ --}}
    <section id="why-us" class="mx-auto max-w-7xl px-6 py-20 lg:px-10">
        <div class="text-center mb-14 reveal-up">
            <p class="text-sm uppercase tracking-[0.35em] text-yellow-400 mb-3">Why Choose Us</p>
            <h2 class="text-3xl font-bold text-white sm:text-4xl lg:text-5xl">
                Why Choose <span class="text-emerald-400">Zenora Travels</span>
            </h2>
        </div>

        @php $whyDelays = ['delay-100','delay-200','delay-300','delay-100','delay-200']; @endphp
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-{{ min($whyUsItems->count(), 5) }}">
            @foreach($whyUsItems as $i => $item)
            <article class="glass-panel shine-border rounded-[1.75rem] p-6 reveal-up {{ $whyDelays[$i % 5] }} group hover:-translate-y-2 transition-transform duration-300">
                <div class="w-12 h-12 rounded-2xl bg-yellow-400/10 border border-yellow-400/20 flex items-center justify-center text-2xl mb-5 group-hover:bg-yellow-400/20 transition-colors">
                    {{ $item->icon }}
                </div>
                <h3 class="text-white font-bold text-base mb-3">{{ $item->title }}</h3>
                <p class="text-emerald-100/60 text-sm leading-6">{{ $item->description }}</p>
            </article>
            @endforeach
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 4: OUR SERVICES                                     --}}
    {{-- ============================================================ --}}
    <section id="services" class="mx-auto max-w-7xl px-6 py-20 lg:px-10">

        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between mb-14 reveal-up">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-yellow-400 mb-3">What We Offer</p>
                <h2 class="text-3xl font-bold text-white sm:text-4xl lg:text-5xl">Our Services</h2>
            </div>
            <a href="/contact" class="shrink-0 rounded-full border border-white/15 bg-white/5 px-6 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/10">
                Enquire Now →
            </a>
        </div>

        @php $svcDelays = ['delay-100','delay-200','delay-300','delay-100','delay-200','delay-300']; @endphp
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($homeServices as $i => $service)
            <div class="group glass-panel shine-border overflow-hidden rounded-[2rem] reveal-up {{ $svcDelays[$i % 6] }} hover:scale-[1.02] transition-transform duration-300">
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ $service->display_image }}" alt="{{ $service->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] via-transparent to-transparent"></div>
                    <span class="absolute top-4 left-4 text-3xl">{{ $service->icon }}</span>
                </div>
                <div class="p-6">
                    <h3 class="text-white font-bold text-xl mb-2">{{ $service->title }}</h3>
                    <p class="text-emerald-100/60 text-sm leading-6">{{ $service->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 5: FEATURED DESTINATIONS                            --}}
    {{-- ============================================================ --}}
    <section id="destinations" class="mx-auto max-w-7xl px-6 py-20 lg:px-10">

        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between mb-14 reveal-up">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-yellow-400 mb-3">Must-Visit Places</p>
                <h2 class="text-3xl font-bold text-white sm:text-4xl lg:text-5xl">Featured Destinations</h2>
            </div>
            <a href="/destinations" class="shrink-0 rounded-full border border-white/15 bg-white/5 px-6 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/10">
                All Destinations →
            </a>
        </div>

        @php
            $badgeClasses = [
                'yellow'  => 'bg-yellow-400/20 border-yellow-400/30 text-yellow-400',
                'emerald' => 'bg-emerald-500/20 border-emerald-500/30 text-emerald-400',
                'amber'   => 'bg-amber-500/20 border-amber-500/30 text-amber-400',
                'blue'    => 'bg-blue-500/20 border-blue-500/30 text-blue-400',
            ];
            $largeDest   = $featuredDestinations->firstWhere('is_featured_large', true);
            $smallDests  = $featuredDestinations->where('is_featured_large', false)->values();
            $topSmall    = $smallDests->take(2);
            $bottomSmall = $smallDests->skip(2)->values();
        @endphp

        <div class="grid gap-5 lg:grid-cols-3">

            {{-- Large feature card --}}
            @if($largeDest)
            <div class="group glass-panel shine-border overflow-hidden rounded-[2rem] relative lg:row-span-2 reveal-up delay-100 cursor-pointer hover:scale-[1.01] transition-transform duration-300">
                <img src="{{ $largeDest->display_image }}" alt="{{ $largeDest->name }}" class="w-full h-full object-cover min-h-[500px] transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-[#020a05]/90 via-[#020a05]/20 to-transparent"></div>
                <span class="absolute top-5 left-5 rounded-full border backdrop-blur px-3 py-1 text-xs uppercase tracking-wider {{ $badgeClasses[$largeDest->badge_color] ?? $badgeClasses['yellow'] }}">{{ $largeDest->badge_label }}</span>
                <div class="absolute bottom-6 left-6 right-6">
                    <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-yellow-400 transition-colors">{{ $largeDest->name }}</h3>
                    <p class="text-sm text-emerald-100/70">{{ $largeDest->tagline }}</p>
                    <div class="mt-4 inline-flex items-center gap-2 text-yellow-400 text-sm font-medium">
                        Explore <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </div>
            @endif

            {{-- Top 2 medium cards --}}
            @foreach($topSmall as $i => $dest)
            <div class="group glass-panel shine-border overflow-hidden rounded-[2rem] relative reveal-up {{ $i === 0 ? 'delay-200' : 'delay-300' }} cursor-pointer hover:scale-[1.01] transition-transform duration-300">
                <img src="{{ $dest->display_image }}" alt="{{ $dest->name }}" class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-[#020a05]/90 via-transparent to-transparent"></div>
                <span class="absolute top-4 left-4 rounded-full border backdrop-blur px-3 py-1 text-xs uppercase tracking-wider {{ $badgeClasses[$dest->badge_color] ?? $badgeClasses['emerald'] }}">{{ $dest->badge_label }}</span>
                <div class="absolute bottom-5 left-5 right-5">
                    <h3 class="text-xl font-bold text-white mb-1 group-hover:text-yellow-400 transition-colors">{{ $dest->name }}</h3>
                    <p class="text-xs text-emerald-100/60">{{ $dest->tagline }}</p>
                </div>
            </div>
            @endforeach

            {{-- Bottom small cards row --}}
            @if($bottomSmall->count() > 0)
            <div class="lg:col-span-2 grid gap-5 sm:grid-cols-{{ min($bottomSmall->count(), 3) }}">
                @foreach($bottomSmall as $j => $dest)
                <div class="group glass-panel shine-border overflow-hidden rounded-[2rem] relative reveal-up {{ ['delay-100','delay-200','delay-300'][$j % 3] }} cursor-pointer hover:scale-[1.02] transition-transform duration-300">
                    <img src="{{ $dest->display_image }}" alt="{{ $dest->name }}" class="w-full h-52 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05]/90 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-base font-bold text-white group-hover:text-yellow-400 transition-colors">{{ $dest->name }}</h3>
                        <p class="text-xs text-emerald-100/60 mt-1">{{ $dest->tagline }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>

        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 6: OUR PROMISE                                      --}}
    {{-- ============================================================ --}}
    <section id="our-promise" class="mx-auto max-w-7xl px-6 py-20 lg:px-10">
        <div class="glass-panel shine-border rounded-[2.5rem] relative overflow-hidden reveal-up">

            {{-- Background image overlay --}}
            <div class="absolute inset-0">
                <img src="{{ $settings->promise_bg_image ? asset('storage/' . $settings->promise_bg_image) : 'https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=2000&q=60' }}" alt="Sri Lanka landscape" class="w-full h-full object-cover opacity-15">
                <div class="absolute inset-0 bg-gradient-to-br from-[#031008]/80 via-[#031008]/60 to-[#020a05]/90"></div>
            </div>

            {{-- Glow orbs --}}
            <div class="absolute -top-20 -right-20 w-80 h-80 bg-yellow-400/10 rounded-full blur-3xl floaty"></div>
            <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl floaty" style="animation-delay:-4s;"></div>

            <div class="relative z-10 text-center px-8 py-20 md:py-28 max-w-4xl mx-auto">
                <p class="text-sm uppercase tracking-[0.35em] text-yellow-400 mb-6">{{ $settings->promise_badge }}</p>

                <h2 class="text-3xl font-bold text-white sm:text-4xl lg:text-6xl leading-tight">
                    {{ $settings->promise_heading_line1 }}
                    <span style="color:#facc15;text-shadow:0 0 40px rgba(250,204,21,0.4);">{{ $settings->promise_heading_highlight }}</span>
                </h2>

                @if($settings->promise_text1)
                <p class="mt-8 text-lg text-emerald-100/70 leading-8 max-w-2xl mx-auto">{{ $settings->promise_text1 }}</p>
                @endif
                @if($settings->promise_text2)
                <p class="mt-4 text-lg text-emerald-100/70 leading-8 max-w-2xl mx-auto">
                    With Zenora Travels, every journey becomes a <span class="text-white font-semibold">{{ $settings->promise_text2 }}</span>
                </p>
                @endif

                <div class="mt-14 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                    <div class="glass-panel rounded-2xl p-6">
                        <p class="text-3xl mb-3">{{ $settings->promise_pillar1_icon }}</p>
                        <p class="text-white font-bold">{{ $settings->promise_pillar1_title }}</p>
                        <p class="text-emerald-100/50 text-sm mt-1">{{ $settings->promise_pillar1_desc }}</p>
                    </div>
                    <div class="glass-panel rounded-2xl p-6">
                        <p class="text-3xl mb-3">{{ $settings->promise_pillar2_icon }}</p>
                        <p class="text-white font-bold">{{ $settings->promise_pillar2_title }}</p>
                        <p class="text-emerald-100/50 text-sm mt-1">{{ $settings->promise_pillar2_desc }}</p>
                    </div>
                    <div class="glass-panel rounded-2xl p-6">
                        <p class="text-3xl mb-3">{{ $settings->promise_pillar3_icon }}</p>
                        <p class="text-white font-bold">{{ $settings->promise_pillar3_title }}</p>
                        <p class="text-emerald-100/50 text-sm mt-1">{{ $settings->promise_pillar3_desc }}</p>
                    </div>
                </div>

                <div class="mt-12">
                    <a href="{{ $settings->promise_cta_url }}" class="inline-flex items-center gap-3 rounded-full bg-yellow-400 px-10 py-4 font-bold text-emerald-950 text-lg transition-all hover:scale-[1.04] hover:shadow-[0_0_40px_rgba(250,204,21,0.4)]">
                        {{ $settings->promise_cta_label }}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection