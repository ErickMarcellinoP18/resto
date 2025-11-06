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
            $table->string('nama');
            $table->string('Kode')->nullable();
            $table->integer('harga')->default(0);
            $table->integer('status')->default(1);
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->text('deskripsi')->nullable();

            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
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
