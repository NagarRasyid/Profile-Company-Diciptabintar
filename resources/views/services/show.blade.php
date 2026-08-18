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
                    @php $icon = $tugas['icon'] ?? $tugas['color']; @endphp
                    <div class="tugas-card">
                        <div class="tugas-icon tugas-icon-{{ $tugas['color'] }}">
                            @switch($icon)
                                @case('document-text')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                    @break
                                @case('banknotes')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="6" width="20" height="12" rx="2"></rect><circle cx="12" cy="12" r="3"></circle><path d="M17 12h.01M7 12h.01"></path>
                                    </svg>
                                    @break
                                @case('users')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    @break
                                @case('building-office-2')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"></path><path d="M9 9h1v1H9zM9 13h1v1H9zM9 17h1v1H9z"></path>
                                    </svg>
                                    @break
                                @case('clipboard-check')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"></path><rect x="9" y="3" width="6" height="4" rx="1"></rect><path d="M9 12l2 2 4-4"></path>
                                    </svg>
                                    @break
                                @case('magnifying-glass')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                    @break
                                @case('building-office')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2"></rect><path d="M9 22V12h6v10M3 9h18M3 15h18"></path>
                                    </svg>
                                    @break
                                @case('academic-cap')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                                    </svg>
                                    @break
                                @case('eye')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    @break
                                @case('map')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line>
                                    </svg>
                                    @break
                                @case('squares-2x2')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>
                                    </svg>
                                    @break
                                @case('document-check')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><polyline points="9 15 11 17 15 13"></polyline>
                                    </svg>
                                    @break
                                @case('megaphone')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 11l19-9-9 19-2-8-8-2z"></path>
                                    </svg>
                                    @break
                                @case('shield-check')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="M9 12l2 2 4-4"></path>
                                    </svg>
                                    @break
                                @case('chat-bubble-left-right')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    @break
                                @case('heart')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                    @break
                                @case('leaf')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 8C8 10 5.9 16.17 3.82 19.32A1 1 0 0 0 5 21C8 16 10 13 21 3c-4 0-8 2-10 6"></path>
                                    </svg>
                                    @break
                                @case('device-phone-mobile')
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line>
                                    </svg>
                                    @break
                                @default
                                    {{-- fallback icon --}}
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line>
                                    </svg>
                            @endswitch
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
                    @php $icon = $struktur['icon']; @endphp
                        <div class="struktur-card">
                            <div class="struktur-card-head">
                                <div class="struktur-card-icon">
                                    @switch ($icon)
                                         @case('construct')
                                            <svg width="27" height="24" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 24V0H13.3333V5.33333H26.6667V24H0ZM2.66667 21.3333H5.33333V18.6667H2.66667V21.3333ZM2.66667 16H5.33333V13.3333H2.66667V16ZM2.66667 10.6667H5.33333V8H2.66667V10.6667ZM2.66667 5.33333H5.33333V2.66667H2.66667V5.33333ZM8 21.3333H10.6667V18.6667H8V21.3333ZM8 16H10.6667V13.3333H8V16ZM8 10.6667H10.6667V8H8V10.6667ZM8 5.33333H10.6667V2.66667H8V5.33333ZM13.3333 21.3333H24V8H13.3333V10.6667H16V13.3333H13.3333V16H16V18.6667H13.3333V21.3333ZM18.6667 13.3333V10.6667H21.3333V13.3333H18.6667ZM18.6667 18.6667V16H21.3333V18.6667H18.6667Z" fill="white"/>
                                            </svg>
                                        @break
                                        @case('money')
                                            <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.3333 12C16.2222 12 15.2778 11.6111 14.5 10.8333C13.7222 10.0556 13.3333 9.11111 13.3333 8C13.3333 6.88889 13.7222 5.94444 14.5 5.16667C15.2778 4.38889 16.2222 4 17.3333 4C18.4444 4 19.3889 4.38889 20.1667 5.16667C20.9444 5.94444 21.3333 6.88889 21.3333 8C21.3333 9.11111 20.9444 10.0556 20.1667 10.8333C19.3889 11.6111 18.4444 12 17.3333 12ZM8 16C7.26667 16 6.63889 15.7389 6.11667 15.2167C5.59444 14.6944 5.33333 14.0667 5.33333 13.3333V2.66667C5.33333 1.93333 5.59444 1.30556 6.11667 0.783333C6.63889 0.261111 7.26667 0 8 0H26.6667C27.4 0 28.0278 0.261111 28.55 0.783333C29.0722 1.30556 29.3333 1.93333 29.3333 2.66667V13.3333C29.3333 14.0667 29.0722 14.6944 28.55 15.2167C28.0278 15.7389 27.4 16 26.6667 16H8ZM10.6667 13.3333H24C24 12.6 24.2611 11.9722 24.7833 11.45C25.3056 10.9278 25.9333 10.6667 26.6667 10.6667V5.33333C25.9333 5.33333 25.3056 5.07222 24.7833 4.55C24.2611 4.02778 24 3.4 24 2.66667H10.6667C10.6667 3.4 10.4056 4.02778 9.88333 4.55C9.36111 5.07222 8.73333 5.33333 8 5.33333V10.6667C8.73333 10.6667 9.36111 10.9278 9.88333 11.45C10.4056 11.9722 10.6667 12.6 10.6667 13.3333ZM25.3333 21.3333H2.66667C1.93333 21.3333 1.30556 21.0722 0.783333 20.55C0.261111 20.0278 0 19.4 0 18.6667V4H2.66667V18.6667H25.3333V21.3333ZM8 13.3333V2.66667V13.3333Z" fill="white"/>
                                            </svg>
                                        @break
                                        @case('protect')
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.3333 18C17.8889 18 18.3611 17.825 18.75 17.475C19.1389 17.125 19.3333 16.7 19.3333 16.2C19.3333 15.7 19.1389 15.275 18.75 14.925C18.3611 14.575 17.8889 14.4 17.3333 14.4C16.7778 14.4 16.3056 14.575 15.9167 14.925C15.5278 15.275 15.3333 15.7 15.3333 16.2C15.3333 16.7 15.5278 17.125 15.9167 17.475C16.3056 17.825 16.7778 18 17.3333 18ZM17.3333 21.6C18.0222 21.6 18.6556 21.455 19.2333 21.165C19.8111 20.875 20.2778 20.49 20.6333 20.01C20.1444 19.75 19.6222 19.55 19.0667 19.41C18.5111 19.27 17.9333 19.2 17.3333 19.2C16.7333 19.2 16.1556 19.27 15.6 19.41C15.0444 19.55 14.5222 19.75 14.0333 20.01C14.3889 20.49 14.8556 20.875 15.4333 21.165C16.0111 21.455 16.6444 21.6 17.3333 21.6ZM10.6667 24C7.57778 23.3 5.02778 21.705 3.01667 19.215C1.00556 16.725 0 13.96 0 10.92V3.6L10.6667 0L21.3333 3.6V10.41C20.9111 10.25 20.4778 10.105 20.0333 9.975C19.5889 9.845 19.1333 9.75 18.6667 9.69V5.28L10.6667 2.58L2.66667 5.28V10.92C2.66667 11.86 2.80556 12.8 3.08333 13.74C3.36111 14.68 3.75 15.575 4.25 16.425C4.75 17.275 5.35556 18.06 6.06667 18.78C6.77778 19.5 7.56667 20.1 8.43333 20.58C8.67778 21.22 9 21.83 9.4 22.41C9.8 22.99 10.2556 23.51 10.7667 23.97C10.7444 23.97 10.7278 23.975 10.7167 23.985C10.7056 23.995 10.6889 24 10.6667 24ZM17.3333 24C15.4889 24 13.9167 23.415 12.6167 22.245C11.3167 21.075 10.6667 19.66 10.6667 18C10.6667 16.34 11.3167 14.925 12.6167 13.755C13.9167 12.585 15.4889 12 17.3333 12C19.1778 12 20.75 12.585 22.05 13.755C23.35 14.925 24 16.34 24 18C24 19.66 23.35 21.075 22.05 22.245C20.75 23.415 19.1778 24 17.3333 24Z" fill="white"/>
                                        </svg>
                                        @break
                                        @case('tools')
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.247 24L14.1538 16.7101L16.8745 13.914L23.9676 21.2039L21.247 24ZM3.36842 24L0.647773 21.2039L9.58704 12.0166L7.38462 9.75312L6.47773 10.6852L4.82591 8.98752V11.7171L3.91903 12.6491L0 8.62136L0.906883 7.68932H3.56275L1.94332 6.02497L6.54251 1.2982C6.97436 0.854369 7.4386 0.532594 7.93522 0.332871C8.43185 0.133148 8.93927 0.0332871 9.45749 0.0332871C9.97571 0.0332871 10.4831 0.133148 10.9798 0.332871C11.4764 0.532594 11.9406 0.854369 12.3725 1.2982L9.39271 4.36061L11.0121 6.02497L10.1053 6.957L12.3077 9.22053L15.2227 6.22469C15.1363 5.98058 15.0661 5.72538 15.0121 5.45908C14.9582 5.19279 14.9312 4.92649 14.9312 4.66019C14.9312 3.3509 15.3684 2.24688 16.2429 1.34813C17.1174 0.449376 18.1916 0 19.4656 0C19.7895 0 20.0972 0.0332871 20.3887 0.0998613C20.6802 0.166436 20.9771 0.266297 21.2794 0.399445L18.0729 3.69487L20.4049 6.09154L23.6113 2.79612C23.7625 3.1068 23.865 3.41193 23.919 3.71151C23.973 4.0111 24 4.32732 24 4.66019C24 5.96949 23.5628 7.07351 22.6883 7.97226C21.8138 8.87101 20.7395 9.32039 19.4656 9.32039C19.2065 9.32039 18.9474 9.2982 18.6883 9.25381C18.4291 9.20943 18.1808 9.13176 17.9433 9.0208L3.36842 24Z" fill="white"/>
                                        </svg>
                                        @break
                                    @endswitch
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
