@extends('layouts.app')

@section('title', 'Hubungi Kami')

@push('styles')
<style>
/* =============================================
   CONTACT PAGE STYLES
============================================= */

.contact-wrapper {
    max-width: 1280px;
    margin: 0 auto;
    padding: 36px 48px 72px;
}

/* ---- PAGE HEADER ---- */
.contact-breadcrumb {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.82rem;
    color: #64748b;
    margin-bottom: 12px;
}

.contact-breadcrumb a {
    color: #003d6a;
    text-decoration: none;
    font-weight: 500;
}

.contact-breadcrumb a:hover { text-decoration: underline; }

.contact-page-title {
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    font-weight: 800;
    color: #0a1628;
    margin: 0 0 10px;
}

.contact-page-desc {
    font-size: 0.97rem;
    color: #52565e;
    line-height: 1.7;
    margin: 0 0 40px;
    max-width: 500px;
}

/* ---- MAIN LAYOUT ---- */
.contact-layout {
    display: grid;
    grid-template-columns: 340px 1fr;
    gap: 32px;
    align-items: start;
}

/* ---- LEFT: INFO PANEL ---- */
.contact-info-panel h2 {
    font-size: 1.15rem;
    font-weight: 700;
    color: #0a1628;
    margin: 0 0 16px;
}

.contact-info-cards {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 20px;
}

.contact-info-card {
    background: #ffffff;
    border: 1px solid #e5eaf2;
    border-radius: 12px;
    padding: 16px 18px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
}

.contact-info-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.ci-blue   { background: #e8f0fb; }
.ci-orange { background: #fff4e5; }
.ci-green  { background: #e8f7ef; }
.ci-sky    { background: #e0f4ff; }

.contact-info-text strong {
    display: block;
    font-size: 0.9rem;
    font-weight: 700;
    color: #0a1628;
    margin-bottom: 4px;
}

.contact-info-text p,
.contact-info-text span {
    font-size: 0.85rem;
    color: #52565e;
    line-height: 1.6;
    margin: 0;
}

/* ---- MAP ---- */
.contact-map-wrap {
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid #e5eaf2;
    position: relative;
}

.contact-map-wrap iframe {
    width: 100%;
    height: 220px;
    display: block;
    border: 0;
}

.contact-map-label {
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(255,255,255,0.92);
    border: 1px solid #e5eaf2;
    border-radius: 999px;
    padding: 3px 14px;
    font-size: 0.73rem;
    font-weight: 600;
    color: #334155;
    white-space: nowrap;
}

.contact-map-open {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 10px;
    background: #ffffff;
    border-top: 1px solid #e5eaf2;
    font-size: 0.82rem;
    font-weight: 600;
    color: #003d6a;
    text-decoration: none;
    transition: background 0.15s;
}

.contact-map-open:hover { background: #f1f5fb; }

/* ---- RIGHT: FORM PANEL ---- */
.contact-form-panel {
    background: #ffffff;
    border-radius: 16px;
    padding: 36px 40px;
    box-shadow: 0 2px 16px rgba(0,0,0,0.04);
    border-top: 4px solid transparent;
    display: flex;
    flex-direction: column;
}

.contact-form-panel-green  { border-top-color: #16a34a; }

.contact-form-panel-header {
    margin-bottom: 6px;
}

.contact-form-panel-title {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.45rem;
    font-weight: 800;
    color: #0a1628;
    margin: 0 0 8px;
}

.contact-form-panel-title span {
    font-size: 1.4rem;
}

.contact-form-panel-desc {
    font-size: 0.88rem;
    color: #52565e;
    line-height: 1.65;
    margin: 0 0 28px;
}

/* ---- FORM ELEMENTS ---- */
.contact-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.contact-form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 20px;
}

.contact-form-group.full { margin-bottom: 20px; }

.contact-form-label {
    font-size: 0.88rem;
    font-weight: 600;
    color: #334155;
}

.contact-form-label .req {
    color: #e11d48;
    margin-left: 2px;
}

.contact-form-input,
.contact-form-select,
.contact-form-textarea {
    width: 100%;
    padding: 11px 14px;
    border: 1.5px solid #d1dbe8;
    border-radius: 9px;
    font-size: 0.9rem;
    color: #1e293b;
    background: #ffffff;
    outline: none;
    transition: border-color 0.18s ease, box-shadow 0.18s ease;
    appearance: none;
    -webkit-appearance: none;
    box-sizing: border-box;
}

.contact-form-input:focus,
.contact-form-select:focus,
.contact-form-textarea:focus {
    border-color: #003d6a;
    box-shadow: 0 0 0 3px rgba(0, 61, 106, 0.08);
}

.contact-form-input::placeholder,
.contact-form-textarea::placeholder {
    color: #94a3b8;
}

.contact-form-select-wrap {
    position: relative;
}

.contact-form-select-wrap::after {
    content: '';
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 6px solid #64748b;
    pointer-events: none;
}

.contact-form-select {
    cursor: pointer;
    padding-right: 36px;
}

.contact-form-textarea {
    resize: vertical;
    min-height: 120px;
    line-height: 1.6;
}

/* ---- FILE UPLOAD ---- */
.contact-label-attach {
    font-size: 0.88rem;
    font-weight: 600;
    color: #334155;
    margin-bottom: 8px;
    display: block;
}

.contact-upload-zone {
    border: 2px dashed #cbd5e1;
    border-radius: 12px;
    padding: 32px 20px;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.18s, background 0.18s;
    background: #f8fafc;
    position: relative;
}

.contact-upload-zone:hover,
.contact-upload-zone.drag-over {
    border-color: #003d6a;
    background: #f0f6ff;
}

.contact-upload-zone input[type="file"] {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%;
}

.contact-upload-icon {
    width: 44px;
    height: 44px;
    background: #e2e8f0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 12px;
}

.contact-upload-icon svg {
    width: 22px;
    height: 22px;
    color: #64748b;
}

.contact-upload-text {
    font-size: 0.88rem;
    color: #64748b;
    line-height: 1.5;
}

.contact-upload-text a {
    color: #003d6a;
    font-weight: 600;
    text-decoration: none;
}

.contact-upload-hint {
    font-size: 0.78rem;
    color: #94a3b8;
    margin-top: 4px;
}

/* ---- ALERT ---- */
.contact-alert {
    padding: 14px 16px;
    border-radius: 10px;
    margin-bottom: 24px;
    font-size: 0.88rem;
    font-weight: 500;
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.contact-alert-success {
    background: #dcfce7;
    color: #166534;
    border: 1px solid #bbf7d0;
}

.contact-alert-error {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #fecaca;
}

/* ---- SUBMIT BUTTON ---- */
.contact-form-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 28px;
}

.contact-submit-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    background: #002747;
    color: #ffffff;
    border: none;
    border-radius: 10px;
    font-size: 0.95rem;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.18s ease, transform 0.15s ease;
}

.contact-submit-btn:hover {
    background: #003d6a;
    transform: translateY(-1px);
}

.contact-submit-btn svg {
    width: 18px;
    height: 18px;
}

/* ---- RESPONSIVE ---- */
@media (max-width: 1024px) {
    .contact-wrapper { padding: 32px 40px 60px; }
    .contact-layout { grid-template-columns: 300px 1fr; gap: 24px; }
}

@media (max-width: 768px) {
    .contact-wrapper { padding: 28px 20px 48px; }
    .contact-layout { grid-template-columns: 1fr; }
    .contact-form-row { grid-template-columns: 1fr; }
    .contact-form-panel { padding: 24px 20px; }
}
</style>
@endpush

@section('content')
<div class="contact-wrapper">

    {{-- Breadcrumb --}}
    <div class="contact-breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <span>›</span>
        <span>Hubungi Kami</span>
    </div>

    <h1 class="contact-page-title">Hubungi Kami</h1>
    <p class="contact-page-desc">
        Kami siap membantu dan melayani Anda. Silakan hubungi kami melalui informasi di
        bawah atau kirimkan pengaduan Anda.
    </p>

    <div class="contact-layout">

        {{-- ===== KIRI: INFORMASI KONTAK ===== --}}
        <div class="contact-info-panel">
            <h2>Informasi Kontak</h2>

            <div class="contact-info-cards">

                {{-- Alamat --}}
                <div class="contact-info-card">
                    <div class="contact-info-icon ci-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#003d6a" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </div>
                    <div class="contact-info-text">
                        <strong>Alamat Kantor</strong>
                        <p>Jl. Cianjur No.34, Kacapiring, Kec.<br>Batununggal, Kota Bandung, Jawa Barat<br>40271</p>
                    </div>
                </div>

                {{-- Jam Operasional --}}
                <div class="contact-info-card">
                    <div class="contact-info-icon ci-orange">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#f97316" viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 1 0 0 20A10 10 0 0 0 12 2zm.5 5v5.25l4.5 2.67-.75 1.23-5.25-3.15V7h1.5z"/>
                        </svg>
                    </div>
                    <div class="contact-info-text">
                        <strong>Jam Operasional</strong>
                        <span>Senin - Kamis: 08:00 - 16:00<br>Jumat: 08:00 - 16:30<br>Sabtu - Minggu: Tutup</span>
                    </div>
                </div>

                {{-- Email --}}
                <div class="contact-info-card">
                    <div class="contact-info-icon ci-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#16a34a" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                    <div class="contact-info-text">
                        <strong>Email</strong>
                        <span>diciptabintar@bandung.go.id</span>
                    </div>
                </div>

                {{-- Telepon --}}
                <div class="contact-info-card">
                    <div class="contact-info-icon ci-sky">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#0891b2" viewBox="0 0 24 24">
                            <path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02L6.62 10.79z"/>
                        </svg>
                    </div>
                    <div class="contact-info-text">
                        <strong>Telepon / WhatsApp</strong>
                        <span>(022) 7217451</span>
                    </div>
                </div>

            </div>

            {{-- Google Maps Embed --}}
            <div class="contact-map-wrap">
                <span class="contact-map-label">PETA KACAPIRING, BANDUNG</span>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.717074817068!2d107.63480041524324!3d-6.921627594976283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8b0a0456bbb%3A0x38aee38e8de34b6a!2sDinas%20Cipta%20Karya%2C%20Bina%20Konstruksi%20dan%20Tata%20Ruang%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1691000000000!5m2!1sid!2sid"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Lokasi Diciptabintar Kota Bandung">
                </iframe>
                <a href="https://maps.google.com/?q=Dinas+Cipta+Karya+Bina+Konstruksi+dan+Tata+Ruang+Kota+Bandung"
                   target="_blank" rel="noopener" class="contact-map-open">
                    Buka di Peta
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- ===== KANAN: FORM PENGADUAN ===== --}}
        <div class="contact-form-panel contact-form-panel-green">
            <div class="contact-form-panel-header">
                <div class="contact-form-panel-title">
                    <span>💬</span> Form Pengaduan
                </div>
                <p class="contact-form-panel-desc">
                    Sampaikan aspirasi, saran, atau pengaduan Anda terkait layanan Diciptabintar Kota Bandung. Semua laporan
                    akan kami tindaklanjuti.
                </p>
            </div>

            {{-- Notifikasi Sukses --}}
            @if(session('success'))
                <div class="contact-alert contact-alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:1px;">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5-4-4 1.41-1.41L10 13.67l6.59-6.59L18 8.5l-8 8z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error --}}
            @if($errors->any())
                <div class="contact-alert contact-alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:1px;">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Baris 1: Nama + Email --}}
                <div class="contact-form-row">
                    <div class="contact-form-group">
                        <label class="contact-form-label" for="name">Nama Lengkap <span class="req">*</span></label>
                        <input type="text" id="name" name="name"
                               value="{{ old('name') }}"
                               placeholder="Masukkan nama lengkap"
                               class="contact-form-input"
                               required>
                    </div>
                    <div class="contact-form-group">
                        <label class="contact-form-label" for="email">Alamat Email <span class="req">*</span></label>
                        <input type="email" id="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="contoh@email.com"
                               class="contact-form-input"
                               required>
                    </div>
                </div>

                {{-- Baris 2: Telepon + Subjek --}}
                <div class="contact-form-row">
                    <div class="contact-form-group">
                        <label class="contact-form-label" for="phone">Nomor Telepon/WhatsApp <span class="req">*</span></label>
                        <input type="text" id="phone" name="phone"
                               value="{{ old('phone') }}"
                               placeholder="08xxxxxxxxxxx"
                               class="contact-form-input"
                               required>
                    </div>
                    <div class="contact-form-group">
                        <label class="contact-form-label" for="subject">Subjek <span class="req">*</span></label>
                        <div class="contact-form-select-wrap">
                            <select id="subject" name="subject" class="contact-form-select" required>
                                <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Pilih subjek pengaduan</option>
                                <option value="Pengaduan Layanan"       {{ old('subject') == 'Pengaduan Layanan'        ? 'selected' : '' }}>Pengaduan Layanan</option>
                                <option value="Pertanyaan Umum"         {{ old('subject') == 'Pertanyaan Umum'          ? 'selected' : '' }}>Pertanyaan Umum</option>
                                <option value="Informasi PBG"           {{ old('subject') == 'Informasi PBG'            ? 'selected' : '' }}>Informasi PBG</option>
                                <option value="Informasi Tata Ruang"    {{ old('subject') == 'Informasi Tata Ruang'     ? 'selected' : '' }}>Informasi Tata Ruang</option>
                                <option value="Saran & Masukan"         {{ old('subject') == 'Saran & Masukan'          ? 'selected' : '' }}>Saran &amp; Masukan</option>
                                <option value="Lainnya"                 {{ old('subject') == 'Lainnya'                  ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Isi Pesan --}}
                <div class="contact-form-group full">
                    <label class="contact-form-label" for="message">Isi Pesan <span class="req">*</span></label>
                    <textarea id="message" name="message"
                              class="contact-form-textarea"
                              placeholder="Tuliskan detail pengaduan atau pesan Anda di sini..."
                              required>{{ old('message') }}</textarea>
                </div>

                {{-- Lampiran --}}
                <div>
                    <span class="contact-label-attach">Lampiran (Opsional)</span>
                    <div class="contact-upload-zone" id="uploadZone">
                        <input type="file" name="attachment" id="attachmentInput"
                               accept=".png,.jpg,.jpeg,.pdf"
                               onchange="updateFileName(this)">
                        <div class="contact-upload-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                            </svg>
                        </div>
                        <div class="contact-upload-text">
                            <a href="#" onclick="return false;">Pilih file</a> atau tarik dan lepas
                        </div>
                        <div class="contact-upload-hint" id="uploadHint">PNG, JPG, PDF maksimal 5MB</div>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="contact-form-footer">
                    <button type="submit" class="contact-submit-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.269 20.876L5.999 12zm0 0h7.5"/>
                        </svg>
                        Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
/* Tampilkan nama file yang dipilih */
function updateFileName(input) {
    const hint = document.getElementById('uploadHint');
    if (input.files && input.files[0]) {
        const name = input.files[0].name;
        const size = (input.files[0].size / 1024 / 1024).toFixed(2);
        hint.textContent = `✓ ${name} (${size} MB)`;
        hint.style.color = '#16a34a';
    }
}

/* Drag & Drop visual feedback */
const zone = document.getElementById('uploadZone');
if (zone) {
    zone.addEventListener('dragover', (e) => { e.preventDefault(); zone.classList.add('drag-over'); });
    zone.addEventListener('dragleave', ()  => zone.classList.remove('drag-over'));
    zone.addEventListener('drop', (e) => {
        e.preventDefault();
        zone.classList.remove('drag-over');
        const input = document.getElementById('attachmentInput');
        input.files = e.dataTransfer.files;
        updateFileName(input);
    });
}
</script>
@endpush
