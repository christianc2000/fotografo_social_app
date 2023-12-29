<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body p-5">
                <form action="{{ route('organizador.evento.update',$evento->id) }}" method="POST" enctype="multipart/form-data"
                    id="formPersonal">
                    @csrf
                    @method('put')
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-4">
                            <h2 class="text-base font-semibold leading-7 text-gray-700">Editar Evento</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Actualizar un nuevo evento.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-full">
                                    <label for="titulo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Título</label>
                                    <div>
                                        <input type="text" name="titulo" id="titulo" autocomplete="given-titulo"
                                            value="{{ $evento->titulo }}"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('titulo')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorTitulo"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="descripcion"
                                        class="block text-sm font-medium leading-6 text-gray-900">Descripción</label>
                                    <div>
                                        <input type="text" name="descripcion" id="descripcion"
                                            value="{{ $evento->descripcion }}" autocomplete="given-descripcion"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('descripcion')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorDescripcion"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>

                                <div class="col-span-full">
                                    <label for="direccion"
                                        class="block text-sm font-medium leading-6 text-gray-900">Dirección</label>
                                    <div>
                                        <input type="text" name="direccion" id="direccion" autocomplete="family-name"
                                            value="{{ $evento->direccion }}"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('direccion')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorDireccion"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="fecha_evento"
                                        class="block text-sm font-medium leading-6 text-gray-900">Fecha del
                                        evento</label>
                                    <div class="mt-2">
                                        <input type="datetime-local" name="fecha_evento" id="fecha_evento"
                                            value="{{ $evento->fecha_evento }}" autocomplete="family-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('fecha_evento')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorFechaevento"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="photo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Foto</label>
                                    <div class="flex items-center gap-x-3">
                                        <!-- component -->
                                        <div class="flex items-center space-x-6">
                                            <div class="shrink-0">
                                                <img id="preview" class="h-16 w-16 object-fill rounded-full"
                                                    src="{{ $evento->img_evento }}" alt="Current profile photo" />
                                                @error('imagen')
                                                    <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                        {{ $message }}</div>
                                                @enderror
                                                <span id="errorImagen"
                                                    class="error-message mt-1 text-sm leading-6 text-pink-600"></span>

                                            </div>
                                            <label class="block">
                                                <span class="sr-only">Seleccionar foto de perfil</span>
                                                <input type="file" id="imagen" name="imagen" accept="image/*"
                                                    class="block w-full text-sm text-slate-500
                                                file:mr-4 file:py-2 file:px-4
                                                file:rounded-full file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-violet-50 file:text-gray-500
                                                hover:file:bg-violet-100" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $partes = explode(',', $evento->gps);
                                    $latitud = $partes[0];
                                    $longitud = $partes[1];
                                @endphp
                                <div class="col-span-full">
                                    <label for="direccion"
                                        class="block text-sm font-medium leading-6 text-gray-900">Ubicación</label>
                                    <div class="block w-full rounded-md border-0 py-1.5 sm:leading-6">
                                        <input type="hidden" id="lati" name="latitud" value={{ $latitud }}>
                                        <input type="hidden" id="longi" name="longitud" value={{ $longitud }}>

                                        <div id="map" style="height: 400px; "> </div>
                                        <!-- Aquí irá el mapa de Google Maps -->
                                        {{-- <input type="hidden" id="gps" name="gps"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 flex items-center justify-end gap-x-6">
                        <a href="{{ route('organizador.evento.index') }}"
                            class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>

                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- js --}}

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8DaopxOLYwyY0gJV2fUky4_X99ZFwJY&callback=initMap" async
        defer></script>
    <script>
        // Para mostrar las imágenes cargadas en el input file
        const inputPhoto = document.getElementById('imagen');
        const previewImage = document.getElementById('preview');
        //const noImageText = document.getElementById('noImageText');

        inputPhoto.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImage.style.display = 'block';
                    previewImage.src = event.target.result;
                    //noImageText.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.style.display = 'none';
                noImageText.style.display = 'block';
            }
            // Para validar inputs

        });
    </script>
    <script>
        document.getElementById('formPersonal').addEventListener('submit', function(e) {
            e.preventDefault(); // Previene el envío del formulario
            console.log("EJECUTA EL VALIDAR FORMULARIO")
            var tituloInput = document.getElementById('titulo');
            var descripcionInput = document.getElementById('descripcion');
            var direccionInput = document.getElementById('direccion');
            var fechaEventoInput = document.getElementById('fecha_evento');
            var imagenInput = document.getElementById('imagen');

            var errorTitulo = document.getElementById('errorTitulo');
            var errorDescripcion = document.getElementById('errorDescripcion');
            var errorDireccion = document.getElementById('errorDireccion');
            var errorFechaEvento = document.getElementById('errorFechaevento');
            var errorImagen = document.getElementById('errorImagen');
            console.log(errorTitulo);
            console.log(errorDescripcion);
            // Restablecer mensajes de error
            errorTitulo.textContent = '';
            errorDescripcion.textContent = '';
            errorDireccion.textContent = '';
            errorFechaEvento.textContent = '';
            errorImagen.textContent = '';

            if (tituloInput.value.trim() === '') {
                errorTitulo.textContent = 'Por favor ingrese el título del evento';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (descripcionInput.value.trim() === '') {
                errorDescripcion.textContent = 'Por favor ingrese una descripción al evento';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (direccionInput.value.trim() === '') {
                errorDescripcion.textContent = 'Por favor ingrese la dirección del evento';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (fechaEventoInput.value.trim() === '') {
                errorFechaEvento.textContent = 'Por favor ingrese la fecha de evento';
                return false; // Evitar que el formulario se envíe si hay errores
            }
           /* if (imagenInput.value.trim() === '') {
                errorImagen.textContent = 'Por favor ingrese su foto de perfil';
                return false; // Evitar que el formulario se envíe si hay errores
            }*/
            // Si la validación pasa, el formulario se enviará
            this.submit();
        });
    </script>
    <script>
        console.log('Hi!');

        function initMap() {
            var lati = document.getElementById('lati').value;
            var longi = document.getElementById('longi').value;
            console.log(lati);
            if (lati != "") {
                const map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: parseFloat(lati),
                        lng: parseFloat(longi)
                    },
                    zoom: 13,
                });
                const marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(lati),
                        lng: parseFloat(longi)
                    },
                    map: map,
                    title: 'Ubicacion de Mercado el Quior',
                    draggable: true
                });

                // Agrega un evento 'dragend' al marcador para actualizar los campos de entrada cuando el marcador se mueva
                marker.addListener('dragend', function() {
                    document.getElementById('lati').value = marker.getPosition().lat();
                    document.getElementById('longi').value = marker.getPosition().lng();
                });
            }
        }
        window.initMap = initMap;
    </script>

</x-app-layout>
