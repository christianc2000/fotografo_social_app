@extends('layouts.appfotografia')
@section('contenido')
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <!-- component -->
            <section class="container px-4 mx-auto">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div>
                        <div class="flex items-center gap-x-3">
                            <h2 class="text-lg font-medium text-gray-700 dark:text-white">Eventos</h2>
                            {{-- <span
                            class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                            vendors</span> --}}
                        </div>
                        {{-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">These companies have purchased in
                        the last 12 months.</p> --}}
                    </div>

                    <div class="flex items-center mt-4 gap-x-3">
                        {{-- <button
                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_3098_154395)">
                                <path
                                    d="M13.3333 13.3332L9.99997 9.9999M9.99997 9.9999L6.66663 13.3332M9.99997 9.9999V17.4999M16.9916 15.3249C17.8044 14.8818 18.4465 14.1806 18.8165 13.3321C19.1866 12.4835 19.2635 11.5359 19.0351 10.6388C18.8068 9.7417 18.2862 8.94616 17.5555 8.37778C16.8248 7.80939 15.9257 7.50052 15 7.4999H13.95C13.6977 6.52427 13.2276 5.61852 12.5749 4.85073C11.9222 4.08295 11.104 3.47311 10.1817 3.06708C9.25943 2.66104 8.25709 2.46937 7.25006 2.50647C6.24304 2.54358 5.25752 2.80849 4.36761 3.28129C3.47771 3.7541 2.70656 4.42249 2.11215 5.23622C1.51774 6.04996 1.11554 6.98785 0.935783 7.9794C0.756025 8.97095 0.803388 9.99035 1.07431 10.961C1.34523 11.9316 1.83267 12.8281 2.49997 13.5832"
                                    stroke="currentColor" stroke-width="1.67" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_3098_154395">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <span>Import</span>
                    </button> --}}
                        {{-- <a href="{{ route('organizador.evento.create') }}"
                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Agregar Evento</span>
                    </a> --}}

                    </div>

                </div>
                <div class="mt-6 md:flex md:items-center md:justify-between">
                    <div
                        class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                        <button id="btn-todo" class="px-5 py-2 btn btn-activo">
                            Ver todo
                        </button>

                        <button id="btn-my"
                            class="px-5 py-2 btn text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                            Mis eventos
                        </button>
                    </div>

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
                <!-- component -->
                <div id="all-evento">
                    <div class="min-h-screen flex flex-col">
                        <div class="grid mt-8 gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
                            @foreach ($eventos as $evento)
                                <div class="flex flex-col">
                                    <div class="bg-white shadow-md  rounded-3xl p-1">
                                        <div class="flex-none lg:flex">
                                            <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                                <img src="{{ $evento->img_evento }}" alt="Just a flower"
                                                    class=" w-full object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                                            </div>
                                            <div class="flex-auto ml-3 justify-evenly py-2">
                                                <div class="flex flex-wrap ">
                                                    <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                                        @if ($evento->estado == \App\Models\Evento::VIGENTE)
                                                            Vigente
                                                        @elseif($evento->estado == \App\Models\Evento::CURSO)
                                                            En curso
                                                        @elseif($evento->estado == \App\Models\Evento::FINALIZADO)
                                                            Finalizado
                                                        @elseif($evento->estado == \App\Models\Evento::CANCELADO)
                                                            Cancelado
                                                        @endif
                                                    </div>
                                                    <h2 class="flex-auto text-lg font-medium">{{ $evento->titulo }}</h2>
                                                </div>
                                                <p class="mt-3"></p>
                                                <div class="flex py-4  text-sm text-gray-500">
                                                    <div class="flex-1 inline-flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 mr-3 text-gray-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                            </path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                                            </path>
                                                        </svg>
                                                        <p class="">{{ $evento->direccion }}</p>
                                                    </div>
                                                    <div class="flex-1 inline-flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 mr-2 text-gray-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <p class="">{{ $evento->fecha_evento }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                                <div class="flex space-x-3 text-sm font-medium">
                                                    <div class="flex-auto flex space-x-3">
                                                        <button
                                                            class="mb-2 md:mb-0 bg-white px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                                                            <span
                                                                class="text-green-400 hover:text-green-500 rounded-lg h-6 w-6">
                                                                <img src="{{ asset('estilos_tecno/img/img_galeria.png') }}"
                                                                    alt="img galeria"
                                                                    class="object-scale-down object-center w-full h-full">
                                                            </span>
                                                            <span>{{ count($evento->images->where('categoria', \App\Models\Image::PUB)) }}
                                                                Imágenes</span>
                                                        </button>
                                                    </div>
                                                    <a href="{{ route('cliente.evento.images', $evento->id) }}"
                                                        class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                                        aria-label="like">Galería</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="my-evento" style="display: none">
                    <div class="min-h-screen flex flex-col">
                        <div class="grid mt-8 gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">

                            @foreach ($myeventos as $evento)
                                <div class="flex flex-col">
                                    <div class="bg-white shadow-md  rounded-3xl p-1">
                                        <div class="flex-none lg:flex">
                                            <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                                <img src="{{ $evento->img_evento }}" alt="Just a flower"
                                                    class=" w-full object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                                            </div>
                                            <div class="flex-auto ml-3 justify-evenly py-2">
                                                <div class="flex flex-wrap ">
                                                    <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                                        @if ($evento->estado == \App\Models\Evento::VIGENTE)
                                                            Vigente
                                                        @elseif($evento->estado == \App\Models\Evento::CURSO)
                                                            En curso
                                                        @elseif($evento->estado == \App\Models\Evento::FINALIZADO)
                                                            Finalizado
                                                        @elseif($evento->estado == \App\Models\Evento::CANCELADO)
                                                            Cancelado
                                                        @endif
                                                    </div>
                                                    <h2 class="flex-auto text-lg font-medium">{{ $evento->titulo }}</h2>
                                                </div>
                                                <p class="mt-3"></p>
                                                <div class="flex py-4  text-sm text-gray-500">
                                                    <div class="flex-1 inline-flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 mr-3 text-gray-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                            </path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                                            </path>
                                                        </svg>
                                                        <p class="">{{ $evento->direccion }}</p>
                                                    </div>
                                                    <div class="flex-1 inline-flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 mr-2 text-gray-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <p class="">{{ $evento->fecha_evento }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                                <div class="flex space-x-3 text-sm font-medium">
                                                    <div class="flex-auto flex space-x-3">
                                                        <button
                                                            class="mb-2 md:mb-0 bg-white px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                                                            <span
                                                                class="text-green-400 hover:text-green-500 rounded-lg h-6 w-6">
                                                                <img src="{{ asset('estilos_tecno/img/img_galeria.png') }}"
                                                                    alt="img galeria"
                                                                    class="object-scale-down object-center w-full h-full">
                                                            </span>
                                                            <span>{{ count($evento->images->where('categoria', \App\Models\Image::PUB)) }}
                                                                Imágenes</span>
                                                        </button>
                                                    </div>
                                                    <a href="{{ route('cliente.evento.images', $evento->id) }}"
                                                        class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                                        aria-label="like">Galería</a>
                                                    <button type="button" data-qr={{ $evento->pivot['qr'] }}
                                                        class="btnqr mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                                        aria-label="like">QR</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="qrCodeEvento"
        class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
        style="background: rgba(0,0,0,.7);">
        <div
            class="border border-teal-500 modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Código QR</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <div class="flex justify-center items-center">
                    <img id="qrCodeImage" alt="Código QR" class="w-128 h-128 object-contain">
                </div>
                
                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button
                        class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
                    {{-- <button
                    class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Confirm</button> --}}
                </div>
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

        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.faster {
            -webkit-animation-duration: 500ms;
            animation-duration: 500ms;
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>
    {{-- js --}}
    <script>
        $(document).ready(function() {
            $(".btnqr").click(function() {
                // Aquí puedes hacer algo cuando se haga clic en el botón
                var qr = $(this).data('qr');
                console.log("qr: ",qr);
                openModal();
                var qrCodeImage = document.getElementById('qrCodeImage');
                    qrCodeImage.src =qr;
                //alert("Has hecho clic en el botón QR."+qr);
            });
            $('#btn-todo').click(function() {
                console.log("boton todo");
                $('.btn').removeClass('btn-activo');
                $(this).addClass('btn-activo');
                var my = $('#my-evento');
                if (my != null) {
                    $('#my-evento').hide();
                }
                // // Muestra todas las filas que no son de encabezado
                $('#all-evento').show();
            });
            $('#btn-my').click(function() {
                console.log("boton my");
                $('.btn').removeClass('btn-activo');
                $(this).addClass('btn-activo');
                // // Oculta todas las filas que no son de encabezado
                $('#all-evento').hide();
                // // Muestra solo las filas que corresponden a enfermeras
                $('#my-evento').show();
            });
        });
    </script>
    <script>
        const modal = document.querySelector('.main-modal');
        const closeButton = document.querySelectorAll('.modal-close');

        const modalClose = () => {
            modal.classList.remove('fadeIn');
            modal.classList.add('fadeOut');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 500);
            // abrirVentana();
        }

        const openModal = () => {
            modal.classList.remove('fadeOut');
            modal.classList.add('fadeIn');
            modal.style.display = 'flex';
        }

        for (let i = 0; i < closeButton.length; i++) {

            const elements = closeButton[i];

            elements.onclick = (e) => modalClose();

            modal.style.display = 'none';

            window.onclick = function(event) {
                if (event.target == modal) modalClose();
            }
        }
    </script>
@endsection
