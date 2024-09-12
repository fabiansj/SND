@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/produk.jpg') }}" alt="">
        {{-- <div style="z-index:3;">
            <p>dsadsdadasdsad</p>
        </div> --}}
    </div>    
    <form action="{{ route('api.auth.login')}}" method="POST">
        @csrf
        <label for="">Username</label>
        <input type="text" id="username" name="username" required>
        {{-- <input type="text" id="email" name="email" required> --}}
        <label for="">Password</label>
        <input type="password" id="password" name="password" required>
        <button id="login-account-button" type="submit">Masuk</button>
        <p class="text-center">Belum punya akun? <a href=" {{ route('auth.register') }}">Register</a> sekarang!</p>
    </form>
    <style>
    label{
        text-align: center;
    }
    form {
        background-color: #f5f5f5; /* Warna latar abu muda */
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        margin-top: 10px;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #fda707; /* Warna tombol merah seperti SND */
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #fda707;
    }

    p {
        text-align: center;
        margin-top: 20px;
    }

    p a {
        color: #fda707;
        text-decoration: none;
    }

    p a:hover {
        text-decoration: underline;
    }
    </style>
@endsection
