<x-app-layout>
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
                                        <h2 class="text-lg font-medium text-gray-700 dark:text-white">Editar Fotografía
                                        </h2>

                                        {{-- <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                    vendors</span> --}}
                                    </div>

                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Edita la información de la
                                        fotografía agregaste al evento <strong>{{ $evento->titulo }}</strong></p>
                                </div>
                            </div>
                            {{-- componente --}}
                            <div class="relative mt-10 w-full flex flex-col text-gray-500 rounded cursor-pointer"
                                style="height: 500px">
                                <img src="{{ $image->url }}" class="object-contain w-full h-full" alt="">
                            </div>
                            <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6 mb-4 mt-5">
                                <div class="col-span-full mb-2">
                                    <label for="titulo"
                                        class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Título</label>
                                    <div class="mt-2">
                                        <input type="text" name="titulo" id="titulo" value="{{ $image->titulo }}"
                                            autocomplete="family-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    <span id="errorTitulo"
                                        class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                </div>
                                <div class="col-span-3">
                                    <label for="precio"
                                        class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Precio
                                        de
                                        las
                                        fotos</label>
                                    <div class="mt-2">
                                        <input type="number" name="precio" value="{{ $image->precio }}" id="precio"
                                            autocomplete="family-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    <span id="errorPrecio"
                                        class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                </div>
                                <div class="col-span-3">
                                    <label for="categoria"
                                        class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Categoría</label>
                                    <div class="mt-2">
                                        <select name="categoria" id="categoria"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="{{ \App\Models\Image::PUB }}"
                                                {{ $image->categoria == \App\Models\Image::PUB ? 'selected' : '' }}>Público
                                            </option>
                                            <option value="{{ \App\Models\Image::PRIV }}"
                                                {{ $image->categoria == \App\Models\Image::PRIV ? 'selected' : '' }}>Privado
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-2 flex items-center justify-end gap-x-6">
                            <a href="{{ route('fotografo.evento.galeria', $evento->id) }}"
                                class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancelar</a>

                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
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

</x-app-layout>
