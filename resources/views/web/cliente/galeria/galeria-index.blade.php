@extends('layouts.appfotografia')
@section('contenido')
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body p-5">
                <div class="space-y-6">
                    <div>
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-700 dark:text-white">Mi Galería
                                </h2>

                                {{-- <span
                                class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                vendors</span> --}}
                            </div>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Galeria de mis fotos
                            </p>
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

                                        @foreach ($ordens as $orden)
                                            @foreach ($orden->imagenesOrden as $image)
                                                <div class="lg:w-1/3 sm:w-1/2 p-4">
                                                    <div class="flex relative">
                                                        <img alt="gallery"
                                                            class="absolute inset-0 w-full h-full object-contain object-center"
                                                            src="{{ $image->image->url }}"  oncontextmenu="return false;">
                                                        <div
                                                            class="px-8 py-5 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">

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

                                                            <div
                                                                class="mt-10 grid grid-cols-1 gap-x-1 gap-y-8 sm:grid-cols-3">

                                                                @if ($orden->tipo == \App\Models\Orden::CARRITO)
                                                                    <div class="col-span-1 mx-1">
                                                                        <a href="{{ route('cliente.carrito.index') }}"
                                                                            class="inline-block w-full rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 text-center">Ir
                                                                            a comprar</a>
                                                                    </div>
                                                                @else
                                                                    <div class="col-span-1 mx-1">
                                                                        <button data-user="{{ Auth::user()->id }}"
                                                                            onclick="download(event)"
                                                                            data-url="{{ $image->url }}"
                                                                            class="btn-descargar w-full rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                                                            Descargar imagen
                                                                        </button>
                                                                    </div>
                                                                @endif


                                                                @if ($orden->tipo == \App\Models\Orden::COMPRA)
                                                                    <div class="col-span-1 mx-1">
                                                                        <a href="{{ route('cliente.galeria.ver', $image->id) }}"
                                                                            class="inline-block w-full rounded-md bg-lime-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600 text-center">Ver</a>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
    {{-- css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    {{-- js --}}
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
