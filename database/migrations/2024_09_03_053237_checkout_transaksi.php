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
        Schema::create('checkout_transaksi', function (Blueprint $table) {
            $table->id('ctid');
            $table->foreignId('pid')->constrained('pengguna','pid');                  
            $table->boolean('is_paid')->default(false);
            $table->string('nama', 255);      
            $table->text('alamat');      
            $table->string('no_telp', 15);      
            $table->bigInteger('final_price');      
            $table->string('status_produk');      
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('create_by');
            $table->timestamp('modified_at')->useCurrent()->useCurrentOnUpdate();
            $table->bigInteger('modify_by');
            $table->string('status')->default('pending');
            $table->string('snap_token')->nullable();
            $table->string('order_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout_transaksi');
    }
};
