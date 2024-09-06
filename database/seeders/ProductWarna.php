<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productWarna extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Product_warna')->insert([
            [
                'warna' => 'Merah',
            ],
            [
                'warna' => 'Kuning',
            ],
            [
                'warna' => 'Biru',
            ],
            [
                'warna' => 'Hitam',
            ],
        ]);
    }
}
