<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Servicio\StoreServicioRequest;
use App\Models\Servicio;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Servicio\UpdateServicioRequest;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $servicios = Servicio::with(['atencions' => function ($query) {
            $query->where('estado', true)->with('user');
        }])->get();
*/
        $servicios = Servicio::orderBy('updated_at', 'desc')->get();
        $usersPorServicio = [];

        foreach ($servicios as $servicio) {
            $uniqueUsers = [];

            foreach ($servicio->atencions as $atencion) {
                $user = $atencion->user;

                // Si el usuario no está en el array de usuarios únicos, lo añade
                if (!array_key_exists($user->id, $uniqueUsers)) {
                    $uniqueUsers[$user->id] = $user;
                }
            }

            // Ahora $uniqueUsers contiene los usuarios únicos que tienen al menos una Atencion asociada a este servicio
            // Los añadimos al array $usersPorServicio
            $usersPorServicio[$servicio->id] = $uniqueUsers;
        }
        //return $usersPorServicio;
        return view('pages.administrador.servicio.index', compact('servicios', 'usersPorServicio'));
    }
    // public function medico_index()
    // {
    //     $doctor_id = 2; //17;
    //     $doctor = User::find(Auth::user()->id);
    //     // $servicios = Servicio::getServicesDoctor($doctor->id);
    //     $servicios = Servicio::getServicesDoctor($doctor_id);
    //     // dd($servicios);
    //     return view('servicio.index', compact('servicios'));

    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.administrador.servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServicioRequest $request)
    {
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $request->nombre . '_servicio' . '.' . $imagen->getClientOriginalExtension();
            $path = Storage::disk('s3')->putFileAs(
                'Tecno/servicio',
                $imagen,
                $nombreImagen,
                'public'
            );
            // Obtenemos la URL de la imagen en S3.
            $urlImagen = Storage::disk('s3')->url($path);

            $servicio = Servicio::create([
                'nombre' => $request->nombre,
                'costo' => $request->costo,
                'atencion' => $request->atencion,
                'forma_compra' => $request->forma_compra,
                'url_imagen' => $urlImagen
            ]);
            return redirect()->route('servicio.index')->with('mensaje', "Servicio creado exitosamente");
        } else {

            return redirect()->route('servicio.index')->with('error', "Error al crear el servicio, intente denuevo");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "VER SERVICIO";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servicio = Servicio::find($id);
        return view('pages.administrador.servicio.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServicioRequest $request, string $id)
    {
        $urlImagen = null;
        $servicio = Servicio::find($id);
        if (isset($servicio)) {
            if ($request->hasFile('imagen')) {

                // Eliminar la imagen existente si existe
                if ($servicio->url_imagen) {
                    $existingPath = str_replace(Storage::disk('s3')->url(''), '', $servicio->url_imagen);
                    Storage::disk('s3')->delete($existingPath);
                }

                // Subir la nueva imagen
                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . $request->name . '_servicio' . '.' . $imagen->getClientOriginalExtension();
                $path = Storage::disk('s3')->putFileAs(
                    'Tecno/servicio',
                    $imagen,
                    $nombreImagen,
                    'public'
                );
                $urlImagen = Storage::disk('s3')->url($path);
                $servicio->url_imagen = $urlImagen; // Aquí asignamos la URL de la imagen en S3 al usuario.
            }
            $servicio->nombre = $request->nombre;
            $servicio->costo = $request->costo;
            $servicio->forma_compra = $request->forma_compra;
            $servicio->atencion = $request->atencion;

            $servicio->save();

            return redirect()->route('servicio.index')->with('mensaje', "Servicio actualizado exitosamente");
        } else {
            return redirect()->route('servicio.index')->with('error', "Error al actualizar el servicio");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servicio = Servicio::find($id);
        if (isset($servicio)) {
            $servicio->delete();
            return redirect()->route('servicio.index')->with('mensaje', "Servicio " . $servicio->nombre . " eliminado exitosamente");
        } else {
            return redirect()->route('servicio.index')->with('error', "Error al eliminar el servicio");
        }
    }

    public function medico_servicio_index(){
        // $doctor_id = 2; //17;
        $doctor = User::find(Auth::user()->id);
        $servicios = Servicio::getServicesDoctor($doctor->id);
        // $servicios = Servicio::getServicesDoctor($doctor_id);
        $servicios = $servicios->groupBy('id');
            // dd($servicios_turnos);
        return view('servicio.index', compact('servicios'));
    }
    public function medico_servicio_create(){
        $pacientes = User::patients();
        return view('cita.create', compact('pacientes'));
    }
}
