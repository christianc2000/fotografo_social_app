<?php

namespace App\Http\Controllers\Api\Cliente;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvitacionController extends BaseController
{
    public function aceptarInvitacion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'evento_id' => 'required|exists:eventos,id',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422); // 422 es el código de respuesta HTTP para errores de validación
        }
        $user = User::find($request->user_id);
       
        $evento = Evento::find($request->evento_id);
        if ($user->tipo == "C") {
            $eventoUser = $user->vinculacionEvento->where('id', $evento->id)->first();

            if (!isset($eventoUser->pivot['fecha_aceptacion'])) {
                $estado=$user->vinculacionEvento()->updateExistingPivot($evento->id, ['fecha_aceptacion' => Carbon::now()->toDateTimeString(), 'estado' => Evento::ACEPTADO]);
                return $this->sendResponse($user->vinculacionEvento->find($evento->id), "Invitación aceptada");
            } else {
                return $this->sendResponse($user->vinculacionEvento, "Invitación ya fue aceptada");
            }
        } else {
            return $this->sendError('Unauthorized', [], 401);
        }
    }
}
