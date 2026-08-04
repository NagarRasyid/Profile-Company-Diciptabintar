@extends('layouts.app')

@section('title', 'Portofolio Proyek')

@section('content')
    <h1>Portofolio Proyek Kami</h1>
    <p>Kami bangga mempersembahkan hasil karya terbaik kami dalam mewujudkan visi pembangunan mitra bisnis kami.</p>

    <!-- Category Filter Menu -->
    <div style="margin: 25px 0; padding: 10px; background-color: #eee; border-radius: 4px;">
        <strong>Kategori:</strong>
        <a href="{{ route('portfolio.index') }}" style="margin: 0 10px; font-weight: {{ !$category ? 'bold' : 'normal' }}; text-decoration: none; color: {{ !$category ? '#000' : '#0066cc' }};">
            Semua
        </a>
        @foreach($categories as $cat)
            | 
            <a href="{{ route('portfolio.index', ['category' => $cat]) }}" style="margin: 0 10px; font-weight: {{ $category === $cat ? 'bold' : 'normal' }}; text-decoration: none; color: {{ $category === $cat ? '#000' : '#0066cc' }};">
                {{ $cat }}
            </a>
        @endforeach
    </div>

    <!-- Grid Portfolios -->
    <div class="grid">
        @forelse($portfolios as $portfolio)
            <div class="card">
                <h3>{{ $portfolio->title }}</h3>
                <p><strong>Kategori:</strong> {{ $portfolio->category }}</p>
                <p><strong>Klien:</strong> {{ $portfolio->client ?? '-' }} | <strong>Tahun:</strong> {{ $portfolio->year ?? '-' }}</p>
                <p>{{ Str::limit($portfolio->description, 150) }}</p>
                <a href="{{ route('portfolio.show', $portfolio->slug) }}">Lihat Proyek &rarr;</a>
            </div>
        @empty
            <p>Belum ada portofolio proyek pada kategori ini.</p>
        @endforelse
    </div>

    <!-- Pagination Links -->
    <div style="margin-top: 30px;">
        {{ $portfolios->appends(request()->query())->links() }}
    </div>
@endsection
