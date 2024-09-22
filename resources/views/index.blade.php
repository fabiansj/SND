@extends('layouts.master')
@section('content')
    <!-- Hero Section Start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Spare Part <span>Berkualitas</span></h1>
            <p>Ayo temukan suku cadang motor berkualitas di sini! Kami siap membantu perawatan motor Anda dengan harga
                terjangkau.</p>
            <a href="{{ route('product.index')}}" class="cta">Cek Produk Sekarang</a>
        </main>
    </section>
    <!-- Hero Section End -->

    <!-- New Arrival Section Start -->
    <section class="arrival" id="arrival">
        {{--<div style="text-align: center;">
            <img src="{{ asset('img/icon_m.png') }}" alt="mini_icon_snd">
        </div>--}}
        <h2><span>NEW</span> ARRIVAL</h2>
        <div class="row">
            @foreach ($productDesc as $item)
            <div class="arrival-card">
                <div class="arrival-new-product">
                    <p>NEW PRODUCT</p>
                </div>
                <!-- <img src="../img/products/menu1.jpg" alt="expresso"> -->
                <img src="{{ asset('img/products/' . $item->url_image) }}">
                <div class="arrival-card-content">
                    <p class="arrival-card-price">IDR {{ number_format($item->harga, 0, ',', '.') }}</p>
                    <h3 class="arrival-card-title">
                        - {{ $item->nama }} -
                    </h3>
                    <div class="arrival_detail_show">
                        <a href="{{ route('product.detail', [$item->prid]) }}">Detail Product</a>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
        {{-- <div class="arrival-button">
            <button><a href="{{ asset('product') }}" style="color:white;">EXPLORE ALL PRODUCT</a></button>
        </div> --}}
    </section>
    <!-- New Arrival Section End -->
    <section>
        <div class="checktoallproduct">
            <p>MAU CARI PRODUK LAINNYA ? <span><a href="{{ asset('product') }}">KLIK DISINI</a></span></p>
        </div>
    </section>
    <!-- Product Pilihan Section Start -->
    <section class="products" id="products" x-data="products">
        {{--<div style="text-align: center; margin-top:30px;">
            <img src="{{ asset('img/icon_m.png') }}" alt="mini_icon_snd">
        </div>--}}
        <h2><span>PRODUK </span>PILIHAN</h2>
        <div class="products-text-title">
            <p class="text-title">Produk-produk unggulan kami , dengan riset yang mendalam dan uji coba di lapangan secara
                maksimal, produk kami presisi, aman serta layak menjadi bagian dari kendaraan juara Anda.
            </p>
        </div>        
        <div class="row">
            @foreach($product as $item)            
            <div class="product-card">
                <div class="products-chevron">
                    <p>SND</p>
                </div>
                <img src="{{ asset('img/products/'. $item->url_image) }}" alt="velg_mio">
                <div class="product-content">
                    <div class="product-price"><span>{{ number_format($item->harga, 0, ',', '.') }}</span></div>
                    <p>{{ $item->nama }}</p>
                    <div class="product-overflow-content">
                        <a href="{{ route('product.detail', [$item->prid]) }}"> Detail Product</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>                
    </section>
    <!-- Product Pilihan Section End -->
@endsection
