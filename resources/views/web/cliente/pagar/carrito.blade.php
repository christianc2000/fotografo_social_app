@extends('layouts.appfotografia')
@section('contenido')
    <div id="loadingSpinner" class="fixed z-50"
        style="display: none; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);">
        <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900"
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></div>
    </div>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body p-5">
                <div class="space-y-6">
                    <div>
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-700 dark:text-white">Carrito de compras
                                </h2>

                                {{-- <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                    vendors</span> --}}
                            </div>
                            {{-- 
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">
                            </p> --}}
                        </div>
                        {{-- componente --}}
                        <!-- component -->
                        <!-- Create By Joker Banny -->
                        <style>
                            @layer utilities {

                                input[type="number"]::-webkit-inner-spin-button,
                                input[type="number"]::-webkit-outer-spin-button {
                                    -webkit-appearance: none;
                                    margin: 0;
                                }
                            }
                        </style>

                        <div class="mx-auto py-12 w-full justify-center px-6 md:flex md:space-x-6 xl:px-0">
                            <!-- Columna 1 -->
                            <div class="rounded-lg md:w-3/4">
                                @foreach ($imagenes_carrito as $item)
                                    <div id="div{{ $item->id }}{{ Auth::user()->id }}"
                                        class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                        <img src="{{ $item->url }}" alt="product-image" class="w-full rounded-lg sm:w-40"
                                            oncontextmenu="return false;" draggable="false" />
                                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                            <div class="mt-5 sm:mt-0">
                                                <h2 class="text-lg font-bold text-gray-900">{{ $item->image->titulo }}</h2>
                                                <p class="mt-1 text-xs text-gray-700">{{ $item->costo }} Bs</p>
                                            </div>
                                            <div
                                                class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                                <div class="btn-delete flex items-center space-x-4"
                                                    data-user="{{ Auth::user()->id }}" data-image="{{ $item->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Sub total -->
                            <div class="w-full">
                                <div class="mt-6 my-2 w-full rounded-lg border bg-white p-6 shadow-md md:mt-0">
                                    <div class="mb-2 flex justify-between">
                                        <p class="text-gray-700">Subtotal</p>
                                        <p id="subtotalcart" class="text-gray-700">{{ $orden->total }} Bs</p>
                                    </div>
                                    <div class="flex justify-between">
                                        <p class="text-gray-700">Servicio</p>
                                        <p class="text-gray-700">2 Bs</p>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="flex justify-between">
                                        <p class="text-lg font-bold">Total</p>
                                        <div class="">
                                            <p id="totalcart" class="mb-1 text-lg font-bold">{{ $orden->total + 2 }} Bs</p>
                                            <p class="text-sm text-gray-700">Incluye el servicio</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 w-full rounded-lg border bg-white p-6 shadow-md md:mt-0">
                                    @auth
                                        @if (count($imagenes_carrito) > 0)
                                            <h3 class="text-lg font-medium text-gray-700 dark:text-white">Datos de la compra
                                            </h3>
                                            <input type="hidden" value="{{ $orden->id }}" id="orden_id" name="orden_id">
                                            <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6 mb-2">
                                                <div class="col-span-full mb-2">
                                                    <label for="nit"
                                                        class="block text-sm leading-2 font-medium text-gray-700 dark:text-white">NIT</label>
                                                    <div class="mt-2">
                                                        <input type="text" name="nit" id="nit" required
                                                            autocomplete="family-name"
                                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                    <span id="errornit"
                                                        class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                                </div>
                                                <div class="col-span-full mb-2">
                                                    <label for="Razon"
                                                        class="block text-sm leading-2 font-medium text-gray-700 dark:text-white">Razón
                                                        Social</label>
                                                    <div class="mt-2">
                                                        <input type="text" name="razon" id="razon" required
                                                            value="{{ Auth::user()->name }} {{ Auth::user()->lastname }}"
                                                            autocomplete="family-name"
                                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                    <span id="errorrazon"
                                                        class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                                </div>
                                                <div class="col-span-full mb-2">
                                                    <label for="correo"
                                                        class="block text-sm leading-2 font-medium text-gray-700 dark:text-white">Correo</label>
                                                    <div class="mt-2">
                                                        <input type="email" name="correo" id="correo" required
                                                            value="{{ Auth::user()->email }}" autocomplete="family-name"
                                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                    <span id="errorcorreo"
                                                        class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                                </div>
                                                <div class="col-span-full mb-2">
                                                    <label for="celular"
                                                        class="block text-sm leading-2 font-medium text-gray-700 dark:text-white">Celular</label>
                                                    <div class="mt-2">
                                                        <input type="text" name="celular" id="celular" required
                                                            autocomplete="family-name"
                                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                    <span id="errorcelular"
                                                        class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                                </div>
                                                <div class="col-span-full mb-2">
                                                    <label for="costoTotal"
                                                        class="block text-sm leading-2 font-medium text-gray-700 dark:text-white">Costo
                                                        Total</label>
                                                    <div class="mt-2">
                                                        <input type="number" name="costoTotal" id="costoTotal" readonly
                                                            value="{{ $orden->total + 2 }}" autocomplete="family-name"
                                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                    <span id="errorcostoTotal"
                                                        class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                                </div>


                                                <div class="col-span-full mb-2">
                                                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 pr-4">
                                                        <label for="tipo_entrega"
                                                            class="block w-full col-span-full text-sm leading-2 font-medium text-gray-700 dark:text-white">Tipo
                                                            de entrega</label>
                                                        <label>
                                                            <input type="radio" value="{{ \App\Models\Orden::ONLINE }}"
                                                                class="peer hidden" name="tipo_entrega" checked>
                                                            <div
                                                                class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                                                <h2 class="font-medium text-gray-700">Online</h2>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-9 h-9 text-blue-600 invisible group-[.peer:checked+&]:visible">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <label>
                                                            <input type="radio" value="{{ \App\Models\Orden::DOMICILIO }}"
                                                                class="peer hidden" name="tipo_entrega">
                                                            <div
                                                                class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                                                <h2 class="font-medium text-gray-700">Domicilio</h2>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-9 h-9 text-blue-600 invisible group-[.peer:checked+&]:visible">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-span-full mb-2" id="divDomicilio" style="display: none">
                                                    <div class="col-span-full mb-2">
                                                        <label for="fecha_entrega"
                                                            class="block text-sm leading-2 font-medium text-gray-700 dark:text-white">Fecha
                                                            de entrega</label>
                                                        <div class="mt-2">
                                                            <input type="datetime-local" name="fecha_entrega" required
                                                                id="fecha_entrega" autocomplete="family-name"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        </div>
                                                        <span id="errorfechaEntrega"
                                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                                    </div>
                                                    <div class="col-span-full mb-2">
                                                        <label for="direccion"
                                                            class="block text-sm leading-2 font-medium text-gray-700 dark:text-white">Dirección</label>
                                                        <div class="mt-2">
                                                            <input type="text" name="direccion" id="direccion" required
                                                                value="{{ Auth::user()->direccion_envio }}"
                                                                autocomplete="family-name"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        </div>
                                                        <span id="errordireccion"
                                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                                    </div>
                                                    <div class="col-span-full">
                                                        <label for="gps"
                                                            class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Ubicación</label>
                                                        <div class="block w-full rounded-md border-0 py-1.5 sm:leading-6">
                                                            <input type="hidden" id="lati" name="latitud"
                                                                value="-17.7821">
                                                            <input type="hidden" id="longi" name="longitud"
                                                                value="-63.1748">
                                                            <div id="map" style="height: 400px; "> </div>
                                                            <!-- Aquí irá el mapa de Google Maps -->
                                                            {{-- <input type="hidden" id="gps" name="gps"> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <button onclick="generatePayment()" id="btn-generar-pago"
                                                class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Generar
                                                Pago</button>
                                        @endif

                                    @endauth
                                </div>
                                {{-- <button onclick="openModal()"
                                    class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Generar
                                    Pago</button> --}}
                            </div>
                            {{-- Datos de compra --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL --}}
    <!-- component -->
    <div id="qrCodeImages"
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
                <div class="my-5">
                    <button id="downloadButton" class="btn btn-primary background-button" onclick="download()">Descargar
                        Código
                        QR</button>

                    <img id="qrCodeImage" alt="Código QR" class="img-fluid">
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8DaopxOLYwyY0gJV2fUky4_X99ZFwJY&callback=initMap" async
        defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
        // Obtén el elemento input
        var fechaEntrega = document.getElementById("fecha_entrega");
        if (fechaEntrega != null) {
            console.log("para la fecha: ", fechaEntrega);
            // Obtén la fecha actual
            var fechaActual = new Date();
            console.log("fecha actual: ", fechaActual);
            // Añade 7 días a la fecha actual
            fechaActual.setDate(fechaActual.getDate() + 7);

            // Formatea la fecha y la hora al formato que se necesita para el input (yyyy-MM-ddThh:mm)
            var fechaMinima = fechaActual.toISOString().split(".")[0];
            console.log("fecha actual: ", fechaMinima);
            // Establece el atributo min del input a la fecha mínima
            fechaEntrega.min = fechaMinima;
            fechaEntrega.value = fechaMinima;
        }
    </script>
    <script>
        var radios = document.getElementsByName("tipo_entrega");
        var divDomicilio = document.getElementById("divDomicilio");
        let orden = {};
        // Añade un event listener a cada radio button
        for (var i = 0; i < radios.length; i++) {
            radios[i].addEventListener("change", function() {
                // Imprime el valor del radio button seleccionado

                if (this.value == "Entrega a domicilio") {
                    console.log("entra a domicilio");
                    divDomicilio.style.display = "block";
                } else {
                    console.log("entra a online");
                    divDomicilio.style.display = "none";
                }
                console.log(this.value);
            });
        }

        function download() {
            var base64Image = document.getElementById('qrCodeImage').src;
            // Crea un enlace temporal
            var downloadLink = document.createElement('a');
            downloadLink.href = base64Image;
            downloadLink.download = 'codigo-qr.png';
            // Simula el clic en el enlace para iniciar la descarga
            downloadLink.click();
        }

        function generatePayment() {
            console.log("click en generar pago");
            let data = detailsToMakePayment();
            console.log("data valido: ", data);
            if (data.success == false) {
                console.log('falta rellenar datos => ', data);
                return;
            }

            makeThePayment(data);
            // mostrarSwal('Alerta', 'Esta seguro de continuar con el pago', 'warning', makeThePayment,
            //     cancelThePayment, data);
        }

        function cancelThePayment() {
            console.log('cancela el pago');
        }

        function detailsToMakePayment() {
            var costoTotal = getValueWithValidation('costoTotal', 'Campo requerido');
            try {
                var orden = document.getElementById('orden_id').value;
                var radioButtons = document.querySelectorAll('input[name="tipo_entrega"]:checked');
                var tipoEntrega = radioButtons[0].value;
                var nit = getValueWithValidation('nit', 'campo requerido');
                var correo = getValueWithValidation('correo', 'campo requerido');
                var celular = getValueWithValidation('celular', 'campo requerido');
                var razon = getValueWithValidation('razon', 'campo requerido');
                var costoTotal = getValueWithValidation('costoTotal', 'Campo requerido');
                let success = true;
                if ((nit && correo && celular && nit && razon && costoTotal) == '') {
                    success = false;
                }
                if (tipoEntrega == "Entrega a domicilio") {
                    var fechaEntrega = document.getElementById('fecha_entrega').value;
                    var direccion = getValueWithValidation('direccion', 'campo requerido');
                    var latitud = document.getElementById('lati').value;
                    var longitud = document.getElementById('longi').value;
                    if ((fechaEntrega && direccion && latitud && longitud) == '') {
                        success = false;
                    }
                    var data = {
                        orden: orden,
                        tipo_entrega: tipoEntrega,
                        nit: nit,
                        correo: correo,
                        celular: celular,
                        razon: razon,
                        costo_total: costoTotal,
                        success: success,
                        fecha_entrega: fechaEntrega,
                        direccion: direccion,
                        latitud: latitud,
                        longitud: longitud
                    }
                    return data;
                } else {

                    var data = {
                        orden: orden,
                        tipoEntrega: tipoEntrega,
                        nit: nit,
                        correo: correo,
                        celular: celular,
                        razon: razon,
                        costoTotal: costoTotal,
                        success: success
                    }
                    return data;
                }
                //  document.getElementById('error_horario_id').innerText = '';
            } catch (error) {
                console.error(error);
                // document.getElementById('error_horario_id').innerText = 'Debe seleccionar un horario';
                var schedule_id = '';
            }
        }

        function showLoadingSpinner() {
            var loadingSpinner = document.getElementById('loadingSpinner');
            loadingSpinner.style.display = 'block';
        }

        function hideLoadingSpinner() {
            var loadingSpinner = document.getElementById('loadingSpinner');
            loadingSpinner.style.display = 'none';
        }

        function makeThePayment(data) {
            console.log('realiza el pago', data);
            // Con fetch API (sin jQuery)
            showLoadingSpinner();
            var url = new URL('cliente/payments/generate_payment', window.location.origin);
            // var url = new URL('/inf513/grupo01sc/proyTecno/public/index.php/payments/generate_payment', 'https://mail.tecnoweb.org.bo');
            console.log(url);
            url.search = new URLSearchParams(data).toString();
            console.log(url);
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    openModal();
                    console.log('response de makethepayment', data); //.success);

                    var qrCodeImage = document.getElementById('qrCodeImage');
                    qrCodeImage.src = data.img;
                    orden = data.orden;
                    hideLoadingSpinner();
                })
                .catch(error => {
                    hideLoadingSpinner();
                    //  showSwalUnique('!Error!', 'ha ocurrido un error, intente nuevamente ', 'error', true);
                    console.error('Error en la petición fetch', error);
                });
        }

        function abrirVentana() {
            // Llama a tu endpoint para generar el PDF
            // let path = window.location.origin;
            // let url = path + "/report/order/pdf?"+ JSON.stringify(orden);
            var url = new URL('report/order/pdf?' + new URLSearchParams({
                id: orden.id
            }), window.location.origin);

            var win = window.open(url, "_blank");
            win.focus();

        }

        // function showLoadingSpinner() {
        //     document.getElementById('loadingSpinner').style.display = 'block';
        // }

        // function hideLoadingSpinner() {
        //     document.getElementById('loadingSpinner').style.display = 'none';
        // }

        function getValueWithValidation(nameInput, valueShow) {
            try {
                console.log("encuentra: ", nameInput);
                var dataValue = document.getElementById(nameInput).value;
                console.log("encuentra: ", dataValue);
                if (dataValue.trim() === '') {
                    document.getElementById('error' + nameInput).innerText = valueShow;
                } else {
                    document.getElementById('error' + nameInput).innerText = '';
                }
                return dataValue;
            } catch (error) {
                console.error('ha ocurrido un error en getValueWithValidation => ', error);
                return null; // Puedes devolver un valor predeterminado o null en caso de error
            }
        }
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
            abrirVentana();
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
