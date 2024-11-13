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
        Schema::create('anggota', function (Blueprint $table) {
            $table->string('no_anggota')->primary();
            $table->string('nama');
            $table->string('nim');
            $table->string('no_wa');
            // $table->string('ttl');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->unsignedBigInteger('fakultas_id');
            $table->unsignedBigInteger('program_studi_id');
            $table->string('email');
            $table->integer('total_simpanan')->default(0);
            $table->timestamps();

            $table->foreign('fakultas_id')->references('id')->on('fakultas');
            $table->foreign('program_studi_id')->references('id')->on('program_studi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
