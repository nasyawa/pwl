<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobi')->insert([
            [
                'id'=> '1',
                'jenishobi'=> 'Melukis',
                'waktu'=>'Sore'
            ],
            [
                'id'=> '2',
                'jenishobi'=> 'Menari',
                'waktu'=>'Siang'
            ],
            [
                'id'=> '3',
                'jenishobi'=> 'Berenang',
                'waktu'=>'Pagi'
            ],
            [
                'id'=> '4',
                'jenishobi'=> 'Sepakbola',
                'waktu'=>'Sore'
            ]
        ]);
    }
}
