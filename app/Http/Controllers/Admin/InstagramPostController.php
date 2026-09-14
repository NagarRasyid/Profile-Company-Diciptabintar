<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramPost;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class InstagramPostController extends Controller
{
    /**
     * Menampilkan daftar postingan Instagram.
     */
    public function index()
    {
        $posts = InstagramPost::orderByDesc('is_pinned')->latest()->paginate(20);
        return view('admin.instagram.index', compact('posts'));
    }

    /**
     * Menampilkan form tambah postingan Instagram.
     */
    public function create()
    {
        return view('admin.instagram.create');
    }

    /**
     * Menyimpan postingan Instagram baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'image'     => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'caption'   => ['nullable', 'string', 'max:2200'],
            'post_url'  => ['nullable', 'url', 'max:500'],
            'is_active' => ['boolean'],
            'is_pinned' => ['boolean'],
        ], [
            'image.required' => 'Gambar wajib diunggah.',
            'image.image'    => 'File harus berupa gambar.',
            'image.max'      => 'Ukuran gambar maksimal 5 MB.',
            'post_url.url'   => 'Link Instagram harus berupa URL yang valid.',
        ]);

        // Validasi: maksimal 3 postingan yang di-pin
        if ($request->boolean('is_pinned')) {
            $pinnedCount = InstagramPost::where('is_pinned', true)->count();
            if ($pinnedCount >= 3) {
                return back()
                    ->withInput()
                    ->withErrors(['is_pinned' => 'Maksimal hanya 3 postingan yang dapat di-pin. Lepas pin salah satu postingan terlebih dahulu.']);
            }
        }

        $path = $request->file('image')->store('instagram', 'public');

        InstagramPost::create([
            'image'     => $path,
            'caption'   => $validated['caption'] ?? null,
            'post_url'  => $validated['post_url'] ?? null,
            'is_active' => $request->boolean('is_active', true),
            'is_pinned' => $request->boolean('is_pinned', false),
        ]);

        return redirect()->route('admin.instagram.index')
            ->with('success', 'Postingan Instagram berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit postingan Instagram.
     */
    public function edit(InstagramPost $instagram)
    {
        return view('admin.instagram.edit', compact('instagram'));
    }

    /**
     * Memperbarui postingan Instagram.
     */
    public function update(Request $request, InstagramPost $instagram): RedirectResponse
    {
        $validated = $request->validate([
            'image'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'caption'   => ['nullable', 'string', 'max:2200'],
            'post_url'  => ['nullable', 'url', 'max:500'],
            'is_active' => ['boolean'],
            'is_pinned' => ['boolean'],
        ]);

        if ($request->boolean('is_pinned') && !$instagram->is_pinned) {
            $pinnedCount = InstagramPost::where('is_pinned', true)
                ->where('id', '!=', $instagram->id)
                ->count();
            if ($pinnedCount >= 3) {
                return back()
                    ->withInput()
                    ->withErrors(['is_pinned' => 'Maksimal hanya 3 postingan yang dapat di-pin. Lepas pin salah satu postingan terlebih dahulu.']);
            }
        }

        $data = [
            'caption'   => $validated['caption'] ?? null,
            'post_url'  => $validated['post_url'] ?? null,
            'is_active' => $request->boolean('is_active'),
            'is_pinned' => $request->boolean('is_pinned'),
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($instagram->image);
            $data['image'] = $request->file('image')->store('instagram', 'public');
        }

        $instagram->update($data);

        return redirect()->route('admin.instagram.index')
            ->with('success', 'Postingan berhasil diperbarui.');
    }

    /**
     * Menghapus postingan Instagram.
     */
    public function destroy(InstagramPost $instagram): RedirectResponse
    {
        Storage::disk('public')->delete($instagram->image);
        $instagram->delete();

        return redirect()->route('admin.instagram.index')
            ->with('success', 'Postingan berhasil dihapus.');
    }

    /**
     * Toggle aktif/nonaktif postingan.
     */
    public function toggleActive(InstagramPost $instagram): RedirectResponse
    {
        $instagram->update(['is_active' => !$instagram->is_active]);

        return redirect()->route('admin.instagram.index')
            ->with('success', 'Status postingan diperbarui.');
    }
}
