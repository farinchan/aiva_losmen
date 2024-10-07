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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kamar_id')->constrained('kamar');
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id_pelanggan')->on('pelanggan')->onDelete('no action')->onUpdate('cascade');
            $table->date('tanggal_reservasi')->nullable();
            $table->timestamp('check_in');
            $table->timestamp('check_out');
            $table->enum('status', ['belum bayar', 'sudah bayar', 'digunakan', 'selesai'])->default('belum bayar');
            $table->integer('total_hari')->length(2);
            $table->integer('total_pembayaran')->length(10);
            $table->foreignId('metode_pembayaran_id')->constrained('metode_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
