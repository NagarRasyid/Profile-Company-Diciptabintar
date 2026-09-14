<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananPublikSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->truncate();
        $now = now();
        $services = [

            //KRK
            ['title'=>'KRK New',
            'slug'=>'krk-new',
            'description'=>'Layanan permohonan Keterangan Rencana Kota.',
            'icon'=>'<svg width="16" height="20" viewBox="0 0 16 20" fill="none"><path d="M4 16H12V14H4V16ZM2 20C1.45 20 .98 19.8 .59 19.4C.2 19 0 18.55 0 18V2C0 1.45 .2 .98 .59 .59C.98 .2 1.45 0 2 0H10L16 6V18C16 18.55 15.8 19.02 15.41 19.41C15.02 19.8 14.55 20 14 20H2ZM9 7H14L9 2V7Z" fill="#003D6A"/></svg>',
            'color'=>'blue',
            'jumlah_permohonan'=>2411,
            'is_active'=>1,
            'order'=>1,
            'created_at'=>$now,
            'updated_at'=>$now],

            //PBG
            ['title'=>'Permohonan PBG',
            'slug'=>'permohonan-pbg',
            'description'=>'Layanan Permohonan Persetujuan Bangunan Gedung (PBG) untuk Bangunan Umum.',
            'icon'=>'<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M0 18V4H4V0H14V8H18V18H10V14H8V18H0ZM2 16H4V14H2V16ZM2 8H4V6H2V8ZM6 4H8V2H6V4ZM10 4H12V2H10V4ZM14 16H16V14H14V16Z" fill="#42474F"/></svg>',
            'color'=>'gray',
            'jumlah_permohonan'=>8,
            'is_active'=>1,
            'order'=>2,
            'created_at'=>$now,
            'updated_at'=>$now],
            
            //Tata Ruang
            ['title'=>'Informasi Rencana Kota',
            'slug'=>'informasi-rencana-kota',
            'description'=>'Penyediaan Data Rencana Tata Ruang Kota.',
            'icon'=>'<svg width="18" height="19" viewBox="0 0 18 19" fill="none"><path d="M0 19V5H6V3L9 0L12 3V9H18V19H0ZM2 17H4V15H2V17ZM8 17H10V15H8V17ZM8 5H10V3H8V5ZM14 17H16V15H14V17Z" fill="#003D6A"/></svg>',
            'color'=>'blue',
            'jumlah_permohonan'=>360,
            'is_active'=>1,
            'order'=>3,
            'created_at'=>$now,
            'updated_at'=>$now],
            
            //KRK MBR
            ['title'=>'KRK MBR',
            'slug'=>'krk-mbr',
            'description'=>'Keterangan Rencana Kota Khusus untuk Hunian Masyarakat Berpenghasilan Rendah (MBR).',
            'icon'=>'<svg width="22" height="18" viewBox="0 0 22 18" fill="none"><path d="M4 18V14H2V12H4V7.85L1.2 10L0 8.4L11 0L22 8.4L20.8 10L18 7.85V12H20V14H18V18H16V14H12V18H10V14H6V18H4ZM6 12H10V3.3L6 6.3V12ZM12 12H16V6.3L12 3.3V12Z" fill="#456E00"/></svg>',
            'color'=>'green',
            'jumlah_permohonan'=>35,
            'is_active'=>1,
            'order'=>4,
            'created_at'=>$now,
            'updated_at'=>$now],
            
            //PBG MBR
            ['title'=>'PBG MBR',
            'slug'=>'pbg-mbr',
            'description'=>'Persetujuan Bangunan Gedung Khusus untuk Masyarakat Berpenghasilan Rendah (MBR).',
            'icon'=>'<svg width="16" height="18" viewBox="0 0 16 18" fill="none"><path d="M0 18V6L8 0L16 6V18H10V11H6V18H0Z" fill="#003D6A"/></svg>',
            'color'=>'teal',
            'jumlah_permohonan'=>0,
            'is_active'=>1,
            'order'=>5,
            'created_at'=>$now,
            'updated_at'=>$now],
            
            //Pemakaman Baru
            ['title'=>'Pemakaman Baru',
            'slug'=>'pemakaman-baru',
            'description'=>'Layanan Permohonan Lahan Pemakaman Baru.',
            'icon'=>'<svg width="20" height="21" viewBox="0 0 20 21" fill="none"><path d="M0 21V13L4 11.2V8L9 5.5V4H7V2H9V0H11V2H13V4H11V5.5L16 8V11.2L20 13V21H12V18C12 17.45 11.8 16.98 11.41 16.59C11.02 16.2 10.55 16 10 16C9.45 16 8.98 16.2 8.59 16.59C8.2 16.98 8 17.45 8 18V21H0Z" fill="#456E00"/></svg>',
            'color'=>'green',
            'jumlah_permohonan'=>6737,
            'is_active'=>1,
            'order'=>6,
            'created_at'=>$now,
            'updated_at'=>$now],
            
            //Pemakaman Tumpang
            ['title'=>'Pemakaman Tumpang',
            'slug'=>'pemakaman-tumpang',
            'description'=>'Layanan Permohonan Pemakaman Tumpang.',
            'icon'=>'<svg width="18" height="20" viewBox="0 0 18 20" fill="none"><path d="M9 19.05L0 12.05L1.65 10.8L9 16.5L16.35 10.8L18 12.05L9 19.05ZM9 14L0 7L9 0L18 7L9 14Z" fill="#370E00"/></svg>',
            'color'=>'orange',
            'jumlah_permohonan'=>2029,
            'is_active'=>1,
            'order'=>7,
            'created_at'=>$now,
            'updated_at'=>$now],
            
            //Bantek
            ['title'=>'Bantuan Teknis',
            'slug'=>'bantuan-teknis',
            'description'=>'Layanan Pendampingan dan Bantuan Teknis.',
            'icon'=>'<svg width="22" height="18" viewBox="0 0 22 18" fill="none"><path d="M0 18V15.2C0 14.65 .14 14.13 .43 13.65C.71 13.17 1.1 12.8 1.6 12.55C2.45 12.12 3.41 11.75 4.48 11.45C5.54 11.15 6.72 11 8 11C9.28 11 10.46 11.15 11.53 11.45C12.59 11.75 13.55 12.12 14.4 12.55C14.9 12.8 15.29 13.17 15.58 13.65C15.86 14.13 16 14.65 16 15.2V18H0ZM8 10C6.9 10 5.96 9.61 5.18 8.83C4.39 8.04 4 7.1 4 6H6C6 6.55 6.2 7.02 6.59 7.41C6.98 7.8 7.45 8 8 8C8.55 8 9.02 7.8 9.41 7.41C9.8 7.02 10 6.55 10 6H12C12 7.1 11.61 8.04 10.83 8.83C10.04 9.61 9.1 10 8 10Z" fill="#93000A"/></svg>',
            'color'=>'pink',
            'jumlah_permohonan'=>14,
            'is_active'=>1,
            'order'=>8,
            'created_at'=>$now,
            'updated_at'=>$now],
        ];
        DB::table('services')->insert($services);
        $this->command->info('Seeded ' . count($services) . ' layanan.');
    }
}