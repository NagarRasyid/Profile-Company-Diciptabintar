@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <a href="{{ route('news.index') }}">&larr; Kembali ke Daftar Berita</a>
    
    <article style="margin-top: 30px;">
        <h1>{{ $article->title }}</h1>
        
        <p style="font-size: 0.9em; color: #777; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 25px;">
            Ditulis oleh: <strong>{{ $article->author }}</strong> | 
            Dipublikasikan pada: <strong>{{ $article->published_at ? $article->published_at->format('d F Y H:i') : '-' }}</strong>
        </p>

        @if($article->image)
            <div style="margin: 20px 0; border-radius: 8px; overflow: hidden; max-height: 400px;">
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width:100%; object-fit: cover;">
            </div>
        @endif

        <div style="font-size: 1.1em; line-height: 1.8; margin-top: 30px;">
            {!! $article->content !!}
        </div>
    </article>

    <!-- Artikel Terkait -->
    @if($related->count() > 0)
        <hr style="margin: 50px 0 30px;">
        <h3>Artikel Terkait</h3>
        <div class="grid">
            @foreach($related as $rel)
                <div class="card">
                    <h4>{{ $rel->title }}</h4>
                    <p style="font-size: 0.85em; color: #777;">Diposting: {{ $rel->published_at ? $rel->published_at->format('d M Y') : '-' }}</p>
                    <a href="{{ route('news.show', $rel->slug) }}">Baca Artikel &rarr;</a>
                </div>
            @endforeach
        </div>
    @endif
@endsection
