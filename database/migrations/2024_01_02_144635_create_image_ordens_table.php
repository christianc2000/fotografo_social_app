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
        Schema::create('image_ordens', function (Blueprint $table) {
            $table->id();
            $table->string('url'); //si la orden está en tipo CARRITO entonces se coloca la url de la imagen en baja calidad, si la orden está en tipo COMPRA se coloca la url de la imagen en buena calidad
            $table->decimal('costo',8,2);
            $table->foreignId('orden_id')->constrained('ordens');
            $table->foreignId('image_id')->nullable()->constrained('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_ordens');
    }
};
