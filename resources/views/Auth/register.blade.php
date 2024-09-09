@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/produk.jpg') }}" alt="">
        <div style="z-index:3;">
            <p>dsadsdadasdsad</p>
        </div>
    </div>    
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">BUAT AKUN</h3>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{ route('api.auth.register') }}" method="post">
            @csrf
                {{-- <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div> --}}
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> No Telepon</label>
                    <input type="number" name="no_telp" class="form-control" placeholder="no_telp" required>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-address-book"></i> Role</label>
                    <select name="role" id="role" required>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register</button>
                <hr>
                <p class="text-center">Sudah punya akun silahkan <a href="{{ route('auth.login') }}">Login Disini!</a></p>
            </form>
        </div>
    </div>
@endsection
