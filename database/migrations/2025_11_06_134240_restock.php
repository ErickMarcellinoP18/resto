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
        Schema::create('restock', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_supplier')->constrained('supplier');
            $table->integer('total')->default(0);
            $table->dateTime('tanggal')->default(now());
            $table->string('no_trans')->unique();
            $table->string('metode');
            $table->integer('tbayar')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restock');
    }
};
