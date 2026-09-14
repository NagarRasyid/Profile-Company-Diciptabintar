@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Edit Layanan</h1>
        <p class="admin-page-subtitle">Perbarui data layanan publik.</p>
    </div>
    <a href="{{ route('admin.layanan.index') }}" class="admin-btn admin-btn-secondary">&larr; Kembali</a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.layanan.update', $service) }}" method="POST">
        @csrf @method('PUT')
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px">
            <div class="admin-form-group">
                <label class="admin-label">Judul Layanan *</label>
                <input type="text" name="title" class="admin-input" value="{{ old('title', $service->title) }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-label">Warna Kartu *</label>
                <select name="color" class="admin-select" required>
                    @foreach(['blue'=>'Biru','green'=>'Hijau','orange'=>'Oranye','pink'=>'Pink','teal'=>'Teal','gray'=>'Abu-abu'] as $v => $l)
                        <option value="{{ $v }}" {{ old('color', $service->color)===$v?'selected':'' }}>{{ $l }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="admin-form-group">
            <label class="admin-label">Deskripsi *</label>
            <textarea name="description" class="admin-textarea" required>{{ old('description', $service->description) }}</textarea>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px">
            <div class="admin-form-group">
                <label class="admin-label">Jumlah Permohonan</label>
                <input type="number" name="jumlah_permohonan" class="admin-input" value="{{ old('jumlah_permohonan', $service->jumlah_permohonan) }}" min="0">
            </div>
            <div class="admin-form-group">
                <label class="admin-label">Urutan Tampil</label>
                <input type="number" name="order" class="admin-input" value="{{ old('order', $service->order) }}" min="0">
            </div>
        </div>
        <div class="admin-form-group">
            <label class="admin-label">Icon (SVG HTML)</label>
            <textarea name="icon" class="admin-textarea" style="min-height:80px;font-family:monospace;font-size:.8rem">{{ old('icon', $service->icon) }}</textarea>
            <p class="admin-input-hint">Tempel kode SVG lengkap. Kosongkan jika tidak ada icon.</p>
        </div>
        <div class="admin-form-group" style="display:flex;align-items:center;gap:10px">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} style="width:16px;height:16px">
            <label for="is_active" class="admin-label" style="margin:0">Aktifkan layanan ini</label>
        </div>
        <div style="display:flex;gap:12px;margin-top:8px">
            <button type="submit" class="admin-btn admin-btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.layanan.index') }}" class="admin-btn admin-btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection

