<?php

namespace App\Http\Controllers;

use App\Models\InstagramPost;

class BeritaController extends Controller
{
    /**
     * Menampilkan postingan Instagram.
     */
    public function index()
    {
        $posts = InstagramPost::active()->paginate(12);

        return view('berita.index', compact('posts'));
    }
}
