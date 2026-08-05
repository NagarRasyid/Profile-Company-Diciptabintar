@extends('layouts.app')

@section('title', 'Berita & Artikel')

@push('styles')
<style>
/* =============================================
   NEWS INDEX PAGE STYLES
============================================= */

.news-wrapper {
    max-width: 1100px;
    margin: 0 auto;
    padding: 36px 24px 64px;
}

/* ---- PAGE HEADER ---- */
.news-page-header {
    margin-bottom: 28px;
    border-left: 4px solid #003d6a;
    padding-left: 16px;
}

.news-page-header h1 {
    font-size: clamp(1.6rem, 3vw, 2.4rem);
    font-weight: 700;
    color: #003d6a;
    margin: 0 0 8px;
}

.news-page-header p {
    font-size: 0.9rem;
    color: #64748b;
    line-height: 1.65;
    margin: 0;
    max-width: 520px;
}

/* ---- FEATURED HERO ---- */
.news-hero {
    border-radius: 16px;
    overflow: hidden;
    position: relative;
    min-height: 340px;
    margin-bottom: 32px;
    background: #0a1628;
    display: flex;
    align-items: flex-end;
}

.news-hero-img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    opacity: 0.65;
}

.news-hero-overlay {
    position: relative;
    z-index: 1;
    padding: 32px 36px;
    background: linear-gradient(to top, rgba(5,20,50,0.92) 0%, rgba(5,20,50,0.4) 60%, transparent 100%);
    width: 100%;
}

.news-hero-meta {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
}

.news-hero-cat {
    display: inline-block;
    background: #16a34a;
    color: #ffffff;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    padding: 3px 10px;
    border-radius: 4px;
}

.news-hero-date {
    font-size: 0.8rem;
    color: rgba(255,255,255,0.75);
}

.news-hero-title {
    font-size: clamp(1.3rem, 3vw, 1.9rem);
    font-weight: 800;
    color: #ffffff;
    line-height: 1.25;
    margin: 0 0 10px;
    max-width: 620px;
}

.news-hero-excerpt {
    font-size: 0.88rem;
    color: rgba(255,255,255,0.78);
    line-height: 1.6;
    margin: 0 0 20px;
    max-width: 560px;
}

.news-hero-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #ffffff;
    color: #003d6a;
    font-size: 0.85rem;
    font-weight: 700;
    padding: 10px 22px;
    border-radius: 999px;
    text-decoration: none;
    transition: background 0.18s ease, transform 0.18s ease;
}

.news-hero-btn:hover {
    background: #eef3ff;
    transform: translateX(3px);
}

/* ---- SEARCH & FILTER ROW ---- */
.news-controls {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 28px;
    flex-wrap: wrap;
}

/* ---- SEARCH & FILTER CARD (SCROLLABLE ROW) ---- */
.news-controls-card {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 16px;
    margin-bottom: 32px;
    display: flex;
    align-items: center;
    gap: 16px;
}

/* -- Input Wrap -- */
.news-search-wrap {
    position: relative;
    flex-shrink: 0;
    width: 280px; 
}

.news-search-wrap svg {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    width: 18px;
    height: 18px;
    pointer-events: none;
}

.news-search-input {
    width: 100%;
    padding: 10px 16px 10px 40px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 0.9rem;
    color: #334155;
    background: #ffffff;
    outline: none;
    box-sizing: border-box;
    transition: border-color 0.18s ease;
}

.news-search-input:focus { 
    border-color: #003d6a; 
}

.news-search-input::placeholder { 
    color: #94a3b8; 
}

/* -- Filter Kategori (Scroll Horizontal) -- */
.news-filters {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: nowrap;
    overflow-x: auto;
    padding-bottom: 2px;
    
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.news-filters::-webkit-scrollbar {
    display: none;
}

.news-tab {
    padding: 9px 20px;
    border-radius: 999px;
    border: 1px solid #cbd5e1;
    background: #ffffff;
    color: #475569;
    font-size: 0.88rem;
    font-weight: 600;
    cursor: pointer;
    white-space: nowrap;
    flex-shrink: 0;
    transition: all 0.18s ease;
}

.news-tab:hover { 
    border-color: #003d6a; 
    color: #003d6a; 
}

.news-tab.active {
    background: #003d6a;
    border-color: #003d6a;
    color: #ffffff;
}

/* ---- MAIN 2-COLUMN LAYOUT ---- */
.news-body {
    display: grid;
    grid-template-columns: 1fr 280px;
    gap: 28px;
    align-items: start;
}

/* ---- NEWS CARDS GRID ---- */
.news-cards-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.news-card {
    background: #ffffff;
    border: 1px solid #e5eaf2;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: flex;
    flex-direction: column;
}

.news-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(0,0,0,0.09);
}

.news-card-img {
    width: 100%;
    aspect-ratio: 16/9;
    object-fit: cover;
    display: block;
    background: #eef3ff;
}

.news-card-img-placeholder {
    width: 100%;
    aspect-ratio: 16/9;
    background: linear-gradient(135deg, #eef3ff 0%, #d5e3f7 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: #94a3b8;
}

.news-card-body {
    padding: 16px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.news-card-meta {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
}

.news-card-cat {
    font-size: 0.67rem;
    font-weight: 700;
    text-transform: uppercase;
    color: #003d6a;
}

.news-card-cat-green  { color: #15803d; }
.news-card-cat-orange { color: #c2410c; }
.news-card-cat-teal   { color: #0e7490; }

.news-card-date {
    font-size: 0.73rem;
    color: #94a3b8;
    margin-left: auto;
}

.news-card-title {
    font-size: 0.92rem;
    font-weight: 700;
    color: #0a1628;
    line-height: 1.4;
    margin: 0 0 8px;
}

.news-card-excerpt {
    font-size: 0.82rem;
    color: #52565e;
    line-height: 1.6;
    margin: 0 0 14px;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.news-card-link {
    font-size: 0.8rem;
    font-weight: 600;
    color: #003d6a;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 3px;
    transition: gap 0.15s ease;
}

.news-card-link:hover { gap: 7px; }

/* ---- SIDEBAR ---- */
.news-sidebar {
    position: sticky;
    top: 100px;
}

.news-sidebar-card {
    background: #f8faff;
    border: 1px solid #e5eaf2;
    border-radius: 12px;
    padding: 20px;
}

/* .news-sidebar::before {
    content: 'news';
    position: absolute;
    bottom: -440px;
    left: -440px;
    width: 680px;
    height: 680px;
    border-radius: 50%;
    background: #e4e8e9;
    pointer-events: none;
    z-index: 0;
}

.hero::after {
    content: '';
    position: absolute;
    top: -140px;
    right: -140px;
    width: 660px;
    height: 660px;
    border-radius: 50%;
    background: #e4e8e9;
    pointer-events: none;
    z-index: 0;
} */

.news-sidebar-header {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.95rem;
    font-weight: 700;
    color: #003d6a;
    margin-bottom: 18px;
    padding-bottom: 12px;
    border-bottom: 1px solid #e5eaf2;
}

.news-sidebar-header svg {
    color: #16a34a;
    width: 18px;
    height: 18px;
}

.news-popular-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.news-popular-item {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    text-decoration: none;
}

.news-popular-num {
    font-size: 1.1rem;
    font-weight: 800;
    color: #cbd5e1;
    line-height: 1;
    flex-shrink: 0;
    min-width: 22px;
}

.news-popular-body {}

.news-popular-title {
    font-size: 0.84rem;
    font-weight: 600;
    color: #1e293b;
    line-height: 1.4;
    margin: 0 0 3px;
    transition: color 0.15s ease;
}

.news-popular-item:hover .news-popular-title { color: #003d6a; }

.news-popular-date {
    font-size: 0.73rem;
    color: #94a3b8;
}

/* ---- PAGINATION ---- */
.news-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    margin-top: 36px;
    grid-column: 1 / -1;
}

/* ---- EMPTY STATE ---- */
.news-empty {
    text-align: center;
    padding: 48px;
    color: #94a3b8;
    grid-column: 1 / -1;
}

/* ---- RESPONSIVE ---- */
@media (max-width: 900px) {
    .news-body { grid-template-columns: 1fr; }
    .news-sidebar { position: static; }
}

@media (max-width: 600px) {
    .news-wrapper { padding: 24px 16px 48px; }
    .news-cards-grid { grid-template-columns: 1fr; }
    .news-controls { flex-direction: column; align-items: flex-start; }
    .news-search-wrap { width: 100%; }
}
</style>
@endpush

@section('content')
<div class="news-wrapper">

    {{-- ===== PAGE HEADER ===== --}}
    <div class="news-page-header">
        <h1>Berita &amp; Artikel</h1>
        <p>Informasi terkini seputar pembangunan infrastruktur, tata ruang kota, dan kebijakan terbaru dari Diciptabintar Kota Bandung.</p>
    </div>

    {{-- ===== FEATURED HERO ===== --}}
    @if($featured)
    <a href="{{ route('news.show', $featured->slug) }}" class="news-hero" style="text-decoration:none;">
        @if($featured->thumbnail)
            <img class="news-hero-img" src="{{ Storage::url($featured->thumbnail) }}" alt="{{ $featured->title }}">
        @else
            <img class="news-hero-img" src="{{ asset('images/Beranda.jpg') }}" alt="{{ $featured->title }}">
        @endif
        <div class="news-hero-overlay">
            <div class="news-hero-meta">
                <span class="news-hero-cat">{{ $featured->category ?? 'Berita' }}</span>
                @if($featured->published_at)
                    <span class="news-hero-date">{{ $featured->published_at->translatedFormat('d M Y') }}</span>
                @endif
            </div>
            <h2 class="news-hero-title">{{ $featured->title }}</h2>
            <p class="news-hero-excerpt">{{ Str::limit($featured->excerpt, 140) }}</p>
            <span class="news-hero-btn">
                Baca Selengkapnya
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </span>
        </div>
    </a>
    @endif

    
    {{-- ===== SEARCH & FILTER CARD (SCROLLABLE) ===== --}}
    <div class="news-controls-card">
        {{-- ===== SEARCH & FILTER CARD ===== --}}
        <div class="news-search-wrap">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
            </svg>
            <input type="text" id="news-search" class="news-search-input" placeholder="Cari berita...">
        </div>

        {{-- Filter Kategori (Bisa di-scroll horizontal) --}}
        <div class="news-filters">
            <button class="news-tab active" data-filter="semua">Semua</button>
            <button class="news-tab" data-filter="tata-ruang">Tata Ruang</button>
            <button class="news-tab" data-filter="bangunan">Bangunan</button>
            <button class="news-tab" data-filter="regulasi">Regulasi</button>
            <button class="news-tab" data-filter="konstruksi">Konstruksi</button>
        </div>
        
    </div>
    {{-- ===== MAIN BODY: GRID + SIDEBAR ===== --}}
    <div class="news-body">

        {{-- NEWS CARDS GRID --}}
        <div>
            <div class="news-cards-grid" id="news-grid">

                @forelse($articles as $article)
                <div class="news-card"
                     data-title="{{ strtolower($article->title) }}"
                     data-cat="{{ strtolower($article->category ?? 'berita') }}">

                    {{-- Thumbnail --}}
                    @if($article->thumbnail)
                        <img class="news-card-img"
                             src="{{ Storage::url($article->thumbnail) }}"
                             alt="{{ $article->title }}">
                    @else
                        <div class="news-card-img-placeholder">📰</div>
                    @endif

                    <div class="news-card-body">
                        <div class="news-card-meta">
                            <span class="news-card-cat">{{ strtoupper($article->category ?? 'BERITA') }}</span>
                            @if($article->published_at)
                                <span class="news-card-date">{{ $article->published_at->translatedFormat('d M Y') }}</span>
                            @endif
                        </div>
                        <h3 class="news-card-title">{{ $article->title }}</h3>
                        <p class="news-card-excerpt">{{ Str::limit($article->excerpt, 100) }}</p>
                        <a href="{{ route('news.show', $article->slug) }}" class="news-card-link">
                            Baca Selengkapnya ›
                        </a>
                    </div>
                </div>
                @empty
                <div class="news-empty">
                    <div style="font-size:2.5rem; margin-bottom:12px;">📰</div>
                    <p>Belum ada berita yang dipublikasikan.</p>
                </div>
                @endforelse

            </div>

            {{-- PAGINATION --}}
            @if($articles->hasPages())
            <div class="news-pagination">
                {{ $articles->appends(request()->query())->links() }}
            </div>
            @endif
        </div>

        {{-- SIDEBAR ===== --}}
        <aside class="news-sidebar">
            <div class="news-sidebar-card">
                <div class="news-sidebar-header">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg>
                    Berita Populer
                </div>

                <div class="news-popular-list">
                    @forelse($popular as $idx => $item)
                    <a href="{{ route('news.show', $item->slug) }}" class="news-popular-item">
                        <span class="news-popular-num">{{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="news-popular-body">
                            <p class="news-popular-title">{{ Str::limit($item->title, 60) }}</p>
                            @if($item->published_at)
                                <span class="news-popular-date">{{ $item->published_at->translatedFormat('d M Y') }}</span>
                            @endif
                        </div>
                    </a>
                    @empty
                    <p style="font-size:0.82rem; color:#94a3b8; text-align:center;">Belum ada berita.</p>
                    @endforelse
                </div>
            </div>
        </aside>

    </div>

</div>

@push('scripts')
<script>
const newsTabs   = document.querySelectorAll('.news-tab');
const newsCards  = document.querySelectorAll('.news-card');
const newsSearch = document.getElementById('news-search');
let activeFilter = 'semua';

function applyNewsFilter() {
    const q = newsSearch ? newsSearch.value.toLowerCase().trim() : '';

    newsCards.forEach(card => {
        const title  = card.dataset.title || '';
        const cat    = card.dataset.cat   || '';
        const matchF = activeFilter === 'semua' || cat.includes(activeFilter.replace('-', ' '));
        const matchQ = !q || title.includes(q) || cat.includes(q);
        card.style.display = (matchF && matchQ) ? '' : 'none';
    });
}

newsTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        newsTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        activeFilter = tab.dataset.filter;
        applyNewsFilter();
    });
});

if (newsSearch) newsSearch.addEventListener('input', applyNewsFilter);
</script>
@endpush
@endsection
