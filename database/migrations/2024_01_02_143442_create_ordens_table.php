<?php

use App\Models\Orden;
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
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->string('direccion_envio')->nullable();//se llena cuando ya se realiza el pago
            $table->string('correo_orden')->nullable();//se llena cuando ya se realiza el pago
            $table->timestamp('fecha_orden')->nullable();//se llena cuando ya se realiza el pago
            $table->string('estado_orden')->nullable();//se llena cuando ya se realiza el pago
            $table->string('tipo_entrega')->nullable();
            $table->string('tipo')->default(Orden::CARRITO);
            $table->decimal('total',8,2)->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
