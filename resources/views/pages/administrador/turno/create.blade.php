<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body p-5">
                <div class="dias" data-dias="<?php echo htmlspecialchars(json_encode($dias)); ?>" hidden></div>
                <form action="{{ route('turno.store') }}" method="POST" enctype="multipart/form-data" id="formServicio">
                    @csrf
                    <div class="space-y-6">
                        <div class="border-b border-gray-900/10 pb-4">
                            <h2 class="text-base font-semibold leading-7 text-gray-700">Crear turno de atención</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Registra el turno de atencion para un
                                personal</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                {{-- <div class="sm:col-span-3">
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
                                </div> --}}

                                <div class="sm:col-span-1">
                                    <label for="tipo" class="block text-sm font-medium leading-6 text-gray-900">Tipo
                                        de personal</label>
                                    <div class="mt-2">
                                        <select type="text" name="tipo" id="tipo" autocomplete="tipo"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="M" selected>Médico</option>
                                            <option value="E">Enfermera</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="servicio"
                                        class="block text-sm font-medium leading-6 text-gray-900">Servicio</label>
                                    <div class="mt-2">
                                        <select type="text" name="servicio" id="servicio" autocomplete="servicio"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @foreach ($servicios['MEDICO'] as $servicio)
                                                <option value="{{ $servicio['id'] }}">{{ $servicio['nombre'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="personal"
                                        class="block text-sm font-medium leading-6 text-gray-900">Personal</label>
                                    <div class="mt-2">
                                        <select type="text" name="personal" id="personal" autocomplete="personal"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @foreach ($personals->where('tipo', 'M') as $personal)
                                                <option value="{{ $personal->id }}">{{ $personal->name }}
                                                    {{ $personal->lastname }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="dia"
                                        class="block text-sm font-medium leading-6 text-gray-900">Día</label>
                                    <div class="mt-2">
                                        <select type="text" name="dia" id="dia"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="Lunes" selected>Lunes</option>
                                            <option value="Martes">Martes</option>
                                            <option value="Miércoles">Miercoles</option>
                                            <option value="Jueves">Jueves</option>
                                            <option value="Viernes">Viernes</option>
                                            <option value="Sábado">Sabado</option>
                                            <option value="Domingo">Domingo</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="horario" name="horario">
                                <div class="sm:col-span-2">
                                    <label for="turno_id"
                                        class="block text-sm font-medium leading-6 text-gray-900">Horario</label>
                                    <div class="mt-2">
                                        <select type="text" name="turno_id" id="turno_id" autocomplete="atencion"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                            @foreach ($dias['Lunes'] as $horario)
                                                <option value={{ $horario['id'] }}>{{ $horario['hora_inicio'] }} -
                                                    {{ $horario['hora_fin'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">

                                    <div class="mt-2 pt-5">
                                        <button type="button"
                                            class="add-tr rounded-md block w-full  bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Agregar</button>
                                    </div>
                                </div>

                            </div>
                            {{-- componente --}}
                            <!-- component -->
                            <label for="dia" class="block text-sm font-medium leading-6 text-gray-900 mt-4">
                                Horario del turno de atención
                            </label>
                            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mt-3">

                                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Día</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Horario
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        <tr>
                                            <td colspan="3" class="p-2 text-center">
                                                HORARIO VACIO
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{-- fin de componente --}}
                        </div>

                        <div class="mt-2 flex items-center justify-end gap-x-6">
                            <a href="{{route('turno.index')}}"
                                class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>
                            <button type="submit"
                                class="btn-save rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                        </div>
                </form>

            </div>
        </div>
    </div>

    {{-- JS --}}
    <script>
        var dias = $('.dias').data('dias');
        console.log(dias);
        $('#dia').change(function() {
            var dia = $(this).val(); // obtén el día seleccionado
            var turnos = dias[dia]; // obtén los turnos para ese día

            var $turnoId = $('#turno_id');
            $turnoId.empty(); // limpia las opciones existentes

            // agrega nuevas opciones basadas en los turnos recibidos
            $.each(turnos, function(index, turno) {
                $turnoId.append($('<option>').val(turno.id).text(turno.hora_inicio + ' - ' + turno
                    .hora_fin));
            });
        });

        //PARA CAMBIAR EL SELECT DE TIPO
        $(document).ready(function() {
            var horarios = [];
            $('#tipo').change(function() {
                var tipo = $(this).val();
                var servicios = @json($servicios);
                var personals = @json($personals);
                var t = ""
                if (tipo == "M") {
                    t = "MEDICO"
                }
                if (tipo == "E") {
                    t = "ENFERMERIA"
                }
                // Filtrar servicios y personals basado en el tipo seleccionado
                var filteredServicios = servicios[t];
                var filteredPersonals = personals.filter(function(personal) {
                    return personal.tipo === tipo;
                });

                // Actualizar el selector de servicios
                var servicioSelect = $('#servicio');
                servicioSelect.empty();
                $.each(filteredServicios, function(key, servicio) {
                    servicioSelect.append(new Option(servicio.nombre, servicio.id));
                });

                // Actualizar el selector de personal
                var personalSelect = $('#personal');
                personalSelect.empty();
                $.each(filteredPersonals, function(key, personal) {
                    personalSelect.append(new Option(personal.name + ' ' + personal.lastname,
                        personal.id));
                });
            });
            //PARA AÑADIR UN TR AL TABLE CUANDO AGREGUE UN HORARIO
            $('.add-tr').click(function() {
                var dia = $('#dia').val();
                var turno_id = $('#turno_id option:selected').val();
                horarios.push(turno_id);
                console.log("turno agregado: ", turno_id);
                var horario = $('#turno_id option:selected').text();
                var newRow = `<tr class="hover:bg-gray-50" id="${turno_id}">
                        <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="font-medium text-gray-700">${dia}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                ${horario}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                                <a x-data="{ tooltip: 'Delete' }" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="h-6 w-6"
                                                            x-tooltip="tooltip">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                </a>
                            </div>
                        </td>
                    </tr>`;

                $('tbody').append(newRow);
                checkTable();
            });
            //PARA ELIMINAR LA FILA
            $('table').on('click', 'a', function(e) {
                e.preventDefault();
                var horario = $(this).closest('tr').attr('id');
                console.log("horario: ", horario);
                var index = horarios.indexOf(horario); // Encontrar el índice del horario en el array
                if (index > -1) {
                    horarios.splice(index, 1); // Eliminar el horario del array
                }
                console.log(horarios);
                $(this).closest('tr').remove();
                checkTable();
            });
            checkTable();
            //PARA VERIFICAR SI LA TABLA ESTÁ VACÍA
            function checkTable() {
                if ($('tbody tr').length > 1) { // Si hay más de una fila (excluyendo la fila de "HORARIO VACIO")
                    $('tbody tr:first').hide(); // Oculta la fila de "HORARIO VACIO"
                } else {
                    $('tbody tr:first').show(); // Muestra la fila de "HORARIO VACIO"
                }
            }
            //PARA ENVIAR EL FORMULARIO
            $('.btn-save').click(function(e) {
                e.preventDefault();
                if (horarios.length === 0) { // Si el array de horarios está vacío
                    alert('No se puede guardar con horario vacío'); // Mostrar una alerta
                } else {
                    $('#horario').val(JSON.stringify(
                    horarios)); // Convertir el array a una cadena JSON y cargarla en el input oculto
                   
                    $('select[name=tipo], select[name=dia], select[name=turno_id]').prop('disabled', true);
                     $('#formServicio').submit(); // Enviar el formulario
                }
            });
        });
    </script>
</x-app-layout>
