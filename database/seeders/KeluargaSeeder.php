<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluarga')->insert([
            [
                'id'=>'011',
                'nama'=>'Ayah'
            ],
            [
                'id'=>'012',
                'nama'=>'Ibu'
            ],
            [
                'id'=>'013',
                'nama'=>'Kakak'
            ],
            [
                'id'=>'014',
                'nama'=>'Adik'
            ]
        ]);
    }
}
