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
        Schema::create('produk_detail', function (Blueprint $table) {
            $table->id('pdid');
            $table->foreignId('prid')->constrained('produk','prid');
            $table->foreignId('pwid')->constrained('produk_warna','pwid');
            $table->foreignId('psid')->constrained('produk_stok','psid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_detail');
    }
};
