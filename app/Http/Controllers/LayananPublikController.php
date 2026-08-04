<?php

namespace App\Http\Controllers;

class LayananPublikController extends Controller
{
    /**
     * Menampilkan halaman Layanan Publik.
     */
    public function index()
    {
        return view('layanan.index');
    }
}
