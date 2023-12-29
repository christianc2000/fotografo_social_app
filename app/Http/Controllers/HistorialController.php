<?php

namespace App\Http\Controllers;

use App\Models\DatoMedico;
use App\Models\Historial;
use App\Models\User;
use Aws\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    //
    public function medico_historial_index(){
        $doctor = User::find(Auth::user()->id);
        $pacientes = User::getPatientsDoctorId($doctor->id);
        $pacientes_ids = $pacientes->pluck('id'); 
        $historials = Historial::getHistorialPacienteId($pacientes_ids);
        
        // dd($historials);
        return view('pages.medico.historial.index', compact('historials'));
    }
    public function medico_historial_create(){
        $pacientes = User::patientsWithouthHistorials();
        // dd($pacientes);
        return view('pages.medico.historial.create', compact('pacientes'));
    }
    public function medico_historial_store(Request $request){
        // dd($request->all());
        try {
            DB::beginTransaction();
            $doctor = User::find(Auth::user()->id);
            // Formatear la fecha y hora según tu especificación
            // dd( $request->all(), $doctor, $fechaFormateada);
            $paciente = User::find($request->patient);
            $historial = Historial::create([
                'nombre_paciente' => $paciente->name . " " . $paciente->lastname,
                'paciente_id' => $paciente->id
            ]);

            $dato_medico = DatoMedico::create([
                'tipo' => 'A',
                'titulo' => $request->antecedentes,
                'detalle' => $request->descripcion,
                'historial_id' => $historial->id

            ]);
            DB::commit();
            session()->flash('success');
            return redirect()->route('medico_historial_index');
        } catch (\Throwable $th) {
            DB::rollback();            
            session()->flash('error');
            return redirect()->route('medico_historial_index');
        }
    }
    public function medico_historial_edit(Request $request){
        $doctor = User::find(Auth::user()->id);

        $historial = Historial::find($request->historial_id);
        $paciente = User::where('id', $historial->paciente_id)->first();
        $datos_medicos = DatoMedico::getDatoMedicoOfHistorial($historial->id);
        // dd( $request->all(), $historial, $paciente, $datos_medicos);
        return view('pages.medico.historial.show', compact('historial', 'paciente', 'datos_medicos'));
    }
}
