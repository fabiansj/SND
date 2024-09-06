<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Carbon\Carbon;

class CartTest extends TestCase
{
    use RefreshDatabase; // Jika Anda ingin database rollback otomatis setelah setiap test
    /**
     * A basic feature test example.
     */
    public static function insert($data)
    {
        $payload = [
            'cid' => 1,
            'pid' => 1
        ];

        $payload1 = [
            'cid'           => 1,
            'nama'          => 'rapido',
            'warna'         => 'kuning',
            'jumlah'        => '3',
            'harga'         => 300000,
            'created_at'    => Carbon::now(),
            // 'create_id'     => Auth::user()->pid,
        ];

        DB::table('cart')->insert($payload);
        DB::table('cart_list')->insert($payload1);
    }
}
