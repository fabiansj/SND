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
                            <li><a href="{{ route('product.findType', ['Dirt Bike','tmx 50'])}}">SND TMX 50</a></li>
                            <li><a href="{{ route('product.findType', ['Dirt Bike','tmx 65'])}}">SND TMX 65</a></li>
                            <li><a href="{{ route('product.findType', ['Dirt Bike','tmx 105'])}}">SND TMX 105</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['velg'])}}">Velg Rapido<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="{{ route('product.findType', ['velg','sport'])}}">Sport Rim</a></li>
                            <li><a href="{{ route('product.findType', ['velg','matic'])}}">Matic Rim</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['Motocross'])}}">Motocross Part<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="{{ route('product.findType', ['motocross','crf 150'])}}">Honda CRF 150 L</a></li>
                            <li><a href="{{ route('product.findType', ['motocross','crf 230'])}}">HONDA CRF 230</a></li>
                            <li><a href="{{ route('product.findType', ['motocross','klx 150'])}}">KAWASAKI KLX 150</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['muffler'])}}">Muffler</a>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['racing'])}}">Racing & Daily</a>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['carburator'])}}">Carburator<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="{{ route('product.findType', ['carburator','original'])}}">Carburator Originil</a></li>
                            <li><a href="{{ route('product.findType', ['carburator','snd'])}}">Carburator SND</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('product.findGroup', ['blok'])}}">Blok Kopling & Engine<span>&#9658;</span></a>
                        <ul class="dropdown-content-list">
                            <li><a href="{{ route('product.findType', ['blok','Kopling'])}}">Blok Kopling</a></li>
                            <li><a href="{{ route('product.findType', ['blok','engine'])}}">Engine</a></li>
                        </ul>
                    </li>
                    {{--<li><a href="{{ route('product.findGroup', ['cnc'])}}">CNC Porting</a>
                    </li>--}}
                </ul>
            </li>
            <!-- <li><a href="#">Racing Team</a></li> -->
            <li><a href="{{ asset('video') }}">Video <span></span></a>
                {{-- 
                <ul class="dropdown-content">
                    <li><a href="{{ asset('photo') }}">Foto</a></li> 
                    <li><a href="{{ asset('photo') }}">Foto</a></li>
                    <li><a href="{{ asset('video') }}">Video</a></li> 
                </ul>
                --}}
            </li>
            <li><a href="{{ asset('contact') }}">Kontak</a></li>
        </ul>
    </div>C
    <div class="navbar-extra">
        <a href="javascript:void(0);" id="search-button"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart-button">
            <i data-feather="shopping-cart"></i>
            <span class="quantity-badge"></span>
        </a>
        @auth
        <a href="javascript:void(0);" id="login-button"><i data-feather="user"></i></a>
        @else
        <a href="{{ route('auth.login') }}" id="login-button"><i data-feather="user"></i></a>
        @endauth
        

        <a href="javascript:void(0);" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    @auth
    <div class="account-dropdown">
        <ul>
            <li><span style="cursor: default">Halo, {{ Auth::user()->nama }}</span></li>
            {{-- <li><a href="{{ route('user.profile') }}">Profile</a></li> --}}
            {{-- <li><a href="#">Profil</a></li> --}}
            <hr style="border: none; height: 1px; background-color: #333; width: 85%; margin: 2px auto;">
            @if(Auth::check() && Auth::user()->role === 'admin')
            <li><a href="{{ route('kelola.dashboard.index')}}">Dashboard Admin</a></li>
            <li><a href="{{ route('settlement.payment.index')}}">Transaksi</a></li>
            @endif    
            @if(Auth::check() && Auth::user()->role !== 'admin')
            <li><a href="{{ route('pending.payment.index')}}">Belum Bayar</a></li>
            {{--<li><a href="#" onclick="event.preventDefault(); paymentNow();">Test Bayar</a></li>--}}
            <li><a href="{{ route('settlement.payment.index')}}">Riwayat</a></li>
            @endif
            <li>
                <a href="{{ route('api.auth.logout') }}">Keluar</a>
            </li>
        </ul>
    </div>   
    @endauth
    
    <!-- search form start -->
    <div class="search-form">
            <input type="search" id="search-box" placeholder="Cari produk disini...">
            <label for="search-box" id="search-box-button"><I data-feather="search"></I></label>
    </div>
    <!-- search form end -->


    <!-- Shopping Cart Start -->
    {{--@if(Auth::user()->role !== 'admin')--}}
    <div class="shopping-cart">
        <!-- Placeholder untuk item keranjang -->
        <h4></h4>
        <div class="shopping-cart-produk">

        </div>
        <div class="form-container" style="display: none;">
            <form id="checkoutForm" action="#" method="post">
                @csrf
                <div id="cartDataShop" data-items="[]" data-total="0" data-ctid="0"></div>
                <input type="hidden" name="items" id="itemsInput">
                <input type="hidden" name="total" id="totalInput">
                <h5>Customer Detail</h5>
                <label for="name">
                    <span>Name</span>
                    <input type="text" name="name" id="name" required>
                </label>
                <label for="email">
                    <span>Email</span>
                    <input type="email" name="email" id="email" placeholder="optional">
                </label>
                <label for="phone">
                    <span>Phone</span>
                    <input type="text" name="phone" id="phone" autocomplete="off" required>
                </label>
                <label for="address">
                    <span>Address</span>
                    <input type="text" name="address" id="address" autocomplete="off" required>
                </label>
                <button class="checkout-button" type="submit" id="checkout-button" value="checkout">Checkout</button>
            </form>
        </div>
    </div>
    {{--@else
    <div class="shopping-cart">
        <!-- Placeholder untuk item keranjang -->
        <h4>Silahkan Belanja Menggunakan akun user</h4>
    </div>
    @endif--}}
    <!-- Shopping Cart End -->
</nav>
<div id="loading-indicator" style="display: none;">
    <img src="asset('img/products/giphy.webp" alt="Loading...">
</div>
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

    $('#checkoutForm').submit(function(e) {       
        e.preventDefault()
            
        let items = $('#cartDataShop').attr('data-items')
        let total = $('#cartDataShop').attr('data-total')
        let ctid = $('#cartDataShop').attr('data-ctid')
        let url   = '{{ route('api.buy.checkout') }}'
        let formData = $('#checkoutForm').serialize()

        console.log('Items:', items);
        console.log('Total:', total);      
        
        payload = {
            items: items,
            total: total,
            form: formData
        }
                    
        $.ajax({
            url: url,
            type: 'POST',
            data: payload,
            headers: {
            'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {        
                console.log('Success:', response);
                console.log('token: ', response.snap_token)
                $('#shopping-cart').removeClass('active');
                // Anggap snap_token adalah token yang Anda terima dari respons API
                paymentNow(response.snap_token, ctid)
            },
            error: function(xhr, status, error) {            
                console.log('Error:', error);
                Swal.fire({
                    title: "Checkout Gagal!",
                    icon: "error"
                });
            }
        });          
    });

    const rupiah = (number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
        }).format(number);
    };

    loadCart();
});

    function bindCartEvents(){
        $(document).off('click', '.minus-cart');
        $(document).off('click', '.add-cart');
        $(document).off('click', '.remove-cart');

        $(document).on('click', '.minus-cart', function() {
                            var clid = $(this).data('clid');
                            var url = '{{ route('api.cart.setStockCheckout')}}'
                            console.log(clid);
                            cartButton(clid,'minus','put', url)
                        });

                        // Event delegation untuk tombol add
                        $(document).on('click', '.add-cart', function() {
                            var clid = $(this).data('clid');
                            var url = '{{ route('api.cart.setStockCheckout')}}'
                            console.log(clid);
                            cartButton(clid,'plus','put', url)
                        });

                        // Event delegation untuk tombol remove
                        $(document).on('click', '.remove-cart', function() {
                            var clid = $(this).data('clid');
                            var url = '{{ route('api.cart.setStockCheckout')}}'
                            console.log(clid);
                            cartButton(clid,'delete','delete', url)                            
                        });
    }

    function cartButton(clid, operator, type, url) {
        $.ajax({
            url: url,
            type: type,
            data: { clid: clid, operator: operator },
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            success: function (response) {
                console.log(response.jumlah);
                loadCart();
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                // alert('Terjadi kesalahan saat meng-update stok.');
                Swal.fire({
                    title: "Gagal mengupdate stok",
                    icon: "error"
                });
            },
        });
    }

    function loadCart() 
    {
        $.ajax({
        url: "{{ route('api.auth.checkLogin') }}",
        type: 'GET',
        success: function(response) {
            if (response.loggedIn) {
                // Pengguna sudah login, muat data keranjang
                console.log(response)
                if (response.role != 'admin'){
                $.ajax({
                    url: "{{ route('cart.list') }}",
                    type: 'GET',
                    success: function(response) {
                        console.log(response)       
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
                                                <br/><span>Total: ${rupiah(item.tharga_produk)}</span>
                                            </div>
                                        </div>
                                        <button id="remove" class="remove-cart" data-clid="${item.clid}">X</button>
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
                        bindCartEvents();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // alert('Terjadi kesalahan saat memuat keranjang.');
                        Swal.fire({
                            title: "Terjadi kesalahan saat memuat keranjang",
                            icon: "error"
                        });
                    }
                });
                } else{
                    $('.shopping-cart > h4').append('Silahkan menggunakan akun user untuk belanja');
                    $('.shopping-cart > h4').css('margin-top','30px');
                    $('.form-container').css('display', 'none'); 
                }
            } else {                
                $('.shopping-cart > h4').append('Memerlukan login untuk melihat keranjang belanja');
                $('.shopping-cart > h4').css('margin-top','30px');
                $('.form-container').css('display', 'none');
            }
        },
        error: function(xhr, status, error) {
            // console.error('Error:', error);
            // alert('Terjadi kesalahan saat memeriksa status login.');
        }}
    )};

    function updateCartList(){
        $.ajax({
            url: "{{ route('cart.list') }}",
            type: 'GET',
            success: function(response) {
                console.log(response.items)                        
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
                                        <button id="remove-cart">&minus;</button>
                                        <span>jumlah: ${item.jumlah_produk}</span>
                                        <button id="add-cart">&plus;</button>
                                        <span>Total: ${rupiah(item.tharga_produk)}</span>
                                    </div>
                                </div>
                                <i data-feather="trash-2" class="remove-item"></i>
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
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                // alert('Terjadi kesalahan saat memperbarui keranjang.');
            }
        });
    }    
    
    function newCartStatus(){
    $.ajax({
                    url: "{{ route('cart.list') }}",
                    type: 'GET',
                    success: function(response) {
                        console.log(response)       
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
                                                <br/><span>Total: ${rupiah(item.tharga_produk)}</span>
                                            </div>
                                        </div>
                                        <button id="remove" class="remove-cart" data-clid="${item.clid}">X</button>
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
                            var url = '{{ route('api.cart.setStockCheckout')}}'
                            console.log(clid);
                            cartButton(clid,'minus','put', url)
                        });

                        // Event delegation untuk tombol add
                        $(document).on('click', '.add-cart', function() {
                            var clid = $(this).data('clid');
                            var url = '{{ route('api.cart.setStockCheckout')}}'
                            console.log(clid);
                            cartButton(clid,'plus','put', url)
                        });

                        // Event delegation untuk tombol remove
                        $(document).on('click', '.remove-cart', function() {
                            var clid = $(this).data('clid');
                            var url = '{{ route('api.cart.setStockCheckout')}}'
                            console.log(clid);
                            cartButton(clid,'delete','delete', url)
                            
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // alert('Terjadi kesalahan saat memuat keranjang.');
                    }
                });
            }
</script>