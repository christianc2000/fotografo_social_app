<?php

namespace App\Http\Controllers\Web\Organizador;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo == "O") {
            $eventos = $user->eventos;

            return view('web.organizador.evento.index', compact('eventos'));
        } else {
            return view('pages/utility/404');
        }
    }
    public function create()
    {
        return "vista crear";
    }
}
