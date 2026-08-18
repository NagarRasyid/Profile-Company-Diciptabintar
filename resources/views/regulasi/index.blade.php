@extends('layouts.app')

@section('title', 'Regulasi & Dasar Hukum')

@push('styles')
<style>
/* =============================================
   REGULASI PAGE STYLES
============================================= */

.regulasi-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 32px 1px 40px;
}

/* ---- PAGE HEADER ---- */
.reg-header {
    margin-bottom: 28px;
}

.reg-header h1 {
    font-size: clamp(2.6rem, 2.9vw, 3.5rem);
    font-weight: 700;
    color: #003d6a;
    margin: 0 0 10px;
}

.reg-header p {
    font-size: 1.1rem;
    color: #52565e;
    line-height: 1.7;
    margin: 0;
    max-width: 660px;
}

/* ---- SEARCH & FILTER CARD (NEW DESIGN) ---- */
.reg-search-filter-card {
    background: #ffffff;
    border: 1px solid #cbd5e1;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 28px;
}

/* ---- SEARCH ---- */
.reg-search-wrap {
    position: relative;
    margin-bottom: 16px; /* Jarak antara search dan filter */
}

.reg-search-wrap svg {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    width: 20px;
    height: 20px;
    pointer-events: none;
}

.reg-search-input {
    width: 100%;
    padding: 12px 16px 12px 44px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 0.9rem;
    color: #334155;
    background: #ffffff;
    outline: none;
    box-sizing: border-box;
    transition: border-color 0.18s ease, box-shadow 0.18s ease;
}

.reg-search-input:focus {
    border-color: #003d6a;
    box-shadow: 0 0 0 3px rgba(0, 61, 106, 0.08);
}

.reg-search-input::placeholder { color: #94a3b8; }

/* ---- FILTER TABS ---- */
.reg-filters {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    font-size: 0.95rem;
    color: #475569;
}

.reg-filters-label {
    font-weight: 700;
    white-space: nowrap;
    margin-right: 4px;
    color: #334155;
}

.reg-tab {
    padding: 4px 10px;
    border-radius: 999px;
    border: 1px solid #cbd5e1;
    background: #ffffff;
    color: #475569;
    font-size: 0.79rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.18s ease;
    white-space: nowrap;
}

.reg-tab:hover {
    border-color: #003d6a;
    color: #003d6a;
}

.reg-tab.active {
    background: #003d6a;
    border-color: #003d6a;
    color: #ffffff;
    font-weight: 600;
}

/* ---- LIST HEADER ---- */
.reg-list-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 14px;
}

.reg-list-header h2 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #003d6a;
    margin: 0;
}

.reg-list-count {
    font-size: 0.78rem;
    color: #94a3b8;
}

/* ---- DOCUMENT ITEMS (ORIGINAL LIST DESIGN) ---- */
.reg-list {
    display: flex;
    flex-direction: column;
    gap: 0;
}

.reg-item {
    background: #ffffff;
    border: 1px solid #e5eaf2;
    border-radius: 10px;
    padding: 18px 20px;
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 10px;
    transition: box-shadow 0.18s ease;
}

.reg-item:hover {
    box-shadow: 0 4px 18px rgba(0,0,0,0.07);
}

/* PDF icon */
.reg-item-icon {
    width: 42px;
    height: 42px;
    border-radius: 8px;
    background: #fff0f0;
    border: 1.5px solid #fecaca;
    display: grid;
    place-items: center;
    flex-shrink: 0;
    font-size: 1.1rem;
    color: #dc2626;
}

/* Document meta */
.reg-item-body {
    flex: 1;
    min-width: 0;
}

.reg-item-meta {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 6px;
    flex-wrap: wrap;
}

.reg-item-badge {
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    color: #003d6a;
    background: #eef3ff;
    border-radius: 4px;
    padding: 2px 8px;
}

.reg-item-badge-perwal  { background: #e6f9ee; color: #15803d; }
.reg-item-badge-standar { background: #fff4e5; color: #c2410c; }
.reg-item-badge-sk      { background: #fef3c7; color: #92400e; }

.reg-item-info {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 0.75rem;
    color: #94a3b8;
}

.reg-item-info span {
    display: flex;
    align-items: center;
    gap: 3px;
}

.reg-item-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1e293b;
    line-height: 1.45;
    margin: 0;
}

/* Action buttons */
.reg-item-actions {
    display: flex;
    flex-direction: column;
    gap: 6px;
    flex-shrink: 0;
}

.reg-btn-unduh {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 14px;
    background: #003d6a;
    color: #ffffff;
    border-radius: 6px;
    font-size: 0.78rem;
    font-weight: 600;
    text-decoration: none;
    white-space: nowrap;
    transition: background 0.15s ease;
}

.reg-btn-unduh:hover { background: #002a4d; }

.reg-btn-lihat {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 14px;
    background: transparent;
    color: #003d6a;
    border: 1.5px solid #003d6a;
    border-radius: 6px;
    font-size: 0.78rem;
    font-weight: 600;
    text-decoration: none;
    white-space: nowrap;
    transition: all 0.15s ease;
}

.reg-btn-lihat:hover {
    background: #003d6a;
    color: #ffffff;
}

/* ---- PAGINATION ---- */
.reg-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    margin-top: 28px;
}

.reg-page-btn {
    width: 34px;
    height: 34px;
    border-radius: 7px;
    border: 1.5px solid #d1dbe8;
    background: #ffffff;
    color: #334155;
    font-size: 0.83rem;
    font-weight: 500;
    display: grid;
    place-items: center;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.15s ease;
}

.reg-page-btn:hover {
    border-color: #003d6a;
    color: #003d6a;
}

.reg-page-btn.active {
    background: #003d6a;
    border-color: #003d6a;
    color: #ffffff;
    font-weight: 700;
}

.reg-page-btn.nav { font-size: 1rem; }
.reg-page-ellipsis { color: #94a3b8; font-size: 0.85rem; padding: 0 2px; }
.reg-page-btn.nav[disabled] {
    display: none;
}
/* ---- EMPTY STATE ---- */
#reg-empty {
    text-align: center;
    padding: 48px 0;
    color: #94a3b8;
}

/* ---- RESPONSIVE ---- */
@media (max-width: 640px) {
    .regulasi-wrapper { padding: 24px 16px 48px; }
    .reg-search-filter-card { padding: 16px; }
    .reg-item { flex-wrap: wrap; }
    .reg-item-actions { flex-direction: row; width: 100%; }
    .reg-item-actions a { flex: 1; justify-content: center; }
}
</style>
@endpush

@section('content')
<div class="regulasi-wrapper">
    {{-- HEADER --}}
    <div class="reg-header">
        <h1>Regulasi &amp; Dasar Hukum</h1>
        <p>Pusat informasi dokumen regulasi, peraturan daerah, dan standar pelayanan publik terkait penataan ruang dan tata bangunan di Kota Bandung.</p>
    </div>

    {{-- CARD SEARCH & FILTER TABS --}}
    <div class="reg-search-filter-card">
        {{-- SEARCH --}}
        <div class="reg-search-wrap">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
            </svg>
            <input type="text" id="reg-search" class="reg-search-input"
                   placeholder="Cari berdasarkan judul, nomor, atau tahun peraturan...">
        </div>

        {{-- FILTER TABS --}}
        <div class="reg-filters">
            <span class="reg-filters-label">Kategori:</span>
            <button class="reg-tab active" data-filter="semua">Semua</button>
            <button class="reg-tab" data-filter="Undang-Undang">Undang-Undang</button>
            <button class="reg-tab" data-filter="Peraturan Presiden">Peraturan Presiden</button>
            <button class="reg-tab" data-filter="Peraturan Daerah">Peraturan Daerah</button>
            <button class="reg-tab" data-filter="Peraturan Walikota">Peraturan Walikota</button>
            <button class="reg-tab" data-filter="Peraturan Lembaga">Peraturan Lembaga</button>
            <button class="reg-tab" data-filter="LAKIP">LAKIP</button>
            <button class="reg-tab" data-filter="Dokumen">Dokumen Lainnya</button>
        </div>
    </div>

    {{-- LIST HEADER --}}
    <div class="reg-list-header">
        <h2>Daftar Dokumen</h2>
        <span class="reg-list-count" id="reg-count">Menampilkan {{ count($regulasi ?? []) }} regulasi</span>
    </div>
    <hr style="padding-bottom: 1rem; opacity: 0.2;">

    {{-- DOCUMENT LIST --}}
    <div class="reg-list" id="reg-list">
        @if(isset($regulasi) && count($regulasi) > 0)
            @foreach($regulasi as $item)
            @php
                $badgeClass = match($item['slug'] ?? '') {
                    'perwal'  => 'reg-item-badge reg-item-badge-perwal',
                    'perpres' => 'reg-item-badge reg-item-badge-standar',
                    'uu'      => 'reg-item-badge reg-item-badge-perwal',
                    'lakip'   => 'reg-item-badge reg-item-badge-sk',
                    'perlem' => 'reg-item-badge reg-item-badge-sk',
                    default   => 'reg-item-badge',
                };
            @endphp
            <div class="reg-item"
                 data-kategori="{{ $item['kategori'] ?? '' }}"
                 data-judul="{{ Str::lower($item['judul'] ?? '') }}"
                 data-tahun="{{ $item['tahun'] ?? '' }}">

                {{-- PDF Icon --}}
                <div class="reg-item-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                        <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029z"/>
                    </svg>
                </div>

                {{-- Body --}}
                <div class="reg-item-body">
                    <div class="reg-item-meta">
                        <span class="{{ $badgeClass }}">{{ $item['badge'] ?? '' }}</span>
                        <div class="reg-item-info">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                {{ $item['tahun'] ?? '' }}
                            </span>
                            @if(!empty($item['nomor']))
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M5.5 2A2.5 2.5 0 0 0 3 4.5v7A2.5 2.5 0 0 0 5.5 14h5a2.5 2.5 0 0 0 2.5-2.5V6.621a1.5 1.5 0 0 0-.44-1.06L10.44 2.439A1.5 1.5 0 0 0 9.378 2H5.5z"/>
                                </svg>
                                Nomor {{ $item['nomor'] }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <p class="reg-item-title">{{ $item['judul'] ?? '' }}</p>
                </div>

                {{-- Actions --}}
                <div class="reg-item-actions">
                    <a href="{{ route('regulasi.download', ['file' => $item['file'], 'judul' => $item['judul']]) }}" class="reg-btn-unduh">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Unduh
                    </a>
                    <a href="{{ $item['file'] ?? '#' }}" class="reg-btn-lihat" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                        Lihat
                    </a>
                </div>
            </div>
            @endforeach
        @endif
    </div>

    {{-- EMPTY STATE --}}
    <div id="reg-empty" style="display:none;">
        <div style="font-size:2.5rem; margin-bottom:12px;">📄</div>
        <p style="font-size:0.92rem;">Dokumen tidak ditemukan. Coba kata kunci lain.</p>
    </div>

    {{-- PAGINATION --}}
    <div class="reg-pagination" id="reg-pagination"></div>

</div>

@push('scripts')
<script>
const PER_PAGE   = 10;
const regTabs    = document.querySelectorAll('.reg-tab');
const allItems   = Array.from(document.querySelectorAll('.reg-item'));
const regSearch  = document.getElementById('reg-search');
const regEmpty   = document.getElementById('reg-empty');
const regCount   = document.getElementById('reg-count');
const regPagEl   = document.getElementById('reg-pagination');

let activeKat  = 'semua';
let currentPage = 1;

/** Kembalikan array item yang lolos filter saat ini */
function getFiltered() {
    const q = regSearch ? regSearch.value.toLowerCase().trim() : '';
    return allItems.filter(item => {
        const kat   = item.dataset.kategori || '';
        const judul = item.dataset.judul    || '';
        const thn   = item.dataset.tahun    || '';
        const matchKat    = activeKat === 'semua' || kat === activeKat;
        const matchSearch = !q || judul.includes(q) || thn.includes(q);
        return matchKat && matchSearch;
    });
}

/** Tampilkan halaman ke-n dari daftar filtered */
function renderPage(filtered, page) {
    const start = (page - 1) * PER_PAGE;
    const end   = start + PER_PAGE;

    allItems.forEach(item => item.style.display = 'none');
    filtered.slice(start, end).forEach(item => item.style.display = '');

    if (regEmpty) {
        regEmpty.style.display = filtered.length === 0 ? 'block' : 'none';
    }
    if (regCount) {
        const from = filtered.length ? start + 1 : 0;
        const to   = Math.min(end, filtered.length);
        regCount.textContent = filtered.length > 0
            ? `Menampilkan ${from}–${to} dari ${filtered.length} regulasi`
            : 'Tidak ada regulasi ditemukan';
    }

    renderPagination(filtered.length, page);
}

/** Render tombol pagination */
function renderPagination(total, page) {
    if (!regPagEl) return;
    const totalPages = Math.ceil(total / PER_PAGE);
    if (totalPages <= 1) { regPagEl.innerHTML = ''; return; }

    let html = '';

    // Prev
    html += `<button class="reg-page-btn nav" ${page === 1 ? 'disabled' : ''} data-p="${page - 1}" aria-label="Sebelumnya">&#8249;</button>`;

    // Nomor halaman dengan ellipsis
    const pages = buildPageRange(page, totalPages);
    pages.forEach(p => {
        if (p === '...') {
            html += `<span class="reg-page-ellipsis">&hellip;</span>`;
        } else {
            html += `<button class="reg-page-btn${p === page ? ' active' : ''}" data-p="${p}">${p}</button>`;
        }
    });

    // Next
    html += `<button class="reg-page-btn nav" ${page === totalPages ? 'disabled' : ''} data-p="${page + 1}" aria-label="Selanjutnya">&#8250;</button>`;

    regPagEl.innerHTML = html;

    regPagEl.querySelectorAll('[data-p]').forEach(btn => {
        btn.addEventListener('click', () => {
            const p = parseInt(btn.dataset.p);
            if (!isNaN(p) && p >= 1 && p <= totalPages) {
                currentPage = p;
                renderPage(getFiltered(), currentPage);
                // Scroll ke atas daftar
                document.getElementById('reg-list').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
}

/** Bangun array nomor halaman dengan ellipsis */
function buildPageRange(cur, total) {
    if (total <= 5) return Array.from({ length: total }, (_, i) => i + 1);
    const pages = [];
    pages.push(1);
    if (cur > 3) pages.push('...');
    for (let p = Math.max(2, cur - 1); p <= Math.min(total - 1, cur + 1); p++) pages.push(p);
    if (cur < total - 2) pages.push('...');
    pages.push(total);
    return pages;
}

/** Dipanggil setiap kali filter/search berubah */
function applyFilter() {
    currentPage = 1;
    renderPage(getFiltered(), currentPage);
}

// Event listeners
regTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        regTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        activeKat = tab.dataset.filter;
        applyFilter();
    });
});

if (regSearch) regSearch.addEventListener('input', applyFilter);

// Inisialisasi pertama
applyFilter();
</script>
@endpush
@endsection