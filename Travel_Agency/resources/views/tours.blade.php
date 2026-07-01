@extends('layouts.app')

@section('content')
<main class="relative overflow-hidden pt-32 pb-20 mx-auto max-w-7xl px-6 lg:px-10">
    
    <!-- Page Title -->
    <div class="mb-10 reveal-up">
        <h1 class="text-4xl font-bold text-white sm:text-5xl">Tours <span class="text-emerald-100/60 font-light">& Destinations</span></h1>
    </div>

    <!-- Main Layout Wrapper (Sidebar + Grid) -->
    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- Sidebar Filters -->
        <aside class="w-full lg:w-72 shrink-0 glass-panel shine-border rounded-3xl p-6 self-start lg:sticky lg:top-32 reveal-up delay-100">
            <form id="filterForm" action="/tours" method="GET">
                <!-- Filter: Number of Days -->
                <div class="mb-8">
                    <h3 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Number of Days</h3>
                    <div class="px-2">
                        <input type="range" name="days" min="3" max="15" value="{{ request('days', 15) }}" onchange="this.form.submit()" oninput="document.getElementById('days_val').innerText = this.value" class="w-full h-1 bg-white/20 rounded-lg appearance-none cursor-pointer accent-yellow-400">
                        <div class="flex justify-between text-xs text-emerald-100/60 mt-2 font-medium">
                            <span>3</span>
                            <span id="days_val" class="text-white font-bold">{{ request('days', 15) }}</span>
                            <span>15</span>
                        </div>
                    </div>
                </div>

                <hr class="border-white/10 mb-8">

                <!-- Filter: Destination -->
                <div class="mb-8">
                    <h3 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Destination</h3>
                    <div class="flex flex-col gap-3">
                        @foreach($allDestinations as $destination)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="destinations[]" value="{{ $destination->id }}" onchange="this.form.submit()" {{ in_array($destination->id, request('destinations', [])) ? 'checked' : '' }} class="w-4 h-4 rounded accent-yellow-400 cursor-pointer bg-black/20 border-white/20">
                            <span class="text-sm text-emerald-100/80 group-hover:text-white transition">{{ $destination->name }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <hr class="border-white/10 mb-8">

                <!-- Filter: Trip Type -->
                <div class="mb-8">
                    <h3 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Trip Type</h3>
                    <div class="flex flex-col gap-3">
                        @forelse($allTripTypes as $tripType)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="trip_types[]" value="{{ $tripType }}" onchange="this.form.submit()" {{ in_array($tripType, request('trip_types', [])) ? 'checked' : '' }} class="w-4 h-4 rounded accent-yellow-400 cursor-pointer bg-black/20 border-white/20">
                            <span class="text-sm text-emerald-100/80 group-hover:text-white transition">{{ ucfirst($tripType) }}</span>
                        </label>
                        @empty
                        <span class="text-sm text-emerald-100/50">No trip types available</span>
                        @endforelse
                    </div>
                </div>

                <hr class="border-white/10 mb-8">

                <!-- Filter: Tour Theme -->
                <div>
                    <h3 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Tour Theme</h3>
                    <div class="flex flex-col gap-3">
                        @forelse($allThemes as $theme)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="themes[]" value="{{ $theme }}" onchange="this.form.submit()" {{ in_array($theme, request('themes', [])) ? 'checked' : '' }} class="w-4 h-4 rounded accent-yellow-400 cursor-pointer bg-black/20 border-white/20">
                            <span class="text-sm text-emerald-100/80 group-hover:text-white transition">{{ ucfirst($theme) }}</span>
                        </label>
                        @empty
                        <span class="text-sm text-emerald-100/50">No themes available</span>
                        @endforelse
                    </div>
                </div>
            </form>
        </aside>

        <!-- Right Side: Tours Grid -->
        <div class="flex-1">
            <div class="mb-6 reveal-up delay-200">
                <h2 class="text-2xl font-bold text-white">Tailor <span class="text-emerald-100/60 font-light">Made Tours</span></h2>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                @foreach($tours as $index => $tour)
                @php
                    $delay = ($index % 3 + 1) * 100;
                @endphp
                <a href="/tours/{{ $tour->id }}" class="glass-panel shine-border overflow-hidden rounded-[1.5rem] flex flex-col transition-transform duration-300 hover:-translate-y-2 group reveal-up delay-{{ $delay }} cursor-pointer">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ Str::startsWith($tour->image_url, 'http') ? $tour->image_url : Storage::url($tour->image_url) }}" alt="{{ $tour->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-1 text-emerald-400 text-xs font-medium">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $tour->destination?->name ?? 'Sri Lanka' }}
                            </div>
                            <span class="bg-white/5 border border-white/10 text-white/90 text-[10px] uppercase tracking-wider px-2.5 py-1 rounded-md backdrop-blur">Tailor Made</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-6 flex-1 group-hover:text-yellow-400 transition-colors">{{ $tour->duration_days }} Days - {{ $tour->title }}</h3>
                        <div class="flex justify-between items-end mt-auto pt-4 border-t border-white/10">
                            <span class="text-emerald-100/60 text-xs">Starting From</span>
                            <span class="text-white font-bold tracking-wide">LKR {{ number_format($tour->price) }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="mt-12 flex justify-center reveal-up">
                <button class="bg-black text-white hover:bg-yellow-400 hover:text-black font-semibold text-sm px-10 py-3 rounded-full transition-colors shadow-[0_0_20px_rgba(250,204,21,0.1)] hover:shadow-[0_0_20px_rgba(250,204,21,0.3)]">
                    Load More
                </button>
            </div>

        </div>
    </div>
</main>
@endsection