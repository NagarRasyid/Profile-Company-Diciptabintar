<?php

namespace Database\Seeders;

use App\Models\NewsArticle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title'        => 'Diciptabintar Berhasil Selesaikan Proyek Gedung Wisma Citra Tepat Waktu',
                'excerpt'      => 'Proyek pembangunan gedung perkantoran 8 lantai Wisma Citra di Jakarta Selatan resmi diselesaikan sesuai jadwal yang telah disepakati, menjadi bukti komitmen kami terhadap ketepatan waktu.',
                'content'      => '<p>PT Diciptabintar dengan bangga mengumumkan keberhasilan penyelesaian proyek pembangunan Gedung Perkantoran Wisma Citra yang berlokasi di kawasan bisnis Jakarta Selatan. Proyek senilai Rp 48 miliar ini diselesaikan tepat waktu tanpa mengorbankan kualitas dan standar keselamatan kerja.</p><p>Direktur Utama PT Diciptabintar, Ir. Budi Santoso, M.T., menyampaikan rasa syukurnya atas pencapaian ini. "Keberhasilan ini adalah bukti nyata dari dedikasi seluruh tim kami yang bekerja keras setiap hari. Kepercayaan klien adalah amanah yang kami jaga dengan sepenuh hati," ujarnya dalam acara serah terima proyek.</p><p>Gedung 8 lantai ini dibangun menggunakan sistem konstruksi baja modern dengan memperhatikan efisiensi energi dan kenyamanan penghuni. Dilengkapi dengan sistem HVAC terpusat, lift modern, dan area parkir basement 3 lantai.</p>',
                'author'       => 'Tim Redaksi Diciptabintar',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title'        => 'Tips Memilih Kontraktor Bangunan yang Terpercaya',
                'excerpt'      => 'Memilih kontraktor yang tepat adalah langkah krusial dalam setiap proyek konstruksi. Berikut panduan praktis agar Anda tidak salah pilih dan proyek berjalan lancar.',
                'content'      => '<p>Membangun atau merenovasi properti adalah investasi besar yang membutuhkan perencanaan matang, termasuk dalam memilih kontraktor yang tepat. Berikut beberapa tips yang perlu Anda perhatikan sebelum menandatangani kontrak.</p><h3>1. Periksa Legalitas Perusahaan</h3><p>Pastikan kontraktor yang Anda pilih memiliki badan hukum yang sah, SIUP konstruksi, dan terdaftar di asosiasi kontraktor resmi seperti Gapensi atau Gapeksindo.</p><h3>2. Evaluasi Portofolio dan Pengalaman</h3><p>Minta kontraktor untuk menunjukkan portofolio proyek sebelumnya yang sejenis dengan kebutuhan Anda. Kunjungi langsung beberapa lokasi proyek jika memungkinkan.</p><h3>3. Transparansi Anggaran</h3><p>Kontraktor terpercaya akan memberikan RAB (Rencana Anggaran Biaya) yang rinci dan transparan, bukan sekadar angka global tanpa rincian.</p><h3>4. Perjanjian Tertulis</h3><p>Selalu buat perjanjian atau kontrak kerja secara tertulis yang mencakup ruang lingkup pekerjaan, timeline, pembayaran, dan sanksi keterlambatan.</p>',
                'author'       => 'Ir. Budi Santoso, M.T.',
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title'        => 'Tren Desain Interior 2025: Minimalis Modern yang Hangat',
                'excerpt'      => 'Dunia desain interior di tahun 2025 didominasi oleh konsep minimalis modern yang mengedepankan kehangatan dan kenyamanan. Pelajari tren terkini yang patut Anda terapkan.',
                'content'      => '<p>Tren desain interior terus berkembang setiap tahunnya. Di tahun 2025, perpaduan antara minimalisme dan elemen-elemen hangat alami menjadi pilihan utama para pemilik hunian modern.</p><h3>Material Alami Semakin Populer</h3><p>Penggunaan kayu alami, batu alam, dan tanaman dalam ruangan semakin diminati. Material ini memberikan nuansa hangat sekaligus tetap terlihat bersih dan modern.</p><h3>Palet Warna Earthy Tones</h3><p>Warna-warna terinspirasi alam seperti terracotta, sage green, warm beige, dan dusty rose mendominasi pilihan cat dinding dan furnitur di tahun ini.</p><h3>Multi-functional Space</h3><p>Dengan meningkatnya tren bekerja dari rumah, ruangan yang bisa berfungsi ganda seperti home office sekaligus ruang tamu menjadi solusi yang sangat diminati.</p>',
                'author'       => 'Sari Indrawati, S.Ars.',
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
            [
                'title'        => 'Diciptabintar Raih Penghargaan Kontraktor Terbaik 2024',
                'excerpt'      => 'Kami dengan bangga mengumumkan bahwa PT Diciptabintar berhasil meraih penghargaan sebagai Kontraktor Terbaik 2024 dari Asosiasi Kontraktor Indonesia.',
                'content'      => '<p>Sebuah pencapaian membanggakan kembali diraih oleh PT Diciptabintar. Pada Malam Penghargaan Industri Konstruksi Indonesia 2024 yang diselenggarakan di Jakarta Convention Center, perusahaan kami berhasil meraih penghargaan bergengsi sebagai Kontraktor Terbaik Kategori Menengah 2024.</p><p>Penghargaan ini merupakan pengakuan atas konsistensi kami dalam menghadirkan proyek-proyek berkualitas tinggi, tepat waktu, dan mengutamakan keselamatan kerja sepanjang tahun 2024.</p><p>"Penghargaan ini adalah milik seluruh tim Diciptabintar dan para klien yang telah mempercayai kami. Ini semakin memotivasi kami untuk terus meningkatkan standar layanan," ujar Direktur Utama, Ir. Budi Santoso.</p>',
                'author'       => 'Tim Redaksi Diciptabintar',
                'is_published' => true,
                'published_at' => now()->subDays(35),
            ],
            [
                'title'        => 'Mengenal Teknologi BIM dalam Dunia Konstruksi Modern',
                'excerpt'      => 'Building Information Modeling (BIM) adalah revolusi teknologi dalam industri konstruksi. Simak bagaimana Diciptabintar mengadopsi teknologi ini untuk meningkatkan efisiensi proyek.',
                'content'      => '<p>Building Information Modeling (BIM) adalah teknologi manajemen proyek konstruksi berbasis 3D yang saat ini semakin banyak diadopsi oleh perusahaan konstruksi modern di seluruh dunia, termasuk Indonesia.</p><p>PT Diciptabintar telah mengimplementasikan teknologi BIM sejak tahun 2022 dalam berbagai proyek skala menengah dan besar. Hasilnya signifikan: tingkat kesalahan desain berkurang 40%, efisiensi koordinasi antar tim meningkat 60%, dan waste material berkurang secara substansial.</p><h3>Apa Itu BIM?</h3><p>BIM bukan sekadar software 3D biasa. Ini adalah proses kerja kolaboratif yang memungkinkan semua pihak yang terlibat dalam proyek—arsitek, insinyur struktur, MEP engineer, kontraktor—bekerja dalam satu model digital terintegrasi.</p>',
                'author'       => 'Rendra Pratama, S.T.',
                'is_published' => true,
                'published_at' => now()->subDays(45),
            ],
            [
                'title'        => 'Proyek Grand Residence Bogor Resmi Dimulai',
                'excerpt'      => 'Peletakan batu pertama proyek perumahan Grand Residence Bogor secara resmi menandai dimulainya pembangunan 120 unit rumah mewah di kawasan Bogor Barat.',
                'content'      => '<p>Prosesi peletakan batu pertama (groundbreaking) proyek perumahan Grand Residence Bogor resmi digelar pada hari ini. Acara yang dihadiri oleh jajaran direksi PT Diciptabintar, perwakilan dari CV Griya Nusantara selaku developer, dan undangan VIP ini menandai dimulainya pembangunan 120 unit rumah mewah di kawasan Bogor Barat.</p><p>Proyek senilai Rp 85 miliar ini ditargetkan selesai dalam 18 bulan ke depan. Grand Residence Bogor akan menjadi kompleks perumahan premium yang dilengkapi dengan berbagai fasilitas modern seperti kolam renang olimpik, clubhouse, pusat kebugaran, dan area bermain anak.</p>',
                'author'       => 'Tim Redaksi Diciptabintar',
                'is_published' => false,
                'published_at' => now()->addDays(2),
            ],
        ];

        foreach ($articles as $data) {
            $data['slug'] = Str::slug($data['title']);
            NewsArticle::firstOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
