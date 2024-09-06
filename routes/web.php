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
use App\Http\Controllers\API\ProductAPIController;
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
    return view('test');
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
Route::get('photo', [PhotoController::class, 'index'])->name('photo.index');
Route::get('video', [VideoController::class, 'index'])->name('video.index');


// API
Route::post('/product/detail', [ProductAPIController::class, 'addCart'])->name('api.product.create');

// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [MasterDataController::class, 'index'])->name('dashboard.index');
});

// Auth
Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');