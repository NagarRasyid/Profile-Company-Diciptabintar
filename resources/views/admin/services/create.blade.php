@extends('layouts.admin')

@section('title', 'Tambah Layanan')
@section('page-title', 'Tambah Layanan')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Tambah Layanan</h1>
            <p class="admin-page-subtitle">Tambahkan layanan baru yang akan ditampilkan di halaman publik.</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="admin-btn admin-btn-secondary">
            &larr; Kembali
        </a>
    </div>

    <div class="admin-card">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="admin-form-group">
                <label for="title" class="admin-label">Nama Layanan <span style="color: #dc2626;">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required maxlength="200" class="admin-input" placeholder="Contoh: Pembuatan Website Company Profile" oninput="generateSlugPreview()">
            </div>

            <div class="admin-form-group">
                <label for="slug_preview" class="admin-label">Preview Slug</label>
                <input type="text" id="slug_preview" value="{{ old('title') ? \Illuminate\Support\Str::slug(old('title')) : '' }}" disabled class="admin-input" style="background-color: #f1f5f9;" placeholder="Slug akan dibuat otomatis dari nama layanan">
                <div class="admin-input-hint">Slug tidak perlu diisi manual karena akan dibuat otomatis oleh controller.</div>
            </div>

            <div class="admin-form-group">
                <label for="description" class="admin-label">Deskripsi Layanan <span style="color: #dc2626;">*</span></label>
                <textarea id="description" name="description" rows="8" required class="admin-textarea" placeholder="Jelaskan detail layanan yang ditawarkan...">{{ old('description') }}</textarea>
            </div>

            <div class="admin-form-group">
                <label for="icon" class="admin-label">Icon</label>
                <input type="text" id="icon" name="icon" value="{{ old('icon') }}" maxlength="100" class="admin-input" placeholder="Contoh: fas fa-code, fas fa-cog, atau emoji">
                <div class="admin-input-hint">Bisa diisi class icon seperti Font Awesome atau teks/emoji sesuai kebutuhan tampilan.</div>
            </div>

            <div class="admin-form-group">
                <label for="image" class="admin-label">Gambar Layanan</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewServiceImage(event)" class="admin-input">
                <div class="admin-input-hint">Format gambar. Maksimal 2MB.</div>

                <div id="image-preview-wrapper" style="display: none; margin-top: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                    <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Preview gambar:</p>
                    <img id="image-preview" src="" alt="Preview Gambar" style="width: 180px; height: 120px; object-fit: cover; border-radius: 6px;">
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
                    Layanan Aktif?
                </label>
                <div class="admin-input-hint" style="margin-top:4px;">Centang agar layanan ini langsung ditampilkan di halaman publik.</div>
            </div>

            <div style="border-top: 1px solid #e5eaf2; padding-top: 20px; text-align: right;">
                <button type="reset" class="admin-btn admin-btn-secondary" style="margin-right: 8px;">Reset Form</button>
                <button type="submit" class="admin-btn admin-btn-primary">Simpan Layanan</button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        function generateSlugPreview() {
            const title = document.getElementById('title').value;
            const slug = title.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            document.getElementById('slug_preview').value = slug;
        }

        function previewServiceImage(event) {
            const wrapper = document.getElementById('image-preview-wrapper');
            const preview = document.getElementById('image-preview');
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
        
        document.getElementById('image-preview-wrapper').style.display = 'none';
    </script>
    @endpush
@endsection