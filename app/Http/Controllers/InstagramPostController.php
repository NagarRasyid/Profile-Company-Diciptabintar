<?php

namespace App\Http\Controllers;

use App\Models\InstagramPost;

class InstagramPostController extends Controller
{
    /**
     * Halaman publik Berita & Update — menampilkan grid Instagram posts.
     */
    public function index()
    {
        $posts = InstagramPost::active()->paginate(12);

        return view('news.index', compact('posts'));
    }
}
