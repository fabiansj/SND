<?php

namespace App\Http\Repository;

use App\Models\Produk;

class ProdukStokTransaksiRepository
{
    public function index() 
    {
        return Produk::all();
    }
}