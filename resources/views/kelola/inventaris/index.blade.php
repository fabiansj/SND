@extends('kelola.layouts.master')

@section('title', 'List Produk')

@section('content')   
    <div class="container">
        <h1>Daftar Rekap Data</h1>
        <a href="{{ route('kelola.inventaris.create') }}" class="btn btn-primary mb-3">Tambah Inventaris</a>
    
        @if(session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif
    
        <table class="table">
            <thead>
                <tr>                    
                    <th>Nama Barang</th>
                    <th>jumlah</th>
                    <th>harga</th>
                    <th>Dibeli Oleh</th>
                    <th>Dibuat Oleh</th>
                    <th>Fungsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inven as $data)
                <tr>                    
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>{{ $data->harga }}</td>                    
                    <td>{{ $data->nama_pembeli }}</td>
                    <td>{{ $data->pembuat_data }}</td>
                    <td>                        
                        <form action="{{ route('kelola.inventaris.destroy', $data->pmid) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus User ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
