@extends('layouts.admin')

@section('title', 'Kelola Portofolio')
@section('page-title', 'Kelola Portofolio')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Kelola Portofolio</h1>
            <p class="admin-page-subtitle">Atur data proyek dan portofolio yang akan tampil di halaman publik.</p>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="{{ route('admin.portfolios.create') }}" class="admin-btn admin-btn-primary">
                + Tambah Portofolio
            </a>
        </div>
    </div>

    <div class="admin-stat-grid">
        <div class="admin-stat-card">
            <p class="admin-stat-label">Total Portofolio</p>
            <h2 class="admin-stat-number" style="color: #003d6a;">{{ $portfolios->total() }}</h2>
        </div>
        <div class="admin-stat-card">
            <p class="admin-stat-label">Halaman Saat Ini</p>
            <h2 class="admin-stat-number" style="color: #16a34a;">{{ $portfolios->count() }}</h2>
        </div>
    </div>

    <div class="admin-table-card">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 80px;">Gambar</th>
                        <th>Proyek</th>
                        <th>Klien</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th style="text-align: center; width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $portfolio)
                        <tr>
                            <td>{{ $portfolios->firstItem() + $loop->index }}</td>
                            <td>
                                @if($portfolio->image)
                                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                @else
                                    <div style="width: 50px; height: 50px; border-radius: 6px; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">🏢</div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $portfolio->title }}</strong><br>
                                <small style="color: #64748b;">Slug: {{ $portfolio->slug }}</small>
                            </td>
                            <td>{{ $portfolio->client ?: '-' }}</td>
                            <td><span class="admin-badge admin-badge-gray">{{ $portfolio->category }}</span></td>
                            <td>
                                @if($portfolio->is_active)
                                    <span class="admin-badge admin-badge-green">Aktif</span>
                                @else
                                    <span class="admin-badge admin-badge-gray">Nonaktif</span>
                                @endif
                                @if($portfolio->trashed())
                                    <span class="admin-badge admin-badge-red" style="margin-top: 4px; display: inline-block;">Terhapus</span>
                                @endif
                            </td>
                            <td>
                                @if($portfolio->is_featured)
                                    <span class="admin-badge admin-badge-orange">Featured ⭐</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <div style="display: flex; gap: 4px; justify-content: center;">
                                    @if(!$portfolio->trashed())
                                        <a href="{{ route('portfolio.show', $portfolio->slug) }}" target="_blank" class="admin-btn admin-btn-success admin-btn-sm" title="Lihat">👁️</a>
                                    @endif
                                    <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Edit</a>
                                    
                                    @if($portfolio->trashed())
                                        <form action="{{ route('admin.portfolios.restore', $portfolio->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="admin-btn admin-btn-success admin-btn-sm" onclick="return confirm('Kembalikan portofolio ini?')">Restore</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm" onclick="return confirm('Pindahkan portofolio ini ke kotak sampah?')">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; color: #94a3b8; padding: 24px;">Belum ada portofolio yang didaftarkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($portfolios->hasPages())
            <div class="admin-pagination">
                {{ $portfolios->links() }}
            </div>
        @endif
    </div>
@endsection