<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    DB::statement("
        ALTER TABLE lahan
        MODIFY status ENUM('menunggu','diterima','ditolak')
        DEFAULT 'menunggu'
    ");

    DB::statement("
        ALTER TABLE lahan
        MODIFY status_listing ENUM('menunggu','diterima','ditolak')
        DEFAULT 'menunggu'
    ");
}

    public function down(): void
{
    // optional rollback (biasanya jarang dipakai)
}
};