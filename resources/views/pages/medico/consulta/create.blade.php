<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body bg-white p-5">
                <form action="{{ route('medico_consulta_store') }}" method="POST" enctype="multipart/form-data" id="formCita">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-4">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Crear Consulta</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Registrar una nueva consulta</p>

                            {{-- <div class="sm:col-span-2">
                                <label for="patient"
                                    class="block text-sm font-medium leading-6 text-gray-900">Paciente</label>
                                <div class="mt-2">
                                    <select name="patient" id="patient"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente['id'] }}">{{ $paciente['name'] }} {{ $paciente['lastname'] }}</option>
                                        @endforeach
                                    </select>
                                    <span id="error_patient"
                                        class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                </div>
                            </div> --}}
                            <br>
                            <h3>Datos Medicos</h3>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3" hidden>
                                    <label for="historial_id"
                                        class="block text-sm font-medium leading-6 text-gray-900">historial id</label>
                                    <div class="mt-2">
                                        <input type="text" name="historial_id" id="historial_id" autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            value="{{$historial_id}}">
                                        @error('historial_id')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="error_historial_id"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="motivo"
                                        class="block text-sm font-medium leading-6 text-gray-900">motivo</label>
                                    <div class="mt-2">
                                        <input type="text" name="motivo" id="motivo" autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('motivo')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="error_motivo"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="examen_fisico"
                                        class="block text-sm font-medium leading-6 text-gray-900">Examen fisico</label>
                                    <div class="mt-2">
                                        <input type="text" name="examen_fisico" id="examen_fisico" autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('examen_fisico')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="error_examen_fisico"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="observaciones"
                                        class="block text-sm font-medium leading-6 text-gray-900">Observaciones</label>
                                    <div class="mt-2">
                                        <input type="text" name="observaciones" id="observaciones" autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('observaciones')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="error_observaciones"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="diagnostico"
                                        class="block text-sm font-medium leading-6 text-gray-900">Diagnostico</label>
                                    <div class="mt-2">
                                        <input type="text" name="diagnostico" id="diagnostico" autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('diagnostico')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="error_diagnostico"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="date_consulta"
                                        class="block text-sm font-medium leading-6 text-gray-900">Fecha de la Consulta</label>
                                    <div class="mt-2">
                                        <input type="datetime-local" name="date_consulta" id="date_consulta"
                                            autocomplete="family-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('date_consulta')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="error_date_consulta"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                {{-- <div class="sm:col-span-2">
                                    <label for="costo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Costo</label>
                                    <div class="mt-2">
                                        <input type="number" name="costo" id="costo" autocomplete="costo"
                                            class="peer block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('costo')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="error_costo"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>

                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <div class="mt-2 flex items-center justify-end gap-x-6">
                            <a href="{{ route('medico_consulta_index', ['historial_id'=> $historial_id]) }}" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>
                            {{-- <button type="button"
                                class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button> --}}
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    {{-- js --}}
    <script>
        // Para mostrar las imágenes cargadas en el input file
        // const inputPhoto = document.getElementById('imagen');
        // const previewImage = document.getElementById('preview');
        // const noImageText = document.getElementById('noImageText');

        // inputPhoto.addEventListener('change', function() {
        //     const file = this.files[0];
        //     if (file) {
        //         const reader = new FileReader();
        //         reader.onload = function(event) {
        //             previewImage.style.display = 'block';
        //             previewImage.src = event.target.result;
        //             noImageText.style.display = 'none';
        //         };
        //         reader.readAsDataURL(file);
        //     } else {
        //         previewImage.style.display = 'none';
        //         noImageText.style.display = 'block';
        //     }
        //     // Para validar inputs

        // });
    </script>
    <script>
        document.getElementById('formCita').addEventListener('submit', function(e) {
            e.preventDefault(); // Previene el envío del formulario
            console.log("EJECUTA EL VALIDAR FORMULARIO")
            var motivo = document.getElementById('motivo');
            var examen_fisico = document.getElementById('examen_fisico');
            var observaciones = document.getElementById('observaciones');
            var diagnostico = document.getElementById('diagnostico');
            var date_consulta = document.getElementById('date_consulta');

            var error_motivo = document.getElementById('error_motivo');
            var error_examen_fisico = document.getElementById('error_examen_fisico');
            var error_observaciones = document.getElementById('error_observaciones');
            var error_diagnostico = document.getElementById('error_diagnostico');
            var error_date_consulta = document.getElementById('error_date_consulta');

            error_motivo.textContent = '';
            error_examen_fisico.textContent = '';
            error_observaciones.textContent = '';
            error_diagnostico.textContent = '';
            error_date_consulta.textContent = '';
            
            $isError = false;
            if (date_consulta.value.trim() === '') {
                error_date_consulta.textContent = 'Este campo es obligatorio ';
                // return false; // Evitar que el formulario se envíe si hay errores
                $isError = true;
            }
            if (diagnostico.value.trim() === '') {
                error_diagnostico.textContent = 'Este campo es obligatorio';
                // return false; // Evitar que el formulario se envíe si hay errores
                $isError = true;
            }
            if (observaciones.value.trim() === '') {
                error_observaciones.textContent = 'Este campo es obligatorio';
                // return false; // Evitar que el formulario se envíe si hay errores
                $isError = true;
            }
            if (examen_fisico.value.trim() === '') {
                error_examen_fisico.textContent = 'Este campo es obligatorio';
                // return false; // Evitar que el formulario se envíe si hay errores
                $isError = true;
            }
            if (motivo.value.trim() === '') {
                error_motivo.textContent = 'Este campo es obligatorio';
                // return false; // Evitar que el formulario se envíe si hay errores
                $isError = true;
            }

            if($isError){
                return;
            }
            // Si la validación pasa, el formulario se enviará
            this.submit();

        });
    </script>
</x-app-layout>
