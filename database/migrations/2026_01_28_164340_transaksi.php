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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('transaksi_id');
            $table->decimal('total_belanja', 15, 2);
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('kantin_id');
            $table->unsignedBigInteger('petugas_kantin_id');
            $table->timestamp('dibuat_pada');
            $table->timestamp('diubah_pada');

            $table->foreign('siswa_id')->references('siswa_id')->on('siswa');
            $table->foreign('kantin_id')->references('kantin_id')->on('kantin');
            $table->foreign('petugas_kantin_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
