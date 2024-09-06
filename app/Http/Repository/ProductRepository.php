<?php

namespace App\Http\Repository;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductRepository
{
    // WEB CONTENT
    public static function index() 
    {
        $sql = DB::table('product')
            ->leftJoin('product_detail', 'product.prid', '=', 'product_detail.prid')
            ->select('product.*', 'product_detail.url_image')
            ->orderBy('product.created_at', 'desc')
            ->get();
        return $sql;
    }

    public static function getAll(){
        $sql = DB::table('product')
            ->leftJoin('product_detail', 'product.prid', '=', 'product_detail.prid')
            ->select('product.*', 'product_detail.url_image')                
            ->get();
        return $sql;
    }    

    public static function find($name)
    {
        $name = strtolower($name);
        
        $sql = DB::table('product as a')
        ->leftJoin('product_detail as b', 'a.prid', '=', 'b.prid')
        ->leftJoin('product_warna as c', 'b.pwid', '=', 'c.pwid')
        ->leftJoin('product_stok as d', 'b.psid', '=', 'd.psid')
        ->leftJoin('product_jenis as e', 'a.pjid', '=', 'e.pjid')
        ->select('e.type', 'e.subGroup', 'd.stok', 'c.warna', 'b.url_image', 'a.*')
        ->whereRaw('LOWER(e.subGroup) LIKE ? or LOWER(e.type) LIKE ? or LOWER(a.nama) LIKE ? ', ["%{$name}%"]);
        
        return $sql->get();
    }

    public static function findID($id)
    {        
        $sql = DB::table('product as a')
        ->leftJoin('product_detail as b', 'a.prid', '=', 'b.prid')
        ->leftJoin('product_warna as c', 'b.pwid', '=', 'c.pwid')
        ->leftJoin('product_stok as d', 'b.psid', '=', 'd.psid')
        ->leftJoin('product_jenis as e', 'a.pjid', '=', 'e.pjid')
        ->select('e.type', 'e.subGroup', 'd.stok', 'c.warna', 'b.url_image', 'a.*')
        ->where('a.prid', $id);
        
        return $sql->get();
    }

    public static function getName($name)
    {
        $rawName = 'LOWER(a.nama) LIKE ?';
        return self::getDataFind($name,$rawName);
    }

    public static function getGroup($name)
    {
        $rawName = 'LOWER(e.subGroup) LIKE ?';
        return self::getDataFind($name,$rawName);
    }

    public static function getType($nama)
    {
        $rawName = 'LOWER(e.type) LIKE ?';
        return self::getDataFind($nama,$rawName);
    }

    public static function getDetail($id)
    {
        $sql = DB::table('product as a')
                ->leftJoin('product_detail as b', 'a.prid', '=', 'b.prid')
                ->leftJoin('product_warna as c', 'b.pwid', '=', 'c.pwid')
                ->leftJoin('product_stok as d', 'b.psid', '=', 'd.psid')
                ->leftJoin('product_jenis as e', 'a.pjid', '=', 'e.pjid')
                ->select('e.type', 'e.subGroup', 'd.stok', 'c.warna', 'b.url_image', 'a.*')
                ->where('a.prid', $id)
                ->first();
        return $sql;
    }    

    //API WEB CONTENT
    public static function insert($id)
    {
        $data = self::findID($id)[0];

        $payload = [
            'pid'           => 1,
            'cid'           => 1,
            // 'pid'     => Auth::user()->pid,
        ];

        $payload1 = [
            'cid'           => 1,
            // 'cid'     => Auth::user()->pid,
            'nama'          => $data->nama,
            'warna'         => $data->warna,
            'jumlah'        => 1,
            'harga'         => $data->harga,
            'created_at'    => Carbon::now(),
            // 'create_id'     => Auth::user()->pid,
        ];

        $cartData       = DB::table('cart')->insert($payload);
        $cartListData   = DB::table('cart_list')->insert($payload1);
        
        return [
            'cart_data' => $cartData,
            'cart_list_data' => $cartListData
        ];
    }


    // private function
    private static function getDataFind($name,$rawName)
    {
        $name = strtolower($name);    

        return DB::table('product as a')
                ->leftJoin('product_detail as b', 'a.prid', '=', 'b.prid')
                ->leftJoin('product_warna as c', 'b.pwid', '=', 'c.pwid')
                ->leftJoin('product_stok as d', 'b.psid', '=', 'd.psid')
                ->leftJoin('product_jenis as e', 'a.pjid', '=', 'e.pjid')
                ->select('e.type', 'e.subGroup', 'd.stok', 'c.warna', 'b.url_image', 'a.*')
                ->whereRaw($rawName, ["%{$name}%"])
                ->get();
    }

    private static function checkProductCart()
    {
        return 'yes';
    }
}