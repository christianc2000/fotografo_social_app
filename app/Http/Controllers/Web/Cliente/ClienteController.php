<?php

namespace App\Http\Controllers\Web\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function perfil()
    {
        $user = Auth::user();
        if ($user->tipo == "C") {
            return view('web.cliente.perfil.show', compact('user'));
        }
        return view('pages.utility.404');
    }
}
