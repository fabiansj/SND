@extends('layouts.master')
@section('content')
    <!-- Hero Section Start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Spare Part <span>Berkualitas</span></h1>
            <p>Ayo temukan suku cadang motor berkualitas di sini! Kami siap membantu perawatan motor Anda dengan harga
                terjangkau.</p>
            <a href="#" class="cta">Cek Produk Sekarang</a>
        </main>
    </section>
    <!-- Hero Section End -->

    <!-- Arrival Section Start -->
    <section class="arrival" id="arrival">
        <div style="text-align: center;">
            <img src="{{ asset('img/icon_m.png') }}" alt="mini_icon_snd">
        </div>
        <h2><span>NEW</span> ARRIVAL</h2>
        <div class="row">
            <div class="arrival-card">
                <div class="arrival-new-product">
                    <p>NEW PRODUCT</p>
                </div>
                <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                <img src="{{ asset('img/menu/7302velk_mx_king.png') }}" alt="expresso">
                <div class="arrival-card-content">
                    <p class="arrival-card-price">IDR 1.235.000</p>
                    <h3 class="arrival-card-title">
                        - SND RAPIDO-501 MX KING -
                    </h3>
                    <div class="arrival_detail_show">
                        <a><I data-feather="search"></I> Detail Product</a>
                    </div>
                </div>
            </div>
            <div class="arrival-card">
                <div class="arrival-new-product">
                    <p>NEW PRODUCT</p>
                </div>
                <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                <img src="{{ asset('img/menu/7302velk_mx_king.png') }}" alt="expresso">
                <div class="arrival-card-content">
                    <p class="arrival-card-price">IDR 1.235.000</p>
                    <h3 class="arrival-card-title">
                        - SND RAPIDO-501 MX KING -
                    </h3>
                    <div class="arrival_detail_show">
                        <a><I data-feather="search"></I> Detail Product</a>
                    </div>
                </div>
            </div>
            <div class="arrival-card">
                <div class="arrival-new-product">
                    <p>NEW PRODUCT</p>
                </div>
                <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                <img src="{{ asset('img/menu/7302velk_mx_king.png') }}" alt="expresso">
                <div class="arrival-card-content">
                    <p class="arrival-card-price">IDR 1.235.000</p>
                    <h3 class="arrival-card-title">
                        - SND RAPIDO-501 MX KING -
                    </h3>
                    <div class="arrival_detail_show">
                        <a><I data-feather="search"></I> Detail Product</a>
                    </div>
                </div>
            </div>
            <div class="arrival-card">
                <div class="arrival-new-product">
                    <p>NEW PRODUCT</p>
                </div>
                <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                <img src="{{ asset('img/menu/7302velk_mx_king.png') }}" alt="expresso">
                <div class="arrival-card-content">
                    <p class="arrival-card-price">IDR 1.235.000</p>
                    <h3 class="arrival-card-title">
                        - SND RAPIDO-501 MX KING -
                    </h3>
                    <div class="arrival_detail_show">
                        <a><I data-feather="search"></I> Detail Product</a>
                    </div>
                </div>
            </div>
            <div class="arrival-card">
                <div class="arrival-new-product">
                    <p>NEW PRODUCT</p>
                </div>
                <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                <img src="{{ asset('img/menu/7302velk_mx_king.png') }}" alt="expresso">
                <div class="arrival-card-content">
                    <p class="arrival-card-price">IDR 1.235.000</p>
                    <h3 class="arrival-card-title">
                        - SND RAPIDO-501 MX KING -
                    </h3>
                    <div class="arrival_detail_show">
                        <a><I data-feather="search"></I> Detail Product</a>
                    </div>
                </div>
            </div>
            <div class="arrival-card">
                <div class="arrival-new-product">
                    <p>NEW PRODUCT</p>
                </div>
                <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                <img src="{{ asset('img/menu/7302velk_mx_king.png') }}" alt="expresso">
                <div class="arrival-card-content">
                    <p class="arrival-card-price">IDR 1.235.000</p>
                    <h3 class="arrival-card-title">
                        - SND RAPIDO-501 MX KING -
                    </h3>
                    <div class="arrival_detail_show">
                        <a><I data-feather="search"></I> Detail Product</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="arrival-button">
            <button><a href="{{ asset('product') }}" style="color:white;">EXPLORE ALL PRODUCT</a></button>
        </div> --}}
    </section>
    <!-- Arrival Section End -->
    <section>
        <div class="checktoallproduct">
            <p>MAU CARI PRODUK LAINNYA ? <span><a href="{{ asset('product') }}">KLIK DISINI</a></span></p>
        </div>
    </section>
    <!-- Product Section Start -->
    <section class="products" id="products" x-data="products">
        <div style="text-align: center; margin-top:30px;">
            <img src="{{ asset('img/icon_m.png') }}" alt="mini_icon_snd">
        </div>
        <h2><span>PRODUK </span>PILIHAN</h2>
        <div class="products-text-title">
            <p class="text-title">Produk-produk unggulan kami , dengan riset yang mendalam dan uji coba di lapangan secara
                maksimal, produk kami presisi, aman serta layak menjadi bagian dari kendaraan juara Anda.
            </p>
        </div>
        <!-- <div class="line"></div>
                                                                                    <div class="products-groups-button">
                                                                                        <a href="#">DIRT BIKE</a>
                                                                                        <a href="#">VLEG RAPIDO</a>
                                                                                        <a href="#">CNC PORTING</a>
                                                                                        <a href="#">BLOK KOPLING & ENGINE</a>
                                                                                        <a href="#">MUFFLER</a>
                                                                                        <a href="#">CARBURETOR</a>
                                                                                        <a href="#">MOTORCROSS PART</a>
                                                                                        <a href="#">RACING & DAILY</a>
                                                                                    </div>
                                                                                    <div class="line"></div> -->
        <div class="row">
            <template x-for="(item, index) in items" x-key="index">
                <div class="product-card">
                    <div class="products-chevron">
                        <p>SND</p>
                    </div>
                    <img src="{{ asset('img/products/velgmio.png') }}" alt="vleg_mio">
                    <!-- <div class="product-icons" >
                                                                                                                                                                                                                                                                                        <a href="#" @click.prevent="$store.cart.add(item)">
                                                                                                                                                                                                                                                                                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                                                                                                                                                                                                                                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                                                                                                                                                                                                                                            <use href="{{ asset('img/feather-sprite.svg#shopping-cart') }}" />
                                                                                                                                                                                                                                                                                        </svg>
                                                                                                                                                                                                                                                                                    </a>
                                                                                                                                                                                                                                                                                        ini adalah bagian gambar tambah ke cart dan detail
                                                                                                                                                                                                                                                                                        <a href="#" class="item-detail-button">
                                                                                                                                                                                                                                                                                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                                                                                                                                                                                                                                                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                                                                                                                                                                                                                                                <use href="{{ asset('img/feather-sprite.svg#eye') }}" />
                                                                                                                                                                                                                                                                                            </svg>
                                                                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                                                                    </div>                 -->
                    <!-- <div class="product-stars">
                                                                                                                                                                                                                                                                                        <svg width="24" height="24" fill="currentColor" stroke="currentColor"
                                                                                                                                                                                                                                                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                                                                                                                                                                                                                                            <use href="{{ asset('img/feather-sprite.svg#star') }}" />
                                                                                                                                                                                                                                                                                        </svg>
                                                                                                                                                                                                                                                                                        <svg width="24" height="24" fill="currentColor" stroke="currentColor"
                                                                                                                                                                                                                                                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                                                                                                                                                                                                                                            <use href="{{ asset('img/feather-sprite.svg#star') }}" />
                                                                                                                                                                                                                                                                                        </svg>
                                                                                                                                                                                                                                                                                        <svg width="24" height="24" fill="currentColor" stroke="currentColor"
                                                                                                                                                                                                                                                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                                                                                                                                                                                                                                            <use href="{{ asset('img/feather-sprite.svg#star') }}" />
                                                                                                                                                                                                                                                                                        </svg>
                                                                                                                                                                                                                                                                                        <svg width="24" height="24" fill="currentColor" stroke="currentColor"
                                                                                                                                                                                                                                                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                                                                                                                                                                                                                                            <use href="{{ asset('img/feather-sprite.svg#star') }}" />
                                                                                                                                                                                                                                                                                        </svg>
                                                                                                                                                                                                                                                                                        <svg width="24" height="24" fill="currentColor" stroke="currentColor"
                                                                                                                                                                                                                                                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                                                                                                                                                                                                                                            <use href="{{ asset('img/feather-sprite.svg#star') }}" />
                                                                                                                                                                                                                                                                                        </svg>
                                                                                                                                                                                                                                                                                    </div> -->
                    <div class="product-content">
                        <div class="product-price"><span x-text="rupiah(item.price)"></span></div>
                        <p x-text="item.name"></p>
                        <div class="product-overflow-content">
                            <a><i data-feather="circle"></i> Detail Product</a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        {{-- <div class="arrival-button">
            <button><a href="{{ asset('product') }}" style="color:white;">EXPLORE ALL PRODUCT</a></button>
        </div> --}}
    </section>
    <!-- Product Section End -->
@endsection
