@extends('layouts.app')

@section('title', 'Beranda')

@push('styles')
<style>
.home-page-wrapper {
    margin: 0 -32px;
}

.hero {
    background: #eef0f2;
    padding: 66px 80px 160px;
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
    font-size: clamp(3rem, 3.3vw, 3.4rem);
    font-weight: 700;
    color: #0a1628;
    line-height: 1.2;
    margin: 0 0 18px;
}

.hero-desc {
    font-size: 1.12rem;
    color: #52565e;
    line-height: 1.7;
    margin: 0 0 32px;
    max-width: 550px;
}

.hero-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

.hero-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: #003d6a;
    color: #f9f9fd;
    border-radius: 999px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    transition: background 0.38s ease, transform 0.38s ease;
    box-shadow: 0 6px 18px rgba(0, 61, 106, 0.25);
}

.hero-btn:hover {
    background: #f9f9fd;
    color: #09436e;
    transform: translateY(-0.5px);
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
    background: #f9f9fd;
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
    font-size: 1.2rem;
    font-weight: 600;
    color: #0a1628;
    margin: 0 0 6px;
}

.qa-card p {
    font-size: 0.92rem;
    color: #64748b;
    line-height: 1.5;
    margin: 0;
}

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
}

.section-header p {
    font-size: 1rem;
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
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.layanan-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: var(--bg-icon);
    background-repeat: no-repeat;
    background-position: right 15px bottom 15px;
    background-size: 90px;
    opacity: 0.35;
    z-index: -1;
    transition: all 0.3s ease;
}

.layanan-card:hover::before {
    opacity: 0.70;
    transform: scale(1.1);
}

.layanan-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 32px rgba(0, 0, 0, 0.10);
}

.layanan-card h3 {
    font-size: 1.2rem;
    font-weight: 700;
    color: #0a1628;
    margin: 0 0 8px;
}

.layanan-card p {
    font-size: 0.94rem;
    color: #64748b;
    line-height: 1.6;
    margin: 0 0 20px;
    flex: 1;
}

.layanan-link {
    font-size: 0.94rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: gap 0.18s ease;
}

.layanan-link:hover { 
    gap: 8px; 
}

.layanan-link-blue:hover   { color: #2563eb; }
.layanan-link-green:hover  { color: #16a34a; }
.layanan-link-red:hover   { color: #e11d48; }
.layanan-link-teal:hover   { color: #0891b2; }
.layanan-link-yellow:hover   { color: #f97316; }

.news-card {
    background: #f9f9fd;
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
                <a href="{{ route('about') }}" class="hero-btn">
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

    <div class="quick-access">
        <div class="quick-access-grid">
            <a href="{{ route('layanan.index') }}" class="qa-card">
                <div class="qa-icon qa-icon-blue">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 20C8.61667 20 7.31667 19.7375 6.1 19.2125C4.88333 18.6875 3.825 17.975 2.925 17.075C2.025 16.175 1.3125 15.1167 0.7875 13.9C0.2625 12.6833 0 11.3833 0 10C0 8.61667 0.2625 7.31667 0.7875 6.1C1.3125 4.88333 2.025 3.825 2.925 2.925C3.825 2.025 4.88333 1.3125 6.1 0.7875C7.31667 0.2625 8.61667 0 10 0C11.3833 0 12.6833 0.2625 13.9 0.7875C15.1167 1.3125 16.175 2.025 17.075 2.925C17.975 3.825 18.6875 4.88333 19.2125 6.1C19.7375 7.31667 20 8.61667 20 10C20 11.3833 19.7375 12.6833 19.2125 13.9C18.6875 15.1167 17.975 16.175 17.075 17.075C16.175 17.975 15.1167 18.6875 13.9 19.2125C12.6833 19.7375 11.3833 20 10 20ZM9 17.95V16C8.45 16 7.97917 15.8042 7.5875 15.4125C7.19583 15.0208 7 14.55 7 14V13L2.2 8.2C2.15 8.5 2.10417 8.8 2.0625 9.1C2.02083 9.4 2 9.7 2 10C2 12.0167 2.6625 13.7833 3.9875 15.3C5.3125 16.8167 6.98333 17.7 9 17.95ZM15.9 15.4C16.5833 14.65 17.1042 13.8125 17.4625 12.8875C17.8208 11.9625 18 11 18 10C18 8.36667 17.5458 6.875 16.6375 5.525C15.7292 4.175 14.5167 3.2 13 2.6V3C13 3.55 12.8042 4.02083 12.4125 4.4125C12.0208 4.80417 11.55 5 11 5H9V7C9 7.28333 8.90417 7.52083 8.7125 7.7125C8.52083 7.90417 8.28333 8 8 8H6V10H12C12.2833 10 12.5208 10.0958 12.7125 10.2875C12.9042 10.4792 13 10.7167 13 11V14H14C14.4333 14 14.825 14.1292 15.175 14.3875C15.525 14.6458 15.7667 14.9833 15.9 15.4Z" fill="#023D68"/>
                    </svg>
                </div>
                <h3>Layanan Publik</h3>
                <p>Akses berbagai layanan perizinan dan administratif.</p>
            </a>
            <a href="{{ route('regulasi.index') }}" class="qa-card">
                <div class="qa-icon qa-icon-green">
                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 19V17H12V19H0ZM5.65 14.15L0 8.5L2.1 6.35L7.8 12L5.65 14.15ZM12 7.8L6.35 2.1L8.5 0L14.15 5.65L12 7.8ZM16.6 18L3.55 4.95L4.95 3.55L18 16.6L16.6 18Z" fill="#112000"/>
                    </svg>
                </div>
                <h3>Regulasi</h3>
                <p>Dokumen hukum dan kebijakan tata ruang kota.</p>
            </a>
            <a href="{{ route('bidang.index') }}" class="qa-card">
                <div class="qa-icon qa-icon-orange">
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 18V0H10V4H20V18H0ZM2 16H4V14H2V16ZM2 12H4V10H2V12ZM2 8H4V6H2V8ZM2 4H4V2H2V4ZM6 16H8V14H6V16ZM6 12H8V10H6V12ZM6 8H8V6H6V8ZM6 4H8V2H6V4ZM10 16H18V6H10V8H12V10H10V12H12V14H10V16ZM14 10V8H16V10H14ZM14 14V12H16V14H14Z" fill="#370E00"/>
                    </svg>
                </div>
                <h3>Informasi Bidang</h3>
                <p>Struktur dan tugas pokok fungsi tiap bidang.</p>
            </a>
            <a href="{{ route('berita.index') }}" class="qa-card">
                <div class="qa-icon qa-icon-pink">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H2ZM4 14H11V12H4V14ZM4 10H14V8H4V10ZM4 6H14V4H4V6Z" fill="#93000A"/>
                    </svg>
                </div>
                <h3>Berita Terkini</h3>
                <p>Informasi dan pengumuman terbaru dari dinas.</p>
            </a>
        </div>
    </div>

    <div class="section-layanan">
        <div class="section-header">
            <h2>Layanan Utama</h2>
            <p>Kami menyediakan berbagai layanan elektronik untuk memudahkan masyarakat dalam mengurus perizinan dan tata ruang.</p>
        </div>

        <div class="layanan-grid">
            <div class="layanan-card" style="--bg-icon: url('{{ asset('images/krk.png') }}');">
                <h3>KRK New</h3>
                <p>Sistem Informasi Manajemen Bangunan Gedung Terintegrasi.</p>
                <a href="https://diciptabintar.bandung.go.id/auth/login?redirect=https://diciptabintar.bandung.go.id/layanan/irk/pendaftaran_irk/syarat" target="_blank" class="layanan-link layanan-link-blue">Akses Layanan &rarr;</a>
            </div>

            <div class="layanan-card" style="--bg-icon: url('{{ asset('images/pemakaman.png') }}');">
                <h3>SIMPELMAN</h3>
                <p>Sistem Informasi Tata Ruang Kota Bandung.</p>
                <a href="https://diciptabintar.bandung.go.id/simpelman/" target="_blank" class="layanan-link layanan-link-green">Akses Layanan &rarr;</a>
            </div>

            <div class="layanan-card" style="--bg-icon: url('{{ asset('images/rtbg.png') }}');">
                <h3>SIBANTEK</h3>
                <p>Sistem Informasi Bantuan Teknis Bangunan Gedung Negara.</p>
                <a href="https://sibantek.diciptabintar.id/" target="_blank" class="layanan-link layanan-link-teal">Akses Layanan &rarr;</a>
            </div>

            <div class="layanan-card" style="--bg-icon: url('{{ asset('images/registrasi.png') }}');">
                <h3>SIBIJAK</h3>
                <p>Sistem Informasi Pembinaan Jasa Konstruksi.</p>
                <a href="http://sibijak.diciptabintar.id/" target="_blank" class="layanan-link layanan-link-yellow">Akses Layanan &rarr;</a>
            </div>

            <div class="layanan-card" style="--bg-icon: url('{{ asset('images/splitzing.png') }}');">
                <h3>PBG</h3>
                <p>Persetujuan Bangunan Gedung.</p>
                <a href="https://diciptabintar.bandung.go.id/layanan/cekpbg/" target="_blank" class="layanan-link layanan-link-red">Akses Layanan &rarr;</a>
            </div>
        </div>
    </div>

</div>
@endsection