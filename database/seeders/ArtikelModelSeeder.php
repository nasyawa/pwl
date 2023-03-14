<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikel')->insert([
            [
                'id' => '300',
                'judul' => 'Menjaga Kesehatan Remaja',
                'penulis' => 'dr. Fransiska Handy, SpA',
                'tgl_terbit'=>'2018-10-17'
            ],
            [
                'id' => '301',
                'judul' => 'Sistem Sekolah BATIK (Berkarakter, Aktif, Kreatif, Kompetitif) Untuk Membentuk Generasi Indonesia yang Unggulan',
                'penulis' => 'Andri Kosiret, dan Chindy Listia Utami',
                'tgl_terbit'=>'2018-11-24'
            ],
            [
                'id' => '302',
                'judul' => 'Pembuatan Casing Handphone Berbahan Limbah Plastik',
                'penulis' => 'Sinta Puspitasari, Khaula, Isma Farikha LN',
                'tgl_terbit'=>'2020-07-07'
            ]
        ]);
    }
}
