@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/produk.jpg') }}" alt="">
        <div style="z-index:3;">
            <p>dsadsdadasdsad</p>
        </div>
    </div>    
    <form action="{{ route('api.auth.login')}}" method="POST">
        @csrf
        <input type="text" id="username" name="username" required>
        {{-- <input type="text" id="email" name="email" required> --}}
        <input type="password" id="password" name="password" required>
        <button id="login-account-button" type="submit">Masuk</button>
        <p class="text-center">Belum punya akun? <a href=" {{ route('auth.register') }}">Register</a> sekarang!</p>
    </form>
@endsection
