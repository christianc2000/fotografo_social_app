@extends('layouts.appfotografia')
@section('contenido')
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body p-5">
                <div class="space-y-12">
                    <div>
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-700 dark:text-white">Notificaciones
                                </h2>

                                {{-- <span
                                class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                vendors</span> --}}
                            </div>

                            {{-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ $evento->titulo }}</p> --}}
                        </div>
                        {{-- componente --}}
                        <div class="space-y-4">
                            @foreach ($notificaciones as $notificacion)
                                <div class="flex flex-col p-8 bg-white shadow-md hover:shodow-lg rounded-2xl">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <img src="{{ $notificacion->data['imagen'] }}"
                                                class="w-16 h-16 rounded-2xl border border-blue-100 object-cover object-center text-blue-400 bg-blue-50"
                                                alt="" oncontextmenu="return false;">
                                            <div class="flex flex-col ml-3">
                                                <div class="font-medium leading-none">
                                                    {{ $notificacion->data['tipo'] == App\Models\User::EVENTO ? 'Invitación' : ($notificacion->data['tipo'] == App\Models\User::FOTOC ? 'Aparición' : '') }}
                                                </div>
                                                <p class="text-sm text-gray-600 leading-none mt-1">
                                                    {!! $notificacion->data['tipo'] == App\Models\User::EVENTO
                                                        ? 'Te invitan a participar del evento <strong>' . $notificacion->data['titulo'] . '</strong>'
                                                        : ($notificacion->data['tipo'] == App\Models\User::FOTOC
                                                            ? 'Apareciste en una fotografía con el título <strong>' . $notificacion->data['titulo'] . '</strong>'
                                                            : '') !!}
                                                </p>


                                                <span
                                                    class="block text-xs mt-3 font-light text-slate-400 dark:text-slate-500">{{ $notificacion->data['time'] }}</span>
                                            </div>
                                        </div>
                                        <a href="{{ $notificacion->data['tipo'] == App\Models\User::EVENTO ? ((Auth::user()->tipo=="F")? route('fotografo.invitacion.show', $notificacion->id) : route('cliente.invitacion.show', $notificacion->id)) : ($notificacion->data['tipo'] == App\Models\User::FOTOC ? route('cliente.aparicion.show', $notificacion->id) : '') }}"
                                            class="flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">
                                            <img src="{{ asset('estilos_tecno/img/ver.png') }}" class="w-6 h-6 object-cover"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endsection
