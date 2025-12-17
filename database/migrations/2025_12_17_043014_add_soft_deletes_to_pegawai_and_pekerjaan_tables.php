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
        Schema::table('budi_534908_pegawai', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('budi_534908_pekerjaan', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('budi_534908_pegawai', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('budi_534908_pekerjaan', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
