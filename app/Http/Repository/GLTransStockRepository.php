<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class GLTransStockRepository
{
    public static function index() 
    {
        return DB::table('gl_trans_stock')->get();
    }

    public static function insert($data)
    {
        $result = DB::table('gl_trans_stock')->insert($data);
        return $result;
    }
    
    public static function getStockSell($prid)
    {
        $result = DB::select('SELECT SUM(jumlah) as stock_sold from gl_trans_stock WHERE is_paid = true and prid = :prid', ['prid' => $prid]);
        return $result[0];
    }
    
}