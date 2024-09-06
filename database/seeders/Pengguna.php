<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pengguna extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengguna')->insert([
        [
            'username' => 'admin',
            'password' => 'admin',
            'nama' => 'admin',
            'alamat' => 'jln.bandung',
            'no_telp' => '08928342323',
            'role' => 'admin',
        ],
        [
            'username' => 'user',
            'password' => 'user',
            'nama' => 'user',
            'alamat' => 'jln.jakarta',
            'no_telp' => '08529323232',
            'role' => 'user',
        ]
        ]);
    }
}
