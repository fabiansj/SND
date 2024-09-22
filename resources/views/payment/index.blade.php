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
                        <img class="img-thumbnail" src="{{ asset('img/products/' . $item->url_image) }}">
                        <div class="product-content-riwayat">
                            <div class="product-price-riwayat"><span>Rp {{ number_format($item->harga, 0, ',', '.') }}</span></div>
                            <div class="product-nama-riwayat""><p >{{ $item->nama }}</p></div>
                            <div class="product-overflow-content-riwayat">
                                <a href="{{ route('product.detail', [$item->ctid]) }}"><i data-feather="alert-circle"></i>&#160;Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>    
    <!-- Product Section End -->
@endsection
