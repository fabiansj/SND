@extends('kelola.layouts.master')

@section('title', 'List Produk')

@section('content')   
    <div class="container-register"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">BUAT AKUN</h3>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{ route('kelola.user.store') }}" method="post">
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
                    <label><i class="fa fa-address-book"></i> Role</label>
                    <select name="role" id="role" required>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> No Telepon</label>
                    <input type="number" name="no_telp" class="form-control" placeholder="no telepon" required>
                </div>
                @if(session('error'))
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register</button>
                <hr>
            </form>
            <div class="back-button-div">
            <a href="{{ route('kelola.user.index') }}" class="btn btn-primary btn-block btn-back"><i class="fa fa-user"></i> Back</a>
            </div>
        </div>
    </div>
    <style>
        .container-register {
            background-color: #f5f5f5; /* Warna latar abu muda */
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
    
        .form-group label {
            font-size: 16px;
            font-weight: bold;
            text-align: left;
            display: block;
            margin-bottom: 10px;
        }
    
        .form-group input[type="text"], 
        .form-group input[type="password"], 
        .form-group input[type="email"], 
        .form-group input[type="number"], 
        .form-group select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
    
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #fda707; /* Warna tombol merah seperti SND */
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
    
        .back-button-div {
            display: flex;
            width: 100%;
            text-align: center;
            height: auto;
        }

        .btn:hover {
            background-color: #fda707;
        }
    
        .text-center {
            text-align: center;
        }
    
        p a {
            color: #fda707;
            text-decoration: none;
        }
    
        p a:hover {
            text-decoration: underline;
        }
    
        hr {
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
    </style>
@endsection
