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
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_arsip')->unique();
            $table->string('judul');
            $table->text('keterangan')->nullable();
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_type');
            $table->integer('file_size'); // dalam bytes
            $table->date('tanggal_arsip');
            $table->foreignId('divisi_id')->constrained('divisis')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // user yang upload
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsips');
    }
};
