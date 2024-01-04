@extends('layouts.appfotografia')
@section('contenido')
    <!-- component -->
    <section class="py-20 relative z-50">
        <div class="container">
            <div class="mx-auto max-w-2xl sm:text-center">
                <span class="font-medium text-gray-400 tracking-widest">Nuestros precios de plan para organizadores</span>
                <h2 class="md:text-5xl text-3xl font-medium tracking-tight mt-7">Precios de los planes</h2>
                <div class="w-10 mx-auto mt-5 bg-gradient-to-r from-cyan-500 to-blue-500 h-[2px]"></div>
                {{-- <p class="mt-6 text-xl/8 text-gray-600 dark:text-gray-400">Choose the plan that suits your needs best and
                    enjoy the creative process of brainstorming the new project of yours.</p> --}}
            </div>

            <div class="grid lg:grid-cols-3 grid-cols-1 gap-10 2xl:px-28 mt-20">
                @php
                    $c = 0;
                @endphp
                @foreach ($plans as $plan)
                    
                        <div class="flex flex-col border border-gray-300 rounded-xl overflow-hidden dark:border-gray-700">
                            <div class="text-center pt-10">
                                <h5 class="text-xl font-semibold">{{$plan->nombre}}</h5>
                                <h2 class="text-5xl mt-8 mb-3 items-center align-middle">
                                    <sup class="text-2xl align-middle">Bs</sup>{{$plan->costo}}
                                </h2>
                                <span>{{$plan->meses}} mes</span>
                            </div>

                            <div class="p-10">
                                <ul class="mb-10 text-center">
                                    <li class="my-4">
                                        <h5 class="font-medium dark:text-gray-300">{{$plan->descripcion}}</h5>
                                    </li>
                                </ul>
                                <div class="flex justify-center">
                                    <a href="{{route('plan.registrar.organizador',$plan->id)}}"
                                        class="py-3 px-6 font-medium border rounded-md border-purple-500 text-purple-500 hover:bg-purple-500 hover:text-white transition-all duration-500">Suscribirse</a>
                                </div>
                            </div>
                        </div>
                   
                @endforeach
            </div>
            <h5 class="text-center font-medium mt-14">¿Desea los planes para Fotografo? <a href="{{route('plan.fotografo')}}"
                    class="text-purple-500">Presionar aquí</a></h5>
        </div>
    </section>
@endsection
