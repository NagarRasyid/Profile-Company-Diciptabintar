<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title'       => 'Jasa Konstruksi',
                'description' => 'Kami menyediakan layanan konstruksi bangunan berkualitas tinggi, mulai dari perencanaan hingga penyelesaian proyek. Tim kami berpengalaman dalam menangani berbagai skala proyek, baik residensial maupun komersial.',
                'icon'        => 'fas fa-hard-hat',
                'is_active'   => true,
                'order'       => 1,
            ],
            [
                'title'       => 'Desain Interior',
                'description' => 'Layanan desain interior profesional yang mengutamakan estetika, kenyamanan, dan fungsionalitas ruang. Kami bekerja sama dengan klien untuk mewujudkan konsep ruangan yang ideal.',
                'icon'        => 'fas fa-couch',
                'is_active'   => true,
                'order'       => 2,
            ],
            [
                'title'       => 'Manajemen Proyek',
                'description' => 'Layanan manajemen proyek yang terstruktur untuk memastikan setiap tahapan pekerjaan berjalan tepat waktu, sesuai anggaran, dan memenuhi standar kualitas yang telah disepakati.',
                'icon'        => 'fas fa-tasks',
                'is_active'   => true,
                'order'       => 3,
            ],
            [
                'title'       => 'Renovasi Bangunan',
                'description' => 'Layanan renovasi dan pemugaran bangunan untuk memperbarui tampilan dan fungsi properti Anda. Kami menangani renovasi parsial maupun total dengan hasil yang memuaskan.',
                'icon'        => 'fas fa-tools',
                'is_active'   => true,
                'order'       => 4,
            ],
            [
                'title'       => 'Konsultasi Teknik',
                'description' => 'Konsultasi teknik dan struktur bangunan oleh tim insinyur berpengalaman. Kami memberikan solusi teknis yang tepat dan efisien untuk setiap tantangan konstruksi yang Anda hadapi.',
                'icon'        => 'fas fa-drafting-compass',
                'is_active'   => true,
                'order'       => 5,
            ],
            [
                'title'       => 'Pengawasan Konstruksi',
                'description' => 'Layanan pengawasan konstruksi untuk memastikan pekerjaan dilakukan sesuai spesifikasi teknis, standar keamanan, dan ketentuan yang berlaku selama proses pembangunan berlangsung.',
                'icon'        => 'fas fa-eye',
                'is_active'   => true,
                'order'       => 6,
            ],
        ];

        foreach ($services as $data) {
            $data['slug'] = Str::slug($data['title']);
            Service::firstOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
