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
                <img src="{{ Str::startsWith($destination->image_url, 'http') ? $destination->image_url : Storage::url($destination->image_url) }}" alt="{{ $destination->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
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
            
            <!-- Category: Beaches & Coastal -->
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up">
                <div class="h-48 overflow-hidden relative">
                    <img src="{{ asset('assets/image/beach.jpeg') }}" alt="Beaches" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 text-2xl font-bold text-white flex items-center gap-2"><span>🏖️</span> Beaches & Coastal</h3>
                </div>
                <div class="p-6 flex-1 bg-gradient-to-b from-[#020a05] to-transparent">
                    <div class="mb-4">
                        <h4 class="text-xs font-bold text-yellow-400 uppercase tracking-wider mb-2">East Coast</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Trincomalee</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Nilaveli Beach</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Uppuveli Beach</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Pigeon Island National Park</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Pasikuda</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Kalkudah</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Arugam Bay</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Batticaloa</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-xs font-bold text-yellow-400 uppercase tracking-wider mb-2">South Coast</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Mirissa</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Unawatuna</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Hikkaduwa</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Tangalle</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Weligama</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Matara</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Dickwella</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Hambantota</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-xs font-bold text-yellow-400 uppercase tracking-wider mb-2">West Coast</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Negombo</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Kalutara</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Bentota</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Beruwala</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Wadduwa</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Mount Lavinia</span>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-yellow-400 uppercase tracking-wider mb-2">North Coast</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Jaffna</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Casuarina Beach</span>
                            <span class="bg-white/5 border border-white/10 text-emerald-50 text-xs px-2.5 py-1 rounded-md">Mannar</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category: Hill Country -->
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up delay-100">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1555899434-94d1368aa7af?auto=format&fit=crop&w=800&q=80" alt="Hill Country" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 text-xl font-bold text-white flex items-center gap-2"><span>🏔️</span> Hill & Tea Country</h3>
                </div>
                <div class="p-6 flex-1 bg-gradient-to-b from-[#020a05] to-transparent">
                    <div class="flex flex-wrap gap-2.5">
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Ella</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Nuwara Eliya</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Haputale</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Bandarawela</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Hatton</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Talawakelle</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Maskeliya</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Kandy</span>
                    </div>
                </div>
            </div>

            <!-- Category: Ancient Cities -->
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up delay-200">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1588598126284-fcb4369a19fc?auto=format&fit=crop&w=800&q=80" alt="Ancient Cities" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 text-xl font-bold text-white flex items-center gap-2"><span>🏛️</span> Ancient Cities</h3>
                </div>
                <div class="p-6 flex-1 bg-gradient-to-b from-[#020a05] to-transparent">
                    <div class="flex flex-wrap gap-2.5">
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Anuradhapura</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Polonnaruwa</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Sigiriya</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Pidurangala Rock</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Dambulla Cave Temple</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Yapahuwa</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Mihintale</span>
                    </div>
                </div>
            </div>

            <!-- Category: Wildlife -->
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1561731216-c3a4d99437d5?auto=format&fit=crop&w=800&q=80" alt="Wildlife" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 text-xl font-bold text-white flex items-center gap-2"><span>🐘</span> Wildlife & Safari</h3>
                </div>
                <div class="p-6 flex-1 bg-gradient-to-b from-[#020a05] to-transparent">
                    <div class="flex flex-wrap gap-2.5">
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Yala National Park</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Udawalawe National Park</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Wilpattu National Park</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Minneriya National Park</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Kaudulla National Park</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Bundala National Park</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Kumana National Park</span>
                    </div>
                </div>
            </div>

            <!-- Category: Nature & Eco -->
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up delay-100">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1528659556858-450f3801f9ce?auto=format&fit=crop&w=800&q=80" alt="Nature" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 text-xl font-bold text-white flex items-center gap-2"><span>🌿</span> Nature & Eco Tourism</h3>
                </div>
                <div class="p-6 flex-1 bg-gradient-to-b from-[#020a05] to-transparent">
                    <div class="flex flex-wrap gap-2.5">
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Sinharaja Forest Reserve</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Horton Plains National Park</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Knuckles Mountain Range</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Riverston</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Bambarakanda Falls</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Dunhinda Falls</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Rawana Falls</span>
                    </div>
                </div>
            </div>

            <!-- Category: Hiking & Adventure -->
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up delay-200">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1582213796677-80252b45cbaf?auto=format&fit=crop&w=800&q=80" alt="Hiking" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 text-xl font-bold text-white flex items-center gap-2"><span>⛰️</span> Hiking & Adventure</h3>
                </div>
                <div class="p-6 flex-1 bg-gradient-to-b from-[#020a05] to-transparent">
                    <div class="flex flex-wrap gap-2.5">
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Adam's Peak</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Little Adam's Peak</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Kitulgala</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Lipton's Seat</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Nine Arch Bridge</span>
                    </div>
                </div>
            </div>

            <!-- Category: Religious Tourism -->
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1546708973-b339540b5162?auto=format&fit=crop&w=800&q=80" alt="Religious Sites" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 text-xl font-bold text-white flex items-center gap-2"><span>🕌</span> Religious Tourism</h3>
                </div>
                <div class="p-6 flex-1 bg-gradient-to-b from-[#020a05] to-transparent">
                    <div class="flex flex-wrap gap-2.5">
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Temple of the Tooth</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Sri Maha Bodhi</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Ruwanwelisaya</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Nagadeepa Rajamaha Viharaya</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Madhu Church</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Koneswaram Temple</span>
                    </div>
                </div>
            </div>

            <!-- Category: Cities & Urban Tourism -->
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up delay-100">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1582299863774-3c4be19bc704?auto=format&fit=crop&w=800&q=80" alt="Cities" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 text-xl font-bold text-white flex items-center gap-2"><span>🏙️</span> Cities & Urban</h3>
                </div>
                <div class="p-6 flex-1 bg-gradient-to-b from-[#020a05] to-transparent">
                    <div class="flex flex-wrap gap-2.5">
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Colombo</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Kandy</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Galle</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Jaffna</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Kurunegala</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Badulla</span>
                    </div>
                </div>
            </div>

            <!-- Category: Islands -->
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col reveal-up delay-200">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?auto=format&fit=crop&w=800&q=80" alt="Islands" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#020a05] to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 text-xl font-bold text-white flex items-center gap-2"><span>🏝️</span> Islands</h3>
                </div>
                <div class="p-6 flex-1 bg-gradient-to-b from-[#020a05] to-transparent">
                    <div class="flex flex-wrap gap-2.5">
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Pigeon Island</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Nainativu</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Delft Island</span>
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-100 px-3 py-1.5 text-sm rounded-lg">Mannar Island</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
@endsection