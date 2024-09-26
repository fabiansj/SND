<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repository\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Repository\CartRepository;
use App\Http\Repository\CartListRepository;
use App\Http\Repository\GLTransStockRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductAPIController extends Controller
{
    public static function addCart(Request $request)
    {               
        // dd($request);
        $pid    = Auth::user()->pid;        
        
        if($request->detail_produk == true){            
            $data = ProductRepository::findID($request->prid);            
        }else{        
            $data = $request;
        }
        
        $cekStok = ProductRepository::findID($request->prid);
        $cekTrans = abs(GLTransStockRepository::getStok($cekStok->prid));
        dd($cekStok);
        try {
            DB::beginTransaction();
            
            if($cekStok->stok - $cekTrans <= 0){
                return response()->json(['message' => 'Stok Barang Habis'], 500);
            }

            $cekProduct = CartListRepository::getOne($data->prid, $pid);            
            if ($cekProduct) {
                $addStock = $cekProduct->jumlah + 1;                
                CartListRepository::updateStock($addStock, $cekProduct->clid);
                $getCardID = $cekProduct->cid;
            } else {                
                $getCardID = CartRepository::insert($pid, $data->prid);
            
                $payload = [
                    'cid'           => $getCardID,
                    'nama'          => $data->nama,
                    'warna'         => $data->warna,
                    'jumlah'        => 1,
                    'harga'         => $data->harga,
                    'created_at'    => Carbon::now(),
                    'create_by'     => $pid,
                    'modified_at'   => Carbon::now(),
                    'modify_by'     => $pid,
                ];
                CartListRepository::insert($payload);
            }
            
            // dd($payload);

            DB::commit();            
            return response()->json([
                'status' => 'success',                
                'cid' => $getCardID,                
            ], 200);
        } catch (\Throwable $e) {
            DB::rollBack();
            // Log the error message for debugging purposes
            Log::error('Failed to add cart: ' . $e->getMessage());
            return response()->json(['message' => 'failed', 'error' => $e->getMessage()], 500);
        }
    }

    public static function getDataCart(){
        $pid = Auth::user()->pid;        
        $cartData = CartListRepository::getAll($pid);
        $totalharga = collect($cartData)->sum('tharga_produk');
        
        return response()->json([
            'success' => true,
            'items' => $cartData,
            'total_harga' => $totalharga,
        ]);
    }
}
