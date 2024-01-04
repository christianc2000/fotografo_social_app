<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Api\Cliente\PaymenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\EstiloController;
use App\Http\Controllers\Web\Cliente\CarritoController;
use App\Http\Controllers\Web\Fotografo\EventoController as FotografoEventoController;
use App\Http\Controllers\Web\Fotografo\InvitacionController;
use App\Http\Controllers\Web\Organizador\EventoController;
use App\Http\Controllers\Web\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [ClienteController::class, 'inicial'])->name('welcome');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
// Route::get('/', function () {
//     return redirect()->route('login');
// });
Route::get('/configuracion', function () {
    return view('web.cliente.configuracion');
})->name('configuracion');

 Route::get('/fotografo', function(){
    return "Vista fotografos";
 })->name('fotografo');

Route::get('/evento', function () {
    return "Vista eventos";
})->name('evento');

Route::get('/galeria', function () {
    //return view('cliente.pago');
    return "Vista galeria";
})->name('galeria');

Route::get('/pago', function () {
    return "Vista pago";
})->name('pago');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Route::get('login', function () {
//     return "ir a login";
// })->name('login');
// Route::get('register', function () {
//     return "ir a register";
// })->name('register');


Route::post('cambiar-estilo', [EstiloController::class, 'cambiarEstilo'])->name('cambiar.estilo');

//Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function () {
        return view('pages/utility/404');
    });
    //Organizador
    Route::prefix('organizador')->group(function () {
        //Evento rutas
        Route::resource('evento', EventoController::class)->names('organizador.evento');
        Route::get('evento/{id}/fotografos', [EventoController::class, 'fotografosEvento'])->name('organizador.evento.fotografos.index');
        Route::get('evento/{id}/agregar/fotografos', [EventoController::class, 'agregarFotografo'])->name('organizador.evento.fotografos.agregar');
        Route::post('evento/{id}/agregar/fotografos', [EventoController::class, 'agregarFotografoStore'])->name('organizacion.evento.fotografos.agregar.store');
    });
    //Fotografo
    Route::prefix('fotografo')->group(function () {
        Route::resource('evento', FotografoEventoController::class)->names('fotografo.evento');
        Route::resource('invitacion', InvitacionController::class)->names('fotografo.invitacion');
        Route::get('evento/{id}/galeria',[FotografoEventoController::class,'galeria'])->name('fotografo.evento.galeria');
        Route::get('evento/{id}/galeria/agregar',[FotografoEventoController::class,'agregarImagenes'])->name('fotografo.evento.galeria.agregar');
        Route::get('evento/galeria/imagen/{id}/editar',[FotografoEventoController::class,'editarImage'])->name('fotografo.evento.galeria.editar');
        Route::put('evento/galeria/imagen/{id}/update',[FotografoEventoController::class,'updateImage'])->name('fotografo.evento.galeria.update');
    });

    Route::prefix('cliente')->group(function(){
         Route::resource('carrito',CarritoController::class)->names('cliente.carrito');
         Route::get('/payments/generate_payment', [CarritoController::class, 'generatePayment']);
    });
});

//Vistas principales sin auth


//********************** reporte *********************************/
Route::get('/report/order/pdf', [PaymenController::class, 'generatePdfOrder']);

Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::post('register', function (CreateNewUser $creator) {
    // Aquí va la lógica de creación de usuario
    $user = $creator->create(request()->all());
    Auth::login($user);
    // Personaliza la redirección después del registro
    return redirect('/'); // Cambia '/home' por la ruta que desees
})->name('register');
Route::post('login', function () {
    // Lógica de autenticación, por ejemplo:
    $credentials = request()->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Autenticación exitosa
        // Obtén al usuario autenticado
        $user = Auth::user();
        // Verifica el tipo de usuario y redirige en consecuencia
        if ($user->tipo == 'C') {
            return redirect('/');
        } else {
            return redirect('/dashboard'); // Cambia '/otra-ruta' por la ruta que desees
        }
    }

    // Autenticación fallida, puedes manejarlo de acuerdo a tus necesidades
    return back()->withErrors(['email' => 'Credenciales incorrectas']);
})->middleware('guest')->name('login');

Route::post('cambiar-estilo', [EstiloController::class, 'cambiarEstilo'])->name('cambiar.estilo');
// // ************** payment *********************
// Route::get('/payments', [PaymentController::class, 'index'])->name('payment_index');
// Route::get('/payments/generate_payment', [PaymentController::class, 'generatePayment']);

// //************************* atenciones ****************************/
// Route::post('/attentions/get_attentions_turn', [AtencionController::class, 'getAttentionsDoctor']);
// //*********** orden *******************************/
// Route::get('/orden', [OrdenController::class, 'index'])->name('orden_index');

// //********************** reporte *********************************/
// Route::get('/report/order/pdf', [OrdenController::class, 'generatePdfOrder']);

// //************************* cita  *********************/
// Route::get('/cita/medico/index', [CitaController::class, 'medico_cita_index'])->name('medico_cita_index');
// Route::get('/cita/create', [CitaController::class, 'medico_cita_create'])->name('medico_cita_create');
// Route::post('/cita/store', [CitaController::class, 'medico_cita_store'])->name('medico_cita_store');
// Route::get('/cita/medico/edit/store', [CitaController::class, 'medico_cita_edit_store'])->name('medico_cita_edit_store');
// Route::post('/cita/medico/edit', [CitaController::class, 'medico_cita_edit'])->name('medico_cita_edit');
// Route::delete('/cita/medico/delete/{id}', [CitaController::class, 'medico_cita_delete'])->name('medico_cita_delete');


// Route::post('/servicio/medico_index', [ServicioController::class, 'medico_index'])->name('medico_index');

// //********** servicios medico **********************/
// Route::get('/servicio/medico/index', [ServicioController::class, 'medico_servicio_index'])->name('medico_servicio_index');
// Route::get('/servicio/medico/create', [ServicioController::class, 'medico_servicio_create'])->name('medico_servicio_create');

// // ********************** paciente de medico **************************************
// Route::get('/paciente/medico/index', [UserController::class, 'medico_paciente_index'])->name('medico_paciente_index');

// // ************************** historial medico ********************//
// Route::get('/historial/medico/index', [HistorialController::class, 'medico_historial_index'])->name('medico_historial_index');
// Route::get('/historial/medico/create', [HistorialController::class, 'medico_historial_create'])->name('medico_historial_create');
// Route::post('/historial/medico/store', [HistorialController::class, 'medico_historial_store'])->name('medico_historial_store');
// Route::get('/historial/medico/edit', [HistorialController::class, 'medico_historial_edit'])->name('medico_historial_edit');

// //************* consulta medico  ***********************/
// Route::get('/consulta/medico/index', [ConsultaController::class, 'medico_consulta_index'])->name('medico_consulta_index');
// Route::get('/consulta/medico/create', [ConsultaController::class, 'medico_consulta_create'])->name('medico_consulta_create');
// Route::post('/consulta/medico/store', [ConsultaController::class, 'medico_consulta_store'])->name('medico_consulta_store');
// Route::get('/consulta/medico/index2', [ConsultaController::class, 'medico_consulta_index2'])->name('medico_consulta_index2');
// Route::get('/consulta/medico/show', [ConsultaController::class, 'medico_consulta_show'])->name('medico_consulta_show');
// Route::get('/consulta/medico/historia_clinica', [ConsultaController::class, 'medico_historia_clinica_report'])->name('medico_historia_clinica_report');
