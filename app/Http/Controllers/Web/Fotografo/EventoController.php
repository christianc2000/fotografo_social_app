<?php

namespace App\Http\Controllers\Web\Fotografo;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo == "F") {
            $eventos = $user->vinculacionEvento()->orderByDesc('updated_at')->get();
            return view('web.fotografo.evento.index', compact('eventos'));
        } else {
            return view('pages.utility.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        if ($user->tipo == "F") {
            //Ver la invitacion del evento

            $evento = $user->vinculacionEvento->find($id);

            $organizador = User::find($evento->user_id);

            return view('web.fotografo.evento.show', compact('evento', 'organizador'));
        } else {
            return view('pages.utility.404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //galeria
    public function galeria($id)
    {

        $user = Auth::user();
        if ($user->tipo == 'F') {
            $evento = $user->vinculacionEvento->where('id', $id)->first(); //->orderByDesc('updated_at')->get();;
            if (isset($evento)) {
                $images = $user->images->where('evento_id', $id)->sortByDesc('updated_at');

                return view('web.fotografo.evento.galeria', compact('images', 'evento'));
            }
        }
        return view('pages.utility.404');
    }
    public function agregarImagenes(Request $request, $idEvento)
    {
        $evento = Evento::find($idEvento);
        return view('web.fotografo.evento.galeria_agregar', compact('evento'));
    }

    public function editarImage($idImagen)
    {
        $user = Auth::user();

        if ($user->tipo == "F") {
            $image = $user->images->where('id', $idImagen)->first();
            if (isset($image)) {
                $evento = Evento::find($image->evento_id);
                return view('web.fotografo.evento.galeria_editar', compact('image', 'evento'));
            }
        }
        return view('pages.utility.404');
    }

    public function updateImage(Request $request, $idImagen)
    {
        $request->validate([
            'titulo' => 'required',
            'precio' => 'required',
            'categoria' => 'required'
        ]);
        $user = Auth::user();
        if ($user->tipo == "F") {
            $image = $user->images->where('id', $idImagen)->first();
            if ($image->tipo == Image::EVENTO) {
                if (isset($image)) {
                    $image->titulo = $request->titulo;
                    $image->precio = $request->precio;
                    $image->categoria = $request->categoria;
                    $image->save();
                    return redirect()->route('fotografo.evento.galeria', $image->evento_id)->with('mensaje', "Datos de la imagen actualizado exitosamente");
                }
            } else {
                //para cuando el fotografo suba sus propias fotos
            }
        }
        return view('pages.utility.404');
    }
}
