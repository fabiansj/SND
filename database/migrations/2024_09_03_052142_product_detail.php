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
        Schema::create('product_detail', function (Blueprint $table) {
            $table->id('pdid');
            $table->foreignId('prid')->constrained('product','prid');
            $table->foreignId('pwid')->constrained('product_warna','pwid');
            $table->foreignId('psid')->constrained('product_stok','psid');
            $table->string('url_image', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_detail');
    }
};
