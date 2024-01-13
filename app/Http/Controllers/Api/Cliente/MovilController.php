<?php

namespace App\Http\Controllers\Api\Cliente;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\ImageOrden;
use App\Models\Orden;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MovilController extends BaseController
{
    // login
    public function login(Request $request)
    {
        // start validatons
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255,email',
            'password' => 'required|min:8',
        ]);
        $validator->setCustomMessages([
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser un correo electronico',
            'password.required' => 'La contraseña es obligatorio',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if (!Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return $this->sendError('Validation Error.', ['email' => 'Correo electrónico no registrado.']);
            }
            return $this->sendError('Unauthorized', ['password' => 'La contraseña es errónea']);
        }
        // end validations

        $user = User::where('email', $request['email'])->firstOrFail();
        if ($user->tipo == 'C') {
            $token = $user->createToken('auth_token')->plainTextToken;

            $result = [
                'token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ];

            return $this->sendResponse($result, 'You have successfully log in');
        }
        return $this->sendError('Unauthorized', ['password' => 'Usuario no corresponde']);
    }

    // mostrar mis evento
    public function eventos(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user=User::find($request->user_id);

        if($user->tipo=='C'){
            $eventos=$user->vinculacionEvento;
            return $this->sendResponse($eventos,"Mis eventos");
        }else{
            return $this->sendError('Unauthorized', ['password' => 'Usuario no corresponde']);
        }
    }
    public function miEvento(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'evento_id'=>'required|exists:eventos,id'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user=User::find($request->user_id);
        if($user->tipo=='C'){
            $evento=$user->vinculacionEvento->find($request->evento_id);
            return $this->sendResponse($evento,"Mi eventos");
        }else{
            return $this->sendError('Unauthorized', ['password' => 'Usuario no corresponde']);
        }
    }
    public function galeriaEvento(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'evento_id'=>'required|exists:eventos,id'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user=User::find($request->user_id);
        if($user->tipo=='C'){
            $evento=$user->vinculacionEvento->find($request->evento_id);
            
            $imagenes=Image::where('evento_id',$evento->id)->get();
            $imagenIds = $imagenes->pluck('id');

            $imagenesOrden = ImageOrden::whereHas('orden', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->where('tipo', Orden::COMPRA);
            })->whereIn('image_id', $imagenIds)->get();
            // $ordens=$user->ordens()->with('imagenesOrden')->where('tipo',Orden::COMPRA)->get();
           
            return $this->sendResponse($imagenesOrden,"Mi galeria");
        }else{
            return $this->sendError('Unauthorized', ['password' => 'Usuario no corresponde']);
        }
    }
    public function galeria(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user=User::find($request->user_id);
        if($user->tipo=='C'){
            $ordens = $user->ordens()->where('tipo', Orden::COMPRA)->get();

            $imagenesOrden = ImageOrden::whereIn('orden_id', $ordens->pluck('id'))->get();
            return $this->sendResponse($imagenesOrden,"Mi galeria");
        }else{
            return $this->sendError('Unauthorized', ['password' => 'Usuario no corresponde']);
        }
    }

    public function notificaciones(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user=User::find($request->user_id);
        if($user->tipo=='C'){
         $notificaciones= $user->notifications;
         $notificaciones_leidas=$user->readNotifications;
         $notificaciones_sin_leer=$user->unreadNotifications;
            return $this->sendResponse(['read'=>$notificaciones_leidas,'unread'=>$notificaciones_sin_leer],"Mis notificaciones");
        }else{
            return $this->sendError('Unauthorized', ['password' => 'Usuario no corresponde']);
        }
    }
}
