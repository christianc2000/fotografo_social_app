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

        User::create([
            'name' => 'Fotografo2',
            'lastname' => 'Evento',
            'fecha_nacimiento' => '2002-01-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/fotografo2_perfil.jpg',
            'tipo' => 'F', //A=admin,F=fotografo,C=cliente,O=Organizador
            'biografia'=>'Con experiencia de 5 años, estudié en el instituo nacional de fotografía. Realizo fotos para eventos, modelos, entre otros', //fotografo
            'marca'=>'FotoLife', //fotografo
            'slogan'=>'Una imagen dice más que mil palabras', //fotografo
            'email' => 'fotografo2@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Fotografo3',
            'lastname' => 'Evento',
            'fecha_nacimiento' => '2000-12-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/fotografo3_perfil.jpg',
            'tipo' => 'F', //A=admin,F=fotografo,C=cliente,O=Organizador
            'biografia'=>'Con experiencia de 5 años, estudié en el instituo nacional de fotografía. Realizo fotos para eventos, modelos, entre otros', //fotografo
            'marca'=>'FotoLife', //fotografo
            'slogan'=>'Una imagen dice más que mil palabras', //fotografo
            'email' => 'fotografo3@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

         // Cliente
         User::create([
            'name' => 'Carla',
            'lastname' => 'Cruz',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'F',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/Carla.jpeg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'carla@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Christian',
            'lastname' => 'Mamani',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/Christian.jpeg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'christian@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Johan',
            'lastname' => 'Quispe',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/JohanQuispe.jpg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'johan@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Karen',
            'lastname' => 'Miranda',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'F',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/Karen.jpg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'karen@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Karoline',
            'lastname' => 'Heredia',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'F',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/karoline.jpg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'karoline@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Marco',
            'lastname' => 'Padilla',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/Marco.jpg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'Marco@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Naida',
            'lastname' => 'Vasquez',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'F',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/Naida.jpg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'naida@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Orlando',
            'lastname' => 'Huascar',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/Orlando.jpg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'orlando@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Pedro',
            'lastname' => 'Sarabia',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/Pedro.jpg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'pedro@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Ruben',
            'lastname' => 'Suarez',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'M',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/Ruben.jpg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'ruben@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Sabrina',
            'lastname' => 'Guzman',
            'fecha_nacimiento' => '2000-01-04',
            'genero' => 'F',
            'url_photo' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/perfil/Sabrina.jpg',
            'direccion_envio'=>'Calle Camiri, plan 3000, Santa Cruz', //cliente
            'gps'=>'-17.82858,-63.11273', //cliente
            'tipo' => 'C', //A=admin,F=fotografo,C=cliente,O=Organizador
            'email' => 'sabrina@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
