<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body" id="evento" data-evento="{{ $evento->id }}">
                <!-- component -->
                <section class="container mx-auto">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-700 dark:text-white">Estado</h2>

                                {{-- <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                    vendors</span> --}}
                            </div>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ $evento->titulo }}</p>
                        </div>
                    </div>
                </section>
                <div class="mx-auto py-6 sm:px-6 lg:px-8 space-y-6">
                    <section class="w-full flex flex-wrap" id="all">
                        {{-- Estado vigente --}}
                        <div class="lg:w-1/3 md:w-1/3 pr-4 pb-4 w-full">
                            <div
                                class="{{ $evento->estado == \App\Models\Evento::VIGENTE ? 'selected' : '' }} p-8 rounded-xl border border-gray-200 bg-white duration-300 hover:scale-105 hover:shadow-xl shadow-md">
                                <button id="btn-vigente" class="w-full justify-center">
                                    <div class="my-4 flex flex-col text-base items-center justify-center h-32 w-full">
                                        <h2 class="text-lg font-medium text-gray-700 uppercase text-center"
                                            style="overflow-wrap: break-word;">Vigente</h2>
                                    </div>
                                </button>
                            </div>
                        </div>

                        {{-- Estado en curso --}}
                        <div class="lg:w-1/3 md:w-1/3 pr-4 pb-4 w-full">
                            <div
                                class="{{ $evento->estado == \App\Models\Evento::CURSO ? 'selected' : '' }} p-8 rounded-xl border border-gray-200 bg-white duration-300 hover:scale-105 hover:shadow-xl shadow-md">
                                <button id="btn-curso" class="w-full justify-center">
                                    <div class="my-4 flex flex-col text-base items-center justify-center h-32 w-full">
                                        <h2 class="text-lg font-medium text-gray-700 uppercase text-center"
                                            style="overflow-wrap: break-word;">En curso</h2>
                                    </div>
                                </button>
                            </div>
                        </div>

                        {{-- Estado finalizado --}}
                        <div class="lg:w-1/3 md:w-1/ pr-4 pb-4 w-full">
                            <div
                                class="{{ $evento->estado == \App\Models\Evento::FINALIZADO ? 'selected' : '' }} p-8 rounded-xl border border-gray-200 bg-white duration-300 hover:scale-105 hover:shadow-xl shadow-md">
                                <button id="btn-finalizado" class="w-full justify-center">
                                    <div class="my-4 flex flex-col text-base items-center justify-center h-32 w-full">
                                        <h2 class="text-lg font-medium text-gray-700 uppercase text-center"
                                            style="overflow-wrap: break-word;">Finalizado</h2>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </section>
                    <div class="mt-2 flex items-center justify-end gap-x-6">
                        <a href="{{ route('organizador.evento.index') }}"
                            class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">atrás</a>

                        <button type="button" id="btn-cancelar"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar
                            evento</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
        .selected {
            border: 2px solid #4CAF50;
            /* Cambia el color del borde a verde */
            background-color: #f2f2f2;
            /* Cambia el color de fondo a gris claro */
        }
    </style>
    {{-- js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        var apiUrl = new URL('/api/organizador/estado', window.location.origin);
        var apiUrlredirect = new URL('/organizador/evento', window.location.origin);
        var eventoId = $('#evento').data('evento');
        console.log("id evento: ", eventoId);
        $('#btn-vigente').click(function() {
            console.log("click en vigente");
            updateEstado("VIGENTE");
        });
        $('#btn-curso').click(function() {
            console.log("click en espera");
            updateEstado("EN CURSO");
        });
        $('#btn-finalizado').click(function() {
            console.log("click en finalizado");
            updateEstado("FINALIZADO");
        });
        $('#btn-cancelar').click(function() {
            console.log("click en cancelar");
            updateEstado("CANCELADO");
        });

        function updateEstado(estado) {
            var formData = new FormData();
            formData.append('evento_id', eventoId);
            formData.append('estado', estado);
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
                    toastr.success("Estado actualizado correctamente");

                    // Aquí es donde cambiamos la clase 'selected'
                    if (estado == "CANCELADO") {
                        window.location.href = apiUrlredirect;
                    } else {
                        $('.selected').removeClass('selected'); // Elimina la clase 'selected' de todos los divs
                        if (estado == "VIGENTE") {
                            $('#btn-vigente').parent().addClass(
                                'selected'); // Añade la clase 'selected' al div correspondiente
                        } else if (estado == "EN CURSO") {
                            $('#btn-curso').parent().addClass('selected');
                        } else if (estado == "FINALIZADO") {
                            $('#btn-finalizado').parent().addClass('selected');
                        }
                    }
                },
                error: function(error) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    console.log("Error al subir las imágenes");
                    toastr.error(error);

                }
            });
        }
    </script>
</x-app-layout>
