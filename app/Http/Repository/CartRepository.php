<?php

namespace App\Http\Repository;

use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CartRepository
{
    public static function insert($pid, $prid){
        $cartID = DB::table('cart')->insertGetId(['pid' => $pid, 'prid' => $prid]);
        return $cartID;
    }
    
    public static function getID($pid){
        $result = DB::table('cart')->where('pid', $pid)->get();
        return $result;
    }
    
    public static function deleteWhereIn($pid){
        $result = DB::table('cart')->whereIn('pid', [$pid])->delete();
        return $result;
    }
}