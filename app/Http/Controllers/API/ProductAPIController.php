<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repository\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ProductAPIController extends Controller
{
    public static function addCart(Request $request)
    {
        try {
            DB::beginTransaction();
            
            ProductRepository::insert($request->prid);
            DB::commit();
            return response()->json(['message' => 'success'], 200);
        } catch (\Throwable $e) {
            DB::rollBack();
            // Log the error message for debugging purposes
            Log::error('Failed to add cart: ' . $e->getMessage());
            return response()->json(['message' => 'failed', 'error' => $e->getMessage()], 500);
        }
    }
}
