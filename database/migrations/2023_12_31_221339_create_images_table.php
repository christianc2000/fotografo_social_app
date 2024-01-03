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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->boolean('estado')->default(true);//oculta=false, visible=true
            $table->boolean('analizado')->default(false);//si ya se hizo un analisis de la foto
            $table->string('url');
            $table->string('url_baja')->nullable();
            $table->string('tipo')->nullable();//TIPO FOTOGRAFO O EVENTO, CUANDO ES FOTOGRAFO ES SÓLO PARA EL, CUANDO ES EVENTO LA FOTO ES PARA EL EVENTO
            $table->decimal('precio',8,2)->nullable();//Sólo para el fotografo
            $table->unsignedInteger('cantidad_vendido')->default(0);//Sólo para el fotografo;
            $table->string('categoria');//publica o privada
            $table->json('clientes')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('evento_id')->nullable()->constrained('eventos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
