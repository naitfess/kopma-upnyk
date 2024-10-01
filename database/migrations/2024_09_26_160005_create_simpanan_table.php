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
        Schema::create('simpanan', function (Blueprint $table) {
            $table->id();
            $table->string('no_anggota');
            $table->unsignedBigInteger('jenis_simpanan_id');
            $table->integer('nominal');
            $table->timestamps();
            $table->string('keterangan')->nullable();

            $table->foreign('no_anggota')->references('no_anggota')->on('anggota');
            $table->foreign('jenis_simpanan_id')->references('id')->on('jenis_simpanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpanan');
    }
};
