@extends('kelola.layouts.master')

@section('title', 'List Produk')

@section('content') 
    <div class="kelola-container">
    <h1>Tambah Produk Baru</h1>    
    {{-- <form action="{{{ route('kelola.products.store') }}}" method="POST" enctype="multipart/form-data"> --}}
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" class="form-control" id="kode" name="kode" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Produk</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
        </div>
        <div class="form-group">
            <label for="jenis_id">Jenis</label>
            <select class="form-control jenis_product_id" id="jenis_product_id">
                <option value="">-- pilih jenis --</option>
                @foreach($jenis as $j)
                    <option value="{{ $j->subGroup }}">{{ $j->subGroup }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_id">Type</label>
            <select class="form-control" id="pjid" name="pjid" style="width:150px" required>
                <option value="">-- pilih tipe --</option>
                {{-- @foreach($type as $t)
                    <option value="{{ $t->pjid }}">{{ $t->type }}</option>
                @endforeach --}}
            </select>
        </div>
        <div class="form-group">
            <label for="warna_id">Warna</label>
            <select class="form-control" id="pwid" name="pwid" required>
                @foreach($warna as $w)
                    <option value="{{ $w->pwid }}">{{ $w->warna }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>


<script>
    $('.jenis_product_id').on('change', function(){
        $.ajax({
            url: '{{ route('kelola.products.type') }}',
            type: 'post',
            data: {jenis: $(this).val()},
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            success: function(response){
                $('#pjid').empty();
                
                response.data.forEach(element => {
                    console.log(element.type)
                    if(response.data.length > 1){
                        var option = $('<option></option>').html(element.type).attr('value', element.pjid).prop('selected', true);
                    }else{
                        var option = $('<option></option>').html('tidak ada tipe').attr('value', element.pjid).prop('selected', true);
                    }
                    $('#pjid').append(option);
                });
            },
            error: function(response){
                console.log(response)

            }
        })
    })
</script>
@endsection
