<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productJenis extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_jenis')->insert([
            [
                'subGroup' => 'Velg Rapido',  // 1
                'type' => 'Sport Rim',
            ],
            [
                'subGroup' => 'Velg Rapido', // 2
                'type' => 'Matic Rim',
            ],
            [
                'subGroup' => 'Dirt Bike', // 3
                'type' => 'SND TMX 50',
            ],
            [
                'subGroup' => 'Dirt Bike', // 4
                'type' => 'SND TMX 65',
            ],
            [
                'subGroup' => 'Dirt Bike', // 5
                'type' => 'SND TMX 105',
            ],
            [
                'subGroup' => 'Motocross Part', // 6
                'type' => 'Honda CRF 150 L',
            ],
            [
                'subGroup' => 'Motocross Part', // 7
                'type' => 'Honda CRF 230',
            ],
            [
                'subGroup' => 'Motocross Part', // 8
                'type' => 'Honda klx 150',
            ],
            [
                'subGroup' => 'Muffler', // 9
                'type' => '',
            ],
            [
                'subGroup' => 'Racing & Daily', // 10
                'type' => '',
            ],
            [
                'subGroup' => 'Carburator', // 11
                'type' => 'Carburator Original',
            ],
            [
                'subGroup' => 'Carburator', // 12
                'type' => 'Carburator SND',
            ],
            [
                'subGroup' => 'Blok Kopling & Engine', // 13
                'type' => 'Blok Kopling',
            ],
            [
                'subGroup' => 'Blok Kopling & Engine', // 14
                'type' => 'Engine',
            ],
            [
                'subGroup' => 'CNC Porting', // 15
                'type' => '',
            ],
        ]);
    }
}
