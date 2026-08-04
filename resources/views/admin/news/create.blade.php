@extends('layouts.admin')

@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Tambah Berita</h1>
            <p class="admin-page-subtitle">Tambahkan artikel berita baru untuk halaman publik.</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="admin-btn admin-btn-secondary">
            &larr; Kembali
        </a>
    </div>

    <div class="admin-card">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="admin-form-group">
                <label for="title" class="admin-label">Judul Berita <span style="color: #dc2626;">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="admin-input" placeholder="Contoh: Diciptabintar Mengadakan Program Penataan Ruang Kota" oninput="generateSlugPreview()">
            </div>

            <div class="admin-form-group">
                <label for="slug_preview" class="admin-label">Preview Slug</label>
                <input type="text" id="slug_preview" value="{{ old('title') ? \Illuminate\Support\Str::slug(old('title')) : '' }}" disabled class="admin-input" style="background-color: #f1f5f9;" placeholder="Slug akan dibuat otomatis dari judul berita">
                <div class="admin-input-hint">Slug dibuat otomatis oleh controller berdasarkan judul berita.</div>
            </div>

            <div class="admin-form-group">
                <label for="author" class="admin-label">Penulis <span style="color: #dc2626;">*</span></label>
                <input type="text" id="author" name="author" value="{{ old('author', Auth::user()->name ?? '') }}" required class="admin-input" placeholder="Contoh: Admin Diciptabintar">
            </div>

            <div class="admin-form-group">
                <label for="excerpt" class="admin-label">Ringkasan / Excerpt</label>
                <textarea id="excerpt" name="excerpt" rows="4" class="admin-textarea" placeholder="Tulis ringkasan singkat berita. Maksimal 500 karakter.">{{ old('excerpt') }}</textarea>
                <div class="admin-input-hint">Maksimal 500 karakter.</div>
            </div>

            <div class="admin-form-group">
                <label for="content" class="admin-label">Isi Berita <span style="color: #dc2626;">*</span></label>
                <textarea id="content" name="content" rows="14" required class="admin-textarea" placeholder="Tulis isi lengkap berita...">{{ old('content') }}</textarea>
            </div>

            <div class="admin-form-group">
                <label for="image" class="admin-label">Gambar Utama Berita</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewNewsImage(event)" class="admin-input">
                <div class="admin-input-hint">Format gambar. Maksimal 3MB.</div>
                
                <div id="image-preview-wrapper" style="display: none; margin-top: 12px;">
                    <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Preview gambar:</p>
                    <img id="image-preview" src="" alt="Preview Gambar Berita" style="width: 220px; height: 140px; object-fit: cover; border-radius: 8px; border: 1px solid #e5eaf2;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; margin-bottom: 24px; padding: 16px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2;">
                <div>
                    <input type="hidden" name="is_published" value="0">
                    <label style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; color: #334155; margin-bottom: 8px;">
                        <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', 0) ? 'checked' : '' }} style="width: 16px; height: 16px;">
                        Publish Berita Ini?
                    </label>
                    <div class="admin-input-hint" style="margin-top:0;">Centang jika berita sudah siap ditampilkan ke publik. Biarkan kosong untuk menyimpan sebagai Draft.</div>
                </div>
                
                <div>
                    <label for="published_at" class="admin-label">Waktu Publish (Opsional)</label>
                    <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at') }}" class="admin-input">
                    <div class="admin-input-hint">Jika kosong dan status Published dicentang, akan menggunakan waktu saat ini.</div>
                </div>
            </div>

            <div style="border-top: 1px solid #e5eaf2; padding-top: 20px; text-align: right;">
                <button type="reset" class="admin-btn admin-btn-secondary" style="margin-right: 8px;">Reset Form</button>
                <button type="submit" class="admin-btn admin-btn-primary">Simpan Berita Baru</button>
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

        function previewNewsImage(event) {
            const wrapper = document.getElementById('image-preview-wrapper');
            const preview = document.getElementById('image-preview');
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    wrapper.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                wrapper.style.display = 'none';
                preview.src = '';
            }
        }
    </script>
    @endpush
@endsection