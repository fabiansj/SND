<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productDetail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_detail')->insert([
            [
                'prid' => 1,
                'pwid' => 2,
                'psid' => 1,
                'url_image' => 'velgmio.png',
            ],    
            [
                'prid' => 2,
                'pwid' => 2,
                'psid' => 1,
                'url_image' => '7302velk_mx_king.png',
            ],    
            [
                'prid' => 3,
                'pwid' => 3,
                'psid' => 3,
                'url_image' => '1383velkjupiterz.png',
            ],    
            [
                'prid' => 4,
                'pwid' => 1,
                'psid' => 2,
                'url_image' => '4144beat.png',
            ],    
        ]);
    }
}
