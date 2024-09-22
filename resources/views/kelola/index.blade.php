@extends('kelola.layouts.master')

@section('title', 'List Produk')

@section('content')   
    <div class="container">
        <h1>Dashboard</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
