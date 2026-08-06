@extends('layouts.app')

@section('title', 'Berita & Update')

@push('styles')
<style>
/* =============================================
   BERITA & UPDATE — INSTAGRAM FEED STYLE
============================================= */

.news-wrapper {
    margin: 0 auto;
    padding: 40px 24px 72px;
}

/* ---- PAGE HEADER ---- */
.news-page-header {
    margin-bottom: 32px;
    border-left: 4px solid #003d6a;
    padding-left: 16px;
}

.news-page-header h1 {
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 800;
    color: #003d6a;
    margin: 0 0 10px;
}

.news-page-header p {
    font-size: 1rem;
    color: #64748b;
    line-height: 1.65;
    margin: 0;
    max-width: 700px;
}

/* ---- INSTAGRAM PROFILE ROW ---- */
.ig-profile-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 24px;
    padding: 16px 20px;
    border-radius: 12px;
}

.ig-profile-left {
    display: flex;
    align-items: center;
    gap: 14px;
}

.ig-avatar {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    border: 2px solid #e5eaf2;
    overflow: hidden;
    flex-shrink: 0;
    background: #f1f1f4;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ig-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.ig-handle {
    font-size: 0.95rem;
    font-weight: 700;
    color: #0a1628;
}

.ig-name {
    font-size: 0.82rem;
    color: #64748b;
    margin-top: 2px;
}

.ig-follow-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 25px;
    background: #003d6a;
    color: #ffffff;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.88rem;
    font-weight: 600;
    transition: background 0.18s ease, transform 0.15s ease;
    white-space: nowrap;
}

.ig-follow-btn:hover {
    background: #003d6a;
    transform: translateY(-1px);
}

.ig-follow-btn svg {
    width: 18px;
    height: 18px;
}

/* ---- INSTAGRAM GRID ---- */
.ig-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 32px;
}

.ig-post {
    position: relative;
    aspect-ratio: 11 / 14;
    overflow: hidden;
    border-radius: 6px;
    background: #f1f1f4;
    cursor: pointer;
}

.ig-post img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.35s cubic-bezier(0.25, 1, 0.5, 1);
}

.ig-post:hover img {
    transform: scale(1.06);
}

.ig-post-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background 0.25s ease;
    color: #ffffff;
    opacity: 0;
}

.ig-post:hover .ig-post-overlay {
    background: rgba(10, 22, 40, 0.55);
    opacity: 1;
}

.ig-post-overlay-title {
    font-size: 0.78rem;
    font-weight: 600;
    text-align: center;
    padding: 0 12px;
    line-height: 1.4;
    max-width: 90%;
}

.ig-post-overlay-date {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.8);
}

/* Placeholder jika tidak ada gambar */
.ig-post-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f1f1f4 0%, #e2e8f0 100%);
    color: #94a3b8;
    font-size: 2rem;
}

/* ---- CTA FOOTER ---- */
.ig-cta-footer {
    background: #f8f9fb;
    border: 1px solid #e5eaf2;
    border-radius: 14px;
    padding: 40px 32px;
    text-align: center;
}

.ig-cta-footer h3 {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0a1628;
    margin: 0 0 10px;
}

.ig-cta-footer p {
    font-size: 0.9rem;
    color: #64748b;
    line-height: 1.65;
    max-width: 480px;
    margin: 0 auto 24px;
}

.ig-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 28px;
    background: #16a34a;
    color: #ffffff;
    border-radius: 10px;
    text-decoration: none;
    font-size: 0.92rem;
    font-weight: 700;
    transition: background 0.18s ease, transform 0.15s ease;
}

.ig-cta-btn:hover {
    background: #15803d;
    transform: translateY(-1px);
}

.ig-cta-btn svg {
    width: 18px;
    height: 18px;
}

/* ---- EMPTY STATE ---- */
.ig-empty {
    grid-column: 1 / -1;
    text-align: center;
    padding: 64px 24px;
    color: #94a3b8;
}

.ig-empty svg {
    width: 48px;
    height: 48px;
    margin-bottom: 14px;
    opacity: 0.4;
}

/* ---- RESPONSIVE ---- */
@media (max-width: 768px) {
    .ig-grid { grid-template-columns: repeat(3, 1fr); }
    .ig-profile-row { flex-direction: column; align-items: flex-start; }
}

@media (max-width: 480px) {
    .ig-grid { grid-template-columns: repeat(2, 1fr); gap: 4px; }
    .news-wrapper { padding: 28px 16px 48px; }
}
</style>
@endpush

@section('content')
<div class="news-wrapper">

    {{-- ===== PAGE HEADER ===== --}}
    <div class="news-page-header">
        <h1>Berita &amp; Update</h1>
        <p>Dapatkan informasi terkini seputar pembangunan kota dan kebijakan terbaru.<br>
           Kami membagikan seluruh update dan dokumentasi kegiatan melalui akun<br>
           Instagram resmi kami <strong>@diciptabintar.bdg</strong>.</p>
    </div>

    {{-- ===== INSTAGRAM PROFILE ROW ===== --}}
    <div class="ig-profile-row">
        <div class="ig-profile-left">
            <div class="ig-avatar">
                @if(file_exists(public_path('images/logo.png')))
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Diciptabintar">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#003d6a" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" fill="#e8f0fb"/>
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v1h16v-1c0-2.66-5.33-4-8-4z" fill="#003d6a"/>
                    </svg>
                @endif
            </div>
            <div>
                <div class="ig-handle">@diciptabintar.bdg</div>
                <div class="ig-name">Dinas Ciptabintar</div>
            </div>
        </div>
        <a href="https://www.instagram.com/diciptabintar.bdg/" target="_blank" rel="noopener" class="ig-follow-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
            Follow us on Instagram
        </a>
    </div>

    {{-- ===== INSTAGRAM POST GRID ===== --}}
    <div class="ig-grid">
        @forelse($posts as $post)
        @if($post->post_url)
        <a href="{{ $post->post_url }}" target="_blank" rel="noopener" class="ig-post">
        @else
        <div class="ig-post">
        @endif
            <img src="{{ $post->image_url }}" alt="{{ Str::limit($post->caption, 60) ?? 'Instagram Post' }}" loading="lazy">
            <div class="ig-post-overlay">
                @if($post->caption)
                    <div class="ig-post-overlay-title">{{ Str::limit($post->caption, 80) }}</div>
                @endif
                @if($post->post_url)
                    <div class="ig-post-overlay-date">Lihat di Instagram →</div>
                @endif
            </div>
        @if($post->post_url)
        </a>
        @else
        </div>
        @endif
        @empty
        <div class="ig-empty">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
            </svg>
            <p>Belum ada konten yang dipublikasikan.</p>
        </div>
        @endforelse
    </div>

    {{-- ===== CTA FOOTER ===== --}}
    <div class="ig-cta-footer">
        <h3>Ingin melihat lebih banyak?</h3>
        <p>Kami aktif membagikan aktivitas harian, progres proyek, dan pengumuman penting melalui Instagram Stories dan Posts setiap harinya.</p>
        <a href="https://www.instagram.com/diciptabintar.bdg/" target="_blank" rel="noopener" class="ig-cta-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
            Kunjungi Instagram Kami
        </a>
    </div>

</div>
@endsection
