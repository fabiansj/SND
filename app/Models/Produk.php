<?php

namespace App\Models;

use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = ['nama_produk', 'harga_produk', 'kode_produk', 'pjid'];
}
