<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    public function getAttentionsDoctor(Request $request){
        $turnos = Turno::getTurnOfServicedDoctor($request->service_id, $request->doctor_id, $request->dayOfWeekName);
        $turnos->each(function (&$item) {
            $tipo = $item->tipo == 'D'? 'Mañana' : 'Tarde';
            // Agregar o modificar datos en cada elemento de la colección
            $item['schedule'] = $item->hora_inicio . ' - ' . $item->hora_fin .' - turno: '. $tipo;
        });
        return $turnos;
    }
}
