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
    Schema::create('pengajuan_minat', function (Blueprint $table) {
        $table->id();

        $table->foreignId('lahan_id')
            ->constrained('lahan')
            ->onDelete('cascade');

        $table->foreignId('pembeli_id')
            ->constrained('users')
            ->onDelete('cascade');

        $table->text('pesan');

        $table->enum('status', ['pending', 'accepted', 'rejected'])
            ->default('pending');

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('pengajuan_minat');
}
};
