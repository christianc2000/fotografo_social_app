<x-app-layout>

    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body">
                <!-- component -->

                <!-- component -->
                <section class="container px-4 mx-auto">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-700 dark:text-white">Turno</h2>

                                {{-- <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                    vendors</span> --}}
                            </div>

                            {{-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">These companies have purchased in
                                the last 12 months.</p> --}}
                        </div>

                        <div class="flex items-center mt-4 gap-x-3">


                            <a href="{{ route('turno.create') }}"
                                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Agregar turno de atención</span>
                            </a>
                        </div>
                    </div>

                    <div class="mt-6 md:flex md:items-center md:justify-between">
                        {{-- <div
                            class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                            <button id="btn-todo" class="px-5 py-2 btn btn-activo">
                                Ver todo
                            </button>

                            <button id="btn-online"
                                class="px-5 py-2 btn text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                                Online
                            </button>

                            <button id="btn-caja"
                                class="px-5 py-2 btn text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                                Caja
                            </button>
                        </div> --}}

                        {{-- <div class="relative flex items-center mt-4 md:mt-0">
                            <span class="absolute">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </span>

                            <input type="text" placeholder="Search"
                                class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                        </div> --}}
                    </div>

                    <div class="flex flex-col mt-6">
                        <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                                        id="tabla-servicio">
                                        <thead class="bg-gray-50 dark:bg-gray-800">
                                            <tr class="encabezado">
                                                <th scope="col"
                                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                                        <span>Servicio</span>

                                                        <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z"
                                                                fill="currentColor" stroke="currentColor"
                                                                stroke-width="0.1" />
                                                            <path
                                                                d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z"
                                                                fill="currentColor" stroke="currentColor"
                                                                stroke-width="0.1" />
                                                            <path
                                                                d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z"
                                                                fill="currentColor" stroke="currentColor"
                                                                stroke-width="0.3" />
                                                        </svg>
                                                    </button>
                                                </th>

                                                <th scope="col"
                                                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    Personal
                                                </th>

                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    Tipo
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    Estado
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    Turno</th>
                                                <th scope="col" class="relative py-3.5 px-4">
                                                    <span class="sr-only">Opciones</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                            @foreach ($atencionTurnos as $atencionTurno)
                                                <tr>
                                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div>
                                                            <h2 class="font-medium text-gray-800 dark:text-white ">
                                                                {{ $atencionTurno->servicio->nombre }}
                                                            </h2>
                                                            {{-- <p
                                                                class="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                                {{ $atencionTurno->atencion }}</p> --}}
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div>
                                                            <h2 class="font-medium text-gray-800 dark:text-white ">
                                                                {{ $atencionTurno->user->name }}
                                                                {{ $atencionTurno->user->lastname }}
                                                            </h2>
                                                            {{-- <p
                                                                class="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                                {{ $atencionTurno->atencion }}</p> --}}
                                                        </div>
                                                    </td>
                                                    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div
                                                            class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                            @if ($atencionTurno->user->tipo == 'M')
                                                                Médico
                                                            @else
                                                                Enfermería
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                        @if ($atencionTurno->estado)
                                                            <div
                                                                class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                                Activo
                                                            </div>
                                                        @else
                                                            <div
                                                                class="inline px-3 py-1 text-sm font-normal rounded-full text-red-400 gap-x-2 bg-red-100/60 dark:bg-gray-800">
                                                                Finalizado
                                                            </div>
                                                        @endif
                                </div>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div>
                                        @php
                                            $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                                        @endphp
                                        @foreach ($dias as $dia)
                                            @php
                                                $atenciones = $atencionTurno->turnos->filter(function ($turno) use ($dia) {
                                                    return $turno->dia == $dia;
                                                });
                                            @endphp
                                            @if (!$atenciones->isEmpty())
                                                <p class="text-gray-500 dark:text-gray-400">
                                                    {{ $dia }}</p>

                                                @foreach ($atenciones as $atencion)
                                                    <p class="text-gray-500 dark:text-gray-400">
                                                        {{ $atencion->hora_inicio }} -
                                                        {{ $atencion->hora_fin }}</p>
                                                @endforeach
                                            @endif
                                        @endforeach
                                        {{-- <h4 class="text-gray-700 dark:text-gray-200">
                                                                {{ $atencionTurno->turnos->dia }} Bs</h4> --}}
                                        {{-- <p class="text-gray-500 dark:text-gray-400">Brings all your
                                                                news
                                                                into one place</p> --}}
                                    </div>
                                </td>


                                {{-- <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div
                                                            class="w-48 h-1.5 bg-blue-200 overflow-hidden rounded-full">
                                                            <div class="bg-blue-500 w-2/3 h-1.5"></div>
                                                        </div>
                                                    </td> --}}

                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="dropdown">
                                        <button id="myButton" class="dropbtn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                            </svg>
                                        </button>
                                        <div id="myDropdown" class="dropdown-content">
                                           
                                            @if ($atencionTurno->estado)
                                                <a href="#" 
                                                    data-servicioid={{ $atencionTurno->servicio->id }}
                                                    data-userid={{$atencionTurno->user->id}}
                                                    class="deleteBtn hover:bg-gray-200">Finalizar</a>
                                            @endif

                                        </div>
                                    </div>
                                </td>
                                </tr>
                                @endforeach



                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>

            {{-- <div class="overflow-visible p-6 sm:flex sm:items-center sm:justify-between ">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Page <span class="font-medium text-gray-700 dark:text-gray-100">1 of 10</span>
                </div>

                <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                    <a href="#"
                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                        </svg>

                        <span>
                            previous
                        </span>
                    </a>

                    <a href="#"
                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <span>
                            Next
                        </span>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div> --}}
            </section>
        </div>
    </div>
    </div>
    <div id="myModal" class="fixed z-50 inset-0 flex items-center justify-center" style="display: none;"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Fondo del modal -->
        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- Contenido del modal -->
        <div
            class="bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">

                </h3>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form id="formFinalizar" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="servicio_id" id="servicio_id">
                    <button id="confirmDelete" type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Confirmar
                    </button>
                </form>



                <button id="cancelDelete" type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
        /* Estilos para el botón y el contenido del menú desplegable */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            /* Alinea el borde derecho del contenido con el borde derecho del botón */
            min-width: 160px;
            z-index: 1;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            background-color: #f9f9f9;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Muestra el menú desplegable cuando se hace clic en el botón */
        .show {
            display: block;
        }

        .btn-activo {
            background-color: #f3f4f6;
            /* color de fondo cuando está activo */
            color: #374151;
            /* color del texto cuando está activo */
        }
    </style>
    {{-- JS --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    @if (session('mensaje'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            console.log("ingresa a success");
            toastr.success("{{ session('mensaje') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            console.log("ingresa a error")
            toastr.error("{{ session('error') }}");
        </script>
    @endif
    {{-- JS --}}

    <script>
        // Obtén todos los menús desplegables
        var dropdowns = document.getElementsByClassName("dropbtn");

        // Agrega un evento de clic a cada botón
        for (let i = 0; i < dropdowns.length; i++) {
            dropdowns[i].addEventListener("click", function(event) {
                event.stopPropagation();

                // Encuentra el contenido del menú desplegable correspondiente
                var dropdownContent = this.nextElementSibling;

                // Cierra todos los menús desplegables abiertos
                for (let j = 0; j < dropdowns.length; j++) {
                    var openDropdown = dropdowns[j].nextElementSibling;
                    if (openDropdown !== dropdownContent && openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }

                // Muestra u oculta el contenido del menú desplegable
                dropdownContent.classList.toggle("show");
            });
        }

        // Cierra todos los menús desplegables cuando se hace clic fuera de ellos
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
        $('#btn-todo').click(function() {
            $('.btn').removeClass('btn-activo');
            $(this).addClass('btn-activo');
            // Muestra todas las filas que no son de encabezado
            $('#tabla-servicio tr:not(.encabezado)').show();
        });

        $('#btn-online').click(function() {
            $('.btn').removeClass('btn-activo');
            $(this).addClass('btn-activo');
            // Oculta todas las filas que no son de encabezado
            $('#tabla-servicio tr:not(.encabezado)').hide();
            // Muestra solo las filas que corresponden a médicos
            $('#tabla-servicio tr[data-tipo="ONLINE"]:not(.encabezado)').show();
        });

        $('#btn-caja').click(function() {
            $('.btn').removeClass('btn-activo');
            $(this).addClass('btn-activo');
            // Oculta todas las filas que no son de encabezado
            $('#tabla-servicio tr:not(.encabezado)').hide();
            // Muestra solo las filas que corresponden a enfermeras
            $('#tabla-servicio tr[data-tipo="CAJA"]:not(.encabezado)').show();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Cuando el usuario haga clic en "Eliminar", abre el modal
            // $('#deleteBtn').click(function(e) {
            //     e.preventDefault();
            //     console.log("clic delete btn")
            //     $('#myModal').show();
            // });
            $('.deleteBtn').click(function(e) {
                e.preventDefault();
                // Obtiene el ID del personal del atributo data-id
                var userId = $(this).data('userid');
                var servicioId = $(this).data('servicioid');
                
               
                console.log('ID del user: ', userId);
                $('#user_id').val(userId)
                $('#servicio_id').val(servicioId);
                console.log('ID del servicio: ',servicioId);
                var route = "{{ route('turno.finalizar') }}";
                $('#formFinalizar').attr('action', route);
                $('#modal-title').text('¿Estás seguro de que quieres eliminar el turno de atención?');
                $('#myModal').show();

            });
            // Cuando el usuario haga clic en "Cancelar", cierra el modal
            $('#cancelDelete').click(function() {
                $('#myModal').hide();
            });

            // Cuando el usuario haga clic en "Confirmar", realiza la acción de eliminación
            $('#confirmDelete').click(function() {

                // Aquí puedes poner el código para eliminar el elemento
            });
            //opcion finalizar
          
        });
    </script>
</x-app-layout>
