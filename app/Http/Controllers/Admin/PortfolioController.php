<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Menampilkan daftar Bidang.
     */
    public function index()
    {
        $portfolios = Portfolio::withTrashed()->ordered()->paginate(15);

        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Menampilkan halaman tambah Bidang.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Menyimpan Bidang baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:200'],
            'description' => ['required', 'string'],
            'client'      => ['nullable', 'string', 'max:150'],
            'category'    => ['required', 'string', 'max:100'],
            'image'       => ['nullable', 'image', 'max:4096'],
            'gallery'     => ['nullable', 'array'],
            'gallery.*'   => ['image', 'max:4096'],
            'year'        => ['nullable', 'integer', 'min:2000', 'max:2100'],
            'url'         => ['nullable', 'url', 'max:255'],
            'is_featured' => ['boolean'],
            'is_active'   => ['boolean'],
            'order'       => ['integer', 'min:0'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolios', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('portfolios/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        Portfolio::create($validated);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman edit Bidang.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Mengupdate Bidang.
     */
    public function update(Request $request, Portfolio $portfolio): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:200'],
            'description' => ['required', 'string'],
            'client'      => ['nullable', 'string', 'max:150'],
            'category'    => ['required', 'string', 'max:100'],
            'image'       => ['nullable', 'image', 'max:4096'],
            'gallery'     => ['nullable', 'array'],
            'gallery.*'   => ['image', 'max:4096'],
            'year'        => ['nullable', 'integer', 'min:2000', 'max:2100'],
            'url'         => ['nullable', 'url', 'max:255'],
            'is_featured' => ['boolean'],
            'is_active'   => ['boolean'],
            'order'       => ['integer', 'min:0'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $currentGallery = $portfolio->gallery ?? [];

        if ($request->has('delete_gallery') && is_array($request->delete_gallery)) {
            foreach ($request->delete_gallery as $index) {
                if (isset($currentGallery[$index])) {
                    unset($currentGallery[$index]);
                }
            }
            $currentGallery = array_values($currentGallery);
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $currentGallery[] = $file->store('portfolios/gallery', 'public');
            }
        }
        
        $validated['gallery'] = $currentGallery;

        $portfolio->update($validated);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil diperbarui.');
    }

    /**
     * Menghapus Bidang.
     */
    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        $portfolio->delete();

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil dihapus.');
    }

    /**
     * Mengembalikan Bidang yang dihapus.
     */
    public function restore(int $id): RedirectResponse
    {
        Portfolio::withTrashed()->findOrFail($id)->restore();

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil dipulihkan.');
    }
}
