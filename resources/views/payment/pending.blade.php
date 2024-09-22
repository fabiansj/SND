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
                            <div class="product-overflow-content-riwayat">
                                <a href="{{ route('pending.detail.payment.index', [$item->ctid]) }}"><i data-feather="alert-circle"></i>&#160;Detail
                                </a>
                                <a href="javascript:void(0);" id="pay-now" class="pay-now" data-snap-token="{{ $item->snap_token }}"><i data-feather="send"></i>&#160;Bayar
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>    
    <!-- Product Section End -->
    <script>
    
    $(document).on('click', '#pay-now', function(){
        var snap_token = $(this).data('snap-token')
        console.log(snap_token)
        paymentNow(snap_token)
    })
    </script>
@endsection
