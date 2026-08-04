@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
    @php
        $isPublishedNow = $newsArticle->is_published && $newsArticle->published_at && $newsArticle->published_at->lte(now());
    @endphp

    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Edit Berita</h1>
            <p class="admin-page-subtitle">Perbarui artikel berita: <strong>{{ $newsArticle->title }}</strong></p>
        </div>
        <div style="display: flex; gap: 8px;">
            @if($isPublishedNow)
                <a href="{{ route('news.show', $newsArticle->slug) }}" target="_blank" rel="noopener" class="admin-btn admin-btn-success">
                    Lihat Publik
                </a>
            @endif
            <a href="{{ route('admin.news.index') }}" class="admin-btn admin-btn-secondary">
                &larr; Kembali
            </a>
        </div>
    </div>

    <div class="admin-card">
        <form action="{{ route('admin.news.update', $newsArticle) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="admin-form-group">
                <label for="title" class="admin-label">Judul Berita <span style="color: #dc2626;">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $newsArticle->title) }}" required class="admin-input" oninput="generateSlugPreview()">
            </div>

            <div class="admin-form-group">
                <label for="slug_preview" class="admin-label">Preview Slug</label>
                <input type="text" id="slug_preview" value="{{ \Illuminate\Support\Str::slug(old('title', $newsArticle->title)) }}" disabled class="admin-input" style="background-color: #f1f5f9;">
                <div class="admin-input-hint">Slug akan diperbarui otomatis berdasarkan judul berita.</div>
            </div>

            <div class="admin-form-group">
                <label for="author" class="admin-label">Penulis <span style="color: #dc2626;">*</span></label>
                <input type="text" id="author" name="author" value="{{ old('author', $newsArticle->author) }}" required class="admin-input">
            </div>

            <div class="admin-form-group">
                <label for="excerpt" class="admin-label">Ringkasan / Excerpt</label>
                <textarea id="excerpt" name="excerpt" rows="4" class="admin-textarea">{{ old('excerpt', $newsArticle->excerpt) }}</textarea>
                <div class="admin-input-hint">Maksimal 500 karakter.</div>
            </div>

            <div class="admin-form-group">
                <label for="content" class="admin-label">Isi Berita <span style="color: #dc2626;">*</span></label>
                <textarea id="content" name="content" rows="14" required class="admin-textarea">{{ old('content', $newsArticle->content) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label for="image" class="admin-label">Gambar Utama Berita</label>
                
                @if($newsArticle->image)
                    <div style="margin-bottom: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                        <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $newsArticle->image) }}" alt="{{ $newsArticle->title }}" style="width: 220px; height: 140px; object-fit: cover; border-radius: 6px;">
                    </div>
                @else
                    <div style="margin-bottom: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                        <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Gambar saat ini:</p>
                        <div style="width: 220px; height: 140px; border-radius: 6px; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8; border: 1px dashed #cbd5e1;">Belum ada gambar</div>
                    </div>
                @endif

                <input type="file" id="image" name="image" accept="image/*" onchange="previewNewsImage(event)" class="admin-input">
                <div class="admin-input-hint">Upload gambar baru jika ingin mengganti gambar saat ini.</div>
                
                <div id="image-preview-wrapper" style="display: none; margin-top: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                    <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Preview gambar baru:</p>
                    <img id="image-preview" src="" alt="Preview Gambar Baru" style="width: 220px; height: 140px; object-fit: cover; border-radius: 6px;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; margin-bottom: 24px; padding: 16px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2;">
                <div>
                    <input type="hidden" name="is_published" value="0">
                    <label style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; color: #334155; margin-bottom: 8px;">
                        <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $newsArticle->is_published) ? 'checked' : '' }} style="width: 16px; height: 16px;">
                        Publish Berita Ini?
                    </label>
                    <div class="admin-input-hint" style="margin-top:0;">Centang jika berita sudah siap ditampilkan ke publik. Biarkan kosong untuk menyimpan sebagai Draft.</div>
                </div>
                
                <div>
                    <label for="published_at" class="admin-label">Waktu Publish (Opsional)</label>
                    <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', $newsArticle->published_at ? $newsArticle->published_at->format('Y-m-d\TH:i') : '') }}" class="admin-input">
                    <div class="admin-input-hint">Jika kosong dan status Published dicentang, akan menggunakan waktu saat ini.</div>
                </div>
            </div>

            <div style="border-top: 1px solid #e5eaf2; padding-top: 20px; text-align: right;">
                <button type="submit" class="admin-btn admin-btn-primary">Perbarui Berita</button>
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
                    wrapper.style.display = 'inline-block';
                }
                reader.readAsDataURL(file);
            } else {
                wrapper.style.display = 'none';
                preview.src = '';
            }
        }
        
        // Hide wrapper initially if empty
        document.getElementById('image-preview-wrapper').style.display = 'none';
    </script>
    @endpush
@endsection