<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenora Travels | Discover the Soul of Sri Lanka</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-white relative">

    <nav class="fixed top-0 left-0 right-0 z-50 p-6 px-6 lg:px-10 pointer-events-none">
        <header class="mx-auto max-w-7xl glass-panel shine-border flex items-center justify-between rounded-full px-5 py-4 text-sm text-emerald-50 shadow-2xl pointer-events-auto">
            <div>
                <a href="/">
                    <p class="text-lg font-semibold tracking-[0.24em] text-white uppercase hover:text-yellow-400 transition cursor-pointer">
                        Zenora Travels
                    </p>
                </a>
            </div>
            <div class="hidden gap-8 md:flex">
                <a href="/destinations" class="transition hover:text-yellow-400 {{ request()->is('destinations') ? 'font-semibold text-yellow-400' : '' }}">Destinations</a>
                <a href="/tours" class="transition hover:text-yellow-400 {{ request()->is('tours*') ? 'font-semibold text-yellow-400' : '' }}">Holidays & Tours</a>
                <a href="/#services" class="transition hover:text-yellow-400">Services</a>
                <a href="/faq" class="transition hover:text-yellow-400 {{ request()->is('faq') ? 'font-semibold text-yellow-400' : '' }}">FAQ</a>
                <a href="/contact" class="transition hover:text-yellow-400 {{ request()->is('contact') ? 'font-semibold text-yellow-400' : '' }}">Contact</a>
            </div>
            <div class="flex items-center gap-4">
                <div id="google_translate_element"></div>
                <select id="custom_lang_select" class="bg-white/10 border border-white/20 text-white text-sm rounded-full px-3 py-2 outline-none focus:border-yellow-400 cursor-pointer appearance-none pr-8 relative hover:bg-white/20 transition backdrop-blur-md" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23FFFFFF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 0.7rem top 50%; background-size: 0.65rem auto;">
                    <option value="en" class="bg-emerald-950 text-white">English</option>
                    <option value="fr" class="bg-emerald-950 text-white">French</option>
                    <option value="de" class="bg-emerald-950 text-white">German</option>
                    <option value="it" class="bg-emerald-950 text-white">Italian</option>
                    <option value="es" class="bg-emerald-950 text-white">Spanish</option>
                    <option value="ru" class="bg-emerald-950 text-white">Russian</option>
                    <option value="zh-CN" class="bg-emerald-950 text-white">Chinese</option>
                    <option value="ja" class="bg-emerald-950 text-white">Japanese</option>
                    <option value="fi" class="bg-emerald-950 text-white">Finnish</option>
                </select>
                <a href="/contact" class="rounded-full bg-white px-4 py-2 font-medium text-emerald-950 transition hover:scale-[1.03] cursor-pointer">
                    Plan Trip
                </a>
            </div>
        </header>
    </nav>
    @yield('content')

    <!-- Footer Section -->
    <footer class="relative mt-20 border-t border-emerald-500/20 bg-[#020a05]/80 backdrop-blur-xl pt-16 pb-8 z-10">
        
        <!-- Decorative Glows -->
        <div class="absolute top-0 left-1/4 w-96 h-px bg-gradient-to-r from-transparent via-yellow-400/50 to-transparent"></div>
        <div class="absolute -top-10 right-1/4 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="mx-auto max-w-7xl px-6 lg:px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-16">
                
                <!-- Column 1: Brand & About -->
                <div class="flex flex-col gap-6">
                    <a href="/" class="inline-block">
                        <p class="text-xl font-bold tracking-[0.2em] text-white uppercase">
                            Zenora Travels
                        </p>
                    </a>
                    <p class="text-sm text-emerald-100/60 leading-relaxed">
                        {{ $siteSettings->footer_about_text ?? "We create meaningful experiences and lifelong memories across Sri Lanka. Local expertise, personalized service, and a passion for adventure — that's Zenora Travels." }}
                    </p>
                    <!-- Social Links -->
                    <div class="flex items-center gap-4 mt-2">
                        @if(!empty($siteSettings->social_twitter) && $siteSettings->social_twitter !== '#')
                        <a href="{{ $siteSettings->social_twitter }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-emerald-100/80 hover:text-yellow-400 hover:border-yellow-400/50 hover:bg-yellow-400/10 transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        @endif
                        @if(!empty($siteSettings->social_instagram) && $siteSettings->social_instagram !== '#')
                        <a href="{{ $siteSettings->social_instagram }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-emerald-100/80 hover:text-yellow-400 hover:border-yellow-400/50 hover:bg-yellow-400/10 transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        @endif
                        @if(!empty($siteSettings->social_linkedin) && $siteSettings->social_linkedin !== '#')
                        <a href="{{ $siteSettings->social_linkedin }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-emerald-100/80 hover:text-yellow-400 hover:border-yellow-400/50 hover:bg-yellow-400/10 transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.597 0 0 .597 0 1.325v21.351C0 23.403.597 24 1.325 24h11.495v-9.294H9.691v-3.622h3.129V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.323-.597 1.323-1.325V1.325C24 .597 23.403 0 22.675 0z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-wider text-emerald-400">Quick Links</h4>
                    <ul class="flex flex-col gap-3 text-sm text-emerald-100/60">
                        <li><a href="/" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">Home</a></li>
                        <li><a href="/tours" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">Holidays & Tours</a></li>
                        <li><a href="/#destinations" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">Destinations</a></li>
                        <li><a href="/#services" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">Our Services</a></li>
                        <li><a href="/faq" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">FAQ</a></li>
                        <li><a href="#contact" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Column 3: Top Destinations -->
                <div>
                    <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-wider text-emerald-400">Top Destinations</h4>
                    <ul class="flex flex-col gap-3 text-sm text-emerald-100/60">
                        <li><a href="#" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">Anuradhapura & Polonnaruwa</a></li>
                        <li><a href="#" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">Sigiriya Rock Citadel</a></li>
                        <li><a href="#" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">Kandy & Nuwara Eliya</a></li>
                        <li><a href="#" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">Yala National Park</a></li>
                        <li><a href="#" class="hover:text-yellow-400 hover:translate-x-1 inline-block transition-transform">Southern Coastal Beaches</a></li>
                    </ul>
                </div>

                <!-- Column 4: Newsletter & Contact -->
                <div>
                    <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-wider text-emerald-400">Stay Updated</h4>
                    <p class="text-xs text-emerald-100/60 mb-4 leading-relaxed">Subscribe to our newsletter for exclusive tour offers and travel inspiration.</p>
                    
                    <form action="#" class="flex gap-2 mb-6">
                        <input type="email" placeholder="Your email address" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-400 text-xs transition-colors">
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-emerald-950 px-4 rounded-lg font-bold transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </form>

                    <div class="flex flex-col gap-2 text-xs text-emerald-100/60">
                        <p class="flex items-center gap-2 hover:text-white transition-colors cursor-pointer">
                            <span>📞</span> <a href="tel:{{ preg_replace('/[^0-9+]/', '', $siteSettings->contact_phone ?? '+94 77 123 4567') }}">{{ $siteSettings->contact_phone ?? '+94 77 123 4567' }}</a>
                        </p>
                        <p class="flex items-center gap-2 hover:text-white transition-colors cursor-pointer">
                            <span>✉️</span> <a href="mailto:{{ $siteSettings->contact_email ?? 'hello@zenoratravels.com' }}">{{ $siteSettings->contact_email ?? 'hello@zenoratravels.com' }}</a>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright Bar -->
            <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-emerald-100/40">
                <p>&copy; {{ date('Y') }} Zenora Travels. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-yellow-400 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,fr,de,it,es,ru,zh-CN,ja,fi',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const customSelect = document.getElementById('custom_lang_select');
            
            const changeLanguage = (langValue) => {
                const googleSelect = document.querySelector('#google_translate_element select') || document.querySelector('.goog-te-combo');
                if (googleSelect) {
                    googleSelect.value = langValue;
                    googleSelect.dispatchEvent(new Event('change', { bubbles: true }));
                } else {
                    document.cookie = `googtrans=/en/${langValue}; path=/`;
                    window.location.reload();
                }
            };

            const getCookie = (name) => {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
            }
            
            const googTransCookie = getCookie('googtrans');
            if (googTransCookie) {
                const lang = googTransCookie.split('/')[2];
                if (lang) {
                    customSelect.value = lang;
                }
            }

            customSelect.addEventListener('change', (e) => {
                changeLanguage(e.target.value);
            });

            const observerOptions = { root: null, rootMargin: '0px', threshold: 0.15 };
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        observer.unobserve(entry.target); 
                    }
                });
            }, observerOptions);

            const revealElements = document.querySelectorAll('.reveal-up, .reveal-scale');
            revealElements.forEach(el => observer.observe(el));
            
            setTimeout(() => {
                revealElements.forEach(el => {
                    const rect = el.getBoundingClientRect();
                    if (rect.top < window.innerHeight) { el.classList.add('in-view'); }
                });
            }, 100);
        });
    </script>
</body>
</html>