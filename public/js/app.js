console.log("out");
$(document).ready(function() {        
    $('#hamburger-menu').on('click', function(e){
        e.preventDefault();
    })

    // onclick versi hp us   ing touch 
    $('.navbar .navbar-nav .dropdown-list > li').on('touchstart', function(e){                
        // e.stopPropagation();
        e.preventDefault();
        // $(this).siblings().not($(this)).find('.dropdown-content').removeClass('active')
        $(this).find('.dropdown-content').toggleClass('active');        
    })


    $('.navbar .navbar-nav .dropdown-list .dropdown-content > li').on('touchstart', function(e){                
        e.stopPropagation();
        e.preventDefault();        
        // $(this).not($(this)).find('dropdown-content-list').removeClass('active');
        $(this).find('.dropdown-content-list').toggleClass('active');        
    })

    $('.navbar .navbar-nav .dropdown-list .dropdown-content .dropdown-content-list > li').on('touchstart', function(e){                
        e.stopPropagation();
    })

    // $('.navbar .navbar-nav .dropdown-list .dropdown-content > li').on('touchstart', function(e){        
    //     e.preventDefault();
    // })
    
    //
    $('.navbar-nav .dropdown-list li').on('mouseenter mouseleave',function() {
        // Temukan elemen submenu dalam elemen <li> saat ini
        var submenu = $(this).find('.dropdown-content');
        // Tampilkan submenu
        submenu.toggleClass('show');
    });

    $('.navbar-nav .dropdown-list .dropdown-content li').on('mouseenter mouseleave', function(){
        var submenu = $(this).find('.dropdown-content-list');
        submenu.toggleClass('show');
    })
    // Ketika mouse keluar dari elemen <li> yang memiliki submenu
    // $('.navbar-nav .dropdown-list li').mouseleave(function() {
    //     // Temukan elemen submenu dalam elemen <li> saat ini
    //     var submenu = $(this).find('.dropdown-content');
    //     // Sembunyikan submenu
    //     submenu.removeClass('show');
    // });
})

document.addEventListener("alpine:init", () => {
    Alpine.data("products", () => ({
        items: [
            {
                id: 1,
                name: "velg mio j/mio gt/fino/x-ride",
                img: "beans1.jpg",
                price: 1153000,
            },
            {
                id: 2,
                name: "velg mio j/mio gt/fino/x-ride",
                img: "beans2.jpg",
                price: 1153000,
            },
            {
                id: 3,
                name: "velg mio j/mio gt/fino/x-ride",
                img: "beans3.jpg",
                price: 1153000,
            },
            {
                id: 4,
                name: "velg mio j/mio gt/fino/x-ride",
                img: "beans4.jpg",
                price: 1153000,
            },
            {
                id: 5,
                name: "velg mio j/mio gt/fino/x-ride",
                img: "beans5.jpg",
                price: 1153000,
            },
        ],
    }));

    Alpine.store("cart", {
        items: [],
        total: 0,
        quantity: 0,
        add(newItem) {
            const cartItem = this.items.find((item) => item.id === newItem.id);

            if (!cartItem) {
                this.items.push({
                    ...newItem,
                    quantity: 1,
                    total: newItem.price,
                });
                this.quantity++;
                this.total += newItem.price;
            } else {
                //jika barang sudah ada, cek apakah barang beda atau sama dengan yg ada di cart
                this.item = this.items.map((item) => {
                    //jika barang berbeda
                    if (item.id !== newItem.id) return item;
                    else {
                        //jika barang sudah ada, tambah quantity dan sub totalnya

                        item.quantity++;
                        item.total = item.price * item.quantity;
                        this.quantity++;
                        this.total += item.price;
                        return item;
                    }
                });
            }
        },
        remove(id) {
            // ambil item yang mau di remove berdasarkan id
            const cartItem = this.items.find((item) => item.id === id);

            // jika item lebih dari 1
            if (cartItem.quantity > 1) {
                //telurusi 1 1
                this.items = this.item.map((item) => {
                    //jika bukan barang yang diklik
                    if (item.id !== id) {
                        return item;
                    } else {
                        item.quantity--;
                        item.total = item.price * item.quantity;
                        this.quantity--;
                        this.total -= item.price;
                        return item;
                    }
                });
            } else if (cartItem.quantity === 1) {
                // jika barang sisa 1
                this.items = this.items.filter((item) => item.id !== id);
                this.quantity--;
                this.total -= cartItem.price;
            }
        },
    });
});

// konversi ke rupiah
const rupiah = (number) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(number);
};
