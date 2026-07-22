@extends('layouts.app')

@section('content')
<main class="relative overflow-hidden pt-32 pb-20 mx-auto max-w-7xl px-6 lg:px-10">
    
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-xs text-emerald-100/60 mb-6 reveal-up">
        <a href="/" class="hover:text-yellow-400 transition">Home</a>
        <span>/</span>
        <span class="text-white">FAQ</span>
    </div>

    <!-- Page Title -->
    <div class="mb-10 reveal-up">
        <h1 class="text-4xl font-bold text-white sm:text-5xl mb-4">Frequently Asked <span class="text-emerald-100/60 font-light">Questions</span></h1>
        <p class="text-sm text-emerald-100/70 max-w-3xl leading-relaxed">
            Welcome to Zenora Travels! We're excited to have you with us. For any questions you may have, please explore our FAQ page where you'll find helpful answers and information.
        </p>
    </div>

    <!-- Main Layout Wrapper (Content + Sidebar) -->
    <div class="flex flex-col lg:flex-row gap-8 items-start">
        
        <!-- LEFT COLUMN: FAQ Content Area (2/3 Width) -->
        <div class="w-full lg:w-2/3 flex flex-col gap-10 reveal-up delay-100">
            
            <!-- Section: How Can We Help -->
            <div>
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="text-yellow-400 text-xl">❓</span> How Can We Help?
                </h2>
                
                <div class="flex flex-col gap-3">
                    <!-- FAQ Item 1 -->
                    <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                        <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                            Where is Zenora Travels located?
                            <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                            Zenora Travels is located in Sri Lanka, offering premium travel experiences with a dedicated network of local destination experts.
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                        <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                            What are the countries to which I can fly with Zenora Travels?
                            <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                            We currently specialize in tailor-made travel connecting you with local experts in places like Sri Lanka, Maldives, Vietnam, Cambodia, Indonesia, Dubai, and Singapore.
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                        <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                            How do I book a tour with Zenora Travels?
                            <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                            Booking is simple! Browse our tour packages, click "Book This Trip" or "Get a Quote", fill out the form with your preferences, and one of our destination experts will contact you within 2 hours to finalize your itinerary.
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                        <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                            What do the general timings look like, when I book?
                            <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                            Timings vary based on your custom itinerary. Generally, daily tours start around 8:30 AM after breakfast. Your dedicated chauffeur guide will confirm exact pickup times with you the evening prior to each day's activities.
                        </div>
                    </div>
                </div>
                
                <button class="mt-4 text-yellow-400 text-sm font-semibold hover:text-yellow-300 transition flex items-center gap-2">
                    Show More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
            </div>

            <hr class="border-white/10">

            <!-- Section: Destination Based FAQ -->
            <div>
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="text-emerald-400 text-xl">🗺️</span> Destination Based FAQ
                </h2>
                <div class="flex flex-wrap gap-3 mb-8">
                    <button onclick="switchTab('sigiriya')" class="tab-btn px-6 py-2.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 hover:bg-emerald-500/30 transition text-sm font-medium" data-tab="sigiriya">Sigiriya</button>
                    <button onclick="switchTab('ella')" class="tab-btn px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium" data-tab="ella">Ella</button>
                    <button onclick="switchTab('galle')" class="tab-btn px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium" data-tab="galle">Galle</button>
                    <button onclick="switchTab('kandy')" class="tab-btn px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium" data-tab="kandy">Kandy</button>
                    <button onclick="switchTab('yala')" class="tab-btn px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium" data-tab="yala">Yala</button>
                    <button onclick="switchTab('nuwaraeliya')" class="tab-btn px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium" data-tab="nuwaraeliya">Nuwara Eliya</button>
                </div>

                <!-- Destination Tab Contents -->
                <div class="flex flex-col gap-3" id="tab-contents">
                    
                    <!-- Sigiriya Pane (Default Active) -->
                    <div id="tab-sigiriya" class="tab-pane flex flex-col gap-3 transition-opacity duration-300">
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                What is the best time of day to climb Sigiriya Rock?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                It is highly recommended to start climbing early in the morning (around 7:00 AM) or in the late afternoon (around 3:30 PM) to avoid the intense midday heat and the crowds.
                            </div>
                        </div>
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                How long does the Sigiriya climb take, and is it difficult?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                The climb to the summit takes about 1.5 to 2 hours in total. There are 1,200 steps to the top. It is moderately challenging but fully accessible to visitors of average fitness.
                            </div>
                        </div>
                    </div>

                    <!-- Ella Pane -->
                    <div id="tab-ella" class="tab-pane flex flex-col gap-3 hidden transition-opacity duration-300">
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                How can I see the trains passing the Nine Arch Bridge in Ella?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                Trains pass the bridge several times a day. Your Zenora Travels private guide will check the daily train timetables to ensure we time your visit perfectly to catch the trains passing over the historic arches.
                            </div>
                        </div>
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                What are the main hiking routes in Ella?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                Little Adam's Peak is a scenic 1-hour easy hike offering panoramic views. Ella Rock is a more demanding 3-to-4-hour hike through tea fields and railway tracks.
                            </div>
                        </div>
                    </div>

                    <!-- Galle Pane -->
                    <div id="tab-galle" class="tab-pane flex flex-col gap-3 hidden transition-opacity duration-300">
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                What are the top things to do in Galle Fort?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                Popular highlights include walking the historic Dutch ramparts, photographing the Galle Lighthouse, visiting colonial-era churches, and exploring boutique shops, cafes, and museums along the cobblestone streets.
                            </div>
                        </div>
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                Are there swimmable beaches near Galle?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                Yes! Nearby beaches like Unawatuna Beach, Dalawella Beach, and Jungle Beach offer sheltered, calm waters that are safe and perfect for swimming.
                            </div>
                        </div>
                    </div>

                    <!-- Kandy Pane -->
                    <div id="tab-kandy" class="tab-pane flex flex-col gap-3 hidden transition-opacity duration-300">
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                What is the dress code for the Temple of the Sacred Tooth Relic?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                Both men and women must wear clothing that covers their shoulders and knees. Shoes and hats must be removed before entering the temple grounds. Wearing white or light-colored clothing is highly appreciated.
                            </div>
                        </div>
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                When are the ritual service (Pooja) times at the Temple of the Tooth?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                The traditional Pooja services take place daily in the morning (5:30 AM - 7:00 AM and 9:30 AM - 11:00 AM) and in the evening (6:30 PM - 8:00 PM). Visiting during these times lets you witness the ceremonial drumming and rituals.
                            </div>
                        </div>
                    </div>

                    <!-- Yala Pane -->
                    <div id="tab-yala" class="tab-pane flex flex-col gap-3 hidden transition-opacity duration-300">
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                What is the probability of seeing a leopard in Yala?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                Yala National Park has one of the highest leopard densities in the world. Sightings are never 100% guaranteed, but going on an early morning safari (6:00 AM) or a late afternoon safari (3:00 PM) offers the best chances.
                            </div>
                        </div>
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                Does Yala National Park close during the year?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                Yes, Yala Block 1 normally closes for annual maintenance during the dry season (usually from early September to mid-October). During this time, we redirect safaris to Block 5 or adjacent national parks like Udawalawe or Bundala, which are equally incredible.
                            </div>
                        </div>
                    </div>

                    <!-- Nuwara Eliya Pane -->
                    <div id="tab-nuwaraeliya" class="tab-pane flex flex-col gap-3 hidden transition-opacity duration-300">
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                What is the weather like in Nuwara Eliya, and what should I pack?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                Nuwara Eliya is located in the central highlands and has a much cooler climate (ranging from 10°C to 20°C). We strongly recommend packing a light jacket, sweater, and trousers for the cool evenings.
                            </div>
                        </div>
                        <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                                Can we tour a tea factory and plantation in Nuwara Eliya?
                                <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                                Absolutely! We arrange guided tea factory tours where you can walk through tea gardens, watch how Ceylon tea is processed and graded, and enjoy a fresh cup of tea.
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN: Sticky Sidebar (AI Bot + Quote Form) -->
        <div class="w-full lg:w-1/3 flex flex-col gap-6 lg:sticky lg:top-32 reveal-up delay-200">
            
            <!-- AI Chatbot Interface -->
            <div class="glass-panel shine-border rounded-[2rem] overflow-hidden flex flex-col h-[450px] bg-gradient-to-b from-emerald-950/40 to-[#020a05]">
                
                <!-- Chat Header -->
                <div class="bg-black/40 p-4 border-b border-white/10 flex items-center gap-3 relative z-10">
                    <div class="w-10 h-10 rounded-full bg-yellow-400/20 flex items-center justify-center border border-yellow-400/50">
                        <span class="text-xl">🤖</span>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-sm">Zenora AI Assistant</h3>
                        <p class="text-[10px] text-emerald-400 flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Online 24/7
                        </p>
                    </div>
                </div>

                <!-- Chat Messages Area -->
                <div id="ai-chat-window" class="flex-1 p-4 overflow-y-auto flex flex-col gap-4 scroll-smooth text-sm relative z-10">
                    <!-- Default AI Message -->
                    <div class="flex gap-2 w-full">
                        <div class="bg-white/10 border border-white/5 rounded-2xl rounded-tl-none p-3 text-emerald-50 max-w-[85%] backdrop-blur">
                            Hello! I'm your virtual travel assistant. Ask me anything or try one of the questions below! ✨
                        </div>
                    </div>
                </div>

                <!-- Chat Input Area -->
                <div class="p-4 border-t border-white/10 bg-black/20 relative z-10">
                    
                    <!-- Random Suggested Questions -->
                    <div id="ai-suggestions" class="flex flex-wrap gap-2 mb-3">
                        <!-- Filled via JS -->
                    </div>

                    <div class="flex gap-2">
                        <input type="text" id="ai-input" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-yellow-400 text-xs transition" placeholder="Type your question...">
                        <button id="ai-send-btn" class="bg-yellow-400 hover:bg-yellow-500 text-emerald-950 p-2.5 rounded-xl transition flex items-center justify-center">
                            <svg class="w-4 h-4 transform rotate-45 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Scripts for FAQ Accordion & AI Bot -->
<script>
    // FAQ Accordion Toggle
    function toggleFaq(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('svg');
        
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            setTimeout(() => content.classList.remove('opacity-0'), 10);
            icon.classList.add('rotate-180', 'text-yellow-400');
            button.classList.add('text-yellow-400');
        } else {
            content.classList.add('opacity-0');
            setTimeout(() => content.classList.add('hidden'), 300);
            icon.classList.remove('rotate-180', 'text-yellow-400');
            button.classList.remove('text-yellow-400');
        }
    }

    // Destination tab switching
    function switchTab(tabId) {
        // Hide all panes
        document.querySelectorAll('.tab-pane').forEach(pane => {
            pane.classList.add('hidden');
            pane.classList.add('opacity-0');
        });
        
        // Show active pane
        const activePane = document.getElementById('tab-' + tabId);
        if(activePane) {
            activePane.classList.remove('hidden');
            setTimeout(() => activePane.classList.remove('opacity-0'), 10);
        }
        
        // Toggle tab button states
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.className = "tab-btn px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium";
        });
        
        const activeBtn = document.querySelector(`[data-tab="${tabId}"]`);
        if(activeBtn) {
            activeBtn.className = "tab-btn px-6 py-2.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 hover:bg-emerald-500/30 transition text-sm font-medium";
        }
    }

    // --- AI Chatbot Logic ---
    const chatWindow = document.getElementById('ai-chat-window');
    const aiInput = document.getElementById('ai-input');
    const sendBtn = document.getElementById('ai-send-btn');
    const suggestionsContainer = document.getElementById('ai-suggestions');

    // Suggested starter questions
    const starterQuestions = [
        "What is the best time to visit Sri Lanka?",
        "Do I need a visa for Sri Lanka?",
        "What is included in Zenora packages?",
        "How does the booking process work?",
        "What is the cancellation policy?",
        "Is Sri Lanka safe for tourists?",
        "Are flights included in the tour price?",
        "What to see in Sigiriya?",
        "How do I get a quote?",
        "What should I pack for Nuwara Eliya?",
    ];

    // CSRF token from Laravel meta tag (or fallback from cookie)
    function getCsrfToken() {
        const meta = document.querySelector('meta[name="csrf-token"]');
        if (meta) return meta.getAttribute('content');
        const match = document.cookie.match(/XSRF-TOKEN=([^;]+)/);
        return match ? decodeURIComponent(match[1]) : '';
    }

    // Load 2 random starter suggestions
    function loadRandomSuggestions() {
        suggestionsContainer.innerHTML = '';
        const shuffled = [...starterQuestions].sort(() => 0.5 - Math.random());
        shuffled.slice(0, 2).forEach(q => {
            const btn = document.createElement('button');
            btn.className = "bg-white/5 border border-white/10 hover:bg-white/10 hover:text-yellow-400 text-[10px] text-emerald-100/70 px-3 py-1.5 rounded-full transition text-left";
            btn.innerText = q;
            btn.onclick = () => processUserMessage(q);
            suggestionsContainer.appendChild(btn);
        });
    }

    // Render plain text safely (convert **bold** and newlines)
    function renderText(text) {
        return text
            .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\n/g, '<br>');
    }

    // Append a chat bubble
    function appendMessage(text, isUser = false) {
        const msgDiv = document.createElement('div');
        msgDiv.className = `flex gap-2 w-full ${isUser ? 'justify-end' : ''}`;
        const bubbleClass = isUser
            ? "bg-emerald-500/20 border border-emerald-500/30 text-white rounded-2xl rounded-tr-none p-3 max-w-[85%] backdrop-blur text-sm"
            : "bg-white/10 border border-white/5 text-emerald-50 rounded-2xl rounded-tl-none p-3 max-w-[85%] backdrop-blur text-sm";
        msgDiv.innerHTML = `<div class="${bubbleClass}">${isUser ? renderText(text) : text}</div>`;
        chatWindow.appendChild(msgDiv);
        chatWindow.scrollTop = chatWindow.scrollHeight;
        return msgDiv;
    }

    // Show an animated typing indicator
    function showTypingIndicator() {
        const msgDiv = document.createElement('div');
        msgDiv.id = 'typing-indicator';
        msgDiv.className = 'flex gap-2 w-full';
        msgDiv.innerHTML = `
            <div class="bg-white/10 border border-white/5 text-emerald-50 rounded-2xl rounded-tl-none p-3 max-w-[85%] backdrop-blur">
                <div class="flex gap-1.5 items-center h-4">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-bounce" style="animation-delay:0s"></span>
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-bounce" style="animation-delay:0.15s"></span>
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-bounce" style="animation-delay:0.3s"></span>
                </div>
            </div>`;
        chatWindow.appendChild(msgDiv);
        chatWindow.scrollTop = chatWindow.scrollHeight;
    }

    function removeTypingIndicator() {
        const el = document.getElementById('typing-indicator');
        if (el) el.remove();
    }

    // Disable/enable send button
    function setLoading(loading) {
        sendBtn.disabled = loading;
        sendBtn.innerHTML = loading
            ? `<svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>`
            : `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>`;
    }

    // Core: send message to backend /ai-chat endpoint
    async function processUserMessage(question) {
        if (!question.trim()) return;
        suggestionsContainer.innerHTML = '';
        appendMessage(question, true);
        aiInput.value = '';
        setLoading(true);
        showTypingIndicator();

        try {
            const res = await fetch('/ai-chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken(),
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ message: question }),
            });

            removeTypingIndicator();

            if (!res.ok) throw new Error('Server error ' + res.status);
            const data = await res.json();
            appendMessage(renderText(data.reply || 'Sorry, I couldn\'t get a response. Please try again! 😊'));
        } catch (err) {
            removeTypingIndicator();
            appendMessage('⚠️ Could not connect to the AI. Please try again or contact us at <strong>hello@zenoratravels.com</strong>');
        } finally {
            setLoading(false);
            setTimeout(loadRandomSuggestions, 1200);
        }
    }

    // Event listeners
    sendBtn.addEventListener('click', () => processUserMessage(aiInput.value));
    aiInput.addEventListener('keypress', e => { if (e.key === 'Enter') processUserMessage(aiInput.value); });

    // Initialize
    loadRandomSuggestions();

</script>
@endsection