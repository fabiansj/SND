<?php

use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

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

Route::redirect('/', 'index');
Route::redirect('home', 'index');
Route::redirect('snd', 'index');
Route::redirect('admin', 'index');
Route::redirect('produk', 'product');


Route::get('index', [ViewsController::class, 'index'])->name('about.show');
Route::get('about', [ViewsController::class, 'aboutshow'])->name('about.show');
Route::get('contact', [ViewsController::class, 'contactshow'])->name('contact.show');
Route::get('product', [ViewsController::class, 'productshow'])->name('product.show');
Route::get('photo', [ViewsController::class, 'photoshow'])->name('photo.show');
Route::get('video', [ViewsController::class, 'videoshow'])->name('video.show');
