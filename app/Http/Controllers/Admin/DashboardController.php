<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\InstagramPost;

use App\Models\Service;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman utama admin.
     */
    public function index()
    {
        $stats = [
            'services'         => Service::count(),

            'unread_messages'  => ContactMessage::unread()->count(),
            'total_messages'   => ContactMessage::count(),
            'instagram_posts'  => InstagramPost::where('is_active', true)->count(),
        ];

        $recentMessages = ContactMessage::unread()
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
