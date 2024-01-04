<?php

namespace App\Http\Controllers\Web\Organizador;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotografoController extends Controller
{
    public function vincularFotografo()
    {
        $user = Auth::user();
        if ($user->tipo == 'O') {
            $fotografosTodos = User::where('tipo', 'F')->get();
            $fotografosVinculados = $user->fotografos; //fotografos vinculados al organizador
            $fotografosSinVincular = $fotografosTodos->diff($fotografosVinculados);

            return view('web.organizador.fotografo.vincular_fotografo', compact('fotografosVinculados', 'fotografosSinVincular'));
        }
        return view('pages.utility.404');
    }

    public function vincularFotografoStore(Request $request)
    {
        $request->validate([
            'fotografo_id' => 'required|exists:users,id'
        ]);
        $user = Auth::user();
        if ($user->tipo == 'O') {
            $user->fotografos()->attach($request->fotografo_id, [
                'estado' => true
            ]);
            return redirect()->route('organizador.vincular.fotografo');
        } else {
            return view('pages.utility.404');
        }
    }
}
