<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Menampilkan daftar layanan.
     */
    public function index()
    {
        $services = Service::active()->ordered()->get();

        return view('services.index', compact('services'));
    }

    /**
     * Menampilkan detail layanan berdasarkan slug.
     */
    public function show(string $slug)
    {
        $bidangs = $this->getBidangData();

        if (array_key_exists($slug, $bidangs)) {
            $service = (object) array_merge(
                ['slug' => $slug, 'is_bidang' => true],
                $bidangs[$slug]
            );
            return view('services.show', compact('service'));
        }

        $service = Service::active()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('services.show', compact('service'));
    }

    /**
     * Ubah data Detail Bidang.
     */
    private function getBidangData()
    {
        return [
            'sekretariat' => [
                'title' => 'Sekretariat',
                'hero_desc' => 'Memegang peranan krusial sebagai tulang punggung administratif, pengelolaan umum & kepegawaian, keuangan, serta pengoordinasian program Dinas.',
                'hero_img' => 'images/about-office.jpg',
                'tugas' => [
                    ['color' => 'blue', 'title' => 'Koordinasi Administrasi', 'desc' => 'Melaksanakan urusan ketatausahaan, kepegawaian, tata laksana, dan hubungan masyarakat.'],
                    ['color' => 'green', 'title' => 'Pengelolaan Keuangan', 'desc' => 'Mengelola keuangan dinas, verifikasi SPJ, dan penyusunan laporan keuangan.'],
                    ['color' => 'orange', 'title' => 'Perencanaan & Evaluasi', 'desc' => 'Menyusun rencana program, anggaran, dan evaluasi kinerja dinas secara berkala.'],
                ],
                'struktur_desc' => 'Sekretariat membawahi beberapa sub bagian yang berfokus pada kelancaran operasional internal dinas.',
                'struktur' => [
                    [
                        'title' => 'Sub Bagian Umum & Kepegawaian',
                        'items' => ['Pengelolaan surat menyurat dan arsip.', 'Administrasi kepegawaian dan pengembangan SDM.', 'Pemeliharaan aset dan kebersihan kantor.']
                    ],
                    [
                        'title' => 'Sub Bagian Keuangan & Program',
                        'items' => ['Penyusunan RKA dan DPA dinas.', 'Verifikasi dan pelaporan pertanggungjawaban.', 'Evaluasi program dan penyusunan LAKIP.']
                    ]
                ]
            ],
            'cipta-karya' => [
                'title' => 'Bidang Cipta Karya',
                'hero_desc' => 'Bertanggung jawab atas penataan Bangunan Gedung dan arsitektur kota, teknik Bangunan Gedung, serta kelaikan Bangunan Gedung di Kota Bandung.',
                'hero_img' => 'images/bidang-cipta-karya.jpg',
                'tugas' => [
                    ['color' => 'blue', 'title' => 'Penataan & Arsitektur Kota', 'desc' => 'Menyelenggarakan penataan bangunan dan lingkungannya agar estetis dan fungsional.'],
                    ['color' => 'green', 'title' => 'Persetujuan & Kelaikan (PBG & SLF)', 'desc' => 'Mengoordinasikan penerbitan PBG, SLF, dan fasilitasi Tim Profesi Ahli (TPA).'],
                    ['color' => 'orange', 'title' => 'Pendataan Bangunan', 'desc' => 'Melaksanakan pemutakhiran data bangunan gedung dan RTH Privat secara berkala.'],
                ],
                'struktur_desc' => 'Bidang Cipta Karya menjalankan fungsinya melalui pilar penataan, perizinan, dan kelaikan bangunan yang bekerja sinergis untuk mewujudkan tata bangunan kota yang aman dan tertib.',
                'struktur' => [
                    [
                        'title' => 'Substansi Penataan Bangunan & Lingkungan',
                        'items' => ['Penyusunan Rencana Tata Bangunan dan Lingkungan (RTBL).', 'Penyelenggaraan Sayembara Desain Arsitektur Kota.', 'Penataan kawasan tematik dan ruang publik.']
                    ],
                    [
                        'title' => 'Substansi Bina Bangunan Gedung',
                        'items' => ['Pembinaan teknis penyelenggaraan bangunan gedung.', 'Pengawasan kelaikan fungsi bangunan.', 'Fasilitasi teknis penyelenggaraan Laik Fungsi (SLF).']
                    ]
                ]
            ],
            'bina-konstruksi' => [
                'title' => 'Bidang Bina Konstruksi dan Bangunan Gedung Negara',
                'hero_desc' => 'Berperan strategis dalam pembinaan jasa konstruksi, perencanaan, serta pengawasan pembangunan Bangunan Gedung Nagara di Kota Bandung.',
                'hero_img' => 'images/konstruksi1.jpg.jpeg',
                'tugas' => [
                    ['color' => 'blue', 'title' => 'Perencanaan Gedung Negara', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
                    ['color' => 'green', 'title' => 'Pembinaan Jasa Konstruksi', 'desc' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco.'],
                    ['color' => 'orange', 'title' => 'Pengawasan & Pemeliharaan', 'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse.'],
                ],
                'struktur_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.',
                'struktur' => [
                    [
                        'title' => 'Substansi Bina Konstruksi',
                        'items' => ['Lorem ipsum dolor sit amet.', 'Consectetur adipiscing elit.', 'Sed do eiusmod tempor incididunt.']
                    ],
                    [
                        'title' => 'Substansi Bangunan Gedung Negara',
                        'items' => ['Ut enim ad minim veniam.', 'Quis nostrud exercitation ullamco.', 'Laboris nisi ut aliquip ex ea commodo.']
                    ]
                ]
            ],
            'tata-ruang' => [
                'title' => 'Bidang Tata Ruang',
                'hero_desc' => 'Mengemban peran strategis dalam perencanaan, pengukuran dan pemetaan, serta pengembangan tata ruang wilayah Kota Bandung secara berkelanjutan.',
                'hero_img' => 'images/about-office.jpg',
                'tugas' => [
                    ['color' => 'blue', 'title' => 'Survei & Pemetaan', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
                    ['color' => 'green', 'title' => 'Perencanaan Tata Ruang', 'desc' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco.'],
                    ['color' => 'orange', 'title' => 'Layanan KRK & KKPR', 'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse.'],
                ],
                'struktur_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.',
                'struktur' => [
                    [
                        'title' => 'Substansi Perencanaan Ruang',
                        'items' => ['Lorem ipsum dolor sit amet.', 'Consectetur adipiscing elit.', 'Sed do eiusmod tempor incididunt.']
                    ],
                    [
                        'title' => 'Substansi Pemanfaatan Ruang',
                        'items' => ['Ut enim ad minim veniam.', 'Quis nostrud exercitation ullamco.', 'Laboris nisi ut aliquip ex ea commodo.']
                    ]
                ]
            ],
            'pengawasan' => [
                'title' => 'Bidang Pengawasan dan Pengendalian Pemanfaatan Ruang dan Bangunan Gedung',
                'hero_desc' => 'Melaksanakan pengawasan, pengendalian, dan penertiban terhadap pemanfaatan ruang serta penyelenggaraan bangunan gedung agar sesuai regulasi.',
                'hero_img' => 'images/about-office.jpg',
                'tugas' => [
                    ['color' => 'blue', 'title' => 'Penertiban & Sanksi', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
                    ['color' => 'green', 'title' => 'Pengawasan Lapangan', 'desc' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco.'],
                    ['color' => 'orange', 'title' => 'Dokumentasi & Sengketa', 'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse.'],
                ],
                'struktur_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.',
                'struktur' => [
                    [
                        'title' => 'Substansi Pengawasan',
                        'items' => ['Lorem ipsum dolor sit amet.', 'Consectetur adipiscing elit.', 'Sed do eiusmod tempor incididunt.']
                    ],
                    [
                        'title' => 'Substansi Pengendalian',
                        'items' => ['Ut enim ad minim veniam.', 'Quis nostrud exercitation ullamco.', 'Laboris nisi ut aliquip ex ea commodo.']
                    ]
                ]
            ],
            'uptd-pemakaman' => [
                'title' => 'UPTD Pengelolaan Pemakaman',
                'hero_desc' => 'Menyelenggarakan pelayanan teknis operasional, penataan, kebersihan, dan pemeliharaan ruang terbuka hijau (RTH) publik pemakaman.',
                'hero_img' => 'images/UPTD.jpg',
                'tugas' => [
                    ['color' => 'blue', 'title' => 'Operasional Pemakaman', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
                    ['color' => 'green', 'title' => 'Ketertiban & Keindahan', 'desc' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco.'],
                    ['color' => 'orange', 'title' => 'Pelayanan Masyarakat', 'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse.'],
                ],
                'struktur_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.',
                'struktur' => [
                    [
                        'title' => 'Sub Bagian Tata Usaha UPTD',
                        'items' => ['Lorem ipsum dolor sit amet.', 'Consectetur adipiscing elit.', 'Sed do eiusmod tempor incididunt.']
                    ],
                    [
                        'title' => 'Pelaksana Teknis Lapangan',
                        'items' => ['Ut enim ad minim veniam.', 'Quis nostrud exercitation ullamco.', 'Laboris nisi ut aliquip ex ea commodo.']
                    ]
                ]
            ],
        ];
    }
}
