<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumerProduct extends Model
{
    use HasFactory;
    protected $fillable = ['product_costumer', 'price_product_costumer', 'amount_product_costumer', 'price_ongkir', 'total_price'];

    public function product()
    {
        $this->hasMany(Costumer::class, 'product_costumer_id');
    }
}
