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
        Schema::create('produk_mentah', function (Blueprint $table) {
            $table->id('pmid');
            $table->string('nama_produk', 255);            
            $table->string('jumlah_produk', 255);            
            $table->string('harga_produk', 255);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_mentah');
    }
};
