<?php

namespace App\Http\Controllers\Api\Cliente;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClienteController extends BaseController
{
    // change perfil information
    public function updatePerfil(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'sometimes',
            'lastname' => 'sometimes',
            'fecha_nacimiento' => 'sometimes',
            'genero' => 'sometimes',
            'email' => 'sometimes',
            'direccion_envio' => 'sometimes',
            'gps' => 'sometimes',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422); // 422 es el código de respuesta HTTP para errores de validación
        }

        $user = User::find($request->user_id);
        // return $this->sendResponse($user, "user");
        if ($user->tipo == "C") {

            if (isset($request->foto)) {
                $imagen = $request->foto;
                if ($imagen->isValid()) {
                    $nombreImagen = time() . '_' . $request->name . '_perfil' . '.png';
                    // return $this->sendResponse($nombreImagen, "imagen");
                    $path = Storage::disk('s3')->putFileAs(
                        'fotografia_app/perfil',
                        $imagen,
                        $nombreImagen,
                        'public'
                    );

                    // Obtenemos la URL de la imagen en S3.
                    $urlImagen = Storage::disk('s3')->url($path);
                    $user->url_photo = $urlImagen;
                }
            }
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->fecha_nacimiento = $request->fecha_nacimiento;
            $user->genero = $request->genero;
            $user->email = $request->email;
            $user->direccion_envio = $request->direccion_envio;
            $user->gps = $request->gps;

            $user->save();

            return $this->sendResponse($user, "Actualización de de datos personales exitoso");
        }

        return $this->sendError('Error Usuario no es un cliente', $validator->errors(), 404);
    }
    // change password
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422); // 422 es el código de respuesta HTTP para errores de validación
        }
        $user = User::find($request->user_id);
        // return $this->sendResponse($user, "exitoso");
        if ($user->tipo == "C") {
            // Verificar que la current_password coincide con la contraseña del usuario
            if (!Hash::check($request->current_password, $user->password)) {
                return $this->sendError('La contraseña actual no es correcta', [], 400);
            }
            if (Hash::check($request->new_password, $user->password)) {
                return $this->sendError('La nueva contraseña debe ser distinta a la contraseña actual', [], 401);
            }
            $user->password=bcrypt($request->new_password);
            $user->save();
            return $this->sendResponse($user, "exitoso");
        }
        return $this->sendError('Error usuario no autorizado', [], 402);
    }
}
