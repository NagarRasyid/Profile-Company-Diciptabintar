@extends('layouts.admin')

@section('title', 'Tambah Postingan Instagram')

@section('content')
<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Tambah Postingan Instagram</h1>
        <p class="admin-page-subtitle">Upload foto yang akan ditampilkan di halaman Berita &amp; Update.</p>
    </div>
    <a href="{{ route('admin.instagram.index') }}" class="admin-btn admin-btn-ghost">← Kembali</a>
</div>

<form action="{{ route('admin.instagram.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; align-items: start;">

        {{-- Kiri: Upload Gambar --}}
        <div class="admin-card">
            <h2 style="font-size: 1rem; font-weight: 700; color: #0a1628; margin: 0 0 16px;">Gambar Post</h2>

            <div class="admin-form-group">
                <label class="admin-label">Foto <span style="color: #ef4444;">*</span></label>

                {{-- Preview Area --}}
                <div id="imagePreviewWrap" style="aspect-ratio: 1/1; background: #f1f5f9; border: 2px dashed #cbd5e1; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; overflow: hidden; margin-bottom: 10px; transition: border-color 0.15s ease;" onclick="document.getElementById('imageInput').click()">
                    <img id="imagePreview" src="" alt="" style="display: none; width: 100%; height: 100%; object-fit: cover;">
                    <div id="uploadPlaceholder" style="text-align: center; color: #94a3b8; padding: 24px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="40" height="40" style="margin-bottom: 8px; opacity: 0.5;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                        </svg>
                        <p style="font-size: 0.8rem; margin: 0;">Klik untuk pilih foto</p>
                        <p style="font-size: 0.7rem; margin: 4px 0 0; color: #cbd5e1;">JPG, PNG, WEBP · maks 5 MB</p>
                    </div>
                </div>
                <input type="file" id="imageInput" name="image" accept="image/*" style="display: none;" required>
                @error('image') <p class="admin-input-hint" style="color: #ef4444;">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Kanan: Detail --}}
        <div class="admin-card">
            <h2 style="font-size: 1rem; font-weight: 700; color: #0a1628; margin: 0 0 16px;">Detail Postingan</h2>

            <div class="admin-form-group">
                <label class="admin-label">Caption / Keterangan</label>
                <textarea name="caption" class="admin-textarea" rows="4" placeholder="Tulis keterangan postingan (opsional)...">{{ old('caption') }}</textarea>
                <p class="admin-input-hint">Maksimal 2200 karakter.</p>
                @error('caption') <p class="admin-input-hint" style="color: #ef4444;">{{ $message }}</p> @enderror
            </div>

            <div class="admin-form-group">
                <label class="admin-label">Link Postingan Instagram</label>
                <input type="url" name="post_url" class="admin-input"
                       placeholder="https://www.instagram.com/p/..."
                       value="{{ old('post_url') }}">
                <p class="admin-input-hint">URL langsung ke postingan Instagram asli (opsional).</p>
                @error('post_url') <p class="admin-input-hint" style="color: #ef4444;">{{ $message }}</p> @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="admin-form-group">
                    <label class="admin-label">Pin Postingan</label>
                    <label style="display: flex; align-items: center; gap: 10px; padding: 10px 12px; border: 1.5px solid #e2e8f0; border-radius: 8px; cursor: pointer; background: #f8fafc; transition: border-color 0.15s;" onmouseover="this.style.borderColor='#003d6a'" onmouseout="this.style.borderColor='#e2e8f0'">
                        <input type="hidden" name="is_pinned" value="0">
                        <input type="checkbox" name="is_pinned" value="1" id="isPinned" style="width: 16px; height: 16px; accent-color: #003d6a; cursor: pointer;" {{ old('is_pinned') ? 'checked' : '' }}>
                        <span style="font-size: 0.875rem; color: #334155; font-weight: 500;">Pin Postingan Ini</span>
                    </label>
                    <p class="admin-input-hint">Maks. 3 postingan yang dipin.</p>
                    @error('is_pinned') <p class="admin-input-hint" style="color: #ef4444;">{{ $message }}</p> @enderror
                </div>

                <div class="admin-form-group">
                    <label class="admin-label">Status</label>
                    <select name="is_active" class="admin-select">
                        <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>✅ Aktif</option>
                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>⏸ Nonaktif</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 8px;">
                <button type="submit" class="admin-btn admin-btn-primary">
                    Simpan Postingan
                </button>
                <a href="{{ route('admin.instagram.index') }}" class="admin-btn admin-btn-ghost">Batal</a>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
document.getElementById('imageInput').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (evt) {
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('uploadPlaceholder');
        preview.src = evt.target.result;
        preview.style.display = 'block';
        placeholder.style.display = 'none';
        document.getElementById('imagePreviewWrap').style.borderStyle = 'solid';
        document.getElementById('imagePreviewWrap').style.borderColor = '#003d6a';
    };
    reader.readAsDataURL(file);
});
</script>
@endpush
@endsection
