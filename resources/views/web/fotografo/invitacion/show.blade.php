<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body p-5">
                <div class="space-y-12">
                    <div>
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-700 dark:text-white">Detalle de la invitación
                                </h2>

                                {{-- <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                    vendors</span> --}}
                            </div>

                            {{-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ $evento->titulo }}</p> --}}
                        </div>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                @if ($evento->pivot['estado'] == \App\Models\Evento::ACEPTADO)
                                    <button type="button" id="btn-baja"
                                        class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Dar
                                        de baja</button>
                                @else
                                    <button type="button" id="btn-baja" style="display: none;"
                                        class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Dar
                                        de baja</button>
                                    <div id="invitacion"
                                        class="w-full rounded-md border-2 border-emerald-400 py-1.5 px-3 bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                        ¿Desea aceptar la invitación para participar del evento
                                        <strong>{{ $evento->titulo }}</strong>?
                                        <div class="mt-2 flex items-center justify-end gap-x-6">
                                            {{-- <a href="{{ route('organizador.evento.index') }}"
                                        class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancelar</a> --}}
                                            <button type="button" id="btn-aceptar" data-user="{{ Auth::user()->id }}"
                                                data-evento="{{ $evento->id }}"
                                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Aceptar</button>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="col-span-full">
                                <label for="organizador"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">Organizador</label>
                                <div>
                                    <p id="organizador"
                                        class="w-full rounded-md border-0 py-1.5 px-3 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        {{ $organizador->name }} {{ $organizador->lastname }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="titulo"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">Título</label>
                                <div>
                                    <p id="titulo"
                                        class="w-full rounded-md border-0 py-1.5 px-3 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        {{ $evento->titulo }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="descripcion"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">Descripción</label>
                                <div>
                                    <p id="descripcion"
                                        class="w-full rounded-md border-0 py-1.5 px-3 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        {{ $evento->descripcion }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="direccion"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">Dirección</label>
                                <div>
                                    <p id="direccion"
                                        class="w-full rounded-md border-0 py-1.5 px-3 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        {{ $evento->direccion }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="fecha_evento"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">Fecha del
                                    evento</label>
                                <p id="fecha_evento"
                                    class="w-full rounded-md border-0 py-1.5 px-3 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    {{ $evento->fecha_evento }}
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="photo"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">Foto</label>
                                <div class="flex items-center gap-x-3">
                                    <!-- component -->
                                    <div class="flex items-center space-x-6">
                                        <div class="shrink-0">
                                            <img id="preview" class="h-16 w-16 object-fill rounded-full"
                                                src="{{ $evento->img_evento }}" alt="Current profile photo" />
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
                                    class="block text-sm font-medium text-gray-700 dark:text-white">Ubicación</label>
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


            </div>
        </div>
    </div>
    {{-- css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    {{-- js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8DaopxOLYwyY0gJV2fUky4_X99ZFwJY&callback=initMap" async
        defer></script>
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
                    // title: 'Ubicacion de Mercado el Quior',
                    // draggable: true
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

    <script>
        $(document).ready(function() {
            // Asigna un evento click al botón
            $("#btn-aceptar").click(function() { //para el boton de aceptar la invitación
                var userId = $(this).data('user');
                var eventoId = $(this).data('evento');
                // Realiza la petición AJAX
                $.ajax({
                    url: '/api/fotografo/accept-invitacion', // Cambia esto por la ruta a tu API
                    type: 'POST', // Cambia esto por el método HTTP adecuado (GET, POST, etc.)
                    data: { // Aquí puedes enviar datos a tu API
                        user_id: userId,
                        evento_id: eventoId
                    },
                    success: function(respuesta) {
                        // Aquí puedes realizar una acción con la respuesta de la APIç
                        $('#invitacion').hide();
                        $('#btn-baja').show();
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        console.log("ingresa a success");
                        toastr.success("Invitación aceptada");
                        console.log(respuesta);
                    },
                    error: function(error) {
                        // Aquí puedes manejar los errores
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        console.log("ingresa a error")
                        toastr.error("Error al aceptar la invitación");
                        console.log(error);
                    }
                });
            });
        });
    </script>
</x-app-layout>
