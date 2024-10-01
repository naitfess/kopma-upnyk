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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->timestamp('waktu');
            $table->string('nama');
            $table->string('nim');
            $table->string('no_wa');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('kelamin');
            $table->string('agama');
            $table->unsignedBigInteger('fakultas_id');
            $table->unsignedBigInteger('program_studi_id');
            $table->string('email');
            $table->string('metode');
            $table->text('bukti');
            $table->string('status');

            $table->foreign('fakultas_id')->references('id')->on('fakultas');
            $table->foreign('program_studi_id')->references('id')->on('program_studi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
