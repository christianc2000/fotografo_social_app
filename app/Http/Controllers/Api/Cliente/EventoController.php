<?php

namespace App\Http\Controllers\Api\Cliente;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventoController extends BaseController
{
    public function misEventos(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422); // 422 es el código de respuesta HTTP para errores de validación
        }

        $user=User::find($request->user_id);
        $eventos=$user->vinculacionEvento;
        return $this->sendResponse($eventos,"Mis eventos");
    }
    public function todosEventos(){
        $eventos=Evento::all();
        return $this->sendResponse($eventos,"Todos los eventos");
    }
}
