<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;

use Illuminate\Http\Request;

class EnfermeraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cita = Cita::join('users as pacientes', 'citas.paciente_id', '=', 'pacientes.id')
            ->join('users as medicos', 'citas.medico_id', '=', 'medicos.id')
            ->select('citas.*', 'pacientes.name as nombre_paciente', 'medicos.name as nombre_medico')
            ->get();

        return view('pages.enfermera.index', compact('cita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('tipo', 'P')->get();
        $medicos = User::where('tipo', 'M')->get();

        return view('pages.enfermera.cita', compact('users', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'fecha_cita' => 'required|date',
            'estado_cita' => 'required|boolean',
            'costo_cita' => 'required|numeric',
            'paciente' => 'required|exists:users,id',
            'medico' => 'required|exists:users,id',
        ]);

        // Puedes hacer lo que necesites con los datos, como almacenarlos en la base de datos
        $cita = new Cita();
        $cita->fecha_cita = $request->fecha_cita;
        $cita->estado_cita = $request->estado_cita;
        $cita->costo_cita = $request->costo_cita;

        $cita->paciente_id = $request->paciente;
        $cita->medico_id = $request->medico;
        $cita->save();

        // Puedes redirigir a una vista, mostrar un mensaje, etc.
        return redirect()->route('enfermeria.citas.index')->with('success', 'Cita registrada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        $users = User::where('tipo', 'P')->get();
        $medicos = User::where('tipo', 'M')->get();

        return view('pages.enfermera.editCita', compact('cita', 'users', 'medicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'fecha_cita' => 'required|date',
            'estado_cita' => 'required|boolean',
            'costo_cita' => 'required|numeric',
            'paciente' => 'required|exists:users,id',
            'medico' => 'required|exists:users,id',
        ]);

        $cita->update([
            'fecha_cita' => $request->fecha_cita,
            'estado_cita' => $request->estado_cita,
            'costo_cita' => $request->costo_cita,
            'paciente_id' => $request->paciente,
            'medico_id' => $request->medico,
        ]);

        return redirect()->route('enfermeria.citas.index')->with('success', 'Cita actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();

        return redirect()->route('enfermeria.citas.index')->with('success', 'Cita eliminada exitosamente');
    }
}
