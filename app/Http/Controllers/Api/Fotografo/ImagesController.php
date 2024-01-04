<?php

namespace App\Http\Controllers\Api\Fotografo;

use App\Http\Controllers\Api\BaseController;
use App\Models\Evento;
use App\Models\Image;
use App\Models\User;
use App\Notifications\UserToEventoNotification;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImagesController extends BaseController
{
    public function storeImages(Request $request) //SOLO PARA SUBIR LAS IMAGENES
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'categoria' => 'required',
            'precio' => 'required',
            'user_id' => 'required|exists:users,id',
            'evento_id' => 'required|exists:eventos,id',
            'imagenes.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422); // 422 es el código de respuesta HTTP para errores de validación
        }


        $user = User::find($request->user_id);
        $evento = Evento::find($request->evento_id);

        foreach ($request->imagenes as $imagen) {

            if ($imagen->isValid()) {
                //$nombreOriginal = $imagen->getClientOriginalName();

                $nombreImagen = time() . '_' . str_replace(' ', '_', $evento->titulo) . '.' . $imagen->getClientOriginalExtension();

                $path = Storage::disk('s3')->putFileAs(
                    'fotografia_app/imagenes',
                    $imagen,
                    $nombreImagen,
                    'public'
                );
                // Obtenemos la URL de la imagen en S3.
                $urlImagen = Storage::disk('s3')->url($path);
                $image = Image::create([
                    'titulo' => $request->titulo,
                    'url' => $urlImagen,
                    'url_baja' => $urlImagen,
                    'tipo' => Image::EVENTO,
                    'precio' => $request->precio,
                    'categoria' => $request->categoria,
                    'user_id' => $user->id,
                    'evento_id' => $evento->id
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => '¡Error al subir algunas imágenes!',
                    'redirect_url' => route('fotografo.evento.galeria', $evento->id)
                ]);
            }
        }
        return response()->json([
            'success' => true,
            'message' => '¡La imagen fué subida exitosamente!',
            'redirect_url' => route('fotografo.evento.galeria', $evento->id)
        ]);
    }
    public function analizarImagen(Request $request)
    { //id de la imagen, y id del evento
        $validator = Validator::make($request->all(), [
            'evento_id' => 'required|exists:eventos,id',
            'image_id' => 'required|exists:images,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422); // 422 es el código de respuesta HTTP para errores de validación
        }
        $evento = Evento::find($request->evento_id);
        $clientes = $evento->clientesVinculadosEventoVinculados;
        //trabajamos con la imagen
        $image = Image::find($request->image_id);


        $client_rekognition = new RekognitionClient([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);
        // var_dump($client_rekognition);
        // dd($client_rekognition);
        $url_s3 = str_replace(Storage::disk('s3')->url(''), '', $image->url);
        // return $url_s3;
        $detect_image = $client_rekognition->detectFaces([
            'Image' => [
                'S3Object' => [
                    'Bucket' => env('AWS_BUCKET'),
                    'Name' =>  $url_s3
                ],
            ],
        ]);
        if (count($detect_image['FaceDetails']) > 0) {
            $datos = new Collection();
            $c = 0;
            $sourceImage = [
                'S3Object' => [
                    'Bucket' => env('AWS_BUCKET'),
                    'Name' => $url_s3
                ],
            ];
            foreach ($clientes as $cliente) {

                $url_cliente = str_replace(Storage::disk('s3')->url(''), '', $cliente->url_photo);

                $targetImage = [
                    'S3Object' => [
                        'Bucket' => env('AWS_BUCKET'),
                        'Name' => $url_cliente // Asegúrate de que esto apunta a la URL correcta del cliente
                    ],
                ];

                $compareFacesResult = $client_rekognition->compareFaces([
                    'SourceImage' => $targetImage,
                    'TargetImage' => $sourceImage,
                    'SimilarityThreshold' => 60.0, // Puedes ajustar este valor según tus necesidades
                ]);

                if (count($compareFacesResult['FaceMatches']) > 0) {
                    // Aquí puedes manejar los rostros que coinciden
                    $c = $c + 1;
                    $datos->push(['id' => $cliente->id, 'name' => $cliente->name . " " . $cliente->lastname]);
                    $cliente->notify(new UserToEventoNotification((string) $image->id, $image->titulo, $image->url, User::FOTOC));

                }
            }

            $image->clientes = $datos;
            $image->analizado = true;
            $image->save();
            
            return $this->sendResponse($image, "clientes encontrados");
        } else {
            return "no se encontró rostros";
        }


        // return $clientes;
    }

    public function cambiarEstado(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image_id' => 'required|exists:images,id',
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422); // 422 es el código de respuesta HTTP para errores de validación
        }
        $user = User::find($request->user_id);
        $image = $user->images->where('id', $request->image_id)->first();

        $image->estado = !$image->estado;
        $image->save();
        return $this->sendResponse(true, "Estado cambiado exitosamente");
    }
}
