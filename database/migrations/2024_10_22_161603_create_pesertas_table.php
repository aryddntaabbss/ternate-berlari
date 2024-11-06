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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']);
            $table->string('pekerjaan');
            $table->string('no_tlp');
            $table->string('alamat');
            $table->string('komunitas');
            $table->string('riwayat_penyakit');
            $table->string('kontak_darurat');
            $table->enum('size_jersey', ['S', 'M', 'L', 'XL', 'XXL','3XL','4XL']);
            $table->string('bukti_bayar');
            $table->enum('status', ['terverifikasi', 'tidak terverifikasi'])->default('tidak terverifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
