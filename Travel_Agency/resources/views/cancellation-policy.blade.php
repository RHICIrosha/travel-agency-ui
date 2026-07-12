@extends('layouts.app')

@section('content')
<style>
/* ── Legal page base (Orange Theme) ───────────────────────── */
.legal-hero {
    background: linear-gradient(135deg, rgba(251,146,60,.06) 0%, rgba(250,204,21,.04) 100%);
    border-bottom: 1px solid rgba(255,255,255,.07);
}
.legal-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(251,146,60,.1); border: 1px solid rgba(251,146,60,.25);
    border-radius: 99px; padding: 6px 16px;
    font-size: .72rem; font-weight: 700; letter-spacing: .12em;
    text-transform: uppercase; color: #fb923c;
}
.toc-card {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 1.25rem;
    padding: 1.5rem;
    position: sticky; top: 7rem;
}
.toc-link {
    display: flex; align-items: center; gap: 8px;
    padding: 8px 10px; border-radius: .6rem;
    font-size: .8rem; color: rgba(255,255,255,.5);
    text-decoration: none; transition: all .2s;
}
.toc-link:hover { color: #fff; background: rgba(255,255,255,.06); }
.toc-link.active { color: #fb923c; background: rgba(251,146,60,.08); }

/* ── Section cards ────────────────────────────────────── */
.section-card {
    background: rgba(255,255,255,.03);
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 1.5rem;
    padding: 2.25rem;
    transition: border-color .3s;
    scroll-margin-top: 8rem;
}
.section-card:hover { border-color: rgba(251,146,60,.2); }
.section-card h2 {
    font-size: 1.2rem; font-weight: 700; color: #fff;
    display: flex; align-items: center; gap: 10px; margin-bottom: 1rem;
}
.section-icon {
    width: 36px; height: 36px; border-radius: 10px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    background: rgba(251,146,60,.12); border: 1px solid rgba(251,146,60,.2);
    font-size: 1rem;
}
.section-card p {
    color: rgba(255,255,255,.6); font-size: .875rem; line-height: 1.85;
    margin-bottom: .85rem;
}
.section-card p:last-child { margin-bottom: 0; }
.section-card ul {
    list-style: none; padding: 0; margin: 0 0 .85rem;
    display: flex; flex-direction: column; gap: .5rem;
}
.section-card ul li {
    display: flex; align-items: flex-start; gap: 8px;
    font-size: .875rem; color: rgba(255,255,255,.6); line-height: 1.7;
}
.section-card ul li::before {
    content: '✦';
    color: #fb923c; font-size: .65rem; margin-top: 5px; flex-shrink: 0;
}
.highlight-box {
    background: rgba(251,146,60,.06); border: 1px solid rgba(251,146,60,.18);
    border-radius: 1rem; padding: 1rem 1.25rem; margin: 1rem 0;
    font-size: .8rem; color: rgba(255,255,255,.65); line-height: 1.7;
}
.highlight-box strong { color: #fb923c; }
.warning-box {
    background: rgba(239,68,68,.06); border: 1px solid rgba(239,68,68,.18);
    border-radius: 1rem; padding: 1rem 1.25rem; margin: 1rem 0;
    font-size: .8rem; color: rgba(255,255,255,.6); line-height: 1.7;
}
.warning-box strong { color: #ef4444; }
.safe-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(251,146,60,.1); border: 1px solid rgba(251,146,60,.2);
    border-radius: 99px; padding: 5px 12px;
    font-size: .75rem; color: #fb923c; font-weight: 600;
}
</style>

<div class="legal-hero pt-32 pb-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-xs text-white/35 mb-8">
            <a href="/" class="hover:text-yellow-400 transition">Home</a>
            <svg class="w-3 h-3 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-white/60">Cancellation Policy</span>
        </div>

        <div class="legal-badge mb-6">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            Refunds & Cancellations
        </div>

        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Cancellation Policy</h1>
        <p class="text-white/50 text-sm max-w-2xl leading-relaxed mb-6">
            If you need to cancel your booking, please review the following cancellation terms carefully. These policies govern refunds, deposits, and change requests.
        </p>
        <div class="flex flex-wrap items-center gap-3">
            <span class="safe-badge">📋 Last updated: {{ date('d F Y') }}</span>
            <span class="safe-badge">🌍 Jurisdiction: Sri Lanka</span>
        </div>
    </div>
</div>

<main class="mx-auto max-w-7xl px-6 lg:px-10 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-[260px_1fr] gap-12">

        {{-- Table of Contents --}}
        <aside>
            <div class="toc-card">
                <p class="text-xs font-bold uppercase tracking-widest text-white/35 mb-4">Contents</p>
                <nav class="flex flex-col gap-1">
                    <a href="#more-than-30-days"    class="toc-link"><span class="text-orange-400">01</span> Cancellation > 30 Days</a>
                    <a href="#within-30-days"       class="toc-link"><span class="text-orange-400">02</span> Cancellation ≤ 30 Days</a>
                    <a href="#non-refundable"       class="toc-link"><span class="text-orange-400">03</span> Non-Refundable Deposit</a>
                    <a href="#no-show"              class="toc-link"><span class="text-orange-400">04</span> No-Show Policy</a>
                    <a href="#changes"              class="toc-link"><span class="text-orange-400">05</span> Changes to Bookings</a>
                    <a href="#refund-processing"    class="toc-link"><span class="text-orange-400">06</span> Refund Processing</a>
                    <a href="#zenora-cancellation"  class="toc-link"><span class="text-orange-400">07</span> Cancelled by Zenora</a>
                    <a href="#force-majeure"        class="toc-link"><span class="text-orange-400">08</span> Force Majeure</a>
                </nav>
                <div class="mt-6 pt-5 border-t border-white/8">
                    <a href="/terms" class="text-xs text-white/35 hover:text-orange-400 transition flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        Terms of Service
                    </a>
                </div>
            </div>
        </aside>

        {{-- Policy Sections --}}
        <div class="flex flex-col gap-6">

            <div class="section-card" id="more-than-30-days">
                <h2><span class="section-icon">🗓️</span> 1. Cancellation More Than 30 Days Before Departure</h2>
                <p>Bookings cancelled more than 30 days before the tour departure date are eligible for a <strong>70% refund</strong> of the total tour cost.</p>
                <div class="highlight-box">
                    <strong>Refund Summary:</strong> You receive a 70% refund of the total booking price, while the remaining 30% is retained to cover non-refundable deposits and administration fees.
                </div>
            </div>

            <div class="section-card" id="within-30-days">
                <h2><span class="section-icon">⏳</span> 2. Cancellation Within 30 Days of Departure</h2>
                <p>Bookings cancelled 30 days or less before the departure date are <strong>non-refundable</strong>, unless otherwise stated in your booking confirmation.</p>
                <div class="warning-box">
                    <strong>Important:</strong> Cancellations made inside the 30-day window are non-refundable as third-party providers (hotels, transport, activities) have already committed resources.
                </div>
            </div>

            <div class="section-card" id="non-refundable">
                <h2><span class="section-icon">💳</span> 3. Non-Refundable Booking Deposit</h2>
                <p>A <strong>30% deposit</strong> is required to confirm every booking.</p>
                <p>This deposit is <strong>non-refundable</strong> in the event of cancellation, as it is used immediately to secure hotels, transport, and other travel arrangements on your behalf.</p>
            </div>

            <div class="section-card" id="no-show">
                <h2><span class="section-icon">🚶</span> 4. No-Show Policy</h2>
                <p>Failure to arrive or participate in the booked tour without prior written notice will be treated as a <strong>No-Show</strong>.</p>
                <p>In this event, no refund will be provided, and all booking payments will be forfeited.</p>
            </div>

            <div class="section-card" id="changes">
                <h2><span class="section-icon">🔄</span> 5. Changes to Bookings</h2>
                <p>Requests to change travel dates or tour arrangements are subject to availability and may incur additional charges from suppliers.</p>
                <p>Zenora Travels will make every reasonable effort to accommodate changes where possible, but cannot guarantee availability or avoid third-party pricing adjustments.</p>
            </div>

            <div class="section-card" id="refund-processing">
                <h2><span class="section-icon">⏱️</span> 6. Refund Processing</h2>
                <p>Approved refunds will be processed within <strong>14–21 business days</strong> after confirmation of the cancellation.</p>
                <p>Processing times may vary depending on the payment method and your financial institution.</p>
            </div>

            <div class="section-card" id="zenora-cancellation">
                <h2><span class="section-icon">🛡️</span> 7. Cancellation by Zenora Travels</h2>
                <p>In the unlikely event that Zenora Travels cancels a tour due to unforeseen circumstances, operational requirements, or force majeure, customers will be offered either:</p>
                <ul>
                    <li>A full refund of the amount paid to Zenora Travels (excluding non-refundable third-party costs), or</li>
                    <li>An alternative tour or travel date of equal value.</li>
                </ul>
            </div>

            <div class="section-card" id="force-majeure">
                <h2><span class="section-icon">🌋</span> 8. Force Majeure</h2>
                <p>Zenora Travels shall not be held liable for cancellations, delays, or itinerary changes caused by events beyond our reasonable control, including but not limited to:</p>
                <ul>
                    <li>Natural disasters or severe weather events</li>
                    <li>Government restrictions or political unrest</li>
                    <li>Pandemics, strikes, or airline operational issues</li>
                </ul>
            </div>

            {{-- Closing Note --}}
            <div class="bg-white/5 rounded-2xl p-6 md:p-8 border border-white/10 mt-6 text-center max-w-3xl mx-auto">
                <h3 class="text-white font-bold mb-3 text-lg">Thank you for choosing Zenora Travels</h3>
                <p class="text-white/60 text-sm leading-relaxed mb-6">
                    We appreciate your understanding and cooperation. If you have any questions regarding your booking or our cancellation policy, please contact our customer support team before making a cancellation request.
                </p>
                <div class="flex justify-center">
                    <a href="/contact" class="px-6 py-2.5 bg-orange-500 hover:bg-orange-600 text-white rounded-full font-semibold transition text-sm">
                        Contact Support
                    </a>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
// Smooth scroll & TOC Active highlight logic
document.addEventListener("DOMContentLoaded", () => {
    const observerOptions = {
        root: null,
        rootMargin: "-20% 0px -60% 0px",
        threshold: 0
    };

    const tocLinks = document.querySelectorAll(".toc-link");
    const sections = document.querySelectorAll(".section-card");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute("id");
                tocLinks.forEach(link => {
                    if (link.getAttribute("href") === `#${id}`) {
                        link.classList.add("active");
                    } else {
                        link.classList.remove("active");
                    }
                });
            }
        });
    }, observerOptions);

    sections.forEach(section => observer.observe(section));
});
</script>
@endsection
