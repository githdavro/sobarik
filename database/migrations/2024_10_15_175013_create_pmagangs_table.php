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
        // Schema::create('pe_magangs', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama_mahasiswa');
        //     $table->integer('nim');
        //     $table->string('notelp');
        //     $table->string('nama_instansi');
        //     $table->string('tgl_mulai_kp');
        //     $table->string('tgl_selesai_kp');
        //     $table->string('file');
        //     $table->string('validasi');
        //     $table->string('keterangan');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('pmagangs');
    }
};