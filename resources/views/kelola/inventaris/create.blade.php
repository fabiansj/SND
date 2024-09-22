@extends('kelola.layouts.master')

@section('title', 'List Produk')

@section('content')   
    <div class="container-register"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">Tambah Data Inventaris</h3>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{ route('kelola.inventaris.store') }}" method="post">
            @csrf
                {{-- <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div> --}}
                <div class="form-group">
                    <label></i> Nama Barang</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label></i> Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                </div>
                <div class="form-group">
                    <label></i> Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                </div>
                <div class="form-group">
                    <label></i> Nama Pembeli</label>
                    <input type="text" name="nama_pembeli" class="form-control" placeholder="nama pembeli" required>
                </div>
                @if(session('error'))
                    <div class="alert alert-success" style="text-align: center">
                        {{ session('error') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary btn-block"></i> Tambah Barang</button>
                <hr>
            </form>
            <div class="back-button-div">
            <a href="{{ route('kelola.inventaris.index') }}" class="btn btn-primary btn-block btn-back"> Back</a>
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
