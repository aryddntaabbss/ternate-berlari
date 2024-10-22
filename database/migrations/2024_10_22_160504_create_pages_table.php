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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->longText('content');
            $table->enum('status', ['aktif', 'tidak'])->default('aktif');
            $table->unsignedBigInteger('menu_id'); // Tambahkan kolom menu_id sebagai foreign key
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade'); // Tambahkan foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
