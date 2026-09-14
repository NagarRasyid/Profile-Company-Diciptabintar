@extends('layouts.app')

@section('title', 'Layanan Publik')

@push('styles')
<style>
.layanan-wrapper { margin: 0 -32px; }

/* ---- PAGE HEADER ---- */
.layanan-header {
    background: #f1f1f4;
    padding: 52px 80px 44px;
    text-align: center;
    border-bottom: 1px solid #e5eaf2;
}
.layanan-header h1 { font-size: clamp(2.8rem, 3vw, 3.5rem); font-weight: 700; color: #003d6a; margin: 0 0 12px; }
.layanan-header p  { font-size: 1.1rem; color: #52565e; line-height: 1.7; max-width: 680px; margin: 0 auto; }

/* ---- SERVICE CARDS ---- */
.layanan-body { padding: 40px 80px 56px; background: #f8faff; }
.layanan-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.service-card {
    background: #f9f9fd;
    border-width: 4px 0.1px 0.1px 0.1px;
    border-style: solid;
    border-color: #e5eaf2;
    border-radius: 12px;
    padding: 22px 20px 18px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    display: flex;
    flex-direction: column;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.service-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(0,0,0,0.09); }

.service-card-blue   { border-color: #003d6a; }
.service-card-green  { border-color: #11823a; }
.service-card-orange { border-color: #f97316; }
.service-card-pink   { border-color: #e11d48; }
.service-card-teal   { border-color: #0891b2; }
.service-card-gray   { border-color: #64748b; }

.service-card-icon {
    width: 50px; height: 58px;
    border-radius: 9px;
    display: grid; place-items: center;
    margin-bottom: 14px;
}
.icon-bg-blue   { background: #eef3ff; }
.icon-bg-green  { background: #e6f9ee; }
.icon-bg-orange { background: #fff4e5; }
.icon-bg-pink   { background: #fff0f3; }
.icon-bg-teal   { background: #e0f7fa; }
.icon-bg-gray   { background: #f1f5f9; }

.service-card-title { font-size: 1.15rem; font-weight: 700; margin: 0 0 10px; line-height: 1.3; }
.title-blue   { color: #003d6a; }
.title-green  { color: #15803d; }
.title-orange { color: #c2410c; }
.title-pink   { color: #c02f2f; }
.title-teal   { color: #0e7490; }
.title-gray   { color: #334155; }

.service-card-desc { font-size: 0.94rem; color: #52565e; line-height: 1.65; margin: 0 0 18px; flex: 1; }

.service-card-footer {
    display: flex;
    align-items: center;
    padding-top: 14px;
    border-top: 1px solid #d6d6d6;
}
.service-card-count { font-size: 0.78rem; color: #94a3b8; }

@media (max-width: 1024px) {
    .layanan-header, .layanan-body { padding-left: 40px; padding-right: 40px; }
    .layanan-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
    .layanan-header, .layanan-body { padding-left: 20px; padding-right: 20px; }
    .layanan-grid { grid-template-columns: 1fr; }
    .layanan-wrapper { margin: 0 -18px; }
}
</style>
@endpush

@section('content')
<div class="layanan-wrapper">

    {{-- HEADER --}}
    <div class="layanan-header">
        <h1>Layanan Publik</h1>
        <p>Akses berbagai layanan terkait cipta karya, bina konstruksi, dan tata ruang di Kota Bandung dengan mudah dan transparan.</p>
    </div>

    {{-- GRID KARTU LAYANAN --}}
    <div class="layanan-body">
        <div class="layanan-grid">
            @forelse($services as $layanan)
                <div class="service-card service-card-{{ $layanan->color }}">
                    <div class="service-card-icon icon-bg-{{ $layanan->color }}">
                        {!! $layanan->icon !!}
                    </div>
                    <h3 class="service-card-title title-{{ $layanan->color }}">{{ $layanan->title }}</h3>
                    <p class="service-card-desc">{{ $layanan->description }}</p>
                    <div class="service-card-footer">
                        <span class="service-card-count">
                            {{ number_format($layanan->jumlah_permohonan, 0, ',', '.') }} Permohonan
                        </span>
                    </div>
                </div>
            @empty
                <p style="color:#64748b; grid-column: 1/-1; text-align:center; padding: 40px 0;">
                    Belum ada layanan yang tersedia.
                </p>
            @endforelse
        </div>
    </div>

</div>
@endsection