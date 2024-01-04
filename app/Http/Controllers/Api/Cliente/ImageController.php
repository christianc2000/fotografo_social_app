<?php

namespace App\Http\Controllers\Api\Cliente;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\ImageOrden;
use App\Models\Orden;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ImageController extends BaseController
{
    public function addCarrito(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'image_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422); // 422 es el código de respuesta HTTP para errores de validación
        }
       
        $user = User::find($request->user_id);
        $orden = $user->ordens->where('tipo', Orden::CARRITO)->first();
        $imagen = Image::find($request->image_id);
        if (isset($orden)) {
            $imagenO=ImageOrden::create([
                'url' => $imagen->url_baja,
                'costo' => $imagen->precio,
                'image_id' => $imagen->id,
                'orden_id' => $orden->id
            ]);
            $imagenesOrden = $orden->imagenesOrden;
            $s = 0;
            foreach ($imagenesOrden as $image) {
                $s = $s + $image->costo;
            }
            $orden->total = $s;
            $orden->save();

            return $this->sendResponse(["orden"=>$orden,"imagen"=>$imagen], "Carrito añadido exitosamente");
        } else {
            $newOrden = Orden::crete([
                'tipo' => Orden::CARRITO,
                'total' => $imagen->precio,
                'user_id' => $user->id
            ]);
            $imagenO=ImageOrden::create([
                'url' => $imagen->url_baja,
                'costo' => $imagen->precio,
                'image_id' => $imagen->id,
                'orden_id' => $newOrden->id
            ]);
            return $this->sendResponse(["orden"=>$newOrden,"imagen"=>$imagen], "Carrito añadido exitosamente");
        }
    }
    public function delCarrito(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'image_orden_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422); // 422 es el código de respuesta HTTP para errores de validación
        }
     
        $user = User::find($request->user_id);
        $orden = $user->ordens->where('tipo', Orden::CARRITO)->first();
        $imagenOrden = ImageOrden::find($request->image_orden_id);
        $imagenOrden->delete();

        $imagenesOrden = $orden->imagenesOrden;
        $s = 0;
        foreach ($imagenesOrden as $imagen) {
            $s = $s + $imagen->costo;
        }
        $orden->total = $s;
        $orden->save();
        return $this->sendResponse($orden, "imagen eliminada del carrito exitosamente");
    }
}
