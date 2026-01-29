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
        Schema::create('top_up', function (Blueprint $table) {
            $table->bigIncrements('top_up_id');
            $table->decimal('nominal', 15, 2);
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('petugas_top_up_id');
            $table->timestamp('dibuat_pada');
            $table->timestamp('diubah_pada');

            $table->foreign('siswa_id')->references('siswa_id')->on('siswa');
            $table->foreign('petugas_top_up_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_up');
    }
};
