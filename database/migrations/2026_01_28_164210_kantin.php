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
        Schema::create('kantin', function (Blueprint $table) {
            $table->bigIncrements('kantin_id');
            $table->string('nama');
            $table->string('lokasi');
            $table->unsignedBigInteger('sekolah_id');
            $table->timestamp('dibuat_pada');
            $table->timestamp('diubah_pada');

            $table->foreign('sekolah_id')
                  ->references('sekolah_id')
                  ->on('sekolah')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kantin');
    }
};
