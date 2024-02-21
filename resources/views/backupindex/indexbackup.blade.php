<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Kopi Kenangan Senja</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

        @include('partials.styles')
    </head>
    <body>        
        <!-- Navbar Start -->
        @include('partials.header')
        <!-- Navbar End -->

        <!-- Hero Section Start -->
        <section class="hero" id="home">
            <main class="content">
                <h1>Mari Nikmati Secangkir <span>Kopi</span></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, quaerat.</p>
                <a href="#" class="cta">Beli Sekarang</a>
            </main>
        </section>
        <!-- Hero Section End -->

        <!-- About Section Start -->
        <Section class="about" id="about">
            <h2><span>Tentang</span> Kami</h2>
            <div class="row">
                <div class="about-img">                
                    <img src="{{ asset('img/tentangkami1.jpg') }}" alt="tentang kami">                    
                </div>
                <div class="content">
                    <h3>Kenapa memilih kopi kami?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam eveniet animi sequi molestias culpa! Voluptate.</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis repellendus saepe velit libero eveniet nobis vel dolores fugit ex eligendi.</p>
                </div>
            </div>
        </Section>
        <!-- About Section End -->

        <!-- Menu Section Start -->
        <section class="menu" id="menu">
            <h2><span>Menu</span> Kami</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iste beatae, sunt debitis cum eum.</p>
            <div class="row">
                <div class="menu-card">
                    <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                    <img src="{{ asset('img/menu/menu1.jpg') }}" alt="expresso">
                    <h3 class="menu-card-title">
                    - Expresso -
                    </h3>
                    <p class="menu-card-price">IDR 30K</p>
                </div>                
                <div class="menu-card">
                    <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                    <img src="{{ asset('img/menu/menu1.jpg') }}" alt="expresso">
                    <h3 class="menu-card-title">
                    - Expresso -
                    </h3>
                    <p class="menu-card-price">IDR 30K</p>
                </div>                
                <div class="menu-card">
                    <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                    <img src="{{ asset('img/menu/menu1.jpg') }}" alt="expresso">
                    <h3 class="menu-card-title">
                    - Expresso -
                    </h3>
                    <p class="menu-card-price">IDR 30K</p>
                </div>                
                <div class="menu-card">
                    <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                    <img src="{{ asset('img/menu/menu1.jpg') }}" alt="expresso">
                    <h3 class="menu-card-title">
                    - Expresso -
                    </h3>
                    <p class="menu-card-price">IDR 30K</p>
                </div>                
                <div class="menu-card">
                    <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                    <img src="{{ asset('img/menu/menu1.jpg') }}" alt="expresso">
                    <h3 class="menu-card-title">
                    - Expresso -
                    </h3>
                    <p class="menu-card-price">IDR 30K</p>
                </div>                
                <div class="menu-card">
                    <!-- <img src="../img/menu/menu1.jpg" alt="expresso"> -->
                    <img src="{{ asset('img/menu/menu1.jpg') }}" alt="expresso">
                    <h3 class="menu-card-title">
                    - Expresso -
                    </h3>
                    <p class="menu-card-price">IDR 30K</p>
                </div>                
            </div>
        </section>
        <!-- Menu Section End -->

        <!-- Product Section Start -->
        <section class="products" id="products" x-data="products">
            <h2><span>Produk Unggulan </span>kami</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quaerat et labore non ullam sapiente.</p>

            <div class="row">
                <template x-for="(item, index) in items" x-key="index">
                <div class="product-card">
                    <div class="product-icons">
                        <a href="#" @click.prevent="$store.cart.add(item)">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">                            
                            <use href="{{ asset('img/feather-sprite.svg#shopping-cart') }}" />
                            </svg>
                        </a>
                        <a href="#" class="item-detail-button">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">                            
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
                        <svg width="24" height="24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <use href="{{ asset('img/feather-sprite.svg#star') }}" />
                            </svg>
                        <svg width="24" height="24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <use href="{{ asset('img/feather-sprite.svg#star') }}" />
                            </svg>
                        <svg width="24" height="24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <use href="{{ asset('img/feather-sprite.svg#star') }}" />
                            </svg>
                        <svg width="24" height="24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <use href="{{ asset('img/feather-sprite.svg#star') }}" />
                            </svg>
                        <svg width="24" height="24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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

        <!-- Contact Section Start -->
        <section class="contact" id="contact">
            <h2><span>Kontak</span> Kami</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iste beatae, sunt debitis cum eum.</p>
            <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.099325122615!2d107.5647087!3d-6.887629!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e42d237a796b%3A0x69aee5fd1ac398c2!2sSND%20Racing!5e0!3m2!1sid!2sid!4v1703272885460!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
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

        <!-- Footer Section Start  -->
        <footer>
            <div class="socials">
                <a href="#"><i data-feather="instagram"></i></a>
                <a href="#"><i data-feather="twitter"></i></a>
                <a href="#"><i data-feather="facebook"></i></a>                
            </div>

            <div class="links">
                <a href="#home">Home</a>
                <a href="#about">Tentang Kami</a>
                <a href="#menu">Menu</a>
                <a href="#products">Produk</a>
                <a href="#contact">Kontak</a>
            </div>

            <div class="credits">
                <p>Created by <a href="">fabianep</a>. | &copy; 2023.</p>
            </div>
        </footer>
        <!-- Footer Section End  -->

        <!-- Modal Box Item Detail Start -->
        <div class="modal" id="item-detail-modal">
            <div class="modal-container">
                <a href="" class="close-icon"><i data-feather="x"></i></a>
                <div class="modal-content">
                    <!-- <img src="../img/products/beans1.jpg" alt="product 1"> -->
                    <img src="{{ asset('img/products/beans1.jpg') }}" alt="product 1">                    
                    <div class="product-content">
                        <h3>Product 1</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam totam reiciendis placeat ex quae impedit quibusdam, at dolorem nobis nemo incidunt, aliquam consequuntur fugit exercitationem?</p>
                        <div class="product-stars">
                            <i data-feather="star" class="stars-full"></i>
                            <i data-feather="star" class="stars-full"></i>
                            <i data-feather="star" class="stars-full"></i>
                            <i data-feather="star" class="stars-full"></i>
                            <i data-feather="star" class="stars-full"></i>                        
                            <div class="product-price">IDR 30K <span>IDR 55K</span></div>
                            <a href="
                            "><i data-feather="shopping-cart"></i><span>Add to Cart</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Box Item Detail End -->

        <!-- Footer -->
        @include('partials.footer')
        <!-- Footer End -->

        <!-- Scripts -->
        @include('partials.scripts')            
        <!-- Scripts End -->
    </body>
</html>
