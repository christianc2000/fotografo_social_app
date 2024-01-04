<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Suscripcion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::where('tipo', 'O')->where('estado', true)->get();
        return view('web.plan-organizador', compact('plans'));
    }
    public function indexFotografo()
    {
        $plans = Plan::where('tipo', 'F')->where('estado', true)->get();
        return view('web.plan-fotografo', compact('plans'));
    }

    public function registrarOrganizador($id)
    {
        $plan = Plan::find($id);

        return view('web.registrar-plan-organizador', compact('plan'));
    }
    public function registrarFotografo($id)
    {
        $plan = Plan::find($id);

        return view('web.registrar-plan-fotografo', compact('plan'));
    }
    public function registrarOrganizadorStore(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'genero' => ['required', 'string', 'max:1'],
            'imagen' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $plan = Plan::find($id);
        if ($request->imagen) {
            // Subir la nueva imagen
            $imagen = $request->imagen;
            $nombreImagen = time() . '_' . $request->name . '_perfil' . '.png';
            $path = Storage::disk('s3')->putFileAs(
                'fotografia_app/perfil',
                $imagen,
                $nombreImagen,
                'public'
            );
            $urlImagen = Storage::disk('s3')->url($path);
            // Registra usuarios cliente
            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'genero' => $request->genero,
                'gps' => '-17.82858,-63.11273',
                'email' => $request->email,
                'tipo' => 'O',
                'url_photo' => $urlImagen,
                'password' => bcrypt("12345678")
            ]);
            Suscripcion::create([
                'pagado'=>true,
                'fecha_inicio'=>Carbon::now()->toDateTimeString(),
                'fecha_fin'=>Carbon::now()->addMonths($plan->meses)->toDateTimeString(), 
                'costo'=>$plan->costo,
                'user_id' => $user->id,
                'plan_id' => $plan->id
            ]);

            Auth::login($user);

    // Redirect the user to the desired route
            return redirect()->route('dashboard');
        }

        return redirect()->route('welcome');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function registrarFotografoStore(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'biografia' => ['required', 'string', 'max:255'],
            'slogan' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'genero' => ['required', 'string', 'max:1'],
            'imagen' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $plan = Plan::find($id);
        if ($request->imagen) {
            // Subir la nueva imagen
            $imagen = $request->imagen;
            $nombreImagen = time() . '_' . $request->name . '_perfil' . '.png';
            $path = Storage::disk('s3')->putFileAs(
                'fotografia_app/perfil',
                $imagen,
                $nombreImagen,
                'public'
            );
            $urlImagen = Storage::disk('s3')->url($path);
            // Registra usuarios cliente
            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'genero' => $request->genero,
                'gps' => '-17.82858,-63.11273',
                'email' => $request->email,
                'tipo' => 'F',
                'biografia'=>$request->biografia,
                'slogan'=>$request->slogan,
                'url_photo' => $urlImagen,
                'password' => bcrypt("12345678")
            ]);
            Suscripcion::create([
                'pagado'=>true,
                'fecha_inicio'=>Carbon::now()->toDateTimeString(),
                'fecha_fin'=>Carbon::now()->addMonths($plan->meses)->toDateTimeString(), 
                'costo'=>$plan->costo,
                'user_id' => $user->id,
                'plan_id' => $plan->id
            ]);

            Auth::login($user);

    // Redirect the user to the desired route
            return redirect()->route('dashboard');
        }

        return redirect()->route('welcome');
    }
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
