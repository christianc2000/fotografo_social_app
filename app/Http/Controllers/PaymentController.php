<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PaymentController extends Controller
{
    public function index(Request $request)
    {
        // $user_id = 3; // $request->user_id // id del paciente
        $user_id = User::find(Auth::user()->id);
        $paciente = User::find($user_id->id);
        $medicos = User::medicosServices($request->servicio_id);
        $horarios = collect([
            ['schedule' => '08:00 am - 12:00 pm', 'id' => 1],
            ['schedule' => '14:00 pm - 18:00 pm', 'id' => 2],
            ['schedule' => '19:00 pm - 07:00 am', 'id' => 3],
        ]);
        $servicio = Servicio::find($request->servicio_id);
        $data = [
            'servicio' => $servicio,
            'medicos' => $medicos,
            'horarios' => $horarios,
            'day' => 'Martes',
            'paciente' => $paciente,
        ];
        return view('Payments.payment')->with($data);
    }

    public function generatePayment(Request $request)
    {
        try {
            
            DB::beginTransaction();

            $nro_pago = Orden::getNumberOrden();
            $user_id = $request->paciente_id;
            $paciente = User::find($user_id);
            $servicio_id = $request->servicio_id;

            $lcComerceID           = "d029fa3a95e174a19934857f535eb9427d967218a36ea014b70ad704bc6c8d1c";
            $lnMoneda              = 2;
            $lnTelefono            = $request->cellphone;
            $razon_social          = $request->businessName;
            $lnCiNit               = $request->nit;
            $lcNroPago             = "Grupo01-". $nro_pago;// . $request->nroPago;
            $costo_total = $request->totalCost;
            $lcCorreo              = $request->email;
            $lcUrlCallBack         = "https://mail.tecnoweb.org.bo/inf513/grupo01sc/proyTecno/public/api/urlcallback";
            $lcUrlReturn           = "https://mail.tecnoweb.org.bo/inf513/grupo01sc/proyTecno/public/";
            $laPedidoDetalle       = [
                    "servicio_id"=> $servicio_id,
                    "paciente_id"=>  $paciente->id,
                    "paciente_nombre" => $paciente->name,
                    "paciente_apellido" => $paciente->lastname,
                    "paciente_ci" => $paciente->ci,
                    "precio" => $request->cost,
                    "descuento" => $request->discount,
                    "total" => $request->totalCost
                ];
            $lcUrl  = "";

            $loClient = new Client();
            if ($request->type_service == 1) {// por qr
                $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/generarqrv2";
            } elseif ($request->type_service == 2) {// tigo money
                $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/realizarpagotigomoneyv2";
            }

            $laHeader = [
                'Accept' => 'application/json'
            ];

            $laBody   = [
                "tcCommerceID"          => $lcComerceID,
                "tnMoneda"              => $lnMoneda,
                "tnTelefono"            => $lnTelefono,
                'tcNombreUsuario'       => $razon_social,
                'tnCiNit'               => $lnCiNit,
                'tcNroPago'             => $lcNroPago,
                "tnMontoClienteEmpresa" => $costo_total,
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
            if ($request->type_service == 1) {
                
                $orden_description = 'Se creo el orden Correctamente';
                try {
                    $ordenController = new OrdenController();
                    $orden = $ordenController->createOrden($request);
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

                $response = [
                    'success' => true,
                    'img' => $laQrImage,
                    'orden' => $orden,
                    'orden_description'=> $orden_description
                ];
                DB::commit();
                return response()->json($response, 200);
            } elseif ($request->type_service == 2) {

                $csrfToken = csrf_token();

                echo '<h5 class="text-center mb-4">' . $laResult->message . '</h5>';
                echo '<p class="blue-text">Transacción Generada: </p><p id="tnTransaccion" class="blue-text">'. $laResult->values . '</p><br>';
                echo '<iframe name="QrImage" style="width: 100%; height: 300px;"></iframe>';
                echo '<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>';

                echo '<script>
                        $(document).ready(function() {
                            function hacerSolicitudAjax(numero) {
                                Agrega el token CSRF al objeto de datos
                                var data = { _token: "' . $csrfToken . '", tnTransaccion: numero };
                                
                                $.ajax({
                                    url: \'/consultar\',
                                    type: \'POST\',
                                    data: data,
                                    success: function(response) {
                                        var iframe = document.getElementsByName(\'QrImage\')[0];
                                        iframe.contentDocument.open();
                                        iframe.contentDocument.write(response.message);
                                        iframe.contentDocument.close();
                                    },
                                    error: function(error) {
                                        console.error(error);
                                    }
                                });
                            }

                            setInterval(function() {
                                hacerSolicitudAjax(' . $laResult->values . ');
                            }, 7000);
                        });
                    </script>';


                        
                DB::commit();
            }
            return 'succes';
        } catch (\Throwable $th) {
            // return response()->json($th->getMessage() . " - " . $th->getLine(), 500);
            DB::rollback();
            return $th->getMessage() . " - " . $th->getLine();
        }
    }
    public function sendCorreo($value, $correo){
        // $data = (object)[
        //     'asunto' => 'Envio de pago Qr',
        //     'img' => $value
        // ];
        // Mail::to($correo)->send(new SendCorreo($data));
        // return 'correo enviado';
    }

    public function urlCallback(Request $request)
    {
        //Grupo01-12
        $Venta = $request->input("PedidoID");
        $Fecha = $request->input("Fecha");
        $NuevaFecha = date("Y-m-d", strtotime($Fecha));
        $Hora = $request->input("Hora");
        $MetodoPago = $request->input("MetodoPago");
        $Estado = $request->input("Estado");
        $Ingreso = true;

        // $cadena = "Grupo01-12";
        $cadena = $Venta;
        $partes = explode("-", $cadena);
        
        // Acceder al número después del guion
        $orden_id = $partes[1];
        $orden = Orden::find($orden_id );
        $orden->pagado = true;
        $orden->save();
        
        try {
            $arreglo = ['error' => 0, 'status' => 1, 'message' => "Pago realizado correctamente.", 'values' => true];
        } catch (\Throwable $th) {
            $arreglo = ['error' => 1, 'status' => 1, 'messageSistema' => "[TRY/CATCH] " . $th->getMessage(), 'message' => "No se pudo realizar el pago, por favor intente de nuevo.", 'values' => false];
        }

        return response()->json($arreglo);
    }
}
