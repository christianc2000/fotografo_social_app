<?php

namespace App\Http\Controllers\Web\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo == "C") {
            // $alleventos=Eventos
            $eventos = Evento::all();
            // $myeventos = $user->vinculacionEvento;
            $myeventos=$user->vinculacionEvento->where('pivot.estado',Evento::ACEPTADO);

            return view('web.cliente.eventos.index', compact('eventos', 'myeventos'));
        }
        return view('pages.utility.404');
    }

    public function imagesEvento($id)
    { //muestra todas las imagenes del evento para las personas que esten logueadas
        $user = Auth::user();
        if ($user->tipo == "C") {
            $evento = $user->vinculacionEvento->find($id);

            if (isset($evento)) { //si el cliente está vinculado al evento
                $imagenes = Image::where('evento_id', $id)->where('estado', true)->get();
                return view('web.cliente.eventos.index-images', compact('imagenes', 'evento'));
            } else {
                $evento = Evento::find($id);
                // return $evento;
                if (isset($evento)) {
                    $imagenes = Image::where('evento_id', $id)->where('categoria', Image::PUB)->where('estado', true)->get();
                    return view('web.cliente.eventos.index-images', compact('imagenes', 'evento'));
                }
            }
        }
        return view('pages.utility.404');
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
        //
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
}
