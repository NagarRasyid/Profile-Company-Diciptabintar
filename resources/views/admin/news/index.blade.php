@extends('layouts.admin')

@section('title', 'Kelola Berita')
@section('page-title', 'Kelola Berita')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Kelola Berita</h1>
            <p class="admin-page-subtitle">Atur artikel berita yang akan tampil di halaman publik.</p>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="{{ route('admin.news.create') }}" class="admin-btn admin-btn-primary">
                + Tambah Berita
            </a>
        </div>
    </div>

    <div class="admin-stat-grid">
        <div class="admin-stat-card">
            <p class="admin-stat-label">Total Artikel</p>
            <h2 class="admin-stat-number" style="color: #003d6a;">{{ $articles->total() }}</h2>
        </div>
        <div class="admin-stat-card">
            <p class="admin-stat-label">Data Halaman Ini</p>
            <h2 class="admin-stat-number" style="color: #16a34a;">{{ $articles->count() }}</h2>
        </div>
    </div>

    <div class="admin-table-card">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 80px;">Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Tanggal Publish</th>
                        <th style="text-align: center; width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                        @php
                            $isPublishedNow = $article->is_published && $article->published_at && $article->published_at->lte(now());
                            $isScheduled = $article->is_published && $article->published_at && $article->published_at->gt(now());
                        @endphp
                        <tr>
                            <td>{{ $articles->firstItem() + $loop->index }}</td>
                            <td>
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                @else
                                    <div style="width: 50px; height: 50px; border-radius: 6px; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">📰</div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $article->title }}</strong><br>
                                <small style="color: #64748b;">Slug: {{ $article->slug }}</small>
                            </td>
                            <td>{{ $article->author }}</td>
                            <td>
                                @if($isPublishedNow)
                                    <span class="admin-badge admin-badge-green">Published</span>
                                @elseif($isScheduled)
                                    <span class="admin-badge admin-badge-orange">Terjadwal</span>
                                @else
                                    <span class="admin-badge admin-badge-gray">Draft</span>
                                @endif
                                @if($article->trashed())
                                    <span class="admin-badge admin-badge-red" style="margin-top: 4px; display: inline-block;">Terhapus</span>
                                @endif
                            </td>
                            <td>{{ $article->published_at ? $article->published_at->format('d M Y H:i') : '-' }}</td>
                            <td style="text-align: center;">
                                <div style="display: flex; gap: 4px; justify-content: center;">
                                    @if($isPublishedNow && !$article->trashed())
                                        <a href="{{ route('news.show', $article->slug) }}" target="_blank" class="admin-btn admin-btn-success admin-btn-sm" title="Lihat">👁️</a>
                                    @endif
                                    <a href="{{ route('admin.news.edit', $article->id) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Edit</a>
                                    @if($article->trashed())
                                        <form action="{{ route('admin.news.restore', $article->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="admin-btn admin-btn-success admin-btn-sm" onclick="return confirm('Kembalikan berita ini?')">Restore</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.news.destroy', $article->id) }}" method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm" onclick="return confirm('Pindahkan berita ke kotak sampah?')">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; color: #94a3b8; padding: 24px;">Belum ada artikel berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($articles->hasPages())
            <div class="admin-pagination">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
@endsection