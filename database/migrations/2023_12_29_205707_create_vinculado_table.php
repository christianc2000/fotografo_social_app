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
        Schema::create('vinculado', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado')->default(true);
            $table->foreignId('organizador_id')->references('id')->on('users');
            $table->foreignId('fotografo_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vinculado');
    }
};
