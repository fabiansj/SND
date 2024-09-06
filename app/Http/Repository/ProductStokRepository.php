<?php

namespace App\Http\Repository;

use App\Models\Produk;

class ProdukStokRepository
{
    public function index() 
    {
        return Produk::all();
    }
}