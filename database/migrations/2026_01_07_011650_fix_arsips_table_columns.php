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
        Schema::table('arsips', function (Blueprint $table) {
            // Pastikan kolom-kolom ini ada
            if (!Schema::hasColumn('arsips', 'kategori')) {
                $table->string('kategori')->after('judul');
            }

            if (!Schema::hasColumn('arsips', 'file_size')) {
                $table->bigInteger('file_size')->nullable()->after('file_type');
            }

            // Modifikasi kolom file_size jika ada tapi tipe datanya salah
            if (Schema::hasColumn('arsips', 'file_size')) {
                $table->bigInteger('file_size')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arsips', function (Blueprint $table) {
            // Tidak perlu drop karena kita hanya memastikan kolom ada
        });
    }
};
