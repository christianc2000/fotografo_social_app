<?php

namespace App\Http\Controllers\Web\Organizador;

use App\Http\Controllers\Controller;
use App\Http\Requests\Evento\StoreEventoRequest;
use App\Http\Requests\Evento\UpdateEventoRequest;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        return view('web.organizador.evento.create');
    }
    public function store(StoreEventoRequest $request)
    {
        if ($request->hasFile('imagen')) {

            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $request->name . '_evento' . '.' . $imagen->getClientOriginalExtension();
            $path = Storage::disk('s3')->putFileAs(
                'fotografia_app/evento',
                $imagen,
                $nombreImagen,
                'public'
            );
            // Obtenemos la URL de la imagen en S3.
            $urlImagen = Storage::disk('s3')->url($path);
            $gps = $request->latitud . "," . $request->longitud;
            $fecha = $request->input('fecha_evento'); // Recoge el valor del formulario
            $fechaBD = date("Y-m-d H:i:s", strtotime($fecha));
            Evento::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'direccion' => $request->direccion,
                'gps' => $gps,
                'img_evento' => $urlImagen,
                'fecha_evento' => $fechaBD,
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('organizador.evento.index')->with('mensaje', "Evento creado exitosamente");
        } else {
            return view('pages/utility/404');
        }
    }

    public function edit($id){
        $evento=Evento::find($id);

        return view('web.organizador.evento.edit',compact('evento'));
    }

    public function update(UpdateEventoRequest $request, $id){
        $urlImagen = null;
        $evento = Evento::find($id);
        if (isset($evento)) {
            if ($request->hasFile('imagen')) {

                // Eliminar la imagen existente si existe
                if ($evento->img_evento) {
                    $existingPath = str_replace(Storage::disk('s3')->url(''), '', $evento->img_evento);
                    Storage::disk('s3')->delete($existingPath);
                }

                // Subir la nueva imagen
                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . $request->name . '_perfil' . '.' . $imagen->getClientOriginalExtension();
                $path = Storage::disk('s3')->putFileAs(
                    'fotografia_app/evento',
                    $imagen,
                    $nombreImagen,
                    'public'
                );
                $urlImagen = Storage::disk('s3')->url($path);
                $evento->img_evento = $urlImagen; // Aquí asignamos la URL de la imagen en S3 al usuario.
            }
            // Obtenemos la URL de la imagen en S3.

            $gps = $request->latitud . "," . $request->longitud;
            $fecha = $request->input('fecha_evento'); // Recoge el valor del formulario
            $fechaBD = date("Y-m-d H:i:s", strtotime($fecha));
            $evento->titulo=$request->titulo;
            $evento->descripcion=$request->descripcion;
            $evento->direccion=$request->direccion;
            $evento->fecha_evento=$fechaBD;
            $evento->gps=$gps;
            $evento->save();

            return redirect()->route('organizador.evento.index')->with('mensaje', "Evento actualizado exitosamente");
        } else {
            return redirect()->route('organizador.evento.index')->with('error', "Error al actualizar el evento");
        }
    }
}
