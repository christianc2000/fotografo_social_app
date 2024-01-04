<!DOCTYPE html>

<html lang="es" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotografia Social</title>
    @php
        $logo = session('logo');
    @endphp
    <link rel="icon"
        href="{{ $logo == 'D' || $logo == 'N' || $logo == 'C' || $logo == 'A' ? asset('estilos_tecno/img/logo_fotografia_white.png') : asset('estilos_tecno/img/logo_fotografia.png') }}"
        type="image/png">
    <!-- Agrega el enlace a tu archivo de estilos generado por Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset(session('estilo_actual', 'estilos_tecno/theme/dia.css')) }}">
    {{-- <link rel="stylesheet" href="{{ asset('template/assets/css/owl-carousel.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('estilos_tecno/css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos_tecno/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos_tecno/css/animacion.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="{{ asset('../estilos_tecno/js/nav.js') }}"></script>
    <script src="{{ asset('../estilos_tecno/js/carousel.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('estilos_tecno/js/carrito.js') }}"></script> --}}
    {{-- bootstrap 5 --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
</head>


<body class="h-full" data-bs-theme="light">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div class="">
        <nav class="bg-gray-700 navegacion">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">

                        <div class="flex-shrink-0">
                            <a href="{{ route('welcome') }}">
                                <img class="h-8 w-8"
                                    src="{{ $logo == 'D' || $logo == 'N' || $logo == 'C' || $logo == 'A' ? asset('estilos_tecno/img/logo_fotografia_white.png') : asset('estilos_tecno/img/logo_fotografia.png') }}"
                                    alt="Fotografia Social">
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div id="menu" class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('welcome') }}"
                                    class="menu-link {{ Route::is('welcome') ? 'active' : '' }} color-texto ">Inicio</a>
                                {{-- <a href="{{ route('fotografo') }}"
                                    class="menu-link {{ Route::is('fotografo') ? 'active' : '' }} color-texto ">Fotografos</a> --}}
                                <a href="{{ route('cliente.evento.index') }}"
                                    class="menu-link {{ Route::is('cliente.evento.index') ? 'active' : '' }} color-texto ">Eventos</a>
                                <a href="{{ route('cliente.galeria.index') }}"
                                    class="menu-link {{ Route::is('cliente.galeria.index') ? 'active' : '' }} color-texto ">Galería</a>
                                <a href="{{ route('cliente.pago.index') }}"
                                    class="menu-link {{ Route::is('cliente.pago.index') ? 'active' : '' }} color-texto ">Pagos</a>

                            </div>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            {{-- <button type="button"
                                class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only color-texto">View notifications</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </button> --}}
                            <x-dropdown-cart-compra align="right" />
                            <x-dropdown-notifications align="right" />
                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button"
                                        class="relative flex max-w-xs items-center rounded-full background-button text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        @auth
                                            <img class="h-8 w-8 rounded-full " src="{{ Auth::user()->url_photo }}"
                                                alt="">

                                        @endauth
                                        @guest
                                            <img class="h-8 w-8 rounded-full "
                                                src="{{ $logo == 'J' ? asset('estilos_tecno/img/user_blue.png') : asset('estilos_tecno/img/user_white.png') }}"
                                                alt="">
                                        @endguest

                                    </button>
                                </div>
                                <div id="user-menu"
                                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    @auth
                                        <div>
                                            <div class="block px-4 py-2 text-sm text-gray-500 ">
                                                {{ Auth::user()->name }}
                                                {{ Auth::user()->lastname }}</div>
                                            <div class="px-4 pb-2 text-sm text-gray-400">
                                                {{ Auth::user()->email }}
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                            tabindex="-1" id="user-menu-item-0">Perfil</a>
                                        @if (Auth::user()->tipo != 'C')
                                            <a href="{{ route('dashboard') }}"
                                                class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                                id="user-menu-item-0">Dashboard</a>
                                        @endif

                                        <a href="{{ route('configuracion') }}"
                                            class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                            id="user-menu-item-1">Configuración</a>
                                        <a href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                            id="user-menu-item-2">Salir</a>

                                        <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    @endauth

                                    <!-- Menú si no está autenticado -->
                                    @guest
                                        <a href="{{ route('plan.index') }}"
                                        class="block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Registrar
                                            como Organizador</a>
                                        <a href="{{ route('plan.fotografo') }}"
                                        class="block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Registrar
                                            como Fotografo</a>
                                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700"
                                            role="menuitem" tabindex="-1" id="user-menu-item-0">Register</a>
                                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700"
                                            role="menuitem" tabindex="-1" id="user-menu-item-2">Login</a>
                                        <a href="{{ route('configuracion') }}"
                                            class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                            id="user-menu-item-1">Configuración</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button id="mobile-menu-button" type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                    <a href="{{ route('welcome') }}"
                        class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('welcome') ? 'active' : '' }} color-texto "
                        aria-current="page">Inicio</a>
                    <a href="{{ route('fotografo') }}"
                        class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('fotografo') ? 'active' : '' }} color-texto ">Fotografo</a>
                    <a href="{{ route('evento') }}"
                        class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('evento') ? 'active' : '' }} color-texto ">Evento</a>
                    <a href="{{ route('galeria') }}"
                        class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('galeria') ? 'active' : '' }} color-texto ">Galeria</a>
                    <a href="{{ route('pago') }}"
                        class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('pago') ? 'active' : '' }} color-texto ">Pagos</a>
                    {{-- <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Estilos</a> --}}

                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    @auth
                        <div class="flex items-center px-5">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->url_photo }}" alt="">
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}
                                    {{ Auth::user()->lastname }}</div>
                                <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}
                                </div>
                            </div>
                            {{-- <button type="button"
                                class="relative ml-auto flex-shrink-0 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
                                <span class="absolute -inset-1.5"></span>
                                {{-- <span class="sr-only">View notifications</span> --}}
                            {{-- <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </button> --}}
                        </div>
                        <div class="mt-3 space-y-1 px-2">
                            @if (Auth::user()->tipo != 'C')
                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Perfil</a>
                                <a href="{{ route('dashboard') }}"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Dashboard</a>
                                <a href="{{ route('configuracion') }}"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Configuración</a>

                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">
                                    Salir
                                </a>

                                <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Perfil</a>
                                <a href="{{ route('configuracion') }}"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Configuración</a>

                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">
                                    Salir
                                </a>

                                <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @endif


                        </div>
                    @endauth

                    @guest
                        <div class="border-t border-gray-700 pb-3 pt-4">
                            {{-- <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full "
                                    src="{{ $logo == 'J' ? asset('estilos_tecno/img/user_blue.png') : asset('estilos_tecno/img/user_white.png') }}"
                                    alt="">

                            </div> --}}
                            <div class="flex items-center px-5">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full"
                                        src="{{ $logo == 'J' ? asset('estilos_tecno/img/user_blue.png') : asset('estilos_tecno/img/user_white.png') }}"
                                        alt="">
                                </div>
                                <div class="ml-3">
                                    {{-- <div class="text-base font-medium leading-none text-white"></div>
                                    <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div> --}}
                                </div>
                                {{-- <button type="button" class="relative ml-auto flex-shrink-0 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">View notifications</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                    </svg>
                                </button> --}}
                            </div>
                            <div class="mt-3 space-y-1 px-2">
                                <a href="{{ route('plan.index') }}"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Registrar
                                    como Organizador</a>
                                <a href="{{ route('suscripcion.index') }}"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Registrar
                                    como Fotografo</a>
                                <a href="{{ route('register') }}"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Register</a>

                                <a href="{{ route('login') }}"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Login</a>

                                <a href="{{ route('configuracion') }}"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Configuración</a>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>
    </div>
    </nav>


    @if (Route::is('welcome'))
        <header class="bg-white shadow active">
            <div class="header-container">
                <img class="header-image" src="{{ asset('estilos_tecno/img/fondo_principal.jpg') }}"
                    alt="Logo de la empresa">
                <div class="title-container" id="titleContainer"></div>
                <h1 class="title-static">FOTOGRAFÍA SOCIAL</h1>
            </div>
        </header>
    @endif

    <main class="body-background">
        <div class="position-absolute top-0 end-80 p-0 " hidden>
            <div class="form-check form-switch custom-switch d-flex justify-content-end p-4">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label ms-3" for="flexSwitchCheckChecked"> Modo Oscuro </label>
            </div>
        </div>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @yield('contenido')
        </div>
    </main>

    </div>
    <script>
        var menu = document.getElementById('user-menu');
        menu.style.display = 'none';

        document.addEventListener('click', function(event) {
            var button = document.getElementById('user-menu-button');
            var menu = document.getElementById('user-menu');

            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.style.display = 'none';
            }
        });

        document.getElementById('user-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('user-menu');
            menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
        });
    </script>
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
    <script>
        var btnsAddCarts = document.querySelectorAll('.btn-add-cart');
        btnsAddCarts.forEach(function(btnsAddCart) {
            btnsAddCart.addEventListener('click', function(event) {
                console.log("click en el btn add cart");
                var imageId = event.currentTarget.dataset.image;
                var userId = event.currentTarget.dataset.user;
                console.log('Image ID: ', imageId);
                console.log('User ID: ', userId);
                var apiUrl = new URL('/api/cliente/add-cart', window.location.origin);
                console.log(apiUrl)
                var data = {
                    image_id: imageId,
                    user_id: userId
                };
                fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(data),
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('cantidad-carrito').textContent = data
                            .data.orden.imagenes_orden
                            .length; // Reemplaza 'data.nuevaCantidad' con la propiedad correspondiente de la respuesta
                        document.getElementById('btn-total').textContent = "Total " + data.data.orden
                            .total +
                            "Bs";
                        var listCart = document.getElementById('list-cart');
                        var newLi = `
                    <li id="li${data.data.orden.imagenes_orden[data
                            .data.orden.imagenes_orden
                            .length-1].id}${userId}" class="border-b border-slate-200 dark:border-slate-700 last:border-0">
                        <div class="p-2 flex bg-white hover:bg-gray-100 border-b border-gray-100">
                            <a class="relative block hover:bg-slate-50 dark:hover:bg-slate-700/20" href="#carrito">
                                <div class="w-16"><img src="${data.data.imagen.url_baja}" class="w-full h-full object-cover" alt="img product"></div>
                            </a>
                            <div class="flex-auto text-sm w-32 px-1">
                                <div class="font-bold">${data.data.imagen.titulo}</div>
                            </div>
                            <div class="flex flex-col w-18 font-medium items-end">
                                <div data-image="${data.data.orden.imagenes_orden[data.data.orden.imagenes_orden.length-1].id}" data-user="${data.data.orden.user_id}" class="btn-del w-5 h-5 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-trash-2 ">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>                               
                                </div>
                                ${data.data.imagen.precio} Bs
                            </div>
                        </div>
                    </li>
                `;
                        listCart.insertAdjacentHTML('afterbegin', newLi);
                        actualizarBtnsDel();

                        // Crea un nuevo objeto de evento

                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            });
        });

        function ejecutarCodigoBtnsDel(event) {
            event.stopPropagation();
            var imageId = event.currentTarget.dataset.image;
            var userId = event.currentTarget.dataset.user;
            console.log('Image ID: ', imageId);
            console.log('User ID: ', userId);
            var liParent = document.getElementById('li' + imageId + userId);
            var divParent = document.getElementById('div' + imageId + userId);
            var subtotal = document.getElementById('subtotalcart');
            var total = document.getElementById('totalcart');
            var costoTotal = document.getElementById('costoTotal');
            console.log("subtotal: ", subtotal);
            console.log("total: ", total);
            console.log("costo Total: ", costoTotal);
            var apiUrl = new URL('/api/cliente/del-cart', window.location.origin);
            console.log(apiUrl)
            var data = {
                image_orden_id: imageId,
                user_id: userId
            };
            fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data.data);
                    // Aquí puedes agregar el código que quieras ejecutar si la petición fue exitosa
                    document.getElementById('cantidad-carrito').textContent = data
                        .data.imagenes_orden
                        .length; // Reemplaza 'data.nuevaCantidad' con la propiedad correspondiente de la respuesta
                    document.getElementById('btn-total').textContent = "Total " + data.data.total +
                        "Bs";
                    liParent.remove();

                    if (divParent != null) {
                        divParent.remove();
                    }
                    if (subtotal != null) {
                        subtotal.textContent = data
                            .data.total +
                            " Bs";
                    }
                    console.log(subtotal);

                    if (total != null) {
                        total.textContent = (data.data
                                .total + 2) +
                            " Bs";
                    }
                    console.log(total);

                    if (costoTotal != null) {
                        costoTotal.value = data.data.total + 2;
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    // Aquí puedes agregar el código que quieras ejecutar si ocurrió un error
                });
        }

        function actualizarBtnsDel() {
            console.log("entra a actualizar btnsdel");
            var btnsDel = document.querySelectorAll('.btn-del');
            btnsDel.forEach(function(btnDel) {
                // Elimina los oyentes de eventos existentes para evitar duplicados
                btnDel.removeEventListener('click', ejecutarCodigoBtnsDel);
                // Adjunta el evento de clic
                btnDel.addEventListener('click', ejecutarCodigoBtnsDel);
            });
        }
        actualizarBtnsDel();
        var btnsDelet = document.querySelectorAll('.btn-delete');
        btnsDelet.forEach(function(btnDele) {
            btnDele.addEventListener('click', function(event) {
                console.log("click boton vista cart");
                var imageId = event.currentTarget.dataset.image;
                var userId = event.currentTarget.dataset.user;
                console.log('Image ID: ', imageId);
                console.log('User ID: ', userId);
                var divParent = document.getElementById('div' + imageId + userId);

                divParent.remove(); // Mueve la eliminación de divParent aquí

                actualizarBtnsDel();

                // Crea un nuevo objeto de evento
                var newEvent = {
                    currentTarget: event.currentTarget,
                    target: event.target,
                    stopPropagation: function() {}
                };
                ejecutarCodigoBtnsDel(newEvent)
                // Actualiza btnsDel después de hacer clic en btnsDelet

            });
        });
    </script>
    {{-- animación --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Aplicar el tema almacenado al cargar la página
        var switchCheckbox = document.getElementById('flexSwitchCheckChecked');
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = getAttributeLocally('theme');
            if (savedTheme === 'dark') {
                changeThemeDark();
            } else {
                changeThemeLight();
            }

            switchCheckbox.addEventListener('change', function() {
                // Lógica que se ejecutará cuando se cambie el valor del switch
                if (switchCheckbox.checked) { //  modo dark
                    changeThemeDark();
                } else { // modo light
                    changeThemeLight();
                }
            });
        });

        function getTheme() {
            const body = document.body;
            const temaActual = body.getAttribute('data-bs-theme');
            return temaActual;
        }

        function changeThemeDark() {
            const body = document.body;
            body.setAttribute('data-bs-theme', 'dark');
            saveAttributeLocally('theme', 'dark');
        }

        function changeThemeLight() {
            const body = document.body;
            body.setAttribute('data-bs-theme', 'light');
            saveAttributeLocally('theme', 'light');
        }
        // Guardar un atributo localmente
        function saveAttributeLocally(nombreAtributo, valor) {
            localStorage.setItem(nombreAtributo, valor);
        }
        // Obtener un atributo guardado localmente
        function getAttributeLocally(nombreAtributo) {
            return localStorage.getItem(nombreAtributo);
        }

        function validateNumber(input) {
            // Elimina caracteres no numéricos (excepto el punto para decimales)
            input.value = input.value.replace(/[^0-9.]/g, '');
            // Si se ingresan múltiples puntos, elimina todos menos el primero
            var puntos = input.value.split('.');
            if (puntos.length > 2) {
                input.value = puntos[0] + '.' + puntos.slice(1).join('');
            }
            // Limitar a dos decimales
            var decimales = input.value.split('.')[1];
            if (decimales && decimales.length > 2) {
                input.value = input.value.slice(0, -1);
            }
            // Si el campo está vacío, establecer el valor a 0
            if (input.value === '') {
                input.value = '0';
            }
        }

        function validateNumberWithGuion(input) {
            // Elimina caracteres no numéricos (excepto el punto para decimales)
            input.value = input.value.replace(/[^0-9-]/g, '');
            // Si se ingresan múltiples puntos, elimina todos menos el primero
            var puntos = input.value.split('-');
            if (puntos.length > 2) {
                input.value = puntos[0] + '-' + puntos.slice(1).join('');
            }
            // Limitar a dos decimales
            // var decimales = input.value.split('-')[1];
            // if (decimales && decimales.length > 2) {
            //     input.value = input.value.slice(0, -1);
            // }
            // // Si el campo está vacío, establecer el valor a 0
            // if (input.value === '') {
            //     input.value = '0';
            // }
        }

        function validateOnlyNumber(input) {
            // Elimina caracteres no numéricos (excepto el punto para decimales)
            var inputValue = input.value.replace(/[^0-9-]/g, '');
            // Limitar a un máximo de 8 caracteres
            if (inputValue.length > 8) {
                inputValue = inputValue.slice(0, 8);
            }
            input.value = inputValue;
        }

        function testQuery() {
            console.log('test query working');
        }

        function mostrarSwal(title, description, icon, isDark, onAccept, onCancel, data = null) {
            Swal.fire({
                title: '¡' + title + '!',
                text: description,
                icon: icon,
                showCancelButton: true, // Mostrar el botón de cancelar
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                // Agregar la clase 'dark' para el modo oscuro o 'light' para el modo light
                // customClass: {
                //     popup: isDark == true ? 'sweetalert-dark' : '',
                //     header: isDark == true ? 'sweetalert-dark' : '',
                //     content: isDark == true ? 'sweetalert-dark' : '',
                //     confirmButton: isDark == true ? 'sweetalert-dark' : '',
                //     cancelButton: isDark == true ? 'sweetalert-dark' : '',
                // },
            }).then((result) => {
                // El código que se ejecutará después de hacer clic en Aceptar o Cancelar
                if (result.isConfirmed) {
                    if (onAccept && typeof onAccept === 'function') {
                        console.log("hace click en aceptar");
                        onAccept(data);
                    }
                } else if (result.isDismissed) {
                    // Acción cuando se hace clic en Cancelar
                    if (onCancel && typeof onCancel === 'function') {
                        onCancel();
                    }
                }
            });
        }

        function showSwalUnique(title, description, icon, isDark) {
            Swal.fire({
                title: title,
                text: description,
                icon: icon,
                confirmButtonText: 'Entendido',
                customClass: {
                    popup: isDark == true ? 'sweetalert-dark' : '',
                    header: isDark == true ? 'sweetalert-dark' : '',
                    content: isDark == true ? 'sweetalert-dark' : '',
                    confirmButton: isDark == true ? 'sweetalert-dark' : '',
                    cancelButton: isDark == true ? 'sweetalert-dark' : '',
                },
            });
        }
    </script>
    <style>
        /* Agrega estilos según tus necesidades para un tema oscuro */
        .sweetalert-dark {
            background-color: #333;
            color: #fff;
            /* Otros estilos... */
        }
    </style>
</body>

</html>
