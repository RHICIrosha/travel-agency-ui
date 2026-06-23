<?php
$bladePath = __DIR__ . '/resources/views/welcome.blade.php';
$content = file_get_contents($bladePath);

$promiseStatic = <<<EOT
            <div class="relative z-10 text-center px-8 py-20 md:py-28 max-w-4xl mx-auto">
                <p class="text-sm uppercase tracking-[0.35em] text-yellow-400 mb-6">Our Promise</p>

                <h2 class="text-3xl font-bold text-white sm:text-4xl lg:text-6xl leading-tight">
                    We don't simply
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-300"> organize tours.</span>
                </h2>

                <p class="mt-8 text-lg text-emerald-100/70 leading-8 max-w-2xl mx-auto">
                    We create experiences that connect travelers with the beauty, culture, wildlife, and spirit of Sri Lanka.
                </p>

                <p class="mt-4 text-lg text-emerald-100/70 leading-8 max-w-2xl mx-auto">
                    With Zenora Travels, every journey becomes a <span class="text-white font-semibold">story worth telling.</span>
                </p>

                {{-- Promise pillars --}}
                <div class="mt-14 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                    <div class="glass-panel rounded-2xl p-6">
                        <p class="text-3xl mb-3">🌏</p>
                        <p class="text-white font-bold">Authentic</p>
                        <p class="text-emerald-100/50 text-sm mt-1">Real local connections</p>
                    </div>
                    <div class="glass-panel rounded-2xl p-6">
                        <p class="text-3xl mb-3">💎</p>
                        <p class="text-white font-bold">Premium</p>
                        <p class="text-emerald-100/50 text-sm mt-1">International standard service</p>
                    </div>
                    <div class="glass-panel rounded-2xl p-6">
                        <p class="text-3xl mb-3">🤝</p>
                        <p class="text-white font-bold">Responsible</p>
                        <p class="text-emerald-100/50 text-sm mt-1">Sustainable travel practices</p>
                    </div>
                </div>

                <div class="mt-12">
                    <a href="/contact" class="inline-flex items-center gap-3 rounded-full bg-yellow-400 px-10 py-4 font-bold text-emerald-950 text-lg transition-all hover:scale-[1.04] hover:shadow-[0_0_40px_rgba(250,204,21,0.4)]">
                        Start Your Journey
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
EOT;

$promiseDynamic = <<<EOT
            <div class="relative z-10 text-center px-8 py-20 md:py-28 max-w-4xl mx-auto">
                <p class="text-sm uppercase tracking-[0.35em] text-yellow-400 mb-6">{{ \$settings->promise_badge }}</p>

                <h2 class="text-3xl font-bold text-white sm:text-4xl lg:text-6xl leading-tight">
                    {{ \$settings->promise_heading_line1 }}
                    <span style="color:#facc15;text-shadow:0 0 40px rgba(250,204,21,0.4);">{{ \$settings->promise_heading_highlight }}</span>
                </h2>

                @if(\$settings->promise_text1)
                <p class="mt-8 text-lg text-emerald-100/70 leading-8 max-w-2xl mx-auto">{{ \$settings->promise_text1 }}</p>
                @endif
                @if(\$settings->promise_text2)
                <p class="mt-4 text-lg text-emerald-100/70 leading-8 max-w-2xl mx-auto">
                    With Zenora Travels, every journey becomes a <span class="text-white font-semibold">{{ \$settings->promise_text2 }}</span>
                </p>
                @endif

                <div class="mt-14 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                    <div class="glass-panel rounded-2xl p-6">
                        <p class="text-3xl mb-3">{{ \$settings->promise_pillar1_icon }}</p>
                        <p class="text-white font-bold">{{ \$settings->promise_pillar1_title }}</p>
                        <p class="text-emerald-100/50 text-sm mt-1">{{ \$settings->promise_pillar1_desc }}</p>
                    </div>
                    <div class="glass-panel rounded-2xl p-6">
                        <p class="text-3xl mb-3">{{ \$settings->promise_pillar2_icon }}</p>
                        <p class="text-white font-bold">{{ \$settings->promise_pillar2_title }}</p>
                        <p class="text-emerald-100/50 text-sm mt-1">{{ \$settings->promise_pillar2_desc }}</p>
                    </div>
                    <div class="glass-panel rounded-2xl p-6">
                        <p class="text-3xl mb-3">{{ \$settings->promise_pillar3_icon }}</p>
                        <p class="text-white font-bold">{{ \$settings->promise_pillar3_title }}</p>
                        <p class="text-emerald-100/50 text-sm mt-1">{{ \$settings->promise_pillar3_desc }}</p>
                    </div>
                </div>

                <div class="mt-12">
                    <a href="{{ \$settings->promise_cta_url }}" class="inline-flex items-center gap-3 rounded-full bg-yellow-400 px-10 py-4 font-bold text-emerald-950 text-lg transition-all hover:scale-[1.04] hover:shadow-[0_0_40px_rgba(250,204,21,0.4)]">
                        {{ \$settings->promise_cta_label }}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
EOT;

$content = str_replace($promiseStatic, $promiseDynamic, $content);
file_put_contents($bladePath, $content);
echo "Promise replaced\n";
