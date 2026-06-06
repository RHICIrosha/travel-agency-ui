
@extends('layouts.app')

@section('content')
<main class="relative overflow-hidden pt-32 pb-20 mx-auto max-w-7xl px-6 lg:px-10">
    
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-xs text-emerald-100/60 mb-6 reveal-up">
        <a href="/" class="hover:text-yellow-400 transition">Home</a>
        <span>/</span>
        <a href="/tours" class="hover:text-yellow-400 transition">Tours</a>
        <span>/</span>
        <span class="text-white">Sri Lanka</span>
    </div>

    <!-- Page Title -->
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-8 reveal-up">
        Sri Lanka <span class="text-emerald-100/60 font-light">10 Days - Sri Lanka Dream Route</span>
    </h1>

    <!-- Two Column Layout Wrapper -->
    <div class="flex flex-col lg:flex-row gap-8 items-start">
        
        <!-- LEFT COLUMN: Main Content Area (2/3 Width) -->
        <div class="w-full lg:w-2/3 flex flex-col gap-8 reveal-up">
            
            <!-- Image Gallery/Hero Area -->
            <div class="relative w-full aspect-[16/9] rounded-[2rem] overflow-hidden group shine-border">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80" alt="Sri Lanka Tour Image" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
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
                        <span class="text-blue-400">🛡️</span> Suitable for : <span class="font-semibold text-white ml-1">Family, Couple & Friends</span>
                    </div>
                </div>
                <p class="text-emerald-100/70 leading-relaxed mb-8">
                    Sri Lanka is perfect for couples to relax on stunning beaches, explore misty hills and waterfalls, or go on adventures through rainforests and mountains. Try water sports, wildlife safaris, and village life, then unwind with a luxurious spa after a day of fun and flavor.
                </p>

                <!-- Inclusion Quick Flags -->
                <h3 class="text-white font-bold mb-4 uppercase tracking-wider text-xs text-yellow-400">Core Features Included</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-8 text-sm text-emerald-100/80">
                    <div class="flex items-center gap-2">✔ Accommodation</div>
                    <div class="flex items-center gap-2">✔ Airport Pick-up</div>
                    <div class="flex items-center gap-2">✔ Airport Drop-off</div>
                    <div class="flex items-center gap-2">✔ Breakfast & Dinner</div>
                    <div class="flex items-center gap-2">✔ Private Luxury Car</div>
                    <div class="flex items-center gap-2">✔ Private Guide</div>
                </div>

                <div class="border-t border-white/10 pt-6 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 px-3 py-1 text-xs rounded-md">🌴 Beach</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 px-3 py-1 text-xs rounded-md">🏙️ City Tours</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 px-3 py-1 text-xs rounded-md">🎭 Culture</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 px-3 py-1 text-xs rounded-md">🐘 Wildlife</span>
                    </div>
                    <div class="text-sm text-emerald-100/70">
                        <span class="bg-yellow-400 text-emerald-950 font-bold px-2 py-0.5 rounded mr-2">8</span> Cities Explored
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
                        
                        <!-- Day 1 Node -->
                        <div class="relative flex items-center gap-6 group cursor-pointer" onclick="scrollToDay('day1')">
                            <div class="w-12 h-12 md:w-16 md:h-16 shrink-0 rounded-full bg-[#05180d] border-2 border-emerald-500/50 flex items-center justify-center z-10 group-hover:border-yellow-400 transition-all duration-300 shadow-[0_0_15px_rgba(16,185,129,0.2)] group-hover:shadow-[0_0_20px_rgba(250,204,21,0.4)]">
                                <span class="font-bold text-lg md:text-xl text-yellow-400">01</span>
                            </div>
                            <div class="glass-panel p-4 md:p-5 rounded-2xl flex-1 border border-white/5 group-hover:border-yellow-400/30 transition-colors duration-300 flex justify-between items-center bg-[#020a05]/50">
                                <div>
                                    <h4 class="text-base md:text-lg font-bold text-white group-hover:text-yellow-400 transition-colors">Negombo</h4>
                                    <p class="text-xs text-emerald-100/50 mt-1">Arrival & Beach Town</p>
                                </div>
                                <img src="https://images.unsplash.com/photo-1542856391-010fb87dcfed?auto=format&fit=crop&w=100&q=80" alt="Negombo" class="w-12 h-12 md:w-16 md:h-16 rounded-xl object-cover border border-white/10 hidden sm:block">
                            </div>
                        </div>

                        <!-- Connection 1 -> 2 (Brake line + Arrow) -->
                        <div class="relative h-16 md:h-20 ml-6 md:ml-8 border-l-2 border-dashed border-emerald-500/50 my-1">
                            <div class="absolute top-1/2 -left-[11px] transform -translate-y-1/2 text-yellow-400">
                                <svg class="w-5 h-5 animate-[bounce_2s_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>
                            <div class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-white/5 backdrop-blur border border-white/10 text-emerald-100/70 text-[10px] md:text-xs px-3 py-1.5 rounded-full flex items-center gap-2">
                                <span>🚗</span> 4 Hrs Travel
                            </div>
                        </div>

                        <!-- Day 2 Node -->
                        <div class="relative flex items-center gap-6 group cursor-pointer" onclick="scrollToDay('day2')">
                            <div class="w-12 h-12 md:w-16 md:h-16 shrink-0 rounded-full bg-[#05180d] border-2 border-emerald-500/50 flex items-center justify-center z-10 group-hover:border-yellow-400 transition-all duration-300 shadow-[0_0_15px_rgba(16,185,129,0.2)] group-hover:shadow-[0_0_20px_rgba(250,204,21,0.4)]">
                                <span class="font-bold text-lg md:text-xl text-yellow-400">02</span>
                            </div>
                            <div class="glass-panel p-4 md:p-5 rounded-2xl flex-1 border border-white/5 group-hover:border-yellow-400/30 transition-colors duration-300 flex justify-between items-center bg-[#020a05]/50">
                                <div>
                                    <h4 class="text-base md:text-lg font-bold text-white group-hover:text-yellow-400 transition-colors">Anuradhapura</h4>
                                    <p class="text-xs text-emerald-100/50 mt-1">Ancient Kingdom Ruins</p>
                                </div>
                                <img src="https://images.unsplash.com/photo-1588598126284-fcb4369a19fc?auto=format&fit=crop&w=100&q=80" alt="Anuradhapura" class="w-12 h-12 md:w-16 md:h-16 rounded-xl object-cover border border-white/10 hidden sm:block">
                            </div>
                        </div>

                        <!-- Connection 2 -> 3 -->
                        <div class="relative h-16 md:h-20 ml-6 md:ml-8 border-l-2 border-dashed border-emerald-500/50 my-1">
                            <div class="absolute top-1/2 -left-[11px] transform -translate-y-1/2 text-yellow-400">
                                <svg class="w-5 h-5 animate-[bounce_2s_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>
                            <div class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-white/5 backdrop-blur border border-white/10 text-emerald-100/70 text-[10px] md:text-xs px-3 py-1.5 rounded-full flex items-center gap-2">
                                <span>🚗</span> 2 Hrs Travel
                            </div>
                        </div>

                        <!-- Day 3 Node -->
                        <div class="relative flex items-center gap-6 group cursor-pointer" onclick="scrollToDay('day3')">
                            <div class="w-12 h-12 md:w-16 md:h-16 shrink-0 rounded-full bg-[#05180d] border-2 border-emerald-500/50 flex items-center justify-center z-10 group-hover:border-yellow-400 transition-all duration-300 shadow-[0_0_15px_rgba(16,185,129,0.2)] group-hover:shadow-[0_0_20px_rgba(250,204,21,0.4)]">
                                <span class="font-bold text-lg md:text-xl text-yellow-400">03</span>
                            </div>
                            <div class="glass-panel p-4 md:p-5 rounded-2xl flex-1 border border-white/5 group-hover:border-yellow-400/30 transition-colors duration-300 flex justify-between items-center bg-[#020a05]/50">
                                <div>
                                    <h4 class="text-base md:text-lg font-bold text-white group-hover:text-yellow-400 transition-colors">Sigiriya</h4>
                                    <p class="text-xs text-emerald-100/50 mt-1">Lion Rock Citadel</p>
                                </div>
                                <img src="https://images.unsplash.com/photo-1586861635167-e5223aadc9fe?auto=format&fit=crop&w=100&q=80" alt="Sigiriya" class="w-12 h-12 md:w-16 md:h-16 rounded-xl object-cover border border-white/10 hidden sm:block">
                            </div>
                        </div>

                        <!-- Connection 3 -> 4 -->
                        <div class="relative h-16 md:h-20 ml-6 md:ml-8 border-l-2 border-dashed border-emerald-500/50 my-1">
                            <div class="absolute top-1/2 -left-[11px] transform -translate-y-1/2 text-yellow-400">
                                <svg class="w-5 h-5 animate-[bounce_2s_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>
                            <div class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-white/5 backdrop-blur border border-white/10 text-emerald-100/70 text-[10px] md:text-xs px-3 py-1.5 rounded-full flex items-center gap-2">
                                <span>🚗</span> 3 Hrs Travel
                            </div>
                        </div>

                        <!-- Day 4 Node -->
                        <div class="relative flex items-center gap-6 group cursor-pointer" onclick="scrollToDay('day4')">
                            <div class="w-12 h-12 md:w-16 md:h-16 shrink-0 rounded-full bg-[#05180d] border-2 border-emerald-500/50 flex items-center justify-center z-10 group-hover:border-yellow-400 transition-all duration-300 shadow-[0_0_15px_rgba(16,185,129,0.2)] group-hover:shadow-[0_0_20px_rgba(250,204,21,0.4)]">
                                <span class="font-bold text-lg md:text-xl text-yellow-400">04</span>
                            </div>
                            <div class="glass-panel p-4 md:p-5 rounded-2xl flex-1 border border-white/5 group-hover:border-yellow-400/30 transition-colors duration-300 flex justify-between items-center bg-[#020a05]/50">
                                <div>
                                    <h4 class="text-base md:text-lg font-bold text-white group-hover:text-yellow-400 transition-colors">Kandy</h4>
                                    <p class="text-xs text-emerald-100/50 mt-1">Hill Capital & Temple</p>
                                </div>
                                <img src="https://images.unsplash.com/photo-1546708973-b339540b5162?auto=format&fit=crop&w=100&q=80" alt="Kandy" class="w-12 h-12 md:w-16 md:h-16 rounded-xl object-cover border border-white/10 hidden sm:block">
                            </div>
                        </div>

                        <!-- Connection 4 -> 5 -->
                        <div class="relative h-16 md:h-20 ml-6 md:ml-8 border-l-2 border-dashed border-emerald-500/50 my-1">
                            <div class="absolute top-1/2 -left-[11px] transform -translate-y-1/2 text-yellow-400">
                                <svg class="w-5 h-5 animate-[bounce_2s_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>
                            <div class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-white/5 backdrop-blur border border-white/10 text-emerald-100/70 text-[10px] md:text-xs px-3 py-1.5 rounded-full flex items-center gap-2">
                                <span>🚗</span> 3 Hrs Travel
                            </div>
                        </div>

                        <!-- Day 5 Node -->
                        <div class="relative flex items-center gap-6 group cursor-pointer" onclick="scrollToDay('day5')">
                            <div class="w-12 h-12 md:w-16 md:h-16 shrink-0 rounded-full bg-[#05180d] border-2 border-emerald-500/50 flex items-center justify-center z-10 group-hover:border-yellow-400 transition-all duration-300 shadow-[0_0_15px_rgba(16,185,129,0.2)] group-hover:shadow-[0_0_20px_rgba(250,204,21,0.4)]">
                                <span class="font-bold text-lg md:text-xl text-yellow-400">05</span>
                            </div>
                            <div class="glass-panel p-4 md:p-5 rounded-2xl flex-1 border border-white/5 group-hover:border-yellow-400/30 transition-colors duration-300 flex justify-between items-center bg-[#020a05]/50">
                                <div>
                                    <h4 class="text-base md:text-lg font-bold text-white group-hover:text-yellow-400 transition-colors">Nuwara Eliya</h4>
                                    <p class="text-xs text-emerald-100/50 mt-1">Highland Tea Country</p>
                                </div>
                                <img src="https://images.unsplash.com/photo-1555899434-94d1368aa7af?auto=format&fit=crop&w=100&q=80" alt="Nuwara Eliya" class="w-12 h-12 md:w-16 md:h-16 rounded-xl object-cover border border-white/10 hidden sm:block">
                            </div>
                        </div>

                        <!-- Connection 5 -> 6 -->
                        <div class="relative h-16 md:h-20 ml-6 md:ml-8 border-l-2 border-dashed border-emerald-500/50 my-1">
                            <div class="absolute top-1/2 -left-[11px] transform -translate-y-1/2 text-yellow-400">
                                <svg class="w-5 h-5 animate-[bounce_2s_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>
                            <div class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-white/5 backdrop-blur border border-white/10 text-emerald-100/70 text-[10px] md:text-xs px-3 py-1.5 rounded-full flex items-center gap-2">
                                <span>🚗</span> 4 Hrs Travel
                            </div>
                        </div>

                        <!-- Day 6 Node -->
                        <div class="relative flex items-center gap-6 group cursor-pointer" onclick="scrollToDay('day6')">
                            <div class="w-12 h-12 md:w-16 md:h-16 shrink-0 rounded-full bg-[#05180d] border-2 border-emerald-500/50 flex items-center justify-center z-10 group-hover:border-yellow-400 transition-all duration-300 shadow-[0_0_15px_rgba(16,185,129,0.2)] group-hover:shadow-[0_0_20px_rgba(250,204,21,0.4)]">
                                <span class="font-bold text-lg md:text-xl text-yellow-400">06</span>
                            </div>
                            <div class="glass-panel p-4 md:p-5 rounded-2xl flex-1 border border-white/5 group-hover:border-yellow-400/30 transition-colors duration-300 flex justify-between items-center bg-[#020a05]/50">
                                <div>
                                    <h4 class="text-base md:text-lg font-bold text-white group-hover:text-yellow-400 transition-colors">Yala</h4>
                                    <p class="text-xs text-emerald-100/50 mt-1">Wildlife Leopard Safaris</p>
                                </div>
                                <img src="https://images.unsplash.com/photo-1561731216-c3a4d99437d5?auto=format&fit=crop&w=100&q=80" alt="Yala" class="w-12 h-12 md:w-16 md:h-16 rounded-xl object-cover border border-white/10 hidden sm:block">
                            </div>
                        </div>

                        <!-- Connection 6 -> 7 -->
                        <div class="relative h-16 md:h-20 ml-6 md:ml-8 border-l-2 border-dashed border-emerald-500/50 my-1">
                            <div class="absolute top-1/2 -left-[11px] transform -translate-y-1/2 text-yellow-400">
                                <svg class="w-5 h-5 animate-[bounce_2s_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>
                            <div class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-white/5 backdrop-blur border border-white/10 text-emerald-100/70 text-[10px] md:text-xs px-3 py-1.5 rounded-full flex items-center gap-2">
                                <span>🚗</span> 3 Hrs Travel
                            </div>
                        </div>

                        <!-- Day 7 & 8 Node -->
                        <div class="relative flex items-center gap-6 group cursor-pointer" onclick="scrollToDay('day7')">
                            <div class="w-12 h-12 md:w-16 md:h-16 shrink-0 rounded-full bg-[#05180d] border-2 border-emerald-500/50 flex items-center justify-center z-10 group-hover:border-yellow-400 transition-all duration-300 shadow-[0_0_15px_rgba(16,185,129,0.2)] group-hover:shadow-[0_0_20px_rgba(250,204,21,0.4)]">
                                <span class="font-bold text-lg md:text-xl text-yellow-400">07</span>
                            </div>
                            <div class="glass-panel p-4 md:p-5 rounded-2xl flex-1 border border-white/5 group-hover:border-yellow-400/30 transition-colors duration-300 flex justify-between items-center bg-[#020a05]/50">
                                <div>
                                    <h4 class="text-base md:text-lg font-bold text-white group-hover:text-yellow-400 transition-colors">Bentota</h4>
                                    <p class="text-xs text-emerald-100/50 mt-1">Southern Coast Beaches (2 Nights)</p>
                                </div>
                                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=100&q=80" alt="Bentota" class="w-12 h-12 md:w-16 md:h-16 rounded-xl object-cover border border-white/10 hidden sm:block">
                            </div>
                        </div>

                        <!-- Connection 7 -> 9 -->
                        <div class="relative h-16 md:h-20 ml-6 md:ml-8 border-l-2 border-dashed border-emerald-500/50 my-1">
                            <div class="absolute top-1/2 -left-[11px] transform -translate-y-1/2 text-yellow-400">
                                <svg class="w-5 h-5 animate-[bounce_2s_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>
                            <div class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-white/5 backdrop-blur border border-white/10 text-emerald-100/70 text-[10px] md:text-xs px-3 py-1.5 rounded-full flex items-center gap-2">
                                <span>🚗</span> 2 Hrs Travel
                            </div>
                        </div>

                        <!-- Day 9 & 10 Node -->
                        <div class="relative flex items-center gap-6 group cursor-pointer" onclick="scrollToDay('day9')">
                            <div class="w-12 h-12 md:w-16 md:h-16 shrink-0 rounded-full bg-[#fac415] border-2 border-yellow-400 flex items-center justify-center z-10 shadow-[0_0_20px_rgba(250,204,21,0.5)]">
                                <span class="font-bold text-lg md:text-xl text-black">09</span>
                            </div>
                            <div class="glass-panel p-4 md:p-5 rounded-2xl flex-1 border border-yellow-400/50 flex justify-between items-center bg-yellow-400/5">
                                <div>
                                    <h4 class="text-base md:text-lg font-bold text-yellow-400">Colombo & Departure</h4>
                                    <p class="text-xs text-emerald-100/50 mt-1">City Hub & Flight Home</p>
                                </div>
                                <span class="text-2xl hidden sm:block">✈️</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- DAY 1 CONTENT BOX -->
                <div id="day1" class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8 scroll-mt-32">
                    <div class="grid grid-cols-1 md:grid-cols-[1.3fr_0.7fr] gap-6 items-start">
                        <div>
                            <div class="flex flex-wrap justify-between items-center border-b border-white/10 pb-4 mb-6 gap-2">
                                <div>
                                    <span class="text-xs uppercase font-bold tracking-widest text-yellow-400">Day 01</span>
                                    <h3 class="text-2xl font-bold text-white">Negombo Gateway</h3>
                                </div>
                                <span class="bg-white/5 border border-white/10 text-xs px-3 py-1 rounded-full text-emerald-300">⏳ 15 Mins</span>
                            </div>
                            <p class="text-emerald-100/70 text-sm leading-relaxed mb-6">
                                Just minutes from the airport, Negombo is a lively beach town known for its vibrant culture, seafood markets, and traditional catamaran sail boats.
                            </p>
                            <h4 class="text-white font-bold text-sm mb-3 uppercase tracking-wider text-emerald-400">Activities:</h4>
                            <ul class="space-y-2 text-sm text-emerald-100/80 mb-6 pl-4 list-disc">
                                <li>Airport pickup & transfer directly to Negombo</li>
                                <li>Explore Hamilton Canal & historical Dutch Fort ruins</li>
                                <li>Visit the picturesque local fishing village life & golden sand beach</li>
                            </ul>
                        </div>
                        <!-- Day 1 Place Image Wrapper -->
                        <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden shine-border self-center shadow-lg">
                            <img src="https://images.unsplash.com/photo-1542856391-010fb87dcfed?auto=format&fit=crop&w=500&q=80" alt="Negombo Beach Town" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 bg-black/20 p-4 rounded-2xl text-xs text-emerald-100/60 mt-4">
                        <div>🏨 <span class="text-white font-medium block">Regal Reseau (4★)</span></div>
                        <div>🍽️ <span class="text-white font-medium block">Half Board</span></div>
                        <div>🚗 <span class="text-white font-medium block">Private A/C Vehicle</span></div>
                    </div>
                </div>

                <!-- DAY 2 CONTENT BOX -->
                <div id="day2" class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8 scroll-mt-32">
                    <div class="grid grid-cols-1 md:grid-cols-[1.3fr_0.7fr] gap-6 items-start">
                        <div>
                            <div class="flex flex-wrap justify-between items-center border-b border-white/10 pb-4 mb-6 gap-2">
                                <div>
                                    <span class="text-xs uppercase font-bold tracking-widest text-yellow-400">Day 02</span>
                                    <h3 class="text-2xl font-bold text-white">Anuradhapura Heritage</h3>
                                </div>
                                <span class="bg-white/5 border border-white/10 text-xs px-3 py-1 rounded-full text-emerald-300">⏳ 4 Hours</span>
                            </div>
                            <p class="text-emerald-100/70 text-sm leading-relaxed mb-6">
                                Experience Sri Lanka’s first ancient royal kingdom. Wander through giant brick stupas, sophisticated stone engineering, and tranquil monastic ruins.
                            </p>
                            <h4 class="text-white font-bold text-sm mb-3 uppercase tracking-wider text-emerald-400">Activities:</h4>
                            <ul class="space-y-2 text-sm text-emerald-100/80 mb-6 pl-4 list-disc">
                                <li>Half-day 4x4 jeep safari inside Wilpattu National Park wilderness</li>
                                <li>Tour the ancient ruins and holy sites of Atamasthanaya</li>
                                <li>Climb up Mihintale temple peaks to witness a beautiful sunset perspective</li>
                            </ul>
                        </div>
                        <!-- Day 2 Place Image Wrapper -->
                        <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden shine-border self-center shadow-lg">
                            <img src="https://images.unsplash.com/photo-1588598126284-fcb4369a19fc?auto=format&fit=crop&w=500&q=80" alt="Anuradhapura Temples" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 bg-black/20 p-4 rounded-2xl text-xs text-emerald-100/60 mt-4">
                        <div>🏨 <span class="text-white font-medium block">The Lake Forest (4★)</span></div>
                        <div>🍽️ <span class="text-white font-medium block">Breakfast & Dinner</span></div>
                        <div>🚗 <span class="text-white font-medium block">Private A/C Vehicle</span></div>
                    </div>
                </div>

                <!-- DAY 3 CONTENT BOX -->
                <div id="day3" class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8 scroll-mt-32">
                    <div class="grid grid-cols-1 md:grid-cols-[1.3fr_0.7fr] gap-6 items-start">
                        <div>
                            <div class="flex flex-wrap justify-between items-center border-b border-white/10 pb-4 mb-6 gap-2">
                                <div>
                                    <span class="text-xs uppercase font-bold tracking-widest text-yellow-400">Day 03</span>
                                    <h3 class="text-2xl font-bold text-white">Sigiriya Rock Fortress</h3>
                                </div>
                                <span class="bg-white/5 border border-white/10 text-xs px-3 py-1 rounded-full text-emerald-300">⏳ 2 Hours</span>
                            </div>
                            <p class="text-emerald-100/70 text-sm leading-relaxed mb-6">
                                Ascend the breathtaking 5th-century palace citadel rising 600 feet over plains, containing stunning colorful ancient frescoes.
                            </p>
                            <h4 class="text-white font-bold text-sm mb-3 uppercase tracking-wider text-emerald-400">Activities:</h4>
                            <ul class="space-y-2 text-sm text-emerald-100/80 mb-6 pl-4 list-disc">
                                <li>Climb the legendary Sigiriya Lion Rock archaeological masterpiece</li>
                                <li>Hike up Pidurangala peak for pristine landscape photographs of the rock</li>
                                <li>Minneriya eco-safari to see elephant gathering migrations</li>
                            </ul>
                        </div>
                        <!-- Day 3 Place Image Wrapper -->
                        <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden shine-border self-center shadow-lg">
                            <img src="https://images.unsplash.com/photo-1586861635167-e5223aadc9fe?auto=format&fit=crop&w=500&q=80" alt="Sigiriya Lion Rock" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 bg-black/20 p-4 rounded-2xl text-xs text-emerald-100/60 mt-4">
                        <div>🏨 <span class="text-white font-medium block">Sigiriya Jungles (4.5★)</span></div>
                        <div>🍽️ <span class="text-white font-medium block">Breakfast & Dinner</span></div>
                        <div>🚗 <span class="text-white font-medium block">Private A/C Vehicle</span></div>
                    </div>
                </div>

                <!-- DAY 4 CONTENT BOX -->
                <div id="day4" class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8 scroll-mt-32">
                    <div class="grid grid-cols-1 md:grid-cols-[1.3fr_0.7fr] gap-6 items-start">
                        <div>
                            <div class="flex flex-wrap justify-between items-center border-b border-white/10 pb-4 mb-6 gap-2">
                                <div>
                                    <span class="text-xs uppercase font-bold tracking-widest text-yellow-400">Day 04</span>
                                    <h3 class="text-2xl font-bold text-white">Hill Capital Kandy</h3>
                                </div>
                                <span class="bg-white/5 border border-white/10 text-xs px-3 py-1 rounded-full text-emerald-300">⏳ 3 Hours</span>
                            </div>
                            <p class="text-emerald-100/70 text-sm leading-relaxed mb-6">
                                Venture into the mountain citadel. This gorgeous cultural epicenter holds rich traditions and sits wrapped by misty hills.
                            </p>
                            <h4 class="text-white font-bold text-sm mb-3 uppercase tracking-wider text-emerald-400">Activities:</h4>
                            <ul class="space-y-2 text-sm text-emerald-100/80 mb-6 pl-4 list-disc">
                                <li>En route stopover exploring Dambulla Golden Cave temple chambers</li>
                                <li>Visit the highly revered Temple of the Sacred Tooth Relic structure</li>
                                <li>Witness an authentic vibrant evening traditional Kandyan cultural dance show</li>
                            </ul>
                        </div>
                        <!-- Day 4 Place Image Wrapper -->
                        <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden shine-border self-center shadow-lg">
                            <img src="https://images.unsplash.com/photo-1546708973-b339540b5162?auto=format&fit=crop&w=500&q=80" alt="Kandy Temple" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 bg-black/20 p-4 rounded-2xl text-xs text-emerald-100/60 mt-4">
                        <div>🏨 <span class="text-white font-medium block">Thilanka Hotel (4★)</span></div>
                        <div>🍽️ <span class="text-white font-medium block">Breakfast & Dinner</span></div>
                        <div>🚗 <span class="text-white font-medium block">Private Luxury Car</span></div>
                    </div>
                </div>

                <!-- DAY 5 CONTENT BOX -->
                <div id="day5" class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8 scroll-mt-32">
                    <div class="grid grid-cols-1 md:grid-cols-[1.3fr_0.7fr] gap-6 items-start">
                        <div>
                            <div class="flex flex-wrap justify-between items-center border-b border-white/10 pb-4 mb-6 gap-2">
                                <div>
                                    <span class="text-xs uppercase font-bold tracking-widest text-yellow-400">Day 05</span>
                                    <h3 class="text-2xl font-bold text-white">Nuwara Eliya Highlands</h3>
                                </div>
                                <span class="bg-white/5 border border-white/10 text-xs px-3 py-1 rounded-full text-emerald-300">⏳ 3 Hours</span>
                            </div>
                            <p class="text-emerald-100/70 text-sm leading-relaxed mb-6">
                                Experience cool climates and dramatic cascading tea plantations in the high emerald valleys discovered by early British explorers.
                            </p>
                            <h4 class="text-white font-bold text-sm mb-3 uppercase tracking-wider text-emerald-400">Activities:</h4>
                            <ul class="space-y-2 text-sm text-emerald-100/80 mb-6 pl-4 list-disc">
                                <li>Photograph the scenic mountain waterfalls at Ramboda Falls</li>
                                <li>Tour a colonial tea factory estate to sample fine artisanal leaves</li>
                                <li>Savor an exceptional premium afternoon high tea service at the Grand Hotel</li>
                            </ul>
                        </div>
                        <!-- Day 5 Place Image Wrapper -->
                        <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden shine-border self-center shadow-lg">
                            <img src="https://images.unsplash.com/photo-1555899434-94d1368aa7af?auto=format&fit=crop&w=500&q=80" alt="Nuwara Eliya Tea Country" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 bg-black/20 p-4 rounded-2xl text-xs text-emerald-100/60 mt-4">
                        <div>🏨 <span class="text-white font-medium block">Galway Heights (4★)</span></div>
                        <div>🍽️ <span class="text-white font-medium block">Breakfast & Dinner</span></div>
                        <div>🚗 <span class="text-white font-medium block">Private Luxury Car</span></div>
                    </div>
                </div>

                <!-- DAY 6 CONTENT BOX -->
                <div id="day6" class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8 scroll-mt-32">
                    <div class="grid grid-cols-1 md:grid-cols-[1.3fr_0.7fr] gap-6 items-start">
                        <div>
                            <div class="flex flex-wrap justify-between items-center border-b border-white/10 pb-4 mb-6 gap-2">
                                <div>
                                    <span class="text-xs uppercase font-bold tracking-widest text-yellow-400">Day 06</span>
                                    <h3 class="text-2xl font-bold text-white">Yala Jungle Safaris</h3>
                                </div>
                                <span class="bg-white/5 border border-white/10 text-xs px-3 py-1 rounded-full text-emerald-300">⏳ 4 Hours</span>
                            </div>
                            <p class="text-emerald-100/70 text-sm leading-relaxed mb-6">
                                Descend to legendary coastal reserves holding high-density leopard territory, wild herds, and vibrant endemic tropical birdlife.
                            </p>
                            <h4 class="text-white font-bold text-sm mb-3 uppercase tracking-wider text-emerald-400">Activities:</h4>
                            <ul class="space-y-2 text-sm text-emerald-100/80 mb-6 pl-4 list-disc">
                                <li>Walk across the iconic brick architectural marvel Nine Arches Bridge</li>
                                <li>Embark on a deep 4x4 rugged evening game drive safari inside Yala Park</li>
                                <li>Track elusive leopards alongside expert local trackers</li>
                            </ul>
                        </div>
                        <!-- Day 6 Place Image Wrapper -->
                        <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden shine-border self-center shadow-lg">
                            <img src="https://images.unsplash.com/photo-1561731216-c3a4d99437d5?auto=format&fit=crop&w=500&q=80" alt="Yala Leopard Wildlife" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 bg-black/20 p-4 rounded-2xl text-xs text-emerald-100/60 mt-4">
                        <div>🏨 <span class="text-white font-medium block">Chaarya Resort (4★)</span></div>
                        <div>🍽️ <span class="text-white font-medium block">Breakfast & Dinner</span></div>
                        <div>🚗 <span class="text-white font-medium block">Private Luxury Car</span></div>
                    </div>
                </div>

                <!-- DAYS 7 & 8 CONTENT BOX -->
                <div id="day7" class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8 scroll-mt-32">
                    <div class="grid grid-cols-1 md:grid-cols-[1.3fr_0.7fr] gap-6 items-start">
                        <div>
                            <div class="flex flex-wrap justify-between items-center border-b border-white/10 pb-4 mb-6 gap-2">
                                <div>
                                    <span class="text-xs uppercase font-bold tracking-widest text-yellow-400">Days 07 & 08</span>
                                    <h3 class="text-2xl font-bold text-white">Bentota & Southern Coast</h3>
                                </div>
                                <span class="bg-white/5 border border-white/10 text-xs px-3 py-1 rounded-full text-emerald-300">⏳ 3 Hours</span>
                            </div>
                            <p class="text-emerald-100/70 text-sm leading-relaxed mb-6">
                                Rest alongside stunning coastal sands, explore maritime fortifications, and enjoy tropical lagoon watersport boat cruises.
                            </p>
                            <h4 class="text-white font-bold text-sm mb-3 uppercase tracking-wider text-emerald-400">Activities:</h4>
                            <ul class="space-y-2 text-sm text-emerald-100/80 mb-6 pl-4 list-disc">
                                <li>Tour the robust ocean-bound 17th-century historic Galle Dutch Fort</li>
                                <li>Witness stilt fishermen and navigate thick mangrove tunnels in Madu River</li>
                                <li>Relax on wide uncrowded palm fringed beaches at sunset</li>
                            </ul>
                        </div>
                        <!-- Day 7-8 Place Image Wrapper -->
                        <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden shine-border self-center shadow-lg">
                            <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=500&q=80" alt="Galle Fort Lighthouse" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 bg-black/20 p-4 rounded-2xl text-xs text-emerald-100/60 mt-4">
                        <div>🏨 <span class="text-white font-medium block">Turyaa Kalutara (4★)</span></div>
                        <div>🍽️ <span class="text-white font-medium block">Breakfast & Dinner</span></div>
                        <div>🚗 <span class="text-white font-medium block">Private A/C Vehicle</span></div>
                    </div>
                </div>

                <!-- DAYS 9 & 10 CONTENT BOX -->
                <div id="day9" class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8 scroll-mt-32">
                    <div class="grid grid-cols-1 md:grid-cols-[1.3fr_0.7fr] gap-6 items-start">
                        <div>
                            <div class="flex flex-wrap justify-between items-center border-b border-white/10 pb-4 mb-6 gap-2">
                                <div>
                                    <span class="text-xs uppercase font-bold tracking-widest text-yellow-400">Days 09 & 10</span>
                                    <h3 class="text-2xl font-bold text-white">Colombo Hub & Departure</h3>
                                </div>
                                <span class="bg-white/5 border border-white/10 text-xs px-3 py-1 rounded-full text-emerald-300">⏳ 2 Hours</span>
                            </div>
                            <p class="text-emerald-100/70 text-sm leading-relaxed mb-6">
                                Sri Lanka’s commercial hub blends modern urban style with colonial remnants. Complete your journey with premium shopping and architecture tours.
                            </p>
                            <h4 class="text-white font-bold text-sm mb-3 uppercase tracking-wider text-emerald-400">Activities:</h4>
                            <ul class="space-y-2 text-sm text-emerald-100/80 mb-6 pl-4 list-disc">
                                <li>Visit the iconic Gangaramaya Buddhist Temple floating on Beira Lake</li>
                                <li>Explore the Colombo Fort Bazaar landmarks, Red Mosque, and Independence Square</li>
                                <li>Indulge in souvenirs and local tea shopping at ODEL / House of Fashion</li>
                                <li>Transfer directly to Colombo International Airport for your departure flight</li>
                            </ul>
                        </div>
                        <!-- Day 9-10 Place Image Wrapper -->
                        <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden shine-border self-center shadow-lg">
                            <img src="https://images.unsplash.com/photo-1582299863774-3c4be19bc704?auto=format&fit=crop&w=500&q=80" alt="Colombo Red Mosque" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 bg-black/20 p-4 rounded-2xl text-xs text-emerald-100/60 mt-4">
                        <div>🏨 <span class="text-white font-medium block">Cinnamon Red (4★)</span></div>
                        <div>🍽️ <span class="text-white font-medium block">Half Board (BB in CMB)</span></div>
                        <div>🚗 <span class="text-white font-medium block">Private A/C Vehicle</span></div>
                    </div>
                </div>

            </div>

            <!-- TAB CONTAINER 2: INCLUSIONS & EXCLUSIONS -->
            <div id="tab-inclusions" class="tab-content hidden flex flex-col gap-6">
                <div class="glass-panel shine-border rounded-[2rem] p-8">
                    <h3 class="text-xl font-bold text-green-400 mb-4">What's Included in the Price</h3>
                    <ul class="space-y-3 text-sm text-emerald-100/80 mb-8 list-none">
                        <li>✔ Personalized meet-and-greet assistance at the Airport</li>
                        <li>✔ Airport pickup and final outbound airport drop-off transfers</li>
                        <li>✔ Private air-conditioned luxury car for the entire 10-day itinerary</li>
                        <li>✔ Dedicated English-speaking Chauffeur Guide</li>
                        <li>✔ Fuel, parking fees, highway tolls, and local vehicle insurance</li>
                        <li>✔ Accommodation on Half Board basis (Breakfast and Dinner included)</li>
                    </ul>
                    <h3 class="text-xl font-bold text-red-400 mb-4">What's Excluded</h3>
                    <ul class="space-y-3 text-sm text-emerald-100/60 list-none">
                        <li>❌ International flights and visa entry processing fees</li>
                        <li>❌ Optional monument entry site tickets (Sigiriya, Temple of Tooth, etc.)</li>
                        <li>❌ Lunch expenses and alcoholic beverages throughout the trip</li>
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
                    <div class="text-3xl font-bold text-white">NOK 14,119</div>
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

