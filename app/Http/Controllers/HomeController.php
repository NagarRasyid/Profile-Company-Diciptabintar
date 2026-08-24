<?php

namespace App\Http\Controllers;

use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama.
     */
    public function index()
    {
        $services = Service::active()->ordered()->take(6)->get();

        return view('home', compact('services'));
    }
}