<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsArticleController extends Controller
{
    /**
     * Menampilkan daftar berita.
     */
    public function index()
    {
        $articles = NewsArticle::withTrashed()
            ->latest()
            ->paginate(15);

        return view('admin.news.index', compact('articles'));
    }

    /**
     * Menampilkan halaman tambah berita.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Menyimpan berita baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'excerpt'      => ['nullable', 'string', 'max:500'],
            'content'      => ['required', 'string'],
            'image'        => ['nullable', 'image', 'max:3072'],
            'author'       => ['required', 'string', 'max:150'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        if ($validated['is_published'] ?? false) {
            $validated['published_at'] = $validated['published_at'] ?? now();
        }

        NewsArticle::create($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Artikel berita berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman edit berita.
     */
    public function edit(NewsArticle $newsArticle)
    {
        return view('admin.news.edit', compact('newsArticle'));
    }

    /**
     * Mengupdate berita.
     */
    public function update(Request $request, NewsArticle $newsArticle): RedirectResponse
    {
        $validated = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'excerpt'      => ['nullable', 'string', 'max:500'],
            'content'      => ['required', 'string'],
            'image'        => ['nullable', 'image', 'max:3072'],
            'author'       => ['required', 'string', 'max:150'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        if (($validated['is_published'] ?? false) && ! $newsArticle->published_at) {
            $validated['published_at'] = $validated['published_at'] ?? now();
        }

        $newsArticle->update($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Artikel berita berhasil diperbarui.');
    }

    /**
     * Publish berita.
     */
    public function publish(NewsArticle $newsArticle): RedirectResponse
    {
        $newsArticle->publish();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Artikel berhasil dipublikasikan.');
    }

    /**
     * Menghapus berita.
     */
    public function destroy(NewsArticle $newsArticle): RedirectResponse
    {
        $newsArticle->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    /**
     * Mengembalikan berita yang dihapus.
     */
    public function restore(int $id): RedirectResponse
    {
        NewsArticle::withTrashed()->findOrFail($id)->restore();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Artikel berhasil dipulihkan.');
    }
}
