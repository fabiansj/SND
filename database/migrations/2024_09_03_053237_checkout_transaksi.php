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
            $table->boolean('is_paid');      
            $table->string('nama_penerima', 255);      
            $table->text('alamat_penerima');      
            $table->bigInteger('no_telp_penerima');      
            $table->timestamps();
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
