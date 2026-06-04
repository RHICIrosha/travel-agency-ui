<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sandun Travels | Premium Sri Lankan Travel Experience</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

</head>
<body class="text-white relative">

    <nav class="fixed top-0 left-0 right-0 z-50 p-6 px-6 lg:px-10 pointer-events-none">
        <header class="mx-auto max-w-7xl glass-panel shine-border flex items-center justify-between rounded-full px-5 py-4 text-sm text-emerald-50 shadow-2xl pointer-events-auto">
            <div>
                <a href="/">
                    <p class="text-lg font-semibold tracking-[0.24em] text-white uppercase hover:text-yellow-400 transition cursor-pointer">
                        Sandun Travels
                    </p>
                </a>
            </div>
            <div class="hidden gap-8 md:flex">
         <a href="/#destinations" class="transition hover:text-yellow-400 {{ request()->is('destinations') ? 'font-semibold text-yellow-400' : '' }}">Destinations</a>
            <a href="/tours" class="transition hover:text-yellow-400 {{ request()->is('tours') ? 'font-semibold text-yellow-400' : '' }}">Holidays & Tours</a>
            <a href="/#services" class="transition hover:text-yellow-400 {{ request()->is('services') ? 'font-semibold text-yellow-400' : '' }}">Services</a>
            <a href="/#contact" class="transition hover:text-yellow-400 {{ request()->is('contact') ? 'font-semibold text-yellow-400' : '' }}">Contact</a>
            </div>
            <a href="#contact" class="rounded-full bg-white px-4 py-2 font-medium text-emerald-950 transition hover:scale-[1.03] cursor-pointer">
                Plan Trip
            </a>
        </header>
    </nav>

    @yield('content')

    

    <script>
        document.addEventListener("DOMContentLoaded", () => {
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