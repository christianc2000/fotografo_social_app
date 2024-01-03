@extends('layouts.appfotografia')
@section('contenido')
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

                        <div class="mx-auto py-12 max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                            <div class="rounded-lg md:w-2/3">
                                @foreach ($imagenes_carrito as $item)
                                    <div
                                        class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                        <img src="{{$item->url}}"
                                            alt="product-image" class="w-full rounded-lg sm:w-40" />
                                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                            <div class="mt-5 sm:mt-0">
                                                <h2 class="text-lg font-bold text-gray-900">{{$item->image->titulo}}</h2>
                                                <p class="mt-1 text-xs text-gray-700">{{$item->costo}} Bs</p>
                                            </div>
                                            <div
                                                class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                                {{-- <div class="flex items-center border-gray-100">
                                                    <span
                                                        class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                        - </span>
                                                    <input class="h-8 w-8 border bg-white text-center text-xs outline-none"
                                                        type="number" value="2" min="1" />
                                                    <span
                                                        class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                        + </span>
                                                </div> --}}
                                                <div class="flex items-center space-x-4">
                                                   
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
                            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                                <div class="mb-2 flex justify-between">
                                    <p class="text-gray-700">Subtotal</p>
                                    <p class="text-gray-700">{{$orden->total}} Bs</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-gray-700">Servicio</p>
                                    <p class="text-gray-700">2 Bs</p>
                                </div>
                                <hr class="my-4" />
                                <div class="flex justify-between">
                                    <p class="text-lg font-bold">Total</p>
                                    <div class="">
                                        <p class="mb-1 text-lg font-bold">{{$orden->total+2}} Bs</p>
                                        <p class="text-sm text-gray-700">Incluye el servicio</p>
                                    </div>
                                </div>
                                <button
                                    class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Pagar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
