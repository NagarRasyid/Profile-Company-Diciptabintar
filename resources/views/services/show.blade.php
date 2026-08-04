@extends('layouts.app')

@section('title', $service->title)

@section('content')
    <a href="{{ route('services.index') }}">&larr; Kembali ke Daftar Layanan</a>
    
    <div style="margin-top: 30px;">
        <h1>{{ $service->title }}</h1>
        <p style="font-size: 0.9em; color: #777;">
            Status: <span style="color: {{ $service->is_active ? 'green' : 'red' }}; font-weight: bold;">
                {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
            </span>
        </p>

        @if($service->image)
            <div style="margin: 20px 0; max-height: 400px; overflow: hidden; border-radius: 8px;">
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="width: 100%; object-fit: cover;">
            </div>
        @endif

        <div style="font-size: 1.1em; line-height: 1.8; margin-top: 20px;">
            {{ $service->description }}
        </div>
    </div>
@endsection
