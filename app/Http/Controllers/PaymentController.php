<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Midtrans\Config;
// use Midtrans\Snap;
// use Midtrans\Transaction;
use App\Http\Repository\CheckoutTransaksiRepository;
use App\Http\Repository\CheckoutTransaksiProductRepository;
use App\Http\Repository\CartRepository;
use App\Http\Repository\CartListRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function checkoutProduk(Request $request)
    {   
        $dataCostumer = $request->input('form');
        $grossAmount = intval($request->input('total'));
        $dataCart = $request->input('items');
        $CostumerDetail = [];
        $pid = Auth::user()->pid;
        
        parse_str($dataCostumer, $CostumerDetail);
        $dataCart = json_decode($dataCart,true);

        try{
            DB::beginTransaction();
            $payload = [
                'pid'           => Auth::user()->pid,
                'is_paid'       => False,
                'nama'          => $CostumerDetail['name'],
                'alamat'        => $CostumerDetail['address'],
                'no_telp'       => $CostumerDetail['phone'],
                'final_price'   => $grossAmount,
                'created_at'    => Carbon::now(),
                'create_by'     => Auth::user()->pid,
                'modified_at'   => Carbon::now(),
                'modify_by'     => Auth::user()->pid,
                'order_id'      => 'snd-'. Carbon::now()->format('s') . rand(1000000,9999999) . Carbon::now()->format('my'),
            ];
            
            $getCTID = CheckoutTransaksiRepository::insert($payload);
            
            foreach ($dataCart as $value) {
                $payloadProduct = [
                    'ctid'          => $getCTID,
                    'nama'          => $value['nama_produk'],
                    'warna'         => 'abaikan',
                    'harga'         => $value['harga_produk'],
                    'jumlah'        => $value['jumlah_produk'],
                    'total_harga'   => $value['tharga_produk'],
                    'created_at'    => Carbon::now(),
                    'create_by'     => $pid,
                    'modified_at'   => Carbon::now(),
                    'modify_by'     => $pid ,
                ];
                
                $dataCheckout = CheckoutTransaksiProductRepository::insert($payloadProduct);
            }
            
            
            if($dataCheckout){
                //ambil cid dengan kondisi pid
                $getCID = CartRepository::getID($pid);
                
                foreach ($getCID as $value) {                
                    CartListRepository::delete($value->cid);
                }
                CartRepository::deleteWhereIn(intval($value->pid));
                // dd('berhasil boy hapus');
            }                        

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
            
            $dataItemsMidtrans = CheckoutTransaksiRepository::getByPID($pid, $getCTID);
            
            $item_details = [];
            foreach ($dataItemsMidtrans as $item) {
                $item_details[] = [
                    'id'       => $item->ctpid,
                    'price'    => $item->harga,
                    'quantity' => $item->jumlah,
                    'name'     => $item->nama
                ];
            }
            
            $params = [
                'transaction_details' => [
                    'order_id' => $payload['order_id'],
                    'gross_amount' => $payload['final_price'],
                ],
                'item_details' => $item_details,
                'customer_details' => [
                    'first_name' => $payload['nama'],
                    'last_name' => '',
                    'email' => $payload['email'] ?? 'snd@test.com',
                    'phone' => $payload['no_telp'],
                    'shipping_address' => [
                        'first_name' => $CostumerDetail['name'],
                        // 'last_name' => '',
                        // 'email' => $CostumerDetail['email'] ?? 'snd@test.com',
                        'phone' => $CostumerDetail['phone'],
                        'address' => $CostumerDetail['address'],
                        // 'city' => '',
                        // 'postal_code' => '',
                        'country_code' => 'IDN',
                    ],
                ],
            ];
            
            // dd($params);
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // $snapUrl = \Midtrans\Snap::getSnapUrl($params);
            CheckoutTransaksiRepository::updateSnapToken($getCTID, $snapToken);
            // dd($snapToken,$snapUrl);
            Log::info('Snap Token: ' . $snapToken);
            Log::info('ctid: ' . $getCTID, $dataItemsMidtrans->toArray(), $params);
            // dd($snapToken);
            DB::commit();            
            return response()->json([
                'status' => 'success',                
                'ctid' => $getCTID,
                'snap_token' => $snapToken,
            ], 200);
        } catch (\Throwable $e){
            DB::rollback();
            
            Log::error('Failed to Checkout Produk: ' . $e->getMessage());
            return response()->json(['message' => 'failed', 'error' => $e->getMessage()], 500);
        }
        
    }

    public function setStatusPayment(){
        // CheckoutTransaksiRepository::updateStatusPayment();
        
    }

    public function notificationHandler(Request $request)
    {
        Log::info('Request data: ', $request->all());
        Log::info('Request method: ' . $request->method());
        Log::info('Request URL: ' . $request->fullUrl());
    
        // Log data request untuk debugging
        // dd($request->all());
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        $notification = new \Midtrans\Notification();

        Log::info('notification respon:', (array) $notification->getResponse());
        $raw_notification = (array) $notification->getResponse();
                
        // Ambil ID transaksi dan status dari notifikasi
        $getStatus = $raw_notification['transaction_status'];
        $geTtypePayment = $raw_notification['payment_type'];
        $getOrderId = $raw_notification['order_id'];
        $fraud = $raw_notification['fraud_status'];

        // Cari transaksi di database berdasarkan order_id dan ambil order_id
        $getOrderId = CheckoutTransaksiRepository::getByOrderId($getOrderId)[0]->order_id;
                
        if (!$getOrderId) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }
        
        // Update status transaksi berdasarkan notifikasi
        switch ($getStatus) {
            case 'capture':
                $status = ($geTtypePayment === 'credit_card' && $fraud === 'challenge') ? 'Challenge by FDS' : 'Settlement';
                break;
            case 'settlement':
                $status = 'Settlement';
                break;
            case 'pending':
                $status = 'Pending';
                break;
            case 'deny':
                $status = 'Deny';
                break;
            case 'expire':
                $status = 'Expire';
                break;
            case 'cancel':
                $status = 'Cancel';
                break;
            default:
                $status = 'Unknown Status';
        }

        // Simpan perubahan status ke database
        $setStatus = CheckoutTransaksiRepository::updateStatusPayment2($status,$getOrderId);        

        // Kirim response sukses ke Midtrans
        return response()->json(
            [
                'message' => 'Notification received successfully',
                'status' => $setStatus,
                'order_id' => $getOrderId
            ]
        );
    }

    public function cancelOrder(Request $request)
    {
        // $orderId = $request->input('order_id');

        // // Melakukan permintaan POST ke endpoint cancel Midtrans
        // $response = Http::withHeaders([
        //     'Authorization' => 'Basic ' . base64_encode($this->serverKey . ':'),
        //     'Content-Type' => 'application/json',
        // ])->post($this->midtransUrl . $orderId . '/cancel');

        // if ($response->successful()) {
        //     // Proses berhasil
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Order has been canceled successfully.',
        //     ]);
        // } else {
        //     // Proses gagal
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Failed to cancel the order.',
        //         'error' => $response->body(),
        //     ], $response->status());
        // }
    }
}
