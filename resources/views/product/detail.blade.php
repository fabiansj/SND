@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/produk.jpg') }}" alt="">
        <div style="z-index:3;">
            <p>dsadsdadasdsad</p>
        </div>
    </div>    
    <!-- Product Section Start -->
    <div class="products" id="products">
        <div class="container-breadcrumb" style="text-align:center;">
            <p>Product {{ ' > ' . $badge}} {{ ' > ' . $badge2}} {{ ' > ' . $badge3}}</p>
        </div>    
    </div>
    <section class="products-detail" id="products-detail">
        <div class="container-detail" >
            <div class="row">
                <div class="products-detail-content" >
                    <div class="image-detail">
                        <img src="{{ asset('img/products/' . $product->url_image) }}" alt="tentang kami">
                    </div>
                </div>
                <div class="products-detail-content" >
                    <div class="info-detail">
                        <h2>{{ $product->nama }}</h2>
                        <p class="price">IDR {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <p class="item-description">{{ $product->keterangan }}</p>
                        <input type="hidden" id="productID" value="{{ $product->prid }}">
                        {{-- <ul class="specs">
                            <li>VELK SND RAPIDO-501 14" 140/160 BLACK</li>
                            <li>VELK SND RAPIDO-501 14" 140/160 BLUE</li>
                            <li>VELK SND RAPIDO-501 14" 140/160 GOLD</li>
                            <li>VELK SND RAPIDO-501 14" 140/160 RED</li>
                        </ul> --}}
                        <div class="button-detail">
                            <button class="buy-button">Beli Sekarang</button>
                            <button class="buy-button" id="btnCart">Tambah Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#btnCart').on('click', function(e) {
            e.preventDefault();

            var productId = $('#productID').val();

            $.ajax({
                url: " {{ route('api.product.create') }} ",
                type: 'POST',
                data: {
                    prid: productId
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
        });
    </script>
@endsection
