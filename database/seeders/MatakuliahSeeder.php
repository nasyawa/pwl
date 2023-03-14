<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matakuliah')->insert([
            [
                'id'=> 1,
                'matkul'=> 'Manajemen Proyek'
            ],
            [
                'id'=> 2,
                'matkul'=> 'Pemrograman Web Lanjut'
            ],
            [
                'id'=> 3,
                'matkul'=> 'Kewarganegaraan'
            ],
            [
                'id'=> 4,
                'matkul'=> 'Matematika'
            ]
            ]);
    }
}
