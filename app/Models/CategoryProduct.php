<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ModelProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $fillalbe = ['category_product', 'model_product_id'];

    public function product()
    {
        $this->hasMany(Product::class, 'category_product_id');
    }

    public function modelProduct()
    {
        $this->belongsTo(ModelProduct::class, 'id_model_product');
    }
}
