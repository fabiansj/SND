<nav class="navbar" x-data>
    <a href="#" class="navbar-logo">
        <img src="/img/logo.png" alt="">
    </a>
    <div class="navbar-nav">
        <ul class="dropdown-list">
            <li><a href="{{ asset('index') }}">Home</a></li>
            <li><a href="{{ asset('about') }}">About Us</a>
            <!-- <li><a href="#">Produk <span>&#9660;</span></a> -->
                <li><a href="{{ asset('product') }}">Produk <span>&#9660;</span></a>
                <ul class="dropdown-content">
                    <li><a href="#">Dirt Bike<span>&#9658;</span></a>
                    <!-- <li><a href="{{ asset('product')}}">Dirt Bike<span>&#9658;</span></a> -->
                        <ul class="dropdown-content-list" class="dropdown-content-list">
                            <li><a href="{{ asset('product')}}">SND TMX 50</a></li>
                            <li><a href="#">SND TMX 65</a></li>
                            <li><a href="#">SND TMX 105</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Velg Rapido<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="#">Sport Rim</a></li>
                            <li><a href="#">Matic Rim</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Motocross Part<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="#">Honda CRF 150 L</a></li>
                            <li><a href="#">HONDA CRF 230</a></li>
                            <li><a href="#">KAWASAKI KLX 150</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Muffler</a>
                    </li>
                    <li><a href="#">Racing & Daily</a>
                    </li>
                    <li><a href="#">Carburator<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="#">Carburator Originil</a></li>
                            <li><a href="#">Carburator SND</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Blok Kopling & Engine<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="#">Block Kopling</a></li>
                            <li><a href="#">Engine</a></li>
                        </ul>
                    </li>
                    <li><a href="#">CNC Porting</a>
                    </li>
                </ul>
            </li>
            <!-- <li><a href="#">Racing Team</a></li> -->
            <li><a href="#">Gallery <span>&#9660;</span></a>
                <ul class="dropdown-content">
                    <!-- <li><a href="{{ asset('photo') }}">Foto</a></li> -->
                    <li><a href="#">Foto</a></li>
                    <li><a href="{{ asset('video') }}">Video</a></li>
                </ul>
            </li>
            <li><a href="{{ asset('contact') }}">Contact</a></li>
        </ul>
    </div>
    <div class="navbar-extra">
        <a href="#" id="search-button"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart-button">
            <i data-feather="shopping-cart"></i>
            <span class="quantity-badge" x-show="$store.cart.quantity" x-text="$store.cart.quantity"></span>
        </a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- search form start -->
    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box"><I data-feather="search"></I></label>
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
        <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem;">Cart is Empty</h4>
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
