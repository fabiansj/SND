console.log("out");
$(document).ready(function () {
    $(".dropdown").on("click", function (e) {
        e.preventDefault();
        // Dapatkan kelas yang sesuai dengan elemen yang diklik
        var targetClass = $(this).attr("id").replace("Dropdown", "list");
        // Toggle tampilan elemen dengan kelas yang sesuai
        $("." + targetClass).toggle();
    });
});

document.addEventListener("alpine:init", () => {
    Alpine.data("products", () => ({
        items: [
            {
                id: 1,
                name: "Velg mio j/mio gt/fino/xride",
                img: "beans1.jpg",
                price: 1525000,
            },
            {
                id: 2,
                name: "Velg mio j/mio gt/fino/xride",
                img: "beans2.jpg",
                price: 1525000,
            },
            {
                id: 3,
                name: "Velg mio j/mio gt/fino/xride",
                img: "beans3.jpg",
                price: 1525000,
            },
            {
                id: 4,
                name: "Velg mio j/mio gt/fino/xride",
                img: "beans4.jpg",
                price: 1525000,
            },
            {
                id: 5,
                name: "Velg mio j/mio gt/fino/xride",
                img: "beans5.jpg",
                price: 1525000,
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
