@extends('layouts.app')

@section('content')
<main class="relative overflow-hidden pt-32 pb-20 mx-auto max-w-7xl px-6 lg:px-10">
    
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-xs text-emerald-100/60 mb-6 reveal-up">
        <a href="/" class="hover:text-yellow-400 transition">Home</a>
        <span>/</span>
        <span class="text-white">Destinations</span>
    </div>

    <!-- Page Title -->
    <div class="mb-16 reveal-up text-center">
        <h1 class="text-4xl font-bold text-white sm:text-5xl lg:text-6xl mb-6">Explore <span class="text-emerald-100/60 font-light">Sri Lanka</span></h1>
        <p class="text-base text-emerald-100/70 max-w-2xl mx-auto leading-relaxed">
            From golden sun-kissed beaches to misty ancient mountains, discover the absolute best locations to add to your ultimate Sri Lankan itinerary.
        </p>
    </div>

    <!-- SECTION 1: Most Popular Destinations (Grid with specific images) -->
    <section class="mb-24">
        <div class="flex items-center gap-3 mb-8 reveal-up">
            <span class="text-3xl">📸</span>
            <h2 class="text-3xl font-bold text-white">Most Popular Tourist Destinations</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6">
            @foreach($destinations as $index => $destination)
            <!-- Destination Item -->
            <a href="#" class="relative h-64 sm:h-72 rounded-[1.5rem] overflow-hidden group shine-border reveal-up delay-{{ ($index % 4 + 1) * 100 }} block">
                @if(!empty($destination->image_url))
                    <img src="{{ Str::startsWith($destination->image_url, 'http') ? $destination->image_url : Storage::url($destination->image_url) }}" alt="{{ $destination->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                @else
                    <div class="w-full h-full bg-emerald-900/20 flex items-center justify-center p-4 text-center">
                        <span class="text-emerald-500 font-medium">{{ $destination->name }}</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-5 left-5 right-5">
                    <h3 class="text-white font-bold text-lg group-hover:text-yellow-400 transition-colors">{{ $destination->name }}</h3>
                    <p class="text-[10px] text-emerald-300 uppercase tracking-wider mt-1 font-semibold">{{ $destination->description }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </section>

    <!-- SECTION 2: Master List (Categorized) -->
    <section>
        <div class="flex items-center gap-3 mb-10 border-t border-white/10 pt-16 reveal-up">
            <span class="text-3xl">🇱🇰</span>
            <h2 class="text-3xl font-bold text-white">Sri Lanka Destinations Master List</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories as $index => $category)
            @php
                $delay = $index % 3 > 0 ? 'delay-' . (($index % 3) * 100) : '';
                $locationsByRegion = $category->locations->groupBy('region');
                $hasRegions = !$locationsByRegion->has('');
            @endphp
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up {{ $delay }}">
                <div class="h-48 overflow-hidden relative">
                    @if(!empty($category->image_url))
                        <img src="{{ Str::startsWith($category->image_url, 'http') ? $category->image_url : asset($category->image_url) }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-emerald-900/20 flex items-center justify-center p-4 text-center">
                            <span class="text-emerald-500 font-medium">{{ $category->name }}</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 {{ $category->name === 'Beaches & Coastal' ? 'text-2xl' : 'text-xl' }} font-bold text-white flex items-center gap-2"><span>{{ $category->icon }}</span> {{ $category->name }}</h3>
                </div>
                <div class="p-6 flex-1 bg-gradient-to-b from-[#020a05] to-transparent">
                    @if($hasRegions)
                        @foreach($locationsByRegion as $region => $locations)
                        <div class="mb-4">
                            <h4 class="text-xs font-bold text-yellow-400 uppercase tracking-wider mb-2">{{ $region }}</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($locations as $location)
                                <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">{{ $location->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="flex flex-wrap gap-2.5">
                            @foreach($locationsByRegion->get('') ?? [] as $location)
                            <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">{{ $location->name }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>

</main>
@endsection