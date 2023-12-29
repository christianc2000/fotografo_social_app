<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function inicial()
    {
        $servicios = Orden::join('servicios', 'servicios.id', '=', 'ordens.servicio_id')
            ->selectRaw('COUNT(ordens.servicio_id) as cantidad, servicios.nombre, servicios.url_imagen, servicios.costo')
            ->groupBy('ordens.servicio_id', 'servicios.nombre', 'servicios.url_imagen', 'servicios.costo')
            ->orderByDesc('cantidad')
            ->get();
                  $personals = User::personal();
        return view('cliente.inicio', compact('servicios', 'personals'));
    }
    public function servicios(){
        $servicios = Servicio::orderBy('atencion', 'desc')->get();

        return view('cliente.servicio',compact('servicios'));
    }
}
