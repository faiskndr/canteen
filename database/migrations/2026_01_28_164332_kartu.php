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
        Schema::create('kartu', function (Blueprint $table) {
            $table->bigIncrements('kartu_id');
            $table->string('no_kartu')->unique();
            $table->string('pin');
            $table->decimal('saldo', 15, 2)->default(0);
            $table->string('status');
            $table->unsignedBigInteger('siswa_id');
            $table->timestamps();

            $table->foreign('siswa_id')
                  ->references('siswa_id')
                  ->on('siswa')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu');
    }
};
