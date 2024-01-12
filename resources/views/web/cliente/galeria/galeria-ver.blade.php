@extends('layouts.appfotografia')
@section('contenido')
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body p-5">
                <div class="space-y-6">
                  
                        <div class="border-b border-gray-900/10 pb-2">

                            <div>
                                <div>
                                    <div class="flex items-center gap-x-3">
                                        <h2 class="text-lg font-medium text-gray-700 dark:text-white">Mi Foto
                                        </h2>

                                        {{-- <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                    vendors</span> --}}
                                    </div>

                                     </div>
                            </div>
                            {{-- componente --}}
                            <div class="relative mt-10 w-full flex flex-col text-gray-500 rounded cursor-pointer"
                                style="height: 600px">
                                <img src="{{ $image->url }}" class="object-contain w-full h-full" alt="">
                            </div>
                        
                        </div>
                        <div class="mt-2 flex items-center justify-end gap-x-6">
                            <a href="{{ route('cliente.galeria.index') }}"
                                class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Volver</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    {{-- css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <style>
        .preview {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .preview div {
            position: relative;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .preview .container-img {
            width: 300px;
            height: 200px;
        }

        .preview .remove {
            position: absolute;
            right: 0;
            top: 0;
            background: red;
            color: white;
            cursor: pointer;
        }

        .dragover {
            border-width: 5px !important;
            border-color: rgb(94, 244, 255) !important;
        }
    </style>
    {{-- js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection
