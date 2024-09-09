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
        Schema::create('checkout_transaksi_product', function (Blueprint $table) {
            $table->id('ctpid');
            $table->foreignId('ctid')->constrained('checkout_transaksi','ctid');                              
            $table->string('nama', 255);                  
            $table->string('warna', 255);                  
            $table->bigInteger('harga');      
            $table->bigInteger('jumlah');      
            $table->bigInteger('total_harga');      
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('create_by');
            $table->timestamp('modified_at')->useCurrent()->useCurrentOnUpdate();
            $table->bigInteger('modify_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout_transaksi_product');
    }
};
