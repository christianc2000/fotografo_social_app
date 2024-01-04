@extends('layouts.appfotografia')
@section('contenido')
    <!-- component -->
    <div class="flex flex-wrap -mx-3 mb-5">
        <div class="w-full max-w-full px-3 mb-6  mx-auto">
            <div
                class="relative flex-[1_auto] flex flex-col break-words min-w-0 bg-clip-border rounded-[.95rem] bg-white m-5">
                <div
                    class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-light/30">
                    <!-- card header -->
                    <div class="px-9 pt-5 flex justify-between items-stretch flex-wrap min-h-[70px] pb-0 bg-transparent">
                        <h3 class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-xl/tight text-dark">
                            <span class="mr-3 font-semibold text-dark">Mis Eventos</span>

                        </h3>
                    
                    </div>
                    <!-- end card header -->
                    <!-- card body  -->
                    <div class="flex-auto block py-8 pt-6 px-9">
                        <div class="overflow-x-auto">
                            <table class="w-full my-0 align-middle text-dark border-neutral-200">
                                <thead class="align-bottom">
                                    <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                                        <th class="pb-3">EVENTO</th>
                                        <th class="pb-3">FECHA DEL EVENTO</th>
                                        <th class="pb-3">ESTADO</th>
                                        <th class="pb-3">QR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventos as $evento)
                                        <tr class="border-b border-dashed last:border-b-0">
                                            <td class="p-3 pl-0">
                                                <div class="flex items-center">
                                                    <div class="relative inline-block shrink-0 rounded-2xl me-3">
                                                        <img src="{{$evento->img_evento}}"
                                                            class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl"
                                                            alt="">
                                                    </div>
                                                    <div class="flex flex-col justify-start">
                                                        <a href="javascript:void(0)"
                                                            class="mb-1 font-semibold transition-colors duration-200 ease-in-out text-lg/normal text-secondary-inverse hover:text-primary">
                                                            {{$evento->titulo}}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-3 pr-0 text-end">
                                                <span
                                                    class="text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg">
                                                    {{$evento->fecha_evento}} </span>
                                            </td>
                                            <td class="p-3 pr-12 text-end">
                                                <span
                                                    class="text-center align-baseline inline-flex px-4 py-3 mr-auto items-center font-semibold text-[.95rem] leading-none text-primary bg-primary-light rounded-lg">
                                                    {{$evento->estado}} </span>
                                            </td>
                                            <td class="p-3 pr-12 text-center">
                                                
                                                     <img src="{{$evento->pivot['qr']}}" alt="" class="w-[150px] h-[150px] object-cover">
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection
