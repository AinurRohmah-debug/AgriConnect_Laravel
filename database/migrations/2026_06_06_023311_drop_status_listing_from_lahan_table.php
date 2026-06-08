<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lahan', function (Blueprint $table) {
            $table->dropColumn('status_listing');
        });
    }

    public function down(): void
    {
        Schema::table('lahan', function (Blueprint $table) {
            $table->enum('status_listing', ['menunggu', 'diterima', 'ditolak'])
                  ->default('menunggu')
                  ->after('status');
        });
    }
};