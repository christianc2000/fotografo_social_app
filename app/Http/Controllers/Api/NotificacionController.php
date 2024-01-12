<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificacionController extends BaseController
{
    public function marcarNotificaciones(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422); // 422 es el código de respuesta HTTP para errores de validación
        }
        $user = User::find($request->user_id);
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return $this->sendResponse(["read"=>$user->readNotifications,"unread"=>$user->unreadNotifications],"notificaciones");
    }
}
