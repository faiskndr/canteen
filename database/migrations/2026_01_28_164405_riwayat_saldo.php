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
        Schema::create('riwayat_saldo', function (Blueprint $table) {
            $table->bigIncrements('riwayat_saldo_id');
            $table->decimal('saldo_awal', 15, 2);
            $table->decimal('saldo_akhir', 15, 2);
            $table->string('jenis');
            $table->unsignedBigInteger('kartu_id');
            $table->unsignedBigInteger('transaksi_id')->nullable();
            $table->unsignedBigInteger('top_up_id')->nullable();
            $table->timestamp('dibuat_pada');
            $table->timestamp('diubah_pada');

            $table->foreign('kartu_id')->references('kartu_id')->on('kartu');
            $table->foreign('transaksi_id')->references('transaksi_id')->on('transaksi');
            $table->foreign('top_up_id')->references('top_up_id')->on('top_up');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_saldo');
    }
};
