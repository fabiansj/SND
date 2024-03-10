<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_costumer', function (Blueprint $table) {
            $table->id('id_product_costumer');
            $table->string('product_costumer', 255);
            $table->bigInteger('price_product_costumer')->default(50);
            $table->bigInteger('amount_product_costumer')->default(10);
            $table->bigInteger('price_ongkir')->default(50);
            $table->bigInteger('total_price')->default(50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_costumer');
    }
};
