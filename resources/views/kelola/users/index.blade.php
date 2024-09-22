@extends('kelola.layouts.master')

@section('title', 'List Produk')

@section('content')   
    <div class="container">
        <h1>Daftar Users</h1>
        <a href="{{ route('kelola.user.create') }}" class="btn btn-primary mb-3">Tambah User</a>
    
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No.Telp</th>
                    <th>Role</th>
                    <th>Dibuat Oleh</th>
                    <th>Diedit Oleh</th>
                    <th>Fungsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->alamat }}</td>
                    <td>{{ $user->no_telp }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->nama_pembuat }}</td>
                    <td>{{ $user->nama_pengedit }}</td>
                    <td>
                        <a href="{{ route('kelola.user.edit', $user->pid) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('kelola.user.destroy', $user->pid) }}" method="POST" style="display: inline;">
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
