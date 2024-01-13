<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body">
                <!-- component -->
                <section class="container px-4 mx-auto py-2">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Fotografos</h2>


                            </div>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Vincular Fotografo</p>
                        </div>

                    </div>
                    <div class="mt-6 md:flex md:items-center md:justify-between">
                        {{-- <div
                            class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                            <button id="btn-todo" class="px-5 py-2 btn btn-activo">
                                Ver todo
                            </button>

                            <button id="btn-en-espera"
                                class="px-5 py-2 btn text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                                En espera
                            </button>

                            <button id="btn-aceptado"
                                class="px-5 py-2 btn text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                                Aceptado
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
                                        id="tabla-fotografo">
                                        <thead class="bg-gray-50 dark:bg-gray-800">
                                            <tr class="encabezado">
                                                <th scope="col"
                                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                                        <span>Fotografo</span>

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
                                                    Vinculados
                                                </th>

                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    Fecha de vinculación
                                                </th>

                                                {{-- <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    CI</th> --}}
                                                <th scope="col" class="relative py-3.5 px-4">
                                                    <span class="sr-only"></span>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                            @foreach ($fotografosSinVincular as $fotografo)
                                                <tr>
                                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div class="flex min-w-0 gap-x-4">
                                                            <img class="h-16 w-16 flex-none rounded-full bg-gray-900 object-cover object-center"
                                                                src="{{ $fotografo->url_photo }}" alt="">
                                                            <div class="min-w-0 flex-auto">
                                                                <p
                                                                    class="text-sm font-semibold leading-6 text-gray-700 dark:text-white">
                                                                    {{ $fotografo->name }} {{ $fotografo->lastname }}
                                                                </p>
                                                                <p
                                                                    class="mt-1 truncate text-xs leading-5 text-gray-500">
                                                                    {{ $fotografo->email }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        Sin Vincular
                                                    </td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        -
                                                    </td>

                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div class="dropdown">
                                                            <button id="myButton" class="dropbtn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                                </svg>
                                                            </button>
                                                            <div id="myDropdown" class="dropdown-content">
                                                                <form
                                                                    action="{{ route('organizador.vincular.fotografo.store') }}"
                                                                    method="post" class="w-full h-full">
                                                                    @csrf
                                                                    <input type="hidden" name="fotografo_id"
                                                                        value="{{ $fotografo->id }}">
                                                                    <button type="submit"
                                                                        class="hover:bg-gray-200 w-full h-full">Vincular</button>
                                                                </form>

                                                                {{-- @if ($fotografo->pivot->estado == \App\Models\Evento::ESPERA)
                                                                    <a href="#" class="hover:bg-gray-200">Reenviar
                                                                        invitación</a>
                                                                @endif --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach ($fotografosVinculados as $fotografo)
                                                <tr>
                                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div class="flex min-w-0 gap-x-4">
                                                            <img class="h-16 w-16 flex-none rounded-full bg-gray-900 object-fill"
                                                                src="{{ $fotografo->url_photo }}" alt="">
                                                            <div class="min-w-0 flex-auto">
                                                                <p
                                                                    class="text-sm font-semibold leading-6 text-gray-700 dark:text-white">
                                                                    {{ $fotografo->name }} {{ $fotografo->lastname }}
                                                                </p>
                                                                <p
                                                                    class="mt-1 truncate text-xs leading-5 text-gray-500">
                                                                    {{ $fotografo->email }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        Vinculados
                                                    </td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        {{ $fotografo->pivot['created_at'] }}
                                                    </td>

                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        
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

                        <div class="flex items-center mt-4 mb-4 gap-x-4 sm:mt-0">
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

    <!-- Contenido del modal -->
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
                <form action="" id="form-destroy" method="POST">
                    @csrf
                    @method('delete')
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

    <!-- Contenedor del modal -->


    <!-- Add a modal for confirmation -->
    {{-- <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                </div>
            </div>
        </div>
    </div> --}}
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
        .dropdown-content button {
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
            $('#tabla-fotografo tr:not(.encabezado)').show();
        });
        $('#btn-en-espera').click(function() {
            $('.btn').removeClass('btn-activo');
            $(this).addClass('btn-activo');
            // Oculta todas las filas que no son de encabezado
            $('#tabla-fotografo tr:not(.encabezado)').hide();
            // Muestra solo las filas que corresponden a enfermeras
            $('#tabla-fotografo tr[data-tipo="EN ESPERA"]:not(.encabezado)').show();
        });
        $('#btn-aceptado').click(function() {
            $('.btn').removeClass('btn-activo');
            $(this).addClass('btn-activo');
            // Oculta todas las filas que no son de encabezado
            $('#tabla-fotografo tr:not(.encabezado)').hide();
            // Muestra solo las filas que corresponden a médicos
            $('#tabla-fotografo tr[data-tipo="ACEPTADO"]:not(.encabezado)').show();
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
                var personalId = $(this).data('id');
                var personalName = $(this).data('name');
                console.log('Name del personal: ', personalName);
                console.log('ID del personal: ', personalId);
                // Establece el ID del personal como parte de la acción del formulario
                var route = "{{ route('organizador.evento.destroy', 'id') }}";
                route = route.replace('id', personalId);
                $('#form-destroy').attr('action', route);
                $('#modal-title').text('¿Estás seguro de que quieres eliminar al personal ' + personalName +
                    '?');
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
        });
    </script>
</x-app-layout>
