<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h3 class="text-lg font-medium text-gray-600 dark:text-white justify-center text-center">REGISTRAR FOTOGRAFO</h3>
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('plan.registrar.fotografo.store',$plan->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm text-gray-600">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    autocomplete="name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="lastname" class="block mb-2 text-sm text-gray-600">Apellido</label>
                <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required
                    autocomplete="lastname"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="biografia" class="block mb-2 text-sm text-gray-600">Biografia</label>
                <input type="text" id="biografia" name="biografia" value="{{ old('biografia') }}" required
                    autocomplete="biografia"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="slogan" class="block mb-2 text-sm text-gray-600">Slogan</label>
                <input type="text" id="slogan" name="slogan" value="{{ old('slogan') }}" required
                    autocomplete="slogan"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="fecha_nacimiento" class="block mb-2 text-sm text-gray-600">Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                    value="{{ old('fecha_nacimiento') }}" required autocomplete="fecha_nacimiento"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="genero" class="block mb-2 text-sm text-gray-600">Genero</label>
                <select name="genero" id="genero"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    <option value="M" selected>Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm text-gray-600">Correo</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required autocomplete="email" />
            </div>

            <div class="mb-4">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required autocomplete="new-password" />
            </div>

            <div class="mb-4">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="col-span-full">
                <label for="photo" class="block mb-2 text-sm text-gray-600">Foto</label>
                <div class="flex items-center gap-x-3">
                    <!-- component -->
                    <div class="flex items-center space-x-6">
                        <div class="shrink-0">
                            <img id="preview" class="h-16 w-16 object-fill rounded-full"
                                src="{{ asset('estilos_tecno/img/user_logo2.png') }}" alt="Current profile photo" />
                            @error('imagen')
                                <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                    {{ $message }}</div>
                            @enderror
                            <span id="errorImagen" class="error-message mt-1 text-sm leading-6 text-pink-600"></span>

                        </div>
                        <label class="block">
                            <span class="sr-only">Seleccionar foto de perfil</span>
                            <input type="file" id="imagen" name="imagen" accept="image/*"
                                class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-gray-500
                            hover:file:bg-violet-100" required />
                        </label>
                    </div>
                </div>
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Ya estás registrado?') }}
                </a>
              
                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>

    </x-authentication-card>
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
</x-guest-layout>