@extends('kelola.layouts.master')

@section('title', 'List Produk')

@section('content')    
    <div class="container">
        <h1>Edit Produk</h1>
        <form action="{{ route('kelola.products.update', $product->prid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->nama }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}" required>
            </div>
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" class="form-control" id="kode" name="kode" value="{{ $product->kode }}" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $product->keterangan }}</textarea>
            </div>
            <div class="form-group">
                <label for="jenis_id">Jenis</label>
                <select class="form-control">
                    @foreach($jenis as $j)
                        <option value="" {{ $product->subGroup == $j->subGroup ? 'selected' : '' }}>{{ $j->subGroup }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_id">Type</label>
                <select class="form-control" id="jenis_id" name="jenis_id" required>
                    @foreach($type as $t)
                        <option value="{{ $t->pjid }}" {{ $product->pjid == $t->pjid ? 'selected' : '' }}>{{ $t->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="warna_id">Warna</label>
                <select class="form-control" id="warna_id" name="warna_id" required>
                    @foreach($warna as $w)
                        <option value="{{ $w->pwid }}" {{ $product->pwid == $w->pwid ? 'selected' : '' }}>{{ $w->warna }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $product->stok }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
