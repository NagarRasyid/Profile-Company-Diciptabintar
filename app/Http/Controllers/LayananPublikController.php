<?php
namespace App\Http\Controllers;
use App\Models\Service;

class LayananPublikController extends Controller
{
    /**
     * Menampilkan halaman Layanan Publik.
     */
    public function index()
    {
        $services = Service::active()->ordered()->get();
        return view('layanan.index', compact('services'));
    }
}