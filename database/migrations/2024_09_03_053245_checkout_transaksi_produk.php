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
        Schema::create('checkout_transaksi_produk', function (Blueprint $table) {
            $table->id('ctpid');
            $table->foreignId('ctid')->constrained('checkout_transaksi','ctid');                              
            $table->string('nama_produk', 255);                  
            $table->string('warna_produk', 255);                  
            $table->bigInteger('harga_produk');      
            $table->bigInteger('jumlah_produk');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout_transaksi_produk');
    }
};
