<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name'      => 'Ir. Budi Santoso, M.T.',
                'position'  => 'Kepala Dinas',
                'bio'       => 'Memiliki pengalaman lebih dari 25 tahun di industri konstruksi dan properti Indonesia. Lulusan Teknik Sipil ITB dengan gelar Master dari Universitas Indonesia. Memimpin lebih dari 150 proyek skala besar secara nasional.',
                'is_active' => true,
                'order'     => 1,
            ],
            [
                'name'      => 'Dewi Rahayu, S.T., M.Sc.',
                'position'  => 'Kepala Bidang Pemasaran',
                'bio'       => 'Ahli struktur bangunan bersertifikat dengan keahlian khusus di bidang konstruksi gedung tinggi dan jembatan. Berpengalaman 18 tahun dengan rekam jejak proyek infrastruktur senilai lebih dari Rp 500 miliar.',
                'is_active' => true,
                'order'     => 2,
            ],
            [
                'name'      => 'Ahmad Fauzi, S.E., M.M.',
                'position'  => 'Kepala Bidang Bina Marga',
                'bio'       => 'Profesional keuangan berpengalaman 15 tahun di sektor konstruksi dan properti. Mengelola portofolio keuangan perusahaan dengan total aset lebih dari Rp 2 triliun secara efisien dan transparan.',
                'is_active' => true,
                'order'     => 3,
            ],
            [
                'name'      => 'Sari Indrawati, S.Ars.',
                'position'  => 'Kepala Divisi Desain',
                'bio'       => 'Arsitek muda berbakat dengan spesialisasi desain interior dan eksterior modern. Alumni Arsitektur Universitas Gadjah Mada dengan portofolio desain yang telah mendapatkan penghargaan tingkat nasional.',
                'is_active' => true,
                'order'     => 4,
            ],
            [
                'name'      => 'Rendra Pratama, S.T.',
                'position'  => 'Manajer Proyek Senior',
                'bio'       => 'Manajer proyek bersertifikat PMP dengan pengalaman 12 tahun mengelola proyek konstruksi skala menengah dan besar. Ahli dalam penerapan metode manajemen proyek modern dan teknologi BIM.',
                'is_active' => true,
                'order'     => 5,
            ],
            [
                'name'      => 'Maya Kusuma, S.T., M.T.',
                'position'  => 'Kepala Pengawas Lapangan',
                'bio'       => 'Insinyur lapangan berpengalaman 10 tahun yang memastikan setiap proyek dilaksanakan sesuai spesifikasi, tepat waktu, dan memenuhi standar keselamatan kerja K3 yang ketat.',
                'is_active' => true,
                'order'     => 6,
            ],
        ];

        foreach ($members as $data) {
            TeamMember::firstOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}
