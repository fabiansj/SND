<?php

namespace App\Models;

use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProduct extends Model
{
    use HasFactory;
    protected $fillable = ['model_product'];

    public function categoryProduct()
    {
        $this->hasMany(CategoryProduct::class, 'model_product_id');
    }
}
