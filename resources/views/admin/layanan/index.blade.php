@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Layanan Publik</h1>
        <p class="admin-page-subtitle">Kelola daftar layanan publik yang ditampilkan di halaman website.</p>
    </div>
    <div>
        <a href="{{ route('admin.layanan.create') }}" class="admin-btn admin-btn-primary">+ Tambah Layanan</a>
    </div>
</div>

<div class="admin-table-card">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Warna</th>
                    <th>Permohonan</th>
                    <th>Status</th>
                    <th>Urutan</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $i => $s)
                <tr style="{{ $s->trashed() ? 'opacity:.5' : '' }}">
                    <td>{{ $services->firstItem() + $i }}</td>
                    <td><strong>{{ $s->title }}</strong><br><small style="color:#64748b">{{ $s->slug }}</small></td>
                    <td>
                        <span class="admin-badge" style="background:{{ ['blue'=>'#dbeafe','green'=>'#dcfce7','orange'=>'#ffedd5','pink'=>'#fce7f3','teal'=>'#ccfbf1','gray'=>'#f1f5f9'][$s->color] ?? '#f1f5f9' }};color:#334155">
                            {{ ucfirst($s->color) }}
                        </span>
                    </td>
                    <td>{{ number_format($s->jumlah_permohonan, 0, ',', '.') }}</td>
                    <td>
                        @if($s->trashed())
                            <span class="admin-badge admin-badge-red">Dihapus</span>
                        @elseif($s->is_active)
                            <span class="admin-badge admin-badge-green">Aktif</span>
                        @else
                            <span class="admin-badge admin-badge-gray">Nonaktif</span>
                        @endif
                    </td>
                    <td>{{ $s->order }}</td>
                    <td style="text-align:center">
                        @if($s->trashed())
                            <form action="{{ route('admin.layanan.restore', $s->id) }}" method="POST" style="display:inline">
                                @csrf
                                <button class="admin-btn admin-btn-success admin-btn-sm">Pulihkan</button>
                            </form>
                        @else
                            <a href="{{ route('admin.layanan.edit', $s) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Edit</a>
                            <form action="{{ route('admin.layanan.destroy', $s) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf @method('DELETE')
                                <button class="admin-btn admin-btn-danger admin-btn-sm">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center;color:#94a3b8;padding:24px">Belum ada layanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="admin-pagination">{{ $services->links() }}</div>
</div>
@endsection

