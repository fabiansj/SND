<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repository\CartListRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartListAPIController extends Controller
{
    public function setStockCheckout(Request $request){
        
        // dd($a);
        try {
            $setJumlah = 0;
            DB::beginTransaction();
            if ($request->isMethod('put')) {
                $getCartList = CartListRepository::getOnlyCartList($request->clid);
                // dd($getCartList->jumlah,'put',$request->operator);
                if($request->operator == 'minus'){
                    $setJumlah = $getCartList->jumlah;
                    $setJumlah--;
                }else if ($request->operator == 'plus'){
                    $setJumlah = $getCartList->jumlah;
                    $setJumlah++;
                }
                // dd($setJumlah);
                
                $payload = [
                    'clid' => $request->clid,
                    'jumlah' => intval($setJumlah),
                ];
                if($setJumlah == 0){
                    CartListRepository::deleteCartProduct($request->clid);
                }else{
                    CartListRepository::setStockCheckout($payload);    
                }
                // Logika untuk metode PUT
            } elseif ($request->isMethod('delete')) {
                CartListRepository::deleteCartProduct($request->clid);
            }
            DB::commit();
            return response()->json(
                ['jumlah' => $setJumlah], 
                200);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            // Log kesalahan untuk debugging
            Log::error('Error updating cart: ' . $e->getMessage());
            // Tangani atau lempar kesalahan
            return response()->json(['error' => 'Terjadi kesalahan saat memproses permintaan.'], 500);
        }
    }
}