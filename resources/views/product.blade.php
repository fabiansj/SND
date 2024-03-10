@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/produk.jpg') }}" alt="">
        <div style="z-index:3;">
            <p>dsadsdadasdsad</p>
        </div>
    </div>    
    <!-- Product Section Start -->
    <section class="products" id="products" x-data="products">       
        <div class="container-breadcrumb" style="text-align:center;">
        Home > Product
        </div>               
        <div class="row">
            <template x-for="(item, index) in items" x-key="index">
                <div class="product-card">
                    <div class="products-chevron">
                        <p>SND</p>
                    </div>
                    <img src="{{ asset('img/products/velgmio.png') }}" alt="velg_mio">
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
                            <a><i data-feather="circle"></i> Tambah ke Cart</a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div class="arrival-button">
            <button><a href="{{ asset('product') }}" style="color:white;">EXPLORE ALL PRODUCT</a></button>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
