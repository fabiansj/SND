<?php

namespace App\Http\Controllers;

use App\Http\Repository\CheckoutTransaksiRepository;
use App\Http\Repository\CartListRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutTransaksiController extends Controller
{
    public function index($ctid)
    {
        $pid = Auth::user()->pid;
        $status = "pending";
        $product   = CheckoutTransaksiRepository::getDetailPendingPayment($pid, $status, $ctid);
        $badge     = 'Detail Product';
        $badge2    = 'Belum Bayar';
        // dd($product);

        return view('payment.detail_pending', compact(
            'product',
            'pid',
            'badge2',
        ));
    }

    public function getPendingPayment(){
        $pid = Auth::user()->pid;
        $product = CheckoutTransaksiRepository::getHasNotPaid($pid);
        $badge     = '';
        $badge2    = 'Belum Bayar';
        // dd($product);

        return view('payment.pending', compact(
            'product',
            'pid',
            'badge2',
        ));
    }

    public function getSettlementPayment(){
        $pid = Auth::user()->pid;        
        if(Auth::user()->role === 'admin'){
            $product = CheckoutTransaksiRepository::getHasPaidAll();
        }else{            
            $product = CheckoutTransaksiRepository::getHasPaid($pid);
        }
        $badge     = '';
        $badge2    = 'Riwayat Pembelian';
        // dd($product);

        return view('payment.settlement', compact(
            'product',
            'pid',
            'badge2',
        ));
    }

    public function getDetailSettlement($ctid)
    {
        $pid = Auth::user()->pid;
        $status = "settlement";
        $product   = CheckoutTransaksiRepository::getDetailSettlementPayment($pid, $status, $ctid);
        $badge     = 'Detail Product';
        $badge2    = 'Sudah Bayar';
        // dd($product);

        return view('payment.detail_settlement', compact(
            'product',
            'pid',
            'badge2',
        ));
    }

    public function setStockCheckout(Request $request){
        
        // dd($request->all());
        CartListRepository::setStockCheckout($request->clid, $request->operator);
        if ($request->isMethod('put')) {
            // Logika untuk metode PUT
            dd('put');
        } elseif ($request->isMethod('delete')) {
            dd('delete');
            // Logika untuk metode DELETE
        }
    }

    public function setStatusProduk(Request $request){
        // dd($request);
        $status_id = $request->status_id;
        $ctid = $request->ctid;
        $payload = [];
        switch($status_id){
            case 1:
                //diterima admin
                $payload = [
                    'status_produk' => 'Dipacking',
                    'status_produk_id' => 2,
                ];
                CheckoutTransaksiRepository::updateStatusProduk($payload, $ctid);
                break;
            case 2:
                //sedang dipack
                $payload = [
                    'status_produk' => 'Dikirim',
                    'status_produk_id' => 3,
                ];
                CheckoutTransaksiRepository::updateStatusProduk($payload, $ctid);
                break;
            case 3:
                //pengiriman ke jasa antra
                $payload = [
                    'status_produk' => 'Diterima',
                    'status_produk_id' => 4,
                ];
                CheckoutTransaksiRepository::updateStatusProduk($payload, $ctid);
                break;
        };
    }
}
