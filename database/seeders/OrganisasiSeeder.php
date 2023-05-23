<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organisasi')->insert([
            [
                'nama'=>'Himpunan Informasi',
                'tahun'=> '2007'
            ],
            [
                'nama'=>'Himpunan Elektro',
                'tahun'=>'2000'
            ],
            [
                'nama'=> 'Himpunan Kimia',
                'tahun'=>'2011'
            ]
            ]);
    }
}

