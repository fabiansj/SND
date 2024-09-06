<?php

namespace App\Repositories;

use App\Models\Produk;

class CheckoutTransaksiRepository
{
    public function index() 
    {
        return Produk::all();
    }
}