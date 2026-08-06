<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramPost;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class InstagramPostController extends Controller
{
    public function index()
    {
        $posts = InstagramPost::orderBy('sort_order')->latest()->paginate(20);
        return view('admin.instagram.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.instagram.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'image'      => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'caption'    => ['nullable', 'string', 'max:2200'],
            'post_url'   => ['nullable', 'url', 'max:500'],
            'is_active'  => ['boolean'],
            'sort_order' => ['integer', 'min:0', 'max:9999'],
        ], [
            'image.required' => 'Gambar wajib diunggah.',
            'image.image'    => 'File harus berupa gambar.',
            'image.max'      => 'Ukuran gambar maksimal 5 MB.',
            'post_url.url'   => 'Link Instagram harus berupa URL yang valid.',
        ]);

        $path = $request->file('image')->store('instagram', 'public');

        InstagramPost::create([
            'image'      => $path,
            'caption'    => $validated['caption'] ?? null,
            'post_url'   => $validated['post_url'] ?? null,
            'is_active'  => $request->boolean('is_active', true),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.instagram.index')
            ->with('success', 'Postingan Instagram berhasil ditambahkan.');
    }

    public function edit(InstagramPost $instagram)
    {
        return view('admin.instagram.edit', compact('instagram'));
    }

    public function update(Request $request, InstagramPost $instagram): RedirectResponse
    {
        $validated = $request->validate([
            'image'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'caption'    => ['nullable', 'string', 'max:2200'],
            'post_url'   => ['nullable', 'url', 'max:500'],
            'is_active'  => ['boolean'],
            'sort_order' => ['integer', 'min:0', 'max:9999'],
        ]);

        $data = [
            'caption'    => $validated['caption'] ?? null,
            'post_url'   => $validated['post_url'] ?? null,
            'is_active'  => $request->boolean('is_active'),
            'sort_order' => $validated['sort_order'] ?? 0,
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

    public function destroy(InstagramPost $instagram): RedirectResponse
    {
        Storage::disk('public')->delete($instagram->image);
        $instagram->delete();

        return redirect()->route('admin.instagram.index')
            ->with('success', 'Postingan berhasil dihapus.');
    }

    /**
     * Toggle aktif/nonaktif via AJAX atau redirect.
     */
    public function toggleActive(InstagramPost $instagram): RedirectResponse
    {
        $instagram->update(['is_active' => !$instagram->is_active]);

        return redirect()->route('admin.instagram.index')
            ->with('success', 'Status postingan diperbarui.');
    }
}
