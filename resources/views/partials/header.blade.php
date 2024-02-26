<nav class="navbar" x-data>
    <a href="#" class="navbar-logo">
        <img src="/img/logo.png" alt="">
    </a>
    <div class="navbar-nav">
        <a href="{{ asset('/') }}">Home</a>
        <a href="{{ asset('about') }}">About Us</a>
        <div class="dropdown" id="produkDropdown">
            <a href="#" class="dropbtn">Produk <span>&#9660;</span></a>
            <div class="dropdown-content produklist">
                <a href="#">Dirt Bike</a>
                <a href="#">Velg Rapido</a>
                <a href="#">Motocross Part</a>
                <a href="#">Racing and Daily</a>
            </div>
        </div>
        <!-- <a href="#">SND Apparel</a> -->
        <a href="#">Racing Team</a>
        <div class="dropdown" id="galleryDropdown">
            <a href="#" class="dropbtn">Gallery <span>&#9660;</span></a>
            <div class="dropdown-content gallerylist">
                <a href="{{ asset('photo') }}">Foto</a>
                <a href="{{ asset('video') }}">Video</a>
            </div>
        </div>
        <a href="{{ asset('contact') }}">Contact</a>
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
<style>
    /* Style navbar container */
    .navbar-nav {
        display: flex;
        justify-content: center;
        /* Mengatur item navigasi agar berada di tengah */
    }

    /* Style dropdown container */
    .dropdown {
        position: relative;
    }

    /* Style dropdown button */
    .dropbtn {
        text-decoration: none;
        color: #333;
        display: inline-block;
        position: relative;
    }

    .dropbtn span {
        font-size: 15px;
        vertical-align: text-bottom;
        margin-left: 3px;
    }

    /* Style dropdown content (default hidden) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        margin-top: 5px;
        transition-delay: 0.2s;
        /* Penundaan sebelum dropdown muncul */
    }

    /* Style links inside the dropdown */
    .dropdown-content a {
        color: black !important;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        width: 85%;
    }

    /* Change color of links on hover */
    .dropdown-content a:hover {
        /* background-color: #b9b1b1;    */
        background-color: yellow;
        text-decoration: none;
    }

    /* Show the dropdown content when hover on dropdown */
    .dropdown:hover .dropdown-content {
        /* display: block; */
    }
</style>
