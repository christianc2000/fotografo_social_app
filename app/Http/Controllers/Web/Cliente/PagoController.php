<?php

namespace App\Http\Controllers\Web\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo == "C") {
            $ordens = $user->ordens()->where('tipo', Orden::COMPRA)->orderBy('created_at', 'desc')->get(); //todos los pagos, aunque no estén pagados
            $ordens_pagados = $user->ordens()->where('tipo', Orden::COMPRA)->whereNotNull('fecha_orden')->orderBy('created_at', 'desc')->get();
            $ordens_no_pagados = $user->ordens()->where('tipo', Orden::COMPRA)->whereNull('fecha_orden')->orderBy('created_at', 'desc')->get();

            return view('web.cliente.pagar.index', compact('ordens', 'ordens_pagados', 'ordens_no_pagados'));
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
            $orden = $user->ordens->find($id);
            if (isset($orden)) {
                $fecha_actual = new DateTime();
                $created_at = new DateTime($orden->fecha_creacion_qr);
                $interval = $fecha_actual->diff($created_at);
                $b = false;
                if ($interval->i > 30&&$orden->estado_orden==Orden::VAL) {
                    $orden->estado_orden=Orden::VEN;
                    $orden->save();
                }
                return view('web.cliente.pagar.orden-pago', compact('orden', 'user'));
            }
        }
        return view('pages.utility.404');
    }
    public function imagesOrden(String $id){
        $user = Auth::user();
        if ($user->tipo == "C") {
            $orden = $user->ordens->find($id);
            if (isset($orden)) {
                $imagenes=$orden->imagenesOrden;
                
                return view('web.cliente.pagar.imagenes-orden', compact('imagenes','orden', 'user'));
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
