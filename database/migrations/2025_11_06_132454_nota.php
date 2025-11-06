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
        Schema::create('nota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kasir')->constrained('users');
            $table->dateTime('tanggal')->default(now());
            $table->string('inv_num')->unique();
            $table->integer('total');
            $table->integer('bayar');
            $table->integer('kembali');
            $table->integer('status');
            $table->integer('metode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota');
    }
};
