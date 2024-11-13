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
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('no_wa');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->unsignedBigInteger('fakultas_id');
            $table->unsignedBigInteger('program_studi_id');
            $table->string('email');
            $table->string('metode');
            $table->text('bukti_path')->nullable();
            $table->string('status')->default('new');
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
        Schema::dropIfExists('pendaftaran');
    }
};
