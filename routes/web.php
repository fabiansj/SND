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

Route::get('/test', function () {
    return view('test');
});

Route::redirect('index', '/');
Route::redirect('home', '/');
Route::redirect('snd', '/');
Route::redirect('admin', '/');
Route::redirect('produk', '/');


Route::get('/', [ViewsController::class, 'index'])->name('index.show');
Route::get('about', [ViewsController::class, 'aboutshow'])->name('about.show');
Route::get('contact', [ViewsController::class, 'contactshow'])->name('contact.show');
Route::get('product', [ViewsController::class, 'productshow'])->name('product.show');
Route::get('photo', [ViewsController::class, 'photoshow'])->name('photo.show');
Route::get('video', [ViewsController::class, 'videoshow'])->name('video.show');
