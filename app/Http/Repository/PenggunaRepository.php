<?php

namespace App\Http\Repository;

use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class PenggunaRepository
{
    public function index() 
    {
        return Produk::all();
    }

    public static function getById($pid){
        return DB::table('pengguna')->where('pid', $pid)->first();
    }
}