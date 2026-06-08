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
    Schema::create('chat_rooms', function (Blueprint $table) {
        $table->id();

        $table->foreignId('petani_id')
            ->constrained('users')
            ->onDelete('cascade');

        $table->foreignId('pembeli_id')
            ->constrained('users')
            ->onDelete('cascade');

        $table->foreignId('lahan_id')
            ->nullable()
            ->constrained('lahan')
            ->onDelete('set null');

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('chat_rooms');
}
};
