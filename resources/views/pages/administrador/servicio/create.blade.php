<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-bodyp-5">
                <form action="{{ route('servicio.store') }}" method="POST" enctype="multipart/form-data" id="formServicio">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-4">
                            <h2 class="text-base font-semibold leading-7 text-gray-700">Crear servicio</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Registrar un nuevo servicio.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="nombre"
                                        class="block text-sm font-medium leading-6 text-gray-900">Nombre del
                                        servicio</label>
                                    <div class="mt-2">
                                        <input type="text" name="nombre" id="nombre" autocomplete="given-nombre"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('nombre')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorNombre"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="costo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Costo</label>
                                    <div class="mt-2">
                                        <input type="number" name="costo" id="costo" autocomplete="given-costo"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('costo')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorCosto"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="forma_compra"
                                        class="block text-sm font-medium leading-6 text-gray-900">Forma de
                                        compra</label>
                                    <div class="mt-2">
                                        <select type="text" name="forma_compra" id="forma_compra"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="ONLINE" selected>Online</option>
                                            <option value="CAJA">Caja</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="atencion"
                                        class="block text-sm font-medium leading-6 text-gray-900">Atención</label>
                                    <div class="mt-2">
                                        <select type="text" name="atencion" id="atencion" autocomplete="atencion"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="MEDICO" selected>Médica</option>
                                            <option value="ENFERMERIA">Enfermería</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="photo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Imagen</label>
                                    <div class="mt-2 flex items-center gap-x-3">
                                        <!-- component -->
                                        <div class="flex items-center space-x-6">
                                            <div class="shrink-0">
                                                <img id="preview" class="h-16 w-16 object-cover rounded-full"
                                                    src="{{ asset('estilos_tecno/img/sin_img.png') }}"
                                                    alt="Current servicio photo" />
                                                @error('imagen')
                                                    <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                        {{ $message }}</div>
                                                @enderror
                                                <span id="errorImagen"
                                                    class="error-message mt-1 text-sm leading-6 text-pink-600"></span>

                                            </div>
                                            <label class="block">
                                                <span class="sr-only">Seleccionar foto de servicio</span>
                                                <input type="file" id="imagen" name="imagen" accept="image/*"
                                                    class="block w-full text-sm text-slate-500
                                                file:mr-4 file:py-2 file:px-4
                                                file:rounded-full file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-violet-50 file:text-gray-500
                                                hover:file:bg-violet-100
                                              " />

                                            </label>
                                        </div>


                                        {{-- <div class="bg-white p7 rounded w-9/12 mx-auto">
                                         
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 flex items-center justify-end gap-x-6">
                            <a href="{{route('servicio.index')}}"
                            class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>
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
        const inputPhoto = document.getElementById('imagen');
        const previewImage = document.getElementById('preview');
        //const noImageText = document.getElementById('noImageText');

        inputPhoto.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImage.style.display = 'block';
                    previewImage.src = event.target.result;
                    //noImageText.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.style.display = 'none';
                noImageText.style.display = 'block';
            }
            // Para validar inputs

        });
    </script>
    <script>
        document.getElementById('formServicio').addEventListener('submit', function(e) {
            e.preventDefault(); // Previene el envío del formulario
            console.log("EJECUTA EL VALIDAR FORMULARIO")
            var nombreInput = document.getElementById('nombre');
            var costoInput = document.getElementById('costo');
            var imagenInput = document.getElementById('imagen');

            var errorNombre = document.getElementById('errorNombre');
            var errorCosto = document.getElementById('errorCosto');
            var errorImagen = document.getElementById('errorImagen');
            console.log(errorNombre);
            console.log(errorCosto);
            // Restablecer mensajes de error
            errorNombre.textContent = '';
            errorCosto.textContent = '';
            errorImagen.textContent = '';
           
            // Validar el nombre (puede agregar más condiciones según sea necesario)
            if (nombreInput.value.trim() === '') {
                errorNombre.textContent = 'Por favor ingrese el nombre del servicio';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (costoInput.value.trim() === '') {
                errorCosto.textContent = 'Por favor ingrese el costo del servicio';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (imagenInput.value.trim() === '') {
                errorImagen.textContent = 'Por favor ingrese una imagen al servicio';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            // Si la validación pasa, el formulario se enviará
           console.log("enviar");
            this.submit();

        });
    </script>
</x-app-layout>
