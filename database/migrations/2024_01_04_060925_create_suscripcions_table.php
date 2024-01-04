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
        Schema::create('suscripcions', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado')->default(true);
            $table->boolean('pagado');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('costo',8,2);
          
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('plan_id')->references('id')->on('plans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscripcions');
    }
};
