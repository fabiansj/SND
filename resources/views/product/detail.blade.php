@extends('layouts.master')
@section('content')

    <div class="hero-img">
        <img src="{{ asset('img/produk.jpg') }}" alt="">
        {{-- <div style="z-index:3;">
            <p>dsadsdadasdsad</p>
        </div> --}}
    </div>    
    <!-- Product Section Start -->
    <div class="products" id="products">
        <div class="container-breadcrumb">
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
                        <p class="price" value="{{ $product->harga }}" id="price">IDR {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <p class="item-description">{{ $product->keterangan }}</p>
                        <p class="item-stock">Stok : {{ $currentStock != 0 ? $currentStock : 0  }}</p>
                        <input type="hidden" id="productID" value="{{ $product->prid }}">
                        <div class="button-detail">
                            <button class="buy-button" id="buyNow" {{ $currentStock == 0 ? 'disabled' : ''  }}>Beli Sekarang</button>
                            <button class="buy-button" id="btnCart" {{ $currentStock == 0 ? 'disabled' : ''  }}>Tambah Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <script>
        $(document).ready(function(){
            console.log('{{ $product->harga }}')
        })
        
        $('#btnCart').on('click', function(e) {
            e.preventDefault();

            var productId = $('#productID').val();

            payload = {
                prid: productId,
                nama: '{{ $product->nama }}',
                warna: '{{ $product->warna }}',
                // jumlah: 1,
                harga: '{{ $product->harga }}',
            }

            $.ajax({
                url: "{{ route('api.auth.checkLogin') }}",
                type: 'GET',
                success: function(response) {
                    if(response.loggedIn){      
                        if (response.role != 'admin'){      
                        $.ajax({
                            url: " {{ route('api.product.create') }} ",
                            type: 'POST',
                            data: payload,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            success: function(response) {
                                // Tangani respons sukses
                                console.log('Success:', response);
                                // alert('Produk telah berhasil ditambahkan ke keranjang.');
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
                                        Swal.fire({
                                            title: "Terjadi kesalahan saat memuat keranjang.",
                                            icon: "error"
                                        });
                                    }
                                });
                            },
                            error: function(xhr, status, error) {
                                // Tangani respons error
                                console.log('Error:', error);                                
                                Swal.fire({
                                    title: "Stok Barang Habis",
                                    icon: "error"
                                });
                            }
                        });
                        }else{
                            Swal.fire({
                                title: "Gunakan akun user untuk belanja",
                                icon: "error"
                            });
                            $('.shopping-cart > h4').empty();
                            $('.shopping-cart > h4').append('Silahkan menggunakan akun user untuk belanja');
                            $('.shopping-cart > h4').css('margin-top','30px');
                            $('.form-container').css('display', 'none'); 
                        }
                    }else{
                        Swal.fire({
                            title: "Anda Perlu login untuk menambahkan produk",
                            icon: "error"
                        });
                    }
                },
                error: function(response){
                    console.log('Error:', response);
                    Swal.fire({
                        title: "Anda perlu login untuk menambahkan produk",
                        icon: "error"
                    });
                }
            })
        });

        $('#buyNow').on('click', function() {
            var prid = $('#productID').val()
            console.log(prid)
            $.ajax({
                url: "{{ route('api.auth.checkLogin') }}",
                type: 'GET',
                success: function(response) {
                    if(response.loggedIn){     
                        if (response.role != 'admin'){
                            $.ajax({
                            url: '{{ route('checkout.now') }}',
                            type: 'POST',
                            data: { prid: prid},
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            success: function (response) {
                                console.log('Success:', response);
                                console.log('token: ', response.snap_token)
                                // Anggap snap_token adalah token yang Anda terima dari respons API
                                paymentNow(response.snap_token, prid)
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                                Swal.fire({
                                    title: "Bayar Sekarang Gagal!",
                                    icon: "error"
                                });
                            },
                        });
                        }else{
                            // alert('akun Admin tidak dapat belanja ');
                            Swal.fire({
                                title: "Gunakan akun user untuk belanja",
                                icon: "error"
                            });
                            $('.shopping-cart > h4').empty();
                            $('.shopping-cart > h4').append('Silahkan menggunakan akun user untuk belanja');
                            $('.shopping-cart > h4').css('margin-top','30px');
                            $('.form-container').css('display', 'none'); 
                        }
                    }else{
                        // alert('Anda perlu login untuk menambahkan produk.');
                        Swal.fire({
                            title: "Anda perlu login untuk menambahkan produk",
                            icon: "error"
                        });
                    }
                },
                error: function(response){
                    console.log('Error:', response);
                    Swal.fire({
                            title: "Anda perlu login untuk menambahkan produk",
                            icon: "error"
                    });
                }
            })
        })
    </script>
@endsection
