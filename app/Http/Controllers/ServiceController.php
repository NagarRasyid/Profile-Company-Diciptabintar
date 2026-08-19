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
                    ['color' => 'blue',   'icon' => 'document-text',  'title' => 'Koordinasi Administrasi',  'desc' => 'Melaksanakan tata usaha, persuratan, kehumasan, kearsipan, dan kerumahtanggaan.'],
                    ['color' => 'green',  'icon' => 'banknotes',      'title' => 'Pengelolaan Keuangan',     'desc' => 'Menyusun anggaran pendapatan/belanja, penggajian ASN, dan laporan pertanggungjawaban.'],
                    ['color' => 'orange', 'icon' => 'users',          'title' => 'Manajemen SDM',             'desc' => 'Mengelola administrasi kepegawaian, pengembangan karier, dan peningkatan kompetensi ASN.'],
                ],
                'struktur_desc' => 'Sekretariat menjalankan fungsinya melalui dua sub bagian utama yang bekerja sinergis untuk mendukung operasional dinas.',
                'struktur' => [
                    [
                        'icon' => 'construct',
                        'title' => 'Sub Bagian Umum & Kepegawaian',
                        'items' => ['Pengelolaan urusan surat menyurat dan tata kearsipan.', 'Pemeliharaan perlengkapan, aset, dan kerumahtanggaan dinas.', 'Fasilitasi administrasi kepegawaian dan keprotokolan.']
                    ],
                    [
                        'icon' => 'money',
                        'title' => 'Sub Bagian Keuangan & Program',
                        'items' => ['Penyusunan Rencana Kerja Anggaran (RKA) serta Dokumen Pelaksanaan Anggaran (DPA) dinas.', 'Penatausahaan keuangan dan verifikasi dokumen pencairan.', 'Penyusunan laporan pertanggungjawaban keuangan dinas.']
                    ]
                ]
            ],
            'cipta-karya' => [
                'title' => 'Bidang Cipta Karya',
                'hero_desc' => 'Bertanggung jawab atas penataan Bangunan Gedung dan arsitektur kota, teknik Bangunan Gedung, serta kelaikan Bangunan Gedung di Kota Bandung.',
                'hero_img' => 'images/bidang-cipta-karya.jpg',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'building-office-2', 'title' => 'Penataan & Arsitektur Kota',         'desc' => 'Menyelenggarakan penataan bangunan dan lingkungannya agar estetis dan fungsional.'],
                    ['color' => 'green',  'icon' => 'clipboard-check',   'title' => 'Persetujuan & Kelaikan (PBG & SLF)', 'desc' => 'Mengoordinasikan penerbitan PBG, SLF, dan fasilitasi Tim Profesi Ahli (TPA).'],
                    ['color' => 'orange', 'icon' => 'circle',  'title' => 'Pendataan Bangunan',                 'desc' => 'Melaksanakan pemutakhiran data bangunan gedung dan RTH Privat secara berkala.'],
                ],
                'struktur_desc' => 'Bidang Cipta Karya menjalankan fungsinya melalui pilar penataan, perizinan, dan kelaikan bangunan yang bekerja sinergis untuk mewujudkan tata bangunan kota yang aman dan tertib.',
                'struktur' => [
                    [
                        'icon' => 'construct',
                        'title' => 'Substansi Penataan Bangunan & Lingkungan',
                        'items' => ['Penyusunan Rencana Tata Bangunan dan Lingkungan (RTBL).', 'Penyelenggaraan Sayembara Desain Arsitektur Kota.', 'Penataan kawasan tematik dan ruang publik.']
                    ],
                    [
                        'icon' => 'construct',
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
                    ['color' => 'blue',   'icon' => 'building-office',  'title' => 'Perencanaan Gedung Negara',  'desc' => 'Memberikan bantuan teknis dan DED perencanaan pembangunan Bangunan Gedung Negara.'],
                    ['color' => 'green',  'icon' => 'academic-cap',     'title' => 'Pembinaan Jasa Konstruksi', 'desc' => 'Penyelenggaraan pelatihan dan fasilitasi sertifikasi tenaga terampil konstruksi.'],
                    ['color' => 'orange', 'icon' => 'eye',              'title' => 'Pengawasan dan Pemeliharaan','desc' => 'Pengawasan fisik pembangunan serta pemeliharaan aset/gedung strategis daerah.'],
                ],
                'struktur_desc' => 'Bidang Bina Konstruksi dan Bangunan Gedung Negara menjalankan fungsinya melalui pembinaan jasa konstruksi dan pengawasan teknis yang bekerja sinergis untuk menjamin mutu infrastruktur pemerintah.',
                'struktur' => [
                    [
                        'icon' => 'protect',
                        'title' => 'Sub Bagian Tata Usaha',
                        'items' => ['Pengelolaan Administrasi umum dan kepegawaian.', 'Penyusunan program dan pelaporan kegiatan.', 'Pengelolaan keuangan dan asetp bidang.']
                    ],
                    [
                        'icon' => 'tools',
                        'title' => 'Seksi Operasional',
                        'items' => ['Koordinasi pelaksanaan teknis di lapangan.', 'Evaluasi kinerja dan mutu proyek konstruksi.', 'Penerapan standar operasional prosedur (SOP).']
                    ]
                ]
            ],
            'tata-ruang' => [
                'title' => 'Bidang Tata Ruang',
                'hero_desc' => 'Mengemban peran strategis dalam perencanaan, pengukuran dan pemetaan, serta pengembangan tata ruang wilayah Kota Bandung secara berkelanjutan.',
                'hero_img' => 'images/about-office.jpg',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'map',             'title' => 'Survei & Pemetaan',      'desc' => 'Pengukuran spasial, pemetaan kota, dan evaluasi simpul jaringan informasi geospasial.'],
                    ['color' => 'green',  'icon' => 'squares-2x2',    'title' => 'Perencanaan Tata Ruang', 'desc' => 'Penyusunan dan sosialisasi Perwal RDTR, RTRW, serta sinkronisasi program pemanfaatan ruang (SPPR).'],
                    ['color' => 'orange', 'icon' => 'document-check', 'title' => 'Layanan KRK & KKPR',    'desc' => 'Penerbitan Keterangan Rencana Kota (KRK) New dan Informasi Rencana Kota.'],
                ],
                'struktur_desc' => 'Bidang Tata Ruang menjalankan fungsinya melalui pemetaan spasial dan penyusunan regulasi yang bekerja sinergis untuk mewujudkan perencanaan ruang kota yang terstruktur dan berkelanjutan.',
                'struktur' => [
                    [
                        'icon' => 'map',
                        'title' => 'Seksi Perencanaan Ruang',
                        'items' => ['Penyusunan REncana Tata Ruang Wilayah (RTRW).', 'Penyusunan Rencana Detail Tata Ruang(RDTR).', 'Sinkronisasi Program Pemanfaatan Ruang.']
                    ],
                    [
                        'icon' => 'checknote',
                        'title' => 'Substansi Pemanfaatan Ruang',
                        'items' => ['Proses penerbitan dokumen KRK.', 'Penyediaan Informasi Rencana Kota bagi masyarakat.', 'Koordinasi Kesesuaian Kegiatan Pemanfaatan Ruang (KKPR).']
                    ],
                    [
                        'icon' => 'compas',
                        'title' => 'Substansi Pemanfaatan Ruang',
                        'items' => ['Survei kondisi tata ruang lapangan.', 'Pembuatan peta tematik perkotaan.', 'Pengelolaan data informasi geospasial.']
                    ]
                ]
            ],
            'pengawasan' => [
                'title' => 'Bidang Pengawasan dan Pengendalian Pemanfaatan Ruang dan Bangunan Gedung',
                'hero_desc' => 'Melaksanakan pengawasan, pengendalian, dan penertiban terhadap pemanfaatan ruang serta penyelenggaraan bangunan gedung agar sesuai regulasi.',
                'hero_img' => 'images/about-office.jpg',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'megaphone',       'title' => 'Penertiban & Sanksi',    'desc' => 'Penanganan pelanggaran tata ruang melalui surat teguran, sanksi administratif, hingga penyegelan.'],
                    ['color' => 'green',  'icon' => 'shield-check',    'title' => 'Pengawasan Lapangan',   'desc' => 'Inspeksi dan monitoring rutin pelaksanaan tata ruang dan PBG oleh Penilik Bangunan.'],
                    ['color' => 'orange', 'icon' => 'chat-bubble-left-right', 'title' => 'Dokumentasi & Sengketa', 'desc' => 'Penanganan pengaduan masyarakat, fasilitasi PPNS, dan penyelesaian sengketa tata ruang.'],
                ],
                'struktur_desc' => 'Bidang Bina Konstruksi dan Bangunan Gedung Negara menjalankan fungsinya melalui pembinaan jasa konstruksi dan pengawasan teknis yang bekerja sinergis untuk menjamin mutu infrastruktur pemerintah.',
                'struktur' => [
                    [
                        'icon' => 'eye',
                        'title' => 'Pengawasan',
                        'items' => ['Monitoring pelaksanaan izin tata ruang.', 'Inspeksi kelayakan bangunan gedung.', 'Evaluasi pemanfaatan ruang kota.', 'Koordinasi dengan wilayah terkait pengawasan.']
                    ],
                    [
                        'icon' => 'hammer',
                        'title' => 'Pengendalian',
                        'items' => ['Penerbitan surat teguran pelanggaran.', 'Penindakan sanksi administratif.', 'Pelaksanaan penyegelan bangunan.', 'Fasilitasi penyelesaian sengketa.']
                    ]
                ]
            ],
            'uptd-pemakaman' => [
                'title' => 'UPTD Pengelolaan Pemakaman',
                'hero_desc' => 'Menyelenggarakan pelayanan teknis operasional, penataan, kebersihan, dan pemeliharaan ruang terbuka hijau (RTH) publik pemakaman.',
                'hero_img' => 'images/UPTD.jpg',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'note',      'title' => 'Pelayanan Pemakaman',    'desc' => 'Pengelolaan layanan TPU (Muslim & Non- Muslim), makam baru, dan makam tumpang.'],
                    ['color' => 'green',  'icon' => 'leaf',       'title' => 'Pemeliharaan RTH Publik','desc' => 'Penataan lanskap, rumputisasi, dan perawatan kebersihan area pemakaman.'],
                    ['color' => 'orange', 'icon' => 'device-phone-mobile', 'title' => 'Digitalisasi Layanan',   'desc' => 'Optimalisasi sistem pelayanan pemakaman online (SIMPELMAN.BdgJuara).'],
                ],
                'struktur_desc' => 'UPTD Pengelolaan Pemakaman menjalankan fungsinya melalui pelayanan teknis dan pemeliharaan RTH yang bekerja sinergis untuk menyediakan sarana pemakaman yang tertib dan nyaman.',
                'struktur' => [
                    [
                        'icon' => 'protect',
                        'title' => 'Sub Bagian Tata Usaha UPTD',
                        'items' => ['Pengelolaan administrasi kepegawaian dan keuangan UPTD.', 'Penyusunan program kerja dan laporan evaluasi kinerja.', 'Pelayanan administrasi umum dan surat menyurat.']
                    ],
                    [
                        'icon' => 'note',
                        'title' => 'Pelayanan Teknis',
                        'items' => ['Koordinasi pelayanan pemakaman di seluruh TPU kelolaan.', 'Monitoring pemeliharaan infrastruktur dan RTH di area makam.', 'Pengawasan kinerja petugas lapangan (PHL) pemakaman.']
                    ]
                ]
            ],
        ];
    }
}
