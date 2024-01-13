<?php

namespace App\Http\Controllers\Web\Cliente;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\ImageOrden;
use App\Models\Orden;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarritoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $orden = $user->ordens->where('tipo', Orden::CARRITO)->first();
        $imagenes_carrito = $orden->imagenesOrden;
        // return $imagenes_carrito;
        return view('web.cliente.pagar.carrito', compact('imagenes_carrito', 'orden'));
    }
    public function generatePayment(Request $request)
    {
        try {

            DB::beginTransaction();
            $cliente = Auth::user();
            $orden = $cliente->ordens->where('tipo', Orden::CARRITO)->first();

            $imagenes = $orden->imagenesOrden;
            $descuento = $request->costoTotal - 0.01;
            $total = round($request->costoTotal - $descuento, 3);
            $nro_orden = "ORDEN-" . $orden->id. "-" . rand(100000, 999999);

            $lcComerceID           = "d029fa3a95e174a19934857f535eb9427d967218a36ea014b70ad704bc6c8d1c";
            $lnMoneda              = 2;
            $lnTelefono            = $request->celular;
            $lcNombreUsuario       = $request->razon;
            $lnCiNit               = $request->nit;
            $lcNroPago             = $nro_orden; // . $request->nroPago;
            $lnMontoClienteEmpresa = $total;
            $lcCorreo              = $request->correo;
            $lcUrlCallBack = url('/api/urlcallback');
            $lcUrlReturn = url('/');
            $laPedidoDetalle       = [
                "imagenes" => json_encode($imagenes),
                "cliente_id" =>  $cliente->id,
                "cliente_name" => $cliente->name,
                "cliente_apellido" => $cliente->lastname,
                "descuento" => $descuento,
                "total" => $request->costoTotal
            ];
            $lcUrl  = "";

            $loClient = new Client();
            // if ($request->type_service == 1) { // por qr
            $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/generarqrv2";
            // } elseif ($request->type_service == 2) { // tigo money
            //     $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/realizarpagotigomoneyv2";
            // }

            $laHeader = [
                'Accept' => 'application/json'
            ];

            $laBody   = [
                "tcCommerceID"          => $lcComerceID,
                "tnMoneda"              => $lnMoneda,
                "tnTelefono"            => $lnTelefono,
                'tcNombreUsuario'       => $lcNombreUsuario,
                'tnCiNit'               => $lnCiNit,
                'tcNroPago'             => $lcNroPago,
                "tnMontoClienteEmpresa" => $lnMontoClienteEmpresa,
                "tcCorreo"              => $lcCorreo,
                'tcUrlCallBack'         => $lcUrlCallBack,
                "tcUrlReturn"           => $lcUrlReturn,
                'taPedidoDetalle'       => $laPedidoDetalle
            ];

            $loResponse = $loClient->post($lcUrl, [
                'headers' => $laHeader,
                'json' => $laBody
            ]);

            $laResult = json_decode($loResponse->getBody()->getContents());
            
            $orden_description = 'Se creo el orden Correctamente';
            try {
                //para compra online de la foto
                $orden->tipo = Orden::COMPRA;
                $orden->tipo_entrega = Orden::ONLINE;
                $orden->nit = $request->nit;
                $orden->correo_orden = $request->correo;
                $orden->celular = $request->celular;
                $orden->razon = $request->razon;
                $orden->nro_orden = $nro_orden;
                // $orden->fecha_entrega=Carbon::now()->toDateTimeString();
                if ($request->tipo_entrega == Orden::DOMICILIO) {
                    $orden->tipo_entrega = Orden::DOMICILIO;
                    $orden->gps = $request->latitud . $request->longitud;
                    $orden->direccion_envio = $request->direccion;
                    $orden->fecha_entrega = $request->fecha_entrega;
                }
                $orden->save();
                foreach ($orden->imagenesOrden as $imageO) {
                    $imageO->image->cantidad_vendido = $imageO->image->cantidad_vendido + 1;
                    $imageO->image->save();
                }
                Orden::create([
                    'tipo' => Orden::CARRITO,
                    'total' => 0,
                    'user_id' => $cliente->id
                ]);
            } catch (\Throwable $th) {
                $response = [
                    'success' => false,
                    'message' => $th->getMessage() . " - " . $th->getLine(),
                    'descripcion' => 'error al crear la orden',
                ];
                return response()->json($response, 404);
            }

            $laValues = explode(";", $laResult->values)[1];

            $laQrImage = "data:image/png;base64," . json_decode($laValues)->qrImage;
            $imageData = base64_decode(str_replace('data:image/png;base64,', '', $laQrImage));

            // Crea un recurso de archivo temporal y escribe los datos binarios en él
            $file = tmpfile();
            fwrite($file, $imageData);
            $meta = stream_get_meta_data($file);

            // Use a fixed extension for the image, since it's a PNG image
            $nombreImagen = time() . '_' . $request->name . '_qr_orden.png';

            // Get file path from metadata
            $filePath = $meta['uri'];

            $path = Storage::disk('s3')->putFileAs(
                'fotografia_app/qr',
                $filePath,
                $nombreImagen,
                'public'
            );
            $orden->qr_pago = Storage::disk('s3')->url($path);
            $orden->estado_orden=Orden::VAL;
            $orden->fecha_creacion_qr=Carbon::now()->toDateTimeString();
            $orden->save();
            $response = [
                'success' => true,
                'img' => $laQrImage,
                'orden' => $orden,
                'orden_description' => $orden_description
            ];
            DB::commit();
            return response()->json($response, 200);
            // } elseif ($request->type_service == 2) {

            //     $csrfToken = csrf_token();

            //     echo '<h5 class="text-center mb-4">' . $laResult->message . '</h5>';
            //     echo '<p class="blue-text">Transacción Generada: </p><p id="tnTransaccion" class="blue-text">' . $laResult->values . '</p><br>';
            //     echo '<iframe name="QrImage" style="width: 100%; height: 300px;"></iframe>';
            //     echo '<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>';

            //     echo '<script>
            //             $(document).ready(function() {
            //                 function hacerSolicitudAjax(numero) {
            //                     Agrega el token CSRF al objeto de datos
            //                     var data = { _token: "' . $csrfToken . '", tnTransaccion: numero };

            //                     $.ajax({
            //                         url: \'/consultar\',
            //                         type: \'POST\',
            //                         data: data,
            //                         success: function(response) {
            //                             var iframe = document.getElementsByName(\'QrImage\')[0];
            //                             iframe.contentDocument.open();
            //                             iframe.contentDocument.write(response.message);
            //                             iframe.contentDocument.close();
            //                         },
            //                         error: function(error) {
            //                             console.error(error);
            //                         }
            //                     });
            //                 }

            //                 setInterval(function() {
            //                     hacerSolicitudAjax(' . $laResult->values . ');
            //                 }, 7000);
            //             });
            //         </script>';
            // return 'succes';
        } catch (\Throwable $th) {
            // return response()->json($th->getMessage() . " - " . $th->getLine(), 500);
            DB::rollback();
            return $th->getMessage() . " - " . $th->getLine();
        }
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
