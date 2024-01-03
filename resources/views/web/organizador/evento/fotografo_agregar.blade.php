<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body p-5">
                <!-- component -->
                <section class="container px-4 mx-auto py-2">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Agregar Fotografo</h2>


                                @if ($evento->estado == \App\Models\Evento::VIGENTE)
                                    <span
                                        class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                                        Vigente
                                    </span>
                                @elseif($evento->estado == \App\Models\Evento::CURSO)
                                    <span
                                        class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                                        En curso
                                    </span>
                                @elseif($evento->estado == \App\Models\Evento::FINALIZADO)
                                    <span
                                        class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                                        Finalizado
                                    </span>
                                @elseif($evento->estado == \App\Models\Evento::CANCELADO)
                                    <span
                                        class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                                        Cancelado
                                    </span>
                                @endif

                            </div>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Enviar invitación para que el
                                fotografo participe del evento {{ $evento->titulo }}</p>
                        </div>

                    </div>
                    <div class="space-y-4">
                        <form action="{{ route('organizacion.evento.fotografos.agregar.store', $evento->id) }}" method="POST">
                            @csrf
                            <div class="border-b border-gray-900/10 pb-4">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                    <div class="col-span-full">
                                        <label for="tipo"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">Fotografos</label>
                                        <div class="mt-2">
                                           
                                            <select type="text" name="fotografo_id" id="fotografo_id"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                @foreach ($fotografosSinEvento as $fotografo)
                                                    <option value="{{ $fotografo->id }}" selected>{{ $fotografo->name }}
                                                        {{ $fotografo->lastname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-2 flex items-center justify-end gap-x-6">
                                <a href="{{ route('organizador.evento.fotografos.index', $evento->id) }}"
                                    class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancelar</a>

                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
