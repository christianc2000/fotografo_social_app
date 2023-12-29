<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\StorePersonalRequest;
use App\Http\Requests\Personal\UpdatePersonalRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personals = User::getPersonal();
        return view('pages.administrador.personal.index', compact('personals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.administrador.personal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonalRequest $request)
    {

        if ($request->hasFile('imagen')) {

            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $request->name . '_perfil' . '.' . $imagen->getClientOriginalExtension();
            $path = Storage::disk('s3')->putFileAs(
                'Tecno/perfil',
                $imagen,
                $nombreImagen,
                'public'
            );
            // Obtenemos la URL de la imagen en S3.
            $urlImagen = Storage::disk('s3')->url($path);
            $user = new User;
            $user->ci = $request->ci;
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->birth_date = $request->birth_date;
            $user->celular = $request->celular;
            $user->email = $request->email;
            $user->tipo = $request->tipo;
            $user->genero = $request->genero;
            $user->residencia_actual = $request->residencia;
            $user->sueldo = $request->sueldo;
            $user->formacion = $request->formacion;
            $user->url_foto = $urlImagen; // Aquí asignamos la URL de la imagen en S3 al usuario.
            $user->password = bcrypt("12345678");
            $user->save();

            session()->flash('success');
            return redirect()->route('personal.index');
        } else {

            return redirect()->route('personal.index')->with('error', "Error al crear el personal, intente denuevo");
        }
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
        $personal = User::find($id);

        return view('pages.administrador.personal.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonalRequest $request, string $id)
    {
       // return $request;
        $urlImagen = null;
        $user = User::find($id);
        if (isset($user)) {
            if ($request->hasFile('imagen')) {

                // Eliminar la imagen existente si existe
                if ($user->url_foto) {
                    $existingPath = str_replace(Storage::disk('s3')->url(''), '', $user->url_foto);
                    Storage::disk('s3')->delete($existingPath);
                }

                // Subir la nueva imagen
                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . $request->name . '_perfil' . '.' . $imagen->getClientOriginalExtension();
                $path = Storage::disk('s3')->putFileAs(
                    'Tecno/perfil',
                    $imagen,
                    $nombreImagen,
                    'public'
                );
                $urlImagen = Storage::disk('s3')->url($path);
                $user->url_foto = $urlImagen; // Aquí asignamos la URL de la imagen en S3 al usuario.
            }
            // Obtenemos la URL de la imagen en S3.


            $user->ci = $request->ci;
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->birth_date = $request->birth_date;
            $user->celular = $request->celular;
            $user->email = $request->email;
            $user->tipo = $request->tipo;
            $user->genero = $request->genero;
            $user->residencia_actual = $request->residencia;
            $user->sueldo = $request->sueldo;
           
            $user->formacion = $request->formacion;
            $user->password = bcrypt("12345678");
            $user->save();

            return redirect()->route('personal.index')->with('mensaje', "Personal actualizado exitosamente");
        } else {
            return redirect()->route('personal.index')->with('error', "Error al actualizar al personal");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (isset($user)) {
            $user->delete();
            return redirect()->route('personal.index')->with('mensaje', "Personal " . $user->name . " " . $user->lastname . " eliminado exitosamente");
        } else {
            return redirect()->route('personal.index')->with('error', "Error al eliminar al personal");
        }
    }
}
