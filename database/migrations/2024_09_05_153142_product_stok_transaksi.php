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
        Schema::create('product_stok_transaksi', function (Blueprint $table) {
            $table->id('pstid');
            $table->string('nama', 255);            
            $table->string('jumlah', 255);                        
            $table->bigInteger('psid')->constrained('product_stok','psid');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stok_transaksi');
    }
};
