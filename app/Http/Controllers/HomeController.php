<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TeamMember;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama.
     */
    public function index()
    {
        $services   = Service::active()->ordered()->take(6)->get();
        $portfolios = Portfolio::active()->featured()->ordered()->take(6)->get();
        $team       = TeamMember::active()->ordered()->take(4)->get();
        $news       = NewsArticle::published()->latest()->take(3)->get();

        return view('home', compact('services', 'portfolios', 'team', 'news'));
    }
}
