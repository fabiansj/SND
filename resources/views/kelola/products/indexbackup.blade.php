@extends('kelola.layouts.master')

@section('title', 'List Produk')

@section('content')
    <div class="container">
        <h1>List Produk</h1>
        <a href="{{ route('kelola.products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
    
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <table class="table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Group</th>
                    <th>Type</th>
                    <th>Warna</th>
                    <th>Stok</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->kode }}</td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->subGroup }}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->warna }}</td>
                    <td>{{ $product->stok }}</td>
                    <td width="350px">{{ $product->keterangan }}</td>
                    <td>
                        <a href="{{ route('kelola.products.edit', $product->prid) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('kelola.products.destroy', $product->prid) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.jenis_product_id').on('change', function(){
            $.ajax({
                url: '{{ route('kelola.products.type') }}',
                type: 'post',
                data: {jenis: $(this).val()},
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(response) {
                    $('#pjid').empty();
                    response.data.forEach(element => {
                        var option = $('<option></option>').html(element.type).attr('value', element.pjid);
                        $('#pjid').append(option);
                    });
                }
            });
        });
    });
</script>
@endpush
