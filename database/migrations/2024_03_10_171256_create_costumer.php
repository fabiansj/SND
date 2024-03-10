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
        Schema::create('costumer', function (Blueprint $table) {
            $table->id('id_costumer');
            $table->string('name', 255);
            $table->string('phone', 15);
            $table->string('email', 100);
            $table->text('address');
            $table->text('notes');
            $table->string('name_receiver_product', 255);
            $table->text('address_receiver_product');
            $table->bigInteger('phone_receiver_product')->default(15);
            $table->foreignId('product_costumer_id')->constrained('product_costumer', 'id_product_costumer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costumer');
    }
};
