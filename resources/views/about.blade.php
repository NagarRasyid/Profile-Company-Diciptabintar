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

/* ---- WOBBLE KEYFRAMES ---- */
@keyframes wobble-stat {
    0%   { transform: rotate(0deg) scale(1); }
    20%  { transform: rotate(-4deg) scale(1.04); }
    40%  { transform: rotate(4deg) scale(1.04); }
    60%  { transform: rotate(-2deg) scale(1.02); }
    80%  { transform: rotate(1deg); }
    100% { transform: rotate(0deg) scale(1); }
}

@keyframes wobble-visi {
    0%   { transform: rotate(0deg); }
    20%  { transform: rotate(-2deg) translateY(-2px); }
    40%  { transform: rotate(2deg) translateY(-2px); }
    60%  { transform: rotate(-1deg) translateY(-1px); }
    80%  { transform: rotate(1deg); }
    100% { transform: rotate(0deg); }
}

@keyframes wobble-misi {
    0%   { transform: rotate(0deg); }
    20%  { transform: rotate(-3deg) translateY(-2px); }
    40%  { transform: rotate(3deg) translateY(-2px); }
    60%  { transform: rotate(-1.5deg); }
    80%  { transform: rotate(0.5deg); }
    100% { transform: rotate(0deg); }
}

@keyframes wobble-card {
    0%   { transform: rotate(0deg); }
    15%  { transform: rotate(-2.5deg) translateY(-3px); }
    35%  { transform: rotate(2.5deg) translateY(-3px); }
    55%  { transform: rotate(-1deg) translateY(-1px); }
    75%  { transform: rotate(0.5deg); }
    100% { transform: rotate(0deg); }
}



/* ---- HERO PROFIL ---- */
.about-hero {
    background: #f1f1f4;
    padding: 64px 80px 60px;
    border-bottom: 1px solid #e5eaf2;
}

.about-hero-inner {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
}

.about-hero-eyebrow {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    color: #003d6a;
    margin-bottom: 12px;
}

.about-hero-title {
    font-size: clamp(2.5rem, 3.2vw, 3.3rem);
    font-weight: 700;
    color: #002745;
    line-height: 1.2;
    margin: 0 0 16px;
}

.about-hero-desc {
    font-size: 1.1rem;
    color: #52565e;
    line-height: 1.75;
    margin: 0;
    max-width: 600px;
}

.about-hero-img {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0, 61, 106, 0.15);
    aspect-ratio: 16/9;
    width: 600px;
    height: auto;
    border: 4px solid #ffffff; 
    box-sizing: border-box;
}

.about-hero-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: all 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}

.about-hero-img:hover img {
    transform: scale(1.05);
}

/* ---- STATS BAR ---- */
.about-stats {
    background: #ffffff;
    padding: 40px 80px;
}

.about-stats-inner {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.about-stat-item {
    background: #f1f1f4;
    padding: 32px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    border-radius: 8px;
    border-top: 4px solid transparent;
    cursor: default;
    transform-origin: center bottom;
}

.about-stat-item:hover {
    animation: wobble-stat 0.5s ease forwards;
}

.about-stat-item.stat-green  { border-top-color: #16a34a; }
.about-stat-item.stat-blue   { border-top-color: #003d6a; }
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

.stat-green  .about-stat-icon { color: #16a34a; }
.stat-blue   .about-stat-icon { color: #003d6a; }
.stat-orange .about-stat-icon { color: #f97316; }
.stat-yellow .about-stat-icon { color: #fbbf24; }

.about-stat-number {
    font-size: 2rem;
    font-weight: 800;
    color: #003d6a;
    line-height: 1;
    margin-bottom: 8px;
}

.about-stat-label {
    font-size: 0.9rem;
    color: #475569;
    font-weight: 600;
}

/* ---- TENTANG DINAS ---- */
.about-section {
    padding: 72px 80px;
}

.about-section-tentang {
    background: #f8f8f9;
}

.about-section-vismis {
    background: #f9f9fd;
}

.about-section-tugas-fungsi {
    background: #f1f1f4;
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
    width: 600px;
    height: auto;
    border: 4px solid #ffffff; 
    box-sizing: border-box;
}

.about-office-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: all 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}

.about-office-img:hover img {
    transform: scale(1.05);
}

.about-struktur-img {
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 12px 36px rgba(0, 0, 0, 0.10);
    max-width: 900px;
    margin: 0 auto;
    position: relative;
    cursor: zoom-in;
}

.about-struktur-img::after {
    content: '🔍 Klik untuk perbesar';
    position: absolute;
    bottom: 12px;
    right: 14px;
    background: rgba(0,0,0,0.55);
    color: #fff;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 5px 12px;
    border-radius: 999px;
    opacity: 0;
    transition: opacity 0.2s ease;
    pointer-events: none;
}

.about-struktur-img:hover::after {
    opacity: 1;
}

.about-struktur-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.about-section-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 1.6rem;
    font-weight: 700;
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
    line-height: 1.25;
}

.about-section-text {
    font-size: 1.1rem;
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
}

.about-vismis-header p {
    font-size: 1rem;
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

.about-visi-box:hover {
    animation: wobble-visi 0.5s ease forwards;
}

.about-misi-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.about-misi-item {
    background: #f4f6f9;
    border-radius: 8px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    border-left: 4px solid transparent;
    transform-origin: center bottom;
}

.about-misi-item:last-child {
    grid-column: 1 / -1;
    width: calc(50% - 7.5px); 
    margin: 0 auto;
}

.about-misi-item:hover {
    animation: wobble-misi 0.5s ease forwards;
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
    font-size: 1rem;
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
    transform-origin: center bottom;
}

.about-tugas-card:hover {
    animation: wobble-card 0.55s ease forwards;
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

.tugas-pokok-card .about-tugas-card-head svg { color: #f97316; }
.fungsi-utama-card .about-tugas-card-head svg { color: #16a34a; }

.about-tugas-card h3 {
    font-size: 1.15rem;
    font-weight: 700;
    color: #003d6a;
    margin: 0;
}

.about-tugas-card p {
    font-size: 1rem;
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
    font-size: 1rem;
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
}

.about-struktur-header p {
    font-size: 1.2rem;
    color: #64748b;
    max-width: 700px;
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
@media (max-width: 1280px) {
    .about-hero { padding: 56px 60px 52px; }
    .about-stats { padding: 40px 60px; }
}

@media (max-width: 1024px) {
    .about-hero-inner,
    .about-tentang,
    .about-vismis-grid,
    .about-tugfung-grid { grid-template-columns: 1fr; }
    .about-hero { padding: 48px 40px; }
    .about-section { padding: 48px 40px; }
    .about-stats { padding: 40px; }
    .about-stats-inner { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 640px) {
    .about-hero { padding: 36px 20px; }
    .about-section { padding: 36px 20px; }
    .about-stats { padding: 32px 20px; }
    .about-stats-inner { grid-template-columns: 1fr; }
    .about-misi-grid { grid-template-columns: 1fr; }
    .about-wrapper { margin: 0 -18px; }
}

/* ---- LIGHTBOX ZOOM ---- */
.lightbox-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.9);
    z-index: 9999;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}

.lightbox-overlay.active {
    opacity: 1;
    pointer-events: auto;
}

.lightbox-toolbar {
    position: absolute;
    top: 20px;
    right: 30px;
    display: flex;
    gap: 12px;
    z-index: 10000;
}

.lightbox-btn {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.lightbox-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.05);
}

.lightbox-img-container {
    width: 90vw;
    height: 85vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    cursor: grab;
}

.lightbox-img-container:active {
    cursor: grabbing;
}

.lightbox-img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.2s cubic-bezier(0.25, 1, 0.5, 1);
    transform-origin: center center;
    user-select: none;
}
</style>
@endpush

@section('content')
<div class="about-wrapper">

    {{-- ===== HERO PROFIL ===== --}}
    <section class="about-hero">
        <div class="about-hero-inner">
            <div>
                <h1 class="about-hero-title">Profil Diciptabintar</h1>
                <p class="about-hero-desc">
                    Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang Kota Bandung adalah unsur pelaksana urusan pemerintahan bidang pekerjaan umum dan penataan ruang yang menjadi kewenangan Daerah Kota Bandung.
                </p>
            </div>
            <div class="about-hero-img">
                <img src="{{ asset('images/about-hero.jpg') }}" alt="Gedung Diciptabintar">
            </div>
        </div>
    </section>

    {{-- ===== STATS BAR ===== --}}
    <div class="about-stats">
        <div class="about-stats-inner">

            {{-- Layanan Publik --}}
            <div class="about-stat-item stat-green">
                <div class="about-stat-icon">
                    <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 20H15V17.5H5V20ZM5 15H15V12.5H5V15ZM2.5 25C1.8125 25 1.22396 24.7552 0.734375 24.2656C0.244792 23.776 0 23.1875 0 22.5V2.5C0 1.8125 0.244792 1.22396 0.734375 0.734375C1.22396 0.244792 1.8125 0 2.5 0H12.5L20 7.5V22.5C20 23.1875 19.7552 23.776 19.2656 24.2656C18.776 24.7552 18.1875 25 17.5 25H2.5ZM11.25 8.75H17.5L11.25 2.5V8.75Z" fill="#219653"/>
                    </svg>
                </div>
                <div>
                    <div class="about-stat-number">{{ $stats['layanan'] }}</div>
                    <div class="about-stat-label">Layanan Publik</div>
                </div>
            </div>

            {{-- Bidang Teknis --}}
            <div class="about-stat-item stat-blue">
                <div class="about-stat-icon">
                    <svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 22.5V0H12.5V5H25V22.5H0ZM2.5 20H5V17.5H2.5V20ZM2.5 15H5V12.5H2.5V15ZM2.5 10H5V7.5H2.5V10ZM2.5 5H5V2.5H2.5V5ZM7.5 20H10V17.5H7.5V20ZM7.5 15H10V12.5H7.5V15ZM7.5 10H10V7.5H7.5V10ZM7.5 5H10V2.5H7.5V5ZM12.5 20H22.5V7.5H12.5V10H15V12.5H12.5V15H15V17.5H12.5V20ZM17.5 12.5V10H20V12.5H17.5ZM17.5 17.5V15H20V17.5H17.5Z" fill="#003D6A"/>
                    </svg>
                </div>
                <div>
                    <div class="about-stat-number">{{ $stats['bidang'] }}</div>
                    <div class="about-stat-label">Bidang Teknis</div>
                </div>
            </div>

            {{-- Regulasi (dari API SIPETRUK, di-cache 1 jam) --}}
            <div class="about-stat-item stat-orange">
                <div class="about-stat-icon">
                    <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 23.75V21.25H15V23.75H0ZM7.0625 17.6875L0 10.625L2.625 7.9375L9.75 15L7.0625 17.6875ZM15 9.75L7.9375 2.625L10.625 0L17.6875 7.0625L15 9.75ZM20.75 22.5L4.4375 6.1875L6.1875 4.4375L22.5 20.75L20.75 22.5Z" fill="#E87A35"/>
                    </svg>
                </div>
                <div>
                    <div class="about-stat-number">{{ $stats['regulasi'] }}</div>
                    <div class="about-stat-label">Regulasi</div>
                </div>
            </div>

            {{-- Berita Dipublikasikan --}}
            <div class="about-stat-item stat-yellow">
                <div class="about-stat-icon">
                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.5 22.5C1.8125 22.5 1.22396 22.2552 0.734375 21.7656C0.244792 21.276 0 20.6875 0 20V2.5C0 1.8125 0.244792 1.22396 0.734375 0.734375C1.22396 0.244792 1.8125 0 2.5 0H20C20.6875 0 21.276 0.244792 21.7656 0.734375C22.2552 1.22396 22.5 1.8125 22.5 2.5V20C22.5 20.6875 22.2552 21.276 21.7656 21.7656C21.276 22.2552 20.6875 22.5 20 22.5H2.5ZM5 17.5H13.75V15H5V17.5ZM5 12.5H17.5V10H5V12.5ZM5 7.5H17.5V5H5V7.5Z" fill="#F2C94C"/>
                    </svg>
                </div>
                <div>
                    <div class="about-stat-number">{{ $stats['berita'] }}</div>
                    <div class="about-stat-label">Berita Dipublikasikan</div>
                </div>
            </div>

        </div>
    </div>

    {{-- ===== TENTANG DINAS ===== --}}
    <section class="about-section about-section-tentang">
        <div class="about-tentang">
            <div class="about-office-img">
                <img src="{{ asset('images/about-office.jpg') }}" alt="Kantor Diciptabintar">
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
                    Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang Kota Bandung dibentuk untuk melaksanakan ketentuan Peraturan Daerah Kota Bandung Nomor 08 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Bandung sebagaimana telah diubah dengan Peraturan Daerah Kota Bandung Nomor 3 Tahun 2021.
                </p>
                <p class="about-section-text">
                    Dinas merupakan unsur pelaksana Urusan Pemerintahan yang menyelenggarakan urusan pemerintahan bidang pekerjaan umum dan penataan ruang sektor cipta karya, bina konstruksi, tata ruang dan pemakaman, yang berkedudukan di bawah dan bertanggung jawab kepada Wali Kota melalui Sekretaris Daerah.
                </p>
            </div>
        </div>
    </section>

    {{-- ===== VISI & MISI ===== --}}
    <section class="about-section about-section-vismis">
        <div class="about-vismis-header">
            <h2>Tujuan &amp; Sasaran</h2>
            <p>Arah kebijakan dan tujuan strategis pembangunan infrastruktur dan penataan ruang Kota Bandung.</p>
        </div>

        <div class="about-vismis-grid">
            {{-- VISI --}}
            <div class="about-visi-box">
                <h3>Tujuan</h3>
                <blockquote>
                    "Meningkatnya Kelayakhunian Kota Aspek Tata Ruang."
                </blockquote>
            </div>

            {{-- MISI --}}
            <div class="about-misi-grid">
                <div class="about-misi-item misi-1">
                    <div class="about-misi-num">1</div>
                    <p>Meningkatnya Perencanaan Bangunan Gedung yang Memenuhi Standar Teknis Bangunan.</p>
                </div>
                <div class="about-misi-item misi-2">
                    <div class="about-misi-num">2</div>
                    <p>Meningkatnya Kualisat Penataan Ruang.</p>
                </div>
                <div class="about-misi-item misi-3">
                    <div class="about-misi-num">3</div>
                    <p>Mengingkatnya Kualitas Pelayanan Urusan Penataan Ruang.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== TUGAS DAN FUNGSI ===== --}}
    <section class="about-section about-section-tugas-fungsi">
        <div class="about-vismis-header">
            <h2>Tugas dan Fungsi</h2>
        </div>
        
        <div class="about-tugfung-grid">
            {{-- Tugas Pokok --}}
            <div class="about-tugas-card tugas-pokok-card">
                <div class="about-tugas-card-head">
                    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 20C1.45 20 0.979167 19.8042 0.5875 19.4125C0.195833 19.0208 0 18.55 0 18V4C0 3.45 0.195833 2.97917 0.5875 2.5875C0.979167 2.19583 1.45 2 2 2H6.2C6.41667 1.4 6.77917 0.916667 7.2875 0.55C7.79583 0.183333 8.36667 0 9 0C9.63333 0 10.2042 0.183333 10.7125 0.55C11.2208 0.916667 11.5833 1.4 11.8 2H16C16.55 2 17.0208 2.19583 17.4125 2.5875C17.8042 2.97917 18 3.45 18 4V18C18 18.55 17.8042 19.0208 17.4125 19.4125C17.0208 19.8042 16.55 20 16 20H2ZM2 18H16V4H2V18ZM4 16H11V14H4V16ZM4 12H14V10H4V12ZM4 8H14V6H4V8ZM9 3.25C9.21667 3.25 9.39583 3.17917 9.5375 3.0375C9.67917 2.89583 9.75 2.71667 9.75 2.5C9.75 2.28333 9.67917 2.10417 9.5375 1.9625C9.39583 1.82083 9.21667 1.75 9 1.75C8.78333 1.75 8.60417 1.82083 8.4625 1.9625C8.32083 2.10417 8.25 2.28333 8.25 2.5C8.25 2.71667 8.32083 2.89583 8.4625 3.0375C8.60417 3.17917 8.78333 3.25 9 3.25ZM2 18V4V18Z" fill="#E87A35"/>
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
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 18V15H9V5H7V8H0V0H7V3H13V0H20V8H13V5H11V13H13V10H20V18H13ZM2 2V6V2ZM15 12V16V12ZM15 2V6V2ZM15 6H18V2H15V6ZM15 16H18V12H15V16ZM2 6H5V2H2V6Z" fill="#219653"/>
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

        <div class="about-struktur-img" id="strukturImgWrap">
            <img src="{{ asset('images/Struktur-org.png') }}" alt="Struktur Organisasi Diciptabintar" id="strukturImg">
        </div>
    </section>

</div>

{{-- LIGHTBOX OVERLAY --}}
<div class="lightbox-overlay" id="lightboxOverlay">
    <div class="lightbox-toolbar">
        <button class="lightbox-btn" id="btnZoomOut" title="Zoom Out (Scroll Down)">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" /></svg>
        </button>
        <button class="lightbox-btn" id="btnZoomIn" title="Zoom In (Scroll Up)">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
        </button>
        <button class="lightbox-btn" id="btnCloseLightbox" title="Tutup (Esc)" style="margin-left: 12px; background: rgba(239, 68, 68, 0.2); border-color: rgba(239, 68, 68, 0.4);">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
    </div>
    
    <div class="lightbox-img-container" id="lightboxContainer">
        <img src="{{ asset('images/Struktur-org.png') }}" alt="Struktur Zoom" class="lightbox-img" id="lightboxImg">
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const triggerWrap = document.getElementById('strukturImgWrap');
        const overlay = document.getElementById('lightboxOverlay');
        const container = document.getElementById('lightboxContainer');
        const img = document.getElementById('lightboxImg');
        const btnClose = document.getElementById('btnCloseLightbox');
        const btnZoomIn = document.getElementById('btnZoomIn');
        const btnZoomOut = document.getElementById('btnZoomOut');
        
        let scale = 1;
        const scaleStep = 0.2;
        const minScale = 0.5;
        const maxScale = 5;

        let isDragging = false;
        let startX, startY;
        let translateX = 0, translateY = 0;

        function updateTransform() {
            img.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
        }

        function resetZoom() {
            scale = 1;
            translateX = 0;
            translateY = 0;
            updateTransform();
        }

        // Buka Lightbox
        triggerWrap.addEventListener('click', () => {
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
            resetZoom();
        });

        // Tutup Lightbox
        function closeLightbox() {
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        btnClose.addEventListener('click', closeLightbox);
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay || e.target === container) closeLightbox();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && overlay.classList.contains('active')) closeLightbox();
        });

        // Zoom dengan Scroll (Mouse Wheel)
        container.addEventListener('wheel', (e) => {
            e.preventDefault();
            if (e.deltaY < 0) {
                scale = Math.min(scale + scaleStep, maxScale); // Zoom In
            } else {
                scale = Math.max(scale - scaleStep, minScale); // Zoom Out
            }
            updateTransform();
        }, { passive: false });

        // Tombol Zoom In/Out
        btnZoomIn.addEventListener('click', () => {
            scale = Math.min(scale + scaleStep, maxScale);
            updateTransform();
        });
        
        btnZoomOut.addEventListener('click', () => {
            scale = Math.max(scale - scaleStep, minScale);
            updateTransform();
        });

        // Fitur Drag & Pan (Geser)
        img.addEventListener('mousedown', (e) => {
            if (scale > 1) {
                isDragging = true;
                startX = e.clientX - translateX;
                startY = e.clientY - translateY;
            }
        });

        window.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            translateX = e.clientX - startX;
            translateY = e.clientY - startY;
            updateTransform();
        });

        window.addEventListener('mouseup', () => {
            isDragging = false;
        });
        
        // Mencegah default drag image dari browser
        img.addEventListener('dragstart', (e) => e.preventDefault());
    });
</script>
@endpush