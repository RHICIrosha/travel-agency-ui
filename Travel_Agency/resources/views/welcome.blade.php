@extends('layouts.app')

@section('content')
<main class="relative overflow-hidden">
    <section class="grid-pattern relative">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.08),transparent_30%)]"></div>
        <div class="mx-auto flex min-h-screen max-w-7xl flex-col px-6 pb-16 pt-32 lg:px-10">
            <div class="grid flex-1 items-center gap-10 py-10 lg:grid-cols-[1.05fr_0.95fr] lg:py-16">
                
                <div class="relative z-10 reveal-up">
                    <span class="inline-flex rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-amber-200 shadow-lg backdrop-blur">
                        Sri Lanka travel agency built for international clients
                    </span>
                    <h1 class="mt-6 max-w-3xl text-5xl font-semibold leading-none tracking-tight text-white sm:text-6xl lg:text-7xl">
                        Animated travel experiences with a premium visual story.
                    </h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-emerald-100/70 sm:text-xl">
                        A creative travel website concept with cinematic images, layered
                        cards, destination highlights, and smooth motion for a modern
                        tourism brand.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="#tours" class="rounded-full bg-yellow-400 px-6 py-3 font-semibold text-emerald-950 transition hover:scale-[1.03]">
                            Explore Holidays & Tours
                        </a>
                        <a href="#services" class="rounded-full border border-white/15 bg-white/5 px-6 py-3 font-semibold text-white backdrop-blur transition hover:bg-white/10">
                            View Services
                        </a>
                    </div>

                    <div class="mt-10 grid gap-4 sm:grid-cols-3">
                        <article class="glass-panel shine-border rounded-3xl p-5 reveal-up delay-100">
                            <p class="text-sm uppercase tracking-[0.2em] text-yellow-400">01</p>
                            <h2 class="mt-3 text-lg font-semibold text-white">Curated Sri Lanka journeys</h2>
                            <p class="mt-2 text-sm leading-6 text-emerald-100/70">Tailored routes for beaches, heritage, wildlife, and tea country.</p>
                        </article>
                        <article class="glass-panel shine-border rounded-3xl p-5 reveal-up delay-200">
                            <p class="text-sm uppercase tracking-[0.2em] text-yellow-400">02</p>
                            <h2 class="mt-3 text-lg font-semibold text-white">Premium foreign traveler support</h2>
                            <p class="mt-2 text-sm leading-6 text-emerald-100/70">Concierge-style planning, airport pickup, and flexible trip design.</p>
                        </article>
                        <article class="glass-panel shine-border rounded-3xl p-5 reveal-up delay-300">
                            <p class="text-sm uppercase tracking-[0.2em] text-yellow-400">03</p>
                            <h2 class="mt-3 text-lg font-semibold text-white">Animated storytelling UI</h2>
                            <p class="mt-2 text-sm leading-6 text-emerald-100/70">Motion-led cards, image layers, and map-inspired destination flow.</p>
                        </article>
                    </div>
                </div>

                <div class="relative reveal-scale">
                    <div class="absolute -left-5 top-10 h-28 w-28 rounded-full bg-yellow-400/25 blur-3xl floaty"></div>
                    <div class="absolute right-3 top-20 h-32 w-32 rounded-full bg-emerald-500/20 blur-3xl floaty" style="animation-delay: -3s;"></div>

                    <div class="glass-panel shine-border relative overflow-hidden rounded-[2rem] p-4 shadow-[0_30px_120px_rgba(0,0,0,0.45)]">
                        <div class="relative aspect-[4/5] overflow-hidden rounded-[1.5rem]">
                            <img src="https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=1400&q=80" alt="Luxury tropical travel destination" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#031008] via-[#031008]/20 to-transparent"></div>
                        </div>

                        <div class="absolute left-6 top-6 rounded-2xl bg-[#020a05]/40 px-4 py-3 border border-white/10 backdrop-blur-xl">
                            <p class="text-xs uppercase tracking-[0.25em] text-yellow-400">Live Route</p>
                            <p class="mt-1 text-sm text-white">Colombo → Kandy → Ella → Galle</p>
                        </div>

                        <div class="absolute bottom-6 left-6 right-6 grid gap-3 sm:grid-cols-2">
                            <div class="glass-panel rounded-2xl p-4">
                                <p class="text-xs uppercase tracking-[0.2em] text-emerald-100/70">Popular choice</p>
                                <p class="mt-2 text-2xl font-semibold text-white">9 Days</p>
                                <p class="text-sm text-emerald-100/70">Luxury island discovery</p>
                            </div>
                            <div class="glass-panel rounded-2xl p-4">
                                <p class="text-xs uppercase tracking-[0.2em] text-emerald-100/70">Travel style</p>
                                <p class="mt-2 text-2xl font-semibold text-white">Premium</p>
                                <p class="text-sm text-emerald-100/70">International standard service</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 grid gap-4 sm:grid-cols-2">
                        <div class="glass-panel shine-border overflow-hidden rounded-[1.75rem] p-3 transition-transform duration-300 hover:-translate-y-2">
                            <div class="relative h-44 overflow-hidden rounded-[1.25rem]">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80" alt="Galle Coast Escape" class="w-full h-full object-cover">
                            </div>
                            <p class="mt-4 text-xs uppercase tracking-[0.2em] text-yellow-400">Beach Luxury</p>
                            <p class="mt-1 text-lg font-medium text-white">Galle Coast Escape</p>
                        </div>

                        <div class="glass-panel shine-border overflow-hidden rounded-[1.75rem] p-3 transition-transform duration-300 hover:-translate-y-2">
                            <div class="relative h-44 overflow-hidden rounded-[1.25rem]">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80" alt="Ella Hill Journey" class="w-full h-full object-cover">
                            </div>
                            <p class="mt-4 text-xs uppercase tracking-[0.2em] text-yellow-400">Tea Country</p>
                            <p class="mt-1 text-lg font-medium text-white">Ella Hill Journey</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="destinations" class="mx-auto max-w-7xl px-6 py-20 lg:px-10">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between reveal-up">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-yellow-400">Featured destinations</p>
                <h2 class="mt-3 text-3xl font-semibold text-white sm:text-4xl">More images, more feeling, more story.</h2>
            </div>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <div class="glass-panel shine-border overflow-hidden rounded-[2rem] p-3 transition-transform duration-300 hover:scale-[1.02] hover:-translate-y-2 reveal-up delay-100">
                <div class="relative h-72 overflow-hidden rounded-[1.5rem] group">
                    <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=80" alt="Wildlife Safari" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#031008] via-transparent to-transparent"></div>
                    <span class="absolute left-4 top-4 rounded-full bg-[#031008]/40 border border-white/10 px-3 py-1 text-xs uppercase tracking-[0.25em] text-white backdrop-blur">Adventure</span>
                </div>
                <div class="p-4">
                    <p class="text-lg font-semibold text-white">Wildlife Safari</p>
                    <p class="mt-2 text-sm leading-6 text-emerald-100/70">Smooth image-led layout designed for premium tours, resorts, and destination highlights.</p>
                </div>
            </div>
            
            <div class="glass-panel shine-border overflow-hidden rounded-[2rem] p-3 transition-transform duration-300 hover:scale-[1.02] hover:-translate-y-2 reveal-up delay-200">
                <div class="relative h-72 overflow-hidden rounded-[1.5rem] group">
                    <img src="https://images.unsplash.com/photo-1519608487953-e999c86e7455?auto=format&fit=crop&w=1200&q=80" alt="Cultural Triangle" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#031008] via-transparent to-transparent"></div>
                    <span class="absolute left-4 top-4 rounded-full bg-[#031008]/40 border border-white/10 px-3 py-1 text-xs uppercase tracking-[0.25em] text-white backdrop-blur">Heritage</span>
                </div>
                <div class="p-4">
                    <p class="text-sm uppercase tracking-[0.25em] text-yellow-400">Heritage flow</p>
                    <p class="mt-1 text-xl font-medium text-white">Culture-rich destination highlights</p>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="mx-auto max-w-7xl px-6 py-10 lg:px-10 reveal-up">
        <div class="grid gap-6 lg:grid-cols-[0.85fr_1.15fr]">
            <div class="glass-panel shine-border rounded-[2rem] p-8">
                <p class="text-sm uppercase tracking-[0.35em] text-yellow-400">Travel services</p>
                <h2 class="mt-3 text-3xl font-semibold text-white">Designed for a real travel business, not just a template.</h2>
                <p class="mt-4 text-emerald-100/70 leading-7">
                    The layout is ready for hotel booking, package tours, foreign client inquiries, and future backend integration.
                </p>

                <div class="mt-6 grid gap-3">
                    <div class="rounded-2xl border border-emerald-500/10 bg-emerald-500/5 px-4 py-3 text-emerald-50">Private island transfers</div>
                    <div class="rounded-2xl border border-emerald-500/10 bg-emerald-500/5 px-4 py-3 text-emerald-50">Luxury villa and hotel booking</div>
                    <div class="rounded-2xl border border-emerald-500/10 bg-emerald-500/5 px-4 py-3 text-emerald-50">Family tours and honeymoon packages</div>
                    <div class="rounded-2xl border border-emerald-500/10 bg-emerald-500/5 px-4 py-3 text-emerald-50">Airport meet-and-greet assistance</div>
                    <div class="rounded-2xl border border-emerald-500/10 bg-emerald-500/5 px-4 py-3 text-emerald-50">Multi-country itineraries</div>
                    <div class="rounded-2xl border border-emerald-500/10 bg-emerald-500/5 px-4 py-3 text-emerald-50">Map-based custom route planning</div>
                </div>
            </div>
            
            <div class="glass-panel shine-border overflow-hidden rounded-[2rem] p-3 flex flex-col items-center justify-center relative min-h-[400px]">
                <div class="absolute -right-10 -bottom-10 h-64 w-64 rounded-full bg-yellow-400/10 blur-3xl floaty"></div>
                <div class="absolute -left-10 -top-10 h-64 w-64 rounded-full bg-emerald-500/10 blur-3xl floaty" style="animation-delay: -2s;"></div>
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80" alt="Services background" class="absolute inset-0 w-full h-full object-cover opacity-20 mix-blend-overlay">
                <div class="z-10 text-center p-8">
                    <h3 class="text-2xl font-bold mb-4">Start Planning</h3>
                    <a href="#contact" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-full shadow-lg uppercase tracking-widest transition duration-300 hover:-translate-y-1">Send Inquiry</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection