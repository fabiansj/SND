<?php

namespace App\Models;

use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name_product', 'category_product_id', 'price_product', 'stock_product'];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'id_category_product');
    }
}
