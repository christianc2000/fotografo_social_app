<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    public function medico_cita_index(){
        // $doctor_id = 2; //17;
        $doctor = User::find(Auth::user()->id);
        $citas = Cita::getcitasForDoctorId($doctor->id);
        // $citas = Cita::getcitasForDoctorId($doctor_id);
        // dd($citas);
        return view('cita.index', compact('citas'));
    }
    
    public function medico_cita_create(){
        $pacientes = User::patients();
        return view('cita.create', compact('pacientes'));
    }
    public function medico_cita_store(Request $request){
        try {
            DB::beginTransaction();
            $doctor = User::find(Auth::user()->id);
            $fechaString = $request->date_cita;
            $fechaObjeto = new DateTime($fechaString);
            // Formatear la fecha y hora según tu especificación
            $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:sO');
            // dd( $request->all(), $doctor, $fechaFormateada);
            $cita = Cita::create([
                'fecha_cita' => $fechaFormateada,
                'estado_cita' => false,
                'costo_cita' => $request->costo,
                'paciente_id' => $request->patient,
                'medico_id' => $doctor->id,
            ]);
            DB::commit();
            session()->flash('success');
            return redirect()->route('medico_cita_index');
        } catch (\Throwable $th) {
            DB::rollback();            
            session()->flash('error');
            return redirect()->route('medico_cita_index');
        }
    }
    public function medico_cita_edit_store(Request $request){
        $pacientes = User::patients();
        $cita = Cita::find($request->cita_id);
        $fecha = date('Y-m-d', strtotime($cita->fecha_cita));
        $hora =  date('H:i:s', strtotime($cita->fecha_cita));
        $fechaFormateada = $fecha . 'T' . substr($hora, 0, 5); // Aquí obtenemos solo las primeras 5 posiciones de la hora (HH:mm)
        $cita->fecha_formateada = $fechaFormateada; 
        return view('cita.edit', compact('pacientes', 'cita'));
    }
    public function medico_cita_edit(Request $request){
        try {
            DB::beginTransaction();
            // dd($request->all());
            $doctor = User::find(Auth::user()->id);
            $fechaString = $request->date_cita;
            $fechaObjeto = new DateTime($fechaString);
            // Formatear la fecha y hora según tu especificación
            $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:sO');
            $cita = Cita::find($request->cita_id);
            $cita->fecha_cita = $fechaFormateada;
            $cita->paciente_id = $request->patient;
            $cita->costo_cita = $request->costo;
            $cita->estado_cita = $request->estado_cita==1? true : false;
            $cita->medico_id = $doctor->id;
            $cita->save();
            DB::commit();
            session()->flash('success');
            return redirect()->route('medico_cita_index');
        } catch (\Throwable $th) {
            DB::rollback();            
            session()->flash('error');
            return redirect()->route('medico_cita_index');
        }
    }
    public function medico_cita_delete($id){
        $cita = Cita::find($id);
        if (isset($cita)) {
            $cita->delete();
            return redirect()->route('medico_cita_index')->with('mensaje', "Cita eliminada exitosamente");
        } else {
            return redirect()->route('medico_cita_index')->with('error', "Error al eliminar la cita");
        }
        // try {
        //     DB::beginTransaction();
        //     dd($request->all());
        //     // $doctor = User::find(Auth::user()->id);
        //     // Formatear la fecha y hora según tu especificación
        //     $cita = Cita::find($request->cita_id);
        //     $cita->delete();
        //     DB::commit();
        //     session()->flash('error');
        //     return redirect()->route('medico_cita_index');
        // } catch (\Throwable $th) {
        //     DB::rollback();            
        //     // session()->flash('error');
        //     return redirect()->route('medico_cita_index');
        // }
    }
}
