@extends('layouts.app')

@section('title', 'Bidang dan Unit Kerja')

@push('styles')
<style>
/* =============================================
   SERVICES / BIDANG PAGE STYLES
============================================= */

.bidang-wrapper {
    margin: 0 -32px;
}

/* ---- PAGE HEADER ---- */
.bidang-header {
    background: #f1f1f4;
    padding: 56px 80px 52px;
    text-align: center; 
    border-bottom: 1px solid #e5eaf2;
}

.bidang-header h1 {
    font-size: clamp(1.8rem, 3.5vw, 2.5rem);
    font-weight: 700;
    color: #003d6a;
    margin: 0 0 14px;
}

.bidang-header p {
    font-size: 1rem;
    color: #52565e;
    line-height: 1.75;
    max-width: 520px;
    margin: 0 auto;
}

/* ---- BIDANG SECTION ---- */
.bidang-section {
    padding: 56px 80px;
    background: #f9f9fd;
}

.bidang-grid-top {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-bottom: 24px;
}

.bidang-grid-bottom {
    display: grid;
    grid-template-columns: 1fr 1.6fr;
    gap: 24px;
}

/* ---- BIDANG CARD ---- */
.bidang-card {
    background: #f9f9fd;
    border: 1px solid #e5eaf2;
    border-radius: 12px;
    padding: 28px 24px;
    border-top: 4px solid transparent;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    display: flex;
    flex-direction: column;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.bidang-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(0,0,0,0.09);
}

.bidang-card-blue   { border-top-color: #003d6a; }
.bidang-card-green  { border-top-color: #16a34a; }
.bidang-card-orange { border-top-color: #f97316; }
.bidang-card-yellow { border-top-color: #f9b516ff; }

.bidang-card-head {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 14px;
    padding-bottom: 14px;
    border-bottom: 1px solid #e5eaf2;
}

.bidang-card-icon {
    width: 38px;
    height: 38px;
    border-radius: 9px;
    display: grid;
    place-items: center;
    flex-shrink: 0;
    font-size: 1.1rem;
}

.bidang-card-icon-blue   { background: #eef3ff; color: #003d6a; }
.bidang-card-icon-green  { background: #e6f9ee; color: #16a34a; }
.bidang-card-icon-orange { background: #fff4e5; color: #f97316; }

.bidang-card-head h3 {
    font-size: 1.15rem;
    font-weight: 700;
    color: #0a1628;
    margin: 0;
}

.bidang-card-desc {
    font-size: 0.95rem;
    color: #52565e;
    line-height: 1.7;
    margin: 0 0 16px;
    flex: 1;
}

.bidang-card-items {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.bidang-card-items li {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 0.93rem;
    color: #334155;
}

.bidang-card-items li::before {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    border: 2px solid currentColor;
    flex-shrink: 0;
}

.bidang-card-blue   .bidang-card-items li { color: #003d6a; }
.bidang-card-green  .bidang-card-items li { color: #15803d; }
.bidang-card-orange .bidang-card-items li { color: #c2410c; }

.bidang-detail-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.94rem;
    font-weight: 600;
    color: #003d6a;
    border: 1.5px solid #003d6a;
    border-radius: 999px;
    padding: 8px 18px;
    text-decoration: none;
    transition: all 0.18s ease;
    width: fit-content;
    margin-top: auto;
}

.bidang-detail-btn:hover {
    background: #003d6a;
    color: #f9f9fd;
}

/* ---- UPT CARD (dark navy) ---- */
.upt-card {
    background: #f9f9fd;
    border: 1px solid #e5eaf2;
    border-radius: 12px;
    padding: 28px 24px;
    border-top: 4px solid transparent;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    display: flex;
    flex-direction: column;
}

.upt-card   { border-top-color: #003d6a; }

.upt-card-head {
    margin-bottom: 10px;
    padding-bottom: 14px;
    border-bottom: 1px solid #e5eaf2;
}

.upt-card-head h3 {
    font-size: 1.16rem;
    font-weight: 700;
    color: #0a1628;
    margin: 0 0 8px;
}

.upt-card-head p {
    font-size: 0.95rem;
    color: #64748b;
    line-height: 1.6;
    margin: 0;
}

.upt-sub-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin: 16px 0 20px;
    flex: 1;
}

.upt-sub-item {
    background: #f9f9fd;
    border: 1px solid #e5eaf2;
    border-radius: 9px;
    padding: 14px 16px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1rem;
    color: #334155;
    font-weight: 500;
}

.upt-sub-item-icon {
    font-size: 1.1rem;
    flex-shrink: 0;
}

.upt-all-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.94rem;
    font-weight: 600;
    color: #f9f9fd;
    background: #003d6a;
    border-radius: 999px;
    padding: 9px 20px;
    text-decoration: none;
    transition: background 0.18s ease;
    width: fit-content;
}

.upt-all-btn:hover {
    background: #002a4d;
}

/* ---- ALUR KOORDINASI ---- */
.alur-section-wrapper {
    background: #f4f5f8;
    padding: 64px 40px; /* Padding sisi diperkecil agar ruang lebih lebar */
    border-top: 1px solid #e5eaf2;
}

.alur-header {
    text-align: center;
    margin-bottom: 40px;
}

.alur-header h2 {
    font-size: clamp(1.5rem, 2.8vw, 2rem);
    font-weight: 700;
    color: #003d6a;
    margin: 0 0 10px;
}

.alur-header p {
    font-size: 1rem;
    color: #64748b;
    margin: 0;
}

.alur-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 56px 40px;
    max-width: 1400px; /* Lebar hampir memenuhi layar */
    width: 100%;
    margin: 0 auto;
    box-shadow: 0 4px 20px rgba(0,0,0,0.02);
}

.alur-timeline {
    display: flex;
    justify-content: space-between;
    align-items: flex-start; /* Agar elemen sejajar di atas */
    max-width: 1200px; /* Lebar area timeline menyebar proporsional */
    width: 100%;
    margin: 0 auto;
}

.alur-timeline-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    flex: 1;
    padding: 0 16px;
}

/* Ikon dengan Emoji */
.alur-timeline-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    margin-bottom: 20px;
    border: 2px solid transparent;
}

/* Warna border */
.alur-step-1 .alur-timeline-icon { border-color: #003d6a; }
.alur-step-2 .alur-timeline-icon { border-color: #16a34a; }
.alur-step-3 .alur-timeline-icon { border-color: #f97316; }

.alur-timeline-step h3 {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0a1628;
    margin: 0 0 8px;
    line-height: 1.4;
}

.alur-timeline-step p {
    font-size: 0.88rem;
    color: #64748b;
    line-height: 1.5;
    margin: 0;
}

/* Panah Penghubung */
.alur-arrow {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 164px;
    color: #cbd5e1;
    flex-shrink: 0;
}

.alur-arrow svg {
    width: 48px;
    height: 24px;
}

/* Penyesuaian Responsif */
@media (max-width: 768px) {
    .alur-section-wrapper { padding: 48px 20px; }
    .alur-card { padding: 40px 24px; }
    .alur-timeline {
        flex-direction: column;
        align-items: center;
        gap: 16px;
    }
    .alur-arrow {
        height: auto;
        padding: 16px 0;
        transform: rotate(90deg); /* Putar panah ke bawah untuk tampilan mobile */
    }
    .alur-arrow svg { width: 32px; }
}

/* ---- DB SERVICES SECTION ---- */
.db-services-section {
    padding: 56px 80px;
    background: #f8faff;
    border-top: 1px solid #e5eaf2;
}

.db-services-header {
    margin-bottom: 32px;
}

.db-services-header h2 {
    font-size: 1.4rem;
    font-weight: 700;
    color: #003d6a;
    margin: 0 0 6px;
}

.db-services-header p {
    font-size: 0.88rem;
    color: #64748b;
}

.db-services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 18px;
}

.db-service-card {
    background: #f9f9fd;
    border: 1px solid #e5eaf2;
    border-radius: 12px;
    padding: 22px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    display: flex;
    flex-direction: column;
    transition: transform 0.2s ease;
}

.db-service-card:hover {
    transform: translateY(-2px);
}

.db-service-card h3 {
    font-size: 0.95rem;
    font-weight: 700;
    color: #0a1628;
    margin: 0 0 8px;
}

.db-service-card p {
    font-size: 0.84rem;
    color: #64748b;
    line-height: 1.6;
    margin: 0 0 16px;
    flex: 1;
}

/* ---- RESPONSIVE ---- */
@media (max-width: 1024px) {
    .bidang-header,
    .bidang-section,
    .alur-section,
    .db-services-section { padding: 48px 40px; }
    .bidang-grid-top { grid-template-columns: 1fr 1fr; }
    .bidang-grid-bottom { grid-template-columns: 1fr; }
    .alur-steps { flex-wrap: wrap; gap: 20px; }
    .alur-arrow { display: none; }
}

@media (max-width: 640px) {
    .bidang-header,
    .bidang-section,
    .alur-section,
    .db-services-section { padding: 36px 20px; }
    .bidang-grid-top { grid-template-columns: 1fr; }
    .upt-sub-grid { grid-template-columns: 1fr; }
    .bidang-wrapper { margin: 0 -18px; }
}
</style>
@endpush

@section('content')
<div class="bidang-wrapper">

    {{-- ===== HEADER ===== --}}
    <div class="bidang-header">
        <h1>Bidang dan Unit Kerja</h1>
        <p>Struktur organisasi Dinas Cipta Karya, Bina Konstruksi, dan Tata Ruang Kota Bandung dirancang untuk memberikan pelayanan publik yang optimal dan terintegrasi dalam pembangunan kota.</p>
    </div>

    {{-- ===== BIDANG CARDS ===== --}}
    <div class="bidang-section">

        {{-- Row 1: 3 Bidang --}}
        <div class="bidang-grid-top">

            {{-- Sekretariat --}}
            <div class="bidang-card bidang-card-blue">
                <div class="bidang-card-head">
                    <div class="bidang-card-icon bidang-card-icon-blue">🏢</div>
                    <h3>Sekretariat</h3>
                </div>
                <p class="bidang-card-desc">
                    Bertanggung jawab atas pelayanan administrasi umum, kepegawaian, keuangan, dan perencanaan untuk mendukung seluruh kegiatan operasional dinas.
                </p>
                <ul class="bidang-card-items">
                    <li>Penyusunan Rencana Strategis</li>
                    <li>Pengelolaan Keuangan &amp; Aset</li>
                    <li>Administrasi Kepegawaian</li>
                </ul>
                <a href="#" class="bidang-detail-btn">Lihat Detail &rarr;</a>
            </div>

            {{-- Bidang Cipta Karya --}}
            <div class="bidang-card bidang-card-green">
                <div class="bidang-card-head">
                    <div class="bidang-card-icon bidang-card-icon-green">🏗️</div>
                    <h3>Bidang Cipta Karya</h3>
                </div>
                <p class="bidang-card-desc">
                    Mengelola perencanaan, pelaksanaan, dan pengawasan pembangunan serta pemeliharaan gedung-gedung pemerintahan dan fasilitas umum.
                </p>
                <ul class="bidang-card-items">
                    <li>Pembangunan Gedung Negara</li>
                    <li>Penataan Ruang Terbuka Hijau</li>
                    <li>Fasilitas Publik Terpadu</li>
                </ul>
                <a href="#" class="bidang-detail-btn">Lihat Detail &rarr;</a>
            </div>

            {{-- Bidang Bina Konstruksi --}}
            <div class="bidang-card bidang-card-orange">
                <div class="bidang-card-head">
                    <div class="bidang-card-icon bidang-card-icon-orange">👷</div>
                    <h3>Bidang Bina Konstruksi</h3>
                </div>
                <p class="bidang-card-desc">
                    Melakukan pembinaan, pemberdayaan, dan pengawasan terhadap penyedia jasa konstruksi serta menjamin standar mutu konstruksi.
                </p>
                <ul class="bidang-card-items">
                    <li>Sertifikasi Tenaga Kerja</li>
                    <li>Pengawasan Mutu Konstruksi</li>
                    <li>Standar Keselamatan Kerja</li>
                </ul>
                <a href="#" class="bidang-detail-btn">Lihat Detail &rarr;</a>
            </div>
        </div>

        {{-- Row 2: Bidang Tata Ruang + UPT --}}
        <div class="bidang-grid-bottom">

            {{-- Bidang Tata Ruang --}}
            <div class="bidang-card bidang-card-yellow">
                <div class="bidang-card-head">
                    <div class="bidang-card-icon bidang-card-icon-blue">🗺️</div>
                    <h3>Bidang Tata Ruang</h3>
                </div>
                <p class="bidang-card-desc">
                    Merumuskan kebijakan, merencanakan, dan mengendalikan pemanfaatan tata ruang wilayah kota agar sesuai dengan Rencana Tata Ruang Wilayah (RTRW).
                </p>
                <ul class="bidang-card-items">
                    <li>Perencanaan Tata Ruang</li>
                    <li>Penerbitan Keterangan Rencana Kota</li>
                    <li>Pengendalian Pemanfaatan Ruang</li>
                </ul>
                <a href="#" class="bidang-detail-btn">Lihat Detail &rarr;</a>
            </div>

            {{-- Unit Pelaksana Teknis --}}
            <div class="upt-card">
                <div class="upt-card-head">
                    <h3>⚙️ &nbsp;Unit Pelaksana Teknis (UPT)</h3>
                    <p>Unsur pelaksana tugas teknis operasional dan/atau kegiatan teknis penunjang tertentu yang mempunyai wilayah kerja.</p>
                </div>
                <div class="upt-sub-grid">
                    <div class="upt-sub-item">
                        <span class="upt-sub-item-icon">
                            <img width="32" height="32" src="https://img.icons8.com/windows/32/water.png" alt="water"/>
                        </span>
                        UPT Air Bersih &amp; Sanitasi
                    </div>
                    <div class="upt-sub-item">
                        <span class="upt-sub-item-icon">
                            <img width="32" height="32" src="https://img.icons8.com/windows/32/coniferous-tree.png" alt="coniferous-tree"/>
                        </span>
                        UPT Pemeliharaan Taman
                    </div>
                </div>
                <a href="#" class="upt-all-btn">Lihat Semua UPT &rarr;</a>
            </div>

        </div>
    </div>




{{-- ===== ALUR KOORDINASI ===== --}}
    <div class="alur-section-wrapper">
        
        <div class="alur-header">
            <h2>Alur Koordinasi Bidang</h2>
            <p>Sistem kerja kolaboratif antar unit untuk pembangunan yang terintegrasi.</p>
        </div>

        <div class="alur-card">
            <div class="alur-timeline">
                
                {{-- Step 1 --}}
                <div class="alur-timeline-step alur-step-1">
                    <div class="alur-timeline-icon">🗺️</div>
                    <h3>Perencanaan (Tata Ruang)</h3>
                    <p>Penetapan zona dan regulasi pemanfaatan ruang.</p>
                </div>

                {{-- Panah 1 --}}
                <div class="alur-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </div>

                {{-- Step 2 --}}
                <div class="alur-timeline-step alur-step-2">
                    <div class="alur-timeline-icon">🏗️</div>
                    <h3>Desain &amp; Bangun (Cipta Karya)</h3>
                    <p>Perancangan arsitektur dan pelaksanaan pembangunan fisik.</p>
                </div>

                {{-- Panah 2 --}}
                <div class="alur-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </div>

                {{-- Step 3 --}}
                <div class="alur-timeline-step alur-step-3">
                    <div class="alur-timeline-icon">👷</div>
                    <h3>Pengawasan (Bina Konstruksi)</h3>
                    <p>Kontrol kualitas material dan standar keselamatan kerja.</p>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection
