<?php

namespace App\Http\Repository;

use App\Models\Produk;

class ProductDetailRepository
{
    public function index() 
    {
        return Produk::all();
    }
}