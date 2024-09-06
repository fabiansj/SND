<nav class="navbar" x-data>
    <a href="#" class="navbar-logo">
        <img src="/img/logo.png" alt="">
    </a>
    <div class="navbar-nav">
        <ul class="dropdown-list">
            <li><a href="{{ asset('index') }}">Beranda</a></li>
            <li><a href="{{ asset('about') }}">Tentang Kami</a>
            <!-- <li><a href="#">Produk <span>&#9660;</span></a> -->
                <li><a href="{{ route('product.index')}}">Produk <span>&#9660;</span></a>
                <ul class="dropdown-content">
                    <li><a href="{{ route('product.findGroup', ['dirt'])}}">Dirt Bike<span>&#9658;</span></a>
                    <!-- <li><a href="{{ asset('product')}}">Dirt Bike<span>&#9658;</span></a> -->
                        <ul class="dropdown-content-list" class="dropdown-content-list">
                            <li><a href="{{ route('product.findType', ['velg','tmx 50'])}}">SND TMX 50</a></li>
                            <li><a href="#">SND TMX 65</a></li>
                            <li><a href="#">SND TMX 105</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['velg'])}}">Velg Rapido<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="{{ route('product.findType', ['velg','sport'])}}">Sport Rim</a></li>
                            <li><a href="{{ route('product.findType', ['velg','matic'])}}">Matic Rim</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['motocross'])}}">Motocross Part<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="#">Honda CRF 150 L</a></li>
                            <li><a href="#">HONDA CRF 230</a></li>
                            <li><a href="#">KAWASAKI KLX 150</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['muffler'])}}">Muffler</a>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['racing'])}}">Racing & Daily</a>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['carburator'])}}">Carburator<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="#">Carburator Originil</a></li>
                            <li><a href="#">Carburator SND</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['blok'])}}">Blok Kopling & Engine<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="#">Block Kopling</a></li>
                            <li><a href="#">Engine</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['cnc'])}}">CNC Porting</a>
                    </li>
                </ul>
            </li>
            <!-- <li><a href="#">Racing Team</a></li> -->
            <li><a href="">Galeri <span>&#9660;</span></a>
                <ul class="dropdown-content">
                    <!-- <li><a href="{{ asset('photo') }}">Foto</a></li> -->
                    <li><a href="{{ asset('photo') }}">Foto</a></li>
                    <li><a href="{{ asset('video') }}">Video</a></li>
                </ul>
            </li>
            <li><a href="{{ asset('contact') }}">Kontak</a></li>
        </ul>
    </div>
    <div class="navbar-extra">
        <a href="#" id="search-button"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart-button">
            <i data-feather="shopping-cart"></i>
            <span class="quantity-badge" x-show="$store.cart.quantity" x-text="$store.cart.quantity"></span>
        </a>
        <a href="#" id="login-button"><i data-feather="user"></i></a>
        {{-- <a href="{{ route('auth.login') }}" id="login-button"><i data-feather="user"></i></a> --}}

        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <div class="account-dropdown">
        <ul>
            {{-- <li><a href="{{ route('user.profile') }}">Profile</a></li> --}}
            {{-- <li><a href="{{ route('auth.logout') }}">Logout</a></li> --}}
            <li><a href="#">Profil</a></li>
            <li><a href="#">Riwayat</a></li>
            <li><a href="#">Keluar</a></li>
        </ul>
    </div>
    <!-- search form start -->
    <div class="search-form">
            <input type="search" id="search-box" placeholder="Cari produk disini...">
            <label for="search-box" id="search-box-button"><I data-feather="search"></I></label>
    </div>
    <!-- search form end -->

    <!-- Shopping Cart Start -->
    <div class="shopping-cart">
        <template x-for="(item,index) in $store.cart.items" x-keys="index">
            <div class="cart-item">
                <img :src="`{{ asset('img/products/${item.img}') }}`" :alt="item.name">
                <div class="item-detail">
                    <h3 x-text="item.name"></h3>
                    <div class="item-price">
                        <span x-text="rupiah(item.price)"></span>&times;
                        <button id="remove" @click="$store.cart.remove(item.id)">&minus;</button>
                        <span x-text="item.quantity"></span>
                        <button id="add" @click="$store.cart.add(item)">&plus;</button> &equals;
                        <span x-text="rupiah(item.total)"></span>
                    </div>
                </div>
                <i data-feather="trash-2" class="remove-item"></i>
            </div>
        </template>
        <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem;">Keranjang belanja kosong</h4>
        <h4 x-show="$store.cart.items.length">Total: <span x-text="rupiah($store.cart.total)"></span></h4>
        <div class="form-container" x-show="$store.cart.items.length">
            <form id="checkoutForm" action="">
                <input type="hidden" name="items" x-model="JSON.stringify($store.cart.items)">
                <input type="hidden" name="total" x-model="$store.cart.total">
                <h5>costumer detail</h5>
                <label for="name">
                    <span>name</span>
                    <input type="text" name="name" id="name">
                </label>
                <label for="email">
                    <span>email</span>
                    <input type="email" name="email" id="email">
                </label>
                <label for="phone">
                    <span>phone</span>
                    <input type="number" name="phone" id="phone" autocomplete="off">
                </label>
                <label for="address">
                    <span>address</span>
                    <input type="text" name="address" id="address" autocomplete="off">
                </label>
                <button class="checkout-button disabled" type="submit" id="checkout-button"
                    value="checkout">Checkout</button>
            </form>
        </div>
    </div>
    <!-- Shopping Cart End -->
</nav>
<script>
    $(document).ready(function() {
    var lastScrollTop = 0;
    var navbar = $('.navbar');

    $(document).scroll(function(){
        var st = $(this).scrollTop();        
        if (st > lastScrollTop) {                         
            navbar.css({                
                'opacity': '0.8',
                'transition':  'opacity 0.3s ease'                
            });
        } else {            
            if(navbar.is(':hover')){
                navbar.css({                
                    'opacity': '0.8',                
                });
            }else{
                navbar.css({                
                    'opacity': '0',                
                });
            }
        }
        lastScrollTop = st;
    });

    navbar.hover(
        function() {        
            navbar.css('opacity', '1');
        },
        function() {    
            if(!lastScrollTop == 0){
                navbar.css('opacity', '0.8');
            }else{
                navbar.css('opacity', '0');
            }
        }
    );

    $('#search-box-button').on('click', function(e) {
        e.preventDefault(); // Menghentikan pengiriman form default
        
        const query = $('#search-box').val();
        const url = new URL('{{ route('product.find') }}');
        url.searchParams.append('name', query);
        
        window.location.href = url.toString();
    });

    $('#search-box').on('keypress', function(e) {
        if (e.which === 13) {
            seachProduk(e)
        }
    })

    $('#search-box-button').on('click', function(e) {
        seachProduk(e)
    });

    function seachProduk(e){
        e.preventDefault();
        
        const query = $('#search-box').val();
        const url = new URL('{{ route('product.find') }}');
        url.searchParams.append('name', query);
        
        window.location.href = url.toString();
    }
});
</script>