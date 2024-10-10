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
        Schema::create('konfirmasi_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim', 50)->nullable();
            $table->string('no_rek', 20)->nullable();
            $table->date('tanggal_transfer')->nullable();
            $table->string('bukti_transfer');
            $table->foreignId('transaksi_id')->constrained('transaksi');
            $table->timestamp('waktu_konfirmasi')->nullable();
            $table->enum('status', ['Menunggu Konfirmasi', 'Diterima', 'Ditolak'])->default('Menunggu Konfirmasi');
            $table->integer('admin_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfirmasi_pembayaran');
    }
};
