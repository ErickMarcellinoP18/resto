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
        Schema::create('detil_nota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_nota')->constrained('nota');
            $table->foreignId('id_produk')->constrained('detil_produk');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->integer('hpp');
            $table->integer('diskon')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detil_nota');
    }
};
