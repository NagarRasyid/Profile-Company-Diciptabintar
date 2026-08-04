@extends('layouts.admin')

@section('title', 'Kelola Anggota Tim')
@section('page-title', 'Kelola Anggota Tim')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Kelola Anggota Tim</h1>
            <p class="admin-page-subtitle">Atur data struktur organisasi dan anggota tim yang tampil di halaman Tentang Kami.</p>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="{{ route('admin.team.create') }}" class="admin-btn admin-btn-primary">
                + Tambah Anggota Tim
            </a>
        </div>
    </div>

    <div class="admin-stat-grid">
        <div class="admin-stat-card">
            <p class="admin-stat-label">Total Anggota</p>
            <h2 class="admin-stat-number" style="color: #003d6a;">{{ $members->total() }}</h2>
        </div>
        <div class="admin-stat-card">
            <p class="admin-stat-label">Data Halaman Ini</p>
            <h2 class="admin-stat-number" style="color: #16a34a;">{{ $members->count() }}</h2>
        </div>
    </div>

    <div class="admin-table-card">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 80px;">Foto</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Bio</th>
                        <th style="width: 80px;">Urutan</th>
                        <th>Status</th>
                        <th style="text-align: center; width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                        <tr>
                            <td>{{ $members->firstItem() + $loop->index }}</td>
                            <td>
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                @else
                                    <div style="width: 50px; height: 50px; border-radius: 50%; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">👤</div>
                                @endif
                            </td>
                            <td><strong>{{ $member->name }}</strong></td>
                            <td>{{ $member->position }}</td>
                            <td>{{ $member->bio ? \Illuminate\Support\Str::limit($member->bio, 60) : '-' }}</td>
                            <td>{{ $member->order ?? 0 }}</td>
                            <td>
                                @if($member->is_active)
                                    <span class="admin-badge admin-badge-green">Aktif</span>
                                @else
                                    <span class="admin-badge admin-badge-gray">Nonaktif</span>
                                @endif
                                @if($member->trashed())
                                    <span class="admin-badge admin-badge-red" style="margin-top: 4px; display: inline-block;">Terhapus</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <div style="display: flex; gap: 4px; justify-content: center;">
                                    <a href="{{ route('admin.team.edit', $member->id) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Edit</a>
                                    
                                    @if($member->trashed())
                                        <form action="{{ route('admin.team.restore', $member->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="admin-btn admin-btn-success admin-btn-sm" onclick="return confirm('Kembalikan anggota tim ini?')">Restore</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm" onclick="return confirm('Pindahkan anggota tim ini ke kotak sampah?')">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; color: #94a3b8; padding: 24px;">Belum ada anggota tim yang didaftarkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($members->hasPages())
            <div class="admin-pagination">
                {{ $members->links() }}
            </div>
        @endif
    </div>
@endsection