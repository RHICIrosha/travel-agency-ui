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
            Welcome to Sandun Travels! We're excited to have you with us. For any questions you may have, please explore our FAQ page where you'll find helpful answers and information.
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
                            Where is Sandun Travels located?
                            <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                            Sandun Travels is located in Sri Lanka, offering premium travel experiences with a dedicated network of local destination experts.
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                        <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                            What are the countries to which I can fly with Sandun travels?
                            <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="px-5 pb-5 text-sm text-emerald-100/70 hidden opacity-0 transition-opacity duration-300">
                            We currently specialize in tailor-made travel connecting you with local experts in places like Sri Lanka, Maldives, Vietnam, Cambodia, Indonesia, Dubai, and Singapore.
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="glass-panel border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                        <button class="w-full text-left p-5 flex justify-between items-center text-white font-semibold hover:text-yellow-400 transition-colors focus:outline-none" onclick="toggleFaq(this)">
                            How do I book a tour with Sandun Travels?
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
                <h2 class="text-2xl font-bold text-white mb-6">Destination Based FAQ</h2>
                <div class="flex flex-wrap gap-3">
                    <button class="px-6 py-2.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 hover:bg-emerald-500/30 transition text-sm font-medium">Sri Lanka</button>
                    <button class="px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium">Vietnam</button>
                    <button class="px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium">Cambodia</button>
                    <button class="px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium">Dubai</button>
                    <button class="px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium">Indonesia</button>
                    <button class="px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium">Maldives</button>
                    <button class="px-6 py-2.5 rounded-full bg-white/5 text-emerald-100/70 border border-white/10 hover:bg-white/10 hover:text-white transition text-sm font-medium">Singapore</button>
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
                        <h3 class="text-white font-bold text-sm">Sandun AI Assistant</h3>
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

            <!-- Get A Quote Form (Sidebar Version) -->
            <div class="glass-panel shine-border rounded-[2rem] p-6 sm:p-8">
                <h3 class="text-xl font-bold text-white mb-2">Get a Quote</h3>
                <p class="text-xs text-emerald-100/60 mb-6">Our dedicated team of local experts are available 24/7, ready to provide assistance whenever you need it.</p>
                
                <form action="#" method="POST" class="flex flex-col gap-4 text-sm text-white">
                    @csrf
                    <div>
                        <input type="text" placeholder="Full Name" required class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-400 text-xs transition">
                    </div>
                    <div>
                        <input type="email" placeholder="Email Address" required class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-400 text-xs transition">
                    </div>
                    <div>
                        <select class="w-full bg-emerald-950 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-400 text-xs cursor-pointer transition">
                            <option value="" disabled selected>Select a Destination</option>
                            <option value="srilanka">Sri Lanka</option>
                            <option value="maldives">Maldives</option>
                            <option value="vietnam">Vietnam</option>
                            <option value="indonesia">Indonesia</option>
                            <option value="dubai">Dubai</option>
                            <option value="cambodia">Cambodia</option>
                            <option value="singapore">Singapore</option>
                        </select>
                    </div>
                    <div>
                        <input type="tel" required placeholder="Phone Number" class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-400 text-xs transition">
                    </div>
                    
                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3.5 rounded-full transition mt-2 text-xs uppercase tracking-wider shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                        Get Personalised Quote
                    </button>
                    <p class="text-[10px] text-emerald-100/40 text-center mt-1">We guarantee that your information will not be shared with any third parties.</p>
                </form>
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

    // --- AI Chatbot Logic ---
    const chatWindow = document.getElementById('ai-chat-window');
    const aiInput = document.getElementById('ai-input');
    const sendBtn = document.getElementById('ai-send-btn');
    const suggestionsContainer = document.getElementById('ai-suggestions');

    // Database of random questions and dummy answers
    const botDatabase = [
        { q: "Do I need a Visa for Sri Lanka?", a: "Yes, travelers to Sri Lanka must apply for an Electronic Travel Authorization (ETA) online before arrival." },
        { q: "What is the best time to visit?", a: "Sri Lanka is a year-round destination! The West and South coasts are best from December to March, while the East coast is best from May to September." },
        { q: "Are flights included?", a: "International flights are not included in our base packages, allowing you the flexibility to choose your preferred airline and schedule." },
        { q: "Is it safe to travel?", a: "Yes, our destinations are very safe for tourists. Your dedicated guide will also ensure a secure and comfortable journey." },
        { q: "Do you offer vegetarian food?", a: "Absolutely! We can cater to vegetarian, vegan, halal, and gluten-free dietary requirements. Just let us know!" }
    ];

    // Function to pick 2 random suggestions
    function loadRandomSuggestions() {
        suggestionsContainer.innerHTML = '';
        const shuffled = [...botDatabase].sort(() => 0.5 - Math.random());
        let selected = shuffled.slice(0, 2);
        
        selected.forEach(item => {
            const btn = document.createElement('button');
            btn.className = "bg-white/5 border border-white/10 hover:bg-white/10 hover:text-yellow-400 text-[10px] text-emerald-100/70 px-3 py-1.5 rounded-full transition text-left";
            btn.innerText = item.q;
            btn.onclick = () => processUserMessage(item.q, item.a);
            suggestionsContainer.appendChild(btn);
        });
    }

    // Add message to chat
    function appendMessage(text, isUser = false) {
        const msgDiv = document.createElement('div');
        msgDiv.className = `flex gap-2 w-full ${isUser ? 'justify-end' : ''}`;
        
        const bubbleClass = isUser 
            ? "bg-emerald-500/20 border border-emerald-500/30 text-white rounded-2xl rounded-tr-none p-3 max-w-[85%] backdrop-blur" 
            : "bg-white/10 border border-white/5 text-emerald-50 rounded-2xl rounded-tl-none p-3 max-w-[85%] backdrop-blur";
            
        msgDiv.innerHTML = `<div class="${bubbleClass}">${text}</div>`;
        chatWindow.appendChild(msgDiv);
        chatWindow.scrollTop = chatWindow.scrollHeight;
    }

    // Process a message
    function processUserMessage(question, predefinedAnswer = null) {
        if(!question.trim()) return;
        
        // Hide suggestions immediately after clicking one
        suggestionsContainer.innerHTML = '';
        
        appendMessage(question, true);
        aiInput.value = '';

        // Simulate typing delay
        setTimeout(() => {
            if (predefinedAnswer) {
                appendMessage(predefinedAnswer);
            } else {
                appendMessage("Thanks for your question! A destination expert will be able to give you specific details on that if you fill out the quote form below.");
            }
            // Load new suggestions after answering
            setTimeout(loadRandomSuggestions, 1000);
        }, 800);
    }

    // Event Listeners
    sendBtn.addEventListener('click', () => {
        processUserMessage(aiInput.value);
    });

    aiInput.addEventListener('keypress', (e) => {
        if(e.key === 'Enter') processUserMessage(aiInput.value);
    });

    // Initialize
    loadRandomSuggestions();
</script>
@endsection