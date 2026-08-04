<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AboutController extends Controller
{
    /**
     * Menampilkan halaman Profil.
     */
    public function index()
    {
        $team = TeamMember::active()->ordered()->get();

        // Stats: ambil dari DB dan API
        $totalLayanan = Service::active()->count();
        $totalBerita  = NewsArticle::published()->count();

        // Total regulasi — cache 1 jam agar tidak hit API setiap request
        $totalRegulasi = Cache::remember('regulasi_total', 3600, function () {
            try {
                $response = Http::withoutVerifying()->timeout(8)
                    ->get('https://diciptabintar.bandung.go.id/api/master/master_regulasi/frontend');

                if ($response->successful()) {
                    $json = $response->json();
                    return $json['recordsTotal'] ?? count($json['data'] ?? []);
                }
            } catch (\Throwable $e) {
                // Jika API down, gunakan nilai fallback
            }
            return 111; // fallback
        });

        $stats = [
            'layanan'  => $totalLayanan  ?: 5,   // fallback jika DB kosong
            'bidang'   => 5,                       // statis (tidak berubah)
            'regulasi' => $totalRegulasi,
            'berita'   => $totalBerita   ?: 0,
        ];

        return view('about', compact('team', 'stats'));
    }
}
