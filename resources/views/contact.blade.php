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
    padding: 36px 0px 72px;
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
    color: #003d6a;
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
    grid-template-columns: 400px 1fr;
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
    height: 300px;
    display: block;
    border: 0;
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
    padding: 28px 40px;
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
    background: #003d6a;
    color: #ffffff;
    border: none;
    border-radius: 10px;
    font-size: 0.95rem;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.18s ease, transform 0.15s ease;
}

.contact-submit-btn:hover {
    background: #002747;
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
    <!-- Pengkondisian halaman sebelumnya -->
    @php
        $prevUrl = url()->previous();
        $currentUrl = url()->current();
        $homeUrl = route('home');
        $path = parse_url($prevUrl, PHP_URL_PATH);
        $cleanPath = str_replace('-', ' ', trim($path, '/'));
        $pageName = $cleanPath ? ucwords($cleanPath) : 'Beranda';

        if ($prevUrl == $currentUrl || !str_contains($prevUrl, request()->getHost())) {
            $prevUrl = $homeUrl;
            $pageName = 'Beranda';
        }
    @endphp

    <a href="{{ $prevUrl }}">{{ $pageName }}</a>
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
                        <span>(022) 7217451 <br>  082240791234</span>
                    </div>
                </div>

            </div>

            {{-- Google Maps Embed --}}
            <div class="contact-map-wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d832.6530099779928!2d107.63351291591535!3d-6.915986680271573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7cfdd53e233%3A0x24799b0b4b52b943!2sDinas%20Cipta%20Karya%2C%20Bina%20Konstruksi%20dan%20Tata%20Ruang%20Kota%20Bandung!5e0!3m2!1sen!2sid!4v1787104146958!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
        </div>

        {{-- ===== KANAN: FORM PENGADUAN ===== --}}
        <div class="contact-form-panel contact-form-panel-green">
            <div class="contact-form-panel-header">
                <div class="contact-form-panel-title">
                    <span>
                        <svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 19.5C14.25 19.4688 16.2656 19.0312 18.0469 18.1875C19.8594 17.3125 21.2969 16.1406 22.3594 14.6719C23.4219 13.2031 23.9688 11.5625 24 9.75C23.9688 7.9375 23.4219 6.29688 22.3594 4.82812C21.2969 3.35938 19.8594 2.1875 18.0469 1.3125C16.2656 0.46875 14.25 0.03125 12 0C9.75 0.03125 7.73438 0.46875 5.95312 1.3125C4.14062 2.1875 2.70312 3.35938 1.64062 4.82812C0.578125 6.29688 0.03125 7.9375 0 9.75C0.03125 11.9062 0.78125 13.7969 2.25 15.4219C2.09375 16.5781 1.75 17.5625 1.21875 18.375C0.96875 18.8125 0.734375 19.1406 0.515625 19.3594C0.421875 19.4844 0.34375 19.5781 0.28125 19.6406C0.28125 19.6719 0.265625 19.6875 0.234375 19.6875C0.234375 19.6875 0.234375 19.7031 0.234375 19.7344C0.015625 19.9531 -0.046875 20.2188 0.046875 20.5312C0.203125 20.8438 0.4375 21 0.75 21C2.125 20.9375 3.40625 20.6406 4.59375 20.1094C5.6875 19.6094 6.53125 19.125 7.125 18.6562C8.625 19.2188 10.25 19.5 12 19.5ZM6 8.25C6.4375 8.25 6.79688 8.39062 7.07812 8.67188C7.35938 8.95312 7.5 9.3125 7.5 9.75C7.5 10.1875 7.35938 10.5469 7.07812 10.8281C6.79688 11.1094 6.4375 11.25 6 11.25C5.5625 11.25 5.20312 11.1094 4.92188 10.8281C4.64062 10.5469 4.5 10.1875 4.5 9.75C4.5 9.3125 4.64062 8.95312 4.92188 8.67188C5.20312 8.39062 5.5625 8.25 6 8.25ZM12 8.25C12.4375 8.25 12.7969 8.39062 13.0781 8.67188C13.3594 8.95312 13.5 9.3125 13.5 9.75C13.5 10.1875 13.3594 10.5469 13.0781 10.8281C12.7969 11.1094 12.4375 11.25 12 11.25C11.5625 11.25 11.2031 11.1094 10.9219 10.8281C10.6406 10.5469 10.5 10.1875 10.5 9.75C10.5 9.3125 10.6406 8.95312 10.9219 8.67188C11.2031 8.39062 11.5625 8.25 12 8.25ZM16.5 9.75C16.5 9.3125 16.6406 8.95312 16.9219 8.67188C17.2031 8.39062 17.5625 8.25 18 8.25C18.4375 8.25 18.7969 8.39062 19.0781 8.67188C19.3594 8.95312 19.5 9.3125 19.5 9.75C19.5 10.1875 19.3594 10.5469 19.0781 10.8281C18.7969 11.1094 18.4375 11.25 18 11.25C17.5625 11.25 17.2031 11.1094 16.9219 10.8281C16.6406 10.5469 16.5 10.1875 16.5 9.75Z" fill="#1E3A8A"/>
                        </svg>
                    </span> Form Pengaduan
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
                            <svg width="25" height="18" viewBox="0 0 25 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.625 17.5C4.03646 17.4479 2.70833 16.901 1.64062 15.8594C0.598958 14.7917 0.0520833 13.4635 0 11.875C0.0260417 10.625 0.377604 9.53125 1.05469 8.59375C1.73177 7.65625 2.63021 6.97917 3.75 6.5625C3.75 6.45833 3.75 6.35417 3.75 6.25C3.80208 4.47917 4.41406 3.00781 5.58594 1.83594C6.75781 0.664062 8.22917 0.0520833 10 0C11.1719 0.0260417 12.2266 0.3125 13.1641 0.859375C14.1016 1.43229 14.8568 2.1875 15.4297 3.125C16.0286 2.70833 16.7188 2.5 17.5 2.5C18.5677 2.52604 19.4531 2.89062 20.1562 3.59375C20.8594 4.29688 21.224 5.18229 21.25 6.25C21.25 6.71875 21.1719 7.17448 21.0156 7.61719C22.1615 7.85156 23.112 8.42448 23.8672 9.33594C24.5964 10.2214 24.974 11.276 25 12.5C24.974 13.9062 24.4922 15.0911 23.5547 16.0547C22.5911 16.9922 21.4062 17.474 20 17.5H5.625ZM8.71094 9.02344C8.34635 9.46615 8.34635 9.90885 8.71094 10.3516C9.15365 10.7161 9.59635 10.7161 10.0391 10.3516L11.5625 8.82812V14.0625C11.6146 14.6354 11.9271 14.9479 12.5 15C13.0729 14.9479 13.3854 14.6354 13.4375 14.0625V8.82812L14.9609 10.3516C15.4036 10.7161 15.8464 10.7161 16.2891 10.3516C16.6536 9.90885 16.6536 9.46615 16.2891 9.02344L13.1641 5.89844C12.7214 5.53385 12.2786 5.53385 11.8359 5.89844L8.71094 9.02344Z" fill="#9CA3AF"/>
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
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.6172 0.16543C13.9089 0.365951 14.0365 0.648503 14 1.01309L12.25 12.3881C12.1953 12.6615 12.0495 12.8712 11.8125 13.017C11.5573 13.1446 11.3021 13.1537 11.0469 13.0443L7.76562 11.7045L5.90625 13.7279C5.61458 14.0014 5.28646 14.0743 4.92188 13.9467C4.57552 13.7826 4.39323 13.5092 4.375 13.1264V10.8295C4.375 10.7201 4.41146 10.629 4.48438 10.5561L9.07812 5.55215C9.22396 5.35163 9.21484 5.15111 9.05078 4.95059C8.86849 4.78652 8.66797 4.77741 8.44922 4.92324L2.89844 9.87246L0.492188 8.66934C0.182292 8.50527 0.0182292 8.25006 0 7.90371C0 7.55736 0.145833 7.29303 0.4375 7.11074L12.6875 0.110742C13.0156 -0.0533203 13.3255 -0.0350911 13.6172 0.16543Z" fill="white"/>
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
