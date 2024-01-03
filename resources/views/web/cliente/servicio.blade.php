@extends('layouts.appconsultorio')
@section('contenido')
    <div>
        @php
            $logo = session('logo');
        @endphp
        <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 subtitulo1">Lista de servicios</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($servicios as $servicio)
                    <div>
                        <div class="group relative">
                            <div
                                class="aspect-square w-full overflow-hidden {{ $logo == 'C' ? 'rounded-full' : 'rounded-md' }} bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-50">
                                <img src="{{ $servicio->url_imagen }}" alt="Front of men&#039;s Basic Tee in black."
                                    class="h-full w-full object-cover object-center lg:h-full lg:w-full {{ $logo == 'C' ? 'rounded-full' : 'rounded-md' }}">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="#" class="subtitulo2">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{ $servicio->nombre }}
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500 subtitulo4">{{ $servicio->atencion }}</p>
                                </div>
                                <p class="text-sm font-medium text-gray-900 subtitulo3">Bs {{ $servicio->costo }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('payment_index', ['servicio_id' => $servicio->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                Comprar servicio
                            </a>
                        </div>
                    </div>
                @endforeach


                <!-- More products... -->
            </div>
        </div>
    </div>
    <script>
        function handleClick() {
            // Lógica que se ejecutará al hacer clic
            console.log('Hiciste clic en el enlace');

            // Si necesitas redirigir después de la lógica, puedes usar window.location.href
        }
    </script>
@endsection
