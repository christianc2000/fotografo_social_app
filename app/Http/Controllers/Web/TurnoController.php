<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turno\StoreTurnoRequest;
use App\Models\Atencion;
use App\Models\Servicio;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $atencions = Atencion::where('estado', true)
        //     ->with(['user', 'servicio', 'turno'])
        //     ->get();
        $atencions = Atencion::with(['user', 'servicio', 'turno'])
            ->get();
        $atencionTurnos = collect();
        $id = 1;

        foreach ($atencions as $atencion) {
            $existing = $atencionTurnos->first(function ($item) use ($atencion) {
                return $item->user->id == $atencion->user_id && $item->servicio->id == $atencion->servicio_id;
            });

            if (!$existing) {
                $newItem = new stdClass;
                $newItem->id = $id++;
                $newItem->estado = $atencion->estado;
                $newItem->user = $atencion->user;
                $newItem->servicio = $atencion->servicio;
                $newItem->turnos = collect([$atencion->turno]);

                $atencionTurnos->push($newItem);
            } else {
                $existing->turnos->push($atencion->turno);
            }
        }

        //return $atencionTurnos->first()->turnos;


        //    return $atencionTurnos->first()['user'];


        
        return view('pages.administrador.turno.index', compact('atencionTurnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dias = Turno::all()->groupBy('dia');
        $personals = User::getPersonal();
        $servicios = Servicio::all()->groupBy('atencion');


        return view('pages.administrador.turno.create', compact('dias', 'personals', 'servicios')); //falta implementar

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTurnoRequest $request)
    {
        $turnos = json_decode($request->horario);
        foreach ($turnos as $turno) {
            Atencion::create([
                'estado' => true,
                'user_id' => $request->personal,
                'turno_id' => $turno,
                'servicio_id' => $request->servicio
            ]);
        }
        return redirect()->route('turno.index')->with('mensaje', 'Turno de atención creado exitosamente');
    }

    public function finalizarTurno(Request $request)
    {
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'user_id' => 'required|exists:users,id'
        ]);
        $atencions = Atencion::where('servicio_id', $request->servicio_id)
            ->where('user_id', $request->user_id)
            ->get();

        if (isset($atencions)) {
            foreach ($atencions as $atencion) {
                $atencion->estado = false;
                $atencion->save();
            }
            $servicio = Servicio::find($request->servicio_id);
            $user = User::find($request->user_id);
            return redirect()->route('turno.index')->with('mensaje', 'Turno de atencion del servicio ' . $servicio->nombre . ' y personal ' . $user->name . ' ' . $user->lastname . ' ha sido finalizado');
        } else {
            return redirect()->route('turno.index')->with('error', 'Error al finalizar turno de atencion');
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
