<?php

namespace App\Http\Repository;

use App\Models\Pengguna;

class ProductDetailRepository
{
    public function index() 
    {
        return Pengguna::all();
    }
}