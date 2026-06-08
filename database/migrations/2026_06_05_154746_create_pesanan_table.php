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
    Schema::create('pesanan', function (Blueprint $table) {
        $table->id();

        $table->foreignId('pembeli_id')
            ->constrained('users')
            ->onDelete('cascade');

        $table->decimal('total_harga', 12, 2);

        $table->text('alamat_tujuan');

        $table->enum('status_pesanan', [
            'menunggu_diproses',
            'dikemas',
            'dikirim',
            'selesai'
        ])->default('menunggu_diproses');

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('pesanan');
}
};
