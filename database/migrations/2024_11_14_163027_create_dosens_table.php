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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nip')->unique();
            $table->string('name');
            $table->string('email');
            $table->foreignId('jabatan_id')
                ->nullable()
                ->constrained('jabatans')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('peminatan_id')
                ->nullable()
                ->constrained('peminatans')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
