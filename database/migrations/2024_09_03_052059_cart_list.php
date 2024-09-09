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
            $table->foreignId('cid', 50)->constrained('cart','cid');            
            $table->string('nama', 255);
            $table->string('warna', 50);
            $table->bigInteger('jumlah');
            $table->bigInteger('harga');            
            $table->timestamp('created_at');
            $table->bigInteger('create_by');
            $table->timestamp('modified_at');
            $table->bigInteger('modify_by');
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
