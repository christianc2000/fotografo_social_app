<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body p-5">
                <!-- component -->
                <section class="container px-4 mx-auto py-2">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Agregar Cliente</h2>


                                @if ($evento->estado == \App\Models\Evento::VIGENTE)
                                    <span
                                        class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                                        Vigente
                                    </span>
                                @elseif($evento->estado == \App\Models\Evento::CURSO)
                                    <span
                                        class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                                        En curso
                                    </span>
                                @elseif($evento->estado == \App\Models\Evento::FINALIZADO)
                                    <span
                                        class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                                        Finalizado
                                    </span>
                                @elseif($evento->estado == \App\Models\Evento::CANCELADO)
                                    <span
                                        class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                                        Cancelado
                                    </span>
                                @endif

                            </div>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Enviar invitación para que el
                                cliente participe del evento {{ $evento->titulo }}</p>
                        </div>
                        <div class="mt-6 md:flex md:items-center md:justify-between">
                            <div
                                class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                                <button id="btn-cuenta" class="px-5 py-2 btn btn-activo">
                                    Agregar por cuenta
                                </button>

                                <button id="btn-correo"
                                    class="px-5 py-2 btn text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                                    Agregar por correo
                                </button>



                            </div>
                        </div>
                    </div>
                    <div class="space-y-4" id="cuenta">
                        <form action="{{ route('organizacion.evento.cliente.agregar.store', $evento->id) }}"
                            method="POST">
                            @csrf
                            <div class="border-b border-gray-900/10 pb-4">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                    <div class="col-span-full">
                                        <label for="tipo"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">Elija un
                                            Cliente</label>
                                        <div class="mt-2">

                                            <select type="text" name="cliente_id" id="cliente_id"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                @foreach ($clientesSinEvento as $cliente)
                                                    <option value="{{ $cliente->id }}" selected>{{ $cliente->name }}
                                                        {{ $cliente->lastname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-2 flex items-center justify-end gap-x-6">
                                <a href="{{ route('organizador.evento.cliente.index', $evento->id) }}"
                                    class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancelar</a>

                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="space-y-4" id="correo" style="display: none">
                        <form action="{{ route('email.send') }}" method="POST">
                            @csrf
                            <div class="border-b border-gray-900/10 pb-4">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                    <div class="col-span-full">
                                        <label for="tipo"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">Escriba un
                                            correo</label>
                                        <div class="mt-2">
                                            <input type="email" name="email" id="email"
                                                autocomplete="family-name"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('correo')
                                                <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                    {{ $message }}</div>
                                            @enderror
                                            <span id="errorCorreo"
                                                class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                            <input type="hidden" name="evento" value={{ $evento->id }}>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-2 flex items-center justify-end gap-x-6">
                                <a href="{{ route('organizador.evento.cliente.index', $evento->id) }}"
                                    class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancelar</a>

                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
    {{-- css --}}
    <style>
        .btn-activo {
            background-color: #f3f4f6;
            /* color de fondo cuando está activo */
            color: #374151;
            /* color del texto cuando está activo */
        }
    </style>
    {{-- js --}}
    <script>
        var btnCuenta = document.getElementById('btn-cuenta');
        var btnCorreo = document.getElementById('btn-correo');
        var divCuenta = document.getElementById('cuenta');
        var divCorreo = document.getElementById('correo');

        // Agrega un controlador de eventos al botón "btn-cuenta"
        btnCuenta.addEventListener('click', function() {
            // Muestra el div "cuenta" y oculta el div "correo"
            divCuenta.style.display = 'block';
            divCorreo.style.display = 'none';
        });

        // Agrega un controlador de eventos al botón "btn-correo"
        btnCorreo.addEventListener('click', function() {
            // Muestra el div "correo" y oculta el div "cuenta"
            divCorreo.style.display = 'block';
            divCuenta.style.display = 'none';
        });
        $('.btn').click(function() {
            // Elimina la clase 'btn-activo' de todos los botones
            $('.btn').removeClass('btn-activo');

            // Añade la clase 'btn-activo' al botón que se hizo clic
            $(this).addClass('btn-activo');
        });
    </script>
</x-app-layout>
