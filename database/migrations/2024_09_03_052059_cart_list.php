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
        Schema::create('cart_list', function (Blueprint $table) {
            $table->id('clid');
            $table->foreignId('cid', 255)->constrained('cart','cid');
            $table->string('nama_produk', 255);
            $table->string('warna_produk', 100);
            $table->bigInteger('jumlah_produk');
            $table->bigInteger('harga_produk');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_list');
    }
};
