<?php

namespace App\Http\Repository;

use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductMentahRepository
{
    public static function index(){
        return DB::table('product_mentah as a')
                    ->leftJoin('pengguna as b', 'b.pid', '=', 'a.create_by')
                    ->select('a.*', 'b.nama as pembuat_data')
                    ->get();
    }

    public static function insert($payload){
        return DB::table('product_mentah')->insert($payload);        
    }

    public static function delete($pmid){
        return DB::table('product_mentah')->where('pmid', $pmid)->delete();        
    }
}