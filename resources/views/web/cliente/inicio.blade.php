@extends('layouts.appfotografia')

@section('contenido')
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}

    <div>
        {{-- <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 sm:py-8 lg:max-w-7xl lg:px-8"> --}}

        @php
            $logo = session('logo');
        @endphp
        <div class="carousel-container mb-4" id="servicios">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 subtitulo1">Imagenes</h2>
            <div class="carousel-wrapper">
                <!-- Contenido de cada slide -->
                @foreach ($images as $image)
                    <div class="carousel-item">
                        <div
                            class="aspect-square w-full overflow-hidden {{ $logo == 'C' ? 'rounded-full' : 'rounded-md' }} bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-50">
                            <img src="{{ $image->url }}" alt="Front of men&#039;s Basic Tee in black."
                                class="h-full w-full object-cover object-center lg:h-full lg:w-full {{ $logo == 'C' ? 'rounded-full' : 'rounded-md' }}">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <div class="subtitulo2">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $image->titulo }}
                                    </div>
                                </h3>
                                <p class="text-sm font-medium text-gray-900 subtitulo3">Bs {{ $image->precio }}</p>
                                <div class="mt-1 flex gap-2">
                                    <button class="btn-add-cart text-sm text-white bg-blue-500 px-2 py-1 rounded"
                                        data-user="{{ Auth::user()->id }}" data-image="{{ $image->id }}">Añadir al
                                        carrito</button>
                                    <button class="btn-view-image text-sm text-white bg-green-500 px-2 py-1 rounded">Ver
                                        imagen</button>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach


                <!-- Agrega más elementos según sea necesario -->
            </div>
            <button id="prevBtn" class="carousel-button prevBtn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="nextBtn" class="carousel-button nextBtn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
        <div class="carousel-container mb-4" id="doctores">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 subtitulo1">Fotografos</h2>
            <div class="carousel-wrapper">
                <!-- Contenido de cada slide -->
                @foreach ($fotografos as $fotografo)
                    <div class="carousel-item">
                        {{-- <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-full bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="{{$personal->url_foto}}" alt="Front of men's Basic Tee in black."
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full rounded-full">
                    </div> --}}
                        <div
                            class="aspect-square w-full overflow-hidden {{ $logo == 'C' ? 'rounded-full' : 'rounded-md' }} bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-50">
                            <img src="{{ $fotografo->url_photo }}" alt="Front of men&#039;s Basic Tee in black."
                                class="h-full w-full object-cover object-center lg:h-full lg:w-full {{ $logo == 'C' ? 'rounded-full' : 'rounded-md' }}">
                        </div>

                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="#" class="subtitulo2">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $fotografo->name }} {{ $fotografo->lastname }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500 subtitulo4">
                                    Fotografo
                                </p>
                            </div>
                            {{-- <p class="text-sm font-medium text-gray-900">$35</p> --}}
                        </div>
                    </div>
                @endforeach


                <!-- Agrega más elementos según sea necesario -->
            </div>
            <button id="prevBtn" class="carousel-button prevBtn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="nextBtn" class="carousel-button nextBtn">
                <!-- SVG para el botón Siguiente -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

    </div>
    {{-- js --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // var options = {
            //     strings: ["N", "o", "m", "b", "r", "e", " ", "d", "e", " ", "l", "a", " ", "E", "m", "p", "r", "e", "s", "a"],
            //     typeSpeed: 100,
            //     backSpeed: 50,
            //     showCursor: false
            // };

            // var typed = new Typed("#titleContainer", options);

            var typed = new Typed('#titleContainer', {
                strings: ['Fotografías y eventos especiales', ' Tu mejor opción'],
                typeSpeed: 60,
                backSpeed: 60,
                loop: true
            });
        });
        var btnsAddCarts = document.querySelectorAll('.btn-add-cart');
        btnsAddCarts.forEach(function(btnsAddCart) {
            btnsAddCart.addEventListener('click', function(event) {
                console.log("click en el btn add cart");
                var imageId = event.currentTarget.dataset.image; // Extrae el atributo data-image
                var userId = event.currentTarget.dataset.user; // Extrae el atributo data-user
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
                        console.log('Imagen:', data.data.imagen);
                        console.log('orden:', data.data.orden);
                        console.log('Imagen orden:', data.data.orden.imagenes_orden);
                        console.log(data.data.orden.imagenes_orden[data.data.orden.imagenes_orden
                            .length - 1]);
                        // for (let index = 0; index < data['imagenes_orden'].leng; index++) {
                        //     const element = data.imagenes_orden[index];
                        //     if(element['imagen_id']==imageId){
                        //         console.log("se encontro", element)
                        //     }
                        // }
                        document.getElementById('cantidad-carrito').textContent = data
                            .data.orden.imagenes_orden
                            .length; // Reemplaza 'data.nuevaCantidad' con la propiedad correspondiente de la respuesta
                        document.getElementById('btn-total').textContent = "Total " + data.data.orden
                            .total +
                            "Bs";
                        var listCart = document.getElementById('list-cart');
                        var newLi = `
                    <li class="border-b border-slate-200 dark:border-slate-700 last:border-0">
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
                        addEventListenersToBtnDel();
                        // Aquí puedes agregar el código que quieras ejecutar si la petición fue exitosa
                        // document.getElementById('cantidad-carrito').textContent = data
                        //     .data.imagenes_orden
                        //     .length; // Reemplaza 'data.nuevaCantidad' con la propiedad correspondiente de la respuesta
                        // document.getElementById('btn-total').textContent = "Total " + data.data.total +
                        //     "Bs";
                        // liParent.remove();
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        // Aquí puedes agregar el código que quieras ejecutar si ocurrió un error
                    });
            });
        });
        addEventListenersToBtnDel();
        function addEventListenersToBtnDel() {
            var btnsDel = document.querySelectorAll('.btn-del');
            btnsDel.forEach(function(btnDel) {
                // Asegúrate de que no estás agregando el mismo detector de eventos varias veces
                if (!btnDel.hasListener) {
                    btnDel.addEventListener('click', function(event) {
                        event.stopPropagation();
                        var imageId = event.currentTarget.dataset.image; // Extrae el atributo data-image
                        var userId = event.currentTarget.dataset.user; // Extrae el atributo data-user
                        var liParent = event.currentTarget.closest('li');
                        var apiUrl = new URL('/api/cliente/del-cart', window.location.origin);
                        // var data = {
                        //     image_orden_id: imageId,
                        //     user_id: userId
                        // };
                        // fetch(apiUrl, {
                        //         method: 'POST',
                        //         headers: {
                        //             'Content-Type': 'application/json',
                        //         },
                        //         body: JSON.stringify(data),
                        //     })
                        //     .then(response => response.json())
                        //     .then(data => {
                        //         document.getElementById('cantidad-carrito').textContent = data.data
                        //             .imagenes_orden.length;
                        //         document.getElementById('btn-total').textContent = "Total " + data.data
                        //             .total + "Bs";
                        //         liParent.remove();
                        //     })
                        //     .catch((error) => {
                        //         console.error('Error:', error);
                        //     });
                    });
                    btnDel.hasListener = true;
                }
            });
        }
    </script>
@endsection
