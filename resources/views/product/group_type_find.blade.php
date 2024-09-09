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
                                <a href="{{ route('product.detail', [$item->prid]) }}"><i data-feather="alert-circle"></i>&#160;Detail
                                </a>
                                <a href="javascript:void(0);" id="addCart" class="add-to-cart" data-product-id="{{ $item->prid }}"><i data-feather="plus"></i>&#160;Keranjang
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
    $('.add-to-cart').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id')
        console.log('yes')

        $.ajax({
            url: "{{ route('api.auth.checkLogin') }}",
            type: 'GET',
            success: function(response) {
                if(response.loggedIn){            
                    $.ajax({
                        url: " {{ route('api.product.create') }} ",
                        type: 'POST',
                        data: {pid : productId, detail_produk : true},
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function(response) {
                            // Tangani respons sukses
                            console.log('Success:', response);
                            alert('Produk telah berhasil ditambahkan ke keranjang.');
                        },
                        error: function(xhr, status, error) {
                            // Tangani respons error
                            console.log('Error:', error);
                            alert('Terjadi kesalahan saat menambahkan produk ke keranjang.');
                        }
                    });
                }else{
                    alert('Anda perlu login untuk menambahkan produk.');
                }
            },
            error: function(respons){
                console.log('Error:', response.error);
                alert('Terjadi kesalahan saat memeriksa status login.');
            }
        })
    });
    </script>
@endsection
