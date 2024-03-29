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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->date('fecha_nacimiento');
            $table->string('genero',1);
            $table->string('url_photo', 2048);
            $table->string('tipo', 1); //A=admin,F=fotografo,C=cliente,O=Organizador
            $table->string('biografia')->nullable(); //fotografo
            $table->string('marca')->nullable(); //fotografo
            $table->string('slogan')->nullable(); //fotografo
            $table->string('direccion_envio')->nullable(); //cliente
            $table->string('gps')->nullable(); //cliente
            $table->text('device_token')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
