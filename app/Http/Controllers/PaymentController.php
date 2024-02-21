<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

class PaymentController extends Controller
{
    public function checkout(Request $request){        
        //validasi form
        // $request->validate([
        //     'items' => 'required|string',
        //     'total' => 'required|numeric',
        //     'name' => 'required|string',
        //     'email' => 'required|email',
        //     'phone' => 'required|numeric',
        // ]);

        // ambil data dari formulir
        // $params = [

        // ];
        // $items = json_decode($request->get('items'), true);
        // $total = $request->get('total');
        // $name = $request->get('name');
        // $email = $request->get('email');
        // $phone = $request->get('phone');

        // dd($total);

        //proses pembayaran 
        // Config::$serverKey = ""; //server key midtrans
        // Config::$isProduction = false; // ganti ke true        
    }
}
