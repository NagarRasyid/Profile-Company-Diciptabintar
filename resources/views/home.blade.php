@extends('layouts.app')

@section('title', 'Beranda')

@push('styles')
<style>
/* =============================================
   HOME PAGE STYLES
============================================= */

/* Hapus padding site-main di halaman beranda agar hero full-width */
.home-page-wrapper {
    margin: 0 -32px;
}

/*font family*/
*{
    font-family: 'Plus Jakarta Sans', sans-serif;
}

/* ---- HERO SECTION ---- */
.hero {
    background: #eef0f2;
    padding: 56px 80px 100px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.hero-left,
.hero-right {
    position: relative;
    z-index: 1;
}

.hero::before {
    content: '';
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
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #e2e2e6;
    border: 1px solid #d8dadf;
    border-radius: 999px;
    padding: 5px 14px;
    font-size: 0.78rem;
    color: #42474f;
    margin-bottom: 20px;
    width: fit-content;
}

.hero-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: clamp(2rem, 4vw, 2.8rem);
    font-weight: 700;
    color: #0a1628;
    line-height: 1.2;
    letter-spacing: -0.02em;
    margin: 0 0 18px;
}

.hero-desc {
    font-size: 1rem;
    color: #52565e;
    line-height: 1.7;
    margin: 0 0 32px;
    max-width: 420px;
}

.hero-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

.hero-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: #003d6a;
    color: #ffffff;
    border-radius: 999px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.92rem;
    transition: background 0.16s ease, transform 0.15s ease;
    box-shadow: 0 6px 18px rgba(0, 61, 106, 0.25);
}

.hero-btn-primary:hover {
    background: #ffffff;
    color: #09436e;
    transform: translateY(-1px);
}

.hero-btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 22px;
    background: transparent;
    color: #003d6a;
    border: 1.5px solid #003d6a;
    border-radius: 999px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.92rem;
    transition: all 0.18s ease;
}

.hero-btn-secondary:hover {
    background: #003d6a;
    color: #ffffff;
}

.hero-image-wrap {
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 24px 60px rgba(0, 61, 106, 0.18);
    aspect-ratio: 4/3;
}

.hero-image-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: all 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}

.hero-image-wrap:hover img {
    transform: scale(1.05);
}

/* ---- QUICK ACCESS CARDS ---- */
.quick-access {
    max-width: 1280px;
    margin: -36px auto 0;
    padding: 0 50px;
    position: relative;
    z-index: 2;
}

.quick-access-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}

.qa-card {
    background: #ffffff;
    border: 1px solid #e5eaf2;
    border-radius: 14px;
    padding: 22px 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    text-decoration: none;
    color: inherit;
    display: block;
}

.qa-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 32px rgba(0, 0, 0, 0.10);
}

.qa-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 14px;
    font-size: 1.3rem;
}

.qa-icon-blue   { background: #e8f0ff; }
.qa-icon-green  { background: #e6f9ee; }
.qa-icon-orange { background: #fff4e5; }
.qa-icon-pink   { background: #fff0f3; }

.qa-card h3 {
    font-size: 0.95rem;
    font-weight: 600;
    color: #0a1628;
    margin: 0 0 6px;
}

.qa-card p {
    font-size: 0.82rem;
    color: #64748b;
    line-height: 1.5;
    margin: 0;
}

/* ---- LAYANAN UTAMA SECTION ---- */
.section-layanan {
    max-width: 1440px;
    margin: 0 auto;
    padding: 72px 50px 60px;
}

.section-header {
    text-align: center;
    margin-bottom: 42px;
}

.section-header h2 {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 600;
    color: #0a1628;
    margin: 0 0 12px;
    letter-spacing: -0.02em;
}

.section-header p {
    font-size: 0.95rem;
    color: #64748b;
    line-height: 1.6;
    max-width: 520px;
    margin: 0 auto;
}

.layanan-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
}

.layanan-card {
    background: #ffffff;
    border: 1px solid #e5eaf2;
    border-radius: 16px;
    padding: 28px 22px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: flex;
    flex-direction: column;
}

.layanan-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 32px rgba(0, 0, 0, 0.10);
}

.layanan-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    font-size: 1.4rem;
}

.layanan-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: #0a1628;
    margin: 0 0 8px;
}

.layanan-card p {
    font-size: 0.84rem;
    color: #64748b;
    line-height: 1.6;
    margin: 0 0 20px;
    flex: 1;
}

.layanan-link {
    font-size: 0.84rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: gap 0.18s ease;
}

.layanan-link:hover { gap: 8px; }

.layanan-link-blue   { color: #2563eb; }
.layanan-link-green  { color: #16a34a; }
.layanan-link-pink   { color: #e11d48; }
.layanan-link-teal   { color: #0891b2; }

/* ---- NEWS CARD WITH IMAGE ---- */
.news-card {
    background: #ffffff;
    border: 1px solid #e5eaf2;
    border-radius: 16px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.news-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 32px rgba(0, 0, 0, 0.10);
}

.news-card-img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    display: block;
    flex-shrink: 0;
}

.news-card-body {
    padding: 20px 22px 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.news-card-date {
    font-size: 0.75rem;
    color: #94a3b8;
    margin-bottom: 8px;
    font-weight: 500;
}

.news-card-title {
    font-size: 0.95rem;
    font-weight: 700;
    color: #0a1628;
    margin: 0 0 8px;
    line-height: 1.4;
}

.news-card-excerpt {
    font-size: 0.84rem;
    color: #64748b;
    line-height: 1.6;
    margin: 0 0 18px;
    flex: 1;
}

/* ---- RESPONSIVE ---- */
@media (max-width: 1024px) {
    .hero { padding: 40px 32px 72px; gap: 32px; }
    .quick-access { padding: 0 32px; }
    .quick-access-grid, .layanan-grid { grid-template-columns: repeat(2, 1fr); }
    .section-layanan { padding: 56px 32px 48px; }
}

@media (max-width: 640px) {
    .hero { grid-template-columns: 1fr; padding: 32px 20px 72px; }
    .hero-image-wrap { display: none; }
    .quick-access { padding: 0 20px; }
    .quick-access-grid { grid-template-columns: repeat(2, 1fr); }
    .layanan-grid { grid-template-columns: 1fr; }
    .section-layanan { padding: 48px 20px 36px; }
    .home-page-wrapper { margin: 0 -18px; }
}
</style>
@endpush

@section('content')
<div class="home-page-wrapper">

    {{-- ===== HERO SECTION ===== --}}
    <section class="hero">
        <div class="hero-left">
            <div class="hero-badge">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                Portal Resmi Pemerintah Kota Bandung
            </div>

            <h1 class="hero-title">
                Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang
            </h1>

            <p class="hero-desc">
                Mewujudkan tata ruang, bangunan, dan konstruksi Kota Bandung yang tertib, nyaman, dan berkelanjutan untuk kesejahteraan warga.
            </p>

            <div class="hero-actions">
                <a href="{{ route('layanan.index') }}" class="hero-btn-primary">
                    Profil Dinas &rarr;
                </a>
            </div>
        </div>

        <div class="hero-right">
            <div class="hero-image-wrap">
                <img src="{{ asset('images/Beranda.jpg') }}"
                     alt="Kota Bandung - Dinas Cipta Karya">
            </div>
        </div>
    </section>

    {{-- ===== QUICK ACCESS CARDS ===== --}}
    <div class="quick-access">
        <div class="quick-access-grid">
            <a href="{{ route('layanan.index') }}" class="qa-card">
                <div class="qa-icon qa-icon-blue">
                    <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/earth-planet--v2.png" alt="earth-planet--v2"/>
                </div>
                <h3>Layanan Publik</h3>
                <p>Akses berbagai layanan perizinan dan administratif.</p>
            </a>
            <a href="{{ route('regulasi.index') }}" class="qa-card">
                <div class="qa-icon qa-icon-green">🌿</div>
                <h3>Regulasi</h3>
                <p>Dokumen hukum dan kebijakan tata ruang kota.</p>
            </a>
            <a href="{{ route('services.index') }}" class="qa-card">
                <div class="qa-icon qa-icon-orange">📋</div>
                <h3>Informasi Bidang</h3>
                <p>Struktur dan tugas pokok fungsi tiap bidang.</p>
            </a>
            <a href="{{ route('news.index') }}" class="qa-card">
                <div class="qa-icon qa-icon-pink">📰</div>
                <h3>Berita Terkini</h3>
                <p>Informasi dan pengumuman terbaru dari dinas.</p>
            </a>
        </div>
    </div>

    {{-- ===== LAYANAN UTAMA ===== --}}
    <div class="section-layanan">
        <div class="section-header">
            <h2>Layanan Utama</h2>
            <p>Kami menyediakan berbagai layanan elektronik untuk memudahkan masyarakat dalam mengurus perizinan dan tata ruang.</p>
        </div>

        <div class="layanan-grid">
            {{-- SIMBG --}}
            <div class="layanan-card">
                <div class="layanan-icon qa-icon-blue">🏛️</div>
                <h3>KRK New</h3>
                <p>Sistem Informasi Manajemen Bangunan Gedung Terintegrasi.</p>
                <a href="https://diciptabintar.bandung.go.id/auth/login?redirect=https://diciptabintar.bandung.go.id/layanan/irk/pendaftaran_irk/syarat" target="_blank" class="layanan-link layanan-link-blue">Akses Layanan &rarr;</a>
            </div>

            {{-- SIMPLEMAN --}}
            <div class="layanan-card">
                <div class="layanan-icon qa-icon-green">🗺️</div>
                <h3>SIMPLEMAN</h3>
                <p>Sistem Informasi Tata Ruang Kota Bandung.</p>
                <a href="https://diciptabintar.bandung.go.id/simpelman/" target="_blank" class="layanan-link layanan-link-green">Akses Layanan &rarr;</a>
            </div>

            {{-- SIBANTEK --}}
            <div class="layanan-card">
                <div class="layanan-icon qa-icon-pink">👷</div>
                <h3>SIBANTEK</h3>
                <p>Sistem Informasi Bantuan Teknis Bangunan Gedung Negara.</p>
                <a href="https://sibantek.diciptabintar.id/" target="_blank" class="layanan-link layanan-link-pink">Akses Layanan &rarr;</a>
            </div>

            {{-- SIBIJAK --}}
            <div class="layanan-card">
                <div class="layanan-icon" style="background:#e8f7ff;">🎧</div>
                <h3>SIBIJAK</h3>
                <p>Sistem Informasi Pembinaan Jasa Konstruksi.</p>
                <a href="http://sibijak.diciptabintar.id/" target="_blank" class="layanan-link layanan-link-teal">Akses Layanan &rarr;</a>
            </div>

            {{-- PBG --}}
            <div class="layanan-card">
                <div class="layanan-icon" style="background:#e8f7ff;">🏠</div>
                <h3>PBG</h3>
                <p>Persetujuan Bangunan Gedung.</p>
                <a href="https://diciptabintar.bandung.go.id/layanan/cekpbg/" target="_blank" class="layanan-link layanan-link-teal">Akses Layanan &rarr;</a>
            </div>
        </div>
    </div>

    {{-- ===== BERITA TERBARU ===== --}}
    @if($news->count())
    <div class="section-layanan" style="padding-top: 0;">
        <div class="section-header">
            <h2>Berita Terbaru</h2>
            <p>Informasi dan pengumuman terkini dari Dinas Cipta Karya Kota Bandung.</p>
        </div>
        @php
            $newsDummies = [
                asset('images/news-dummy-1.png'),
                asset('images/news-dummy-2.png'),
                asset('images/news-dummy-3.png'),
            ];
        @endphp
        <div class="layanan-grid">
            @foreach($news as $i => $article)
            <div class="news-card">
                <img
                    src="{{ $article->thumbnail ? Storage::url($article->thumbnail) : $newsDummies[$i % 3] }}"
                    alt="{{ $article->title }}"
                    class="news-card-img">
                <div class="news-card-body">
                    <div class="news-card-date">
                        {{ $article->published_at?->format('d M Y') ?? '-' }}
                    </div>
                    <h3 class="news-card-title">{{ $article->title }}</h3>
                    <p class="news-card-excerpt">{{ Str::limit($article->excerpt, 100) }}</p>
                    <a href="{{ route('news.show', $article->slug) }}" class="layanan-link layanan-link-blue">
                        Baca Selengkapnya &rarr;
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align:center; margin-top:28px;">
            <a href="{{ route('news.index') }}" class="hero-btn-secondary" style="display:inline-flex;">
                Lihat Semua Berita
            </a>
        </div>
    </div>
    @endif

</div>
@endsection
