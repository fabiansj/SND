<?php
namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class CartListRepository
{
    public static function insert($payload){
        $cartID = DB::table('cart_List')->insert($payload);
        return $cartID;
    }

    public static function updateStock($jumlah, $clid){
        $cart = DB::table('cart_list')->where('clid', $clid)->update(['jumlah' => $jumlah]);
        return $cart;
    }

    public static function getAll($pid){
        $results = DB::table('cart as a')
                    ->join('cart_list as b', 'a.cid', '=', 'b.cid')
                    ->join('pengguna as c', 'a.pid', '=', 'c.pid')
                    ->leftJoin('product_detail as d', 'a.prid', '=', 'd.prid')
                    ->select(
                        'c.pid',
                        'a.prid as prid',
                        'b.nama as nama_produk',
                        'b.jumlah as jumlah_produk',
                        'b.harga as harga_produk',
                        DB::raw('(b.harga * b.jumlah) as tharga_produk'),
                        'c.nama as nama_costumer',
                        'c.alamat as alamat',
                        'c.no_telp as no_telp',
                        'd.url_image as url_image',
                        'b.clid'
                        
                    )
                    ->where('c.pid', $pid)
                    ->get();        
        return $results;
    }    

    public static function getOne($prid, $pid){
        $result = DB::table('cart_list as a')
                    ->leftJoin('cart as b', 'a.cid', '=', 'b.cid')
                    ->where('b.prid', $prid)
                    ->where('b.pid', $pid)
                    ->first();
        return $result;
    }

    public static function delete($cid){
        $result = DB::table('cart_list')->where('cid', $cid)->delete();
        return $result;
    }
}