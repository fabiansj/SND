<?php

namespace App\Http\Repository;

use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class PenggunaRepository
{
    public static function index() 
    {
        return DB::table('pengguna as a')
                    ->leftJoin('pengguna as b', 'a.create_by', '=', 'b.pid')
                    ->leftJoin('pengguna as c', 'a.modify_by', '=', 'c.pid')
                    ->select('a.*', 'b.nama as nama_pembuat', 'c.nama as nama_pengedit' )
                    ->get();
    }

    public static function getById($pid){
        return DB::table('pengguna')->where('pid', $pid)->first();
    }

    public static function getUsername($username){
        return DB::select('SELECT * FROM PENGGUNA WHERE username = :username', ['username' => $username]);
    }
}