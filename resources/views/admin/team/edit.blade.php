@extends('layouts.admin')

@section('title', 'Edit Anggota Tim')
@section('page-title', 'Edit Anggota Tim')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Edit Anggota Tim</h1>
            <p class="admin-page-subtitle">Perbarui data anggota tim: <strong>{{ $teamMember->name }}</strong></p>
        </div>
        <a href="{{ route('admin.team.index') }}" class="admin-btn admin-btn-secondary">
            &larr; Kembali
        </a>
    </div>

    <div class="admin-card">
        <form action="{{ route('admin.team.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
                <div class="admin-form-group">
                    <label for="name" class="admin-label">Nama <span style="color: #dc2626;">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $teamMember->name) }}" required maxlength="150" class="admin-input">
                </div>

                <div class="admin-form-group">
                    <label for="position" class="admin-label">Jabatan / Posisi <span style="color: #dc2626;">*</span></label>
                    <input type="text" id="position" name="position" value="{{ old('position', $teamMember->position) }}" required maxlength="150" class="admin-input">
                </div>
            </div>

            <div class="admin-form-group">
                <label for="bio" class="admin-label">Bio / Deskripsi Singkat</label>
                <textarea id="bio" name="bio" rows="5" maxlength="1000" class="admin-textarea">{{ old('bio', $teamMember->bio) }}</textarea>
                <div class="admin-input-hint">Maksimal 1000 karakter.</div>
            </div>

            <div class="admin-form-group">
                <label for="photo" class="admin-label">Foto</label>

                @if($teamMember->photo)
                    <div style="margin-bottom: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                        <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $teamMember->photo) }}" alt="{{ $teamMember->name }}" style="width: 110px; height: 110px; object-fit: cover; border-radius: 50%; border: 1px solid #ddd;">
                    </div>
                @else
                    <div style="margin-bottom: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                        <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Foto saat ini:</p>
                        <div style="width: 110px; height: 110px; border-radius: 50%; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8; border: 1px dashed #cbd5e1; font-size: 2em;">👤</div>
                    </div>
                @endif

                <input type="file" id="photo" name="photo" accept="image/*" onchange="previewTeamPhoto(event)" class="admin-input">
                <div class="admin-input-hint">Kosongkan jika tidak ingin mengganti foto. Maksimal 2MB.</div>

                <div id="photo-preview-wrapper" style="display: none; margin-top: 12px; padding: 12px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2; display: inline-block;">
                    <p style="margin: 0 0 8px; font-size: 0.85rem; color: #64748b;">Preview foto baru:</p>
                    <img id="photo-preview" src="" alt="Preview Foto Baru" style="width: 110px; height: 110px; object-fit: cover; border-radius: 50%; border: 1px solid #ddd;">
                </div>
            </div>

            <div class="admin-form-group">
                <label for="order" class="admin-label">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', $teamMember->order ?? 0) }}" min="0" class="admin-input" style="width: 160px;">
                <div class="admin-input-hint">Angka kecil tampil lebih dulu.</div>
            </div>

            <div style="margin-bottom: 24px; padding: 16px; background: #f8faff; border-radius: 8px; border: 1px solid #e5eaf2;">
                <input type="hidden" name="is_active" value="0">
                <label style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; color: #334155;">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }} style="width: 16px; height: 16px;">
                    Anggota tim ini aktif?
                </label>
            </div>

            <div style="border-top: 1px solid #e5eaf2; padding-top: 20px; text-align: right;">
                <button type="submit" class="admin-btn admin-btn-primary">Perbarui Anggota Tim</button>
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