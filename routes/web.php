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
    return view('testnotifikasi');
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

// Auth
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [MasterDataController::class, 'index'])->name('dashboard.index');
    });
    Route::get('/history/payment', [MasterDataController::class, 'index'])->name('dashboard.index');
    // Route::get('/history', [MasterDataController::class, 'index'])->name('dashboard.index');
});

Route::get('/check-login', [AuthAPIController::class, 'checkLogin'])->name('api.auth.checkLogin');
Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');



Route::post('/login', [AuthAPIController::class, 'login'])->name('api.auth.login');
Route::get('/logout', [AuthAPIController::class, 'logout'])->name('api.auth.logout');
Route::post('/register', [AuthAPIController::class, 'register'])->name('api.auth.register');