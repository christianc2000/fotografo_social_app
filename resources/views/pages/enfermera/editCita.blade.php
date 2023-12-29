<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body bg-white p-5">

                <form action="{{ route('enfermeria.citas.update', $cita) }}" method="POST" enctype="multipart/form-data" id="formPersonal">
                    @csrf
                    @method('PUT')
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-4">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Editar Cita</h2>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="fecha_cita" class="block text-sm font-medium leading-6 text-gray-900">Fecha de cita</label>
                                    <div class="mt-2">
                                        <input type="date" name="fecha_cita" id="fecha_cita" value="{{ \Carbon\Carbon::parse($cita->fecha_cita)->format('Y-m-d') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('fecha_cita')
                                        <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <span id="errorFechaCita" class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="costo_cita" class="block text-sm font-medium leading-6 text-gray-900">Estado Cita</label>
                                    <div class="mt-2">
                                        <select name="costo_cita" id="costo_cita" autocomplete="costo_cita" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="50.0" @if($cita->costo_cita == 50.0) selected @endif>50.0</option>
                                            <option value="100.0" @if($cita->costo_cita == 100.0) selected @endif>100.0</option>
                                            <option value="150.0" @if($cita->costo_cita == 150.0) selected @endif>150.0</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="estado_cita" class="block text-sm font-medium leading-6 text-gray-900">Estado Cita</label>
                                    <div class="mt-2">
                                        <select name="estado_cita" id="estado_cita" autocomplete="estado_cita" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="1" @if($cita->estado_cita == 1) selected @endif>Activo</option>
                                            <option value="0" @if($cita->estado_cita == 0) selected @endif>DesActivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="paciente" class="block text-sm font-medium leading-6 text-gray-900">Paciente</label>
                                    <div class="mt-2">
                                        <select name="paciente" id="paciente" autocomplete="paciente" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @foreach ($users as $user)
                                            <!-- Usar el ID del usuario como valor y el nombre como etiqueta -->
                                            <option value="{{ $user->id }}" @if($user->id == $cita->paciente_id) selected @endif>{{ $user->name }}  {{$user->lastname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="sm:col-span-2">
                                    <label for="medico" class="block text-sm font-medium leading-6 text-gray-900">Medico</label>
                                    <div class="mt-2">
                                        <select type="text" name="medico" id="medico" autocomplete="medico" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @foreach ($medicos as $medico)
                                            <!-- Usar el ID del usuario como valor y el nombre como etiqueta -->
                                            
                                            <option value="{{ $medico->id }}" @if($medico->id == $cita->medico_id) selected @endif>{{ $medico->name }}  {{$medico->lastname}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="mt-2 flex items-center justify-end gap-x-6">
                            <a href="{{route('enfermeria.citas.index')}}" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Actualizar</button>
                        </div>
                </form>

            </div>
        </div>

    </div>

    {{-- js --}}

    <script>
        document.getElementById('formPersonal').addEventListener('submit', function(e) {
            e.preventDefault(); // Previene el envío del formulario
            console.log("EJECUTA EL VALIDAR FORMULARIO")
            var fechaInput = document.getElementById('fecha_cita');
            var estadoInput = document.getElementById('estado_cita');
            var pacienteInput = document.getElementById('paciente');
            var medicoInput = document.getElementById('medico');

            var errorFechaCita = document.getElementById('errorFechaCita');


            errorFechaCita.textContent = '';

            // Validar el nombre (puede agregar más condiciones según sea necesario)
            if (fechaInput.value.trim() === '') {
                errorFechaCita.textContent = 'Por favor ingrese su la fecha de la cita';
                return false; // Evitar que el formulario se envíe si hay errores
            }

            // Si la validación pasa, el formulario se enviará
            this.submit();

        });
    </script>
</x-app-layout>