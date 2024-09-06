<?php

namespace App\Http\Repository;

use App\Models\Produk;

class ProdukWarnaRepository
{
    public function index() 
    {
        return Produk::all();
    }
}