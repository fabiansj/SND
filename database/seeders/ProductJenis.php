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
                'subGroup' => 'Velg Rapido',
                'type' => 'Sport Rim',
            ],    
            [
                'subGroup' => 'Velg Rapido',
                'type' => 'Matic Rim',
            ],    
            [
                'subGroup' => 'Dirt Bike',
                'type' => 'SND TMX 50',
            ],    
        ]);
    }
}
