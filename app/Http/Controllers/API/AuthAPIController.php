<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Log;

class AuthAPIController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('home.index');
        }else{
            return view('index');
        }
    }

    public function login(Request $request){
        // dd($request);
        $credentials = $request->only('username', 'password');
        Log::info('Attempting login with:', $credentials);
    
        if (Auth::attempt($credentials)) {
            Log::info('Login successful');
            $request->session()->regenerate();
            return redirect()->route('home.index');
        } else {
            Log::info('Login failed');
            return redirect()->back()->with('error', 'Username atau Password Salah');
        }
    }
    

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register(Request $request)
    {
        // dd($request);
        $user = Pengguna::create([
            // 'email' => $request->email,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'role' => $request->role ?? 'user',
        ]);
        // dd($user);

        if ($user){
            return view('auth.index');
        }else{
            return redirect()->route('auth.register');
        }
    }

    public function checkLogin(){        
        return response()->json(['loggedIn' => Auth::check() ?? 'tidak login', 'role' => Auth::user()->role]);
    }
}
