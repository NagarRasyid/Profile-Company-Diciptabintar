@extends('layouts.admin')

@section('title', 'Postingan Instagram')

@section('content')
<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Postingan Instagram</h1>
        <p class="admin-page-subtitle">Kelola foto yang ditampilkan di halaman Berita &amp; Update.</p>
    </div>
    <a href="{{ route('admin.instagram.create') }}" class="admin-btn admin-btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" width="16" height="16">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
        </svg>
        Tambah Post
    </a>
</div>

@if(session('success'))
<div class="admin-alert admin-alert-success">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    {{ session('success') }}
</div>
@endif

{{-- Grid View --}}
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 16px;">
    @forelse($posts as $post)
    <div class="admin-card" style="padding: 0; overflow: hidden; position: relative;">
        {{-- Gambar --}}
        <div style="aspect-ratio: 1/1; overflow: hidden; background: #f1f5f9;">
            <img src="{{ Storage::url($post->image) }}" alt="Post {{ $post->id }}"
                 style="width: 100%; height: 100%; object-fit: cover; display: block;">
        </div>

        {{-- Badge Status --}}
        <div style="position: absolute; top: 8px; left: 8px;">
            @if($post->is_active)
                <span style="background: #16a34a; color: #fff; font-size: 0.65rem; font-weight: 700; padding: 2px 8px; border-radius: 999px;">AKTIF</span>
            @else
                <span style="background: #94a3b8; color: #fff; font-size: 0.65rem; font-weight: 700; padding: 2px 8px; border-radius: 999px;">NONAKTIF</span>
            @endif
        </div>

        {{-- Info & Actions --}}
        <div style="padding: 10px 12px 12px;">
            @if($post->caption)
            <p style="font-size: 0.78rem; color: #475569; line-height: 1.45; margin: 0 0 12px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $post->caption }}</p>
            @endif

            <div style="display: flex; gap: 6px; flex-wrap: wrap;">
                {{-- Toggle Active --}}
                <form action="{{ route('admin.instagram.toggle', $post) }}" method="POST" style="flex: 1;">
                    @csrf
                    <button type="submit" style="width: 100%; padding: 5px 0; font-size: 0.72rem; font-weight: 600; border: 1.5px solid {{ $post->is_active ? '#94a3b8' : '#16a34a' }}; background: transparent; color: {{ $post->is_active ? '#64748b' : '#16a34a' }}; border-radius: 6px; cursor: pointer;">
                        {{ $post->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                    </button>
                </form>

                {{-- Edit --}}
                <a href="{{ route('admin.instagram.edit', $post) }}"
                   style="padding: 5px 10px; font-size: 0.72rem; font-weight: 600; background: #003d6a; color: #fff; border-radius: 6px; text-decoration: none; display: flex; align-items: center; gap: 4px;">
                    Edit
                </a>

                {{-- Delete --}}
                <form action="{{ route('admin.instagram.destroy', $post) }}" method="POST"
                      onsubmit="return confirm('Hapus postingan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding: 5px 8px; font-size: 0.72rem; background: #fee2e2; color: #991b1b; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div style="grid-column: 1/-1; text-align: center; padding: 64px; color: #94a3b8;">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="48" height="48" style="margin-bottom: 12px; opacity: 0.4;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
        </svg>
        <p style="font-size: 0.9rem; margin: 0;">Belum ada postingan. <a href="{{ route('admin.instagram.create') }}" style="color: #003d6a; font-weight: 600;">Tambah sekarang</a></p>
    </div>
    @endforelse
</div>

{{-- Pagination --}}
@if($posts->hasPages())
<div class="admin-pagination">{{ $posts->links() }}</div>
@endif

@endsection
