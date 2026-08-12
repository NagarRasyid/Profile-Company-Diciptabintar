@extends('layouts.app')

@section('title', $service->title)

@push('styles')
    @if(isset($service->is_bidang) && $service->is_bidang)
        <style>
            /* ---- WOBBLE KEYFRAMES ---- */
            @keyframes wobble-tugas {
                0%   { transform: rotate(0deg); }
                20%  { transform: rotate(-2deg) translateY(-1px); }
                40%  { transform: rotate(2deg) translateY(-1px); }
                60%  { transform: rotate(-1deg) translateY(1px); }
                80%  { transform: rotate(1deg); }
                100% { transform: rotate(0deg); }
            }

            @keyframes wobble-struktur {
                0%   { transform: rotate(0deg); }
                20%  { transform: rotate(-2deg) translateY(-1px); }
                40%  { transform: rotate(2deg) translateY(-1px); }
                60%  { transform: rotate(-1deg) translateY(1px); }
                80%  { transform: rotate(1deg); }
                100% { transform: rotate(0deg); }
            }


            .bidang-hero {
                background-color: #003d6a;
                border-radius: 12px;
                padding: 56px 64px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 60px;
                margin-bottom: 64px;
            }
            .bidang-hero-content {
                flex: 1;
                color: #ffffff;
            }
            .bidang-breadcrumb {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: rgba(255, 255, 255, 0.15);
                border: 1px solid rgba(255, 255, 255, 0.2);
                padding: 6px 14px;
                border-radius: 999px;
                font-size: 0.85rem;
                font-weight: 600;
                margin-bottom: 24px;
                color: #ffffff;
                text-decoration: none;
                transition: background 0.2s;
            }
            .bidang-breadcrumb:hover {
                background: #ffffff;
                color: #003d6a;
            }
            .bidang-hero-title {
                font-size: clamp(2.4rem, 3vw, 3.2rem);
                font-weight: 700;
                margin: 0 0 20px;
                line-height: 1.2;
                color: #ffffff;
            }
            .bidang-hero-desc {
                font-size: 1.1rem;
                line-height: 1.7;
                margin: 0;
                color: rgba(255, 255, 255, 0.85);
                max-width: 580px;
            }
            .bidang-hero-wrap{
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 24px 60px rgba(0, 61, 106, 0.18);
            }
            .bidang-hero-wrap img {
                width: 472px;
                height: 400px;
                border-radius: 16px;
                object-fit: cover;
                box-shadow: 0 16px 40px rgba(0, 0, 0, 0.25);
                flex-shrink: 0;
                display: block;
                transition: all 0.6s cubic-bezier(0.25, 1, 0.5, 1);
            }
            .bidang-hero-wrap:hover img{
                transform: scale(1.05);
            }
            .bidang-section-title-wrapper {
                margin-bottom: 32px;
            }
            .bidang-section-title {
                font-size: 1.5rem;
                font-weight: 700;
                color: #003d6a;
                margin: 0 0 12px;
            }
            .bidang-section-underline {
                width: 54px;
                height: 4px;
                background-color: #487522; /* Green from the design */
                border-radius: 2px;
            }

            .tugas-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 24px;
                margin-bottom: 72px;
            }

            .tugas-card:hover {
                animation: wobble-tugas 0.5s ease forwards;
            }

            .tugas-card {
                background: #ffffff;
                border: 1px solid #f1f1f4;
                border-radius: 12px;
                padding: 32px 24px;
                box-shadow: 0 4px 24px rgba(0,0,0,0.02);
            }
            .tugas-icon {
                width: 44px;
                height: 44px;
                border-radius: 10px;
                display: grid;
                place-items: center;
                margin-bottom: 24px;
            }
            .tugas-icon-blue { background: #eef3ff; color: #003d6a; }
            .tugas-icon-green { background: #eef7e9; color: #487522; }
            .tugas-icon-orange { background: #faeaea; color: #93000a; }

            .tugas-card h4 {
                font-size: 1.3rem;
                font-weight: 600;
                color: #1e293b;
                margin: 0 0 14px;
                line-height: 1.4;
            }
            .tugas-card p {
                font-size: 1rem;
                color: #64748b;
                line-height: 1.7;
                margin: 0;
            }

            .struktur-section {
                background: #f8f9fb;
                border-radius: 16px;
                padding: 64px 56px;
                text-align: center;
            }
            .struktur-header {
                max-width: 800px;
                margin: 0 auto 48px;
            }
            .struktur-header h3 {
                font-size: 1.55rem;
                font-weight: 700;
                color: #003d6a;
                margin: 0 0 16px;
            }
            .struktur-header p {
                font-size: 1rem;
                color: #52565e;
                line-height: 1.7;
                margin: 0;
            }

            .struktur-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 32px;
                text-align: left;
            }
            .struktur-grid:has(> :nth-child(3)) {
                grid-template-columns: repeat(3, 1fr);
            }
            .struktur-card {
                background: #ffffff;
                border-radius: 12px;
                padding: 40px;
                box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            }
            .struktur-card:hover{
                animation: wobble-struktur 0.5s ease forwards;
            }
            .struktur-card-head {
                display: flex;
                align-items: center;
                gap: 20px;
                margin-bottom: 24px;
                padding-bottom: 24px;
                border-bottom: 1px solid #f1f1f4;
            }
            .struktur-card-icon {
                width: 52px;
                height: 52px;
                border-radius: 50%;
                background: #003d6a;
                color: #ffffff;
                display: grid;
                place-items: center;
                flex-shrink: 0;
            }
            .struktur-card-title {
                font-size: 1.15rem;
                font-weight: 700;
                color: #003d6a;
                margin: 0;
                line-height: 1.4;
            }
            .struktur-list {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: column;
                gap: 16px;
            }
            .struktur-list li {
                display: flex;
                align-items: flex-start;
                gap: 12px;
                font-size: 1rem;
                color: #52565e;
                line-height: 1.6;
            }
            .struktur-list li svg {
                flex-shrink: 0;
                margin-top: 2px;
                color: #487522;
            }

            @media (max-width: 1024px) {
                .bidang-hero { flex-direction: column; padding: 48px 32px; text-align: center; }
                .bidang-hero-wrap { width: 100%; height: auto; max-width: 600px; margin: 0 auto; }
                .bidang-hero-desc { margin: 0 auto; }
                .tugas-grid { grid-template-columns: 1fr; }
                .struktur-grid { grid-template-columns: 1fr; }
                .struktur-section { padding: 48px 32px; }
            }
        </style>
    @endif
@endpush

@section('content')
    @if(isset($service->is_bidang) && $service->is_bidang)
            {{-- HERO SECTION --}}
            <div class="bidang-hero">
                <div class="bidang-hero-content">
                    <a href="{{ route('services.index') }}" class="bidang-breadcrumb">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 18l-6-6 6-6"/>
                        </svg>
                        Bidang & Unit Kerja
                    </a>
                    <h1 class="bidang-hero-title">{{ $service->title }}</h1>
                    <p class="bidang-hero-desc">
                        {{ $service->hero_desc }}
                    </p>
                </div>
                <div class="bidang-hero-wrap">
                    <img src="{{ asset($service->hero_img) }}" alt="{{ $service->title }}">
                </div>
            </div>

            {{-- TUGAS POKOK & FUNGSI --}}
            <div class="bidang-section-title-wrapper">
                <h2 class="bidang-section-title">Tugas Pokok & Fungsi</h2>
                <div class="bidang-section-underline"></div>
            </div>

            <div class="tugas-grid">
                @foreach($service->tugas as $tugas)
                    <div class="tugas-card">
                        <div class="tugas-icon tugas-icon-{{ $tugas['color'] }}">
                            @if($tugas['color'] == 'blue')
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 21h18"></path><path d="M9 8h1"></path><path d="M9 12h1"></path><path d="M9 16h1"></path><path d="M14 8h1"></path><path d="M14 12h1"></path><path d="M14 16h1"></path><path d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"></path>
                                </svg>
                            @elseif($tugas['color'] == 'green')
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="M9 12l2 2 4-4"></path>
                                </svg>
                            @else
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                </svg>
                            @endif
                        </div>
                        <h4>{{ $tugas['title'] }}</h4>
                        <p>{{ $tugas['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- STRUKTUR SUB BAGIAN --}}
            <div class="struktur-section">
                <div class="struktur-header">
                    <h3>Struktur Sub Bagian & Fokus Kerja</h3>
                    <p>{{ $service->struktur_desc }}</p>
                </div>
                
                <div class="struktur-grid">
                    @foreach($service->struktur as $index => $struktur)
                        <div class="struktur-card">
                            <div class="struktur-card-head">
                                <div class="struktur-card-icon">
                                    @if($index % 2 == 0)
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>
                                        </svg>
                                    @else
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line>
                                        </svg>
                                    @endif
                                </div>
                                <h4 class="struktur-card-title">{{ $struktur['title'] }}</h4>
                            </div>
                            <ul class="struktur-list">
                                @foreach($struktur['items'] as $item)
                                    <li>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle><path d="M8 12l2 2 4-4"></path>
                                        </svg>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
    @else
        <!-- Old Content -->
        <div style="padding: 40px 80px;">
            <a href="{{ route('services.index') }}" style="display: inline-block; margin-bottom: 20px; text-decoration: none; color: #003d6a; font-weight: 600;">&larr; Kembali ke Daftar Layanan</a>
            
            <div style="margin-top: 10px; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e5eaf2;">
                <h1 style="color: #003d6a; font-size: 2.2rem; margin-bottom: 14px;">{{ $service->title }}</h1>
                <p style="font-size: 1em; color: #777; margin-bottom: 30px;">
                    Status: <span style="color: {{ $service->is_active ? '#15803d' : '#dc2626' }}; font-weight: 700; background: {{ $service->is_active ? '#dcfce7' : '#fee2e2' }}; padding: 6px 14px; border-radius: 99px;">
                        {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </p>

                @if($service->image)
                    <div style="margin: 0 0 30px 0; max-height: 400px; overflow: hidden; border-radius: 12px; border: 1px solid #e5eaf2;">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endif

                <div style="font-size: 1.1rem; line-height: 1.8; color: #475569;">
                    {{ $service->description }}
                </div>
            </div>
        </div>
    @endif
@endsection
