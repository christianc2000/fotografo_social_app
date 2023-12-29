<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\DatoMedico;
use App\Models\Historial;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function medico_consulta_index(Request $request){
        // dd($request->all());
        $consultas = Consulta::where('historial_id', $request->historial_id)
                    ->get();
        $historial_id = $request->historial_id;
        return view('pages.medico.consulta.index', compact('consultas', 'historial_id'));
    }
    public function medico_consulta_index2(Request $request){
        // dd($request->all());
        $historialId = session('historial_id');
        $consultas = Consulta::where('historial_id', $historialId)
                    ->get();
        $historial_id = $request->historial_id;
        return view('pages.medico.consulta.index', compact('consultas', 'historial_id'));
    }
    public function medico_consulta_create(Request $request){
        // dd( $request->all());
        $historial_id = $request->historial_id;
        return view('pages.medico.consulta.create', compact('historial_id'));
    }
    
    public function medico_consulta_store(Request $request){
        try {
            DB::beginTransaction();
            // $doctor = User::find(Auth::user()->id);
            $fechaString = $request->date_consulta;
            $fechaObjeto = new DateTime($fechaString);
            // Formatear la fecha y hora según tu especificación
            $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:sO');
            // dd( $request->all(), $doctor, $fechaFormateada);
            $consulta = Consulta::create([
                'historial_id' => $request->historial_id,
                'diagnostico' => $request->diagnostico,
                'observaciones' => $request->observaciones,
                'examen_fisico' => $request->examen_fisico,
                'motivo' => $request->motivo,
                'fecha' => $fechaFormateada,
            ]);
            DB::commit();
            session()->flash('success');
            return redirect()->route('medico_consulta_index2')->with('historial_id', $request->historial_id);
        } catch (\Throwable $th) {
            DB::rollback();            
            session()->flash('error');
            return redirect()->route('medico_consulta_index2')->with('historial_id', $request->historial_id);
        }    
    }
    public function medico_consulta_show(Request $request){

        $consulta = Consulta::find($request->consulta);
        $fecha = date('Y-m-d', strtotime($consulta->fecha));
        $hora =  date('H:i:s', strtotime($consulta->fecha));
        $fechaFormateada = $fecha . 'T' . substr($hora, 0, 5); // Aquí obtenemos solo las primeras 5 posiciones de la hora (HH:mm)
        $consulta->fecha_formateada = $fechaFormateada; 
    //    dd($consulta, $request->consulta);
        // dd( $request->all(), $consulta, $paciente, $datos_medicos);
        return view('pages.medico.consulta.show', compact('consulta'));
    }
    public function medico_historia_clinica_report(Request $request){
        $prueba = $request->all();
        $keyarray = key($prueba);
        $orden = json_decode($keyarray);

        // dd($orden->historial_id);
        $historial = Historial::find($orden->historial_id);
        $paciente = User::find($historial->paciente_id);
        $datos_medicos = DatoMedico::where('historial_id', $historial->id)->get();
        $consultas = Consulta::where('historial_id', $historial->id)->get();
        $data = [
            'historial' => $historial, 
            'datos_medicos' => $datos_medicos, 
            'consultas' => $consultas, 
            'paciente' => $paciente, 
        ];
        // dd($data);
        $pdf = app('dompdf.wrapper');
            $pdf
                ->setPaper('legal', 'portrait') //landscape
                ->loadView(
                    'report.reportHistoriaClinica',
                    $data
                );
        return $pdf->stream('archivo.pdf');   
    }
}
