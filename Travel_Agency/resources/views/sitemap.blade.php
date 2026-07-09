@extends('layouts.app')

@section('content')
<style>
.legal-hero {
    background: linear-gradient(135deg, rgba(96,165,250,.05) 0%, rgba(52,211,153,.04) 100%);
    border-bottom: 1px solid rgba(255,255,255,.07);
}
.legal-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(96,165,250,.1); border: 1px solid rgba(96,165,250,.25);
    border-radius: 99px; padding: 6px 16px;
    font-size: .72rem; font-weight: 700; letter-spacing: .12em;
    text-transform: uppercase; color: #93c5fd;
}
.sitemap-section { margin-bottom: 2.5rem; }
.sitemap-section-title {
    display: flex; align-items: center; gap: 10px;
    font-size: .7rem; font-weight: 800; letter-spacing: .14em;
    text-transform: uppercase; color: rgba(255,255,255,.35);
    margin-bottom: 1rem; padding-bottom: .75rem;
    border-bottom: 1px solid rgba(255,255,255,.07);
}
.sitemap-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: .75rem;
}
.sitemap-link {
    display: flex; align-items: center; gap: 10px;
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 1rem; padding: 1rem 1.1rem;
    text-decoration: none; transition: all .25s;
    group: true;
}
.sitemap-link:hover {
    background: rgba(255,255,255,.08);
    border-color: rgba(52,211,153,.25);
    transform: translateY(-2px);
    box-shadow: 0 8px 32px rgba(0,0,0,.25);
}
.sitemap-link-icon {
    width: 36px; height: 36px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; font-size: 1.1rem;
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.09);
    transition: background .25s;
}
.sitemap-link:hover .sitemap-link-icon {
    background: rgba(52,211,153,.12);
    border-color: rgba(52,211,153,.2);
}
.sitemap-link-text strong {
    display: block; font-size: .82rem; font-weight: 600; color: rgba(255,255,255,.85);
    transition: color .2s;
}
.sitemap-link:hover .sitemap-link-text strong { color: #fff; }
.sitemap-link-text span { font-size: .72rem; color: rgba(255,255,255,.35); line-height: 1.4; }

/* Highlight links */
.sitemap-link.featured {
    background: linear-gradient(135deg, rgba(52,211,153,.08), rgba(250,204,21,.04));
    border-color: rgba(52,211,153,.15);
}
.sitemap-link.featured .sitemap-link-icon { background: rgba(52,211,153,.15); border-color: rgba(52,211,153,.25); }

/* Info panel */
.info-panel {
    background: rgba(255,255,255,.03);
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 1.5rem; padding: 2rem;
}
.search-bar {
    background: rgba(255,255,255,.06);
    border: 1.5px solid rgba(255,255,255,.12);
    border-radius: 99px; padding: 10px 20px;
    display: flex; align-items: center; gap: 10px;
    max-width: 420px; width: 100%;
    transition: border-color .2s;
}
.search-bar:focus-within { border-color: #34d399; }
.search-bar input {
    background: none; border: none; outline: none;
    color: #fff; font-size: .875rem; flex: 1;
}
.search-bar input::placeholder { color: rgba(255,255,255,.3); }
</style>

<div class="legal-hero pt-32 pb-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">

        <div class="flex items-center gap-2 text-xs text-white/35 mb-8">
            <a href="/" class="hover:text-yellow-400 transition">Home</a>
            <svg class="w-3 h-3 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-white/60">Sitemap</span>
        </div>

        <div class="legal-badge mb-6">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
            Website Navigation
        </div>

        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Sitemap</h1>
        <p class="text-white/50 text-sm max-w-2xl leading-relaxed mb-8">
            A complete overview of all pages on the Zenora Travels website. Find exactly what you're looking for quickly and easily.
        </p>

        {{-- Search bar --}}
        <div class="search-bar">
            <svg class="w-4 h-4 text-white/30 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" id="sitemap-search" placeholder="Search pages…" oninput="filterSitemap(this.value)">
            <button onclick="document.getElementById('sitemap-search').value='';filterSitemap('')" class="text-white/25 hover:text-white transition text-sm leading-none">✕</button>
        </div>
    </div>
</div>

<main class="mx-auto max-w-7xl px-6 lg:px-10 py-16">

    <div id="no-page-results" class="hidden text-center py-16">
        <div class="text-5xl mb-4">🔍</div>
        <p class="text-white font-semibold">No pages found</p>
        <p class="text-white/40 text-sm mt-2">Try a different search term</p>
    </div>

    {{-- ── MAIN PAGES ── --}}
    <div class="sitemap-section" data-group="main">
        <div class="sitemap-section-title">
            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Main Pages
        </div>
        <div class="sitemap-grid">
            <a href="/" class="sitemap-link featured" data-name="home homepage">
                <div class="sitemap-link-icon">🏠</div>
                <div class="sitemap-link-text">
                    <strong>Home</strong>
                    <span>Main landing page</span>
                </div>
            </a>
            <a href="/destinations" class="sitemap-link" data-name="destinations places">
                <div class="sitemap-link-icon">🗺️</div>
                <div class="sitemap-link-text">
                    <strong>Destinations</strong>
                    <span>Explore Sri Lanka</span>
                </div>
            </a>
            <a href="/tours" class="sitemap-link featured" data-name="tours holidays packages">
                <div class="sitemap-link-icon">✈️</div>
                <div class="sitemap-link-text">
                    <strong>Holidays & Tours</strong>
                    <span>All tour packages</span>
                </div>
            </a>
            <a href="/faq" class="sitemap-link" data-name="faq questions help">
                <div class="sitemap-link-icon">❓</div>
                <div class="sitemap-link-text">
                    <strong>FAQ</strong>
                    <span>Frequently asked questions</span>
                </div>
            </a>
            <a href="/contact" class="sitemap-link" data-name="contact enquiry plan trip">
                <div class="sitemap-link-icon">📞</div>
                <div class="sitemap-link-text">
                    <strong>Contact Us</strong>
                    <span>Get in touch / plan a trip</span>
                </div>
            </a>
            <a href="/reviews" class="sitemap-link" data-name="reviews testimonials">
                <div class="sitemap-link-icon">⭐</div>
                <div class="sitemap-link-text">
                    <strong>Reviews</strong>
                    <span>Traveller stories</span>
                </div>
            </a>
        </div>
    </div>

    {{-- ── HOMEPAGE SECTIONS ── --}}
    <div class="sitemap-section" data-group="sections">
        <div class="sitemap-section-title">
            <svg class="w-4 h-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
            Homepage Sections
        </div>
        <div class="sitemap-grid">
            <a href="/#hero" class="sitemap-link" data-name="hero banner">
                <div class="sitemap-link-icon">🌄</div>
                <div class="sitemap-link-text">
                    <strong>Hero Banner</strong>
                    <span>Main intro section</span>
                </div>
            </a>
            <a href="/#destinations" class="sitemap-link" data-name="featured destinations">
                <div class="sitemap-link-icon">📍</div>
                <div class="sitemap-link-text">
                    <strong>Featured Destinations</strong>
                    <span>Highlighted locations</span>
                </div>
            </a>
            <a href="/#services" class="sitemap-link" data-name="services what we offer">
                <div class="sitemap-link-icon">🎯</div>
                <div class="sitemap-link-text">
                    <strong>Our Services</strong>
                    <span>What Zenora offers</span>
                </div>
            </a>
            <a href="/#about" class="sitemap-link" data-name="about us story">
                <div class="sitemap-link-icon">👥</div>
                <div class="sitemap-link-text">
                    <strong>About Us</strong>
                    <span>Our story & team</span>
                </div>
            </a>
            <a href="/#why-us" class="sitemap-link" data-name="why choose us promises">
                <div class="sitemap-link-icon">💎</div>
                <div class="sitemap-link-text">
                    <strong>Why Choose Us</strong>
                    <span>Our promise to you</span>
                </div>
            </a>
        </div>
    </div>

    {{-- ── LEGAL PAGES ── --}}
    <div class="sitemap-section" data-group="legal">
        <div class="sitemap-section-title">
            <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            Legal & Policies
        </div>
        <div class="sitemap-grid">
            <a href="/privacy" class="sitemap-link" data-name="privacy policy data protection">
                <div class="sitemap-link-icon">🔒</div>
                <div class="sitemap-link-text">
                    <strong>Privacy Policy</strong>
                    <span>Data protection & rights</span>
                </div>
            </a>
            <a href="/terms" class="sitemap-link" data-name="terms service conditions agreement">
                <div class="sitemap-link-icon">📋</div>
                <div class="sitemap-link-text">
                    <strong>Terms of Service</strong>
                    <span>Legal agreement & conditions</span>
                </div>
            </a>
            <a href="/sitemap" class="sitemap-link" data-name="sitemap navigation">
                <div class="sitemap-link-icon">🗂️</div>
                <div class="sitemap-link-text">
                    <strong>Sitemap</strong>
                    <span>This page</span>
                </div>
            </a>
        </div>
    </div>

    {{-- ── QUICK ACTIONS ── --}}
    <div class="info-panel mt-6">
        <div class="flex flex-wrap items-center justify-between gap-6">
            <div>
                <h3 class="text-white font-bold mb-1">Can't find what you're looking for?</h3>
                <p class="text-white/45 text-sm">Our team is happy to help you navigate to the right place.</p>
            </div>
            <div class="flex gap-3 flex-wrap">
                <a href="/contact"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-yellow-400 text-emerald-950 font-bold rounded-full text-sm hover:scale-105 transition-all">
                    📩 Contact Us
                </a>
                <a href="/"
                   class="inline-flex items-center gap-2 px-5 py-2.5 border border-white/15 text-white rounded-full text-sm hover:border-white/35 transition-all">
                    ← Back to Home
                </a>
            </div>
        </div>
    </div>

</main>

<script>
function filterSitemap(query) {
    const q = query.toLowerCase().trim();
    let hasResults = false;

    document.querySelectorAll('.sitemap-link').forEach(link => {
        const name = (link.dataset.name || '') + ' ' + (link.querySelector('strong')?.textContent || '') + ' ' + (link.querySelector('span')?.textContent || '');
        const matches = !q || name.toLowerCase().includes(q);
        link.style.display = matches ? '' : 'none';
        if (matches) hasResults = true;
    });

    // Hide empty groups
    document.querySelectorAll('.sitemap-section').forEach(section => {
        const visible = Array.from(section.querySelectorAll('.sitemap-link')).some(l => l.style.display !== 'none');
        section.style.display = !q || visible ? '' : 'none';
    });

    document.getElementById('no-page-results').style.display = q && !hasResults ? 'block' : 'none';
}
</script>
@endsection
