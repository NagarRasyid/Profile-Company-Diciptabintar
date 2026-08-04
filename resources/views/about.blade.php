@extends('layouts.app')

@section('title', 'Profil Dinas')

@push('styles')
<style>
/* =============================================
   ABOUT PAGE STYLES
============================================= */

.about-wrapper {
    margin: 0 -32px;
}

/*font family*/
* {
    font-family: 'Plus Jakarta Sans', sans-serif;
}

/* ---- HERO PROFIL ---- */
.about-hero {
    background: #f8faff;
    padding: 56px 80px 52px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 52px;
    align-items: center;
    border-bottom: 1px solid #e5eaf2;
}

.about-hero-eyebrow {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #003d6a;
    margin-bottom: 12px;
}

.about-hero-title {
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    font-weight: 700;
    color: #002745;
    line-height: 1.2;
    letter-spacing: -0.02em;
    margin: 0 0 16px;
}

.about-hero-desc {
    font-size: 0.95rem;
    color: #52565e;
    line-height: 1.75;
    margin: 0;
    max-width: 460px;
}

.about-hero-img {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0, 61, 106, 0.15);
    aspect-ratio: 16/10;
}

.about-hero-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* ---- STATS BAR (UPDATED) ---- */
.about-stats {
    background: #ffffff;
    padding: 40px 80px;
}

.about-stats-inner {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.about-stat-item {
    background: #f4f6f9;
    padding: 32px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    border-radius: 8px;
    border-top: 4px solid transparent;
}

.about-stat-item.stat-green { border-top-color: #16a34a; }
.about-stat-item.stat-blue { border-top-color: #003d6a; }
.about-stat-item.stat-orange { border-top-color: #f97316; }
.about-stat-item.stat-yellow { border-top-color: #fbbf24; }

.about-stat-icon {
    width: 32px;
    height: 32px;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.about-stat-icon svg {
    width: 100%;
    height: 100%;
}

.stat-green .about-stat-icon { color: #16a34a; }
.stat-blue .about-stat-icon { color: #003d6a; }
.stat-orange .about-stat-icon { color: #f97316; }
.stat-yellow .about-stat-icon { color: #fbbf24; }

.about-stat-number {
    font-size: 1.8rem;
    font-weight: 800;
    color: #003d6a;
    line-height: 1;
    margin-bottom: 8px;
}

.about-stat-label {
    font-size: 0.85rem;
    color: #475569;
    font-weight: 600;
}

/* ---- TENTANG DINAS ---- */
.about-section {
    padding: 72px 80px;
}

.about-section-alt {
    background: #f8faff;
}

.about-tentang {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.about-office-img {
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 12px 36px rgba(0, 0, 0, 0.10);
    aspect-ratio: 4/3;
}

.about-office-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.about-section-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 1.5rem;
    font-weight: 700;
    letter-spacing: 0.01em;
    color: #003d6a;
    margin-bottom: 14px;
}

.about-section-eyebrow svg {
    color: #f59e0b;
}

.about-section-title {
    font-size: clamp(1.4rem, 2.5vw, 1.85rem);
    font-weight: 800;
    color: #0a1628;
    margin: 0 0 18px;
    letter-spacing: -0.02em;
    line-height: 1.25;
}

.about-section-text {
    font-size: 0.92rem;
    color: #52565e;
    line-height: 1.8;
    margin: 0 0 14px;
}

/* ---- VISI MISI (UPDATED) ---- */
.about-vismis-header {
    text-align: center;
    margin-bottom: 48px;
}

.about-vismis-header h2 {
    font-size: clamp(1.6rem, 2.8vw, 1.8rem);
    font-weight: 500;
    color: #003d6a;
    margin: 0 0 10px;
    letter-spacing: -0.02em;
}

.about-vismis-header p {
    font-size: 0.92rem;
    color: #64748b;
    max-width: 500px;
    margin: 0 auto;
    line-height: 1.65;
}

.about-vismis-grid {
    display: grid;
    grid-template-columns: 1fr 1.6fr;
    gap: 28px;
    align-items: stretch;
}

.about-visi-box {
    background: #003d6a;
    border-radius: 12px;
    padding: 40px 32px;
    color: #ffffff;
    height: 100%;
    position: relative;
    overflow: hidden;
}

/* Aksesoris Shape di Card Visi */
.about-visi-box::before {
    content: '';
    position: absolute;
    top: -50px;
    right: -50px;
    width: 150px;
    height: 150px;
    background: rgba(255,255,255,0.05);
    border-radius: 50%;
}
.about-visi-box::after {
    content: '';
    position: absolute;
    bottom: -30px;
    right: -20px;
    width: 100px;
    height: 100px;
    border: 15px solid rgba(255,255,255,0.05);
    border-radius: 50%;
}

.about-visi-box h3 {
    font-size: 1.2rem;
    font-weight: 700;
    color: #fbbf24; /* Yellow */
    margin: 0 0 24px;
    position: relative;
    z-index: 2;
}

.about-visi-box blockquote {
    font-size: 1.15rem;
    font-weight: 500;
    line-height: 1.7;
    color: #ffffff;
    margin: 0;
    position: relative;
    z-index: 2;
}

.about-misi-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.about-misi-item {
    background: #f4f6f9;
    border-radius: 8px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    border-left: 4px solid transparent;
}

.misi-1 { border-left-color: #16a34a; }
.misi-2 { border-left-color: #f97316; }
.misi-3 { border-left-color: #fbbf24; }
.misi-4 { border-left-color: #003d6a; }

.about-misi-num {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    font-weight: 700;
    font-size: 1rem;
    display: grid;
    place-items: center;
}

.misi-1 .about-misi-num { background: #dcfce7; color: #16a34a; }
.misi-2 .about-misi-num { background: #ffedd5; color: #f97316; }
.misi-3 .about-misi-num { background: #fef3c7; color: #fbbf24; }
.misi-4 .about-misi-num { background: #e0f2fe; color: #003d6a; }

.about-misi-item p {
    font-size: 0.9rem;
    color: #334155;
    line-height: 1.6;
    margin: 0;
}

/* ---- TUGAS DAN FUNGSI (UPDATED) ---- */
.about-tugfung-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
    align-items: stretch;
}

.about-tugas-card {
    background: #f8faff;
    border-radius: 12px;
    padding: 32px;
    border-top: 4px solid transparent;
}

.tugas-pokok-card { border-top-color: #003d6a; }
.fungsi-utama-card { border-top-color: #16a34a; }

.about-tugas-card-head {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #cbd5e1;
}

.about-tugas-card-head svg {
    width: 20px;
    height: 20px;
}

.tugas-pokok-card .about-tugas-card-head svg { color: #f97316; } /* Orange Icon */
.fungsi-utama-card .about-tugas-card-head svg { color: #16a34a; } /* Green Icon */

.about-tugas-card h3 {
    font-size: 1.15rem;
    font-weight: 700;
    color: #003d6a;
    margin: 0;
}

.about-tugas-card p {
    font-size: 0.9rem;
    color: #475569;
    line-height: 1.8;
    margin: 0;
}

.about-fungsi-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.about-fungsi-list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 0.9rem;
    color: #475569;
    line-height: 1.6;
}

.about-fungsi-list li::before {
    content: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="%2316a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>');
    display: block;
    width: 18px;
    height: 18px;
    flex-shrink: 0;
    margin-top: 2px;
}

/* ---- STRUKTUR ORGANISASI ---- */
.about-struktur-header {
    text-align: center;
    margin-bottom: 36px;
}

.about-struktur-header h2 {
    font-size: clamp(1.5rem, 2.5vw, 1.8rem);
    font-weight: 500;
    color: #003d6a;
    margin: 0 0 10px;
    letter-spacing: -0.02em;
}

.about-struktur-header p {
    font-size: 0.92rem;
    color: #64748b;
    max-width: 460px;
    margin: 0 auto;
}

.about-org-placeholder {
    background: #f1f5f9;
    border: 2px dashed #cbd5e1;
    border-radius: 16px;
    min-height: 300px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 14px;
    color: #94a3b8;
}

.about-org-placeholder svg {
    opacity: 0.4;
}

.about-org-placeholder p {
    font-size: 0.88rem;
    margin: 0;
    text-align: center;
    max-width: 260px;
    line-height: 1.5;
}

/* ---- RESPONSIVE ---- */
@media (max-width: 1024px) {
    .about-hero,
    .about-tentang,
    .about-vismis-grid,
    .about-tugfung-grid { grid-template-columns: 1fr; }
    .about-hero,
    .about-section { padding: 48px 40px; }
    .about-stats { padding: 40px; }
    .about-stats-inner { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 640px) {
    .about-hero,
    .about-section { padding: 36px 20px; }
    .about-stats { padding: 32px 20px; }
    .about-stats-inner { grid-template-columns: 1fr; }
    .about-misi-grid { grid-template-columns: 1fr; }
    .about-wrapper { margin: 0 -18px; }
}
</style>
@endpush

@section('content')
<div class="about-wrapper">

    {{-- ===== HERO PROFIL ===== --}}
    <section class="about-hero">
        <div>
            <h1 class="about-hero-title">Profil Diciptabintar</h1>
            <p class="about-hero-desc">
                Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang Kota Bandung adalah unsur pelaksana urusan pemerintahan bidang pekerjaan umum dan penataan ruang yang menjadi kewenangan Daerah Kota Bandung.
            </p>
        </div>
        <div class="about-hero-img">
            <img src="{{ asset('images/about-hero.png') }}" alt="Gedung Diciptabintar">
        </div>
    </section>

    {{-- ===== STATS BAR ===== --}}
    <div class="about-stats">
        <div class="about-stats-inner">
            <div class="about-stat-item stat-green">
                <div class="about-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 1.5L18.5 9H13V3.5zM18 20H6V4h5v6h7v10z"/><path d="M8 12h8v2H8zm0 4h8v2H8z"/></svg>
                </div>
                <div>
                    <div class="about-stat-number">5</div>
                    <div class="about-stat-label">Layanan Publik</div>
                </div>
            </div>
            
            <div class="about-stat-item stat-blue">
                <div class="about-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M19 2H9c-1.103 0-2 .897-2 2v5.586l-4.707 4.707A1 1 0 0 0 2 15v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4c0-1.103-.897-2-2-2zM4 19v-3.586l3-3L10.586 16H4v3zm16 0h-4v-4c0-1.103-.897-2-2-2h-3V4h9v15z"/><path d="M11 6h2v2h-2zm4 0h2v2h-2zm-4 4h2v2h-2zm4 0h2v2h-2zm0 4h2v2h-2z"/></svg>
                </div>
                <div>
                    <div class="about-stat-number">5</div>
                    <div class="about-stat-label">Bidang Teknis</div>
                </div>
            </div>

            <div class="about-stat-item stat-orange">
                <div class="about-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M21.2 5.8a2.83 2.83 0 0 0-4-4l-8 8a2.83 2.83 0 0 0 0 4l-1.5 1.5a1 1 0 0 0-.3.7v3h-3a1 1 0 0 0-.7.3L1.5 21.5a1 1 0 0 0 1.4 1.4l2.2-2.2v-3a1 1 0 0 0-1-1h-2L9.2 9.6l1.5-1.5a2.83 2.83 0 0 0 4 0l6.5-2.3zM10.4 11.2a.82.82 0 0 1-1.2 0l-1.2-1.2a.82.82 0 0 1 0-1.2l6-6a.82.82 0 0 1 1.2 0l1.2 1.2a.82.82 0 0 1 0 1.2z"/></svg>
                </div>
                <div>
                    <div class="about-stat-number">111</div>
                    <div class="about-stat-label">Regulasi</div>
                </div>
            </div>

            <div class="about-stat-item stat-yellow">
                <div class="about-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M20 3H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM4 19V5h16v14z"/><path d="M6 7h12v2H6zm0 4h12v2H6zm0 4h8v2H6z"/></svg>
                </div>
                <div>
                    <div class="about-stat-number">500+</div>
                    <div class="about-stat-label">Berita Dipublikasikan</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== TENTANG DINAS ===== --}}
    <section class="about-section">
        <div class="about-tentang">
            <div class="about-office-img">
                <img src="{{ asset('images/about-office.png') }}" alt="Kantor Diciptabintar">
            </div>
            <div>
                <div class="about-section-eyebrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    <h2>Tentang Dinas</h2>
                </div>
                <p class="about-section-text">
                    Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang Kota Bandung dibentuk berdasarkan Peraturan Daerah Kota Bandung untuk menyelenggarakan urusan pemerintahan daerah di bidang penataan ruang, bangunan gedung, perumahan, kawasan permukiman, dan jasa konstruksi.
                </p>
                <p class="about-section-text">
                    Komitmen kami adalah mewujudkan infrastruktur perkotaan yang berkualitas, tertib ijin, dan berwawasan lingkungan guna mendukung Kota Bandung yang unggul, nyaman, sejahtera, dan agamis.
                </p>
            </div>
        </div>
    </section>

    {{-- ===== VISI & MISI ===== --}}
    <section class="about-section about-section-alt">
        <div class="about-vismis-header">
            <h2>Visi &amp; Misi</h2>
            <p>Arah kebijakan dan tujuan strategis pembangunan infrastruktur dan penataan ruang Kota Bandung.</p>
        </div>

        <div class="about-vismis-grid">
            {{-- VISI --}}
            <div class="about-visi-box">
                <h3>Visi</h3>
                <blockquote>
                    "Mewujudkan infrastruktur dan penataan ruang Kota Bandung yang berkualitas, berkeadilan, dan berkelanjutan."
                </blockquote>
            </div>

            {{-- MISI --}}
            <div class="about-misi-grid">
                <div class="about-misi-item misi-1">
                    <div class="about-misi-num">1</div>
                    <p>Meningkatkan kualitas perencanaan dan penataan ruang kota yang terintegrasi dan responsif.</p>
                </div>
                <div class="about-misi-item misi-2">
                    <div class="about-misi-num">2</div>
                    <p>Menyediakan infrastruktur bangunan gedung dan sarana prasarana kota yang handal.</p>
                </div>
                <div class="about-misi-item misi-3">
                    <div class="about-misi-num">3</div>
                    <p>Mewujudkan pembinaan jasa konstruksi yang profesional dan berdaya saing.</p>
                </div>
                <div class="about-misi-item misi-4">
                    <div class="about-misi-num">4</div>
                    <p>Meningkatkan tata kelola pemerintahan yang baik, bersih, dan akuntabel.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== TUGAS DAN FUNGSI ===== --}}
    <section class="about-section">
        <div class="about-vismis-header">
            <h2>Tugas dan Fungsi</h2>
        </div>
        
        <div class="about-tugfung-grid">
            {{-- Tugas Pokok --}}
            <div class="about-tugas-card tugas-pokok-card">
                <div class="about-tugas-card-head">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3>Tugas Pokok</h3>
                </div>
                <p>
                    Membantu Wali Kota melaksanakan urusan pemerintahan yang menjadi kewenangan Daerah dan tugas pembantuan di bidang pekerjaan umum dan penataan ruang meliputi sub urusan penataan bangunan dan lingkungannya, sub urusan jasa konstruksi serta sub urusan penataan ruang.
                </p>
            </div>

            {{-- Fungsi Utama --}}
            <div class="about-tugas-card fungsi-utama-card">
                <div class="about-tugas-card-head">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3>Fungsi Utama</h3>
                </div>
                <ul class="about-fungsi-list">
                    <li>Perumusan kebijakan teknis di bidang tata ruang dan bangunan.</li>
                    <li>Penyelenggaraan pelayanan umum di bidang perizinan terkait tata ruang.</li>
                    <li>Pembinaan, pengawasan, dan pengendalian pelaksanaan tugas bidang terkait.</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- ===== STRUKTUR ORGANISASI ===== --}}
    <section id="struktur-organisasi" class="about-section about-section-alt">
        <div class="about-struktur-header">
            <h2>Struktur Organisasi</h2>
            <p>Bagan struktur organisasi Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang Kota Bandung.</p>
        </div>

        <div class="about-org-placeholder">
            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="#94a3b8" viewBox="0 0 16 16">
                <path d="M11 13.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-4 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-4 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                <path d="M11 8.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-8 5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                <path fill-rule="evenodd" d="M7.5 1a.5.5 0 0 1 .5.5v1h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h1V1.5a.5.5 0 0 1 .5-.5zM5 3.5h6v1H5v-1zM7.5 5.5v2h1v-2h-1zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v.5H4V8zm-.5 1h9v.5H3.5V9zm.5 1.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5V11H4v-.5zm4 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5V11H8v-.5z"/>
            </svg>
            <p>[Placeholder Bagan Struktur Organisasi]<br><small>Gambar atau Diagram struktur akan ditampilkan di sini.</small></p>
        </div>
    </section>

</div>
@endsection