<?php

namespace App\Http\Controllers;

use App\Http\Repository\PenggunaRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class KelolaUserController extends Controller
{
    public function index()
    {
        $users = PenggunaRepository::index();
        // dd($users);
        return view('kelola.users.index', compact('users'));
    }

    public function create()
    {
        return view('kelola.users.create');
    }

    public function store(Request $request)
    {        
        $pid = Auth::user()->pid;
        $checkUsername = current(PenggunaRepository::getUsername($request->nama));        
        
        if($checkUsername){
            return redirect()->back()->with('error', 'akun dengan Username '. $request->nama . ' sudah ada')->withInput();
        }
        
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'role' => 'required',
            'no_telp' => 'required',
        ]);
        
        try{        
            DB::beginTransaction();            

            Log::info('Failed to add users: ' . $request);
            Log::error('Failed to add users, request data: ', [
                'request' => $request->all(), // Menampilkan semua request untuk debugging
                'time' => now() // Menambahkan timestamp
            ]);

            DB::table('pengguna')->insert([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
                'role' => $request->role,
                'no_telp' => $request->no_telp,
                'created_at'    => Carbon::now(),
                'create_by'     => $pid,
                'modified_at'   => Carbon::now(),
                'modify_by'     => $pid,
            ]);
            
            DB::commit();
            return redirect()->route('kelola.user.index')->with('success', 'User berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();        
        } catch (\Throwable $e) {
            DB::rollBack();
            // Log the error message for debugging purposes
            Log::error('Error in store method: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
        }
        
    }

    public function edit($id)
    {
        $users = DB::table('pengguna')->where('pid', $id)->first();
        return view('kelola.users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);   
        $pid = Auth::user()->pid;
        $old_password = DB::table('pengguna')->where('pid', $id)->first()->password;
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'role' => 'required',
            'no_telp' => 'required',
        ]);

        DB::table('pengguna')
            ->where('pid', $id)
            ->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => $request->password != null ? Hash::make($request->password) : $old_password,
                'alamat' => $request->alamat,
                'role' => $request->role,
                'no_telp' => $request->no_telp,
                'modified_at'   => Carbon::now(),
                'modify_by'     => $pid,
            ]);

        return redirect()->route('kelola.user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $users = DB::table('pengguna')->where('pid', $id)->first();        
        if ($users) {
            DB::table('pengguna')->where('pid', $id)->delete();
            return redirect()->route('kelola.user.index')->with('success', 'User berhasil dihapus.');
        }else{
            return redirect()->route('kelola.user.index')->with('error', 'User gagal dihapus.');
        }
    }
}
