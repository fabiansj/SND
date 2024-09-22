@extends('kelola.layouts.master')

@section('title', 'List Produk')

@section('content')   
    <div class="container">
        <h1>Edit Users</h1>
        <form action="{{ route('kelola.user.update', $users->pid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label><i class="fa fa-user"></i> Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $users->nama }}" required>
            </div>
            <div class="form-group">
                <label><i class="fa fa-user"></i> Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ $users->username }}" required>
            </div>
            <div class="form-group">
                <label><i class="fa fa-key"></i> Password</label>
                <input type="password" name="password" class="form-control" placeholder="kosongkan jika tidak ingin diubah">
            </div>
            <div class="form-group">
                <label><i class="fa fa-user"></i> Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $users->alamat }}" required>
            </div>
            <div class="form-group">
                <label><i class="fa fa-address-book"></i> Role</label>
                <select name="role" id="role" required>
                    <option value="user" {{ $users->role == 'user' ? 'selected' : ''}}>user</option>
                    <option value="admin" {{ $users->role == 'admin' ? 'selected' : ''}}>admin</option>
                </select>
            </div>
            <div class="form-group">
                <label><i class="fa fa-user"></i> No Telepon</label>
                <input type="number" name="no_telp" class="form-control" placeholder="no telepon" value="{{ $users->no_telp }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
