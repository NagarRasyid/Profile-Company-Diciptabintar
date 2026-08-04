@extends('layouts.admin')

@section('title', 'Edit Portofolio')
@section('page-title', 'Edit Portofolio')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Edit Portofolio</h1>
            <p class="admin-page-subtitle">Perbarui data portofolio: <strong>{{ $portfolio->title }}</strong></p>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="{{ route('portfolio.show', $portfolio->slug) }}" target="_blank" rel="noopener" class="admin-btn admin-btn-success">
                Lihat Publik
            </a>
            <a href="{{ route('admin.portfolios.index') }}" class="admin-btn admin-btn-secondary">
                &larr; Kembali
            </a>
        </div>
    </div>

    <div class="admin-card">
        <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label for="title" class="admin-label">Judul Proyek <span style="color: #dc2626;">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $portfolio->title) }}" required maxlength="200" class="admin-input" oninput="generateSlugPreview()">
            </div>

            <div class="admin-form-group">
                <label for="slug_preview" class="admin-label">Preview Slug</label>
                <input type="text" id="slug_preview" value="{{ \Illuminate\Support\Str::slug(old('title', $portfolio->title)) }}" disabled class="admin-input" style="background-color: #f1f5f9;">
                <div class="admin-input-hint">Slug akan diperbarui otomatis berdasarkan judul proyek.</div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
                <div class="admin-form-group">
                    <label for="client" class="admin-label">Nama Klien</label>
                    <input type="text" id="client" name="client" value="{{ old('client', $portfolio->client) }}" maxlength="150" class="admin-input">
                </div>

                <div class="admin-form-group">
                    <label for="category" class="admin-label">Kategori <span style="color: #dc2626;">*</span></label>
                    <input type="text" id="category" name="category" value="{{ old('category', $portfolio->category) }}" required maxlength="100" class="admin-input">
                </div>
            </div>

            <div class="admin-form-group">
                <label for="description" class="admin-label">Deskripsi Portofolio <span style="color: #dc2626;">*</span></label>
                <textarea id="description" name="description" rows="8" required class="admin-textarea">{{ old('description', $portfolio->description) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label for="image" class="admin-label">Gambar Utama</label>

                @if($portfolio->image)
                    <div style="margin-bottom: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                        <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Gambar utama saat ini:</p>
                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" style="width: 220px; height: 140px; object-fit: cover; border-radius: 6px;">
                    </div>
                @else
                    <div style="margin-bottom: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                        <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Gambar utama saat ini:</p>
                        <div style="width: 220px; height: 140px; border-radius: 6px; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8; border: 1px dashed #cbd5e1;">Belum ada gambar</div>
                    </div>
                @endif

                <input type="file" id="image" name="image" accept="image/*" onchange="previewMainImage(event)" class="admin-input">
                <div class="admin-input-hint">Kosongkan jika tidak ingin mengganti gambar utama. Maksimal 4MB.</div>

                <div id="main-image-preview-wrapper" style="display: none; margin-top: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                    <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Preview gambar utama baru:</p>
                    <img id="main-image-preview" src="" alt="Preview Gambar Utama Baru" style="width: 220px; height: 140px; object-fit: cover; border-radius: 6px;">
                </div>
            </div>

            <div class="admin-form-group">
                <label for="gallery" class="admin-label">Tambah Gambar Galeri Baru (Opsional)</label>
                <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple onchange="previewGalleryImages(event)" class="admin-input">
                <div class="admin-input-hint">Gambar yang dipilih akan ditambahkan ke galeri yang sudah ada. Maksimal 2MB per gambar.</div>

                <div id="gallery-preview-wrapper" style="display: none; margin-top: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2;">
                    <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Preview galeri baru:</p>
                    <div id="gallery-preview-container" style="display: flex; gap: 10px; flex-wrap: wrap;"></div>
                </div>
            </div>

            @if(is_array($portfolio->gallery) && count($portfolio->gallery) > 0)
                <div class="admin-form-group">
                    <label class="admin-label">Galeri Saat Ini (Pilih untuk dihapus)</label>
                    <div style="display: flex; flex-wrap: wrap; gap: 16px; padding: 16px; background: #f1f5f9; border-radius: 8px; border: 1px solid #e5eaf2;">
                        @foreach($portfolio->gallery as $index => $galleryImage)
                            <div style="background: white; padding: 10px; border-radius: 8px; border: 1px solid #ddd; text-align: center;">
                                <img src="{{ asset('storage/' . $galleryImage) }}" alt="Galeri" style="width: 120px; height: 100px; object-fit: cover; border-radius: 4px; margin-bottom: 8px;">
                                <div>
                                    <label style="display: inline-flex; align-items: center; gap: 5px; cursor: pointer; color: #dc2626; font-size: 0.85rem; font-weight: 600;">
                                        <input type="checkbox" name="delete_gallery[]" value="{{ $index }}"> Hapus
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
                <div class="admin-form-group">
                    <label for="year" class="admin-label">Tahun Proyek</label>
                    <input type="text" id="year" name="year" value="{{ old('year', $portfolio->year) }}" maxlength="4" class="admin-input">
                </div>

                <div class="admin-form-group">
                    <label for="url" class="admin-label">URL Proyek (Opsional)</label>
                    <input type="url" id="url" name="url" value="{{ old('url', $portfolio->url) }}" maxlength="255" class="admin-input">
                </div>
            </div>
            
            <div class="admin-form-group">
                <label for="order" class="admin-label">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', $portfolio->order) }}" min="0" class="admin-input" style="width: 160px;">
                <div class="admin-input-hint">Angka kecil tampil lebih dulu.</div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; margin-bottom: 24px; padding: 16px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2;">
                <div>
                    <input type="hidden" name="is_active" value="0">
                    <label style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; color: #334155;">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $portfolio->is_active) ? 'checked' : '' }} style="width: 16px; height: 16px;">
                        Tampilkan ke Publik?
                    </label>
                </div>
                
                <div>
                    <input type="hidden" name="is_featured" value="0">
                    <label style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; color: #334155;">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }} style="width: 16px; height: 16px;">
                        Jadikan Featured?
                    </label>
                    <div class="admin-input-hint" style="margin-top:4px;">Portofolio featured akan tampil di halaman utama.</div>
                </div>
            </div>

            <div style="border-top: 1px solid #e5eaf2; padding-top: 20px; text-align: right;">
                <button type="submit" class="admin-btn admin-btn-primary">Perbarui Portofolio</button>
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