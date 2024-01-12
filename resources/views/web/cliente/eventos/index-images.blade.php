@extends('layouts.appfotografia')
@section('contenido')
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body p-5">
                <div class="space-y-6">
                    <div>
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-700 dark:text-white">Galería
                                </h2>

                                {{-- <span
                            class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                            vendors</span> --}}
                            </div>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Galeria de fotos del evento
                                <strong>{{ $evento->titulo }}</strong>
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


                                        @foreach ($imagenes as $image)
                                            <div class="lg:w-1/3 sm:w-1/2 p-4">
                                                <div class="flex relative">
                                                    <img alt="gallery"
                                                        class="absolute inset-0 w-full h-full object-contain object-center"
                                                        src="{{ $image->url_baja }}" oncontextmenu="return false;">
                                                    <div
                                                        class="px-8 py-5 relative z-1 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">

                                                        <div class="flex items-center gap-x-3">
                                                            <h2
                                                                class="py-1 font-medium tracking-widest text-sm title-font text-indigo-500 mb-1">
                                                                {{ $image->precio }} Bs</h2>
                                                            {{-- <h2
                                            class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                            {{$image->precio}} Bs</h2> --}}
                                                        </div>

                                                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                                            {{ $image->titulo }}</h1>

                                                        <div class="mt-10 grid grid-cols-1 gap-x-1 gap-y-8 sm:grid-cols-3">
                                                            <div class="col-span-1 mx-1 h-10 w-10">
                                                                <button type="button" data-user="{{ Auth::user()->id }}"
                                                                    data-image="{{ $image->id }}"
                                                                    class="btn-add-cart inline-block w-full rounded-md bg-red-600 p-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 text-center">
                                                                    <img src="{{ asset('estilos_tecno/img/add_cart.png') }}"
                                                                        class="w-full h-full object-scale-down object-center"
                                                                        alt="">
                                                                </button>
                                                            </div>
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
    {{-- css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    {{-- js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection
