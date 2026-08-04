@extends('layouts.admin')

@section('title', 'Edit Layanan')
@section('page-title', 'Edit Layanan')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Edit Layanan</h1>
            <p class="admin-page-subtitle">Perbarui data layanan: <strong>{{ $service->title }}</strong></p>
        </div>
        <div style="display: flex; gap: 8px;">
            @if(!$service->trashed())
                <a href="{{ route('services.show', $service->slug) }}" target="_blank" rel="noopener" class="admin-btn admin-btn-success">
                    Lihat Publik
                </a>
            @endif
            <a href="{{ route('admin.services.index') }}" class="admin-btn admin-btn-secondary">
                &larr; Kembali
            </a>
        </div>
    </div>

    <div class="admin-card">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label for="title" class="admin-label">Nama Layanan <span style="color: #dc2626;">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" required maxlength="200" class="admin-input" oninput="generateSlugPreview()">
            </div>

            <div class="admin-form-group">
                <label for="slug_preview" class="admin-label">Preview Slug</label>
                <input type="text" id="slug_preview" value="{{ \Illuminate\Support\Str::slug(old('title', $service->title)) }}" disabled class="admin-input" style="background-color: #f1f5f9;">
                <div class="admin-input-hint">Slug akan diperbarui otomatis berdasarkan nama layanan.</div>
            </div>

            <div class="admin-form-group">
                <label for="description" class="admin-label">Deskripsi Layanan <span style="color: #dc2626;">*</span></label>
                <textarea id="description" name="description" rows="8" required class="admin-textarea">{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label for="icon" class="admin-label">Icon</label>
                <input type="text" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" maxlength="100" class="admin-input" placeholder="Contoh: fas fa-code, fas fa-cog, atau emoji">
                <div class="admin-input-hint">Bisa diisi class icon seperti Font Awesome atau teks/emoji sesuai kebutuhan tampilan.</div>
            </div>

            <div class="admin-form-group">
                <label for="image" class="admin-label">Gambar Layanan</label>

                @if($service->image)
                    <div style="margin-bottom: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                        <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="width: 180px; height: 120px; object-fit: cover; border-radius: 6px;">
                    </div>
                @else
                    <div style="margin-bottom: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                        <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Gambar saat ini:</p>
                        <div style="width: 180px; height: 120px; border-radius: 6px; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8; border: 1px dashed #cbd5e1;">Belum ada gambar</div>
                    </div>
                @endif

                <input type="file" id="image" name="image" accept="image/*" onchange="previewServiceImage(event)" class="admin-input">
                <div class="admin-input-hint">Kosongkan jika tidak ingin mengganti gambar. Maksimal 2MB.</div>

                <div id="image-preview-wrapper" style="display: none; margin-top: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                    <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Preview gambar baru:</p>
                    <img id="image-preview" src="" alt="Preview Gambar Baru" style="width: 180px; height: 120px; object-fit: cover; border-radius: 6px;">
                </div>
            </div>

            <div class="admin-form-group">
                <label for="order" class="admin-label">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', $service->order) }}" min="0" class="admin-input" style="width: 160px;">
                <div class="admin-input-hint">Angka kecil tampil lebih dulu.</div>
            </div>

            <div style="margin-bottom: 24px; padding: 16px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2;">
                <input type="hidden" name="is_active" value="0">
                <label style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; color: #334155;">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} style="width: 16px; height: 16px;">
                    Layanan Aktif?
                </label>
                <div class="admin-input-hint" style="margin-top:4px;">Centang agar layanan ini langsung ditampilkan di halaman publik.</div>
            </div>

            <div style="border-top: 1px solid #e5eaf2; padding-top: 20px; text-align: right;">
                <button type="submit" class="admin-btn admin-btn-primary">Perbarui Layanan</button>
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