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
        Schema::create('gl_trans_stock', function (Blueprint $table) {
            $table->id('gtid');
            $table->string('nama', 255);
            $table->bigInteger('harga');
            $table->bigInteger('total_harga');
            $table->bigInteger('jumlah');
            $table->boolean('is_paid')->default(true); // for retur or cancel order, changed by payment controller
            $table->foreignId('prid');
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
        Schema::dropIfExists('gl_trans_stock');
    }
};