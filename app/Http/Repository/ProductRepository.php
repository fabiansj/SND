<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

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

    public static function getLimit() 
    {
        $sql = DB::table('product')
            ->leftJoin('product_detail', 'product.prid', '=', 'product_detail.prid')
            ->select('product.*', 'product_detail.url_image')
            ->orderBy('product.created_at', 'desc')
            ->limit(5)
            ->get();
        return $sql;
    }

    public static function getAll(){
        $sql = DB::table('product')
            ->leftJoin('product_detail', 'product.prid', '=', 'product_detail.prid')
            ->select('product.*', 'product_detail.url_image')                
            ->limit(8)
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
        
        return $sql->first();
    }

    public static function getName($name)
    {
        $rawName = 'LOWER(a.nama) LIKE ?';
        return self::getDataFind($name,$rawName);
    }

    public static function checkName($name)
    {
        return DB::table('product')->where('nama', $name)->first();
    }

    public static function getGroup($name)
    {
        $rawName = 'LOWER(e.subGroup) LIKE ?';
        return self::getDataFind($name,$rawName);
    }

    public static function getType($group, $nama)
    {
        $nama = strtolower($nama);    

        return DB::table('product as a')
                ->leftJoin('product_detail as b', 'a.prid', '=', 'b.prid')
                ->leftJoin('product_warna as c', 'b.pwid', '=', 'c.pwid')
                ->leftJoin('product_stok as d', 'b.psid', '=', 'd.psid')
                ->leftJoin('product_jenis as e', 'a.pjid', '=', 'e.pjid')
                ->select('e.type', 'e.subGroup', 'd.stok', 'c.warna', 'b.url_image', 'a.*')
                ->where('e.subGroup', 'like', "%{$group}%")
                ->where('e.type', 'like', "%{$nama}%")
                ->get();
    }

    public static function getDetail($id)
    {
        $sql = DB::table('product as a')
                ->leftJoin('product_detail as b', 'a.prid', '=', 'b.prid')
                ->leftJoin('product_warna as c', 'b.pwid', '=', 'c.pwid')
                ->leftJoin('product_stok as d', 'b.psid', '=', 'd.psid')
                ->leftJoin('product_jenis as e', 'a.pjid', '=', 'e.pjid')
                ->select('e.type', 'e.subGroup', 'd.stok', 'c.warna', 'b.url_image', 'a.*', 'c.pwid')
                ->where('a.prid', $id)
                ->first();
        return $sql;
    }    

    public static function getAllData(){
        return DB::table('product as a')
                ->leftJoin('product_detail as b', 'a.prid', '=', 'b.prid')
                ->leftJoin('product_warna as c', 'b.pwid', '=', 'c.pwid')
                ->leftJoin('product_stok as d', 'b.psid', '=', 'd.psid')
                ->leftJoin('product_jenis as e', 'a.pjid', '=', 'e.pjid')
                ->select('e.type', 'e.subGroup', 'd.stok', 'c.warna', 'b.url_image', 'a.*')
                ->get();
    }

    //API WEB CONTENT
    // public static function insert($data)
    // {
    //     try {
    //         $jumlah = 0;
    //         $jumlah = intval($data->jumlah++);
    //         $pid    = Auth::user()->pid;

    //         $getCardID = CartRepository::insert($pid);
    
    //         $payload = [
    //             'cid'           => $getCardID,
    //             'nama'          => $data->nama,
    //             'warna'         => $data->warna,
    //             'jumlah'        => $jumlah,
    //             'harga'         => $data->harga,
    //             'created_at'    => Carbon::now(),
    //             'create_id'     => $pid,
    //             'modified_at'   => Carbon::now(),
    //             'modify_id'     => $pid,
    //         ];
    
    //         $cartData = CartListRepository::insert($payload);
            
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Data berhasil ditambahkan ke keranjang.',
    //             'cid' => $getCardID,
    //             'data' => $cartData
    //         ], 200);
    
    //     } catch (Exception $e) {
    //         Log::error('Error adding to cart: ' . $e->getMessage(), [
    //             'user_id' => Auth::user()->pid,
    //             'request' => $data->all(),
    //         ]);
    
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Terjadi kesalahan saat menambahkan data ke keranjang.',
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }
    // }

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