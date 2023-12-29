<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'ci' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'celular' => ['required', 'string', 'max:255'],
            'genero' => ['required', 'string', 'max:1'],
            'residencia_actual' => ['required', 'string', 'max:255'],
            'url_foto' => ['nullable', 'string', 'max:255'],
            'ocupacion' => ['nullable', 'string', 'max:255'],
        ])->validate();

       

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'ci' => $input['ci'],
            'lastname' => $input['lastname'],
            'birth_date' => $input['birth_date'],
            'celular' => $input['celular'],
            'tipo' => "P",
            'url_foto' => "https://rekognitions3-bucket.s3.amazonaws.com/Tecno/perfil/usuario_default.jpeg",
            'genero' => $input['genero'],
            'residencia_actual' => $input['residencia_actual'],
            'ocupacion' => $input['ocupacion'],
        ]);

            // $user->assignRole('cliente');
       

        if (isset($input['url_foto']) && $input['url_foto']) {
            $path = $input['url_foto'];
            $user->update(['url_foto' => $path]);
        }


        return $user;
    }
}
