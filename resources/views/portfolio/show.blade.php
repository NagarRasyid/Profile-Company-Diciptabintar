@extends('layouts.app')

@section('title', $portfolio->title)

@section('content')
    <a href="{{ route('portfolio.index') }}">&larr; Kembali ke Daftar Portofolio</a>
    
    <div style="margin-top: 30px;">
        <h1>{{ $portfolio->title }}</h1>
        
        <div style="background-color: #f5f5f5; padding: 15px; border-radius: 6px; margin: 20px 0; display: flex; flex-wrap: wrap; gap: 20px;">
            <div><strong>Kategori:</strong> {{ $portfolio->category }}</div>
            <div><strong>Klien:</strong> {{ $portfolio->client ?? '-' }}</div>
            <div><strong>Tahun Pengerjaan:</strong> {{ $portfolio->year ?? '-' }}</div>
            @if($portfolio->url)
                <div><strong>Tautan:</strong> <a href="{{ $portfolio->url }}" target="_blank">Kunjungi Link</a></div>
            @endif
        </div>

        @if($portfolio->image)
            <div style="margin: 20px 0; border-radius: 8px; overflow: hidden; max-height: 450px;">
                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" style="width: 100%; object-fit: cover;">
            </div>
        @endif

        <div style="font-size: 1.1em; line-height: 1.8; margin: 20px 0;">
            <h3>Deskripsi Proyek</h3>
            {{ $portfolio->description }}
        </div>

        <!-- Gallery Section -->
        @if($portfolio->gallery && count($portfolio->gallery) > 0)
            <div style="margin: 40px 0;">
                <h3>Galeri Foto Proyek</h3>
                <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));">
                    @foreach($portfolio->gallery as $img)
                        <div class="card" style="padding: 5px;">
                            <img src="{{ asset('storage/' . $img) }}" alt="Galeri {{ $portfolio->title }}" style="width:100%; border-radius: 4px;">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Related Section -->
        @if($related->count() > 0)
            <hr style="margin: 40px 0;">
            <h3>Proyek Terkait</h3>
            <div class="grid">
                @foreach($related as $rel)
                    <div class="card">
                        <h4>{{ $rel->title }}</h4>
                        <p style="font-size: 0.9em; color:#666;">Kategori: {{ $rel->category }}</p>
                        <a href="{{ route('portfolio.show', $rel->slug) }}">Lihat Proyek &rarr;</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
