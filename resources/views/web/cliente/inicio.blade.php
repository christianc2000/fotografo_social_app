@extends('layouts.appfotografia')

@section('contenido')
    <div>
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
                                    @auth
                                        <button class="btn-add-cart text-sm text-white bg-blue-500 px-2 py-1 rounded"
                                            data-user="{{ Auth::user()->id }}" data-image="{{ $image->id }}">Añadir al
                                            carrito</button>
                                        <button class="btn-view-image text-sm text-white bg-green-500 px-2 py-1 rounded">Ver
                                            imagen</button>
                                    @endauth

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
            var typed = new Typed('#titleContainer', {
                strings: ['Fotografías y eventos especiales', ' Tu mejor opción'],
                typeSpeed: 60,
                backSpeed: 60,
                loop: true
            });
        });
    </script>
    
@endsection
