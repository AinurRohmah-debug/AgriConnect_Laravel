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
    Schema::create('produk', function (Blueprint $table) {
        $table->id();

        // RELASI KE PETANI
        $table->foreignId('petani_id')
              ->constrained('users')
              ->onDelete('cascade');

        $table->string('nama_produk');
        $table->string('kategori');
        $table->decimal('harga', 12, 2);
        $table->integer('stok');
        $table->string('satuan');

        $table->string('foto_produk')->nullable();
        $table->text('deskripsi');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('produk');
}
};
