<?php

use App\Models\Evento;
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
        Schema::create('evento_user', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->default(Evento::ESPERA);
            $table->timestamp('fecha_envio');//fecha de envio del correo
            $table->timestamp('fecha_aceptacion')->nullable();//fecha de aceptación del correo
            $table->string('qr')->nullable(); //qr de asistencia
            $table->timestamp('fecha_asistencia')->nullable();//fecha de asistencia al evento
            $table->boolean('asistencia')->nullable();//Si ya ha asistido al evento
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('evento_id')->references('id')->on('eventos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento_user');
    }
};
