<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'title'       => 'Gedung Perkantoran Wisma Citra',
                'description' => 'Pembangunan gedung perkantoran 8 lantai di kawasan bisnis Jakarta Selatan. Proyek ini menggunakan sistem konstruksi baja modern dengan memperhatikan efisiensi energi dan kenyamanan penghuni.',
                'client'      => 'PT Citra Mandiri Group',
                'category'    => 'Konstruksi Komersial',
                'year'        => 2024,
                'is_featured' => true,
                'is_active'   => true,
                'order'       => 1,
            ],
            [
                'title'       => 'Perumahan Grand Residence Bogor',
                'description' => 'Pengembangan kompleks perumahan mewah sebanyak 120 unit di kawasan Bogor Barat. Dilengkapi dengan fasilitas kolam renang, taman bermain, dan sistem keamanan 24 jam.',
                'client'      => 'CV Griya Nusantara',
                'category'    => 'Perumahan',
                'year'        => 2024,
                'is_featured' => true,
                'is_active'   => true,
                'order'       => 2,
            ],
            [
                'title'       => 'Renovasi Hotel Bintang Lima Bandung',
                'description' => 'Proyek renovasi total hotel bintang lima seluas 5.000 m² mencakup lobby, kamar tamu, restoran, dan area kolam renang. Desain kontemporer dengan sentuhan budaya lokal Sunda.',
                'client'      => 'PT Megah Hospitality',
                'category'    => 'Renovasi',
                'year'        => 2023,
                'is_featured' => true,
                'is_active'   => true,
                'order'       => 3,
            ],
            [
                'title'       => 'Desain Interior Kantor Startup TechHub',
                'description' => 'Penataan ulang interior kantor modern seluas 2.000 m² dengan konsep open-space dan collaborative workspace. Menggunakan material ramah lingkungan dan pencahayaan alami yang optimal.',
                'client'      => 'TechHub Indonesia',
                'category'    => 'Desain Interior',
                'year'        => 2023,
                'is_featured' => false,
                'is_active'   => true,
                'order'       => 4,
            ],
            [
                'title'       => 'Jembatan Akses Kawasan Industri Karawang',
                'description' => 'Pembangunan jembatan beton bertulang sepanjang 80 meter sebagai akses utama kawasan industri. Dirancang untuk menampung beban kendaraan berat hingga 40 ton.',
                'client'      => 'Pemerintah Daerah Karawang',
                'category'    => 'Infrastruktur',
                'year'        => 2023,
                'is_featured' => true,
                'is_active'   => true,
                'order'       => 5,
            ],
            [
                'title'       => 'Pusat Perbelanjaan Raya Mall Depok',
                'description' => 'Konstruksi pusat perbelanjaan 4 lantai seluas 25.000 m² dengan kapasitas 200 tenant. Dilengkapi sistem pendingin sentral, parkir otomatis, dan tata cahaya yang modern.',
                'client'      => 'PT Raya Property Development',
                'category'    => 'Konstruksi Komersial',
                'year'        => 2022,
                'is_featured' => false,
                'is_active'   => true,
                'order'       => 6,
            ],
        ];

        foreach ($portfolios as $data) {
            $data['slug'] = Str::slug($data['title']);
            Portfolio::firstOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
