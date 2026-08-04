@extends('layouts.admin')

@section('title', 'Tambah Portofolio')
@section('page-title', 'Tambah Portofolio')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Tambah Portofolio</h1>
            <p class="admin-page-subtitle">Tambahkan data proyek atau portofolio baru yang akan tampil di halaman publik.</p>
        </div>
        <a href="{{ route('admin.portfolios.index') }}" class="admin-btn admin-btn-secondary">
            &larr; Kembali
        </a>
    </div>

    <div class="admin-card">
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="admin-form-group">
                <label for="title" class="admin-label">Judul Proyek <span style="color: #dc2626;">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required maxlength="200" class="admin-input" placeholder="Contoh: Pembangunan Gedung Pemerintahan" oninput="generateSlugPreview()">
            </div>

            <div class="admin-form-group">
                <label for="slug_preview" class="admin-label">Preview Slug</label>
                <input type="text" id="slug_preview" value="{{ old('title') ? \Illuminate\Support\Str::slug(old('title')) : '' }}" disabled class="admin-input" style="background-color: #f1f5f9;" placeholder="Slug akan dibuat otomatis dari judul proyek">
                <div class="admin-input-hint">Slug dibuat otomatis oleh controller berdasarkan judul proyek.</div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
                <div class="admin-form-group">
                    <label for="client" class="admin-label">Nama Klien</label>
                    <input type="text" id="client" name="client" value="{{ old('client') }}" maxlength="150" class="admin-input" placeholder="Contoh: Pemerintah Kota Bandung">
                </div>

                <div class="admin-form-group">
                    <label for="category" class="admin-label">Kategori <span style="color: #dc2626;">*</span></label>
                    <input type="text" id="category" name="category" value="{{ old('category') }}" required maxlength="100" class="admin-input" placeholder="Contoh: Gedung, Infrastruktur, Tata Ruang">
                </div>
            </div>

            <div class="admin-form-group">
                <label for="description" class="admin-label">Deskripsi Portofolio <span style="color: #dc2626;">*</span></label>
                <textarea id="description" name="description" rows="8" required class="admin-textarea" placeholder="Jelaskan detail proyek atau portofolio...">{{ old('description') }}</textarea>
            </div>

            <div class="admin-form-group">
                <label for="image" class="admin-label">Gambar Utama</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewMainImage(event)" class="admin-input">
                <div class="admin-input-hint">Format gambar. Maksimal 4MB.</div>

                <div id="main-image-preview-wrapper" style="display: none; margin-top: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                    <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Preview gambar utama:</p>
                    <img id="main-image-preview" src="" alt="Preview Gambar Utama" style="width: 220px; height: 140px; object-fit: cover; border-radius: 6px;">
                </div>
            </div>

            <div class="admin-form-group">
                <label for="gallery" class="admin-label">Galeri Gambar (Opsional)</label>
                <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple onchange="previewGalleryImages(event)" class="admin-input">
                <div class="admin-input-hint">Anda bisa memilih lebih dari satu gambar. Maksimal 2MB per gambar. Total maksimal 5 gambar.</div>

                <div id="gallery-preview-wrapper" style="display: none; margin-top: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2;">
                    <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Preview galeri:</p>
                    <div id="gallery-preview-container" style="display: flex; gap: 10px; flex-wrap: wrap;"></div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
                <div class="admin-form-group">
                    <label for="year" class="admin-label">Tahun Proyek</label>
                    <input type="text" id="year" name="year" value="{{ old('year') }}" maxlength="4" class="admin-input" placeholder="Contoh: 2023">
                </div>

                <div class="admin-form-group">
                    <label for="url" class="admin-label">URL Proyek (Opsional)</label>
                    <input type="url" id="url" name="url" value="{{ old('url') }}" maxlength="255" class="admin-input" placeholder="Contoh: https://proyek.com">
                </div>
            </div>
            
            <div class="admin-form-group">
                <label for="order" class="admin-label">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', 0) }}" min="0" class="admin-input" style="width: 160px;">
                <div class="admin-input-hint">Angka kecil tampil lebih dulu.</div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; margin-bottom: 24px; padding: 16px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2;">
                <div>
                    <input type="hidden" name="is_active" value="0">
                    <label style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; color: #334155;">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} style="width: 16px; height: 16px;">
                        Tampilkan ke Publik?
                    </label>
                </div>
                
                <div>
                    <input type="hidden" name="is_featured" value="0">
                    <label style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; color: #334155;">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} style="width: 16px; height: 16px;">
                        Jadikan Featured?
                    </label>
                    <div class="admin-input-hint" style="margin-top:4px;">Portofolio featured akan tampil di halaman utama.</div>
                </div>
            </div>

            <div style="border-top: 1px solid #e5eaf2; padding-top: 20px; text-align: right;">
                <button type="reset" class="admin-btn admin-btn-secondary" style="margin-right: 8px;">Reset Form</button>
                <button type="submit" class="admin-btn admin-btn-primary">Simpan Portofolio</button>
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

        function previewMainImage(event) {
            const wrapper = document.getElementById('main-image-preview-wrapper');
            const preview = document.getElementById('main-image-preview');
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

        function previewGalleryImages(event) {
            const wrapper = document.getElementById('gallery-preview-wrapper');
            const container = document.getElementById('gallery-preview-container');
            const files = event.target.files;

            container.innerHTML = '';

            if (files.length > 0) {
                wrapper.style.display = 'block';

                if(files.length > 5) {
                    alert('Maksimal 5 gambar yang diizinkan untuk galeri.');
                    event.target.value = '';
                    wrapper.style.display = 'none';
                    return;
                }

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.height = '100px';
                        img.style.objectFit = 'cover';
                        img.style.borderRadius = '6px';
                        img.style.border = '1px solid #ddd';
                        container.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            } else {
                wrapper.style.display = 'none';
            }
        }
        
        document.getElementById('main-image-preview-wrapper').style.display = 'none';
        document.getElementById('gallery-preview-wrapper').style.display = 'none';
    </script>
    @endpush
@endsection