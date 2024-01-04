<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {   
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'genero' => ['required', 'string', 'max:1'],
            'direccion' => ['required', 'string', 'max:255'],
            'imagen'=>['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();
     
        if ($input['imagen']) {
            // Subir la nueva imagen
            $imagen = $input['imagen'];
            $nombreImagen = time() . '_' . $input['name'] . '_evento' . '.png';
            $path = Storage::disk('s3')->putFileAs(
                'fotografia_app/perfil',
                $imagen,
                $nombreImagen,
                'public'
            );
            $urlImagen = Storage::disk('s3')->url($path);
            // Registra usuarios cliente
            $user = User::create([
                'name' => $input['name'],
                'lastname' => $input['lastname'],
                'fecha_nacimiento' => $input['fecha_nacimiento'],
                'genero' => $input['genero'],
                'direccion_envio' => $input['direccion'],
                'gps'=>'-17.82858,-63.11273',
                'email' => $input['email'],
                'tipo'=>"C",
                'url_photo'=>$urlImagen,
                'password' => Hash::make($input['password']),
            ]);
        }
        return $user;
    }
}
