@extends('layouts.master')
@section('content')
    <a href="https://api.whatsapp.com/send/?phone=6283829050592&text&type=phone_number&app_absent=0" class="whatsapp-button"
        target="_blank">
        <img src="{{ asset('img/walogo1.png') }}" alt="WhatsApp">
    </a>

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

    <!-- Menu Section Start -->
    <section class="arrival" id="arrival">
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
        <div class="arrival-button">
            <button>EXPLORE ALL PRODUCT</button>
        </div>
    </section>
    <!-- Menu Section End -->
    `
    <!-- Product Section Start -->
    <section class="products" id="products" x-data="products">
        <h2><span>Produk Unggulan </span>kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quaerat et labore non ullam sapiente.</p>

        <div class="row">
            <template x-for="(item, index) in items" x-key="index">
                <div class="product-card">
                    <div class="product-icons">
                        <a href="#" @click.prevent="$store.cart.add(item)">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <use href="{{ asset('img/feather-sprite.svg#shopping-cart') }}" />
                            </svg>
                        </a>
                        <a href="#" class="item-detail-button">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <use href="{{ asset('img/feather-sprite.svg#eye') }}" />
                            </svg>
                        </a>
                    </div>
                    <div class="product-image">
                        <!-- <img :src="`../img/products/${item.img}`" :alt="item.name"> -->
                        <img :src="`{{ asset('img/products/${item.img}') }}`" :alt="item.name">
                    </div>
                    <div class="product-content">
                        <h3 x-text="item.name"></h3>
                        <div class="product-stars">
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
                        </div>
                        <div class="product-price"><span x-text="rupiah(item.price)"></span></div>
                    </div>
                </div>
            </template>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- About Section Start -->
    <Section class="about" id="about">
        <h2><span>Tentang</span> Kami</h2>
        <div class="row">
            <div class="about-img">
                <img src="{{ asset('img/tentangkami1.jpg') }}" alt="tentang kami">
            </div>
            <div class="content">
                <h3>Kenapa memilih kopi kami?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam eveniet animi sequi molestias culpa!
                    Voluptate.</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis repellendus saepe velit libero eveniet
                    nobis vel dolores fugit ex eligendi.</p>
            </div>
        </div>
    </Section>
    <!-- About Section End -->

    <!-- Contact Section Start -->
    <section class="contact" id="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iste beatae, sunt debitis cum eum.</p>
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.099325122615!2d107.5647087!3d-6.887629!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e42d237a796b%3A0x69aee5fd1ac398c2!2sSND%20Racing!5e0!3m2!1sid!2sid!4v1703272885460!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="nama">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="mail">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="No Hp">
                </div>
                <button type="submit" class="btn">Kirim Pesan</button>
            </form>

        </div>
    </section>
    <!-- Contact Section End -->
@endsection
