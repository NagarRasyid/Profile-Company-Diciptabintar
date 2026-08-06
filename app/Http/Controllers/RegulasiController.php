<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RegulasiController extends Controller
{
    /**
     * Daftar regulasi & dokumen hukum yang tersedia.
     */
    private array $regulasiData = [
        [
            'kategori'   => 'Peraturan Daerah',
            'slug'       => 'perda',
            'badge'      => 'PERATURAN DAERAH',
            'tahun'      => '2024',
            'nomor'      => '03',
            'judul'      => 'Peraturan Daerah Kota Bandung Nomor 3 Tahun 2024 Tentang Rencana Tata Ruang Wilayah Kota Bandung Tahun 2024–2044',
            'file'       => null,
        ],
        [
            'kategori'   => 'Peraturan Walikota',
            'slug'       => 'perwal',
            'badge'      => 'PERATURAN WALIKOTA',
            'tahun'      => '2023',
            'nomor'      => '15',
            'judul'      => 'Peraturan Walikota Bandung Nomor 15 Tahun 2023 Tentang Petunjuk Pelaksanaan Penyelenggaraan Reklame',
            'file'       => null,
        ],
        [
            'kategori'   => 'Standar Pelayanan',
            'slug'       => 'standar',
            'badge'      => 'STANDAR PELAYANAN',
            'tahun'      => '2022',
            'nomor'      => null,
            'judul'      => 'Standar Pelayanan Publik Penerbitan Persetujuan Bangunan Gedung (PBG) pada Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang',
            'file'       => null,
        ],
        [
            'kategori'   => 'SK Kadis',
            'slug'       => 'sk-kadis',
            'badge'      => 'SK KEPALA DINAS',
            'tahun'      => '2021',
            'nomor'      => null,
            'judul'      => 'Keputusan Kepala Dinas Tentang Pembentukan Tim Profesi Ahli (TPA) Bangunan Gedung',
            'file'       => null,
        ],
        [
            'kategori'   => 'Peraturan Daerah',
            'slug'       => 'perda',
            'badge'      => 'PERATURAN DAERAH',
            'tahun'      => '2020',
            'nomor'      => '07',
            'judul'      => 'Peraturan Daerah Kota Bandung Nomor 7 Tahun 2020 Tentang Penyelenggaraan Perumahan dan Kawasan Permukiman',
            'file'       => null,
        ],
        [
            'kategori'   => 'Peraturan Walikota',
            'slug'       => 'perwal',
            'badge'      => 'PERATURAN WALIKOTA',
            'tahun'      => '2022',
            'nomor'      => '08',
            'judul'      => 'Peraturan Walikota Bandung Nomor 8 Tahun 2022 Tentang Tata Cara Pengendalian Pemanfaatan Ruang',
            'file'       => null,
        ],
        [
            'kategori'   => 'Standar Pelayanan',
            'slug'       => 'standar',
            'badge'      => 'STANDAR PELAYANAN',
            'tahun'      => '2021',
            'nomor'      => null,
            'judul'      => 'Standar Pelayanan Pengawasan Bangunan Gedung di Lingkungan Pemerintah Kota Bandung',
            'file'       => null,
        ],
        [
            'kategori'   => 'SK Kadis',
            'slug'       => 'sk-kadis',
            'badge'      => 'SK KEPALA DINAS',
            'tahun'      => '2023',
            'nomor'      => null,
            'judul'      => 'Surat Keputusan Kepala Dinas Tentang Penetapan Standar Harga Satuan Konstruksi Tahun 2023',
            'file'       => null,
        ],
    ];

    public function index() {
        $urlAPI      = "https://diciptabintar.bandung.go.id/api/master/master_regulasi/frontend";
        $baseFileUrl = "https://diciptabintar.bandung.go.id/";

        $response = Http::withoutVerifying()->timeout(10)->get($urlAPI);

        if ($response->successful()) {
            $json = $response->json();

            // API mengembalikan {draw, recordsTotal, recordsFiltered, data: [...]}
            // Kita ambil key 'data', jika tidak ada fallback ke array kosong
            $rawData = $json['data'] ?? (is_array($json) ? $json : []);

            // Petakan field API ke field yang digunakan blade template
            $regulasi = collect($rawData)->map(function ($item) use ($baseFileUrl) {
                $isi = $item['isi'] ?? '';

                // Tentukan badge & kategori berdasarkan isi judul secara sederhana
                if (stripos($isi, 'peraturan daerah') !== false || stripos($isi, 'perda') !== false) {
                    $kategori = 'Peraturan Daerah';
                    $badge    = 'PERATURAN DAERAH';
                    $slug     = 'perda';
                } elseif (stripos($isi, 'peraturan wali kota') !== false || stripos($isi, 'perwal') !== false) {
                    $kategori = 'Peraturan Walikota';
                    $badge    = 'PERATURAN WALIKOTA';
                    $slug     = 'perwal';
                } elseif (stripos($isi, 'standar pelayanan') !== false) {
                    $kategori = 'Standar Pelayanan';
                    $badge    = 'STANDAR PELAYANAN';
                    $slug     = 'standar';
                } elseif (stripos($isi, 'keputusan') !== false || stripos($isi, 'sk') !== false) {
                    $kategori = 'SK Kadis';
                    $badge    = 'SK KEPALA DINAS';
                    $slug     = 'sk-kadis';
                } elseif (stripos($isi, 'undang-undang') !== false || stripos($isi, 'undang - undang') !== false) {
                    $kategori = 'Undang-Undang';
                    $badge    = 'UNDANG-UNDANG';
                    $slug     = 'uu';
                } elseif (stripos($isi, 'peraturan pemerintah') !== false || stripos($isi, 'peraturan presiden') !== false) {
                    $kategori = 'Peraturan Pusat';
                    $badge    = 'PERATURAN PUSAT';
                    $slug     = 'pusat';
                } elseif (stripos($isi, 'lkip') !== false || stripos($isi, 'laporan kinerja') !== false || stripos($isi, 'lakip') !== false) {
                    $kategori = 'LAKIP';
                    $badge    = 'LAKIP';
                    $slug     = 'lakip';
                } elseif (stripos($isi, 'peraturan lembaga') !== false || stripos($isi, 'rencana strategis') !== false) {
                    $kategori = 'Peraturan Lembaga';
                    $badge    = 'PERATURAN LEMBAGA';
                    $slug     = 'perlem';
                }else {
                    $kategori = 'Dokumen';
                    $badge    = 'DOKUMEN';
                    $slug     = 'dokumen';
                }

                // Ekstrak tahun dari isi judul (4 digit angka)
                preg_match('/\b(20\d{2}|19\d{2})\b/', $isi, $tahunMatch);
                $tahun = $tahunMatch[1] ?? null;

                // Ekstrak nomor regulasi jika ada
                preg_match('/nomor[.\s]+([0-9]+)/i', $isi, $nomorMatch);
                $nomor = isset($nomorMatch[1]) ? ltrim($nomorMatch[1], '0') : null;

                // Buat URL file lengkap
                $berkasRaw = $item['berkas'] ?? null;
                $fileUrl   = $berkasRaw ? $baseFileUrl . $berkasRaw : null;

                return [
                    'no'       => $item['no']  ?? '',
                    'id'       => $item['id']  ?? '',
                    'judul'    => $isi,
                    'kategori' => $kategori,
                    'badge'    => $badge,
                    'slug'     => $slug,
                    'tahun'    => $tahun,
                    'nomor'    => $nomor,
                    'file'     => $fileUrl,
                ];
            })->toArray();

            $total = $json['recordsTotal'] ?? count($regulasi);

            return view('regulasi.index', compact('regulasi', 'total'));
        } else {
            abort(500, 'Gagal mengambil data regulasi dari server pusat.');
        }
    }

    public function download(Request $request)
    {
        $url = $request->query('file');
        $judul = Str::slug($request->query('judul', 'dokumen')) . '.pdf';

        return response()->streamDownload(function () use ($url) {
            echo file_get_contents($url);
        }, $judul, ['Content-Type' => 'application/pdf']);
    }
}
