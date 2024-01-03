<?php

use App\Http\Controllers\Api\Cliente\ImageController;
use App\Http\Controllers\Api\Fotografo\ImagesController;
use App\Http\Controllers\Api\Fotografo\InvitacionController;
use App\Http\Controllers\PaymentController;
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

Route::prefix('fotografo')->group(function () {
    Route::post('accept-invitacion', [InvitacionController::class, 'aceptarInvitacion'])->name('fotografo.accept.invitacion');
    Route::post('evento/galeria/agregar', [ImagesController::class, 'storeImages']);
    Route::post('evento/galeria/imagen/estado',[ImagesController::class,'cambiarEstado'])->name('fotografo.galeria.estado');
    Route::post('evento/galeria/imagen/analizar',[ImagesController::class,'analizarImagen'])->name('fotografo.galeria.analizarImagen');
});
Route::prefix('cliente')->group(function () {
    Route::post('add-cart', [ImageController::class, 'addCarrito'])->name('cliente.add.carrito');
    Route::post('del-cart', [ImageController::class, 'delCarrito'])->name('cliente.del.carrito');
});
Route::post('/urlcallback', [PaymentController::class, 'urlCallback']);

