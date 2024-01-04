<?php

namespace App\Http\Controllers\Api\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymenController extends Controller
{


    public function generatePdfOrder(Request $request)
    {
        $orden= Orden::find($request->id);
         //dd($orden, $orden->id);
        $data = [
            'orden' => $orden,
            'cantidad'=> count($orden->imagenesOrden)
        ];
        $pdf = app('dompdf.wrapper');
        $pdf
            ->setPaper('legal', 'portrait') //landscape
            ->loadView(
                'report.reportOrden',
                $data
            );
        return $pdf->stream('archivo.pdf');
    }

    public function urlCallback(Request $request)
    {
        //Grupo01-12
        $orden = Orden::last();
        $orden->fecha_orden = Carbon::now()->toDateTimeString();
        $orden->save();
        
        $Venta = $request->input("PedidoID");
        $Fecha = $request->input("Fecha");
        $NuevaFecha = date("Y-m-d", strtotime($Fecha));
        $Hora = $request->input("Hora");
        $MetodoPago = $request->input("MetodoPago");
        $Estado = $request->input("Estado");
        $Ingreso = true;

        // $cadena = "Grupo01-12";
        $cadena = $Venta;
        $partes = explode("-", $cadena);

        // Acceder al número después del guion
        $orden_id = $partes[1];
        $orden = Orden::find($orden_id);
        $orden->fecha_orden = Carbon::now()->toDateTimeString();
        $orden->save();

        try {
            $arreglo = ['error' => 0, 'status' => 1, 'message' => "Pago realizado correctamente.", 'values' => true];
        } catch (\Throwable $th) {
            $arreglo = ['error' => 1, 'status' => 1, 'messageSistema' => "[TRY/CATCH] " . $th->getMessage(), 'message' => "No se pudo realizar el pago, por favor intente de nuevo.", 'values' => false];
        }

        return response()->json($arreglo);
    }
}
