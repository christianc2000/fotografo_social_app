<?php

namespace App\Http\Controllers\Web\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Image;
use App\Models\ImageOrden;
use App\Models\Orden;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo == 'C') {
            $ordens = $user->ordens()->with('imagenesOrden')->get();
            //         $imagenes = User::where('id', $user->id) // Reemplaza $user_id con el ID del usuario
            //         ->with('ordens.imagenesOrden')
            //         ->get()
            //         ->pluck('ordens.*.imagenesOrden')
            //         ->collapse(); //->orderByDesc('updated_at')->get();
            $user_id = $user->id;
            $image_ordens = ImageOrden::whereHas('orden', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->orderBy('updated_at','desc')->limit(100)->get();
           
            //    return $imagenes;
            //    return $ordens;
            return view('web.cliente.galeria.galeria-index', compact('ordens','image_ordens'));
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
        $user = Auth::user();

        if ($user->tipo == "C") {
            $notification = $user->notifications->find($id);

            $notification->markAsRead();
            $image = Image::find($notification->data['id']);

            if (isset($image)) {
                $evento = Evento::find($image->evento_id);

                return view('web.cliente.galeria.galeria-aparicion', compact('image', 'evento'));
            }
        }
        return view('pages.utility.404');
    }
    public function ver($id)
    {
        $user = Auth::user();

        if ($user->tipo == "C") {

            $image = ImageOrden::find($id);

            if (isset($image)) {
                $evento = Evento::find($image->evento_id);

                return view('web.cliente.galeria.galeria-ver', compact('image', 'evento'));
            }
        }
        return view('pages.utility.404');
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
