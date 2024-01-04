<?php

namespace App\Http\Controllers\Web\Cliente;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            //Ver la invitacion del evento
            $notification=$user->notifications->find($id);
            $notification->markAsRead();
            $evento = $user->vinculacionEvento->find($notification->data['id']);

            $organizador = User::find($evento->user_id);
           
            return view('web.cliente.invitacion.show_invitacion',compact('evento', 'organizador'));
        } else {
            return view('pages/utility/404');
        }
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
