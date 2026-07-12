@extends('layouts.app')

@section('content')
<style>
.legal-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(250,204,21,.1); border: 1px solid rgba(250,204,21,.25);
    border-radius: 99px; padding: 6px 16px;
    font-size: .72rem; font-weight: 700; letter-spacing: .12em;
    text-transform: uppercase; color: #facc15;
}
.legal-hero {
    background: linear-gradient(135deg, rgba(250,204,21,.05) 0%, rgba(52,211,153,.04) 100%);
    border-bottom: 1px solid rgba(255,255,255,.07);
}
.toc-card {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 1.25rem; padding: 1.5rem;
    position: sticky; top: 7rem;
}
.toc-link {
    display: flex; align-items: center; gap: 8px;
    padding: 8px 10px; border-radius: .6rem;
    font-size: .8rem; color: rgba(255,255,255,.5);
    text-decoration: none; transition: all .2s;
}
.toc-link:hover { color: #fff; background: rgba(255,255,255,.06); }
.section-card {
    background: rgba(255,255,255,.03); border: 1px solid rgba(255,255,255,.07);
    border-radius: 1.5rem; padding: 2.25rem;
    transition: border-color .3s; scroll-margin-top: 8rem;
}
.section-card:hover { border-color: rgba(250,204,21,.2); }
.section-card h2 {
    font-size: 1.2rem; font-weight: 700; color: #fff;
    display: flex; align-items: center; gap: 10px; margin-bottom: 1rem;
}
.section-icon {
    width: 36px; height: 36px; border-radius: 10px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    background: rgba(250,204,21,.1); border: 1px solid rgba(250,204,21,.2);
    font-size: 1rem;
}
.section-card p { color: rgba(255,255,255,.6); font-size: .875rem; line-height: 1.85; margin-bottom: .85rem; }
.section-card p:last-child { margin-bottom: 0; }
.section-card ul { list-style: none; padding: 0; margin: 0 0 .85rem; display: flex; flex-direction: column; gap: .5rem; }
.section-card ul li {
    display: flex; align-items: flex-start; gap: 8px;
    font-size: .875rem; color: rgba(255,255,255,.6); line-height: 1.7;
}
.section-card ul li::before { content: '✦'; color: #facc15; font-size: .65rem; margin-top: 5px; flex-shrink: 0; }
.highlight-box {
    background: rgba(52,211,153,.06); border: 1px solid rgba(52,211,153,.18);
    border-radius: 1rem; padding: 1rem 1.25rem; margin: 1rem 0;
    font-size: .8rem; color: rgba(255,255,255,.65); line-height: 1.7;
}
.highlight-box strong { color: #34d399; }
.warning-box {
    background: rgba(248,113,113,.06); border: 1px solid rgba(248,113,113,.2);
    border-radius: 1rem; padding: 1rem 1.25rem; margin: 1rem 0;
    font-size: .8rem; color: rgba(255,255,255,.6); line-height: 1.7;
}
.safe-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(250,204,21,.1); border: 1px solid rgba(250,204,21,.2);
    border-radius: 99px; padding: 5px 12px;
    font-size: .75rem; color: #facc15; font-weight: 600;
}
</style>

<div class="legal-hero pt-32 pb-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="flex items-center gap-2 text-xs text-white/35 mb-8">
            <a href="/" class="hover:text-yellow-400 transition">Home</a>
            <svg class="w-3 h-3 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-white/60">Terms of Service</span>
        </div>

        <div class="legal-badge mb-6">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Legal Agreement
        </div>

        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Terms of Service</h1>
        <p class="text-white/50 text-sm max-w-2xl leading-relaxed mb-6">
            Please read these terms carefully before using our services. By accessing our website or booking a tour, you agree to be bound by these terms and conditions.
        </p>
        <div class="flex flex-wrap items-center gap-3">
            <span class="safe-badge">📋 Last updated: {{ date('d F Y') }}</span>
            <span class="safe-badge">🌍 Jurisdiction: Sri Lanka</span>
        </div>
    </div>
</div>

<main class="mx-auto max-w-7xl px-6 lg:px-10 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-[260px_1fr] gap-12">

        <aside>
            <div class="toc-card">
                <p class="text-xs font-bold uppercase tracking-widest text-white/35 mb-4">Contents</p>
                <nav class="flex flex-col gap-1">
                    <a href="#acceptance"       class="toc-link"><span class="text-yellow-400">01</span> Acceptance of Terms</a>
                    <a href="#our-services"     class="toc-link"><span class="text-yellow-400">02</span> Our Services</a>
                    <a href="#bookings"         class="toc-link"><span class="text-yellow-400">03</span> Bookings & Payments</a>
                    <a href="#cancellations"    class="toc-link"><span class="text-yellow-400">04</span> Cancellations & Refunds</a>
                    <a href="#your-conduct"     class="toc-link"><span class="text-yellow-400">05</span> User Conduct</a>
                    <a href="#reviews-terms"    class="toc-link"><span class="text-yellow-400">06</span> Reviews & Content</a>
                    <a href="#ip"               class="toc-link"><span class="text-yellow-400">07</span> Intellectual Property</a>
                    <a href="#liability"        class="toc-link"><span class="text-yellow-400">08</span> Limitation of Liability</a>
                    <a href="#indemnification"  class="toc-link"><span class="text-yellow-400">09</span> Indemnification</a>
                    <a href="#governing-law"    class="toc-link"><span class="text-yellow-400">10</span> Governing Law</a>
                    <a href="#changes"          class="toc-link"><span class="text-yellow-400">11</span> Changes to Terms</a>
                    <a href="#tos-contact"      class="toc-link"><span class="text-yellow-400">12</span> Contact</a>
                </nav>
                <div class="mt-6 pt-5 border-t border-white/8 flex flex-col gap-2">
                    <a href="/privacy" class="text-xs text-white/35 hover:text-yellow-400 transition flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        Privacy Policy
                    </a>
                    <a href="/cancellation-policy" class="text-xs text-white/35 hover:text-yellow-400 transition flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        Cancellation Policy
                    </a>
                </div>
            </div>
        </aside>

        <div class="flex flex-col gap-6">

            <div class="section-card" id="acceptance">
                <h2><span class="section-icon">✅</span> Acceptance of Terms</h2>
                <p>By accessing or using the Zenora Travels website (<strong style="color:#fff">zenoratravels.com</strong>) or engaging our services in any form — including making an enquiry, submitting a booking, or posting a review — you confirm that you have read, understood, and agree to be bound by these Terms of Service.</p>
                <p>If you do not agree to these terms, please refrain from using our website or services. These terms apply to all visitors, users, and clients of Zenora Travels.</p>
            </div>

            <div class="section-card" id="our-services">
                <h2><span class="section-icon">🌏</span> Our Services</h2>
                <p>Zenora Travels provides travel planning, tour packaging, transportation, accommodation coordination, and guided experience services primarily within Sri Lanka. Our services include:</p>
                <ul>
                    <li>Custom and curated tour itinerary planning</li>
                    <li>Hotel and accommodation bookings on your behalf</li>
                    <li>Transport and driver/guide arrangements</li>
                    <li>Airport transfers and on-ground support</li>
                    <li>Travel consultation and destination advice</li>
                </ul>
                <p>We act as a travel organiser and coordinator. Certain services (flights, international transfers) may be handled by third-party providers, whose own terms and conditions will also apply.</p>
            </div>

            <div class="section-card" id="bookings">
                <h2><span class="section-icon">💳</span> Bookings & Payments</h2>
                <p>All bookings are subject to availability and are confirmed only upon receipt of the required deposit or full payment as communicated by our team.</p>
                <ul>
                    <li>A minimum deposit (typically 20–30%) is required to secure your booking</li>
                    <li>The balance is due as agreed in your booking confirmation</li>
                    <li>Prices are quoted in LKR or agreed foreign currency and are subject to change prior to final confirmation</li>
                    <li>Payment methods accepted will be communicated at the time of booking</li>
                </ul>
                <div class="highlight-box">
                    <strong>Important:</strong> Zenora Travels does not process card payments directly on this website. Payment instructions will be provided separately in a secure manner.
                </div>
            </div>

            <div class="section-card" id="cancellations">
                <h2><span class="section-icon">↩️</span> Cancellations & Refunds</h2>
                <p>Booking cancellations and refund eligibility are governed by our dedicated Cancellation Policy.</p>
                <ul>
                    <li><strong style="color:#fff">Cancellation More Than 30 Days Before Departure:</strong> Eligible for a 70% refund of the total tour cost.</li>
                    <li><strong style="color:#fff">Cancellation Within 30 Days of Departure:</strong> Bookings cancelled 30 days or less before departure are non-refundable.</li>
                    <li><strong style="color:#fff">Booking Deposit:</strong> A 30% deposit is required to confirm every booking and is non-refundable.</li>
                </ul>
                <div class="highlight-box">
                    For detailed rules, exceptions, third-party services (airline tickets, visas), and refund processing timelines, please review the full <a href="/cancellation-policy" class="underline hover:text-yellow-400 font-semibold">Cancellation Policy</a>.
                </div>
                <p>All cancellation requests must be submitted in writing to our official email address.</p>
            </div>

            <div class="section-card" id="your-conduct">
                <h2><span class="section-icon">🤝</span> User Conduct</h2>
                <p>When using our website and services, you agree not to:</p>
                <ul>
                    <li>Provide false or misleading personal information</li>
                    <li>Submit fraudulent or spam enquiries or reviews</li>
                    <li>Upload content that is offensive, defamatory, or unlawful</li>
                    <li>Attempt to gain unauthorised access to any part of our website or systems</li>
                    <li>Use our services for any illegal or unethical purpose</li>
                    <li>Engage in harassment of our staff, guides, or other clients</li>
                </ul>
                <p>Violation of these conduct standards may result in cancellation of services without refund and legal action where appropriate.</p>
            </div>

            <div class="section-card" id="reviews-terms">
                <h2><span class="section-icon">⭐</span> Reviews & User Content</h2>
                <p>By submitting a review or content to our website, you grant Zenora Travels a non-exclusive, royalty-free licence to display that content on our website and marketing materials.</p>
                <ul>
                    <li>All reviews are subject to approval by our moderation team before publication</li>
                    <li>We reserve the right to reject or remove content that is false, offensive, or in breach of these terms</li>
                    <li>Your email address will never be displayed publicly — only your name may appear</li>
                    <li>Submitted photos must be owned by you or you must have permission to share them</li>
                    <li>You may request removal of your review at any time by contacting us</li>
                </ul>
            </div>

            <div class="section-card" id="ip">
                <h2><span class="section-icon">©️</span> Intellectual Property</h2>
                <p>All content on the Zenora Travels website — including text, images, logos, design elements, and code — is the intellectual property of Zenora Travels and is protected by copyright law.</p>
                <p>You may not reproduce, distribute, modify, or commercially exploit any content from our website without our prior written consent. Personal, non-commercial use is permitted provided you do not remove any copyright notices.</p>
            </div>

            <div class="section-card" id="liability">
                <h2><span class="section-icon">⚠️</span> Limitation of Liability</h2>
                <p>To the fullest extent permitted by law, Zenora Travels shall not be liable for:</p>
                <ul>
                    <li>Indirect, incidental, or consequential damages arising from use of our services</li>
                    <li>Losses due to circumstances beyond our reasonable control (force majeure)</li>
                    <li>Delays or changes caused by third-party service providers (airlines, hotels)</li>
                    <li>Personal injury, illness, or loss of property during a tour unless caused by our direct negligence</li>
                    <li>Inaccuracies on third-party websites we link to</li>
                </ul>
                <p>Our total liability in any matter shall not exceed the total tour fee paid by you for the specific tour in question.</p>
            </div>

            <div class="section-card" id="indemnification">
                <h2><span class="section-icon">🛡️</span> Indemnification</h2>
                <p>You agree to indemnify and hold harmless Zenora Travels, its directors, employees, and agents from any claims, damages, losses, or expenses — including legal fees — arising from your breach of these Terms, your misuse of our services, or your violation of any third-party rights.</p>
            </div>

            <div class="section-card" id="governing-law">
                <h2><span class="section-icon">⚖️</span> Governing Law</h2>
                <p>These Terms of Service are governed by and construed in accordance with the laws of <strong style="color:#fff">Sri Lanka</strong>. Any disputes arising from these terms shall be subject to the exclusive jurisdiction of the courts of Sri Lanka.</p>
                <p>If any provision of these Terms is found to be unenforceable by a court of competent jurisdiction, the remaining provisions shall remain in full force and effect.</p>
            </div>

            <div class="section-card" id="changes">
                <h2><span class="section-icon">🔄</span> Changes to Terms</h2>
                <p>We reserve the right to update or modify these Terms of Service at any time. Changes will be effective immediately upon posting to this page with an updated date. We encourage you to review these Terms periodically.</p>
                <p>Continued use of our website or services after changes are posted constitutes your acceptance of the revised Terms.</p>
            </div>

            <div class="section-card" id="tos-contact">
                <h2><span class="section-icon">📬</span> Contact</h2>
                <p>If you have any questions about these Terms of Service, please contact us:</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                    <div class="bg-white/5 rounded-xl p-4 border border-white/8">
                        <p class="text-white/40 text-xs mb-1">Email</p>
                        <p class="text-white text-sm font-medium">hello@zenoratravels.com</p>
                    </div>
                    <div class="bg-white/5 rounded-xl p-4 border border-white/8">
                        <p class="text-white/40 text-xs mb-1">Business Hours</p>
                        <p class="text-white text-sm font-medium">Mon – Sat, 8 AM – 6 PM (IST)</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
