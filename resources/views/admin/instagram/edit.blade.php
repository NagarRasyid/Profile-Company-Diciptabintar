@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Edit Postingan</h1>
        <p class="admin-page-subtitle">Perbarui detail postingan Instagram.</p>
    </div>
    <a href="{{ route('admin.instagram.index') }}" class="admin-btn admin-btn-ghost">← Kembali</a>
</div>

<form action="{{ route('admin.instagram.update', $instagram) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; align-items: start;">

        {{-- Kiri: Gambar --}}
        <div class="admin-card">
            <h2 style="font-size: 1rem; font-weight: 700; color: #0a1628; margin: 0 0 16px;">Gambar Post</h2>

            <div class="admin-form-group">
                <label class="admin-label">Foto Baru (kosongkan jika tidak diganti)</label>

                {{-- Preview gambar saat ini --}}
                <div id="imagePreviewWrap" style="aspect-ratio: 1/1; background: #f1f5f9; border: 2px solid #003d6a; border-radius: 10px; overflow: hidden; margin-bottom: 10px; cursor: pointer; position: relative;" onclick="document.getElementById('imageInput').click()">
                    <img id="imagePreview" src="{{ Storage::url($instagram->image) }}" alt="Gambar saat ini"
                         style="width: 100%; height: 100%; object-fit: cover; display: block;">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.45); color: #fff; font-size: 0.72rem; text-align: center; padding: 6px;">Klik untuk ganti foto</div>
                </div>
                <input type="file" id="imageInput" name="image" accept="image/*" style="display: none;">
                @error('image') <p class="admin-input-hint" style="color: #ef4444;">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Kanan: Detail --}}
        <div class="admin-card">
            <h2 style="font-size: 1rem; font-weight: 700; color: #0a1628; margin: 0 0 16px;">Detail Postingan</h2>

            <div class="admin-form-group">
                <label class="admin-label">Caption / Keterangan</label>
                <textarea name="caption" class="admin-textarea" rows="4" placeholder="Tulis keterangan postingan (opsional)...">{{ old('caption', $instagram->caption) }}</textarea>
                @error('caption') <p class="admin-input-hint" style="color: #ef4444;">{{ $message }}</p> @enderror
            </div>

            <div class="admin-form-group">
                <label class="admin-label">Link Postingan Instagram</label>
                <input type="url" name="post_url" class="admin-input"
                       placeholder="https://www.instagram.com/p/..."
                       value="{{ old('post_url', $instagram->post_url) }}">
                @error('post_url') <p class="admin-input-hint" style="color: #ef4444;">{{ $message }}</p> @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="admin-form-group">
                    <label class="admin-label">Pin Postingan</label>
                    <label style="display: flex; align-items: center; gap: 10px; padding: 10px 12px; border: 1.5px solid #e2e8f0; border-radius: 8px; cursor: pointer; background: #f8fafc; transition: border-color 0.15s;" onmouseover="this.style.borderColor='#003d6a'" onmouseout="this.style.borderColor='#e2e8f0'">
                        <input type="hidden" name="is_pinned" value="0">
                        <input type="checkbox" name="is_pinned" value="1" id="isPinned" style="width: 16px; height: 16px; accent-color: #003d6a; cursor: pointer;"
                               {{ old('is_pinned', $instagram->is_pinned ? '1' : '0') == '1' ? 'checked' : '' }}>
                        <span style="font-size: 0.875rem; color: #334155; font-weight: 500;">Pin Postingan Ini</span>
                    </label>
                    <p class="admin-input-hint">Maks. 3 postingan yang dipin.</p>
                    @error('is_pinned') <p class="admin-input-hint" style="color: #ef4444;">{{ $message }}</p> @enderror
                </div>

                <div class="admin-form-group">
                    <label class="admin-label">Status</label>
                    <select name="is_active" class="admin-select">
                        <option value="1" {{ old('is_active', $instagram->is_active ? '1' : '0') == '1' ? 'selected' : '' }}>✅ Aktif</option>
                        <option value="0" {{ old('is_active', $instagram->is_active ? '1' : '0') == '0' ? 'selected' : '' }}>⏸ Nonaktif</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 8px;">
                <button type="submit" class="admin-btn admin-btn-primary">Simpan Perubahan</button>
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
        document.getElementById('imagePreview').src = evt.target.result;
    };
    reader.readAsDataURL(file);
});
</script>
@endpush
@endsection
