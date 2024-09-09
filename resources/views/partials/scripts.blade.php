<!-- Feather Icons -->
<script>
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log("Feather Icons script executed.");
    feather.replace();

    function updateCartList(){
        $.ajax({
            url: "{{ route('cart.list') }}", // Ganti dengan route yang sesuai untuk mendapatkan daftar cart
            type: 'GET',
            success: function(response) {
                console.log(response.items)                        
                const shoppingCart = $('.shopping-cart-produk');
                shoppingCart.empty(); // Mengosongkan isi dari elemen shoppingCart
                // shoppingCart.innerHTML = '';                                                     

                if (response.items.length > 0) {
                    // jika data ada
                    response.items.forEach(item => {                                
                        shoppingCart.append(`
                            <div class="cart-item">
                                <img src="{{ asset('img/products/${item.url_image}') }}">
                                <div class="item-detail">
                                    <h3>${item.nama_produk}</h3>
                                    <div class="item-price">
                                        <span> ${rupiah(item.harga_produk)}</span>
                                        <button class="remove-button" data-clid="${item.clid}">&minus;</button>
                                        <span>jumlah: ${item.jumlah_produk}</span>
                                        <button class="add-button" data-clid="${item.clid}">&plus;</button>
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
                alert('Terjadi kesalahan saat memperbarui keranjang.');
            }
        });
    }
</script>
<script src="{{ asset('/js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-lCL-IQzl8WS5-Irh"></script>
<!-- <script>
    // Atur posisi scroll ke paling atas saat halaman dimuat ulang
    window.onbeforeunload = function() {
        window.scrollTo(0, 0);
    }
</script> -->
