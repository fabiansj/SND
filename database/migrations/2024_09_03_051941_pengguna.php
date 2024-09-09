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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('pid');
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('nama', 100);
            $table->text('alamat');
            $table->string('no_telp',15);
            $table->string('role', 50);
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
        Schema::dropIfExists('pengguna');
    }
};
