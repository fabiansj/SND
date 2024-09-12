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
                'stok' => 100,
            ],    
            [
                'stok' => 200,
            ],    
            [
                'stok' => 70,
            ],    
            [
                'stok' => 100,
            ],    
            [
                'stok' => 50,
            ],    
            [
                'stok' => 20,
            ],    
            [
                'stok' => 20,
            ],    
            [
                'stok' => 10,
            ],    
            [
                'stok' => 30,
            ],    
            [
                'stok' => 25,
            ],    
            [
                'stok' => 20,
            ],    
            [
                'stok' => 3,
            ],    
            [
                'stok' => 9,
            ],    
            [
                'stok' => 200,
            ],    
            [
                'stok' => 8,
            ],    
            [
                'stok' => 5,
            ],    
        ]);
    }
}
