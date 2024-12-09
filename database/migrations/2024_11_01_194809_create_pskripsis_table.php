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
        // Schema::create('pe_skripsis', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama_mahasiswa');
        //     $table->integer('nim');
        //     $table->string('judul_sementara');
        //     $table->string('dosen_pembimbing');
        //     $table->string('jenis_skripsi');
        //     $table->timestamps();
        // });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('pe_skripsis');
    }
};
