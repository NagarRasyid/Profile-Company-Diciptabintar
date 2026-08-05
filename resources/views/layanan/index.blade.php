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
    font-size: clamp(1.8rem, 3.5vw, 2.5rem);
    font-weight: 700;
    color: #003d6a;
    margin: 0 0 12px;
}

.layanan-header p {
    font-size: 1rem;
    color: #64748b;
    line-height: 1.7;
    max-width: 480px;
    margin: 0 auto;
}

/* ---- SEARCH & FILTER ---- */
.layanan-controls {
    background: #f9f9fd;
    padding: 28px 80px 36px;
    border-bottom: 1px solid #e5eaf2;
}

.layanan-search-wrap {
    position: relative;
    max-width: 500px;
    margin: 0 auto 20px;
}

.layanan-search-wrap svg {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    width: 18px;
    height: 18px;
    pointer-events: none;
}

.layanan-search-input {
    width: 100%;
    padding: 12px 18px 12px 44px;
    border: 1.5px solid #d1dbe8;
    border-radius: 999px;
    font-size: 0.9rem;
    color: #334155;
    background: #f8faff;
    outline: none;
    box-sizing: border-box;
    transition: border-color 0.18s ease, box-shadow 0.18s ease;
}

.layanan-search-input:focus {
    border-color: #003d6a;
    box-shadow: 0 0 0 3px rgba(0, 61, 106, 0.08);
    background: #f9f9fd;
}

.layanan-search-input::placeholder { color: #94a3b8; }

/* ---- FILTER TABS ---- */
.layanan-filters {
    display: flex;
    justify-content: center;
    gap: 8px;
    flex-wrap: wrap;
}

.filter-tab {
    padding: 7px 18px;
    border-radius: 999px;
    border: 1.5px solid #d1dbe8;
    background: #f9f9fd;
    color: #52565e;
    font-size: 0.94rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.18s ease;
    white-space: nowrap;
}

.filter-tab:hover {
    border-color: #003d6a;
    color: #003d6a;
}

.filter-tab.active {
    background: #003d6a;
    border-color: #003d6a;
    color: #f9f9fd;
    font-weight: 600;
}

/* ---- SERVICE CARDS GRID ---- */
.layanan-body {
    padding: 40px 80px 56px;
    background: #f8faff;
}

.layanan-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.service-card {
    background: #f9f9fd;
    border: 1px solid #e5eaf2;
    border-left: 4px solid transparent;
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
.service-card-blue   { border-left-color: #003d6a; }
.service-card-green  { border-left-color: #16a34a; }
.service-card-orange { border-left-color: #f97316; }
.service-card-pink   { border-left-color: #e11d48; }
.service-card-teal   { border-left-color: #0891b2; }
.service-card-gray   { border-left-color: #64748b; }

/* Card top: icon + category badge */
.service-card-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 14px;
}

.service-card-icon {
    width: 38px;
    height: 38px;
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
    font-size: 0.72rem;
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
.title-pink  { color: #be123c; }
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
    border-top: 1px solid #f1f5f9;
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

/* ---- ALUR LAYANAN ---- */
.alur-layanan-section {
    background: #eef1f6;
    padding: 56px 80px;
    border-top: 1px solid #d1dbe8;
}

.alur-layanan-header {
    text-align: center;
    margin-bottom: 48px;
}

.alur-layanan-header h2 {
    font-size: clamp(1.4rem, 2.5vw, 1.9rem);
    font-weight: 600;
    color: #003d6a;
    margin: 0 0 10px;
}

.alur-layanan-header p {
    font-size: 1rem;
    color: #64748b;
    margin: 0;
}

.alur-steps-row {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    position: relative;
}

/* Horizontal connector line behind steps */
.alur-steps-row::before {
    content: '';
    position: absolute;
    top: 28px;
    left: calc(50% - 44%);
    width: 88%;
    height: 2px;
    background: #cbd5e1;
    z-index: 0;
}

.alur-step-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    flex: 1;
    max-width: 160px;
    position: relative;
    z-index: 1;
}

.alur-step-circle {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    font-size: 1.1rem;
    font-weight: 800;
    color: #f9f9fd;
    margin-bottom: 14px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
}

.step-circle-navy  { background: #003d6a; }
.step-circle-gray  { background: #94a3b8; }
.step-circle-green { background: #16a34a; }

.alur-step-item h3 {
    font-size: 1rem;
    font-weight: 700;
    color: #0a1628;
    margin: 0 0 6px;
}

.alur-step-item p {
    font-size: 0.85rem;
    color: #64748b;
    line-height: 1.5;
    margin: 0;
    max-width: 150px;
}

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

    {{-- ===== SEARCH & FILTER ===== --}}
    <div class="layanan-controls">
        <div class="layanan-search-wrap">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
            </svg>
            <input type="text" id="layanan-search" class="layanan-search-input" placeholder="Cari layanan...">
        </div>

        <div class="layanan-filters">
            <button class="filter-tab active" data-filter="semua">Semua</button>
            <button class="filter-tab" data-filter="cipta-karya">Cipta Karya</button>
            <button class="filter-tab" data-filter="bina-konstruksi">Bina Konstruksi</button>
            <button class="filter-tab" data-filter="tata-ruang">Tata Ruang</button>
            <button class="filter-tab" data-filter="pengaduan">Pengaduan</button>
            <button class="filter-tab" data-filter="informasi-publik">Informasi Publik</button>
        </div>
    </div>

    {{-- ===== SERVICE CARDS ===== --}}
    <div class="layanan-body">
        <div class="layanan-grid" id="layanan-grid">

            {{-- 1. Permohonan Informasi Tata Ruang --}}
            <div class="service-card service-card-blue" data-category="tata-ruang" data-name="permohonan informasi tata ruang">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-blue">🗺️</div>
                    <span class="service-card-badge">Tata Ruang</span>
                </div>
                <h3 class="service-card-title title-blue">Permohonan Informasi Tata Ruang</h3>
                <p class="service-card-desc">Layanan permohonan informasi detail mengenai peruntukan tata ruang di wilayah tertentu.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        3 Hari Kerja
                    </span>
                    <a href="#" class="service-card-link">Lihat Detail &rarr;</a>
                </div>
            </div>

            {{-- 2. Konsultasi Bangunan Gedung --}}
            <div class="service-card service-card-green" data-category="cipta-karya" data-name="konsultasi bangunan gedung">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-green">🏛️</div>
                    <span class="service-card-badge">Cipta Karya</span>
                </div>
                <h3 class="service-card-title title-green">Konsultasi Bangunan Gedung</h3>
                <p class="service-card-desc">Layanan konsultasi teknis terkait standar dan persyaratan bangunan gedung sebelum mendirikan bangunan.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        5 Hari Kerja
                    </span>
                    <a href="#" class="service-card-link">Lihat Detail &rarr;</a>
                </div>
            </div>

            {{-- 3. Informasi Konstruksi --}}
            <div class="service-card service-card-orange" data-category="bina-konstruksi" data-name="informasi konstruksi">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-orange">👷</div>
                    <span class="service-card-badge">Bina Konstruksi</span>
                </div>
                <h3 class="service-card-title title-orange">Informasi Konstruksi</h3>
                <p class="service-card-desc">Penyediaan data dan informasi terkait standar harga, material, dan jasa konstruksi daerah.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        1 Hari Kerja
                    </span>
                    <a href="#" class="service-card-link">Lihat Detail &rarr;</a>
                </div>
            </div>

            {{-- 4. Pengaduan Layanan --}}
            <div class="service-card service-card-pink" data-category="pengaduan" data-name="pengaduan layanan">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-pink">📣</div>
                    <span class="service-card-badge">Pengaduan</span>
                </div>
                <h3 class="service-card-title title-pink">Pengaduan Layanan</h3>
                <p class="service-card-desc">Sampaikan keluhan, saran, atau masukan terkait layanan dan infrastruktur binaan dinas.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Bervariasi
                    </span>
                    <a href="{{ route('contact') }}" class="service-card-link">Lihat Detail &rarr;</a>
                </div>
            </div>

            {{-- 5. Rekomendasi Teknis --}}
            <div class="service-card service-card-teal" data-category="tata-ruang" data-name="rekomendasi teknis">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-teal">✅</div>
                    <span class="service-card-badge">Lintas Bidang</span>
                </div>
                <h3 class="service-card-title title-teal">Rekomendasi Teknis</h3>
                <p class="service-card-desc">Penerbitan surat rekomendasi teknis untuk keperluan perizinan terkait tata bangunan dan lingkungan.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        7 Hari Kerja
                    </span>
                    <a href="#" class="service-card-link">Lihat Detail &rarr;</a>
                </div>
            </div>

            {{-- 6. Permohonan Informasi Publik (PPID) --}}
            <div class="service-card service-card-gray" data-category="informasi-publik" data-name="permohonan informasi publik ppid">
                <div class="service-card-top">
                    <div class="service-card-icon icon-bg-gray">ℹ️</div>
                    <span class="service-card-badge">Informasi Publik</span>
                </div>
                <h3 class="service-card-title title-gray">Permohonan Informasi Publik (PPID)</h3>
                <p class="service-card-desc">Layanan permohonan informasi publik sesuai dengan undang-undang keterbukaan informasi publik.</p>
                <div class="service-card-footer">
                    <span class="service-card-duration">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Sesuai UU
                    </span>
                    <a href="#" class="service-card-link">Lihat Detail &rarr;</a>
                </div>
            </div>

        </div>

        {{-- Empty state --}}
        <div id="no-results" style="display:none; text-align:center; padding:48px 0; color:#94a3b8;">
            <div style="font-size:2.5rem; margin-bottom:12px;">🔍</div>
            <p style="font-size:0.95rem;">Layanan tidak ditemukan. Coba kata kunci lain.</p>
        </div>
    </div>

    {{-- ===== ALUR LAYANAN UMUM ===== --}}
    <div class="alur-layanan-section">
        <div class="alur-layanan-header">
            <h2>Alur Layanan Umum</h2>
            <p>Langkah mudah untuk mengakses layanan publik kami.</p>
        </div>

        <div class="alur-steps-row">
            <div class="alur-step-item">
                <div class="alur-step-circle step-circle-navy">1</div>
                <h3>Pilih Layanan</h3>
                <p>Temukan layanan yang sesuai dengan kebutuhan Anda.</p>
            </div>
            <div class="alur-step-item">
                <div class="alur-step-circle step-circle-navy">2</div>
                <h3>Lengkapi Syarat</h3>
                <p>Siapkan dan unggah dokumen persyaratan yang diminta.</p>
            </div>
            <div class="alur-step-item">
                <div class="alur-step-circle step-circle-gray">3</div>
                <h3>Verifikasi</h3>
                <p>Petugas kami akan memeriksa kelengkapan dokumen Anda.</p>
            </div>
            <div class="alur-step-item">
                <div class="alur-step-circle step-circle-gray">4</div>
                <h3>Proses</h3>
                <p>Permohonan Anda sedang diproses oleh bidang terkait.</p>
            </div>
            <div class="alur-step-item">
                <div class="alur-step-circle step-circle-green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                </div>
                <h3>Selesai</h3>
                <p>Hasil layanan dapat diunduh atau diambil.</p>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
// ---- Filter & Search Logic ----
const filterTabs   = document.querySelectorAll('.filter-tab');
const cards        = document.querySelectorAll('.service-card');
const searchInput  = document.getElementById('layanan-search');
const noResults    = document.getElementById('no-results');

let activeFilter = 'semua';

function applyFilter() {
    const q = searchInput.value.toLowerCase().trim();
    let visible = 0;

    cards.forEach(card => {
        const cat  = card.dataset.category;
        const name = card.dataset.name;
        const matchFilter = activeFilter === 'semua' || cat === activeFilter;
        const matchSearch = !q || name.includes(q);

        if (matchFilter && matchSearch) {
            card.style.display = '';
            visible++;
        } else {
            card.style.display = 'none';
        }
    });

    noResults.style.display = visible === 0 ? 'block' : 'none';
}

filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        filterTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        activeFilter = tab.dataset.filter;
        applyFilter();
    });
});

searchInput.addEventListener('input', applyFilter);
</script>
@endpush
@endsection
