
@extends('layouts.app')

@section('content')
<main class="relative overflow-hidden pt-32 pb-20 mx-auto max-w-7xl px-6 lg:px-10">
    
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-xs text-emerald-100/60 mb-6 reveal-up">
        <a href="/" class="hover:text-yellow-400 transition">Home</a>
        <span>/</span>
        <a href="/tours" class="hover:text-yellow-400 transition">Tours</a>
        <span>/</span>
        <span class="text-white">{{ $tour->destination?->name ?? 'Sri Lanka' }}</span>
    </div>

    <!-- Page Title -->
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-8 reveal-up">
        {{ $tour->destination?->name ?? 'Sri Lanka' }} <span class="text-emerald-100/60 font-light">{{ $tour->duration_days }} Days - {{ $tour->title }}</span>
    </h1>

    <!-- Two Column Layout Wrapper -->
    <div class="flex flex-col lg:flex-row gap-8 items-start">
        
        <!-- LEFT COLUMN: Main Content Area (2/3 Width) -->
        <div class="w-full lg:w-2/3 flex flex-col gap-8 reveal-up">
            
            <!-- Image Gallery/Hero Area -->
            <div class="relative w-full aspect-[16/9] rounded-[2rem] overflow-hidden group shine-border">
                @if(!empty($tour->image_url))
                    <img src="{{ Str::startsWith($tour->image_url, 'http') ? $tour->image_url : Storage::url($tour->image_url) }}" alt="{{ $tour->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                @else
                    <div class="w-full h-full bg-emerald-900/20 flex items-center justify-center p-8 text-center">
                        <span class="text-emerald-500 font-medium text-2xl">{{ $tour->title }}</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-[#020a05]/80 via-transparent to-transparent"></div>
                <div class="absolute bottom-6 left-0 right-0 flex justify-center gap-2 z-10">
                    <span class="w-2.5 h-2.5 rounded-full bg-yellow-400 cursor-pointer"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white transition cursor-pointer"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white transition cursor-pointer"></span>
                </div>
            </div>

            <!-- Tour Overview Card -->
            <div class="glass-panel shine-border rounded-[2rem] p-6 sm:p-10">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                    <h2 class="text-2xl font-bold text-white">Tour Summary</h2>
                    <div class="flex items-center gap-2 text-sm text-emerald-100/80 bg-white/5 border border-white/10 px-4 py-2 rounded-full backdrop-blur">
                        <span class="text-blue-400">🛡️</span> Suitable for : <span class="font-semibold text-white ml-1">{{ $tour->suitable_for ?? 'Everyone' }}</span>
                    </div>
                </div>
                <p class="text-emerald-100/70 leading-relaxed mb-8">
                    {{ $tour->description }}
                </p>

                <!-- Inclusion Quick Flags -->
                <h3 class="text-white font-bold mb-4 uppercase tracking-wider text-xs text-yellow-400">Core Features Included</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-8 text-sm text-emerald-100/80">
                    @if($tour->inclusions && count($tour->inclusions) > 0)
                        @foreach($tour->inclusions as $inclusion)
                        <div class="flex items-center gap-2">✔ {{ $inclusion }}</div>
                        @endforeach
                    @else
                        <div class="flex items-center gap-2">✔ Accommodation</div>
                        <div class="flex items-center gap-2">✔ Transport</div>
                    @endif
                </div>

                <div class="border-t border-white/10 pt-6 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex flex-wrap gap-2">
                        @if($tour->themes && count($tour->themes) > 0)
                            @foreach($tour->themes as $theme)
                            <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 px-3 py-1 text-xs rounded-md">{{ $theme }}</span>
                            @endforeach
                        @else
                            <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 px-3 py-1 text-xs rounded-md">🌴 Tropical</span>
                        @endif
                    </div>
                    <div class="text-sm text-emerald-100/70">
                        <span class="bg-yellow-400 text-emerald-950 font-bold px-2 py-0.5 rounded mr-2">{{ $tour->itineraries->count() ?: 1 }}</span> Cities Explored
                    </div>
                </div>
            </div>

            <!-- Tab System Selection Menu -->
            <div class="flex border-b border-white/10 gap-2">
                <button onclick="switchTab('itinerary')" id="btn-itinerary" class="px-6 py-3 font-semibold text-sm border-b-2 border-yellow-400 text-yellow-400 transition-all">Itinerary</button>
                <button onclick="switchTab('inclusions')" id="btn-inclusions" class="px-6 py-3 font-semibold text-sm border-b-2 border-transparent text-emerald-100/60 hover:text-white transition-all">Inclusions / Exclusions</button>
                <button onclick="switchTab('reviews')" id="btn-reviews" class="px-6 py-3 font-semibold text-sm border-b-2 border-transparent text-emerald-100/60 hover:text-white transition-all">Success Stories</button>
            </div>

            <!-- TAB CONTAINER 1: THE ITINERARY + PRO MAP TIMELINE -->
            <div id="tab-itinerary" class="tab-content flex flex-col gap-8">
                
                <!-- PRO DESIGNER MAP ROUTE TIMELINE -->
                <div class="glass-panel shine-border rounded-[2rem] p-6 sm:p-10 bg-gradient-to-b from-emerald-950/40 to-[#020a05] relative overflow-hidden">
                    
                    <h3 class="text-2xl font-bold text-white mb-8 flex items-center gap-3 relative z-10">
                        <span class="w-10 h-10 rounded-full bg-yellow-400/10 text-yellow-400 flex items-center justify-center border border-yellow-400/30">📍</span>
                        Tour Route Map
                    </h3>
                    
                    <div class="relative z-10 max-w-2xl mx-auto md:ml-4">
                        
                        @foreach($tour->itineraries as $index => $itinerary)
                        <!-- Day Node -->
                        <div class="relative flex items-center gap-6 group cursor-pointer" onclick="scrollToDay('day{{ $itinerary->day_number }}')">
                            <div class="w-12 h-12 md:w-16 md:h-16 shrink-0 rounded-full bg-[#05180d] border-2 border-emerald-500/50 flex items-center justify-center z-10 group-hover:border-yellow-400 transition-all duration-300 shadow-[0_0_15px_rgba(16,185,129,0.2)] group-hover:shadow-[0_0_20px_rgba(250,204,21,0.4)]">
                                <span class="font-bold text-lg md:text-xl text-yellow-400">{{ str_pad($itinerary->day_number, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="glass-panel p-4 md:p-5 rounded-2xl flex-1 border border-white/5 group-hover:border-yellow-400/30 transition-colors duration-300 flex justify-between items-center bg-[#020a05]/50">
                                <div>
                                    <h4 class="text-base md:text-lg font-bold text-white group-hover:text-yellow-400 transition-colors">{{ $itinerary->location_name }}</h4>
                                    <p class="text-xs text-emerald-100/50 mt-1">{{ $itinerary->title }}</p>
                                </div>
                                @if($itinerary->image_url)
                                    <img src="{{ Str::startsWith($itinerary->image_url, 'http') ? $itinerary->image_url : Storage::url($itinerary->image_url) }}" alt="{{ $itinerary->location_name }}" class="w-12 h-12 md:w-16 md:h-16 rounded-xl object-cover border border-white/10 hidden sm:block">
                                @endif
                            </div>
                        </div>

                        @if(!$loop->last)
                        <!-- Connection -->
                        <div class="relative h-16 md:h-20 ml-6 md:ml-8 border-l-2 border-dashed border-emerald-500/50 my-1">
                            <div class="absolute top-1/2 -left-[11px] transform -translate-y-1/2 text-yellow-400">
                                <svg class="w-5 h-5 animate-[bounce_2s_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>
                            @if($itinerary->travel_time)
                            <div class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-white/5 backdrop-blur border border-white/10 text-emerald-100/70 text-[10px] md:text-xs px-3 py-1.5 rounded-full flex items-center gap-2">
                                <span>🚗</span> {{ $itinerary->travel_time }}
                            </div>
                            @endif
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>

                @foreach($tour->itineraries as $itinerary)
                <!-- DAY CONTENT BOX -->
                <div id="day{{ $itinerary->day_number }}" class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8 scroll-mt-32">
                    <div class="grid grid-cols-1 md:grid-cols-[1.3fr_0.7fr] gap-6 items-start">
                        <div>
                            <div class="flex flex-wrap justify-between items-center border-b border-white/10 pb-4 mb-6 gap-2">
                                <div>
                                    <span class="text-xs uppercase font-bold tracking-widest text-yellow-400">Day {{ str_pad($itinerary->day_number, 2, '0', STR_PAD_LEFT) }}</span>
                                    <h3 class="text-2xl font-bold text-white">{{ $itinerary->location_name }}</h3>
                                </div>
                                @if($itinerary->travel_time)
                                <span class="bg-white/5 border border-white/10 text-xs px-3 py-1 rounded-full text-emerald-300">⏳ {{ $itinerary->travel_time }}</span>
                                @endif
                            </div>
                            @if($itinerary->description)
                            <p class="text-emerald-100/70 text-sm leading-relaxed mb-6">
                                {{ $itinerary->description }}
                            </p>
                            @endif
                            
                            @if($itinerary->activities && count($itinerary->activities) > 0)
                            <h4 class="text-white font-bold text-sm mb-3 uppercase tracking-wider text-emerald-400">Activities:</h4>
                            <ul class="space-y-2 text-sm text-emerald-100/80 mb-6 pl-4 list-disc">
                                @foreach($itinerary->activities as $activity)
                                <li>{{ $activity }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        @if($itinerary->image_url)
                        <!-- Day Place Image Wrapper -->
                        <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden shine-border self-center shadow-lg">
                            <img src="{{ Str::startsWith($itinerary->image_url, 'http') ? $itinerary->image_url : Storage::url($itinerary->image_url) }}" alt="{{ $itinerary->location_name }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>

            <!-- TAB CONTAINER 2: INCLUSIONS & EXCLUSIONS -->
            <div id="tab-inclusions" class="tab-content hidden flex flex-col gap-6">
                <div class="glass-panel shine-border rounded-[2rem] p-8">
                    <h3 class="text-xl font-bold text-green-400 mb-4">What's Included in the Price</h3>
                    <ul class="space-y-3 text-sm text-emerald-100/80 mb-8 list-none">
                        @if($tour->inclusions && count($tour->inclusions) > 0)
                            @foreach($tour->inclusions as $inclusion)
                            <li>✔ {{ $inclusion }}</li>
                            @endforeach
                        @else
                            <li>✔ Accommodation</li>
                            <li>✔ Transport</li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- TAB CONTAINER 3: SUCCESS STORIES -->
            <div id="tab-reviews" class="tab-content hidden flex flex-col gap-6">
                <div class="grid grid-cols-3 gap-4 text-center mb-4">
                    <div class="glass-panel rounded-2xl p-4"><p class="text-yellow-400 font-bold text-lg">1,306+</p><p class="text-xs text-emerald-100/50">Trip Advisor</p></div>
                    <div class="glass-panel rounded-2xl p-4"><p class="text-yellow-400 font-bold text-lg">1,068+</p><p class="text-xs text-emerald-100/50">Google Reviews</p></div>
                    <div class="glass-panel rounded-2xl p-4"><p class="text-yellow-400 font-bold text-lg">280+</p><p class="text-xs text-emerald-100/50">Facebook Fans</p></div>
                </div>
                <div class="glass-panel shine-border rounded-[2rem] p-6">
                    <p class="italic text-emerald-100/90 text-sm mb-4">"Our 10 days dream route with Sandun Travels was absolutely flawless. Sharanie organized everything down to the smallest detail. Our private driver was safe, knowledgeable, and incredibly friendly. Highly recommend!"</p>
                    <p class="text-xs text-yellow-400 font-bold">— Mark & Elena, Norway</p>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN: Sticky Booking Sidebar (1/3 Width) -->
        <div class="w-full lg:w-1/3 lg:sticky lg:top-32 flex flex-col gap-6 reveal-up">
            
            <div class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8">
                <div class="border-b border-white/10 pb-4 mb-6">
                    <p class="text-xs uppercase tracking-wider text-emerald-100/50 mb-1">Price Per Person</p>
                    <div class="text-3xl font-bold text-white">LKR {{ number_format($tour->price, 2) }}</div>
                </div>

                <div class="flex gap-4 items-start mb-6">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=120&h=120&q=80" alt="Destination Expert" class="w-12 h-12 rounded-full border-2 border-yellow-400 object-cover shrink-0">
                    <div>
                        <h4 class="text-white font-bold text-sm">Hello! I'm Sharanie</h4>
                        <p class="text-xs text-emerald-100/70 leading-relaxed mt-1">
                            Your dedicated Expert. Let's customize your perfect dream route instantly!
                        </p>
                    </div>
                </div>

                <a href="#quote-form-section" class="block w-full text-center bg-green-500 hover:bg-green-600 text-white font-bold py-3.5 rounded-full transition shadow-[0_0_20px_rgba(34,197,94,0.2)] text-sm mb-3">
                    Book This Trip
                </a>
            </div>

            <!-- QUOTE FORM SECTION -->
            <div id="quote-form-section" class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8">
                <h3 class="text-lg font-bold text-white mb-2">Request Custom Itinerary</h3>
                <form action="#" method="POST" class="flex flex-col gap-4 text-sm text-white">
                    @csrf
                    <div>
                        <label class="block text-xs text-emerald-100/60 mb-1.5 font-medium">Full Name</label>
                        <input type="text" required class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-400 text-xs">
                    </div>
                    <div>
                        <label class="block text-xs text-emerald-100/60 mb-1.5 font-medium">Email Address</label>
                        <input type="email" required class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-400 text-xs">
                    </div>
                    <div>
                        <label class="block text-xs text-emerald-100/60 mb-1.5 font-medium">Phone Number</label>
                        <input type="tel" required placeholder="+47 000 00 000" class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-400 text-xs">
                    </div>
                    <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-emerald-950 font-bold py-3.5 rounded-full transition mt-2 text-xs uppercase tracking-wider">
                        Get My Free Quote
                    </button>
                </form>
            </div>

        </div>
    </div>
</main>

<!-- Tab Controls & Interactive Logic -->
<script>
    function switchTab(tabName) {
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
        document.getElementById('tab-' + tabName).classList.remove('hidden');
        
        ['itinerary', 'inclusions', 'reviews'].forEach(name => {
            const btn = document.getElementById('btn-' + name);
            btn.classList.remove('border-yellow-400', 'text-yellow-400');
            btn.classList.add('border-transparent', 'text-emerald-100/60');
        });

        const activeBtn = document.getElementById('btn-' + tabName);
        activeBtn.classList.remove('border-transparent', 'text-emerald-100/60');
        activeBtn.classList.add('border-yellow-400', 'text-yellow-400');
    }

    function scrollToDay(dayId) {
        switchTab('itinerary');
        const element = document.getElementById(dayId);
        if(element) {
            element.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
</script>
@endsection

