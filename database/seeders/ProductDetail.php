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
                'pwid' => 3,
                'psid' => 1,
                'url_image' => 'velgmio.png',
            ],    
            [
                'prid' => 2,
                'pwid' => 2,
                'psid' => 2,
                'url_image' => '7302velk_mx_king.png',
            ],    
            [
                'prid' => 3,
                'pwid' => 4,
                'psid' => 3,
                'url_image' => '1383velkjupiterz.png',
            ],    
            [
                'prid' => 4,
                'pwid' => 1,
                'psid' => 4,
                'url_image' => '4144beat.png',
            ],    
            [
                'prid' => 5,
                'pwid' => 5,
                'psid' => 5,
                'url_image' => '8630KNALPOT2TAKSND.png',
            ],    
            [
                'prid' => 6,
                'pwid' => 5,
                'psid' => 6,
                'url_image' => '2917KNALPOTGRASSTRACK.png',
            ],    
            [
                'prid' => 7,
                'pwid' => 5,
                'psid' => 7,
                'url_image' => '7698tmx501010aircooled.png',
            ],    
            [
                'prid' => 8,
                'pwid' => 5,
                'psid' => 8,
                'url_image' => '3035FRONTSPROCKETGUARDK84.png',
            ],    
            [
                'prid' => 9,
                'pwid' => 5,
                'psid' => 9,
                'url_image' => '4865carburetorPWK28.png',
            ],    
            [
                'prid' => 10,
                'pwid' => 5,
                'psid' => 10,
                'url_image' => '3582FORGEDPISTONFLATHEAD.png',
            ],    
            [
                'prid' => 11,
                'pwid' => 5,
                'psid' => 11,
                'url_image' => '7511tmx65cc.png',
            ],    
            [
                'prid' => 12,
                'pwid' => 5,
                'psid' => 12,
                'url_image' => '4003tmx105cc.png',
            ],    
            [
                'prid' => 13,
                'pwid' => 1,
                'psid' => 13,
                'url_image' => '6407CHAINGUIDECRF230.png',
            ],    
            [
                'prid' => 14,
                'pwid' => 5,
                'psid' => 14,
                'url_image' => '2914SNDKLX150CYLINDERKIT.png',
            ],    
            [
                'prid' => 15,
                'pwid' => 5,
                'psid' => 15,
                'url_image' => '5656KEIHINCARBURETORPWK28-29S-B00.png',
            ],    
            [
                'prid' => 16,
                'pwid' => 5,
                'psid' => 16,
                'url_image' => '8409BLOKKOPLINGMANUALHONDAABSOLUTESND.png',
            ],    
            [
                'prid' => 17,
                'pwid' => 5,
                'psid' => 17,
                'url_image' => '7778190ccDAYTONA4VALVE190FDX.png',
            ],    
        ]);
    }
}
