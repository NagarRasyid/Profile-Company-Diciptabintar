@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Kelola Pesan Kontak</h1>
            <p class="admin-page-subtitle">Total pesan belum dibaca: <strong style="color: #dc2626;">{{ $unreadCount }}</strong></p>
        </div>
    </div>

    <div style="display: flex; gap: 8px; margin-bottom: 20px; padding: 12px; background: #ffffff; border: 1px solid #e5eaf2; border-radius: 8px;">
        <a href="{{ route('admin.contact.index', ['filter' => 'all']) }}" 
           class="admin-btn {{ $filter === 'all' ? 'admin-btn-primary' : 'admin-btn-secondary' }}">
            Semua Pesan
        </a>
        <a href="{{ route('admin.contact.index', ['filter' => 'unread']) }}" 
           class="admin-btn {{ $filter === 'unread' ? 'admin-btn-danger' : 'admin-btn-secondary' }}">
            Belum Dibaca
        </a>
        <a href="{{ route('admin.contact.index', ['filter' => 'read']) }}" 
           class="admin-btn {{ $filter === 'read' ? 'admin-btn-success' : 'admin-btn-secondary' }}">
            Sudah Dibaca
        </a>
    </div>

    <div class="admin-table-card">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 100px;">Status</th>
                        <th>Nama</th>
                        <th>Email / Telepon</th>
                        <th>Subjek & Pesan</th>
                        <th>Tanggal Masuk</th>
                        <th style="text-align: center; width: 220px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr style="{{ ! $message->is_read ? 'background-color: #f8faff;' : '' }}">
                            <td>
                                @if($message->is_read)
                                    <span class="admin-badge admin-badge-green">Sudah Dibaca</span>
                                @else
                                    <span class="admin-badge admin-badge-red">Belum Dibaca</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $message->name }}</strong>
                            </td>
                            <td>
                                <a href="mailto:{{ $message->email }}" style="color: #003d6a; text-decoration: none; font-weight: 600;">{{ $message->email }}</a>
                                <br>
                                <span style="color: #64748b; font-size: 0.85rem;">{{ $message->phone ?: '-' }}</span>
                            </td>
                            <td>
                                <strong>{{ $message->subject ?: '(Tanpa Subjek)' }}</strong>
                                <br>
                                <span style="color: #64748b; font-size: 0.85rem;">{{ \Illuminate\Support\Str::limit($message->message, 70) }}</span>
                            </td>
                            <td>
                                {{ $message->created_at ? $message->created_at->format('d M Y H:i') : '-' }}
                            </td>
                            <td style="text-align: center;">
                                <div style="display: flex; gap: 4px; justify-content: center; flex-wrap: wrap;">
                                    <a href="{{ route('admin.contact.show', $message) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Detail</a>

                                    @if(! $message->is_read)
                                        <form action="{{ route('admin.contact.markAsRead', $message) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="admin-btn admin-btn-success admin-btn-sm">Tandai Dibaca</button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.contact.destroy', $message) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm" onclick="return confirm('Yakin ingin menghapus pesan dari {{ $message->name }}?');">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; color: #94a3b8; padding: 24px;">Belum ada pesan kontak.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($messages->hasPages())
            <div class="admin-pagination">
                {{ $messages->appends(['filter' => $filter])->links() }}
            </div>
        @endif
    </div>
@endsection