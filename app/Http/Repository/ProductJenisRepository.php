<?php

namespace App\Http\Repository;

use App\Models\Produk;

class ProductJenisRepository
{
    public function index() 
    {
        return Produk::all();
    }
}