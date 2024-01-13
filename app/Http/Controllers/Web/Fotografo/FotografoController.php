<?php

namespace App\Http\Controllers\Web\Fotografo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotografoController extends Controller
{
    public function perfil()
    {
        $user = Auth::user();
        if ($user->tipo == "F") {
            return view('web.fotografo.perfil.show', compact('user'));
        }
        return view('pages.utility.404');
    }
}
