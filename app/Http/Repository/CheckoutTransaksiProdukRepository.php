<?php

namespace App\Http\Repository;

use App\Models\Produk;

class CheckoutTransaksiProdukRepository
{
    public function index() 
    {
        return Produk::all();
    }
}