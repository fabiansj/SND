<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            [
                'nama' => 'Velg Mio j/Mio GT//Fino/X-Ride',
                'harga' => 5000000,
                'kode' => 'PR1',
                'pjid' => '2',
                'keterangan' => 'mio j',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'SND RAPIDO-501 MX-KING 17',
                'harga' => 3200000,
                'kode' => 'PR2',
                'pjid' => '1',
                'keterangan' => 'mx king',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'SND RAPIDO-501 JUP.Z / MX OLD 17',
                'harga' => 1200000,
                'kode' => 'PR3',
                'pjid' => '1',
                'keterangan' => 'vixion',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'Velg Honda beat/Scoopy old/Vario 110/Spacy',
                'harga' => 1700000,
                'kode' => 'PR4',
                'pjid' => '2',
                'keterangan' => 'beat',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'KNALPOT 2 TAK SND SCORPIO NINJA RR CROOM',
                'harga' => 550000,
                'kode' => 'KN1',
                'pjid' => '9',
                'keterangan' => 'knalpot',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'KNALPOT GRASSTRACK GALVANIS TITAN',
                'harga' => 500000,
                'kode' => 'KN1',
                'pjid' => '9',
                'keterangan' => 'knalpot',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'SND TMX 50 W',
                'harga' => 13000000,
                'kode' => 'KN1',
                'pjid' => '3',
                'keterangan' => 'motor',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'FRONT SPROCKET GUARD K84',
                'harga' => 720000,
                'kode' => 'MT1',
                'pjid' => '6',
                'keterangan' => 'Bahan Aluminium',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'CARBURETOR PWK 28 SND',
                'harga' => 780000,
                'kode' => 'CB1',
                'pjid' => '12',
                'keterangan' => 'karburator',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'Forged Piston Flat Head for Sonic 155cc',
                'harga' => 800000,
                'kode' => 'RD1',
                'pjid' => '10',
                'keterangan' => 'Forged Piston Flat Head for Sonic 155cc (Dia 58,5 mm) w/ Riken Ring',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'SND TMX 65WC',//11
                'harga' => 17000000,
                'kode' => 'MT2',
                'pjid' => '4',
                'keterangan' => 'Spesifikasi
                    • Engine : 65cc, single cylinder, water-cooled, 2-stroke
                    • Oil type : Petrol and engine oil 20 : 1 mixing
                    • Max. Torque and rotate speed : 9N. M / 13,000rpm
                    • Tank capacity : 2L',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'SND TMX 105X', //12
                'harga' => 42000000,
                'kode' => 'MT3',
                'pjid' => '5',
                'keterangan' => 'Spesifikasi
                            engine
                            • Design : 1-cylinder, 2-stroke self-developed 
                            water cooled engine 
                            • Displacement : 105cc
                            • Bore : 52 mm
                            • Stroke : 48.95 mm',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'CHAIN GUIDE CRF 230 SND RED',//13
                'harga' => 475000,
                'kode' => 'MC2',
                'pjid' => '7',
                'keterangan' => 'Bahan Aluminium',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'SND KLX150 CYLINDER KIT',//14
                'harga' => 920000,
                'kode' => 'MC3',
                'pjid' => '8',
                'keterangan' => 'Available size
                                -SND KLX150 CYLINDER KIT 62MM (CKP2002)',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'Keihin Carburetor PWK28-29S-B00',//15
                'harga' => 2500000,
                'kode' => 'CB2',
                'pjid' => '11',
                'keterangan' => '',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'BLOK KOPLING MANUAL HONDA',//16
                'harga' => 470000,
                'kode' => 'BK3',
                'pjid' => '13',
                'keterangan' => 'BLOK KOPLING MANUAL HONDA BLADE, REVO ABSOLUTE SND',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => '190cc DAYTONA 4-VALVE ENGINE ANIMA 190FDX',//16
                'harga' => 19000000,
                'kode' => 'MS1',
                'pjid' => '14',
                'keterangan' => 'SPESIFICATION 
                    Engine 190cc SOHC, 4-stroke, 4-valve, 
                    unicam, horizontal cylinder
                    Cooler air / oil
                    Bore and Stroke: 62x62
                    6-disc clutch in oil bath',
                'create_by' => 1,
                'modify_by' => 1,
            ],
        ]);
    }
}
