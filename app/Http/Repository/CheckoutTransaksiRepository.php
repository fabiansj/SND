<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class CheckoutTransaksiRepository
{
    public static function index($pid) 
    {
        return DB::select('SELECT a.*,b.* from checkout_transaksi as a
                LEFT JOIN checkout_transaksi_product as b on a.ctid = b.ctid 
                WHERE a.pid = :pid AND a.status = "settlement" ', ['pid' => $pid]);
    }

    public static function insert($data)
    {
        $result = DB::table('checkout_transaksi')->insertGetId($data);
        return $result;
    }
    
    public static function getByPID($pid,$ctid)
    {
        $result = DB::table('checkout_transaksi as a')
                    ->leftJoin('checkout_transaksi_product as b', 'a.ctid', '=', 'b.ctid')
                    ->where('a.pid', $pid)
                    ->where('b.ctid', $ctid)
                    ->get();
        return $result;
        
    }

    public static function getByOrderId($orderId)
    {
        $result = DB::select('SELECT order_id from checkout_transaksi where order_id = :order_id', ['order_id' => $orderId]);
        return $result;
    }

    public static function updateSnapToken($ctid, $token){
        $result = DB::table('checkout_transaksi')->where('ctid', $ctid)->update(['snap_token' => $token]);
        return $result;
    }
    
    public static function updateStatusPayment($ctid, $status){
        $result = DB::table('checkout_transaksi')->where('ctid', $ctid)->update(['status' => $status]);
        return $result;
    }

    public static function updateStatusPayment2($status, $orderId){
        $result = DB::table('checkout_transaksi')->where('order_id', $orderId)->update(['status' => $status]);
        return $result;
    }

    public static function find($payload){
        $result = DB::select('SELECT * from checkout_transaksi where order_id = :order_id', ['order_id' => $payload]);
        return $result;
    }

    public static function getHasNotPaid($pid){
        $result = DB::select('SELECT * from checkout_transaksi where pid = :pid and status = "pending" ', ['pid' => $pid]);
        return $result;
    }

    public static function getHasPaid($pid){
        $result = DB::select('SELECT * from checkout_transaksi where pid = :pid and status = "settlement" ', ['pid' => $pid]);
        return $result;
    }

    public static function getDetailPendingPayment($pid, $status, $ctid) 
    {
        return DB::select('SELECT a.*,b.* from checkout_transaksi as a
                LEFT JOIN checkout_transaksi_product as b on a.ctid = b.ctid 
                WHERE a.pid = :pid AND a.status = :status AND a.ctid = :ctid ', ['pid' => $pid, 'status' => $status, 'ctid' => $ctid]);
    }

    public static function getDetailSettlementPayment($pid, $status, $ctid) 
    {
        return DB::select('SELECT a.*,b.* from checkout_transaksi as a
                LEFT JOIN checkout_transaksi_product as b on a.ctid = b.ctid 
                WHERE a.pid = :pid AND a.status = :status AND a.ctid = :ctid ', ['pid' => $pid, 'status' => $status, 'ctid' => $ctid]);
    }
}