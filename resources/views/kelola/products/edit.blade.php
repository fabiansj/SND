@extends('kelola.layouts.master')

@section('title', 'Edit Produk')

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
                <label for="jenis_product_id">Jenis</label>
                <select class="form-control jenis_product_id" id="jenis_product_id" name="jenis_product_id">
                    <option value="">-- pilih jenis --</option>
                    @foreach($jenis as $j)
                        <option value="{{ $j->subGroup }}" {{ $product->subGroup == $j->subGroup ? 'selected' : '' }}>{{ $j->subGroup }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_id">Type</label>
                <select class="form-control" id="jenis_id" name="jenis_id" required>
                    <option value="">-- pilih tipe --</option>
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
    
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Function to load types
            function loadTypes(selectedJenis) {
                $.ajax({
                    url: '{{ route('kelola.products.type') }}',
                    type: 'POST',
                    data: { jenis: selectedJenis },
                    dataType: 'json',
                    success: function(response) {
                        $('#jenis_id').empty().append('<option value="">-- pilih tipe --</option>');
                        if (response.data && response.data.length > 0) {
                            response.data.forEach(function(element) {
                                var option = $('<option></option>')
                                    .text(element.type || element.subGroup)
                                    .attr('value', element.pjid);
                                $('#jenis_id').append(option);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        console.log(xhr.responseText);
                        $('#jenis_id').empty().append($('<option></option>')
                            .text('Error loading types')
                            .attr('value', ''));
                    }
                });
            }

            // Load types on page load if jenis is already selected
            var initialJenis = $('#jenis_product_id').val();
            if (initialJenis) {
                loadTypes(initialJenis);
            }

            // Load types when jenis changes
            $('#jenis_product_id').on('change', function() {
                var selectedJenis = $(this).val();
                if (selectedJenis) {
                    loadTypes(selectedJenis);
                } else {
                    $('#jenis_id').empty().append('<option value="">-- pilih tipe --</option>');
                }
            });
        });
    </script>
@endsection