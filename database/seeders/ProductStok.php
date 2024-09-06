<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productStok extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_stok')->insert([
            [
                'stok' => 50,
            ],    
            [
                'stok' => -100,
            ],    
            [
                'stok' => 200,
            ],    
        ]);
    }
}
