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
        Schema::create('poin', function (Blueprint $table) {
            $table->id();
            $table->string('no_anggota');
            $table->integer('i1')->nullable();
            $table->integer('i2')->nullable();
            $table->integer('i3')->nullable();
            $table->integer('i4')->nullable();
            $table->integer('i5')->nullable();
            $table->integer('i6')->nullable();
            $table->integer('i7')->nullable();
            $table->integer('i8')->nullable();
            $table->integer('i9')->nullable();
            $table->integer('i10')->nullable();
            $table->integer('i11')->nullable();
            $table->integer('i12')->nullable();
            $table->integer('e1')->nullable();
            $table->integer('e2')->nullable();
            $table->integer('e3')->nullable();
            $table->integer('e4')->nullable();
            $table->integer('e5')->nullable();
            $table->integer('e6')->nullable();
            $table->integer('e7')->nullable();
            $table->integer('e8')->nullable();
            $table->integer('e9')->nullable();
            $table->integer('e10')->nullable();
            $table->integer('e11')->nullable();
            $table->integer('e12')->nullable();
            $table->integer('e13')->nullable();
            $table->integer('e14')->nullable();
            $table->integer('o1')->nullable();
            $table->integer('o2')->nullable();
            $table->integer('o3')->nullable();
            $table->integer('o4')->nullable();
            $table->integer('o5')->nullable();
            $table->integer('o6')->nullable();
            $table->integer('total')->nullable();

            $table->foreign('no_anggota')->references('no_anggota')->on('anggota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin');
    }
};
