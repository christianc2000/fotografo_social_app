<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body bg-white p-5">
                <form action="{{ route('medico_historial_store') }}" method="POST" enctype="multipart/form-data" id="formCita">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-4">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Crear Historial</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Registrar un nuevo historial</p>

                            <div class="sm:col-span-2">
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
                            </div>
                            <br>
                            <h3>Datos Medicos</h3>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="antecedentes"
                                        class="block text-sm font-medium leading-6 text-gray-900">Antecedentes</label>
                                    <div class="mt-2">
                                        <input type="text" name="antecedentes" id="antecedentes" autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('antecedentes')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="error_antecedentes"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="descripcion"
                                        class="block text-sm font-medium leading-6 text-gray-900">Descripcion</label>
                                    <div class="mt-2">
                                        <input type="text" name="descripcion" id="descripcion" autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('descripcion')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="error_descripcion"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                {{-- <div class="sm:col-span-3">
                                    <label for="date_cita"
                                        class="block text-sm font-medium leading-6 text-gray-900">Fecha de la cita</label>
                                    <div class="mt-2">
                                        <input type="datetime-local" name="date_cita" id="date_cita"
                                            autocomplete="family-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('date_cita')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="error_date_cita"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
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
                            <a href="{{ route('medico_historial_index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>
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
            var patient = document.getElementById('patient');
            var antecedentes = document.getElementById('antecedentes');
            var descripcion = document.getElementById('descripcion');

            var error_patient = document.getElementById('error_patient');
            var error_antecedentes = document.getElementById('error_antecedentes');
            var error_descripcion = document.getElementById('error_descripcion');

            error_patient.textContent = '';
            error_antecedentes.textContent = '';
            error_descripcion.textContent = '';
            
            $isError = false;
            if (patient.value.trim() === '') {
                error_patient.textContent = 'Este campo es obligatorio ';
                // return false; // Evitar que el formulario se envíe si hay errores
                $isError = true;
            }
            if (antecedentes.value.trim() === '') {
                error_antecedentes.textContent = 'Este campo es obligatorio';
                // return false; // Evitar que el formulario se envíe si hay errores
                $isError = true;
            }
            if (descripcion.value.trim() === '') {
                error_descripcion.textContent = 'Este campo es obligatorio';
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
