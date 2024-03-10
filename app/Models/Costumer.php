<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email', 'address', 'notes', 'name_receiver_products', 'address_receiver_products', 'phone_receiver_products', 'product_costumer_id'];

    public function CostumerProduct()
    {
        $this->belongsTo(CostumerProduct::class, 'id_product_costumer');
    }
}
