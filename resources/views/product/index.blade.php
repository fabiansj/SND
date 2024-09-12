@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/produk.jpg') }}" alt="">
        {{-- <div style="z-index:3;">
            <p>dsadsdadasdsad</p>
        </div> --}}
    </div>    
    <!-- Product Section Start -->
    <section class="products" id="products">
        <div class="container-breadcrumb" style="text-align:center;">
        <p>Home > Produk</p>
        </div>               
        <div class="row">
            @foreach ($product as $item)
                <div class="product-card">
                    <div class="products-chevron">
                        <p>SND</p>
                    </div>
                    <img src="{{ asset('img/products/' . $item->url_image) }}">
                    <div class="product-content">
                        <div class="product-price"><span>Rp {{ number_format($item->harga, 0, ',', '.') }}</span></div>
                        <p>{{ $item->nama }}</p>
                        <div class="product-overflow-content">
                            <a href="{{ route('product.detail', [$item->prid]) }}"><i data-feather="alert-circle"></i>&#160;Detail</a>
                            <a href="javascript:void(0);" id="addCart" class="add-to-cart" data-product-id="{{ $item->prid }}"><i data-feather="plus"></i>&#160;Keranjang</a>
                        </div>
                    </div>
                </div>            
            @endforeach
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
                                $.ajax({
                                    url: "{{ route('cart.list') }}",
                                    type: 'GET',
                                    success: function(response) {
                                        console.log(response)      
                                        $('.shopping-cart > h4').remove()
                                        let items = JSON.stringify(response.items)   
                                        let total = response.total_harga                                

                                        $('#cartDataShop').attr('data-items', items);
                                        $('#cartDataShop').attr('data-total', total);
                                        $('#cartDataShop').attr('data-ctid', response.ctid);
                                        const shoppingCart = $('.shopping-cart-produk');
                                        shoppingCart.html('');                                             

                                        if (response.items.length > 0) {
                                            // jika data ada
                                            response.items.forEach(item => {                                
                                                shoppingCart.append(`
                                                    <div class="cart-item">
                                                        <div class="img-detail-cart">
                                                            <img src="{{ asset('img/products/${item.url_image}') }}">
                                                        </div>
                                                        <div class="item-detail">
                                                            <h3>${item.nama_produk}</h3>
                                                            <div class="item-price">
                                                                <span> ${rupiah(item.harga_produk)}</span>
                                                                <button id="remove" class="minus-cart" data-clid="${item.clid}">&minus;</button>
                                                                <span>jumlah: ${item.jumlah_produk}</span>
                                                                <button id="add" class="add-cart" data-clid="${item.clid}">&plus;</button>
                                                                <span>Total: ${rupiah(item.tharga_produk)}</span>
                                                            </div>
                                                        </div>
                                                        <button id="remove" class="remove-cart" data-clid="${item.clid}">&plus;</button>
                                                    </div>
                                                `);
                                            });
                                            
                                            shoppingCart.append(`<h4>Total: <span>${rupiah(response.total_harga)}</span></h4>`);
                                            $('.form-container').css('display','block');                                                                                    
                                        } else {
                                            // Jika keranjang kosong
                                            $('.shopping-cart > h4').append('Keranjang belanja kosong');
                                            $('.shopping-cart > h4').css('margin-top','30px');
                                            $('.form-container').css('display', 'none');
                                        }

                                        $(document).on('click', '.minus-cart', function() {
                                            var clid = $(this).data('clid');
                                            console.log(clid);
                                            // removeItemFromCart(clid);
                                        });

                                        // Event delegation untuk tombol add
                                        $(document).on('click', '.add-cart', function() {
                                            var clid = $(this).data('clid');
                                            console.log(clid);
                                            // addItemToCart(clid);
                                        });

                                        // Event delegation untuk tombol remove
                                        $(document).on('click', '.remove-cart', function() {
                                            var clid = $(this).data('clid');
                                            console.log(clid);
                                            // removeItemFromCart(clid);
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error:', error);
                                        alert('Terjadi kesalahan saat memuat keranjang.');
                                    }
                                });
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
