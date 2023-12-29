<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Organizador
        User::create([
            'name' => 'Organizador',
            'lastname' => 'Evento',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/organizador_perfil.jpeg',
            'tipo' => 'O', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'organizador@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Fotografo
        User::create([
            'name' => 'Fotografo',
            'lastname' => 'Evento',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/fotografo_perfil.jpeg',
            'tipo' => 'F', //A=admin,F=fotografo,C=cliente,O=Organizador
            'biografia'=>'Con experiencia de 5 años, estudié en el instituo nacional de fotografía. Realizo fotos para eventos, modelos, entre otros', //fotografo
            'marca'=>'FotoLife', //fotografo
            'slogan'=>'Una imagen dice más que mil palabras', //fotografo
            'email' => 'fotografo@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Cliente
        User::create([
            'name' => 'Cliente',
            'lastname' => 'Evento',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/cliente_perfil.jpeg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
