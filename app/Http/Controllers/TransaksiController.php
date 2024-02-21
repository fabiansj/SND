<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Produk;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function listProduk()
    {
        $produk = Produk::all();
        return view('produk', compact('produk'));
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function createToken(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'produk_id' => 'required|exists:produk,id',
        ]);

        // Simpan data transaksi di Alpine.js store (misalnya, menggunakan session)
        $transaksi = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'produk_id' => $request->input('produk_id'),
            'status' => 'pending',
        ];

        session(['transaksi' => $transaksi]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$is3ds = config('midtrans.is_3ds');

        // Data untuk dibuatkan token Snap
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . time(),
                'gross_amount' => Produk::find($transaksi['produk_id'])->harga,
            ],
            'customer_details' => [
                'first_name' => $transaksi['nama'],
                'email' => $transaksi['email'],
                'phone' => $transaksi['phone'],
            ],
        ];

        // Membuat token Snap
        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken]);
    }
}