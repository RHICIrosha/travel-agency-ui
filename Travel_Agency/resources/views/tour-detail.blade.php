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
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-8 reveal-up delay-100">
        Sri Lanka <span class="text-emerald-100/60 font-light">10 Days - Sri Lanka Dream Route</span>
    </h1>

    <!-- Two Column Layout -->
    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- Left Column: Content -->
        <div class="w-full lg:w-2/3 flex flex-col gap-8 reveal-up delay-200">
            
            <!-- Image Gallery/Slider Placeholder -->
            <div class="relative w-full aspect-[16/9] sm:aspect-[21/9] lg:aspect-[16/9] rounded-[2rem] overflow-hidden group shine-border">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80" alt="Sri Lanka Sunset" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                
                <!-- Pagination Dots -->
                <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2 z-10">
                    <button class="w-2.5 h-2.5 rounded-full bg-yellow-400"></button>
                    <button class="w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition"></button>
                    <button class="w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition"></button>
                    <button class="w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition"></button>
                    <button class="w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition"></button>
                </div>
            </div>

            <!-- Tour Summary Box -->
            <div class="glass-panel shine-border rounded-[2rem] p-6 sm:p-10">
                
                <!-- Summary Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                    <h2 class="text-2xl font-bold text-white">Tour Summary</h2>
                    <div class="flex items-center gap-2 text-sm text-emerald-100/80 bg-white/5 border border-white/10 px-4 py-2 rounded-full backdrop-blur">
                        <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        Suitable for : <span class="font-semibold text-white">Family, Couple & Friends</span>
                    </div>
                </div>

                <p class="text-emerald-100/70 leading-relaxed mb-10 text-sm sm:text-base">
                    Sri Lanka is perfect for couples to relax on stunning beaches, explore misty hills and waterfalls, or go on adventures through rainforests and mountains. Try water sports, wildlife safaris, and village life, then unwind with a luxurious spa after a day of fun and flavor.
                </p>

                <!-- Inclusions -->
                <h3 class="text-xl font-bold text-white mb-4">Inclusion</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8 mb-10 text-sm text-emerald-100/80">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Accommodation
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Airport Pick-up
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Airport Drop-off
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Breakfast & Dinner
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Private Luxury Car
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Private Driver/Guide
                    </div>
                </div>

                <!-- Tour Theme -->
                <h3 class="text-xl font-bold text-white mb-4">Tour Theme</h3>
                <div class="flex flex-wrap gap-6 mb-10 text-sm text-emerald-100/80">
                    <div class="flex items-center gap-2">
                        <span class="text-green-400 text-lg">🌴</span> Beach
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-green-400 text-lg">🏙️</span> City Tours
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-green-400 text-lg">🎭</span> Culture
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-green-400 text-lg">🏛️</span> History
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-green-400 text-lg">🐘</span> Wildlife
                    </div>
                </div>

                <!-- Cities -->
                <div class="flex items-center gap-4 mb-2">
                    <h3 class="text-xl font-bold text-white">Number of Cities</h3>
                    <span class="bg-white/10 text-white border border-white/20 font-bold px-3 py-1 rounded-md">8</span>
                </div>
                <p class="text-sm text-emerald-100/70">
                    Negombo, Anuradhapura <a href="#" class="text-white font-semibold hover:text-yellow-400 transition ml-1">View More »</a>
                </p>

            </div>
        </div>

        <!-- Right Column: Sticky Sidebar -->
        <div class="w-full lg:w-1/3 reveal-up delay-300">
            <div class="glass-panel shine-border rounded-[2rem] p-6 lg:p-8 lg:sticky lg:top-32">
                
                <!-- Quick Info Grid -->
                <div class="grid grid-cols-2 gap-6 mb-8 border-b border-white/10 pb-8">
                    <div>
                        <p class="text-xs text-emerald-100/60 uppercase tracking-wider mb-2">Destination</p>
                        <div class="flex items-center gap-2 text-white font-medium text-sm">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/1/11/Flag_of_Sri_Lanka.svg" alt="SL Flag" class="w-5 h-5 rounded-full object-cover">
                            Sri Lanka
                        </div>
                    </div>
                    <div>
                        <p class="text-xs text-emerald-100/60 uppercase tracking-wider mb-2">Type of tour</p>
                        <span class="bg-white/5 border border-white/10 text-white text-xs px-3 py-1.5 rounded-md backdrop-blur inline-block">Tailor Made</span>
                    </div>
                    <div>
                        <p class="text-xs text-emerald-100/60 uppercase tracking-wider mb-2">Duration</p>
                        <p class="text-white font-medium text-sm">10 Days 9 Nights</p>
                    </div>
                    <div class="flex items-end">
                        <a href="#" class="text-xs text-yellow-400 hover:text-yellow-300 underline transition">Show Inclusions</a>
                    </div>
                </div>

                <!-- Pricing -->
                <div class="mb-8 border-b border-white/10 pb-8">
                    <p class="text-sm text-emerald-100/60 mb-1">Starting at</p>
                    <h2 class="text-4xl font-bold text-white mb-1">NOK 13,978</h2>
                    <p class="text-xs text-emerald-100/60">Per Person</p>
                </div>

                <!-- Agent Box -->
                <div class="flex gap-4 mb-8">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=100&q=80" alt="Agent" class="w-12 h-12 rounded-full border-2 border-yellow-400 object-cover shrink-0">
                    <div>
                        <p class="font-bold text-white text-sm mb-1">Hello! I'm Sharanie</p>
                        <p class="text-xs text-emerald-100/70 leading-relaxed">
                            Your dedicated Destination Expert. We are online <span class="font-bold text-white">24/7</span> & feel free to connect with us by clicking the Get a Quote button. <span class="text-yellow-400 font-medium">Let's plan your dream getaway!</span>
                        </p>
                    </div>
                </div>

                <!-- CTA -->
                <button class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3.5 rounded-full transition-transform hover:scale-[1.02] shadow-[0_0_20px_rgba(34,197,94,0.3)] mb-4">
                    Get a Quote
                </button>
                <p class="text-center text-xs text-emerald-100/50">*Our reply time is almost instant</p>
                
            </div>
        </div>

    </div>
</main>
@endsection