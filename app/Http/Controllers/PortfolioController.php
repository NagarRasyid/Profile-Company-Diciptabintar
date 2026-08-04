<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Menampilkan daftar portofolio.
     */
    public function index(Request $request)
{
    $category = $request->query('category');

    $query = Portfolio::active()->ordered();

    if ($category) {
        $query->where('category', $category);
    }

    $portfolios = $query->paginate(12);

    $categories = Portfolio::active()
        ->distinct()
        ->pluck('category')
        ->filter()
        ->values();

    return view('portfolio.index', compact(
        'portfolios',
        'category',
        'categories'
    ));
}

    /**
     * Menampilkan detail portofolio berdasarkan slug.
     */
    public function show(string $slug)
    {
        $portfolio = Portfolio::active()
            ->where('slug', $slug)
            ->firstOrFail();

        $related = Portfolio::active()
            ->where('id', '!=', $portfolio->id)
            ->ordered()
            ->take(3)
            ->get();

        return view('portfolio.show', compact('portfolio', 'related'));
    }
}
