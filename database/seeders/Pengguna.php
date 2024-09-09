<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'password' => '$2y$12$wnW091Gdr.20KFBaU2MvFuRb5CQ45OQvEQnXoLrzqNCSiYx4cMasm',
            'nama' => 'admin',
            'alamat' => 'jln.bandung',
            'no_telp' => '08928342323',
            'role' => 'admin',
            'create_by' => 1,
            'modify_by' => 1,
        ],
        [
            'username' => 'user',
            'password' => '$2y$12$QefgAoSYihA/uBBkRXKbcOVwFjlsxda487/2QPAf714Y5tssq1WQS',
            'nama' => 'user',
            'alamat' => 'jln.jakarta',
            'no_telp' => '08529323232',
            'role' => 'user',
            'create_by' => 1,
            'modify_by' => 1,
        ],
        [
            'username' => 'fabian',
            'password' => '$2y$12$yrhzmrgAloYOIloGqKnxke8KxS15LrblGB/vM95WtREwAV0z1mhV6',
            'nama' => 'fabian',
            'alamat' => 'jln.asdczx',
            'no_telp' => '0873823723',
            'role' => 'admin',
            'create_by' => 1,
            'modify_by' => 1,
        ]
        ]);
    }
}
