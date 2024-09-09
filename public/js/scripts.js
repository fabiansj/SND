// Toggle class active
const navbarNav = document.querySelector('.navbar-nav');
const searchForm = document.querySelector('.search-form');
const shoppingCart = document.querySelector('.shopping-cart');
const accountDropdown = document.querySelector('.account-dropdown');

const searchBox = document.querySelector('#search-box');
const itemDetaiLModel = document.querySelector('#item-detail-modal');
const itemDetailButtons = document.querySelectorAll('.item-detail-button');
// const form = document.querySelector('#checkoutForm');
// const checkoutButton = document.querySelector('.checkout-button');

// checkoutButton.disabled = true;
// form.addEventListener('keyup', function () {
//     for (let i = 0; i < form.elements.length; i++) {
//         if (form.elements[i].value.length !== 0) {
//             checkoutButton.classList.remove('disabled');
//             checkoutButton.classList.add('disabled');
//         } else {
//             return false;
//         }
//     }
//     checkoutButton.disabled = false;
//     checkoutButton.classList.remove('disabled');
// });

// // kirim data ketika tombol checkout diklik
// checkoutButton.addEventListener('click', async function (e) {
//     e.preventDefault();
//     const formData = new FormData(form);
//     const data = new URLSearchParams(formData);
//     const objData = Object.fromEntries(data);
//     const urlfetch = '../config/Midtrans.php';
//     // const urlfetch = 'http://localhost/snd_shop/config/Midtrans.php'; < cara kedua

//     // console.log(objData);
//     //minta transaksi token menggunakan ajax / fetch
//     try {
//         const response = await fetch(urlfetch, {
//             method: 'POST',
//             body: data,
//         });
//         const token = await response.text();
//         // console.log(token);
//         window.snap.pay(token);
//     } catch (err) {
//         console.log(err.message);
//     }
// });

// try{
//     const response = await fetch('/config/Midtrans.php', {
//         method: 'POST',
//         body: data,
//     });
//     const token = await response.text();
//     console.log(token);
//     snap.pay(token, {
//         onSuccess: function(result) {
//             console.log('Pembayaran berhasil:', result);
//         },
//         onPending: function(result) {
//             console.log('Pembayaran masih dalam proses:', result);
//         },
//         onError: function(result) {
//             console.log('Kesalahan pembayaran:', result);
//         },
//         onClose: function() {
//             console.log('Snap ditutup');
//         }
//     });
// }catch(err) {
//     console.log(err.message)
// }

// window.snap.embed(token, {
//     embedId: 'snap-container'
//   });

// format pesan whatsapp
// const formatMessage = (obj) => {
//     return `Data Costumer
//     Nama: ${obj.name}
//     Email: ${obj.email}
//     No HP: ${obj.phone}
// Data Pesanan
// ${JSON.parse(obj.items).map(
//     (item) => `${item.name} (${item.quantity} x ${rupiah(item.total)}) \n`,
// )}
// TOTAL: ${rupiah(obj.total)}
// Terima Kasih.`;
// };

//humberger diclick
document.querySelector('#hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
};
//shopping chart click
document.querySelector('#shopping-cart-button').onclick = (e) => {
    shoppingCart.classList.toggle('active');
    e.preventDefault();
};
//shopping chart click
document.querySelector('#login-button').onclick = (e) => {
    accountDropdown.classList.toggle('active');
    e.preventDefault();
};

// search form
document.querySelector('#search-button').onclick = (e) => {
    searchForm.classList.toggle('active');
    searchBox.focus();
    e.preventDefault();
};

//item detail modal
itemDetailButtons.forEach((btn) => {
    btn.onclick = (e) => {
        itemDetaiLModel.style.display = 'flex';
        e.preventDefault();
    };
});

// itemDetailButtons.forEach((btn) =>{
//     btn.onclick = (e) => {
//         itemDetaiLModel.style.display = 'flex';
//         e.preventDefault();
//     };
// });

//click diluar element
const hm = document.querySelector('#hamburger-menu');
const sb = document.querySelector('#search-button');
const sc = document.querySelector('#shopping-cart-button');
const lb = document.querySelector('#login-button');

document.addEventListener(
    'click',
    function (e) {
        if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
            navbarNav.classList.remove('active');
        }
        if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
            searchForm.classList.remove('active');
        }
        if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
            shoppingCart.classList.remove('active');
        }
        if (!lb.contains(e.target) && !accountDropdown.contains(e.target)) {
            accountDropdown.classList.remove('active');
        }
    },
    { passive: true },
);

window.onclick = (e) => {
    if (e.target === itemDetaiLModel) {
        itemDetaiLModel.style.display = 'none';
    }
};

// Click tombol close Modal
document.querySelector('.modal .close-icon').onclick = (e) => {
    itemDetaiLModel.style.display = 'none';
    e.preventDefault();
};

// // only number can input
// function isNumberKey(evt) {
//     var charCode = evt.which ? evt.which : evt.keyCode;
//     if (charCode > 31 && charCode != 46 && (charCode < 48 || charCode > 57))
//         return true;
// }

function paymentNow(snap_token, ctid) {
    // var snap_token = '0e7172e3-4eb4-4f25-9f43-670ef0a242de';
    var snap_token = snap_token;
    $status = 'Pending';

    window.snap.pay(snap_token, {
        onSuccess: function (result) {
            $status = 'Settlement';
            // setStatus($status, ctid);
            alert('payment success!');
            console.log(result);
        },
        onPending: function (result) {
            // setStatus($status, ctid);
            alert(
                'pembayaran di pending, anda dapat melakukan pembayaran kembali ke akun->belum bayar atau klik disini',
            );
            console.log(result);
        },
        onError: function (result) {
            $status = 'masa waktu pembayaran telah habis';
            // setStatus($status, ctid);
            alert('Maaf, masa waktu pembayaran telah habis!');
            console.log(result);
        },
        onClose: function () {
            // setStatus($status, ctid);
            alert('you closed the popup without finishing the payment');
        },
    });
}

function setStatus(status, ctid) {
    $.ajax({
        url: "{{ route('api.buy.checkout') }}",
        type: 'POST',
        data: payload,
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
        success: function (response) {
            console.log(response);
            console.log('ctid: ', ctid);
            console.log('Status:', status);
        },
        error: function (xhr, status, error) {
            console.log('Error:', error);
            alert('Checkout Gagal');
        },
    });
}
