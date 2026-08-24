@extends('layouts.app')

@section('title', 'Layanan Publik')

@push('styles')
<style>
/* =============================================
   LAYANAN PUBLIK PAGE STYLES
============================================= */

.layanan-wrapper {
    margin: 0 -32px;
}

/* ---- PAGE HEADER ---- */
.layanan-header {
    background: #f1f1f4;
    padding: 52px 80px 44px;
    text-align: center;
    border-bottom: 1px solid #e5eaf2;
}

.layanan-header h1 {
    font-size: clamp(2.8rem, 3vw, 3.5rem);
    font-weight: 700;
    color: #003d6a;
    margin: 0 0 12px;
}

.layanan-header p {
    font-size: 1.1rem;
    color: #52565e;
    line-height: 1.7;
    max-width: 680px;
    margin: 0 auto;
}

/* ---- SERVICE CARDS GRID ---- */
.layanan-body {
    padding: 40px 80px 56px;
    background: #f8faff;
}

.layanan-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.service-card {
    background: #f9f9fd;
    border-width: 4px 0.1px 0.1px 0.1px;
    border-color: #e5eaf2;
    border-radius: 12px;
    padding: 22px 20px 18px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    display: flex;
    flex-direction: column;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.service-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(0,0,0,0.09);
}

/* Card accent colors */
.service-card-blue   { border-color: #003d6a; }
.service-card-green  { border-color: #11823aff; }
.service-card-orange { border-color: #f97316; }
.service-card-pink   { border-color: #e11d48; }
.service-card-teal   { border-color: #0891b2; }
.service-card-gray   { border-color: #64748b; }

/* Card top: icon */
.service-card-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 14px;
}

.service-card-icon {
    width: 50px;
    height: 58px;
    border-radius: 9px;
    display: grid;
    place-items: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.icon-bg-blue   { background: #eef3ff; }
.icon-bg-green  { background: #e6f9ee; }
.icon-bg-orange { background: #fff4e5; }
.icon-bg-pink   { background: #fff0f3; }
.icon-bg-teal   { background: #e0f7fa; }
.icon-bg-gray   { background: #f1f5f9; }

.service-card-badge {
    font-size: 0.92rem;
    font-weight: 600;
    color: #64748b;
    background: #f1f5f9;
    border-radius: 999px;
    padding: 3px 10px;
    white-space: nowrap;
}

.service-card-title {
    font-size: 1.15rem;
    font-weight: 700;
    margin: 0 0 10px;
    line-height: 1.3;
}

.title-blue  { color: #003d6a; }
.title-green { color: #15803d; }
.title-orange{ color: #c2410c; }
.title-pink  { color: #c02f2f; }
.title-teal  { color: #0e7490; }
.title-gray  { color: #334155; }

.service-card-desc {
    font-size: 0.94rem;
    color: #52565e;
    line-height: 1.65;
    margin: 0 0 18px;
    flex: 1;
}

/* Card footer: duration + link */
.service-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px solid #d6d6d6ff;
}

.service-card-duration {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.78rem;
    color: #94a3b8;
}

.service-card-duration svg {
    width: 14px;
    height: 14px;
}

.service-card-link {
    font-size: 0.92rem;
    font-weight: 600;
    color: #003d6a;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: gap 0.15s ease;
}

.service-card-link:hover { gap: 8px; }

/* ---- RESPONSIVE ---- */
@media (max-width: 1024px) {
    .layanan-header,
    .layanan-controls,
    .layanan-body,
    .alur-layanan-section { padding-left: 40px; padding-right: 40px; }
    .layanan-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 640px) {
    .layanan-header,
    .layanan-controls,
    .layanan-body,
    .alur-layanan-section { padding-left: 20px; padding-right: 20px; }
    .layanan-grid { grid-template-columns: 1fr; }
    .layanan-wrapper { margin: 0 -18px; }
    .alur-steps-row::before { display: none; }
    .alur-steps-row { flex-wrap: wrap; gap: 24px; }
    .alur-step-item { max-width: 45%; }
}
</style>
@endpush

@section('content')
<div class="layanan-wrapper">

    {{-- ===== HEADER ===== --}}
    <div class="layanan-header">
        <h1>Layanan Publik</h1>
        <p>Akses berbagai layanan terkait cipta karya, bina konstruksi, dan tata ruang di Kota Bandung dengan mudah dan transparan.</p>
    </div>

    {{-- ===== SERVICE CARDS ===== --}}
    <div class="layanan-body">
        <div class="layanan-grid" id="layanan-grid">

            {{-- 1. KRK New --}}
            <div class="service-card service-card-blue">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-blue">
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 16H12V14H4V16ZM4 12H12V10H4V12ZM2 20C1.45 20 0.979167 19.8042 0.5875 19.4125C0.195833 19.0208 0 18.55 0 18V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H10L16 6V18C16 18.55 15.8042 19.0208 15.4125 19.4125C15.0208 19.8042 14.55 20 14 20H2ZM9 7H14L9 2V7Z" fill="#003D6A"/>
                        </svg>
                    </div>
                </div>
                <h3 class="service-card-title title-blue">KRK New</h3>
                <p class="service-card-desc">Layanan permohonan Keterangan Rencana Kota.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        2411 Layanan
                    </span>
                </div>
            </div>

            {{-- 2. Pemakaman Baru --}}
            <div class="service-card service-card-green">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-green">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 21V13L4 11.225V8L9 5.5V4H7V2H9V0H11V2H13V4H11V5.5L16 8V11.225L20 13V21H12V18C12 17.45 11.8042 16.9792 11.4125 16.5875C11.0208 16.1958 10.55 16 10 16C9.45 16 8.97917 16.1958 8.5875 16.5875C8.19583 16.9792 8 17.45 8 18V21H0ZM10 12.5C10.4167 12.5 10.7708 12.3542 11.0625 12.0625C11.3542 11.7708 11.5 11.4167 11.5 11C11.5 10.5833 11.3542 10.2292 11.0625 9.9375C10.7708 9.64583 10.4167 9.5 10 9.5C9.58333 9.5 9.22917 9.64583 8.9375 9.9375C8.64583 10.2292 8.5 10.5833 8.5 11C8.5 11.4167 8.64583 11.7708 8.9375 12.0625C9.22917 12.3542 9.58333 12.5 10 12.5Z" fill="#456E00"/>
                        </svg>
                    </div>
                </div>
                <h3 class="service-card-title title-green">Pemakaman Baru</h3>
                <p class="service-card-desc">Layanan Permohonan Lahan Pemakaman Baru.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        6737 Layanan
                    </span>
                </div>
            </div>

            {{-- 3. Pemakaman Tumpang --}}
            <div class="service-card service-card-orange">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-orange">
                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 19.05L0 12.05L1.65 10.8L9 16.5L16.35 10.8L18 12.05L9 19.05ZM9 14L0 7L9 0L18 7L9 14Z" fill="#370E00"/>
                        </svg>
                    </div>
                </div>
                <h3 class="service-card-title title-orange">Pemakaman Tumpang</h3>
                <p class="service-card-desc">Layanan Permohonan Pemakaman Tumpang.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        2029 Layanan
                    </span>
                </div>
            </div>

            {{-- 4. Bantuan Teknis --}}
            <div class="service-card service-card-pink">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-pink">
                        <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 18V15.2C0 14.65 0.141667 14.1333 0.425 13.65C0.708333 13.1667 1.1 12.8 1.6 12.55C2.45 12.1167 3.40833 11.75 4.475 11.45C5.54167 11.15 6.71667 11 8 11C9.28333 11 10.4583 11.15 11.525 11.45C12.5917 11.75 13.55 12.1167 14.4 12.55C14.9 12.8 15.2917 13.1667 15.575 13.65C15.8583 14.1333 16 14.65 16 15.2V18H0ZM8 10C6.9 10 5.95833 9.60833 5.175 8.825C4.39167 8.04167 4 7.1 4 6H3.75C3.6 6 3.47917 5.95417 3.3875 5.8625C3.29583 5.77083 3.25 5.65 3.25 5.5C3.25 5.35 3.29583 5.22917 3.3875 5.1375C3.47917 5.04583 3.6 5 3.75 5H4C4 4.25 4.18333 3.575 4.55 2.975C4.91667 2.375 5.4 1.9 6 1.55V2.5C6 2.65 6.04583 2.77083 6.1375 2.8625C6.22917 2.95417 6.35 3 6.5 3C6.65 3 6.77083 2.95417 6.8625 2.8625C6.95417 2.77083 7 2.65 7 2.5V1.15C7.15 1.1 7.30833 1.0625 7.475 1.0375C7.64167 1.0125 7.81667 1 8 1C8.18333 1 8.35833 1.0125 8.525 1.0375C8.69167 1.0625 8.85 1.1 9 1.15V2.5C9 2.65 9.04583 2.77083 9.1375 2.8625C9.22917 2.95417 9.35 3 9.5 3C9.65 3 9.77083 2.95417 9.8625 2.8625C9.95417 2.77083 10 2.65 10 2.5V1.55C10.6 1.9 11.0833 2.375 11.45 2.975C11.8167 3.575 12 4.25 12 5H12.25C12.4 5 12.5208 5.04583 12.6125 5.1375C12.7042 5.22917 12.75 5.35 12.75 5.5C12.75 5.65 12.7042 5.77083 12.6125 5.8625C12.5208 5.95417 12.4 6 12.25 6H12C12 7.1 11.6083 8.04167 10.825 8.825C10.0417 9.60833 9.1 10 8 10ZM8 8C8.55 8 9.02083 7.80417 9.4125 7.4125C9.80417 7.02083 10 6.55 10 6H6C6 6.55 6.19583 7.02083 6.5875 7.4125C6.97917 7.80417 7.45 8 8 8ZM15.5 12L15.35 11.25C15.25 11.2167 15.1542 11.1792 15.0625 11.1375C14.9708 11.0958 14.8833 11.0333 14.8 10.95L14.1 11.2L13.6 10.3L14.15 9.8C14.15 9.75 14.15 9.7 14.15 9.65C14.15 9.6 14.15 9.55 14.15 9.5C14.15 9.45 14.15 9.4 14.15 9.35C14.15 9.3 14.15 9.25 14.15 9.2L13.6 8.7L14.1 7.8L14.8 8.05C14.8667 7.98333 14.95 7.925 15.05 7.875C15.15 7.825 15.25 7.78333 15.35 7.75L15.5 7H16.5L16.65 7.75C16.75 7.78333 16.85 7.825 16.95 7.875C17.05 7.925 17.1333 7.98333 17.2 8.05L17.9 7.8L18.4 8.7L17.85 9.2C17.85 9.25 17.85 9.3 17.85 9.35C17.85 9.4 17.85 9.45 17.85 9.5C17.85 9.55 17.85 9.6 17.85 9.65C17.85 9.7 17.85 9.75 17.85 9.8L18.4 10.3L17.9 11.2L17.2 10.95C17.1167 11.0333 17.0292 11.0958 16.9375 11.1375C16.8458 11.1792 16.75 11.2167 16.65 11.25L16.5 12H15.5ZM16 10.25C16.2 10.25 16.375 10.175 16.525 10.025C16.675 9.875 16.75 9.7 16.75 9.5C16.75 9.3 16.675 9.125 16.525 8.975C16.375 8.825 16.2 8.75 16 8.75C15.8 8.75 15.625 8.825 15.475 8.975C15.325 9.125 15.25 9.3 15.25 9.5C15.25 9.7 15.325 9.875 15.475 10.025C15.625 10.175 15.8 10.25 16 10.25ZM17.8 7L17.6 5.95C17.45 5.9 17.3125 5.8375 17.1875 5.7625C17.0625 5.6875 16.95 5.6 16.85 5.5L15.8 5.85L15.1 4.65L15.95 3.9C15.9167 3.81667 15.9 3.75 15.9 3.7C15.9 3.65 15.9 3.58333 15.9 3.5C15.9 3.41667 15.9 3.35 15.9 3.3C15.9 3.25 15.9167 3.18333 15.95 3.1L15.1 2.35L15.8 1.15L16.85 1.5C16.95 1.4 17.0625 1.3125 17.1875 1.2375C17.3125 1.1625 17.45 1.1 17.6 1.05L17.8 0H19.2L19.4 1.05C19.55 1.1 19.6875 1.1625 19.8125 1.2375C19.9375 1.3125 20.05 1.4 20.15 1.5L21.2 1.15L21.9 2.35L21.05 3.1C21.0833 3.18333 21.1 3.25 21.1 3.3C21.1 3.35 21.1 3.41667 21.1 3.5C21.1 3.58333 21.1 3.65 21.1 3.7C21.1 3.75 21.0833 3.81667 21.05 3.9L21.9 4.65L21.2 5.85L20.15 5.5C20.05 5.6 19.9375 5.6875 19.8125 5.7625C19.6875 5.8375 19.55 5.9 19.4 5.95L19.2 7H17.8ZM18.5 4.75C18.85 4.75 19.1458 4.62917 19.3875 4.3875C19.6292 4.14583 19.75 3.85 19.75 3.5C19.75 3.15 19.6292 2.85417 19.3875 2.6125C19.1458 2.37083 18.85 2.25 18.5 2.25C18.15 2.25 17.8542 2.37083 17.6125 2.6125C17.3708 2.85417 17.25 3.15 17.25 3.5C17.25 3.85 17.3708 4.14583 17.6125 4.3875C17.8542 4.62917 18.15 4.75 18.5 4.75Z" fill="#93000A"/>
                        </svg>
                    </div>
                </div>
                <h3 class="service-card-title title-pink">Bantuan Teknis</h3>
                <p class="service-card-desc">Layanan Pendampingan dan Bantuan Teknis.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        14 Layanan
                    </span>
                </div>
            </div>

            {{-- 5. PBG MBR --}}
            <div class="service-card service-card-teal">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-teal">
                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 18V6L8 0L16 6V18H10V11H6V18H0Z" fill="#003D6A"/>
                        </svg>
                    </div>
                </div>
                <h3 class="service-card-title title-teal">PBG MBR</h3>
                <p class="service-card-desc">Persetujuan Bangunan Gedung Khusus untuk Masyarakat Berpenghasilan Rendah(MBR).</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        0 Layanan
                    </span>
                </div>
            </div>

            {{-- 6. Permohonan PBG --}}
            <div class="service-card service-card-gray">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-gray">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 18V4H4V0H14V8H18V18H10V14H8V18H0ZM2 16H4V14H2V16ZM2 12H4V10H2V12ZM2 8H4V6H2V8ZM6 12H8V10H6V12ZM6 8H8V6H6V8ZM6 4H8V2H6V4ZM10 12H12V10H10V12ZM10 8H12V6H10V8ZM10 4H12V2H10V4ZM14 16H16V14H14V16ZM14 12H16V10H14V12Z" fill="#42474F"/>
                        </svg>
                    </div>
                </div>
                <h3 class="service-card-title title-gray">Permohonan PBG</h3>
                <p class="service-card-desc">Layanan Permohonan Persetujuan Bangunan Gedung (PBG) untuk Bangunan Umum.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        8 Layanan
                    </span>
                </div>
            </div>

            {{-- 7. Informasi Rencana Kota --}}
            <div class="service-card service-card-blue">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-blue">
                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 19V5H6V3L9 0L12 3V9H18V19H0ZM2 17H4V15H2V17ZM2 13H4V11H2V13ZM2 9H4V7H2V9ZM8 17H10V15H8V17ZM8 13H10V11H8V13ZM8 9H10V7H8V9ZM8 5H10V3H8V5ZM14 17H16V15H14V17ZM14 13H16V11H14V13Z" fill="#003D6A"/>
                        </svg>
                    </div>
                </div>
                <h3 class="service-card-title title-blue">Informasi Rencana Kota</h3>
                <p class="service-card-desc">Penyediaan Data Rencana Tata Ruang Kota.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        360 Layanan
                    </span>
                </div>
            </div>

            {{-- 8. KRK MBR --}}
            <div class="service-card service-card-green">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-green">
                        <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 18V14H2V12H4V7.85L1.2 10L0 8.4L11 0L22 8.4L20.8 10L18 7.85V12H20V14H18V18H16V14H12V18H10V14H6V18H4ZM6 12H10V3.275L6 6.325V12ZM12 12H16V6.325L12 3.275V12Z" fill="#456E00"/>
                        </svg>
                    </div>
                </div>
                <h3 class="service-card-title title-green">KRK MBR</h3>
                <p class="service-card-desc">Keterangan Rencana Kota Khusus untuk Hunian Masyarakat Berpenghasilan Rendah (MBR).</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        35 Layanan
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
