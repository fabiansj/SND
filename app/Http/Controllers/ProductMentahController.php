<?php

namespace App\Http\Controllers;

use App\Http\Repository\ProductMentahRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductMentahController extends Controller
{
    public function index(){
        $inven = ProductMentahRepository::index();
        
        return view('kelola.inventaris.index', compact('inven'));
    }

    public function store(Request $request){
        // dd($request);
        try {
            DB::beginTransaction();            
            $payload = [
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'nama_pembeli' => $request->nama_pembeli,
                'created_at' => Carbon::now(),
                'create_by' => Auth::user()->pid,
                'modified_at' => Carbon::now(),
                'modify_by' => Auth::user()->pid,
            ];
            $inven = ProductMentahRepository::insert($payload);
            DB::commit();            
            return redirect()->route('kelola.inventaris.index')->with('success', 'Data Rekap berhasil ditambah!');
        } catch (\Throwable $e) {
            DB::rollBack();
            // Log the error message for debugging purposes
            Log::error('Failed to add produk mentah: ' . $e->getMessage());
            return redirect()->route('kelola.inventaris.index')->withErrors(['message' => 'Penghapusan gagal!', 'error' => $e->getMessage()]);
        }        
    }

    public function create(){
        return view('kelola.inventaris.create');
    }

    public function destroy($pmid){        
        try{
            DB::beginTransaction();                        
            $delete = ProductMentahRepository::delete($pmid);
            DB::commit();            
            return redirect()->route('kelola.inventaris.index')->with('success', 'Data Rekap berhasil dihapus!');

        }catch (\Throwable $e){
            DB::rollBack();
            return redirect()->route('kelola.inventaris.index')->withErrors(['message' => 'Penghapusan gagal!', 'error' => $e->getMessage()]);
        }
    }
}
