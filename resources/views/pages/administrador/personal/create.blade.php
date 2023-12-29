<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body p-5">
                <form action="{{ route('personal.store') }}" method="POST" enctype="multipart/form-data" id="formPersonal">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-4">
                            <h2 class="text-base font-semibold leading-7 text-gray-700">Crear personal</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Registrar un nuevo médico o enfermera/o.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="ci"
                                        class="block text-sm font-medium leading-6 text-gray-900">CI</label>
                                    <div class="mt-2">
                                        <input type="text" name="ci" id="ci" autocomplete="given-ci"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('ci')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorCi"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="name"
                                        class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('name')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorName"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="lastname"
                                        class="block text-sm font-medium leading-6 text-gray-900">Apellido</label>
                                    <div class="mt-2">
                                        <input type="text" name="lastname" id="lastname" autocomplete="family-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('lastname')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorLastname"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="birth_date"
                                        class="block text-sm font-medium leading-6 text-gray-900">Fecha de
                                        nacimiento</label>
                                    <div class="mt-2">
                                        <input type="date" name="birth_date" id="birth_date"
                                            autocomplete="family-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('birth_date')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorBirthdate"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="celular";
                                        class="block text-sm font-medium leading-6 text-gray-900">Celular</label>
                                    <div class="mt-2">
                                        <input type="number" name="celular"; id="celular"; autocomplete="family-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('celular')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorCelular"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="correo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Correo</label>
                                    <div class="mt-2">
                                        <input type="email" name="email" id="email" autocomplete="correo"
                                            class="peer block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('email')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorCorreo"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                        <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                                            Por favor, introduzca un dirección de correo válida.
                                        </p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="tipo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Personal</label>
                                    <div class="mt-2">
                                        <select type="text" name="tipo" id="tipo"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="M" selected>Médico</option>
                                            <option value="E">Enfermería</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="genero"
                                        class="block text-sm font-medium leading-6 text-gray-900">Género</label>
                                    <div class="mt-2">
                                        <select type="text" name="genero" id="genero" autocomplete="genero"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="M" selected>Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="residencia"
                                        class="block text-sm font-medium leading-6 text-gray-900">Lugar de
                                        residencia</label>
                                    <div class="mt-2">
                                        <input type="text" name="residencia" id="residencia"
                                            autocomplete="residencia"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('residencia_actual')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorResidencia"
                                            class="error-message error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="sueldo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Sueldo</label>
                                    <div class="mt-2">
                                        <input type="number" name="sueldo" id="sueldo" autocomplete="sueldo"
                                            class="peer block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('sueldo')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorSueldo"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>

                                    </div>
                                </div>
                                <div class="sm:col-span-4">
                                    <label for="formacion"
                                        class="block text-sm font-medium leading-6 text-gray-900">Formación</label>
                                    <div class="mt-2">
                                        <input type="text" name="formacion" id="formacion"
                                            autocomplete="formacion"
                                            class="peer block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('formacion')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorFormacion"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>




                                <div class="col-span-full">
                                    <label for="photo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Foto</label>
                                    <div class="mt-2 flex items-center gap-x-3">
                                        <!-- component -->
                                        <div class="flex items-center space-x-6">
                                            <div class="shrink-0">
                                                <img id="preview" class="h-16 w-16 object-cover rounded-full"
                                                    src="{{ asset('estilos_tecno/img/user_logo2.png') }}"
                                                    alt="Current profile photo" />
                                                @error('imagen')
                                                    <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                        {{ $message }}</div>
                                                @enderror
                                                <span id="errorImagen"
                                                    class="error-message mt-1 text-sm leading-6 text-pink-600"></span>

                                            </div>
                                            <label class="block">
                                                <span class="sr-only">Seleccionar foto de perfil</span>
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
                            <a href="{{ route('personal.index') }}"
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
        document.getElementById('formPersonal').addEventListener('submit', function(e) {
            e.preventDefault(); // Previene el envío del formulario
            console.log("EJECUTA EL VALIDAR FORMULARIO")
            var ciInput = document.getElementById('ci');
            var nameInput = document.getElementById('name');
            var lastnameInput = document.getElementById('lastname');
            var birth_dateInput = document.getElementById('birth_date');
            var celularInput = document.getElementById('celular');
            var tipoInput = document.getElementById('tipo');
            var generoInput = document.getElementById('genero');
            var residenciaInput = document.getElementById('residencia');
            var correoInput = document.getElementById('email');
            var imagenInput = document.getElementById('imagen');
            var sueldoInput = document.getElementById('sueldo');
            var formacionInput = document.getElementById('formacion');

            var errorCi = document.getElementById('errorCi');
            var errorName = document.getElementById('errorName');
            var errorLastname = document.getElementById('errorLastname');
            var errorBirthdate = document.getElementById('errorBirthdate');
            var errorCelular = document.getElementById('errorCelular');
            var errorResidencia = document.getElementById('errorResidencia');
            var errorCorreo = document.getElementById('errorCorreo');
            var errorImagen = document.getElementById('errorImagen');
            var errorSueldo = document.getElementById('errorSueldo');
            var errorFormacion = document.getElementById('errorFormacion');
            console.log(errorName);
            console.log(errorLastname);
            // Restablecer mensajes de error
            errorName.textContent = '';
            errorLastname.textContent = '';
            errorBirthdate.textContent = '';
            errorLastname.textContent = '';
            errorCelular.textContent = '';
            errorResidencia.textContent = '';
            errorCorreo.textContent = '';
            errorImagen.textContent = '';
            errorSueldo.textContent = '';
            errorFormacion.textContent = '';
            // Validar el nombre (puede agregar más condiciones según sea necesario)
            if (ciInput.value.trim() === '') {
                errorCi.textContent = 'Por favor ingrese su número de carnet';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (nameInput.value.trim() === '') {
                errorName.textContent = 'Por favor ingrese su nombre';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (lastnameInput.value.trim() === '') {
                errorLastname.textContent = 'Por favor ingrese su apellido';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (birth_dateInput.value.trim() === '') {
                errorBirthdate.textContent = 'Por favor ingrese su fecha de nacimiento';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (celularInput.value.trim() === '') {
                errorCelular.textContent = 'Por favor ingrese su número de celular';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (correoInput.value.trim() === '') {
                errorCorreo.textContent = 'Por favor ingrese su correo';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (residenciaInput.value.trim() === '') {
                errorResidencia.textContent = 'Por favor ingrese su residencia';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (sueldoInput.value.trim() === '') {
                errorSueldo.textContent = 'Por favor ingrese su sueldo';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (formacionInput.value.trim() === '') {
                errorFormacion.textContent = 'Por favor ingrese su formación';
                return false; // Evitar que el formulario se envíe si hay errores
            }
            if (imagenInput.value.trim() === '') {
                errorImagen.textContent = 'Por favor ingrese su foto de perfil';
                return false; // Evitar que el formulario se envíe si hay errores
            }



            // Si la validación pasa, el formulario se enviará
            this.submit();

        });
    </script>
</x-app-layout>
