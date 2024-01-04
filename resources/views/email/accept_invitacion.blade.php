@extends('layouts.appfotografia')

@section('contenido')
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="col-span-full">
            <div
                class="w-full rounded-md border-2 border-emerald-400 py-1.5 px-3 bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                <form method="POST" action="{{ route('email.accept', $evento->id) }}">
                    @csrf

                    <div class="col-span-full mb-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 p-4">
                            <label for="tipo_entrega"
                                class="block w-full col-span-full text-lg leading-2 font-medium text-gray-700 dark:text-white">¿Aceptar
                                invitación?</label>
                            <label>
                                <input type="radio" value="si" class="peer hidden" name="accept" checked>
                                <div
                                    class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                    <h2 class="font-medium text-gray-700">Aceptar</h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-9 h-9 text-blue-600 invisible group-[.peer:checked+&]:visible">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </label>
                            <label>
                                <input type="radio" value="no" class="peer hidden" name="accept">
                                <div
                                    class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                    <h2 class="font-medium text-gray-700">Rechazar</h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-9 h-9 text-blue-600 invisible group-[.peer:checked+&]:visible">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="mt-2 flex items-center justify-end gap-x-6">
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enviar
                            Respuesta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
