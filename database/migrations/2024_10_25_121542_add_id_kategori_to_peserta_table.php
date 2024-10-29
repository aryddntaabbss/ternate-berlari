<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('peserta', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kategori')->nullable();
    
            // Menambahkan foreign key ke tabel road_race
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('peserta', function (Blueprint $table) {
            $table->dropForeign(['id_kategori']);
            $table->dropColumn('id_kategori');
        });
    }
};
