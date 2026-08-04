@extends('layouts.admin')

@section('title', 'Kelola Layanan')
@section('page-title', 'Kelola Layanan')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Kelola Layanan</h1>
            <p class="admin-page-subtitle">Atur data layanan yang akan tampil di halaman publik.</p>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="{{ route('admin.services.create') }}" class="admin-btn admin-btn-primary">
                + Tambah Layanan
            </a>
        </div>
    </div>

    <div class="admin-stat-grid">
        <div class="admin-stat-card">
            <p class="admin-stat-label">Total Layanan</p>
            <h2 class="admin-stat-number" style="color: #003d6a;">{{ $services->total() }}</h2>
        </div>
        <div class="admin-stat-card">
            <p class="admin-stat-label">Halaman Saat Ini</p>
            <h2 class="admin-stat-number" style="color: #16a34a;">{{ $services->count() }}</h2>
        </div>
    </div>

    <div class="admin-table-card">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 80px;">Gambar</th>
                        <th>Layanan</th>
                        <th>Deskripsi</th>
                        <th style="width: 80px;">Urutan</th>
                        <th>Status</th>
                        <th style="text-align: center; width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $services->firstItem() + $loop->index }}</td>
                            <td>
                                @if($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                @else
                                    <div style="width: 50px; height: 50px; border-radius: 6px; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">{{ $service->icon ?: '🛠️' }}</div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $service->title }}</strong><br>
                                <small style="color: #64748b;">Slug: {{ $service->slug }}</small>
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($service->description, 60) }}</td>
                            <td>{{ $service->order ?? 0 }}</td>
                            <td>
                                @if($service->is_active)
                                    <span class="admin-badge admin-badge-green">Aktif</span>
                                @else
                                    <span class="admin-badge admin-badge-gray">Nonaktif</span>
                                @endif
                                @if($service->trashed())
                                    <span class="admin-badge admin-badge-red" style="margin-top: 4px; display: inline-block;">Terhapus</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <div style="display: flex; gap: 4px; justify-content: center;">
                                    @if(!$service->trashed())
                                        <a href="{{ route('services.show', $service->slug) }}" target="_blank" class="admin-btn admin-btn-success admin-btn-sm" title="Lihat">👁️</a>
                                    @endif
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Edit</a>
                                    
                                    @if($service->trashed())
                                        <form action="{{ route('admin.services.restore', $service->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="admin-btn admin-btn-success admin-btn-sm" onclick="return confirm('Kembalikan layanan ini?')">Restore</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm" onclick="return confirm('Pindahkan layanan ini ke kotak sampah?')">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; color: #94a3b8; padding: 24px;">Belum ada layanan yang didaftarkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($services->hasPages())
            <div class="admin-pagination">
                {{ $services->links() }}
            </div>
        @endif
    </div>
@endsection