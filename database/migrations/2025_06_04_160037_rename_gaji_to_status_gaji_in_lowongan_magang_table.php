<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lowongan_magang', function (Blueprint $table) {
            $table->renameColumn('gaji', 'status_gaji');
        });
    }

    public function down(): void
    {
        Schema::table('lowongan_magang', function (Blueprint $table) {
            $table->renameColumn('status_gaji', 'gaji');
        });
    }
};
