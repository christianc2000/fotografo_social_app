<?php

namespace App\Http\Controllers\Web\Organizador;

use App\Http\Controllers\Controller;
use App\Mail\InviteMail;
use App\Models\Evento;
use App\Models\User;
use App\Notifications\UserToEventoNotification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = Auth::user();
        if ($user->tipo == "O") {
            $evento = $user->eventos->where('id', $id)->first();
            if (isset($evento)) {
                $clientes = $evento->clientesVinculadosEvento;
                return view('web.organizador.evento.cliente', compact('evento', 'clientes'));
            } else {
                return redirect()->route('organizador.evento.index')->with('error', "Error evento no le pertenece");
            }
        } else {
            return view('pages/utility/404');
        }
    }
    public function agregarCliente($id)
    {
        $user = Auth::user();
        if ($user->tipo == "O") {
            $evento = $user->eventos->where('id', $id)->first();
            if (isset($evento)) {
                $clientes = User::where('tipo', "C")->get();

                $clientesEvento = $evento->clientesVinculadosEvento;
                $clientesSinEvento = $clientes->diff($clientesEvento);
                //return $fotografosSinEvento;
                return view('web.organizador.evento.cliente_agregar', compact('clientesSinEvento', 'evento'));
            } else {
                return redirect()->route('organizador.evento.index')->with('error', "Error evento no le pertenece");
            }
        } else {
            return view('pages/utility/404');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function acceptInvitation($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->tipo == 'C') {
                $evento = $user->vinculacionEvento->find($id);
                if (isset($evento)) {
                    return redirect()->route('cliente.evento.index');
                }
                $evento=Evento::find($id);
                return view('email.accept_invitacion', compact('evento'));
            } else {
                return redirect()->route('logout');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function storeAccept($id, Request $request)//cuando el cliente acepta la invitación por el correo
    {
        // Asegúrate de que el usuario esté autenticado
        $cliente = Auth::user();
        // Verifica que el usuario sea de tipo 'C'
        if ($cliente->tipo == 'C') {
            if ($request->accept === "si") {
                //entonces se registra al cliente como vinculado al evento
                $evento = $cliente->vinculacionEvento->find($id);

                if (!isset($evento)) { //si no está vinculado los atributos se actualizan
                    $cliente->vinculacionEvento()->attach($id, [
                        'fecha_envio' => Carbon::now()->toDateTimeString(),
                        'fecha_aceptacion' => Carbon::now()->toDateTimeString(),
                        'estado' => Evento::ACEPTADO
                    ]);

                    $information = ["vinculacion" => $cliente->vinculacionEvento->find($id), "usuario" => ["name" => $cliente->name . " " . $cliente->lastname, "email" => $cliente->email, "tipo" => $cliente->tipo, "url_photo" => $cliente->url_photo]];
                    $qrCode = QrCode::format('png')->size(400)->generate(json_encode($information));
                    $name = time() . '_' . 'qr_' . $cliente->name . '_evento' . '.png';
                    $folder = 'fotografia_app/qr';
                    $path = $folder . '/' . $name;
                    $store = Storage::disk('s3')->put($path, $qrCode, 'public');
                    // Obtenemos la URL de la imagen en S3.
                    $urlImagen = Storage::disk('s3')->url($path);
                    $cliente->vinculacionEvento()->updateExistingPivot($id, ['qr' => $urlImagen, 'asistencia' => false]);
                }
                return redirect()->route('cliente.evento.index'); //retorna a los eventos que tiene el cliente que aceptó
            } else {
                //entonces no se vincula el cliente al evento

            }
        } else {
            return redirect()->back()->with('error', 'No tienes permiso para realizar esta acción.');
        }
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'evento' => 'required'
        ]);

        $details = [
            'title' => 'Invitación de Laravel',
            'body' => 'Esta es tu invitación...'
        ];

        try {
            Mail::to($request->email)->send(new InviteMail($details, $request->evento));
            return redirect()->route('organizador.evento.cliente.index', $request->evento)->with('mensaje', "Correo enviado exitosamente");
        } catch (\Exception $e) {
            // Aquí puedes manejar la excepción como quieras
            // Por ejemplo, puedes retornar el mensaje de la excepción
            return redirect()->route('organizador.evento.cliente.index', $request->evento)->with('error', "Falla al enviar el correo");
        }
    }
    public function agregarClienteStore(Request $request, $id)//cuando el organizador agrega a un cliente por notificaciones
    {
        $user = Auth::user();

        if ($user->tipo == "O") {
            $evento = Evento::find($id);
            if (isset($evento)) {
                $request->validate([
                    'cliente_id' => 'required|exists:users,id'
                ]);

                $cliente = User::find($request->cliente_id);
                $cliente->vinculacionEvento()->attach($id, [
                    'fecha_envio' => Carbon::now()->toDateTimeString(),
                    'fecha_aceptacion' => Carbon::now()->toDateTimeString(),
                    'estado' => Evento::ACEPTADO
                ]);
                
                $information = ["vinculacion" => $cliente->vinculacionEvento->find($evento->id), "usuario" => ["name" => $cliente->name . " " . $cliente->lastname, "email" => $cliente->email, "tipo" => $cliente->tipo, "url_photo" => $cliente->url_photo]];
                $qrCode = QrCode::format('png')->size(400)->generate(json_encode($information));
                $name = time() . '_' . 'qr_' . $cliente->name . '_evento' . '.png';
                $folder = 'fotografia_app/qr';
                $path = $folder . '/' . $name;
                $store = Storage::disk('s3')->put($path, $qrCode, 'public');
                // Obtenemos la URL de la imagen en S3.
                $urlImagen = Storage::disk('s3')->url($path);
                $cliente->vinculacionEvento()->updateExistingPivot($evento->id, ['qr' => $urlImagen, 'asistencia' => false]);

                $cliente->notify(new UserToEventoNotification((string) $id, $evento->titulo, $evento->img_evento, User::EVENTO));
                return redirect()->route('organizador.evento.cliente.index', $evento->id)->with('mensaje', "Fotografo vinculado al evento exitosamente. Esperando confirmación");
                //logica para enviar la invitación por correo
            } else {
                //si el evento que pasa no existe
                return redirect()->route('organizador.evento.cliente.index', $id)->with('error', "Error evento no le pertenece");
            }
        } else {
            return view('pages/utility/404');
        }
    }
    public function agregarClienteCorreoStore(Request $request, $id)
    {
    }
    public function store(Request $request)
    {
        //
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
