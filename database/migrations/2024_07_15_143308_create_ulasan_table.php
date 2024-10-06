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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kamar_id')->constrained('kamar');
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('rating')->length(1);
            $table->text('komentar')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
