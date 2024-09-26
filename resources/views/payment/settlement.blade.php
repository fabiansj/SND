@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/produk.jpg') }}" alt="">
    </div>    
    <!-- Product Section Start -->
    <section class="products" id="products">
        <div class="container-breadcrumb" style="text-align:center;">
            <p>Profile {{ '> '. $badge2 }} </p>
        </div>               
        <div class="row">
            @if (empty($product))
            <div class="product-zero">
                <p>anda belum melakukan transaksi </p>
            </div>  
            @else
                @foreach ($product as $item)
                    <div class="product-card-riwayat">
                        <div class="products-chevron-riwayat">
                            <p>SND</p>
                        </div>
                        {{-- <img class="img-thumbnail" src="{{ asset('img/products/' . $item->url_image) }}"> --}}
                        <div class="product-content-riwayat">
                            <div class="product-price-riwayat"><span>Total : Rp {{ number_format($item->final_price, 0, ',', '.') }}</span></div>
                            <div class="product-nama-riwayat"><p>Order ID : {{ $item->order_id }}</p></div>
                            <div class="product-nama-riwayat"><p>Nama penerima : {{ $item->nama }}</p></div>
                            <div class="product-nama-riwayat"><p>Alamat penerima : {{ $item->alamat }}</p></div>
                            <div class="product-nama-riwayat"><p>No Telepon : {{ $item->no_telp }}</p></div>      
                            <div class="product-nama-riwayat"><p>Status Produk : {{ $item->status_produk }}</p></div>                            
                            <div class="product-overflow-content-riwayat">
                                <a href="{{ route('settlement.detail.payment.index', [$item->ctid]) }}"><i data-feather="alert-circle"></i>&#160;Detail
                                </a>
                                @if(Auth::check() && Auth::user()->role === 'admin')
                                <a id="status_sending" class="pay-now {{ $item->status_produk_id >= 3 ? '' : 'status_produk'}}" data-status-id="{{ $item->status_produk_id }}" data-ctid="{{ $item->ctid }}" {{ $item->status_produk_id == 3 ? 'disabled' : ''}}><i data-feather="package"></i>&#160;{{ $item->status_produk }}
                                </a>
                                @else
                                <a id="status_sending" class="pay-now {{ $item->status_produk_id <> 3 ? '' : 'status_produk'}}" data-status-id="{{ $item->status_produk_id }}" data-ctid="{{ $item->ctid }}" {{ $item->status_produk_id == 4 ? 'disabled' : ''}}><i data-feather="package"></i>&#160;{{ $item->status_produk }}
                                </a>
                                @endif                                
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>    
    <!-- Product Section End -->
    <script>    
    $('.status_produk').on('click', function(e){
        e.preventDefault()
        console.log('ya ')
        $.ajax({
            url: "{{ route('set.status.produk') }}",
            type: 'POST',
            data: {
                status_id : $(this).data('status-id'), 
                ctid : $(this).data('ctid'), 
                _token : "{{ csrf_token() }}"
            },
            success: function(response){
                window.location.reload()
            },
            error: function(xhr, status, error){
                console.log('Error:', error);
                Swal.fire({
                    title: "Gagal set status pengiriman produk",
                    icon: "error"
                });
            }
        })
    })
    </script>
@endsection
