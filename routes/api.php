<?php

use App\Http\Controllers\Api\Cliente\ClienteController;
use App\Http\Controllers\Api\Cliente\EventoController;
use App\Http\Controllers\Api\Cliente\ImageController;
use App\Http\Controllers\Api\Cliente\InvitacionController as ClienteInvitacionController;
use App\Http\Controllers\Api\Cliente\MovilController;
use App\Http\Controllers\Api\Cliente\PaymenController;
use App\Http\Controllers\Api\Fotografo\FotografoController;
use App\Http\Controllers\Api\Fotografo\ImagesController;
use App\Http\Controllers\Api\Fotografo\InvitacionController;
use App\Http\Controllers\Api\NotificacionController;
use App\Http\Controllers\Api\Organizador\OrganizadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('organizador')->group(function () {
    Route::post('perfil',[OrganizadorController::class,'updatePerfil']);
    Route::post('password',[OrganizadorController::class,'updatePassword']);
});
Route::prefix('fotografo')->group(function () {
    Route::post('accept-invitacion', [InvitacionController::class, 'aceptarInvitacion'])->name('fotografo.accept.invitacion');
    Route::post('evento/galeria/agregar', [ImagesController::class, 'storeImages']);
    Route::post('evento/galeria/imagen/estado', [ImagesController::class, 'cambiarEstado'])->name('fotografo.galeria.estado');
    Route::post('evento/galeria/imagen/analizar', [ImagesController::class, 'analizarImagen'])->name('fotografo.galeria.analizarImagen');
    Route::post('perfil',[FotografoController::class,'updatePerfil']);
    Route::post('password',[FotografoController::class,'updatePassword']);
});
Route::prefix('cliente')->group(function () {
    Route::post('add-cart', [ImageController::class, 'addCarrito'])->name('cliente.add.carrito');
    Route::post('del-cart', [ImageController::class, 'delCarrito'])->name('cliente.del.carrito');
    Route::post('accept-invitacion', [ClienteInvitacionController::class, 'aceptarInvitacion'])->name('cliente.accept.invitacion');
    Route::post('marcar-notificaciones', [NotificacionController::class, 'marcarNotificaciones']);
    Route::post('perfil',[ClienteController::class,'updatePerfil']);
    Route::post('password',[ClienteController::class,'updatePassword']);
});
Route::post('/urlcallback', [PaymenController::class, 'urlCallback']);
Route::post('/mis-eventos', [EventoController::class, 'misEventos']);
Route::get('/todos-eventos', [EventoController::class, 'todosEventos']);
// MOVIL
Route::post('/login', [MovilController::class, 'login']);
Route::post('/eventos', [MovilController::class, 'eventos']);
Route::post('/evento', [MovilController::class, 'miEvento']);
Route::post('/evento/galeria', [MovilController::class, 'galeriaEvento']);
Route::post('/galeria', [MovilController::class, 'galeria']);
Route::post('/notificaciones', [MovilController::class, 'notificaciones']);
