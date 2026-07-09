@extends('layouts.app')

@section('content')
<style>
/* ── Legal page base ──────────────────────────────────── */
.legal-hero {
    background: linear-gradient(135deg, rgba(52,211,153,.06) 0%, rgba(250,204,21,.04) 100%);
    border-bottom: 1px solid rgba(255,255,255,.07);
}
.legal-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(52,211,153,.1); border: 1px solid rgba(52,211,153,.25);
    border-radius: 99px; padding: 6px 16px;
    font-size: .72rem; font-weight: 700; letter-spacing: .12em;
    text-transform: uppercase; color: #34d399;
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
.toc-link.active { color: #facc15; background: rgba(250,204,21,.08); }

/* ── Section cards ────────────────────────────────────── */
.section-card {
    background: rgba(255,255,255,.03);
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 1.5rem;
    padding: 2.25rem;
    transition: border-color .3s;
    scroll-margin-top: 8rem;
}
.section-card:hover { border-color: rgba(52,211,153,.2); }
.section-card h2 {
    font-size: 1.2rem; font-weight: 700; color: #fff;
    display: flex; align-items: center; gap: 10px; margin-bottom: 1rem;
}
.section-icon {
    width: 36px; height: 36px; border-radius: 10px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    background: rgba(52,211,153,.12); border: 1px solid rgba(52,211,153,.2);
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
    color: #34d399; font-size: .65rem; margin-top: 5px; flex-shrink: 0;
}
.highlight-box {
    background: rgba(250,204,21,.06); border: 1px solid rgba(250,204,21,.2);
    border-radius: 1rem; padding: 1rem 1.25rem; margin: 1rem 0;
    font-size: .8rem; color: rgba(255,255,255,.65); line-height: 1.7;
}
.highlight-box strong { color: #facc15; }
.safe-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(52,211,153,.1); border: 1px solid rgba(52,211,153,.2);
    border-radius: 99px; padding: 5px 12px;
    font-size: .75rem; color: #34d399; font-weight: 600;
}
</style>

<div class="legal-hero pt-32 pb-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-xs text-white/35 mb-8">
            <a href="/" class="hover:text-yellow-400 transition">Home</a>
            <svg class="w-3 h-3 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-white/60">Privacy Policy</span>
        </div>

        <div class="legal-badge mb-6">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            Privacy & Data Protection
        </div>

        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Privacy Policy</h1>
        <p class="text-white/50 text-sm max-w-2xl leading-relaxed mb-6">
            Your privacy matters deeply to us. This policy explains how Zenora Travels collects, uses, and protects your personal information in a transparent and respectful manner.
        </p>
        <div class="flex flex-wrap items-center gap-3">
            <span class="safe-badge">🔒 SSL Encrypted</span>
            <span class="safe-badge">🛡️ GDPR Aligned</span>
            <span class="safe-badge">📋 Last updated: {{ date('d F Y') }}</span>
        </div>
    </div>
</div>

<main class="mx-auto max-w-7xl px-6 lg:px-10 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-[260px_1fr] gap-12">

        {{-- ── Table of Contents ── --}}
        <aside>
            <div class="toc-card">
                <p class="text-xs font-bold uppercase tracking-widest text-white/35 mb-4">Contents</p>
                <nav class="flex flex-col gap-1">
                    <a href="#info-collected"    class="toc-link"><span class="text-emerald-400">01</span> Information We Collect</a>
                    <a href="#how-we-use"        class="toc-link"><span class="text-emerald-400">02</span> How We Use Information</a>
                    <a href="#data-sharing"      class="toc-link"><span class="text-emerald-400">03</span> Data Sharing</a>
                    <a href="#cookies"           class="toc-link"><span class="text-emerald-400">04</span> Cookies</a>
                    <a href="#data-security"     class="toc-link"><span class="text-emerald-400">05</span> Data Security</a>
                    <a href="#your-rights"       class="toc-link"><span class="text-emerald-400">06</span> Your Rights</a>
                    <a href="#data-retention"    class="toc-link"><span class="text-emerald-400">07</span> Data Retention</a>
                    <a href="#third-party"       class="toc-link"><span class="text-emerald-400">08</span> Third-Party Links</a>
                    <a href="#children"          class="toc-link"><span class="text-emerald-400">09</span> Children's Privacy</a>
                    <a href="#pp-contact"        class="toc-link"><span class="text-emerald-400">10</span> Contact Us</a>
                </nav>
                <div class="mt-6 pt-5 border-t border-white/8">
                    <a href="/terms" class="text-xs text-white/35 hover:text-yellow-400 transition flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        Terms of Service
                    </a>
                </div>
            </div>
        </aside>

        {{-- ── Sections ── --}}
        <div class="flex flex-col gap-6">

            <div class="section-card" id="info-collected">
                <h2><span class="section-icon">📋</span> Information We Collect</h2>
                <p>We collect information you voluntarily provide when contacting us, submitting a booking enquiry, or writing a review. This includes:</p>
                <ul>
                    <li>Full name, email address, and contact number</li>
                    <li>Travel preferences, tour interest, and travel dates</li>
                    <li>Message content and any attachments you send</li>
                    <li>Photos voluntarily submitted with reviews (stored securely)</li>
                    <li>IP address, browser type, and device information (via server logs)</li>
                </ul>
                <p>We do <strong style="color:#34d399">not</strong> collect payment card details directly — all payments are processed through secure third-party providers.</p>
            </div>

            <div class="section-card" id="how-we-use">
                <h2><span class="section-icon">⚙️</span> How We Use Your Information</h2>
                <p>Information collected is used solely for legitimate travel business purposes:</p>
                <ul>
                    <li>Responding to your enquiries and booking requests</li>
                    <li>Planning and arranging personalised tour itineraries</li>
                    <li>Sending relevant travel information, confirmations, and updates</li>
                    <li>Displaying approved reviews on our public website (name only, no email)</li>
                    <li>Improving our website experience and services</li>
                    <li>Complying with applicable legal obligations</li>
                </ul>
                <div class="highlight-box">
                    <strong>We will never sell, rent, or trade your personal data</strong> to any third party for marketing purposes. Period.
                </div>
            </div>

            <div class="section-card" id="data-sharing">
                <h2><span class="section-icon">🤝</span> Data Sharing</h2>
                <p>We only share your data with trusted parties strictly necessary to fulfil your travel arrangements:</p>
                <ul>
                    <li><strong style="color:#fff">Local partners & suppliers</strong> — hotels, transport providers, guides — only receive the details needed to execute your tour</li>
                    <li><strong style="color:#fff">Legal authorities</strong> — if required by law, court order, or to protect the safety of individuals</li>
                    <li><strong style="color:#fff">Service providers</strong> — web hosting, email services — bound by confidentiality agreements</li>
                </ul>
                <p>All third parties we work with are required to handle your data in compliance with applicable data protection laws.</p>
            </div>

            <div class="section-card" id="cookies">
                <h2><span class="section-icon">🍪</span> Cookies</h2>
                <p>Our website uses minimal, essential cookies to ensure core functionality:</p>
                <ul>
                    <li><strong style="color:#fff">Session cookies</strong> — maintain your browsing session and form state</li>
                    <li><strong style="color:#fff">CSRF tokens</strong> — protect form submissions from cross-site request forgery attacks</li>
                    <li><strong style="color:#fff">Language preference</strong> — remembers your selected language via Google Translate</li>
                </ul>
                <p>We do not use tracking cookies, advertising cookies, or third-party analytics that monitor your behaviour across other websites. You may disable cookies in your browser settings, though some features may not function correctly.</p>
            </div>

            <div class="section-card" id="data-security">
                <h2><span class="section-icon">🔐</span> Data Security</h2>
                <p>We implement industry-standard measures to protect your information:</p>
                <ul>
                    <li>HTTPS/SSL encryption on all pages and data transfers</li>
                    <li>Secure server infrastructure with access controls</li>
                    <li>Regular security reviews and software updates</li>
                    <li>Uploaded images stored in access-controlled server directories</li>
                    <li>Admin panel protected with authentication</li>
                </ul>
                <div class="highlight-box">
                    While we take every reasonable precaution, no internet transmission is 100% secure. We encourage you not to share sensitive personal information (e.g., passport numbers) via our contact forms.
                </div>
            </div>

            <div class="section-card" id="your-rights">
                <h2><span class="section-icon">⚖️</span> Your Rights</h2>
                <p>You have the following rights regarding your personal data:</p>
                <ul>
                    <li><strong style="color:#fff">Access</strong> — request a copy of the data we hold about you</li>
                    <li><strong style="color:#fff">Rectification</strong> — ask us to correct any inaccurate information</li>
                    <li><strong style="color:#fff">Erasure</strong> — request deletion of your personal data (subject to legal obligations)</li>
                    <li><strong style="color:#fff">Portability</strong> — receive your data in a structured, machine-readable format</li>
                    <li><strong style="color:#fff">Objection</strong> — opt out of receiving marketing communications at any time</li>
                    <li><strong style="color:#fff">Review removal</strong> — request removal of a review you submitted</li>
                </ul>
                <p>To exercise any of these rights, please contact us using the details below. We will respond within 30 days.</p>
            </div>

            <div class="section-card" id="data-retention">
                <h2><span class="section-icon">📅</span> Data Retention</h2>
                <p>We retain your personal data only for as long as necessary:</p>
                <ul>
                    <li>Enquiry and contact data: up to <strong style="color:#fff">2 years</strong> after last contact</li>
                    <li>Booking records: up to <strong style="color:#fff">7 years</strong> for financial and legal compliance</li>
                    <li>Approved reviews: retained until you request removal</li>
                    <li>Server logs: automatically purged after <strong style="color:#fff">90 days</strong></li>
                </ul>
                <p>After the applicable retention period, data is securely deleted or anonymised.</p>
            </div>

            <div class="section-card" id="third-party">
                <h2><span class="section-icon">🔗</span> Third-Party Links</h2>
                <p>Our website may contain links to external websites such as partner hotels, attractions, or social media platforms. We are not responsible for the privacy practices or content of those sites. We recommend you review the privacy policies of any external sites you visit.</p>
            </div>

            <div class="section-card" id="children">
                <h2><span class="section-icon">👶</span> Children's Privacy</h2>
                <p>Our services are not directed at children under the age of 16. We do not knowingly collect personal information from minors. If you believe a minor has provided us with personal data, please contact us immediately and we will promptly delete it.</p>
            </div>

            <div class="section-card" id="pp-contact">
                <h2><span class="section-icon">📬</span> Contact Us</h2>
                <p>For any privacy-related queries, data requests, or concerns, please reach out to our team:</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                    <div class="bg-white/5 rounded-xl p-4 border border-white/8">
                        <p class="text-white/40 text-xs mb-1">Email</p>
                        <p class="text-white text-sm font-medium">hello@zenoratravels.com</p>
                    </div>
                    <div class="bg-white/5 rounded-xl p-4 border border-white/8">
                        <p class="text-white/40 text-xs mb-1">Response Time</p>
                        <p class="text-white text-sm font-medium">Within 30 business days</p>
                    </div>
                </div>
                <p class="mt-4 text-xs text-white/35">This policy may be updated from time to time. Material changes will be communicated via our website. Continued use of our services constitutes acceptance of the updated policy.</p>
            </div>

        </div>
    </div>
</main>
@endsection
