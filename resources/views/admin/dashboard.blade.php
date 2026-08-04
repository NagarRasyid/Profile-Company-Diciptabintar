@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Ringkasan Sistem</h1>
            <p class="admin-page-subtitle">Ringkasan data website company profile PT Diciptabintar.</p>
        </div>
    </div>

    {{-- STATS GRID --}}
    <div class="admin-stat-grid">
        <div class="admin-stat-card">
            <p class="admin-stat-label">Layanan</p>
            <h2 class="admin-stat-number" style="color: #003d6a;">{{ $stats['services'] ?? 0 }}</h2>
            <a href="{{ route('admin.services.index') }}" class="admin-stat-link" style="color: #003d6a;">
                Kelola layanan &rarr;
            </a>
        </div>

        <div class="admin-stat-card">
            <p class="admin-stat-label">Portofolio</p>
            <h2 class="admin-stat-number" style="color: #16a34a;">{{ $stats['portfolios'] ?? 0 }}</h2>
            <a href="{{ route('admin.portfolios.index') }}" class="admin-stat-link" style="color: #16a34a;">
                Kelola portofolio &rarr;
            </a>
        </div>

        <div class="admin-stat-card">
            <p class="admin-stat-label">Anggota Tim</p>
            <h2 class="admin-stat-number" style="color: #ca8a04;">{{ $stats['team_members'] ?? 0 }}</h2>
            <a href="{{ route('admin.team.index') }}" class="admin-stat-link" style="color: #ca8a04;">
                Kelola tim &rarr;
            </a>
        </div>

        <div class="admin-stat-card">
            <p class="admin-stat-label">Berita Published</p>
            <h2 class="admin-stat-number" style="color: #0284c7;">{{ $stats['published_news'] ?? 0 }}</h2>
            <a href="{{ route('admin.news.index') }}" class="admin-stat-link" style="color: #0284c7;">
                Kelola berita &rarr;
            </a>
        </div>

        <div class="admin-stat-card">
            <p class="admin-stat-label">Total Pesan</p>
            <h2 class="admin-stat-number" style="color: #7c3aed;">{{ $stats['total_messages'] ?? 0 }}</h2>
            <a href="{{ route('admin.contact.index') }}" class="admin-stat-link" style="color: #7c3aed;">
                Kelola pesan &rarr;
            </a>
        </div>

        <div class="admin-stat-card">
            <p class="admin-stat-label">Pesan Belum Dibaca</p>
            <h2 class="admin-stat-number" style="color: #dc2626;">{{ $stats['unread_messages'] ?? 0 }}</h2>
            <a href="{{ route('admin.contact.index', ['filter' => 'unread']) }}" class="admin-stat-link" style="color: #dc2626;">
                Lihat pesan baru &rarr;
            </a>
        </div>
    </div>

    @if(($stats['services'] ?? 0) == 0 || ($stats['portfolios'] ?? 0) == 0 || ($stats['team_members'] ?? 0) == 0 || ($stats['published_news'] ?? 0) == 0)
        <div class="admin-alert admin-alert-warning">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="flex-shrink:0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <div>
                <strong>Perhatian:</strong>
                Beberapa konten utama masih kosong atau belum dipublikasikan.
                Lengkapi layanan, portofolio, anggota tim, dan berita agar halaman publik terlihat lebih lengkap.
            </div>
        </div>
    @endif

    {{-- SHORTCUT CARDS --}}
    <h2 style="font-size: 1.1rem; color: #0a1628; margin-bottom: 16px;">Shortcut Kelola Konten</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 32px;">
        <a href="{{ route('admin.services.create') }}" class="admin-card" style="text-decoration: none; text-align: center; padding: 20px; transition: transform 0.2s; background: #003d6a; color: white;">
            <div style="font-size: 1.2rem; font-weight: 700; margin-bottom: 4px;">+ Tambah Layanan</div>
            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.7);">Buat data layanan baru</div>
        </a>
        <a href="{{ route('admin.portfolios.create') }}" class="admin-card" style="text-decoration: none; text-align: center; padding: 20px; transition: transform 0.2s; background: #16a34a; color: white;">
            <div style="font-size: 1.2rem; font-weight: 700; margin-bottom: 4px;">+ Tambah Portofolio</div>
            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.7);">Buat data proyek baru</div>
        </a>
        <a href="{{ route('admin.team.create') }}" class="admin-card" style="text-decoration: none; text-align: center; padding: 20px; transition: transform 0.2s; background: #ca8a04; color: white;">
            <div style="font-size: 1.2rem; font-weight: 700; margin-bottom: 4px;">+ Tambah Anggota</div>
            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.7);">Lengkapi profil tim</div>
        </a>
        <a href="{{ route('admin.news.create') }}" class="admin-card" style="text-decoration: none; text-align: center; padding: 20px; transition: transform 0.2s; background: #0284c7; color: white;">
            <div style="font-size: 1.2rem; font-weight: 700; margin-bottom: 4px;">+ Tambah Berita</div>
            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.7);">Buat artikel baru</div>
        </a>
    </div>

    {{-- RECENT MESSAGES TABLE --}}
    <div class="admin-page-header" style="margin-bottom: 16px;">
        <div>
            <h2 style="font-size: 1.1rem; color: #0a1628; margin: 0 0 4px;">Pesan Terbaru Belum Dibaca</h2>
            <p class="admin-page-subtitle">Daftar maksimal 5 pesan terbaru yang belum dibuka.</p>
        </div>
        <a href="{{ route('admin.contact.index') }}" class="admin-btn admin-btn-secondary">
            Lihat Semua
        </a>
    </div>

    <div class="admin-table-card">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentMessages as $msg)
                        <tr>
                            <td><strong>{{ $msg->name }}</strong></td>
                            <td><a href="mailto:{{ $msg->email }}" style="color: #003d6a; text-decoration: none;">{{ $msg->email }}</a></td>
                            <td>
                                {{ $msg->subject ?: '(Tanpa Subjek)' }}<br>
                                <small style="color: #64748b;">{{ \Illuminate\Support\Str::limit($msg->message, 50) }}</small>
                            </td>
                            <td>{{ $msg->created_at ? $msg->created_at->format('d M Y H:i') : '-' }}</td>
                            <td style="text-align: center;">
                                <a href="{{ route('admin.contact.show', $msg) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Detail</a>
                                <form action="{{ route('admin.contact.markAsRead', $msg) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="admin-btn admin-btn-success admin-btn-sm">Tandai Dibaca</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: #94a3b8; padding: 24px;">Tidak ada pesan baru yang belum dibaca.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection