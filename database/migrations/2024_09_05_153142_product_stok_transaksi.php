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
            $table->string('nama_product', 255);            
            $table->string('jumlah', 50);                        
            $table->foreignId('ctid');
            $table->foreignId('prid');
            $table->bigInteger('psid')->constrained('product_stok','psid');;
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
        Schema::dropIfExists('product_stok_transaksi');
    }
};
