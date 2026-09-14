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
    font-size: clamp(2.8rem, 3vw, 3.5rem);
    font-weight: 700;
    color: #003d6a;
    margin: 0 0 14px;
}

.bidang-header p {
    font-size: 1.1rem;
    color: #52565e;
    line-height: 1.75;
    max-width: 750px;
    margin: 0 auto;
}

/* ---- BIDANG SECTION ---- */
.bidang-section {
    padding: 66px 100px;
    background: #f9f9fd;
}

.bidang-grid-full {
    margin-bottom: 24px;
}

.bidang-grid-3cols {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-bottom: 24px;
}

/* ---- BIDANG CARD ---- */
.bidang-card {
    background: #ffffff;
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
.bidang-card-red    { border-top-color: #dc2626; }
.bidang-card-navy   { border-top-color: #003d6a; }

.bidang-card-horizontal {
    flex-direction: row;
    align-items: flex-start;
    gap: 24px;
}
.bidang-card-horizontal .bidang-card-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    font-size: 1.8rem;
    margin-top: 10px;
}
.bidang-card-horizontal .bidang-card-content {
    flex: 1;
}
.bidang-card-horizontal .bidang-card-head {
    border-bottom: none;
    margin-bottom: 8px;
    padding-bottom: 0;
}

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
.bidang-card-icon-red    { background: #fee2e2; color: #dc2626; }
.bidang-card-icon-navy   { background: #003d6a; color: #ffffff; }

.bidang-card-head h3 {
    font-size: 1.15rem;
    font-weight: 700;
    color: #003d6a;
    margin: 0;
}

.bidang-card-desc {
    font-size: 1.05rem;
    color: #52565e;
    line-height: 1.7;
    margin: 0 0 16px;
    flex: 1;
}


.bidang-card-desc-3cols {
    font-size: 0.95rem;
    color: #52565e;
    line-height: 1.7;
    margin: 0 0 14px;
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

.bidang-card-blue   .bidang-card-items li { color: #003d6a; }
.bidang-card-green  .bidang-card-items li { color: #15803d; }
.bidang-card-orange .bidang-card-items li { color: #c2410c; }
.bidang-card-yellow .bidang-card-items li { color: #b45309; }
.bidang-card-red    .bidang-card-items li { color: #b91c1c; }
.bidang-card-navy   .bidang-card-items li { color: #1e293b; }

.bidang-detail-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.94rem;
    font-weight: 600;
    color: #003d6a;
    background-color: #f9f9fd;
    border: 1.5px solid #003d6a;
    border-radius: 999px;
    padding: 8px 18px;
    text-decoration: none;
    transition: all 0.18s ease;
    width: fit-content;
    margin-top: auto;
}

.bidang-detail-btn-3cols {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    font-size: 0.94rem;
    font-weight: 600;
    color: #003d6a;
    background-color: #f9f9fd;
    border: 1.5px solid #003d6a;
    border-radius: 999px;
    padding: 8px 18px;
    text-decoration: none;
    transition: all 0.18s ease;
    width: 100%;
    margin-top: auto;
}

.bidang-detail-btn:hover {
    background: #003d6a;
    color: #f9f9fd;
}

.bidang-detail-btn-3cols:hover {
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
    padding: 64px 40px; 
    border-top: 1px solid #e5eaf2;
}

.alur-header {
    text-align: center;
    margin-bottom: 40px;
}

.alur-header h2 {
    font-size: clamp(2.5rem, 2.8vw, 3rem);
    font-weight: 700;
    color: #003d6a;
    margin: 0 0 10px;
}

.alur-header p {
    font-size: 1.1rem;
    color: #52575e;
    margin: 0;
}

.alur-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 56px 40px;
    max-width: 1400px; 
    width: 100%;
    margin: 0 auto;
    box-shadow: 0 4px 20px rgba(0,0,0,0.02);
}

.alur-timeline {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    max-width: 1200px; 
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
    transition: transform 0.25s ease;
}

.alur-timeline-step:hover {
    transform: translateY(-8px);
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
    color: #003d6a;
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
    width: 148px;
    height: 84px;
    transition: transform 0.35s ease;
}

.alur-arrow svg:hover {
    color: #477beaff;   
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
        transform: rotate(90deg); 
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
    .bidang-grid-3cols { grid-template-columns: 1fr 1fr; }
    .alur-steps { flex-wrap: wrap; gap: 20px; }
    .alur-arrow { display: none; }
}

@media (max-width: 640px) {
    .bidang-header,
    .bidang-section,
    .alur-section,
    .db-services-section { padding: 36px 20px; }
    .bidang-grid-3cols { grid-template-columns: 1fr; }
    .bidang-card-horizontal { flex-direction: column; text-align: center; align-items: center; }
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

        {{-- Row 1: Kepala Dinas --}}
        <div class="bidang-grid-full">
            <div class="bidang-card bidang-card-navy bidang-card-horizontal">
                <div class="bidang-card-icon bidang-card-icon-navy">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="bidang-card-content">
                    <div class="bidang-card-head">
                        <h3 style="font-size: 1.8rem;">Kepala Dinas</h3>
                    </div>
                    <p class="bidang-card-desc" style="margin-bottom: 16px;">
                        Kepala Dinas mempunyai tugas membantu Wali Kota dalam menyelenggarakan Urusan Pemerintahan yang menjadi kewenangan Daerah di bidang pekerjaan umum dan penataan ruang sektor cipta karya, bina konstruksi, tata ruang dan pemakaman.
                    </p>
                    <a href="{{ route('bidang.show', 'kepala-dinas') }}" class="bidang-detail-btn">Lihat Detail &rarr;</a>
                </div>
            </div>
        </div>

        {{-- Row 2: 3 Bidang --}}
        <div class="bidang-grid-3cols">

            {{-- Sekretariat --}}
            <div class="bidang-card bidang-card-navy">
                <div class="bidang-card-head">
                    <div class="bidang-card-icon bidang-card-icon-blue">
                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 16V9H5V16H3ZM9 16V9H11V16H9ZM0 7V5L10 0L20 5V7H0ZM0 20V18H12.05C12.0833 18.35 12.125 18.6875 12.175 19.0125C12.225 19.3375 12.3 19.6667 12.4 20H0ZM15 12.25V9H17V11.25L15 12.25ZM18 23C16.85 22.7167 15.8958 22.0542 15.1375 21.0125C14.3792 19.9708 14 18.8167 14 17.55V15L18 13L22 15V17.55C22 18.8167 21.6208 19.9708 20.8625 21.0125C20.1042 22.0542 19.15 22.7167 18 23ZM17.275 20L20.75 16.55L19.7 15.5L17.275 17.875L16.3 16.9L15.25 17.975L17.275 20Z" fill="#003D6A"/>
                        </svg>
                    </div>
                    <h3>Sekretariat</h3>
                </div>
                <p class="bidang-card-desc-3cols">
                    Sekretaris Dinas mempunyai tugas melaksanakan sebagian tugas Kepala Dinas lingkup kesekretariatan yang meliputi pengelolaan umum dan kepegawaian, pengelolaan keuangan, pengoordinasian penyusunan program, data dan informasi serta pengoordinasian tugas-tugas bidang dan UPTD.
                </p>
                <ul class="bidang-card-items" style="list-style-type: none; padding-left: 0;">
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Penyusunan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Perumusan Kebijakan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Pelaksanaan Kebijakan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Evaluasi & Pelaporan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Administrasi</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Fungsi Lainnya</span>
                    </li>
                </ul>   
                <a href="{{ route('bidang.show', 'sekretariat') }}" class="bidang-detail-btn-3cols">Lihat Detail &rarr;</a>
            </div>

            {{-- Bidang Cipta Karya --}}
            <div class="bidang-card bidang-card-green">
                <div class="bidang-card-head">
                    <div class="bidang-card-icon bidang-card-icon-green">
                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 19V5H6V3L9 0L12 3V9H18V19H0ZM2 17H4V15H2V17ZM2 13H4V11H2V13ZM2 9H4V7H2V9ZM8 17H10V15H8V17ZM8 13H10V11H8V13ZM8 9H10V7H8V9ZM8 5H10V3H8V5ZM14 17H16V15H14V17ZM14 13H16V11H14V13Z" fill="#456E00"/>
                        </svg>
                    </div>
                    <h3>Bidang Cipta Karya</h3>
                </div>
                <p class="bidang-card-desc-3cols">
                    Kepala Bidang Cipta Karya mempunyai tugas melaksanakan sebagian tugas Kepala Dinas lingkup cipta karya meliputi penataan Bangunan Gedung dan arsitektur kota, teknik Bangunan Gedung, kelaikan Bangunan Gedung.
                </p>
                <ul class="bidang-card-items" style="list-style-type: none; padding-left: 0;">
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Perumusan Kebijakan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Pelaksanaan Kebijakan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Evaluasi dan Pelaporan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Administrasi</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Fungsi Lainnya</span>
                    </li>
                </ul>
                <a href="{{ route('bidang.show', 'cipta-karya') }}" class="bidang-detail-btn-3cols">Lihat Detail &rarr;</a>
            </div>

            {{-- Bidang Bina Konstruksi --}}
            <div class="bidang-card bidang-card-orange">
                <div class="bidang-card-head">
                    <div class="bidang-card-icon bidang-card-icon-orange">
                        <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 18V15.2C0 14.65 0.141667 14.1333 0.425 13.65C0.708333 13.1667 1.1 12.8 1.6 12.55C2.45 12.1167 3.40833 11.75 4.475 11.45C5.54167 11.15 6.71667 11 8 11C9.28333 11 10.4583 11.15 11.525 11.45C12.5917 11.75 13.55 12.1167 14.4 12.55C14.9 12.8 15.2917 13.1667 15.575 13.65C15.8583 14.1333 16 14.65 16 15.2V18H0ZM8 10C6.9 10 5.95833 9.60833 5.175 8.825C4.39167 8.04167 4 7.1 4 6H3.75C3.6 6 3.47917 5.95417 3.3875 5.8625C3.29583 5.77083 3.25 5.65 3.25 5.5C3.25 5.35 3.29583 5.22917 3.3875 5.1375C3.47917 5.04583 3.6 5 3.75 5H4C4 4.25 4.18333 3.575 4.55 2.975C4.91667 2.375 5.4 1.9 6 1.55V2.5C6 2.65 6.04583 2.77083 6.1375 2.8625C6.22917 2.95417 6.35 3 6.5 3C6.65 3 6.77083 2.95417 6.8625 2.8625C6.95417 2.77083 7 2.65 7 2.5V1.15C7.15 1.1 7.30833 1.0625 7.475 1.0375C7.64167 1.0125 7.81667 1 8 1C8.18333 1 8.35833 1.0125 8.525 1.0375C8.69167 1.0625 8.85 1.1 9 1.15V2.5C9 2.65 9.04583 2.77083 9.1375 2.8625C9.22917 2.95417 9.35 3 9.5 3C9.65 3 9.77083 2.95417 9.8625 2.8625C9.95417 2.77083 10 2.65 10 2.5V1.55C10.6 1.9 11.0833 2.375 11.45 2.975C11.8167 3.575 12 4.25 12 5H12.25C12.4 5 12.5208 5.04583 12.6125 5.1375C12.7042 5.22917 12.75 5.35 12.75 5.5C12.75 5.65 12.7042 5.77083 12.6125 5.8625C12.5208 5.95417 12.4 6 12.25 6H12C12 7.1 11.6083 8.04167 10.825 8.825C10.0417 9.60833 9.1 10 8 10ZM8 8C8.55 8 9.02083 7.80417 9.4125 7.4125C9.80417 7.02083 10 6.55 10 6H6C6 6.55 6.19583 7.02083 6.5875 7.4125C6.97917 7.80417 7.45 8 8 8ZM15.5 12L15.35 11.25C15.25 11.2167 15.1542 11.1792 15.0625 11.1375C14.9708 11.0958 14.8833 11.0333 14.8 10.95L14.1 11.2L13.6 10.3L14.15 9.8C14.15 9.75 14.15 9.7 14.15 9.65C14.15 9.6 14.15 9.55 14.15 9.5C14.15 9.45 14.15 9.4 14.15 9.35C14.15 9.3 14.15 9.25 14.15 9.2L13.6 8.7L14.1 7.8L14.8 8.05C14.8667 7.98333 14.95 7.925 15.05 7.875C15.15 7.825 15.25 7.78333 15.35 7.75L15.5 7H16.5L16.65 7.75C16.75 7.78333 16.85 7.825 16.95 7.875C17.05 7.925 17.1333 7.98333 17.2 8.05L17.9 7.8L18.4 8.7L17.85 9.2C17.85 9.25 17.85 9.3 17.85 9.35C17.85 9.4 17.85 9.45 17.85 9.5C17.85 9.55 17.85 9.6 17.85 9.65C17.85 9.7 17.85 9.75 17.85 9.8L18.4 10.3L17.9 11.2L17.2 10.95C17.1167 11.0333 17.0292 11.0958 16.9375 11.1375C16.8458 11.1792 16.75 11.2167 16.65 11.25L16.5 12H15.5ZM16 10.25C16.2 10.25 16.375 10.175 16.525 10.025C16.675 9.875 16.75 9.7 16.75 9.5C16.75 9.3 16.675 9.125 16.525 8.975C16.375 8.825 16.2 8.75 16 8.75C15.8 8.75 15.625 8.825 15.475 8.975C15.325 9.125 15.25 9.3 15.25 9.5C15.25 9.7 15.325 9.875 15.475 10.025C15.625 10.175 15.8 10.25 16 10.25ZM17.8 7L17.6 5.95C17.45 5.9 17.3125 5.8375 17.1875 5.7625C17.0625 5.6875 16.95 5.6 16.85 5.5L15.8 5.85L15.1 4.65L15.95 3.9C15.9167 3.81667 15.9 3.75 15.9 3.7C15.9 3.65 15.9 3.58333 15.9 3.5C15.9 3.41667 15.9 3.35 15.9 3.3C15.9 3.25 15.9167 3.18333 15.95 3.1L15.1 2.35L15.8 1.15L16.85 1.5C16.95 1.4 17.0625 1.3125 17.1875 1.2375C17.3125 1.1625 17.45 1.1 17.6 1.05L17.8 0H19.2L19.4 1.05C19.55 1.1 19.6875 1.1625 19.8125 1.2375C19.9375 1.3125 20.05 1.4 20.15 1.5L21.2 1.15L21.9 2.35L21.05 3.1C21.0833 3.18333 21.1 3.25 21.1 3.3C21.1 3.35 21.1 3.41667 21.1 3.5C21.1 3.58333 21.1 3.65 21.1 3.7C21.1 3.75 21.0833 3.81667 21.05 3.9L21.9 4.65L21.2 5.85L20.15 5.5C20.05 5.6 19.9375 5.6875 19.8125 5.7625C19.6875 5.8375 19.55 5.9 19.4 5.95L19.2 7H17.8ZM18.5 4.75C18.85 4.75 19.1458 4.62917 19.3875 4.3875C19.6292 4.14583 19.75 3.85 19.75 3.5C19.75 3.15 19.6292 2.85417 19.3875 2.6125C19.1458 2.37083 18.85 2.25 18.5 2.25C18.15 2.25 17.8542 2.37083 17.6125 2.6125C17.3708 2.85417 17.25 3.15 17.25 3.5C17.25 3.85 17.3708 4.14583 17.6125 4.3875C17.8542 4.62917 18.15 4.75 18.5 4.75Z" fill="#370E00"/>
                        </svg>
                    </div>
                    <h3 style="line-height: 1.4;">Bidang Bina Konstruksi dan Bangunan Gedung Negara</h3>
                </div>
                <p class="bidang-card-desc-3cols">
                    Kepala Bidang Bina Konstruksi dan Bangunan Gedung Negara mempunyai tugas melaksanakan sebagian tugas Kepala Dinas lingkup bina konstruksi dan Bangunan Gedung negara meliputi bina konstruksi, perencanaan Bangunan Gedung negara, serta pengawasan pembangunan Bangunan Gedung negara.
                </p>
                <ul class="bidang-card-items" style="list-style-type: none; padding-left: 0;">
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Perumusan Kebijakan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Pelaksanaan Kebijakan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Evaluasi dan Pelaporan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Administrasi</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Fungsi Lainnya</span>
                    </li>
                </ul>
                <a href="{{ route('bidang.show', 'bina-konstruksi') }}" class="bidang-detail-btn-3cols">Lihat Detail &rarr;</a>
            </div>
        </div>

        {{-- Row 3: 3 Bidang --}}
        <div class="bidang-grid-3cols">

            {{-- Bidang Tata Ruang --}}
            <div class="bidang-card bidang-card-blue">
                <div class="bidang-card-head">
                    <div class="bidang-card-icon bidang-card-icon-blue">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 18L6 15.9L1.35 17.7C1.01667 17.8333 0.708333 17.7958 0.425 17.5875C0.141667 17.3792 0 17.1 0 16.75V2.75C0 2.53333 0.0625 2.34167 0.1875 2.175C0.3125 2.00833 0.483333 1.88333 0.7 1.8L6 0L12 2.1L16.65 0.3C16.9833 0.166667 17.2917 0.204167 17.575 0.4125C17.8583 0.620833 18 0.9 18 1.25V15.25C18 15.4667 17.9375 15.6583 17.8125 15.825C17.6875 15.9917 17.5167 16.1167 17.3 16.2L12 18ZM11 15.55V3.85L7 2.45V14.15L11 15.55Z" fill="#003D6A"/>
                        </svg>
                    </div>
                    <h3>Bidang Tata Ruang</h3>
                </div>
                <p class="bidang-card-desc-3cols">
                    Kepala Bidang Tata Ruang mempunyai tugas melaksanakan sebagian tugas Kepala Dinas lingkup tata ruang meliputi survei, pengukuran dan pemetaan, perencanaan dan pengembangan tata ruang dan perencanaan prasarana kota.
                </p>
                <ul class="bidang-card-items" style="list-style-type: none; padding-left: 0;">
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Perumusan Kebijakan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Pelaksanaan Kebijakan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Evaluasi dan Pelaporan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi Administrasi</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Fungsi Lainnya</span>
                    </li>
                </ul>
                <a href="{{ route('bidang.show', 'tata-ruang') }}" class="bidang-detail-btn-3cols">Lihat Detail &rarr;</a>
            </div>

            {{-- Bidang Pengawasan dan Pengendalian --}}
            <div class="bidang-card bidang-card-red">
                <div class="bidang-card-head">
                    <div class="bidang-card-icon bidang-card-icon-red">
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 20C5.68333 19.4167 3.77083 18.0875 2.2625 16.0125C0.754167 13.9375 0 11.6333 0 9.1V3L8 0L16 3V9.1C16 10.15 15.8625 11.1708 15.5875 12.1625C15.3125 13.1542 14.9167 14.1 14.4 15L11.45 12.05C11.6333 11.7333 11.7708 11.4042 11.8625 11.0625C11.9542 10.7208 12 10.3667 12 10C12 8.9 11.6083 7.95833 10.825 7.175C10.0417 6.39167 9.1 6 8 6C6.9 6 5.95833 6.39167 5.175 7.175C4.39167 7.95833 4 8.9 4 10C4 11.1 4.39167 12.0417 5.175 12.825C5.95833 13.6083 6.9 14 8 14C8.35 14 8.69583 13.9542 9.0375 13.8625C9.37917 13.7708 9.7 13.6333 10 13.45L13.225 16.65C12.525 17.4667 11.7375 18.1667 10.8625 18.75C9.9875 19.3333 9.03333 19.75 8 20ZM8 12C7.45 12 6.97917 11.8042 6.5875 11.4125C6.19583 11.0208 6 10.55 6 10C6 9.45 6.19583 8.97917 6.5875 8.5875C6.97917 8.19583 7.45 8 8 8C8.55 8 9.02083 8.19583 9.4125 8.5875C9.80417 8.97917 10 9.45 10 10C10 10.55 9.80417 11.0208 9.4125 11.4125C9.02083 11.8042 8.55 12 8 12Z" fill="#93000A"/>
                        </svg>
                    </div>
                    <h3 style="line-height: 1.4;">Bidang Pengawasan dan Pengendalian Pemanfaatan Ruang dan Bangunan Gedung</h3>
                </div>
                <p class="bidang-card-desc-3cols">
                    Kepala Bidang Pengawasan dan Pengendalian Pemanfaatan Ruang dan Bangunan Gedung mempunyai tugas melaksanakan sebagian tugas Kepala Dinas lingkup pengawasan dan pengendalian pemanfaatan ruang dan Bangunan Gedung meliputi pengawasan pemanfaatan ruang dan Bangunan Gedung, penertiban pelanggaran pemanfaatan ruang dan Bangunan Gedung, serta dokumentasi, penanganan pengaduan dan sengketa.
                </p>
                <ul class="bidang-card-items" style="list-style-type: none; padding-left: 0;">
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi perumusan kebijakan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi pelaksanaan kebijakan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi evaluasi dan pelaporan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Koordinasi administrasi</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Fungsi lainnya</span>
                    </li>
                </ul>
                <a href="{{ route('bidang.show', 'pengawasan') }}" class="bidang-detail-btn-3cols">Lihat Detail &rarr;</a>
            </div>

            {{-- UPTD Pengelolaan Pemakaman --}}
            <div class="bidang-card bidang-card-navy">
                <div class="bidang-card-head">
                    <div class="bidang-card-icon bidang-card-icon-navy">
                        <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 23C5.16667 23 4.45833 22.7083 3.875 22.125C3.29167 21.5417 3 20.8333 3 20C3 19.1667 3.29167 18.4583 3.875 17.875C4.45833 17.2917 5.16667 17 6 17C6.23333 17 6.45 17.025 6.65 17.075C6.85 17.125 7.04167 17.1917 7.225 17.275L8.65 15.5C8.18333 14.9833 7.85833 14.4 7.675 13.75C7.49167 13.1 7.45 12.45 7.55 11.8L5.525 11.125C5.24167 11.5417 4.88333 11.875 4.45 12.125C4.01667 12.375 3.53333 12.5 3 12.5C2.16667 12.5 1.45833 12.2083 0.875 11.625C0.291667 11.0417 0 10.3333 0 9.5C0 8.66667 0.291667 7.95833 0.875 7.375C1.45833 6.79167 2.16667 6.5 3 6.5C3.83333 6.5 4.54167 6.79167 5.125 7.375C5.70833 7.95833 6 8.66667 6 9.5C6 9.53333 6 9.56667 6 9.6C6 9.63333 6 9.66667 6 9.7L8.025 10.4C8.35833 9.8 8.80417 9.29167 9.3625 8.875C9.92083 8.45833 10.55 8.19167 11.25 8.075V5.9C10.6 5.71667 10.0625 5.3625 9.6375 4.8375C9.2125 4.3125 9 3.7 9 3C9 2.16667 9.29167 1.45833 9.875 0.875C10.4583 0.291667 11.1667 0 12 0C12.8333 0 13.5417 0.291667 14.125 0.875C14.7083 1.45833 15 2.16667 15 3C15 3.7 14.7833 4.3125 14.35 4.8375C13.9167 5.3625 13.3833 5.71667 12.75 5.9V8.075C13.45 8.19167 14.0792 8.45833 14.6375 8.875C15.1958 9.29167 15.6417 9.8 15.975 10.4L18 9.7C18 9.66667 18 9.63333 18 9.6C18 9.56667 18 9.53333 18 9.5C18 8.66667 18.2917 7.95833 18.875 7.375C19.4583 6.79167 20.1667 6.5 21 6.5C21.8333 6.5 22.5417 6.79167 23.125 7.375C23.7083 7.95833 24 8.66667 24 9.5C24 10.3333 23.7083 11.0417 23.125 11.625C22.5417 12.2083 21.8333 12.5 21 12.5C20.4667 12.5 19.9792 12.375 19.5375 12.125C19.0958 11.875 18.7417 11.5417 18.475 11.125L16.45 11.8C16.55 12.45 16.5083 13.0958 16.325 13.7375C16.1417 14.3792 15.8167 14.9667 15.35 15.5L16.775 17.25C16.9583 17.1667 17.15 17.1042 17.35 17.0625C17.55 17.0208 17.7667 17 18 17C18.8333 17 19.5417 17.2917 20.125 17.875C20.7083 18.4583 21 19.1667 21 20C21 20.8333 20.7083 21.5417 20.125 22.125C19.5417 22.7083 18.8333 23 18 23C17.1667 23 16.4583 22.7083 15.875 22.125C15.2917 21.5417 15 20.8333 15 20C15 19.6667 15.0542 19.3458 15.1625 19.0375C15.2708 18.7292 15.4167 18.45 15.6 18.2L14.175 16.425C13.4917 16.8083 12.7625 17 11.9875 17C11.2125 17 10.4833 16.8083 9.8 16.425L8.4 18.2C8.58333 18.45 8.72917 18.7292 8.8375 19.0375C8.94583 19.3458 9 19.6667 9 20C9 20.8333 8.70833 21.5417 8.125 22.125C7.54167 22.7083 6.83333 23 6 23Z" fill="white"/>
                        </svg>
                    </div>
                    <h3 style="line-height: 1.4;">UPTD Pengelolaan Pemakaman</h3>
                </div>
                <p class="bidang-card-desc-3cols">
                    Unsur pelaksana teknis operasional dalam penataan, pengelolaan, pemeliharaan ketertiban, kebersihan, dan keindahan di kawasan pemakaman umum.
                </p>
                <ul class="bidang-card-items" style="list-style-type: none; padding-left: 0;">
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Penyusunan Rencana & Teknis</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Pemeliharaan RTH</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Ketatausahaan</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#487522" stroke-width="1.5"/>
                            <path d="M7 12L10.5 15.5L17 9" stroke="#487522" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px;">Penertiban & Pengawasan</span>
                    </li>
                </ul>
                <a href="{{ route('bidang.show', 'uptd-pemakaman') }}" class="bidang-detail-btn-3cols">Lihat Detail &rarr;</a>
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
                    <div class="alur-timeline-icon">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 22.5L7.5 19.875L1.6875 22.125C1.27083 22.2917 0.885417 22.2448 0.53125 21.9844C0.177083 21.724 0 21.375 0 20.9375V3.4375C0 3.16667 0.078125 2.92708 0.234375 2.71875C0.390625 2.51042 0.604167 2.35417 0.875 2.25L7.5 0L15 2.625L20.8125 0.375C21.2292 0.208333 21.6146 0.255208 21.9688 0.515625C22.3229 0.776042 22.5 1.125 22.5 1.5625V19.0625C22.5 19.3333 22.4219 19.5729 22.2656 19.7812C22.1094 19.9896 21.8958 20.1458 21.625 20.25L15 22.5ZM13.75 19.4375V4.8125L8.75 3.0625V17.6875L13.75 19.4375ZM16.25 19.4375L20 18.1875V3.375L16.25 4.8125V19.4375ZM2.5 19.125L6.25 17.6875V3.0625L2.5 4.3125V19.125ZM16.25 4.8125V19.4375V4.8125ZM6.25 3.0625V17.6875V3.0625Z" fill="#003D6A"/>
                        </svg>
                    </div>
                    <h3>Perencanaan (Tata Ruang)</h3>
                    <p>Penetapan zona dan regulasi pemanfaatan ruang.</p>
                </div>

                {{-- Panah 1 --}}
                <div class="alur-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </div>

                {{-- Step 2 --}}
                <div class="alur-timeline-step alur-step-2">
                    <div class="alur-timeline-icon">
                        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 23.75V6.25H7.5V3.75L11.25 0L15 3.75V11.25H22.5V23.75H0ZM2.5 21.25H5V18.75H2.5V21.25ZM2.5 16.25H5V13.75H2.5V16.25ZM2.5 11.25H5V8.75H2.5V11.25ZM10 21.25H12.5V18.75H10V21.25ZM10 16.25H12.5V13.75H10V16.25ZM10 11.25H12.5V8.75H10V11.25ZM10 6.25H12.5V3.75H10V6.25ZM17.5 21.25H20V18.75H17.5V21.25ZM17.5 16.25H20V13.75H17.5V16.25Z" fill="#426900"/>
                        </svg>
                    </div>
                    <h3>Desain &amp; Bangun (Cipta Karya)</h3>
                    <p>Perancangan arsitektur dan pelaksanaan pembangunan fisik.</p>
                </div>

                {{-- Panah 2 --}}
                <div class="alur-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </div>

                {{-- Step 3 --}}
                <div class="alur-timeline-step alur-step-3">
                    <div class="alur-timeline-icon">
                        <svg width="28" height="23" viewBox="0 0 28 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 22.5V19C0 18.3125 0.177083 17.6667 0.53125 17.0625C0.885417 16.4583 1.375 16 2 15.6875C3.0625 15.1458 4.26042 14.6875 5.59375 14.3125C6.92708 13.9375 8.39583 13.75 10 13.75C11.6042 13.75 13.0729 13.9375 14.4062 14.3125C15.7396 14.6875 16.9375 15.1458 18 15.6875C18.625 16 19.1146 16.4583 19.4688 17.0625C19.8229 17.6667 20 18.3125 20 19V22.5H0ZM2.5 20H17.5V19C17.5 18.7708 17.4427 18.5625 17.3281 18.375C17.2135 18.1875 17.0625 18.0417 16.875 17.9375C16.125 17.5625 15.1615 17.1875 13.9844 16.8125C12.8073 16.4375 11.4792 16.25 10 16.25C8.52083 16.25 7.19271 16.4375 6.01562 16.8125C4.83854 17.1875 3.875 17.5625 3.125 17.9375C2.9375 18.0417 2.78646 18.1875 2.67188 18.375C2.55729 18.5625 2.5 18.7708 2.5 19V20ZM10 12.5C8.625 12.5 7.44792 12.0104 6.46875 11.0312C5.48958 10.0521 5 8.875 5 7.5H4.6875C4.5 7.5 4.34896 7.44271 4.23438 7.32812C4.11979 7.21354 4.0625 7.0625 4.0625 6.875C4.0625 6.6875 4.11979 6.53646 4.23438 6.42188C4.34896 6.30729 4.5 6.25 4.6875 6.25H5C5 5.3125 5.22917 4.46875 5.6875 3.71875C6.14583 2.96875 6.75 2.375 7.5 1.9375V3.125C7.5 3.3125 7.55729 3.46354 7.67188 3.57812C7.78646 3.69271 7.9375 3.75 8.125 3.75C8.3125 3.75 8.46354 3.69271 8.57812 3.57812C8.69271 3.46354 8.75 3.3125 8.75 3.125V1.4375C8.9375 1.375 9.13542 1.32812 9.34375 1.29688C9.55208 1.26562 9.77083 1.25 10 1.25C10.2292 1.25 10.4479 1.26562 10.6562 1.29688C10.8646 1.32812 11.0625 1.375 11.25 1.4375V3.125C11.25 3.3125 11.3073 3.46354 11.4219 3.57812C11.5365 3.69271 11.6875 3.75 11.875 3.75C12.0625 3.75 12.2135 3.69271 12.3281 3.57812C12.4427 3.46354 12.5 3.3125 12.5 3.125V1.9375C13.25 2.375 13.8542 2.96875 14.3125 3.71875C14.7708 4.46875 15 5.3125 15 6.25H15.3125C15.5 6.25 15.651 6.30729 15.7656 6.42188C15.8802 6.53646 15.9375 6.6875 15.9375 6.875C15.9375 7.0625 15.8802 7.21354 15.7656 7.32812C15.651 7.44271 15.5 7.5 15.3125 7.5H15C15 8.875 14.5104 10.0521 13.5312 11.0312C12.5521 12.0104 11.375 12.5 10 12.5ZM10 10C10.6875 10 11.276 9.75521 11.7656 9.26562C12.2552 8.77604 12.5 8.1875 12.5 7.5H7.5C7.5 8.1875 7.74479 8.77604 8.23438 9.26562C8.72396 9.75521 9.3125 10 10 10ZM19.375 15L19.1875 14.0625C19.0625 14.0208 18.9427 13.974 18.8281 13.9219C18.7135 13.8698 18.6042 13.7917 18.5 13.6875L17.625 14L17 12.875L17.6875 12.25C17.6875 12.1875 17.6875 12.125 17.6875 12.0625C17.6875 12 17.6875 11.9375 17.6875 11.875C17.6875 11.8125 17.6875 11.75 17.6875 11.6875C17.6875 11.625 17.6875 11.5625 17.6875 11.5L17 10.875L17.625 9.75L18.5 10.0625C18.5833 9.97917 18.6875 9.90625 18.8125 9.84375C18.9375 9.78125 19.0625 9.72917 19.1875 9.6875L19.375 8.75H20.625L20.8125 9.6875C20.9375 9.72917 21.0625 9.78125 21.1875 9.84375C21.3125 9.90625 21.4167 9.97917 21.5 10.0625L22.375 9.75L23 10.875L22.3125 11.5C22.3125 11.5625 22.3125 11.625 22.3125 11.6875C22.3125 11.75 22.3125 11.8125 22.3125 11.875C22.3125 11.9375 22.3125 12 22.3125 12.0625C22.3125 12.125 22.3125 12.1875 22.3125 12.25L23 12.875L22.375 14L21.5 13.6875C21.3958 13.7917 21.2865 13.8698 21.1719 13.9219C21.0573 13.974 20.9375 14.0208 20.8125 14.0625L20.625 15H19.375ZM20 12.8125C20.25 12.8125 20.4688 12.7188 20.6562 12.5312C20.8438 12.3438 20.9375 12.125 20.9375 11.875C20.9375 11.625 20.8438 11.4062 20.6562 11.2188C20.4688 11.0312 20.25 10.9375 20 10.9375C19.75 10.9375 19.5312 11.0312 19.3438 11.2188C19.1562 11.4062 19.0625 11.625 19.0625 11.875C19.0625 12.125 19.1562 12.3438 19.3438 12.5312C19.5312 12.7188 19.75 12.8125 20 12.8125ZM22.25 8.75L22 7.4375C21.8125 7.375 21.6406 7.29688 21.4844 7.20312C21.3281 7.10938 21.1875 7 21.0625 6.875L19.75 7.3125L18.875 5.8125L19.9375 4.875C19.8958 4.77083 19.875 4.6875 19.875 4.625C19.875 4.5625 19.875 4.47917 19.875 4.375C19.875 4.27083 19.875 4.1875 19.875 4.125C19.875 4.0625 19.8958 3.97917 19.9375 3.875L18.875 2.9375L19.75 1.4375L21.0625 1.875C21.1875 1.75 21.3281 1.64062 21.4844 1.54688C21.6406 1.45312 21.8125 1.375 22 1.3125L22.25 0H24L24.25 1.3125C24.4375 1.375 24.6094 1.45312 24.7656 1.54688C24.9219 1.64062 25.0625 1.75 25.1875 1.875L26.5 1.4375L27.375 2.9375L26.3125 3.875C26.3542 3.97917 26.375 4.0625 26.375 4.125C26.375 4.1875 26.375 4.27083 26.375 4.375C26.375 4.47917 26.375 4.5625 26.375 4.625C26.375 4.6875 26.3542 4.77083 26.3125 4.875L27.375 5.8125L26.5 7.3125L25.1875 6.875C25.0625 7 24.9219 7.10938 24.7656 7.20312C24.6094 7.29688 24.4375 7.375 24.25 7.4375L24 8.75H22.25ZM23.125 5.9375C23.5625 5.9375 23.9323 5.78646 24.2344 5.48438C24.5365 5.18229 24.6875 4.8125 24.6875 4.375C24.6875 3.9375 24.5365 3.56771 24.2344 3.26562C23.9323 2.96354 23.5625 2.8125 23.125 2.8125C22.6875 2.8125 22.3177 2.96354 22.0156 3.26562C21.7135 3.56771 21.5625 3.9375 21.5625 4.375C21.5625 4.8125 21.7135 5.18229 22.0156 5.48438C22.3177 5.78646 22.6875 5.9375 23.125 5.9375Z" fill="#F18A60"/>
                        </svg>
                    </div>
                    <h3>Pengawasan (Bina Konstruksi)</h3>
                    <p>Kontrol kualitas material dan standar keselamatan kerja.</p>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection


