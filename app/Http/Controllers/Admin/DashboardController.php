<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\NewsArticle;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman utama admin.
     */
    public function index()
    {
        $stats = [
            'services'         => Service::count(),
            'portfolios'       => Portfolio::count(),
            'team_members'     => TeamMember::count(),
            'unread_messages'  => ContactMessage::unread()->count(),
            'total_messages'   => ContactMessage::count(),
            'published_news'   => NewsArticle::published()->count(),
        ];

        $recentMessages = ContactMessage::unread()
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
