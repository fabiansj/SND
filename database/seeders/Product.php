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
                'nama' => 'SND RAPIDO-505 Vario',
                'harga' => 5000000,
                'kode' => 'PR1',
                'pjid' => '1',
                'keterangan' => 'mio j',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'SND RAPIDO-501 MX KING',
                'harga' => 3200000,
                'kode' => 'PR2',
                'pjid' => '2',
                'keterangan' => 'vario',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'produk 3',
                'harga' => 1200000,
                'kode' => 'PR3',
                'pjid' => '3',
                'keterangan' => 'vixion',
                'create_by' => 1,
                'modify_by' => 1,
            ],
            [
                'nama' => 'produk 4',
                'harga' => 1700000,
                'kode' => 'PR4',
                'pjid' => '2',
                'keterangan' => 'beat karbu',
                'create_by' => 1,
                'modify_by' => 1,
            ],
        ]);
    }
}
