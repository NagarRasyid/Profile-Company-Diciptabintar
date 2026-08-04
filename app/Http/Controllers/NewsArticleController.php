<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;

class NewsArticleController extends Controller
{
    /**
     * Menampilkan daftar berita.
     */
    public function index()
    {
        $featured = NewsArticle::published()->latest()->first();

        $articles = NewsArticle::published()
            ->when($featured, fn($q) => $q->where('id', '!=', $featured->id))
            ->latest()
            ->paginate(6);

        $popular = NewsArticle::published()
            ->latest()
            ->take(5)
            ->get();

        return view('news.index', compact('articles', 'featured', 'popular'));
    }

    /**
     * Menampilkan detail berita berdasarkan slug.
     */
    public function show(string $slug)
    {
        $article = NewsArticle::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $related = NewsArticle::published()
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(3)
            ->get();

        return view('news.show', compact('article', 'related'));
    }
}
