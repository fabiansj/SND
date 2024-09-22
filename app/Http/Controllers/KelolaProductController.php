<?php

namespace App\Http\Controllers;

use App\Http\Repository\ProductRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class KelolaProductController extends Controller
{
    public function index()
    {
        $products = ProductRepository::getAllData();
        
        return view('kelola.products.index', compact('products'));
    }

    public function create()
    {
        $jenis = DB::table('product_jenis')->select('subGroup')->distinct()->get();
        $type = DB::table('product_jenis')->get();
        $warna = DB::table('product_warna')->get();
        // dd($jenis);
        return view('kelola.products.create', compact('jenis', 'warna', 'type'));
    }

    public function store(Request $request)
    {        
        $pid = Auth::user()->pid;
        // dd($request->all());
        $checkProduct = ProductRepository::checkName($request->nama);        
        if($checkProduct){
            return redirect()->back()->with('error', 'Data Sudah Ada')->withInput();            
        }
        
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kode' => 'unique:product',
            'keterangan' => 'required',
            'pjid' => 'required|exists:product_jenis,pjid',
            'pwid' => 'required|exists:product_warna,pwid',
            'stok' => 'required|integer',
            'gambar' => 'file|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        try{        
            DB::beginTransaction();            

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('img/products'), $gambarName);
            }
            
            $gambarName = '';
            Log::info('Failed to add cart: ' . $request);
            Log::info('File uploaded: ' . $gambarName. ' at ' . now());
            Log::error('Failed to add cart, request data: ', [
                'request' => $request->all(), // Menampilkan semua request untuk debugging
                'time' => now() // Menambahkan timestamp
            ]);

            $getPRID = DB::table('product')->insertGetId([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'kode' => $request->kode,
                'pjid' => $request->pjid,
                'keterangan' => $request->keterangan,
                'created_at'    => Carbon::now(),
                'create_by'     => $pid,
                'modified_at'   => Carbon::now(),
                'modify_by'     => $pid,
            ]);
            
            $getPSID = DB::table('product_stok')->insertGetId([
                'stok' => $request->stok,
            ]);
                        
            DB::table('product_detail')->insert([
                'prid' => $getPRID, 
                'pwid' => $request->pwid,
                'psid' => $getPSID,
                'url_image' => $gambarName,
            ]);
            DB::commit();
            return redirect()->route('kelola.products.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();        
        } catch (\Throwable $e) {
            DB::rollBack();
            // Log the error message for debugging purposes
            Log::error('Error in store method: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan dalam input data produk')->withInput();
        }
        
    }

    public function edit($id)
    {
        $allProduct = DB::table('product')->where('prid', $id)->first();
        $jenis = DB::table('product_jenis')->select('subGroup')->distinct()->get();
        $type = DB::table('product_jenis')->whereNotNull('type')->where('type', '!=', '')->get();
        $warna = DB::table('product_warna')->get();
        $product = ProductRepository::getDetail($id);
        // dd($warna);
        // dd($product,$jenis);
        return view('kelola.products.edit', compact('product', 'jenis', 'warna', 'allProduct', 'type'));
    }

    public function update(Request $request, $id)
    {
        $pid = Auth::user()->pid;
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kode' => 'required',
            'keterangan' => 'required',
            'jenis_id' => 'required|exists:product_jenis,pjid',
            'warna_id' => 'required|exists:product_warna,pwid',
            'stok' => 'required|integer',
        ]);

        DB::table('product')
            ->where('prid', $id)
            ->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'pjid' => $request->jenis_id,
                'keterangan' => $request->keterangan,
                'modified_at'   => Carbon::now(),
                'modify_by'     => $pid,
            ]);


        DB::table('product_stok')
            ->where('psid', $id)
            ->update([
                'stok' => $request->stok,
            ]);

        DB::table('product_detail')
            ->where('pdid', $id)
            ->update([
                'pwid' => $request->warna_id,
            ]);

        return redirect()->route('kelola.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = DB::table('product_detail')->where('prid', $id)->first();        
        DB::table('product_detail')->where('prid', $id)->delete();
        DB::table('product_stok')->where('psid', $product->psid)->delete();
        if ($product && $product->url_image) {
            $filePath = public_path('img/products/' . $product->url_image);
            
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        DB::table('product')->where('prid', $id)->delete();
        return redirect()->route('kelola.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function getType(Request $request){        
        $data = DB::table('product_jenis')
                ->whereRaw('LOWER(subGroup) LIKE ?', ['%' . strtolower($request->jenis) . '%'])
                ->get();
        // dd($data);
        return response()->json(['data' => $data]);
    }
}
