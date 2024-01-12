@extends('layouts.appfotografia')
@section('contenido')
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body p-5">
                <div class="space-y-6">
                    <form action="{{ route('fotografo.evento.galeria.update', $image->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="border-b border-gray-900/10 pb-2">

                            <div>
                                <div>
                                    <div class="flex items-center gap-x-3">
                                        <h2 class="text-lg font-medium text-gray-700 dark:text-white">Aparicion
                                        </h2>

                                        {{-- <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                    vendors</span> --}}
                                    </div>

                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Apareces en la foto <strong>
                                            {{ $image->titulo }}</strong> del evento <strong>{{ $evento->titulo }}</strong>
                                    </p>
                                </div>
                            </div>
                            {{-- componente --}}
                            <div class="relative mt-10 w-full flex flex-col text-gray-500 rounded cursor-pointer"
                                style="height: 140px">
                                <img src="{{ $image->url_baja }}" class="object-contain w-32 h-32" alt=""
                                    oncontextmenu="return false;" draggable="false">
                                <p class="mt-1 text-xxs text-gray-500 dark:text-gray-300">By: <strong>{{ $image->user->name }}
                                    {{ $image->user->lastname }}</strong></p>
                            </div>
                            <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6 mb-4 mt-5">
                                <div class="col-span-full mb-2">
                                    <label for="titulo"
                                        class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Título</label>
                                    <div class="mt-2">
                                        <p id="titulo"
                                            class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            {{ $image->titulo }}</p>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <label for="precio"
                                        class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Precio
                                        de las fotos</label>
                                    <div class="mt-2">
                                        <p id="precio"
                                            class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            {{ $image->precio }}</p>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <label for="categoria"
                                        class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Categoría</label>
                                    <div class="mt-2">
                                        <p id="categoria"
                                            class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            {{ $image->tipo == \App\Models\Image::PUB ? 'Público' : 'Privado' }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-2 flex items-center justify-end gap-x-6">
                            <a href="{{ route('cliente.galeria.index') }}"
                                class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancelar</a>

                            <button type="button" data-user="{{ Auth::user()->id }}" data-image="{{ $image->id }}"
                                class="btn-add-cart rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Agregar
                                al carrito</button>
                        </div>
                    </form>
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

        .text-xxs {
            font-size: 0.6rem;
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
