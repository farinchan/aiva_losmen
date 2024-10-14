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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama', 50);//
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();//
            $table->string('no_telp', 20)->nullable();//
            $table->string('foto')->nullable();
            $table->string('jabatan', 50)->nullable();//
            $table->text('alamat')->nullable();//
            $table->string('tempat_lahir', 50)->nullable();//
            $table->date('tanggal_lahir')->nullable();//
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
