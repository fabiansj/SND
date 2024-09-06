<?php

namespace App\Http\Repository;

use App\Models\Produk;

class PenggunaRepository
{
    public function index() 
    {
        return Produk::all();
    }
}