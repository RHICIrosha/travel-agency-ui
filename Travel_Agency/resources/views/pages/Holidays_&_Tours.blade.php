<!-- Include this in your Blade file -->
<style>
    /* Base styles (ensure these exist in your main css if not already added) */
    .glass-panel {
        background: rgba(8, 36, 20, 0.65);
        border: 1px solid rgba(34, 197, 94, 0.2);
        backdrop-filter: blur(22px);
        -webkit-backdrop-filter: blur(22px);
    }
    .shine-border { position: relative; }
    .shine-border::before {
        content: ""; position: absolute; inset: 0; border-radius: inherit; padding: 1px;
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.5), rgba(250, 204, 21, 0.4), rgba(16, 185, 129, 0.5));
        mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
        -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
        mask-composite: exclude; -webkit-mask-composite: destination-out; pointer-events: none;
    }

    /* Animated Map Dots */
    @keyframes travelX { 0% { left: 0%; } 100% { left: 100%; } }
    @keyframes travelY { 0% { top: 0%; } 100% { top: 100%; } }
    .travel-x { animation: travelX 1.5s linear infinite; }
    .travel-y { animation: travelY 4s linear infinite; }

    /* Accordion Animation Logic */
    .itinerary-content {
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transition: max-height 0.6s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s ease-in-out;
    }
    .package-card.is-expanded {
        background-color: rgba(2, 44, 34, 0.4); /* bg-emerald-950/40 */
    }
    .package-card.is-expanded .itinerary-content {
        max-height: 3000px; /* Arbitrary large height to allow content to expand */
        opacity: 1;
    }
    .package-card.is-expanded .summary-view-btn {
        display: none;
    }
</style>

<section id="packages" class="mx-auto max-w-[1400px] px-6 py-20 lg:px-10 text-white">
    <div class="mb-12 border-b border-emerald-900/50 pb-8 text-center md:text-left">
        <h2 class="text-4xl font-bold text-white sm:text-5xl">
            Tours & Destinations
        </h2>
        <p class="mt-4 text-emerald-100/70 max-w-2xl">
            Use the filters below to find the perfect tailor made tour, fixed departure, or holiday getaway. 
            Click on any tour card to view the exact routing and day-by-day itinerary.
        </p>
    </div>

    <div class="grid gap-10 lg:grid-cols-[280px_1fr] items-start">
        
        <!-- Sidebar Filters -->
        <aside class="glass-panel shine-border sticky top-24 rounded-[1.5rem] p-6 hidden lg:block bg-emerald-950/20">
            <div class="mb-6 pb-6 border-b border-emerald-800/50">
                <h3 class="text-lg font-semibold text-white mb-4">Number of Days</h3>
                <div class="flex justify-between text-emerald-300 text-sm mb-2 px-1">
                    <span>3</span><span>6</span><span>9</span><span>12</span><span>15+</span>
                </div>
                <input type="range" min="3" max="15" class="w-full accent-yellow-400 cursor-pointer" />
            </div>

            <div class="space-y-6">
                <!-- Destinations -->
                <div class="pb-6 border-b border-emerald-800/50 last:border-0 last:pb-0">
                    <h3 class="text-lg font-semibold text-white mb-4">Destinations</h3>
                    <div class="space-y-3">
                        <!-- Blade: @foreach($destinations as $dest) -->
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="hidden peer">
                            <div class="w-5 h-5 rounded border border-emerald-700 bg-emerald-950/50 peer-checked:bg-yellow-400 peer-checked:border-yellow-400 group-hover:border-yellow-400 flex items-center justify-center transition-colors">
                                <svg class="w-3 h-3 text-[#092b18] opacity-0 peer-checked:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-emerald-100/80 group-hover:text-white peer-checked:text-white transition-colors text-sm">Sri Lanka</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="hidden peer">
                            <div class="w-5 h-5 rounded border border-emerald-700 bg-emerald-950/50 peer-checked:bg-yellow-400 peer-checked:border-yellow-400 group-hover:border-yellow-400 flex items-center justify-center transition-colors">
                                <svg class="w-3 h-3 text-[#092b18] opacity-0 peer-checked:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-emerald-100/80 group-hover:text-white transition-colors text-sm">Maldives</span>
                        </label>
                        <!-- @endforeach -->
                    </div>
                </div>

                <!-- Trip Type -->
                <div class="pb-6 border-b border-emerald-800/50 last:border-0 last:pb-0">
                    <h3 class="text-lg font-semibold text-white mb-4">Trip Type</h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="hidden peer">
                            <div class="w-5 h-5 rounded border border-emerald-700 bg-emerald-950/50 peer-checked:bg-yellow-400 peer-checked:border-yellow-400 transition-colors"></div>
                            <span class="text-emerald-100/80 group-hover:text-white text-sm">Tailor Made Tours</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="hidden peer">
                            <div class="w-5 h-5 rounded border border-emerald-700 bg-emerald-950/50 peer-checked:bg-yellow-400 peer-checked:border-yellow-400 transition-colors"></div>
                            <span class="text-emerald-100/80 group-hover:text-white text-sm">Fixed Departures</span>
                        </label>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Tour List -->
        <div class="flex flex-col gap-8" id="tour-list">
            
            <!-- ====== PACKAGE ITEM 1 ====== -->
            <!-- Blade: @foreach($packages as $pkg) -->
            <div class="package-card glass-panel shine-border overflow-hidden rounded-[2rem] transition-colors duration-300 relative">
                
                <div class="absolute top-0 right-8 bg-yellow-400 text-[#092b18] px-4 py-1.5 rounded-b-xl text-xs font-bold uppercase tracking-wider z-20">
                    Tailor Made Tours
                </div>

                <div class="grid md:grid-cols-[300px_1fr] gap-6 p-4">
                    <!-- Image Section -->
                    <div class="relative h-64 md:h-full min-h-[250px] w-full overflow-hidden rounded-[1.5rem] group cursor-pointer toggle-btn">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=80" alt="Tour" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] via-transparent to-transparent"></div>
                        <span class="absolute left-4 bottom-4 px-3 py-1 text-sm font-semibold tracking-wider text-white drop-shadow-md">
                            📍 Sri Lanka
                        </span>
                    </div>

                    <!-- Content Section -->
                    <div class="flex flex-col justify-center p-4">
                        <h3 class="text-2xl font-semibold text-white pr-20 cursor-pointer toggle-btn">
                            Sri Lanka Tailor Made 10 Days - Dream Route
                        </h3>
                        
                        <div class="mt-4 flex items-center gap-4 flex-wrap">
                            <span class="rounded-md bg-emerald-900/50 px-3 py-1 text-sm font-medium text-emerald-200 border border-emerald-700/50 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                10 Days
                            </span>
                            <span class="text-lg font-bold text-yellow-400">From USD 1,500</span>
                        </div>
                        
                        <p class="mt-4 text-emerald-100/70 leading-relaxed text-sm">
                            A thrilling 10 days dedicated to Sri Lanka's finest national parks and cultural triangles.
                        </p>

                        <!-- Button visible only when collapsed -->
                        <div class="summary-view-btn mt-6 flex justify-between items-center toggle-btn cursor-pointer">
                            <span class="inline-flex items-center gap-2 text-sm font-medium text-yellow-400 hover:text-yellow-300 transition-colors">
                                View Itinerary & Map <span class="text-lg">↓</span>
                            </span>
                            <!-- Replace href with Laravel route route('tour.show', $pkg->id) -->
                            <a href="#" class="px-5 py-2 text-sm font-bold text-[#092b18] bg-yellow-400 rounded-full hover:bg-yellow-300 transition-colors" onclick="event.stopPropagation();">
                                View Tour
                            </a>
                        </div>

                        <!-- Expanded Itinerary / Map View (Hidden by default via CSS) -->
                        <div class="itinerary-content">
                            <div class="mt-8 border-t border-emerald-500/20 pt-8">
                                <!-- Interactive Map Header -->
                                <div class="mb-10 bg-emerald-950/40 p-6 rounded-2xl border border-emerald-800/50 relative overflow-hidden">
                                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>
                                    <h4 class="flex items-center justify-center gap-2 mb-6 text-xs font-bold uppercase tracking-widest text-yellow-400 relative z-10">
                                        <span class="text-base">🗺️</span> Interactive Tour Map
                                    </h4>
                                    
                                    <!-- Horizontal Map Nodes -->
                                    <div class="flex flex-wrap justify-center items-center gap-x-2 gap-y-4 relative z-10">
                                        <!-- Node 1 -->
                                        <div class="flex items-center">
                                            <div class="bg-emerald-900/60 border border-yellow-400/30 text-white px-3 py-1.5 rounded-full text-xs font-medium whitespace-nowrap shadow-[0_0_10px_rgba(16,185,129,0.1)]">
                                                Colombo
                                            </div>
                                            <div class="w-6 sm:w-10 h-0 border-t-[2px] border-dashed border-yellow-400/40 mx-1 relative">
                                                <div class="travel-x absolute -top-[3px] w-1.5 h-1.5 bg-yellow-400 rounded-full shadow-[0_0_5px_rgba(250,204,21,1)]" style="animation-delay: 0s;"></div>
                                            </div>
                                        </div>
                                        <!-- Node 2 -->
                                        <div class="flex items-center">
                                            <div class="bg-emerald-900/60 border border-yellow-400/30 text-white px-3 py-1.5 rounded-full text-xs font-medium whitespace-nowrap shadow-[0_0_10px_rgba(16,185,129,0.1)]">
                                                Minneriya
                                            </div>
                                            <div class="w-6 sm:w-10 h-0 border-t-[2px] border-dashed border-yellow-400/40 mx-1 relative">
                                                <div class="travel-x absolute -top-[3px] w-1.5 h-1.5 bg-yellow-400 rounded-full shadow-[0_0_5px_rgba(250,204,21,1)]" style="animation-delay: 0.2s;"></div>
                                            </div>
                                        </div>
                                        <!-- Node 3 (Last node, no line after) -->
                                        <div class="flex items-center">
                                            <div class="bg-emerald-900/60 border border-yellow-400/30 text-white px-3 py-1.5 rounded-full text-xs font-medium whitespace-nowrap shadow-[0_0_10px_rgba(16,185,129,0.1)]">
                                                Kandy
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Vertical Timeline -->
                                <div class="relative pl-2 pb-4">
                                    <!-- Animated Dashed Map Path Line -->
                                    <div class="absolute left-[27px] top-6 bottom-6 w-0 border-l-[3px] border-dashed border-yellow-400/30">
                                        <div class="travel-y absolute -left-[7.5px] w-3 h-3 bg-yellow-400 rounded-full shadow-[0_0_10px_rgba(250,204,21,1)] z-20"></div>
                                    </div>
                                    
                                    <div class="flex flex-col gap-8">
                                        <!-- Timeline Item Blade: @foreach($pkg->itinerary as $day) -->
                                        <div class="relative flex items-start gap-8 group">
                                            <div class="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-emerald-800 to-emerald-950 border-[2px] border-yellow-400 shadow-[0_0_15px_rgba(250,204,21,0.2)] group-hover:bg-yellow-400 transition-colors duration-500">
                                                <span class="text-sm group-hover:scale-110 transition-transform duration-300">📍</span>
                                            </div>
                                            
                                            <div class="flex-1 bg-emerald-950/20 p-5 rounded-2xl border border-emerald-800/30 hover:border-yellow-400/30 transition-all duration-300 hover:bg-emerald-900/40 hover:-translate-y-1 hover:shadow-lg hover:shadow-emerald-900/20">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <span class="bg-yellow-400 text-emerald-950 px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-widest">
                                                        Day 01
                                                    </span>
                                                    <span class="text-xl font-bold text-white">
                                                        Colombo
                                                    </span>
                                                </div>
                                                <p class="text-sm text-emerald-100/80 leading-relaxed">
                                                    Airport pickup & transfer to Colombo hotel.
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <!-- Timeline Item 2 -->
                                        <div class="relative flex items-start gap-8 group">
                                            <div class="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-emerald-800 to-emerald-950 border-[2px] border-yellow-400 shadow-[0_0_15px_rgba(250,204,21,0.2)] group-hover:bg-yellow-400 transition-colors duration-500">
                                                <span class="text-sm group-hover:scale-110 transition-transform duration-300">📍</span>
                                            </div>
                                            <div class="flex-1 bg-emerald-950/20 p-5 rounded-2xl border border-emerald-800/30 hover:border-yellow-400/30 transition-all duration-300 hover:bg-emerald-900/40 hover:-translate-y-1 hover:shadow-lg hover:shadow-emerald-900/20">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <span class="bg-yellow-400 text-emerald-950 px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-widest">
                                                        Day 02
                                                    </span>
                                                    <span class="text-xl font-bold text-white">Minneriya</span>
                                                </div>
                                                <p class="text-sm text-emerald-100/80 leading-relaxed">
                                                    Elephant Gathering at Minneriya National Park.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- @endforeach -->
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-8 flex gap-4 justify-end">
                                    <button class="toggle-btn rounded-full border border-emerald-600 px-6 py-2 text-sm font-semibold text-emerald-100 transition hover:bg-emerald-900/50">
                                        Hide Itinerary
                                    </button>
                                    <button class="rounded-full bg-yellow-400 px-6 py-2 block text-sm font-bold text-emerald-950 transition hover:bg-yellow-300 hover:scale-105">
                                        Inquire About This Tour
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- @endforeach -->

        </div>
    </div>
</section>

<!-- Accordion JavaScript Logic -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const packageCards = document.querySelectorAll('.package-card');

        packageCards.forEach(card => {
            // Find all triggers within this specific card (Image, Title, View Btn, Hide Btn)
            const toggleTriggers = card.querySelectorAll('.toggle-btn');
            
            toggleTriggers.forEach(trigger => {
                trigger.addEventListener('click', (e) => {
                    // Prevent firing if they clicked a real link inside the container
                    if(e.target.tagName.toLowerCase() === 'a') return;
                    
                    const isCurrentlyExpanded = card.classList.contains('is-expanded');

                    // 1. Close all other cards first (to mimic React state behavior where only 1 is open)
                    packageCards.forEach(otherCard => {
                        otherCard.classList.remove('is-expanded');
                    });

                    // 2. If the clicked card wasn't already open, open it
                    if (!isCurrentlyExpanded) {
                        card.classList.add('is-expanded');
                    }
                });
            });
        });
    });
</script>