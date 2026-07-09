@extends('layouts.app')

@section('content')
<style>
/* ════════════════════════════════════════════════════════════
   REVIEWS PAGE – PREMIUM REDESIGN
════════════════════════════════════════════════════════════ */

/* ── Animated gradient heading ──────────────────────────── */
.gradient-text {
    background: linear-gradient(135deg, #facc15 0%, #34d399 50%, #facc15 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shimmer 4s linear infinite;
}
@keyframes shimmer { to { background-position: 200% center; } }

/* ── Floating particles ─────────────────────────────────── */
.particle {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    animation: floatParticle linear infinite;
    opacity: 0;
}
@keyframes floatParticle {
    0%   { transform: translateY(0) scale(1);   opacity: 0; }
    10%  { opacity: .6; }
    90%  { opacity: .3; }
    100% { transform: translateY(-120vh) scale(.5); opacity: 0; }
}

/* ── Stat counter cards ─────────────────────────────────── */
.stat-card {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 1.5rem;
    padding: 1.5rem;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: transform .3s, border-color .3s;
}
.stat-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 0%, rgba(52,211,153,.12) 0%, transparent 70%);
    opacity: 0;
    transition: opacity .3s;
}
.stat-card:hover { transform: translateY(-5px); border-color: rgba(52,211,153,.4); }
.stat-card:hover::before { opacity: 1; }

/* ── Rating bar ─────────────────────────────────────────── */
.rating-bar-wrap { display:flex; align-items:center; gap:8px; }
.rating-bar-bg { flex:1; height:6px; border-radius:99px; background:rgba(255,255,255,.1); overflow:hidden; }
.rating-bar-fill { height:100%; border-radius:99px; background: linear-gradient(90deg,#facc15,#f59e0b); transition: width 1s cubic-bezier(.4,0,.2,1); }

/* ── Filter pills ───────────────────────────────────────── */
.filter-section {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 1.5rem;
    padding: 1.25rem 1.5rem;
}
.filter-pill {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 16px; border-radius: 99px; font-size: .8rem; font-weight: 600;
    border: 1.5px solid rgba(255,255,255,.15);
    background: rgba(255,255,255,.06);
    color: rgba(255,255,255,.7);
    cursor: pointer;
    transition: all .2s;
    white-space: nowrap;
    user-select: none;
}
.filter-pill:hover { background: rgba(255,255,255,.12); color: #fff; border-color: rgba(255,255,255,.3); }
.filter-pill.active {
    background: linear-gradient(135deg,rgba(52,211,153,.25),rgba(250,204,21,.15));
    border-color: #34d399;
    color: #fff;
    box-shadow: 0 0 16px rgba(52,211,153,.2);
}
.filter-pill.active-danger {
    background: linear-gradient(135deg,rgba(248,113,113,.2),rgba(239,68,68,.1));
    border-color: #f87171;
    color: #fff;
    box-shadow: 0 0 16px rgba(248,113,113,.2);
}

/* ── Sort select ────────────────────────────────────────── */
.sort-select {
    background: rgba(255,255,255,.06);
    border: 1.5px solid rgba(255,255,255,.15);
    border-radius: 99px;
    color: #fff;
    padding: 7px 14px;
    font-size: .8rem;
    outline: none;
    cursor: pointer;
}
.sort-select option { background: #064e3b; }

/* ── Review card ────────────────────────────────────────── */
.review-card {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 1.75rem;
    padding: 1.6rem;
    display: flex; flex-direction: column; gap: 1rem;
    position: relative; overflow: hidden;
    transition: transform .35s cubic-bezier(.4,0,.2,1), box-shadow .35s, border-color .35s, opacity .3s;
    animation: cardIn .5s ease both;
}
@keyframes cardIn {
    from { opacity: 0; transform: translateY(24px) scale(.98); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}
.review-card::after {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(52,211,153,.4), transparent);
    opacity: 0; transition: opacity .3s;
}
.review-card:hover { transform: translateY(-6px); box-shadow: 0 24px 60px rgba(0,0,0,.35); border-color: rgba(52,211,153,.2); }
.review-card:hover::after { opacity: 1; }
.review-card.hidden-card { display: none !important; }

/* Rating glow colors */
.rating-5 { --card-glow: rgba(250,204,21,.08); }
.rating-4 { --card-glow: rgba(52,211,153,.06); }
.rating-3 { --card-glow: rgba(96,165,250,.06); }
.rating-2 { --card-glow: rgba(251,146,60,.06); }
.rating-1 { --card-glow: rgba(248,113,113,.06); }
.review-card { background: linear-gradient(160deg, var(--card-glow, rgba(255,255,255,.04)) 0%, rgba(255,255,255,.03) 100%); }

/* ── Avatar ─────────────────────────────────────────────── */
.review-avatar {
    width: 44px; height: 44px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-weight: 700; font-size: .85rem; flex-shrink: 0;
    border: 2px solid;
}

/* ── Stars ──────────────────────────────────────────────── */
.stars-display { display: flex; gap: 2px; }
.star-filled { color: #facc15; font-size: 1rem; }
.star-empty  { color: rgba(255,255,255,.15); font-size: 1rem; }

/* ── Review images ──────────────────────────────────────── */
.review-img-strip { display: flex; gap: 8px; flex-wrap: nowrap; overflow-x: auto; }
.review-img-strip::-webkit-scrollbar { display: none; }
.review-img-item {
    flex-shrink: 0; width: 80px; height: 80px; border-radius: 12px;
    object-fit: cover; cursor: pointer;
    border: 2px solid rgba(255,255,255,.12);
    transition: transform .25s, border-color .25s, box-shadow .25s;
}
.review-img-item:hover { transform: scale(1.08); border-color: #34d399; box-shadow: 0 6px 24px rgba(52,211,153,.3); }

/* ── "No results" state ─────────────────────────────────── */
#no-results {
    display: none;
    text-align: center; padding: 4rem 2rem;
    background: rgba(255,255,255,.03);
    border: 1px dashed rgba(255,255,255,.12);
    border-radius: 1.5rem;
}

/* ── Lightbox ───────────────────────────────────────────── */
#lightbox {
    position: fixed; inset: 0; z-index: 9999;
    background: rgba(0,0,0,.95);
    display: none; align-items: center; justify-content: center;
    padding: 1rem;
    backdrop-filter: blur(12px);
}
#lightbox.open { display: flex; animation: lbIn .25s ease; }
@keyframes lbIn { from{opacity:0;} to{opacity:1;} }
#lightbox img { max-width: 90vw; max-height: 88vh; border-radius: 1.25rem; box-shadow: 0 30px 80px rgba(0,0,0,.8); }
#lightbox-close {
    position: absolute; top: 1.25rem; right: 1.5rem;
    font-size: 2rem; color: #fff; cursor: pointer;
    background: rgba(255,255,255,.12); border: none; border-radius: 50%;
    width: 44px; height: 44px; display: flex; align-items: center; justify-content: center;
    transition: background .2s, transform .2s;
}
#lightbox-close:hover { background: rgba(255,255,255,.22); transform: scale(1.1); }

/* ── Form styles ────────────────────────────────────────── */
.rev-label { font-size: .75rem; text-transform: uppercase; letter-spacing: .07em; color: rgba(255,255,255,.45); margin-bottom: 8px; display: block; }
.rev-input {
    width: 100%; background: rgba(255,255,255,.06);
    border: 1.5px solid rgba(255,255,255,.13);
    border-radius: .9rem; color: #fff; padding: .8rem 1.1rem;
    font-size: .875rem; outline: none;
    transition: border-color .2s, background .2s, box-shadow .2s;
}
.rev-input:focus { border-color: #34d399; background: rgba(52,211,153,.06); box-shadow: 0 0 0 3px rgba(52,211,153,.1); }
.rev-input::placeholder { color: rgba(255,255,255,.28); }

/* ── Star Picker ────────────────────────────────────────── */
.star-picker { display:flex; gap:8px; flex-direction:row-reverse; justify-content:flex-end; }
.star-picker input { display: none; }
.star-picker label { font-size: 2.25rem; cursor: pointer; color: rgba(255,255,255,.18); transition: color .15s, transform .2s; }
.star-picker input:checked ~ label,
.star-picker label:hover,
.star-picker label:hover ~ label { color: #facc15; transform: scale(1.2); }

/* ── Emoji picker ───────────────────────────────────────── */
.emoji-row { display: flex; gap: 8px; flex-wrap: wrap; }
.emoji-btn {
    font-size: 1.5rem; background: rgba(255,255,255,.07);
    border: 2px solid transparent; border-radius: 12px;
    padding: 7px 10px; cursor: pointer;
    transition: border-color .2s, transform .2s, background .2s;
    line-height: 1;
}
.emoji-btn:hover { transform: scale(1.2); background: rgba(255,255,255,.14); }
.emoji-btn.selected { border-color: #facc15; background: rgba(250,204,21,.15); transform: scale(1.15); }

/* ── Drop zone ──────────────────────────────────────────── */
.drop-zone {
    border: 2px dashed rgba(255,255,255,.2); border-radius: 1.2rem;
    padding: 2rem; text-align: center; cursor: pointer;
    transition: border-color .2s, background .2s; position: relative;
}
.drop-zone:hover, .drop-zone.dragging { border-color: #34d399; background: rgba(52,211,153,.06); }
.drop-zone input[type=file] { position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%; }
.img-preview-grid { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 12px; }
.img-thumb { position: relative; width: 88px; height: 88px; border-radius: 12px; overflow: hidden; border: 2px solid rgba(255,255,255,.2); }
.img-thumb img { width: 100%; height: 100%; object-fit: cover; }
.img-thumb .remove-btn {
    position: absolute; top: 4px; right: 4px;
    background: rgba(0,0,0,.65); border: none; border-radius: 50%;
    color: #fff; width: 20px; height: 20px;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px; cursor: pointer;
}

/* ── Submit form section ────────────────────────────────── */
.form-section {
    background: linear-gradient(145deg, rgba(52,211,153,.06) 0%, rgba(250,204,21,.04) 100%);
    border: 1px solid rgba(52,211,153,.15);
    border-radius: 2rem;
    padding: 2.5rem;
}

/* ── Toast ──────────────────────────────────────────────── */
.toast {
    position: fixed; bottom: 2rem; right: 2rem; z-index: 8888;
    background: linear-gradient(135deg,#064e3b,#065f46);
    border: 1px solid #34d399;
    color: #d1fae5; border-radius: 1rem;
    padding: 1rem 1.5rem; font-size: .875rem;
    box-shadow: 0 16px 48px rgba(0,0,0,.5);
    display: flex; align-items: center; gap: .75rem;
    animation: slideInRight .4s cubic-bezier(.4,0,.2,1);
    transition: opacity .4s;
}
@keyframes slideInRight { from{transform:translateX(120%);opacity:0} to{transform:translateX(0);opacity:1} }

/* ── Results count badge ────────────────────────────────── */
#results-count {
    display: inline-flex; align-items: center;
    background: rgba(52,211,153,.12); border: 1px solid rgba(52,211,153,.25);
    border-radius: 99px; padding: 4px 14px;
    font-size: .78rem; color: #34d399; font-weight: 600;
    transition: all .3s;
}
</style>

{{-- ════ FLOATING PARTICLES ════ --}}
<div id="particles-container" class="fixed inset-0 pointer-events-none z-0 overflow-hidden"></div>

<main class="relative z-10 overflow-hidden pt-32 pb-24 mx-auto max-w-7xl px-6 lg:px-10">

    {{-- Decorative blobs --}}
    <div class="pointer-events-none absolute -top-32 -left-40 w-[700px] h-[700px] bg-emerald-500/8 rounded-full blur-3xl"></div>
    <div class="pointer-events-none absolute top-80 -right-24 w-[500px] h-[500px] bg-yellow-400/8 rounded-full blur-3xl"></div>
    <div class="pointer-events-none absolute bottom-0 left-1/2 w-[600px] h-[400px] bg-purple-500/5 rounded-full blur-3xl -translate-x-1/2"></div>

    {{-- ══ BREADCRUMB ══ --}}
    <div class="flex items-center gap-2 text-xs text-white/40 mb-10">
        <a href="/" class="hover:text-yellow-400 transition">Home</a>
        <svg class="w-3 h-3 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-white/70">Reviews</span>
    </div>

    {{-- ══ HERO HEADER ══ --}}
    <div class="mb-14 max-w-3xl">
        <div class="inline-flex items-center gap-2 text-xs font-bold tracking-[.15em] uppercase text-emerald-400 bg-emerald-400/10 border border-emerald-400/20 rounded-full px-5 py-2 mb-6">
            <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
            Traveller Stories
        </div>
        <h1 class="text-5xl sm:text-6xl font-extrabold text-white leading-tight mb-5">
            Real Voices,<br><span class="gradient-text">Real Adventures</span>
        </h1>
        <p class="text-white/55 text-base leading-relaxed max-w-xl">
            Every journey has a story. Thousands of travellers have shared theirs — explore authentic experiences and add your own.
        </p>
        @if(!$approvedReviews->isEmpty())
        <div class="flex items-center gap-3 mt-6">
            <div class="flex -space-x-2">
                @foreach($approvedReviews->take(4) as $rv)
                <div class="w-9 h-9 rounded-full border-2 border-emerald-950 flex items-center justify-center text-xs font-bold"
                     style="background: hsl({{ (($loop->index) * 73) % 360 }}, 55%, 30%); color: hsl({{ (($loop->index) * 73) % 360 }}, 80%, 80%)">
                    {{ strtoupper(substr($rv->reviewer_name, 0, 1)) }}
                </div>
                @endforeach
            </div>
            <div class="text-sm text-white/60">
                <span class="text-white font-semibold">{{ $totalReviews }}+</span> verified travellers shared their stories
            </div>
        </div>
        @endif
    </div>

    {{-- ══ STATS + RATING BREAKDOWN ══ --}}
    @php
        $avgDisplay = $totalReviews > 0 ? number_format($avgRating, 1) : '0.0';
        $starCounts = [];
        for ($s = 5; $s >= 1; $s--) {
            $starCounts[$s] = $approvedReviews->where('rating', $s)->count();
        }
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.6fr] gap-6 mb-14">

        {{-- Left: stat cards --}}
        <div class="grid grid-cols-2 gap-4">
            <div class="stat-card col-span-2">
                <div class="text-5xl font-black text-yellow-400 mb-1">{{ $avgDisplay }}</div>
                <div class="flex justify-center gap-1 mb-2">
                    @for($s=1;$s<=5;$s++)
                        <span class="{{ $s <= round($avgRating) ? 'text-yellow-400' : 'text-white/15' }} text-lg">★</span>
                    @endfor
                </div>
                <div class="text-white/50 text-xs">out of 5.0 average</div>
            </div>
            <div class="stat-card">
                <div class="text-3xl font-black text-emerald-400 mb-1">{{ $totalReviews }}</div>
                <div class="text-white/45 text-xs">Reviews</div>
            </div>
            <div class="stat-card">
                <div class="text-3xl font-black text-yellow-400 mb-1">98%</div>
                <div class="text-white/45 text-xs">Recommend</div>
            </div>
        </div>

        {{-- Right: rating breakdown bars --}}
        <div class="stat-card !text-left">
            <div class="text-sm font-semibold text-white mb-4">Rating Breakdown</div>
            <div class="flex flex-col gap-3">
                @for($s=5; $s>=1; $s--)
                @php $pct = $totalReviews > 0 ? round(($starCounts[$s] / $totalReviews) * 100) : 0; @endphp
                <div class="rating-bar-wrap">
                    <span class="text-yellow-400 text-xs w-4 font-bold">{{ $s }}</span>
                    <span class="text-yellow-400 text-xs">★</span>
                    <div class="rating-bar-bg">
                        <div class="rating-bar-fill" style="width: 0%" data-width="{{ $pct }}%"></div>
                    </div>
                    <span class="text-white/40 text-xs w-8 text-right">{{ $starCounts[$s] }}</span>
                </div>
                @endfor
            </div>
        </div>
    </div>

    {{-- ══ FILTER BAR ══ --}}
    @if(!$approvedReviews->isEmpty())
    <div class="filter-section mb-8">
        <div class="flex flex-wrap items-center gap-3">

            {{-- Left: filter label --}}
            <div class="flex items-center gap-2 text-xs text-white/40 font-semibold uppercase tracking-widest mr-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/></svg>
                Filter
            </div>

            {{-- All --}}
            <button class="filter-pill active" data-filter="all" onclick="applyFilter(this)">
                ✦ All Reviews
                <span class="bg-white/15 rounded-full px-2 py-0.5 text-xs">{{ $totalReviews }}</span>
            </button>

            {{-- Rating filters --}}
            <button class="filter-pill" data-filter="rating-5" onclick="applyFilter(this)">
                ★ 5 Star <span class="bg-yellow-400/20 text-yellow-300 rounded-full px-2 py-0.5 text-xs">{{ $starCounts[5] }}</span>
            </button>
            <button class="filter-pill" data-filter="rating-4" onclick="applyFilter(this)">
                ★ 4 Star <span class="bg-yellow-400/10 text-yellow-400/70 rounded-full px-2 py-0.5 text-xs">{{ $starCounts[4] }}</span>
            </button>
            <button class="filter-pill" data-filter="rating-good" onclick="applyFilter(this)">
                😊 Good <span class="opacity-60 text-xs">(4–5★)</span>
            </button>
            <button class="filter-pill" data-filter="rating-low" onclick="applyFilter(this)">
                😐 Fair <span class="opacity-60 text-xs">(1–3★)</span>
            </button>

            {{-- Photo filters --}}
            <button class="filter-pill" data-filter="has-photos" onclick="applyFilter(this)">
                📸 With Photos
            </button>
            <button class="filter-pill" data-filter="no-photos" onclick="applyFilter(this)">
                📝 No Photos
            </button>

            {{-- Spacer + sort --}}
            <div class="ml-auto flex items-center gap-2">
                <span class="text-xs text-white/30">Sort</span>
                <select class="sort-select" onchange="applySort(this.value)">
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                    <option value="highest">Highest Rating</option>
                    <option value="lowest">Lowest Rating</option>
                </select>
            </div>
        </div>

        {{-- Results count --}}
        <div class="flex items-center gap-2 mt-3 pt-3 border-t border-white/6">
            <span id="results-count">{{ $totalReviews }} reviews</span>
            <span class="text-white/25 text-xs">shown</span>
            <button onclick="resetFilters()" id="reset-btn"
                    class="hidden text-xs text-white/40 hover:text-white transition ml-2 underline underline-offset-2">
                Clear filters
            </button>
        </div>
    </div>
    @endif

    {{-- ══ REVIEWS GRID ══ --}}
    @if($approvedReviews->isEmpty())
        <div class="text-center py-24 mb-14" style="background:rgba(255,255,255,.03);border:1px dashed rgba(255,255,255,.1);border-radius:2rem;">
            <div class="text-6xl mb-4">🌟</div>
            <p class="text-white font-bold text-xl mb-2">No reviews yet</p>
            <p class="text-white/40 text-sm mb-6">Be the first adventurer to share their experience!</p>
            <a href="#submit-review" class="inline-flex items-center gap-2 px-6 py-3 bg-yellow-400 text-emerald-950 font-bold rounded-full text-sm hover:scale-105 transition">
                Write the First Review →
            </a>
        </div>
    @else
        <div id="reviews-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-6">
            @foreach($approvedReviews as $i => $review)
            @php
                $hue = ($i * 47) % 360;
                $hasPhotos = !empty($review->images);
                $ratingClass = 'rating-' . $review->rating;
            @endphp
            <div class="review-card {{ $ratingClass }}"
                 data-rating="{{ $review->rating }}"
                 data-has-photos="{{ $hasPhotos ? '1' : '0' }}"
                 data-date="{{ $review->created_at->timestamp }}"
                 style="animation-delay: {{ ($i % 9) * 55 }}ms">

                {{-- Top glow line based on rating --}}
                <div class="absolute top-0 left-6 right-6 h-px rounded-full"
                     style="background: linear-gradient(90deg, transparent, {{ $review->rating >= 4 ? '#34d399' : ($review->rating >= 3 ? '#60a5fa' : '#f87171') }}55, transparent)"></div>

                {{-- Header --}}
                <div class="flex items-start gap-3">
                    <div class="review-avatar"
                         style="background: hsl({{ $hue }},55%,22%); border-color: hsl({{ $hue }},55%,45%); color: hsl({{ $hue }},80%,75%)">
                        {{ strtoupper(substr($review->reviewer_name, 0, 2)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-white font-semibold text-sm truncate">{{ $review->reviewer_name }}</div>
                        <div class="text-white/35 text-xs mt-0.5">{{ $review->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="flex flex-col items-end gap-1">
                        @if($review->mood_emoji)
                            <span class="text-xl" title="Mood">{{ $review->mood_emoji }}</span>
                        @endif
                        {{-- Rating badge --}}
                        <span class="text-xs font-bold px-2 py-0.5 rounded-full"
                              style="background: {{ $review->rating >= 4 ? 'rgba(52,211,153,.15)' : ($review->rating >= 3 ? 'rgba(96,165,250,.15)' : 'rgba(248,113,113,.15)') }}; color: {{ $review->rating >= 4 ? '#34d399' : ($review->rating >= 3 ? '#60a5fa' : '#f87171') }}">
                            {{ $review->rating }}.0
                        </span>
                    </div>
                </div>

                {{-- Stars + tour tag --}}
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <div class="stars-display">
                        @for($s=1;$s<=5;$s++)
                            <span class="{{ $s <= $review->rating ? 'star-filled' : 'star-empty' }}">★</span>
                        @endfor
                    </div>
                    @if($review->tour_name)
                        <span class="text-xs font-medium text-emerald-300 bg-emerald-400/10 border border-emerald-400/15 rounded-full px-3 py-1 max-w-[160px] truncate" title="{{ $review->tour_name }}">
                            ✈ {{ $review->tour_name }}
                        </span>
                    @endif
                </div>

                {{-- Review text --}}
                <div class="relative">
                    <span class="absolute -top-1 -left-1 text-3xl text-emerald-400/20 font-serif leading-none">"</span>
                    <p class="text-white/70 text-sm leading-relaxed pl-4 line-clamp-4">{{ $review->review_text }}</p>
                </div>

                {{-- Images strip --}}
                @if($hasPhotos)
                    <div class="review-img-strip pt-1">
                        @foreach($review->images as $img)
                            <img src="{{ Storage::url($img) }}"
                                 alt="Review photo"
                                 class="review-img-item"
                                 onclick="openLightbox('{{ Storage::url($img) }}')">
                        @endforeach
                        @if(count($review->images) > 1)
                            <div class="flex-shrink-0 w-10 h-80 flex items-center text-white/20 text-lg">›</div>
                        @endif
                    </div>
                    <div class="flex items-center gap-1 text-xs text-white/30">
                        <span>📷</span>
                        <span>{{ count($review->images) }} photo{{ count($review->images) > 1 ? 's' : '' }} attached</span>
                    </div>
                @endif

            </div>
            @endforeach
        </div>

        {{-- No results state --}}
        <div id="no-results" class="mb-14">
            <div class="text-4xl mb-3">🔍</div>
            <p class="text-white font-semibold text-lg mb-1">No reviews match this filter</p>
            <p class="text-white/40 text-sm mb-4">Try a different filter or clear the current selection.</p>
            <button onclick="resetFilters()" class="text-sm text-emerald-400 hover:text-emerald-300 transition underline underline-offset-2">Clear filters</button>
        </div>
    @endif

    {{-- ══ SUBMIT REVIEW ══ --}}
    <div id="submit-review" class="form-section relative overflow-hidden">

        {{-- Decorative --}}
        <div class="pointer-events-none absolute top-0 right-0 w-64 h-64 bg-yellow-400/5 rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute bottom-0 left-0 w-48 h-48 bg-emerald-400/5 rounded-full blur-3xl"></div>

        <div class="relative mb-8 flex items-start justify-between flex-wrap gap-4">
            <div>
                <div class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-yellow-400 bg-yellow-400/10 border border-yellow-400/20 rounded-full px-4 py-1.5 mb-3">
                    ✍️ Share Your Experience
                </div>
                <h2 class="text-2xl font-bold text-white mb-1">Write a Review</h2>
                <p class="text-white/45 text-sm">Appears on the website after our team approves it — usually within 24 hours.</p>
            </div>
            <div class="flex items-center gap-2 text-xs text-white/30 bg-white/5 rounded-xl px-4 py-2 border border-white/8">
                🔒 Email never shown publicly
            </div>
        </div>

        <form method="POST" action="/reviews" enctype="multipart/form-data" id="review-form" class="relative">
            @csrf

            {{-- Error messages --}}
            @if($errors->any())
                <div class="bg-red-500/12 border border-red-400/25 rounded-xl p-4 mb-6 text-sm text-red-300">
                    <p class="font-semibold mb-2 flex items-center gap-2"><span>⚠️</span> Please fix the following:</p>
                    <ul class="list-disc list-inside space-y-1 opacity-90">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- Name --}}
                <div>
                    <label class="rev-label" for="reviewer_name">Your Name *</label>
                    <input id="reviewer_name" name="reviewer_name" type="text" required
                           value="{{ old('reviewer_name') }}" placeholder="e.g. Sarah Johnson"
                           class="rev-input @error('reviewer_name') !border-red-400 @enderror">
                </div>

                {{-- Email --}}
                <div>
                    <label class="rev-label" for="reviewer_email">Email <span class="normal-case opacity-50">(optional)</span></label>
                    <input id="reviewer_email" name="reviewer_email" type="email"
                           value="{{ old('reviewer_email') }}" placeholder="your@email.com"
                           class="rev-input @error('reviewer_email') !border-red-400 @enderror">
                </div>

                {{-- Tour --}}
                <div class="md:col-span-2">
                    <label class="rev-label" for="tour_name">Tour / Destination <span class="normal-case opacity-50">(optional)</span></label>
                    <input id="tour_name" name="tour_name" type="text"
                           value="{{ old('tour_name') }}" placeholder="e.g. Sigiriya & Cultural Triangle Tour"
                           class="rev-input @error('tour_name') !border-red-400 @enderror">
                </div>

                {{-- Rating --}}
                <div>
                    <label class="rev-label">Your Rating *</label>
                    <div class="star-picker" id="star-picker">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}"
                                   {{ old('rating', 5) == $i ? 'checked' : '' }}>
                            <label for="star{{ $i }}" title="{{ $i }} star{{ $i > 1 ? 's' : '' }}">★</label>
                        @endfor
                    </div>
                </div>

                {{-- Mood emoji --}}
                <div>
                    <label class="rev-label">Your Mood</label>
                    <input type="hidden" name="mood_emoji" id="mood_emoji_input" value="{{ old('mood_emoji') }}">
                    <div class="emoji-row" id="emoji-row">
                        @foreach(['😍','🤩','😊','🙂','😐','😮','🥰','🎉','🌟','✈️','🏖️','🦁'] as $emoji)
                            <button type="button" class="emoji-btn {{ old('mood_emoji') === $emoji ? 'selected' : '' }}"
                                    data-emoji="{{ $emoji }}" onclick="selectEmoji(this)">{{ $emoji }}</button>
                        @endforeach
                    </div>
                </div>

                {{-- Review text --}}
                <div class="md:col-span-2">
                    <label class="rev-label" for="review_text">
                        Your Review *
                        <span class="normal-case opacity-40">(min 20 characters)</span>
                    </label>
                    <textarea id="review_text" name="review_text" rows="5" required
                              placeholder="Tell us about your experience — the highlights, memories, what made it special..."
                              class="rev-input @error('review_text') !border-red-400 @enderror"
                              style="resize:vertical">{{ old('review_text') }}</textarea>
                    <div class="flex justify-end mt-1.5">
                        <span id="char-count" class="text-xs text-white/25">0 / 2000</span>
                    </div>
                </div>

                {{-- Image upload --}}
                <div class="md:col-span-2">
                    <label class="rev-label">Photos <span class="normal-case opacity-40">(up to 3 · JPG / PNG / WebP · max 4 MB each)</span></label>
                    <div class="drop-zone" id="drop-zone">
                        <input type="file" name="images[]" id="image-input"
                               accept="image/jpeg,image/png,image/webp" multiple>
                        <div class="pointer-events-none space-y-2">
                            <div class="text-4xl">📸</div>
                            <p class="text-white/50 text-sm">Drag & drop photos here, or <span class="text-emerald-400 underline">click to browse</span></p>
                            <p class="text-white/25 text-xs">Share the best moments from your journey</p>
                        </div>
                    </div>
                    <div class="img-preview-grid" id="img-preview"></div>
                </div>

            </div>

            {{-- Submit --}}
            <div class="mt-8 flex items-center gap-4 flex-wrap">
                <button type="submit" id="submit-btn"
                        class="inline-flex items-center gap-2.5 px-9 py-4 text-emerald-950 font-bold rounded-full text-sm transition-all duration-300 hover:scale-105 shadow-xl"
                        style="background: linear-gradient(135deg,#facc15,#f59e0b); box-shadow: 0 8px 32px rgba(250,204,21,.3)">
                    <span id="submit-text">Submit Review</span>
                    <svg id="submit-spinner" class="hidden animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                    </svg>
                </button>
                <p class="text-xs text-white/30">Your review will be visible after admin approval</p>
            </div>

        </form>
    </div>

</main>

{{-- ══ LIGHTBOX ══ --}}
<div id="lightbox" onclick="closeLightbox()">
    <button id="lightbox-close" onclick="closeLightbox()">✕</button>
    <img id="lightbox-img" src="" alt="Review photo">
</div>

{{-- ══ TOAST ══ --}}
@if(session('success'))
    <div class="toast" id="success-toast" style="transition:opacity .4s">
        <span class="text-2xl">🎉</span>
        <div>
            <p class="font-bold text-emerald-100">Review Submitted!</p>
            <p class="text-emerald-300/75 text-xs mt-0.5">{{ session('success') }}</p>
        </div>
    </div>
    <script>setTimeout(() => { const t = document.getElementById('success-toast'); if(t){t.style.opacity='0';setTimeout(()=>t.remove(),400);} }, 5000);</script>
@endif

{{-- ══ SCRIPTS ══ --}}
<script>
/* ── Floating particles ───────────────────── */
(function() {
    const container = document.getElementById('particles-container');
    const colors = ['rgba(52,211,153,.5)','rgba(250,204,21,.4)','rgba(167,139,250,.4)'];
    for (let i = 0; i < 18; i++) {
        const p = document.createElement('div');
        const size = 3 + Math.random() * 5;
        p.className = 'particle';
        p.style.cssText = `
            width:${size}px; height:${size}px;
            left:${Math.random() * 100}%;
            bottom: ${-20}px;
            background: ${colors[Math.floor(Math.random()*colors.length)]};
            animation-duration: ${8 + Math.random() * 14}s;
            animation-delay: ${Math.random() * 12}s;
        `;
        container.appendChild(p);
    }
})();

/* ── Animate rating bars on load ─────────── */
window.addEventListener('load', () => {
    document.querySelectorAll('.rating-bar-fill').forEach(bar => {
        setTimeout(() => { bar.style.width = bar.dataset.width; }, 300);
    });
});

/* ── Lightbox ─────────────────────────────── */
function openLightbox(src) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });

/* ── Emoji selector ───────────────────────── */
function selectEmoji(btn) {
    document.querySelectorAll('.emoji-btn').forEach(b => b.classList.remove('selected'));
    btn.classList.add('selected');
    document.getElementById('mood_emoji_input').value = btn.dataset.emoji;
}

/* ── Char counter ─────────────────────────── */
const textarea = document.getElementById('review_text');
const counter  = document.getElementById('char-count');
if (textarea) {
    const update = () => {
        const len = textarea.value.length;
        counter.textContent = `${len} / 2000`;
        counter.style.color = len > 1800 ? '#f87171' : len > 1500 ? '#facc15' : 'rgba(255,255,255,.25)';
    };
    textarea.addEventListener('input', update);
    update();
}

/* ── Image upload with preview ────────────── */
const imgInput = document.getElementById('image-input');
const preview  = document.getElementById('img-preview');
const dropZone = document.getElementById('drop-zone');
let selectedFiles = [];

function renderPreviews() {
    preview.innerHTML = '';
    selectedFiles.forEach((file, idx) => {
        const reader = new FileReader();
        reader.onload = e => {
            const thumb = document.createElement('div');
            thumb.className = 'img-thumb';
            thumb.innerHTML = `
                <img src="${e.target.result}" alt="preview">
                <button type="button" class="remove-btn" onclick="removeFile(${idx})">✕</button>
            `;
            preview.appendChild(thumb);
        };
        reader.readAsDataURL(file);
    });
    syncFileInput();
}

function removeFile(idx) { selectedFiles.splice(idx, 1); renderPreviews(); }
function syncFileInput() {
    const dt = new DataTransfer();
    selectedFiles.forEach(f => dt.items.add(f));
    imgInput.files = dt.files;
}

imgInput.addEventListener('change', () => {
    Array.from(imgInput.files).forEach(f => { if (selectedFiles.length < 3) selectedFiles.push(f); });
    renderPreviews();
});
dropZone.addEventListener('dragover', e => { e.preventDefault(); dropZone.classList.add('dragging'); });
dropZone.addEventListener('dragleave', () => dropZone.classList.remove('dragging'));
dropZone.addEventListener('drop', e => {
    e.preventDefault(); dropZone.classList.remove('dragging');
    Array.from(e.dataTransfer.files).filter(f => f.type.startsWith('image/')).forEach(f => {
        if (selectedFiles.length < 3) selectedFiles.push(f);
    });
    renderPreviews();
});

/* ── Submit loading ───────────────────────── */
document.getElementById('review-form')?.addEventListener('submit', () => {
    document.getElementById('submit-text').textContent = 'Submitting…';
    document.getElementById('submit-spinner').classList.remove('hidden');
    document.getElementById('submit-btn').disabled = true;
});

/* ══ FILTER & SORT SYSTEM ════════════════════ */
let activeFilter = 'all';
let activeSort   = 'newest';

function getCards() {
    return Array.from(document.querySelectorAll('#reviews-grid .review-card'));
}

function applyFilter(btn) {
    // Update pill styles
    document.querySelectorAll('.filter-pill').forEach(p => {
        p.classList.remove('active', 'active-danger');
    });
    const filter = btn.dataset.filter;
    if (filter === 'rating-low') btn.classList.add('active-danger');
    else btn.classList.add('active');
    activeFilter = filter;

    // Show/hide reset
    document.getElementById('reset-btn')?.classList.toggle('hidden', filter === 'all');

    filterAndSort();
}

function applySort(val) {
    activeSort = val;
    filterAndSort();
}

function resetFilters() {
    activeFilter = 'all';
    activeSort   = 'newest';
    document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active', 'active-danger'));
    document.querySelector('[data-filter="all"]')?.classList.add('active');
    document.querySelector('.sort-select').value = 'newest';
    document.getElementById('reset-btn')?.classList.add('hidden');
    filterAndSort();
}

function filterAndSort() {
    const cards = getCards();
    const grid  = document.getElementById('reviews-grid');
    const noRes = document.getElementById('no-results');

    // 1. Filter
    let visible = cards.filter(card => {
        const rating    = parseInt(card.dataset.rating);
        const hasPhotos = card.dataset.hasPhotos === '1';

        switch (activeFilter) {
            case 'rating-5':     return rating === 5;
            case 'rating-4':     return rating === 4;
            case 'rating-good':  return rating >= 4;
            case 'rating-low':   return rating <= 3;
            case 'has-photos':   return hasPhotos;
            case 'no-photos':    return !hasPhotos;
            default:             return true;
        }
    });

    // 2. Sort
    visible.sort((a, b) => {
        const rA = parseInt(a.dataset.rating), rB = parseInt(b.dataset.rating);
        const dA = parseInt(a.dataset.date),   dB = parseInt(b.dataset.date);
        switch (activeSort) {
            case 'oldest':  return dA - dB;
            case 'highest': return rB - rA;
            case 'lowest':  return rA - rB;
            default:        return dB - dA; // newest
        }
    });

    const visibleSet = new Set(visible);

    // 3. Show/hide & reorder
    cards.forEach(card => {
        card.classList.add('hidden-card');
        card.style.order = 999;
    });

    visible.forEach((card, idx) => {
        card.classList.remove('hidden-card');
        card.style.order = idx;
        card.style.animationDelay = `${idx * 40}ms`;
    });

    // 4. Update count
    const countEl = document.getElementById('results-count');
    if (countEl) countEl.textContent = `${visible.length} review${visible.length !== 1 ? 's' : ''}`;

    // 5. No-results state
    if (noRes) noRes.style.display = visible.length === 0 ? 'block' : 'none';
    if (grid)  grid.style.display  = visible.length === 0 ? 'none' : '';
}
</script>

@endsection
