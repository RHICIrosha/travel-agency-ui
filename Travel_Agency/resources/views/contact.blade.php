@extends('layouts.app')

@section('content')
<main class="relative overflow-hidden pt-32 pb-20 mx-auto max-w-7xl px-6 lg:px-10">
    
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-xs text-emerald-100/60 mb-6 reveal-up">
        <a href="/" class="hover:text-yellow-400 transition">Home</a>
        <span>/</span>
        <span class="text-white">Contact</span>
    </div>

    <!-- Page Title -->
    <div class="mb-12 reveal-up">
        <h1 class="text-4xl font-bold text-white sm:text-5xl mb-4">Get a <span class="text-emerald-100/60 font-light">Quote</span></h1>
        <p class="text-sm text-emerald-100/70 max-w-2xl leading-relaxed">
            Our dedicated team of local experts are available 24/7, ready to provide assistance whenever you need it. Fill out the form below and we will design your perfect itinerary.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-[0.8fr_1.2fr] gap-10 items-start">
        
        <!-- LEFT COLUMN: Contact Information -->
        <div class="flex flex-col gap-6 reveal-up delay-100">
            
            <!-- Info Card 1: Customer Support -->
            <div class="glass-panel shine-border rounded-[2rem] p-8 relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-yellow-400/10 rounded-full blur-2xl"></div>
                <div class="w-12 h-12 rounded-full bg-emerald-500/20 flex items-center justify-center border border-emerald-500/30 mb-6 text-xl">
                    📞
                </div>
                <h3 class="text-xl font-bold text-white mb-2">24/7 Support</h3>
                <p class="text-sm text-emerald-100/60 mb-4">Speak directly to our destination experts anytime.</p>
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $siteSettings->contact_phone ?? '+94 77 123 4567') }}" class="text-lg font-semibold text-yellow-400 hover:text-yellow-300 transition">{{ $siteSettings->contact_phone ?? '+94 77 123 4567' }}</a>
            </div>

            <!-- Info Card 2: Email -->
            <div class="glass-panel shine-border rounded-[2rem] p-8 relative overflow-hidden">
                <div class="w-12 h-12 rounded-full bg-emerald-500/20 flex items-center justify-center border border-emerald-500/30 mb-6 text-xl">
                    ✉️
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Email Us</h3>
                <p class="text-sm text-emerald-100/60 mb-4">We usually reply within 2 hours during business days.</p>
                <a href="mailto:{{ $siteSettings->contact_email ?? 'hello@sanduntravels.com' }}" class="text-lg font-semibold text-yellow-400 hover:text-yellow-300 transition">{{ $siteSettings->contact_email ?? 'hello@sanduntravels.com' }}</a>
            </div>

            <!-- Info Card 3: Headquarters -->
            <div class="glass-panel shine-border rounded-[2rem] p-8 relative overflow-hidden">
                <div class="w-12 h-12 rounded-full bg-emerald-500/20 flex items-center justify-center border border-emerald-500/30 mb-6 text-xl">
                    📍
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Headquarters</h3>
                <p class="text-sm text-emerald-100/60 leading-relaxed">
                    {!! nl2br(e($siteSettings->contact_address ?? "123 Paradise Avenue,\nColombo 03,\nSri Lanka")) !!}
                </p>
            </div>

        </div>

        <!-- RIGHT COLUMN: The Quote Form -->
        <div class="glass-panel shine-border rounded-[2rem] p-8 sm:p-10 reveal-up delay-200">
            
            <h2 class="text-2xl font-bold text-white mb-8 border-b border-white/10 pb-4">Personalised Quote Form</h2>
            
            @if (session('success'))
                <div class="mb-8 p-5 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 text-sm flex items-start gap-3">
                    <span class="text-lg">✅</span>
                    <div>
                        <strong class="block font-bold text-white mb-1">Quote Request Sent!</strong>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 p-5 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-300 text-sm flex items-start gap-3">
                    <span class="text-lg">⚠️</span>
                    <div>
                        <strong class="block font-bold text-white mb-1">Please fix the following:</strong>
                        <ul class="list-disc pl-4 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="/contact" method="POST" class="flex flex-col gap-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div>
                        <label class="block text-xs text-emerald-100/60 mb-2 font-medium uppercase tracking-wider">Full Name</label>
                        <input type="text" name="name" placeholder="John Jackson" value="{{ old('name') }}" required 
                            class="w-full bg-black/30 border border-white/10 rounded-xl px-5 py-3.5 text-white placeholder-emerald-100/30 focus:outline-none focus:border-yellow-400 focus:bg-black/50 transition">
                    </div>
                    
                    <!-- Email Address -->
                    <div>
                        <label class="block text-xs text-emerald-100/60 mb-2 font-medium uppercase tracking-wider">Email Address</label>
                        <input type="email" name="email" placeholder="Hello@outlook.com" value="{{ old('email') }}" required 
                            class="w-full bg-black/30 border border-white/10 rounded-xl px-5 py-3.5 text-white placeholder-emerald-100/30 focus:outline-none focus:border-yellow-400 focus:bg-black/50 transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Phone Number -->
                    <div>
                        <label class="block text-xs text-emerald-100/60 mb-2 font-medium uppercase tracking-wider">Phone Number</label>
                        <input type="tel" name="phone" placeholder="+1 (555) 000-0000" value="{{ old('phone') }}" required 
                            class="w-full bg-black/30 border border-white/10 rounded-xl px-5 py-3.5 text-white placeholder-emerald-100/30 focus:outline-none focus:border-yellow-400 focus:bg-black/50 transition">
                    </div>

                    <!-- Destination -->
                    <div>
                        <label class="block text-xs text-emerald-100/60 mb-2 font-medium uppercase tracking-wider">Destination</label>
                        <div class="relative">
                            <select name="destination" required 
                                class="w-full bg-black/30 border border-white/10 rounded-xl px-5 py-3.5 text-white focus:outline-none focus:border-yellow-400 focus:bg-black/50 transition appearance-none cursor-pointer">
                                <option value="" disabled {{ !old('destination') ? 'selected' : '' }} class="text-gray-500">Select a Destination</option>
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination->name }}" class="bg-[#05180d]" {{ old('destination') === $destination->name ? 'selected' : '' }}>
                                        {{ $destination->name }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- Custom Select Arrow -->
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-emerald-100/50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Coupon Section -->
                <div class="mt-2">
                    <button type="button" onclick="document.getElementById('coupon-field').classList.toggle('hidden')" class="text-sm text-yellow-400 font-medium hover:text-yellow-300 transition flex items-center gap-2">
                        <span>🏷️</span> Have a coupon?
                    </button>
                    <div id="coupon-field" class="{{ old('coupon') ? '' : 'hidden' }} mt-4 transition-all duration-300">
                        <input type="text" name="coupon" placeholder="Enter promo code" value="{{ old('coupon') }}" 
                            class="w-full md:w-1/2 bg-black/30 border border-white/10 rounded-xl px-5 py-3 text-white placeholder-emerald-100/30 focus:outline-none focus:border-yellow-400 transition">
                    </div>
                </div>

                <!-- Submit Button Area -->
                <div class="mt-6 border-t border-white/10 pt-8 flex flex-col gap-4">
                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold text-lg py-4 rounded-full transition-transform hover:scale-[1.01] shadow-[0_0_20px_rgba(34,197,94,0.2)]">
                        Get a personalised quote in 2 hours
                    </button>
                    
                    <p class="text-center text-xs text-emerald-100/50 flex items-center justify-center gap-2 mt-2">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        We guarantee that your information will not be shared with any third parties.
                    </p>
                </div>
                
            </form>
        </div>
        
    </div>
</main>
@endsection