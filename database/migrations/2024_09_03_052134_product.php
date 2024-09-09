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
        Schema::create('product', function (Blueprint $table) {
            $table->id('prid');
            $table->string('nama', 255);
            $table->bigInteger('harga');
            $table->string('kode', 100);
            $table->foreignId('pjid')->constrained('product_jenis','pjid');
            $table->text('keterangan');
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
        Schema::dropIfExists('product');
    }
};
