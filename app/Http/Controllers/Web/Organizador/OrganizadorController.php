<?php

namespace App\Http\Controllers\Web\Organizador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizadorController extends Controller
{
    public function perfil()
    {
        $user = Auth::user();
        if ($user->tipo == "O") {
            return view('web.organizador.perfil.show', compact('user'));
        }
        return view('pages.utility.404');
    }
}
