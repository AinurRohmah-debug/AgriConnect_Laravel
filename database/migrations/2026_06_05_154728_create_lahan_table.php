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
    Schema::create('lahan', function (Blueprint $table) {
        $table->id();

        $table->foreignId('petani_id')
            ->constrained('users')
            ->onDelete('cascade');

        $table->string('komoditas');
        $table->decimal('luas_lahan', 10, 2);
        $table->date('estimasi_panen');
        $table->text('deskripsi');
        $table->text('alamat_lahan');

        $table->decimal('harga_min', 12, 2);
        $table->decimal('harga_max', 12, 2);

        $table->boolean('bisa_nego')->default(true);

        $table->string('foto_lahan')->nullable();

        $table->enum('status_listing', ['pending', 'approved', 'rejected'])
            ->default('pending');

        $table->string('status')->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('lahan');
}
};
