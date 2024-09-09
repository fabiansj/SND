<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class CheckoutTransaksiProductRepository
{
    public static function index() 
    {
        return DB::table('checkout_transaksi_product')->get();
    }

    public static function insert($data)
    {
        $result = DB::table('checkout_transaksi_product')->insert($data);
        return $result;
    }
}