@extends('layouts.appfotografia')
@section('contenido')
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body p-5">
                <div class="space-y-6">
                    <div>
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-700 dark:text-white">{{ $orden->nro_orden }}
                                </h2>
                                @if (isset($orden->fecha_orden))
                                    <span
                                        class="px-3 py-1 text-xs text-lime-600 bg-lime-100 rounded-full dark:bg-gray-800 dark:text-lime-400">Pagado</span>
                                @else
                                    <span
                                        class="px-3 py-1 text-xs text-red-600 bg-red-100 rounded-full dark:bg-gray-800 dark:text-red-400">Sin
                                        pagar</span>
                                @endif
                            </div>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Imágenes de orden de compra
                            </p>
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
                                @if (!isset($orden->fecha_orden))
                                    <a href="{{ route('cliente.pago.show', $orden->id) }}"
                                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                        <!-- License: CC Attribution. Made by wishforge.games: https://www.wishforge.games/ -->
                                        <svg class="w-5 h-5" version="1.1" id="Icons"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0 0 32 32" xml:space="preserve">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: none;
                                                    stroke: #ffffff;
                                                    stroke-width: 2;
                                                    stroke-linecap: round;
                                                    stroke-linejoin: round;
                                                    stroke-miterlimit: 10;
                                                }

                                                .st1 {
                                                    fill: none;
                                                    stroke: #000000;
                                                    stroke-width: 2;
                                                    stroke-linecap: round;
                                                    stroke-linejoin: round;
                                                    stroke-miterlimit: 10;
                                                    stroke-dasharray: 3;
                                                }

                                                .st2 {
                                                    fill: none;
                                                    stroke: #000000;
                                                    stroke-width: 2;
                                                    stroke-linejoin: round;
                                                    stroke-miterlimit: 10;
                                                }

                                                .st3 {
                                                    fill: none;
                                                }
                                            </style>
                                            <path class="st0"
                                                d="M26.8,12.3c-0.9,0.9-2.2,1.1-3.3,0.7l-3.3,3.3c-1.6,1.6-4.4,1.5-6.2-0.3l0,0l5-5" />
                                            <path class="st0"
                                                d="M26.3,19.3c0.7-0.6,1.3-1.3,1.7-2.1c0.4-0.7,1.2-1.2,2-1.2h0" />
                                            <path class="st0"
                                                d="M24,14v10c0,1.1-0.9,2-2,2H5c-1.1,0-2-0.9-2-2V14c0-1.1,0.9-2,2-2h13" />
                                            <line class="st0" x1="3" y1="16" x2="14"
                                                y2="16" />
                                            <circle class="st0" cx="16" cy="21" r="1" />
                                            <circle class="st0" cx="19" cy="21" r="1" />
                                            <line class="st0" x1="7" y1="22" x2="9"
                                                y2="22" />
                                            <path class="st0" d="M30,7h-9.5c-3.2,0-6.1,1.9-7.4,4.9" />
                                            <rect x="-216" y="-216" class="st3" width="536" height="680" />
                                        </svg>

                                        <span>Ir a pagar</span>
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- componente --}}
                        <div>
                            <!-- component -->
                            <section class="text-gray-600 body-font">
                                <div class="container py-12 mx-auto">
                                    {{-- <div class="flex flex-col text-center w-full mb-20">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                                    Master Cleanse Reliac Heirloom</h1>
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag
                                    tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke
                                    farm-to-table. Franzen you probably haven't heard of them man bun deep
                                    jianbing selfies heirloom.</p>
                            </div> --}}
                                    <div class="flex flex-wrap -m-4">
                                        @foreach ($imagenes as $image)
                                            <div class="lg:w-1/3 sm:w-1/2 p-4">
                                                <div class="flex relative">
                                                    <img alt="gallery"
                                                        class="absolute inset-0 w-full h-full object-scale-down object-center"
                                                        src="{{ $image->url }}" oncontextmenu="return false;">
                                                    <div
                                                        class="px-8 py-5 relative z-1 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">

                                                        <div class="flex items-center gap-x-3">
                                                            <h2
                                                                class="py-1 font-medium tracking-widest text-sm title-font text-indigo-500 mb-1">
                                                                {{ $image->costo }} Bs</h2>
                                                            {{-- <h2
                                            class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                            {{$image->precio}} Bs</h2> --}}
                                                        </div>

                                                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                                            {{ $image->image->titulo }}</h1>

                                                        <div class="mt-10 grid grid-cols-1 gap-x-1 gap-y-8 sm:grid-cols-3">
                                                            @if (isset($orden->fecha_orden))
                                                                <div class="col-span-1 mx-1">
                                                                    <a href="{{ route('cliente.galeria.ver', $image->id) }}"
                                                                        class="w-full rounded-md flex justify-center items-center bg-lime-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600 text-center">
                                                                        <svg class="w-6 h-6" fill="#ffffff" height="800px"
                                                                            width="800px" version="1.1" id="Layer_1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            viewBox="0 0 24 24"
                                                                            enable-background="new 0 0 24 24"
                                                                            xml:space="preserve">
                                                                            <g id="view">
                                                                                <g>
                                                                                    <path
                                                                                        d="M12,21c-5,0-8.8-2.8-11.8-8.5L0,12l0.2-0.5C3.2,5.8,7,3,12,3s8.8,2.8,11.8,8.5L24,12l-0.2,0.5C20.8,18.2,17,21,12,21z
                                                                    M2.3,12c2.5,4.7,5.7,7,9.7,7s7.2-2.3,9.7-7C19.2,7.3,16,5,12,5S4.8,7.3,2.3,12z" />
                                                                                </g>
                                                                                <g>
                                                                                    <path
                                                                                        d="M12,17c-2.8,0-5-2.2-5-5s2.2-5,5-5s5,2.2,5,5S14.8,17,12,17z M12,9c-1.7,0-3,1.3-3,3s1.3,3,3,3s3-1.3,3-3S13.7,9,12,9z" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                <div class="col-span-1 mx-1">
                                                                    <button data-user="{{ Auth::user()->id }}"
                                                                        onclick="download(event)"
                                                                        data-url="{{ $image->url }}"
                                                                        class="btn-descargar w-full rounded-md flex justify-center items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                                                        <svg class="w-6 h-6" version="1.1" id="Layer_1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            viewBox="0 0 32 32"
                                                                            enable-background="new 0 0 32 32"
                                                                            xml:space="preserve">
                                                                            <line fill="none" stroke="#FFFFFF"
                                                                                stroke-width="3" stroke-miterlimit="10"
                                                                                x1="25" y1="28" x2="7"
                                                                                y2="28" />
                                                                            <line fill="none" stroke="#FFFFFF"
                                                                                stroke-width="3" stroke-miterlimit="10"
                                                                                x1="16" y1="23" x2="16"
                                                                                y2="4" />
                                                                            <polyline fill="none" stroke="#FFFFFF"
                                                                                stroke-width="3" stroke-miterlimit="10"
                                                                                points="9,16 16,23 23,16 " />
                                                                        </svg>
                                                                    </button>

                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- js --}}
    <script>
        function download(event) {
            var button = event.target; // The clicked button
            var url = button.getAttribute('data-url'); // The data-url attribute
            console.log("url: ", url);
            // var url = button.getAttribute('data-url'); // El atributo data-url

            // Abre la imagen en una nueva pestaña
            window.open(url);
        }
    </script>
@endsection
