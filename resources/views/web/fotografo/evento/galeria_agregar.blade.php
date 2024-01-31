<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div id="spinner" class="h-screen bg-white" style="display: none">
            <div class="flex justify-center items-center h-full">
                <img class="h-16 w-16" src="https://icons8.com/preloaders/preloaders/1488/Iphone-spinner-2.gif"
                    alt="">
            </div>
        </div>
        <div class="card" style="width: 100%;">
            <div class="card-body p-5">
                <div class="space-y-6">
                    <div class="border-b border-gray-900/10 pb-2">
                        <div>
                            <div>
                                <div class="flex items-center gap-x-3">
                                    <h2 class="text-lg font-medium text-gray-700 dark:text-white">Agregar Fotografías
                                    </h2>

                                    {{-- <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                    vendors</span> --}}
                                </div>

                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Coloca las fotografías que
                                    quieres agregar al evento <strong>{{ $evento->titulo }}</strong></p>
                            </div>
                        </div>
                        {{-- componente --}}
                        <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6 mb-4 mt-12">
                            <div class="col-span-full mb-2">
                                <label for="titulo"
                                    class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Título</label>
                                <div class="mt-2">
                                    <input type="text" name="titulo" id="titulo" autocomplete="family-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                <span id="errorTitulo"
                                    class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                            </div>
                            <div class="col-span-3">
                                <label for="precio"
                                    class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Precio de
                                    las
                                    fotos</label>
                                <div class="mt-2">
                                    <input type="number" name="precio" id="precio" autocomplete="family-name"
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
                                        <option value="{{ \App\Models\Image::PUB }}" selected>Público</option>
                                        <option value="{{ \App\Models\Image::PRIV }}">Privado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative mt-10 flex flex-col text-gray-500 border border-gray-400 border-dashed rounded cursor-pointer">
                            <input type="file" accept="image/*" name="imagenes"
                                class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                                id="fileInput" multiple>
                            <div class="flex flex-col items-center justify-center py-10 text-center">
                                <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="m-0">Arrastre sus archivos aquí o haga clic en esta área.</p>
                            </div>
                        </div>
                        <span id="errorImagen" class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                        <div class="preview mx-auto" id="preview"></div>

                    </div>
                    <div class="mt-2 flex items-center justify-end gap-x-6">
                        <a href="{{ route('fotografo.evento.galeria', $evento->id) }}"
                            class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancelar</a>

                        <button type="button" id="btn-guardar" data-user="{{ Auth::user()->id }}"
                            data-evento="{{ $evento->id }}"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
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
    <script>
        $(document).ready(function() {
            var fileInput = $('#fileInput');
            var preview = $('#preview');
            var filesArray = [];

            fileInput.on('change', function(e) {
                var files = e.target.files;
                for (var i = 0; i < files.length; i++) {
                    filesArray.push(files[i]);
                }
                console.log("cantidad de imagenes I: ", filesArray.length);
                handleFiles(files);
            });

            fileInput.on('dragover', function() {
                $(this).parent().addClass('dragover');
                return false;
            });

            fileInput.on('dragleave', function() {
                $(this).parent().removeClass('dragover');
                return false;
            });

            fileInput.on('drop', function(e) {
                e.preventDefault();
                $(this).parent().removeClass('dragover');
                var files = e.originalEvent.dataTransfer.files;
                for (var i = 0; i < files.length; i++) {
                    filesArray.push(files[i]);
                }
                console.log("cantidad de imagenes D: ", filesArray.length);
                handleFiles(files);
            });

            function handleFiles(files) {
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var imageType = /^image\//;

                    if (!imageType.test(file.type)) {
                        continue;
                    }

                    var img = document.createElement("img");
                    img.file = file;
                    img.classList.add('object-contain');
                    img.classList.add('w-full');
                    img.classList.add('h-full')
                    img.classList.add('thumb');

                    var div = document.createElement("div");
                    div.classList.add('container-img');
                    div.appendChild(img);

                    var removeButton = document.createElement("button");
                    removeButton.innerHTML = "X";
                    removeButton.classList.add('cursor-pointer');
                    removeButton.classList.add('absolute');
                    removeButton.classList.add('top-1');
                    removeButton.classList.add('right-1');
                    removeButton.classList.add('w-5');
                    removeButton.classList.add('h-5');
                    removeButton.classList.add('bg-rose-500');
                    removeButton.classList.add('border-1');
                    removeButton.classList.add('border-white');
                    removeButton.classList.add('dark:border-[#182235]');
                    removeButton.classList.add('rounded-full');
                    removeButton.classList.add('flex');
                    removeButton.classList.add('items-center');
                    removeButton.classList.add('justify-center');
                    removeButton.classList.add('text-xxs');
                    removeButton.classList.add('text-white');

                    removeButton.onclick = function(e) {
                        var index = filesArray.indexOf(e.target.parentNode.firstChild.file);
                        if (index > -1) {
                            filesArray.splice(index, 1);
                        }
                        console.log("cantidad de imagenes R: ", filesArray.length);
                        e.target.parentNode.remove();
                    }
                    div.appendChild(removeButton);

                    preview.append(div);

                    var reader = new FileReader();
                    reader.onload = (function(aImg) {
                        return function(e) {
                            aImg.src = e.target.result;
                        };
                    })(img);
                    reader.readAsDataURL(file);
                }
            }

            $("#btn-guardar").click(function() {
                var PrecioInput = document.getElementById('precio');
                var TituloInput = document.getElementById('titulo');
                var CategoriaInput = document.getElementById('categoria');
                var userId = $(this).data('user');
                var eventoId = $(this).data('evento');

                var errorPrecio = document.getElementById('errorPrecio');
                var errorImagen = document.getElementById('errorImagen');
                var errorTitulo = document.getElementById('errorTitulo');

                errorTitulo.textContent = '';
                errorPrecio.textContent = '';
                errorImagen.textContent = '';

                if (TituloInput.value.trim() === '') {
                    errorTitulo.textContent = 'Por favor ingrese el título de las imagenes';
                    return false; // Evitar que el formulario se envíe si hay errores
                }
                if (PrecioInput.value.trim() === '') {
                    errorPrecio.textContent = 'Por favor ingrese el precio de las imagenes';
                    return false; // Evitar que el formulario se envíe si hay errores
                }
                if (filesArray.length == 0) {
                    errorImagen.textContent = 'Por favor coloque imagenes para agregar a la galeria';
                    return false; // Evitar que el formulario se envíe si hay errores
                }

                console.log("user id: ", userId);
                console.log("evento id: ", eventoId);

                var formData = new FormData();
                formData.append('titulo', TituloInput.value);
                formData.append('categoria', CategoriaInput.value);
                formData.append('precio', PrecioInput.value);
                for (var i = 0; i < filesArray.length; i++) {
                    formData.append('imagenes[]', filesArray[i]);
                }
                formData.append('user_id', userId);
                formData.append('evento_id', eventoId);

                var apiUrl = new URL('/api/fotografo/evento/galeria/agregar', window.location.origin);
                // ACTIVAR SPINNER
                $("#spinner").css({
                    "display": "flex", // Muestra el spinner
                    "background": "rgba(255, 255, 255, 0.5)", // Hace que el fondo sea blanco y semi-transparente
                    "justify-content": "center", // Centra el spinner horizontalmente
                    "align-items": "center" // Centra el spinner 
                });
                $.ajax({
                    url: apiUrl.toString(),
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(respuesta) {
                        console.log("success: ", respuesta);

                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        console.log("ingresa a success");
                        $("#spinner").css("display", "none");
                        toastr.success("Imagenes subidas correctamente");
                        // Redirecciona a la URL devuelta por el servidor.

                        window.location.href = respuesta.redirect_url;
                    },
                    error: function(error) {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        console.log("Error al subir las imágenes");
                        $("#spinner").css("display", "none");
                        toastr.error(error);

                    }
                });
            });
        });
    </script>
</x-app-layout>
