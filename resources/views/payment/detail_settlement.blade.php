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
                            <div class="product-nama-riwayat""><p>{{ $item->nama }}</p></div>
                            <div class="product-nama-riwayat""><p>Jumlah : {{ $item->jumlah }}</p></div>
                            <div class="product-nama-riwayat""><p>Total Harga : {{ $item->total_harga }}</p></div>
                            {{-- <div class="product-overflow-content-riwayat"> --}}
                                {{-- <a href="{{ route('product.detail', [$item->ctid]) }}"><i data-feather="alert-circle"></i>&#160;Detail
                                </a> --}}
                                {{-- <a href="javascript:void(0);" id="addCart" class="add-to-cart" data-product-id="{{ $item->ctid }}"><i data-feather="plus"></i>&#160;Retur
                                </a> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        {{-- <div class="back-to-payment"><a href="{{ route('pending.payment.index')}}">Kembali ke Pembayaran</a></div> --}}
    </section>    
    <!-- Product Section End -->
    <script>
    // $('.add-to-cart').on('click', function(e) {
    //     e.preventDefault();
    //     var productId = $(this).data('product-id')
    //     console.log('yes')

    //     $.ajax({
    //         url: "{{ route('api.auth.checkLogin') }}",
    //         type: 'GET',
    //         success: function(response) {
    //             if(response.loggedIn){            
    //                 $.ajax({
    //                     url: " {{ route('api.product.create') }} ",
    //                     type: 'POST',
    //                     data: {pid : productId, detail_produk : true},
    //                     headers: {
    //                         'X-CSRF-TOKEN': csrfToken
    //                     },
    //                     success: function(response) {
    //                         // Tangani respons sukses
    //                         console.log('Success:', response);
    //                         alert('Produk telah berhasil ditambahkan ke keranjang.');
    //                     },
    //                     error: function(xhr, status, error) {
    //                         // Tangani respons error
    //                         console.log('Error:', error);
    //                         alert('Terjadi kesalahan saat menambahkan produk ke keranjang.');
    //                     }
    //                 });
    //             }else{
    //                 alert('Anda perlu login untuk menambahkan produk.');
    //             }
    //         },
    //         error: function(respons){
    //             console.log('Error:', response.error);
    //             alert('Terjadi kesalahan saat memeriksa status login.');
    //         }
    //     })
    // });
    </script>
@endsection
