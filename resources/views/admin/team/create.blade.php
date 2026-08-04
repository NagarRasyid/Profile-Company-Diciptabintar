@extends('layouts.admin')

@section('title', 'Tambah Anggota Tim')
@section('page-title', 'Tambah Anggota Tim')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Tambah Anggota Tim</h1>
            <p class="admin-page-subtitle">Tambahkan data anggota tim baru untuk halaman Tentang Kami.</p>
        </div>
        <a href="{{ route('admin.team.index') }}" class="admin-btn admin-btn-secondary">
            &larr; Kembali
        </a>
    </div>

    <div class="admin-card">
        <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
                <div class="admin-form-group">
                    <label for="name" class="admin-label">Nama <span style="color: #dc2626;">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="150" class="admin-input" placeholder="Contoh: Budi Santoso">
                </div>

                <div class="admin-form-group">
                    <label for="position" class="admin-label">Jabatan / Posisi <span style="color: #dc2626;">*</span></label>
                    <input type="text" id="position" name="position" value="{{ old('position') }}" required maxlength="150" class="admin-input" placeholder="Contoh: Direktur Utama">
                </div>
            </div>

            <div class="admin-form-group">
                <label for="bio" class="admin-label">Bio / Deskripsi Singkat</label>
                <textarea id="bio" name="bio" rows="5" maxlength="1000" class="admin-textarea" placeholder="Tulis deskripsi singkat anggota tim...">{{ old('bio') }}</textarea>
                <div class="admin-input-hint">Maksimal 1000 karakter.</div>
            </div>

            <div class="admin-form-group">
                <label for="photo" class="admin-label">Foto</label>
                <input type="file" id="photo" name="photo" accept="image/*" onchange="previewTeamPhoto(event)" class="admin-input">
                <div class="admin-input-hint">Format gambar. Maksimal 2MB.</div>

                <div id="photo-preview-wrapper" style="display: none; margin-top: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                    <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Preview foto:</p>
                    <img id="photo-preview" src="" alt="Preview Foto" style="width: 110px; height: 110px; object-fit: cover; border-radius: 50%; border: 1px solid #ddd;">
                </div>
            </div>

            <div class="admin-form-group">
                <label for="order" class="admin-label">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', 0) }}" min="0" class="admin-input" style="width: 160px;">
                <div class="admin-input-hint">Angka kecil tampil lebih dulu.</div>
            </div>

            <div style="margin-bottom: 24px; padding: 16px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2;">
                <input type="hidden" name="is_active" value="0">
                <label style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; color: #334155;">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} style="width: 16px; height: 16px;">
                    Anggota tim ini aktif?
                </label>
            </div>

            <div style="border-top: 1px solid #e5eaf2; padding-top: 20px; text-align: right;">
                <button type="reset" class="admin-btn admin-btn-secondary" style="margin-right: 8px;">Reset Form</button>
                <button type="submit" class="admin-btn admin-btn-primary">Simpan Anggota Tim</button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        function previewTeamPhoto(event) {
            const wrapper = document.getElementById('photo-preview-wrapper');
            const preview = document.getElementById('photo-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    wrapper.style.display = 'inline-block';
                }
                reader.readAsDataURL(file);
            } else {
                wrapper.style.display = 'none';
                preview.src = '';
            }
        }
        
        document.getElementById('photo-preview-wrapper').style.display = 'none';
    </script>
    @endpush
@endsection