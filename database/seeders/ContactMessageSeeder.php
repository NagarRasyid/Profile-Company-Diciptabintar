<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name'     => 'Hendra Wijaya',
                'email'    => 'hendra.w@example.com',
                'phone'    => '081234567890',
                'subject'  => 'Konsultasi Pembangunan Rumah',
                'message'  => 'Selamat siang, saya ingin berkonsultasi mengenai rencana pembangunan rumah tinggal 2 lantai di lahan seluas 200 m². Mohon informasi mengenai estimasi biaya dan proses pengerjaan. Terima kasih.',
                'is_read'  => true,
                'read_at'  => now()->subDays(2),
            ],
            [
                'name'     => 'Siti Aminah',
                'email'    => 'siti.aminah@example.com',
                'phone'    => '082345678901',
                'subject'  => 'Permintaan Penawaran Renovasi Kantor',
                'message'  => 'Kami dari PT Maju Bersama ingin meminta penawaran harga untuk renovasi kantor seluas 500 m² yang berlokasi di Jakarta Pusat. Apakah bisa dijadwalkan untuk survei lokasi minggu ini?',
                'is_read'  => true,
                'read_at'  => now()->subDay(),
            ],
            [
                'name'     => 'Bapak Darmawan',
                'email'    => 'darmawan.jkt@example.com',
                'phone'    => '083456789012',
                'subject'  => 'Proyek Ruko 3 Lantai',
                'message'  => 'Saya ingin mendiskusikan proyek pembangunan ruko 3 lantai di kawasan Bekasi. Kami membutuhkan kontraktor yang berpengalaman dan dapat dipercaya. Bisa kita jadwalkan pertemuan?',
                'is_read'  => false,
                'read_at'  => null,
            ],
            [
                'name'     => 'Rina Susanti',
                'email'    => 'rina.s@example.com',
                'phone'    => null,
                'subject'  => 'Permintaan Informasi Desain Interior',
                'message'  => 'Halo, saya tertarik dengan layanan desain interior yang ditawarkan. Bisa bantu saya untuk desain ruang tamu dan kamar tidur utama? Mohon informasi lebih lanjut dan portofolio desain yang tersedia.',
                'is_read'  => false,
                'read_at'  => null,
            ],
            [
                'name'     => 'Agus Prasetyo',
                'email'    => 'agus.p@example.com',
                'phone'    => '085678901234',
                'subject'  => 'Kerjasama Proyek Pemerintah',
                'message'  => 'Kami dari Dinas Pekerjaan Umum Kabupaten Bekasi ingin menjajaki kemungkinan kerjasama untuk proyek infrastruktur tahun anggaran 2026. Mohon mengirimkan company profile dan pengalaman proyek yang relevan.',
                'is_read'  => false,
                'read_at'  => null,
            ],
        ];

        foreach ($messages as $data) {
            ContactMessage::create($data);
        }
    }
}
