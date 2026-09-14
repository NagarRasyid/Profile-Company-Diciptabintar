<?php

namespace App\Http\Controllers;

use App\Models\Service;

class BidangController extends Controller
{
    /**
     * Menampilkan daftar layanan.
     */
    public function index()
    {
        $services = Service::active()->ordered()->get();

        return view('bidang.index', compact('services'));
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
            return view('bidang.show', compact('service'));
        }

        $service = Service::active()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('bidang.show', compact('service'));
    }

    /**
     * Ubah data Detail Bidang.
     */
    private function getBidangData()
    {
        return [
            'kepala-dinas' => [
                'title' => 'Kepala Dinas',
                'hero_desc' => 'Kepala Dinas mempunyai tugas membantu Wali Kota dalam menyelenggarakan Urusan Pemerintahan yang menjadi kewenangan Daerah di bidang pekerjaan umum dan penataan ruang sektor cipta karya, bina konstruksi, tata ruang dan pemakaman.',
                'hero_img' => '',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'document-text',  'title' => 'Perumusan Kebijakan',            'desc' => 'Perumusan kebijakan lingkup cipta karya, bina konstruksi, tata ruang dan pemakaman.'],
                    ['color' => 'green',  'icon' => 'banknotes',      'title' => 'Pelaksanaan Kebijakan',   'desc' => 'Pelaksanaan kebijakan lingkup cipta karya, bina konstruksi, tata ruang dan pemakaman.'],
                    ['color' => 'orange', 'icon' => 'users',          'title' => 'Evaluasi dan Pelaporan', 'desc' => 'Pelaksanaan evaluasi dan pelaporan lingkup cipta karya, bina konstruksi, tata ruang dan pemakaman.'],
                    ['color' => 'orange', 'icon' => 'users',          'title' => 'Pelaksanaan Administrasi',  'desc' => 'Pelaksanaan urusan administrasi lingkup cipta karya, bina konstruksi, tata ruang dan pemakaman.'],
                    ['color' => 'orange', 'icon' => 'users',          'title' => 'Pelaksanaan Fungsi Lain',          'desc' => 'Pelaksanaan fungsi lain yang diberikan oleh Wali Kota terkait dengan tugas dan fungsinya.'],
                ]
            ],
            
            'sekretariat' => [
                'title' => 'Sekretariat',
                'hero_desc' => 'Memegang peranan krusial sebagai tulang punggung administratif, pengelolaan umum & kepegawaian, keuangan, serta pengoordinasian program Dinas.',
                'hero_img' => 'images/sekretariat.jpeg',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'document-text',  'title' => 'Koordinasi Penyusunan',            'desc' => 'Pengoordinasian penyusunan rencana dan program kerja kesekretariatan dan Dinas.'],
                    ['color' => 'green',  'icon' => 'banknotes',      'title' => 'Koordinasi Perumusan Kebijakan',   'desc' => 'Pengoordinasian perumusan kebijakan lingkup kesekretariatan dan Dinas.'],
                    ['color' => 'orange', 'icon' => 'users',          'title' => 'Koordinasi Pelaksanaan Kebijakan', 'desc' => 'Pengoordinasian pelaksanaan kebijakan lingkup kesekretariatan dan Dinas.'],
                    ['color' => 'orange', 'icon' => 'users',          'title' => 'Koordinasi Evaluasi & Pelaporan',  'desc' => 'Pengoordinasian pelaksanaan evaluasi dan pelaporan lingkup kesekretariatan dan Dinas.'],
                    ['color' => 'orange', 'icon' => 'users',          'title' => 'Koordinasi Administrasi',          'desc' => 'Pengoordinasian pelaksanaan administrasi lingkup kesekretariatan dan Dinas.'],
                    ['color' => 'green',  'icon' => 'banknotes',      'title' => 'Fungsi Lainnya',   'desc' => 'Pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.'],
                    
                ],
                'struktur_desc' => 'Sekretariat menjalankan fungsinya melalui tiga sub bagian utama yang bekerja sinergis untuk mendukung operasional dinas.',
                'struktur' => [
                    [
                        'icon' => 'construct',
                        'title' => 'Sub Bagian Umum & Kepegawaian',
                        'items' => ['penyiapan bahan kebijakan operasional lingkup administrasi umum dan kepegawaian.', 'pelaksanaan kebijakan lingkup administrasi umum dan kepegawaian.', 'pelaksanaan evaluasi dan pelaporan lingkup administrasi umum dan kepegawaian.','pelaksanaan administrasi lingkup pelayanan administrasi umum dan kepegawaian.','pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ],
                    [
                        'icon' => 'money',
                        'title' => 'Sub Bagian Keuangan',
                        'items' => ['penyiapan bahan kebijakan operasional lingkup keuangan.', 'pelaksanaan kebijakan lingkup keuangan.', 'pelaksanaan evaluasi dan pelaporan lingkup keuangan.', 'pelaksanaan administrasi lingkup keuangan', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ],
                    [
                        'icon' => 'information-circle',
                        'title' => 'Sub Bagian Program, Data dan Informasi',
                        'items' => ['penyiapan bahan kebijakan operasional lingkup program, data dan informasi.', 'pelaksanaan kebijakan lingkup program, data dan informasi.', 'pelaksanaan evaluasi dan pelaporan lingkup program, data dan informasi.', 'pelaksanaan administrasi lingkup program, data dan informasi.', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ]
                ]
            ],

            'cipta-karya' => [
                'title' => 'Bidang Cipta Karya',
                'hero_desc' => 'Bertanggung jawab atas penataan Bangunan Gedung dan arsitektur kota, teknik Bangunan Gedung, serta kelaikan Bangunan Gedung di Kota Bandung.',
                'hero_img' => 'images/bidang-cipta-karya.jpg',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'building-office-2', 'title' => 'Koordinasi Perumusan Kebijakan',         'desc' => 'Pengoordinasian perumusan kebijakan lingkup cipta karya.'],
                    ['color' => 'green',  'icon' => 'clipboard-check',   'title' => 'Koordinasi Pelaksanaan Kebijakan', 'desc' => 'Pengoordinasian pelaksanaan kebijakan teknis dan non teknis lingkup cipta karya.'],
                    ['color' => 'orange', 'icon' => 'clipboard-check',  'title' => 'Koordinasi Evaluasi dan Pelaporan',                 'desc' => 'Pengoordinasian pelaksanaan evaluasi dan pelaporan lingkup cipta karya.'],
                    ['color' => 'orange', 'icon' => 'clipboard-check',  'title' => 'Koordinasi Administrasi',                 'desc' => 'Pengoordinasian pelaksanaan administrasi lingkup cipta karya.'],
                    ['color' => 'orange', 'icon' => 'clipboard-check',  'title' => 'Fungsi Lainnya',                 'desc' => 'Pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.'],
                ],
                'struktur_desc' => 'Bidang Cipta Karya menjalankan fungsinya melalui pilar penataan, perizinan, dan kelaikan bangunan yang bekerja sinergis untuk mewujudkan tata bangunan kota yang aman dan tertib.',
                'struktur' => [
                    [
                        'icon' => 'construct',
                        'title' => 'Seksi Penataan Bangunan Gedung dan Arsitektur Kota',
                        'items' => ['penyusunan bahan kebijakan lingkup penataan Bangunan Gedung dan arsitektur kota.', 'pelaksanaan teknis kebijakan lingkup penataan Bangunan Gedung dan arsitektur kota.', 'pelaksanaan evaluasi dan pelaporan lingkup penataan Bangunan Gedung dan arsitektur kota.', 'pelaksanaan administrasi dinas lingkup penataan Bangunan Gedung dan arsitektur kota', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya']
                    ],
                    [
                        'icon' => 'construct',
                        'title' => 'Seksi Teknik Bangunan Gedung',
                        'items' => ['penyusunan bahan kebijakan lingkup teknik Bangunan Gedung.', 'pelaksanaan teknis kebijakan lingkup teknik Bangunan Gedung.', 'pelaksanaan evaluasi dan pelaporan lingkup teknik Bangunan Gedung.', 'pelaksanaan administrasi Dinas lingkup teknik Bangunan Gedung', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya']
                    ],
                    [
                        'icon' => 'information-circle',
                        'title' => 'Seksi Kelaikan Bangunan Gedung',
                        'items' => ['penyusunan bahan kebijakan lingkup kelaikan Bangunan Gedung.', 'pelaksanaan teknis kebijakan lingkup kelaikan Bangunan Gedung.', 'pelaksanaan evaluasi dan pelaporan lingkup kelaikan Bangunan Gedung.', 'pelaksanaan administrasi Dinas lingkup kelaikan Bangunan Gedung', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ],
                ]
            ],

            'bina-konstruksi' => [
                'title' => 'Bidang Bina Konstruksi dan Bangunan Gedung Negara',
                'hero_desc' => 'Berperan strategis dalam pembinaan jasa konstruksi, perencanaan, serta pengawasan pembangunan Bangunan Gedung Nagara di Kota Bandung.',
                'hero_img' => 'images/bina-konstruksi.jpeg',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'building-office',  'title' => 'Koordinasi Perumusan Kebijakan',  'desc' => 'Pengoordinasian perumusan kebijakan lingkup bina konstruksi dan Bangunan Gedung negara.'],
                    ['color' => 'green',  'icon' => 'academic-cap',     'title' => 'Koordinasi Pelaksanaan Kebijakan', 'desc' => 'Pengoordinasian pelaksanaan kebijakan lingkup bina konstruksi dan Bangunan Gedung negara.'],
                    ['color' => 'orange', 'icon' => 'eye',              'title' => 'Koordinasi Evaluasi dan Pelaporan','desc' => 'Pengoordinasian pelaksanaan evaluasi dan pelaporan lingkup bina konstruksi dan Bangunan Gedung negara.'],
                    ['color' => 'orange', 'icon' => 'eye',              'title' => 'Koordinasi Administrasi','desc' => 'Pengoordinasian pelaksanaan administrasi lingkup bina konstruksi dan Bangunan Gedung negara.'],
                    ['color' => 'orange', 'icon' => 'eye',              'title' => 'Fungsi Lainnya','desc' => 'Pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.'],
                ],
                'struktur_desc' => 'Bidang Bina Konstruksi dan Bangunan Gedung Negara menjalankan fungsinya melalui pembinaan jasa konstruksi dan pengawasan teknis yang bekerja sinergis untuk menjamin mutu infrastruktur pemerintah.',
                'struktur' => [
                    [
                        'icon' => 'protect',
                        'title' => 'Seksi Bina Konstruksi',
                        'items' => ['penyusunan bahan kebijakan lingkup bina konstruksi.', 'pelaksanaan teknis kebijakan lingkup bina konstruksi.', 'pelaksanaan evaluasi dan pelaporan lingkup bina konstruksi.', 'pelaksanaan administrasi Dinas lingkup bina konstruksi.', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ],
                    [
                        'icon' => 'tools',
                        'title' => 'Seksi Perencanaan Bangunan Gedung Negara',
                        'items' => ['penyusunan bahan kebijakan lingkup perencanaan Bangunan Gedung Negara.', 'pelaksanaan teknis kebijakan lingkup perencanaan Bangunan Gedung Negara.', 'pelaksanaan evaluasi dan pelaporan lingkup perencanaan Bangunan Gedung Negara.', 'pelaksanaan administrasi Dinas lingkup perencanaan Bangunan Gedung Negara.', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ],
                    [
                        'icon' => 'tools',
                        'title' => 'Seksi Pengawasan Pembangunan Bangunan Gedung Negara',
                        'items' => ['penyusunan bahan kebijakan lingkup pengawasan pembangunan Bangunan Gedung Negara.', 'pelaksanaan teknis kebijakan lingkup pengawasan pembangunan Bangunan Gedung Negara.', 'pelaksanaan evaluasi dan pelaporan lingkup pengawasan pembangunan Bangunan Gedung Negara.', 'pelaksanaan administrasi Dinas lingkup pengawasan pembangunan Bangunan Gedung Negara.', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ]
                ]
            ],

            'tata-ruang' => [
                'title' => 'Bidang Tata Ruang',
                'hero_desc' => 'Mengemban peran strategis dalam perencanaan, pengukuran dan pemetaan, serta pengembangan tata ruang wilayah Kota Bandung secara berkelanjutan.',
                'hero_img' => 'images/tata-ruang.jpeg',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'map',             'title' => 'Koordinasi Perumusan Kebijakan',      'desc' => 'Pengoordinasian perumusan kebijakan lingkup tata ruang.'],
                    ['color' => 'green',  'icon' => 'squares-2x2',    'title' => 'Koordinasi Pelaksanaan Kebijakan', 'desc' => 'Pengoordinasian pelaksanaan kebijakan lingkup tata ruang.'],
                    ['color' => 'orange', 'icon' => 'document-check', 'title' => 'Koordinasi Evaluasi dan Pelaporan',    'desc' => 'Pengoordinasian evaluasi dan pelaporan lingkup tata ruang.'],
                    ['color' => 'orange', 'icon' => 'document-check', 'title' => 'Koordinasi Administrasi',    'desc' => 'Pengoordinasian administrasi lingkup tata ruang.'],
                    ['color' => 'orange', 'icon' => 'document-check', 'title' => 'Fungsi Lainnya',    'desc' => 'Pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.'],
                ],
                'struktur_desc' => 'Bidang Tata Ruang menjalankan fungsinya melalui pemetaan spasial dan penyusunan regulasi yang bekerja sinergis untuk mewujudkan perencanaan ruang kota yang terstruktur dan berkelanjutan.',
                'struktur' => [
                    [
                        'icon' => 'map',
                        'title' => 'Seksi Survei, Pengukuran dan Pemetaan',
                        'items' => ['penyusunan bahan kebijakan lingkup survei, pengukuran dan pemetaan.', 'pelaksanaan teknis kebijakan lingkup survei, pengukuran dan pemetaan.', 'pelaksanaan evaluasi dan pelaporan lingkup survei, pengukuran dan pemetaan.', 'pelaksanaan administrasi dinas lingkup survei, pengukuran dan pemetaan.', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ],
                    [
                        'icon' => 'checknote',
                        'title' => 'Seksi Perencanaan dan Pengembangan Tata Ruang',
                        'items' => ['penyusunan bahan kebijakan lingkup perencanaan dan pengembangan tata ruang.', 'pelaksanaan teknis kebijakan lingkup perencanaan dan pengembangan tata ruang.', 'pelaksanaan evaluasi dan pelaporan lingkup perencanaan dan pengembangan tata ruang.', 'pelaksanaan administrasi dinas lingkup perencanaan dan pengembangan tata ruang.', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ],
                    [
                        'icon' => 'compas',
                        'title' => 'Seksi Perencanaan Prasarana Kota',
                        'items' => ['penyusunan bahan kebijakan lingkup perencanaan prasarana kota.', 'pelaksanaan teknis kebijakan lingkup perencanaan prasarana kota.', 'pelaksanaan evaluasi dan pelaporan lingkup perencanaan prasarana kota.', 'pelaksanaan administrasi dinas lingkup perencanaan prasarana kota.', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ]
                ]
            ],

            'pengawasan' => [
                'title' => 'Bidang Pengawasan dan Pengendalian Pemanfaatan Ruang dan Bangunan Gedung',
                'hero_desc' => 'Melaksanakan pengawasan, pengendalian, dan penertiban terhadap pemanfaatan ruang serta penyelenggaraan bangunan gedung agar sesuai regulasi.',
                'hero_img' => 'images/wasdal.jpeg',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'megaphone',       'title' => 'Koordinasi Perumusan Kebijakan',    'desc' => 'Pengoordinasian perumusan kebijakan lingkup pengawasan dan pengendalian pemanfaatan ruang dan Bangunan Gedung.'],
                    ['color' => 'green',  'icon' => 'shield-check',    'title' => 'Koordinasi Pelaksanaan Kebijakan',   'desc' => 'Pengoordinasian pelaksanaan kebijakan lingkup pengawasan dan pengendalian pemanfaatan ruang dan Bangunan Gedung.'],
                    ['color' => 'orange', 'icon' => 'chat-bubble-left-right', 'title' => 'Koordinasi Evaluasi dan Pelaporan', 'desc' => 'Pengoordinasian evaluasi dan pelaporan lingkup pengawasan dan pengendalian pemanfaatan ruang dan Bangunan Gedung.'],
                    ['color' => 'orange', 'icon' => 'chat-bubble-left-right', 'title' => 'Koordinasi Administrasi', 'desc' => 'Pengoordinasian administrasi dinas lingkup pengawasan dan pengendalian pemanfaatan ruang dan Bangunan Gedung.'],
                    ['color' => 'orange', 'icon' => 'chat-bubble-left-right', 'title' => 'Fungsi Lainnya', 'desc' => 'Pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.'],
                ],
                'struktur_desc' => 'Bidang Bina Konstruksi dan Bangunan Gedung Negara menjalankan fungsinya melalui pembinaan jasa konstruksi dan pengawasan teknis yang bekerja sinergis untuk menjamin mutu infrastruktur pemerintah.',
                'struktur' => [
                    [
                        'icon' => 'eye',
                        'title' => 'Seksi Pengawasan Pemanfaatan Ruang dan Bangunan Gedung',
                        'items' => ['penyusunan bahan kebijakan lingkup pengawasan dan pengendalian pemanfaatan ruang dan bangunan gedung.', 'pelaksanaan teknis kebijakan lingkup pengawasan dan pengendalian pemanfaatan ruang dan bangunan gedung.', 'pelaksanaan evaluasi dan pelaporan lingkup pengawasan dan pengendalian pemanfaatan ruang dan bangunan gedung.', 'pelaksanaan administrasi dinas lingkup pengawasan dan pengendalian pemanfaatan ruang dan bangunan gedung.', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ],
                    [
                        'icon' => 'hammer',
                        'title' => 'Seksi Penertiban Pelanggaran Pemanfaatan Ruang dan Bangunan Gedung',
                        'items' => ['penyusunan bahan kebijakan lingkup penertiban dan penegakan hukum.', 'pelaksanaan teknis kebijakan lingkup penertiban dan penegakan hukum.', 'pelaksanaan evaluasi dan pelaporan lingkup penertiban dan penegakan hukum.', 'pelaksanaan administrasi dinas lingkup penertiban dan penegakan hukum.', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ],
                    [
                        'icon' => 'hammer',
                        'title' => 'Seksi Dokumentasi, Penanganan Pengaduan dan Sengketa',
                        'items' => ['penyusunan bahan kebijakan lingkup pengawasan dan pengendalian pemanfaatan ruang dan bangunan gedung.', 'pelaksanaan teknis kebijakan lingkup pengawasan dan pengendalian pemanfaatan ruang dan bangunan gedung.', 'pelaksanaan evaluasi dan pelaporan lingkup pengawasan dan pengendalian pemanfaatan ruang dan bangunan gedung.', 'pelaksanaan administrasi dinas lingkup pengawasan dan pengendalian pemanfaatan ruang dan bangunan gedung.', 'pelaksanaan fungsi lain yang diberikan oleh atasan terkait dengan tugas dan fungsinya.']
                    ]
                ]
            ],

            'uptd-pemakaman' => [
                'title' => 'UPTD Pengelolaan Pemakaman',
                'hero_desc' => 'Menyelenggarakan pelayanan teknis operasional, penataan, kebersihan, dan pemeliharaan ruang terbuka hijau (RTH) publik pemakaman.',
                'hero_img' => 'images/UPTD.jpg',
                'tugas' => [
                    ['color' => 'blue',   'icon' => 'note',      'title' => 'Penyusunan Rencana & Teknis',    'desc' => 'Penyusunan rencana dan teknis operasional pengelolaan pemakaman'],
                    ['color' => 'green',  'icon' => 'leaf',       'title' => 'Pemeliharaan RTH',    'desc' => 'Pelaksanaan operasional penataan pengelolaan pemakaman yang meliputi pengelolaan, pemeliharaan pengendalian ketertiban, keindahan dan kebersihan di kawasan pemakaman'],
                    ['color' => 'orange', 'icon' => 'device-phone-mobile', 'title' => 'Ketatausahaan',   'desc' => 'Pelaksanaan ketatausahaan UPT'],
                    ['color' => 'orange', 'icon' => 'device-phone-mobile', 'title' => 'Penertiban & Pengawasan',   'desc' => 'Pelaksanaan pengawasan, pengendalian, evaluasi dan pelaporan kegiatan pengelolaan pemakaman']
                ]
            ],
        ];
    }
}

