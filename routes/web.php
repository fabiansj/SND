<?php

use App\Http\Controllers\ViewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\CartListAPIController;
use App\Http\Controllers\CheckoutTransaksiController;
use App\Http\Controllers\KelolaProductController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\ProductMentahController;
use App\Http\Repository\CheckoutTransaksiProductRepository;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/test', function () {
    return view('kelola.layouts.all');
});

Route::redirect('index', '/');
Route::redirect('home', '/');
Route::redirect('snd', '/');
Route::redirect('admin', '/');
Route::redirect('produk', '/');

// Web
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('about', [AboutController::class, 'index'])->name('about.index');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/detail/{id}', [ProductController::class, 'getDetail'])->name('product.detail');
Route::get('/product/search/', [ProductController::class, 'find'])->name('product.find');
Route::get('/product/{group}/', [ProductController::class, 'findGroup'])->name('product.findGroup');
Route::get('/product/{group}/{type}/', [ProductController::class, 'findType'])->name('product.findType');
Route::get('/cart/list', [ProductAPIController::class, 'getDataCart'])->name('cart.list');
Route::get('photo', [PhotoController::class, 'index'])->name('photo.index');
Route::get('video', [VideoController::class, 'index'])->name('video.index');


// API
Route::post('/product/detail', [ProductAPIController::class, 'addCart'])->name('api.product.create');
Route::post('/checkout/product', [PaymentController::class, 'checkoutProduk'])->name('api.buy.checkout');
Route::post('/checkout/status', [PaymentController::class, 'setStatusPayment'])->name('api.status.checkout');
Route::post('/midtrans/notification', [PaymentController::class, 'notificationHandler'])->name('api.notification.payment');
Route::match(['put', 'delete'], '/checkout/operator', [CartListAPIController::class, 'setStockCheckout'])->name('api.cart.setStockCheckout');
Route::post('/checkout/product/now', [PaymentController::class, 'checkoutProdukNow'])->name('checkout.now');

// Auth
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [MasterDataController::class, 'index'])->name('kelola.dashboard.index');
        //product
        Route::get('/kelola/produk', [KelolaProductController::class, 'index'])->name('kelola.products.index');
        Route::get('/kelola/produk/create', [KelolaProductController::class, 'create'])->name('kelola.products.create');
        Route::post('/kelola/produk', [KelolaProductController::class, 'store'])->name('kelola.products.store');
        Route::get('/kelola/produk/edit/{id}', [KelolaProductController::class, 'edit'])->name('kelola.products.edit');
        Route::put('/kelola/produk/{id}', [KelolaProductController::class, 'update'])->name('kelola.products.update');
        Route::delete('/kelola/produk/{id}', [KelolaProductController::class, 'destroy'])->name('kelola.products.destroy');
        Route::post('/kelola/produk/tipe', [KelolaProductController::class, 'getType'])->name('kelola.products.type');

        // user
        Route::get('/kelola/user', [KelolaUserController::class, 'index'])->name('kelola.user.index');
        Route::get('/kelola/user/create', [KelolaUserController::class, 'create'])->name('kelola.user.create');
        Route::post('/kelola/user', [KelolaUserController::class, 'store'])->name('kelola.user.store');        
        Route::get('/kelola/user/edit/{id}', [KelolaUserController::class, 'edit'])->name('kelola.user.edit');
        Route::put('/kelola/user/{id}', [KelolaUserController::class, 'update'])->name('kelola.user.update');
        Route::delete('/kelola/user/{id}', [KelolaUserController::class, 'destroy'])->name('kelola.user.destroy');

        //rekap data
        Route::get('/kelola/inventaris', [ProductMentahController::class, 'index'])->name('kelola.inventaris.index');
        Route::get('/kelola/inventaris/create', [ProductMentahController::class, 'create'])->name('kelola.inventaris.create');
        Route::post('/kelola/inventaris', [ProductMentahController::class, 'store'])->name('kelola.inventaris.store');
        Route::delete('/kelola/inventaris/{id}', [ProductMentahController::class, 'destroy'])->name('kelola.inventaris.destroy');
    });
    
    Route::post('/produk/status', [CheckoutTransaksiController::class, 'setStatusProduk'])->name('set.status.produk');
    Route::get('/payment/pending', [CheckoutTransaksiController::class, 'getPendingPayment'])->name('pending.payment.index');
    Route::get('/payment/pending/detail/{ctid}', [CheckoutTransaksiController::class, 'index'])->name('pending.detail.payment.index');
    Route::get('/payment/settlement', [CheckoutTransaksiController::class, 'getSettlementPayment'])->name('settlement.payment.index');
    Route::get('/payment/settlement/detail/{ctid}', [CheckoutTransaksiController::class, 'getDetailSettlement'])->name('settlement.detail.payment.index');
    // Route::get('/history', [MasterDataController::class, 'index'])->name('dashboard.index');z
});

Route::get('/check-login', [AuthAPIController::class, 'checkLogin'])->name('api.auth.checkLogin');
Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');



Route::post('/login', [AuthAPIController::class, 'login'])->name('api.auth.login');
Route::get('/logout', [AuthAPIController::class, 'logout'])->name('api.auth.logout');
Route::post('/register', [AuthAPIController::class, 'register'])->name('api.auth.register');


// admin
