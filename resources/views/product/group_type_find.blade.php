@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/produk.jpg') }}" alt="">
        <div style="z-index:3;">
            <p>dsadsdadasdsad</p>
        </div>
    </div>    
    <!-- Product Section Start -->
    <section class="products" id="products">
        <div class="container-breadcrumb" style="text-align:center;">
            @if (strtolower($method) == 'search')
                <p>Produk {{ '> '. $badge2 }} {{ '> '. $badge3 }} </p>
            @elseif (strtolower($method) == 'group')
                <p>Produk {{ '> '. $badge2 }} </p>
            @elseif (strtolower($method) == 'type')
                <p>Produk {{ '> '. $badge2 }} {{ '> '. $badge3 }} </p>
            @else
                <p>Produk </p>
            @endif 
        </div>               
        <div class="row">
            @if ($product->isEmpty())
            <div class="product-zero">
                <p>Produk Tidak Ada</p>
            </div>    
            @else
            @foreach ($product as $item)
                    <div class="product-card">
                        <div class="products-chevron">
                            <p>SND</p>
                        </div>
                        <img class="img-thumbnail" src="{{ asset('img/products/' . $item->url_image) }}">
                        <div class="product-content">
                            <div class="product-price"><span>Rp {{ number_format($item->harga, 0, ',', '.') }}</span></div>
                            <p>{{ $item->nama }}</p>
                            <div class="product-overflow-content">
                                <a href="{{ route('product.detail', [$item->prid]) }}"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                    &#160;Detail</a>
                                <a href="{{ route('api.product.create', [$item->prid]) }}"><svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                                    &#160;Keranjang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>    
    <!-- Product Section End -->
@endsection
