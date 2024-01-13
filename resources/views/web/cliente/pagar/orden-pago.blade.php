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

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Información de la orden de compra
                            </p>
                        </div>
                        <div class="mx-auto grid w-full grid-cols-1 gap-4 py-4 m-1 md:grid-cols-12">
                            <div
                                class="col-span-12 rounded-lg border border-gray-100 p-1 md:col-span-4 flex justify-center items-center">
                                <div class="relative h-auto w-auto cursor-pointer flex-col overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700 shadow-md transition-opacity hover:opacity-90"
                                    data-dialog-target="image-dialog">
                                    <img alt="nature" class="h-full w-full object-cover object-center"
                                        src="{{ $orden->qr_pago }}" />
                                </div>
                            </div>
                            <div
                                class="col-span-12 rounded-lg border space-y-12 border-gray-100 bg-white px-2 py-6 md:col-span-8">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="col-span-1 py-6 pl-2">
                                        <div class="col-span-full mb-2">
                                            <label for="titulo"
                                                class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Código</label>
                                            <div class="mt-2">
                                                <p id="titulo"
                                                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    {{ $orden->nro_orden }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1 py-6 pl-2">
                                        <div class="col-span-full mb-2">
                                            <label for="titulo"
                                                class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Fecha
                                                de pago</label>
                                            <div class="mt-2">
                                                <p id="titulo"
                                                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    @if (isset($orden->fecha_orden))
                                                        {{ $orden->fecha_orden }}
                                                    @else
                                                        Sin Fecha
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1 py-6 pl-2 ">
                                        <div class="col-span-full mb-2">
                                            <label for="titulo"
                                                class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Estado
                                                de orden</label>
                                            <div class="mt-2">
                                                <p id="titulo"
                                                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    @if (isset($orden->estado_orden))
                                                        {{ $orden->estado_orden }}
                                                    @else
                                                        Sin Estado
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="col-span-1 py-6 pl-2 ">
                                        <div class="col-span-full mb-2">
                                            <label for="titulo"
                                                class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Tipo
                                                de entrega</label>
                                            <div class="mt-2">
                                                <p id="titulo"
                                                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    {{ $orden->tipo_entrega }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1 py-6 pl-2">
                                        <div class="col-span-full mb-2">
                                            <label for="titulo"
                                                class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Fecha
                                                de entrega</label>
                                            <div class="mt-2">
                                                <p id="titulo"
                                                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    @if (isset($orden->fecha_entrega))
                                                        {{ $orden->fecha_entrega }}
                                                    @else
                                                        Sin fecha de entrega
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1 py-6 pl-2 ">
                                        <div class="col-span-full mb-2">
                                            <label for="titulo"
                                                class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Imágenes</label>
                                            <div class="mt-2">
                                                <p id="titulo"
                                                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    {{ count($orden->imagenesOrden) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="col-span-1 py-6 pl-2 ">
                                        <div class="col-span-full mb-2">
                                            <label for="titulo"
                                                class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Total</label>
                                            <div class="mt-2">
                                                <p id="titulo"
                                                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    {{ $orden->total }} Bs</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1 py-6 pl-2 ">
                                        <div class="col-span-full mb-2">
                                            <label for="titulo"
                                                class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Fecha
                                                de creación</label>
                                            <div class="mt-2">
                                                <p id="titulo"
                                                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    {{ $orden->updated_at }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1 py-6 pl-2 ">
                                        <div class="col-span-full mb-2">
                                            <label for="titulo"
                                                class="block text-sm leading-6 font-medium text-gray-700 dark:text-white">Estado
                                                QR</label>
                                            <div class="mt-2">
                                                <p id="titulo"
                                                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    @php
                                                        $fecha_actual = new DateTime();
                                                        $created_at = new DateTime($orden->fecha_creacion_qr);
                                                        $interval = $fecha_actual->diff($created_at);
                                                        $b = false;
                                                        if ($interval->i > 30) {
                                                            $b = true;
                                                        }
                                                    @endphp
                                                    @if ($b)
                                                        {{ \App\Models\Orden::VEN }}
                                                    @else
                                                        {{ \App\Models\Orden::VAL }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
