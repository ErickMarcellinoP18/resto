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
        Schema::create('detil_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produk')->constrained('produk');
            $table->foreignId('id_supplier')->constrained('supplier')->nullable();
            $table->integer('stok')->default(0);
            $table->integer('harga');
            $table->integer('hpp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detil_produk');
    }
};
