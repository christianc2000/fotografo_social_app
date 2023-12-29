@csrf

<div class="sm:col-span-2">
    <label for="table" class="block text-sm font-medium leading-6 text-gray-900">Elegir datos a
        graficar</label>
    <div class="mt-2">
        <select type="text" name="table" id="table"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <option value="ordens">Comprobantes</option>
            <option value="consultas">Consultas Realizadas</option>
            <option value="citas">Citas Realizadas</option>
        </select>
    </div>
</div>

<div class="sm:col-span-3">
    <label for="fecha_ini" class="block text-sm font-medium leading-6 text-gray-900">Fecha de inicio</label>
    <div class="mt-2">
        <input type="date" name="fecha_ini" id="fecha_ini" autocomplete="family-name"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        @error('fecha_ini')
            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                {{ $message }}</div>
        @enderror
        <span id="errorFechaIni" class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
    </div>
</div>

<div class="sm:col-span-3">
    <label for="fecha_fin" class="block text-sm font-medium leading-6 text-gray-900">Fecha de fin</label>
    <div class="mt-2">
        <input type="date" name="fecha_fin" id="fecha_fin" autocomplete="family-fecha_fin"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        @error('birth_date')
            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                {{ $message }}</div>
        @enderror
        <span id="errorFechaFin" class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
    </div>
</div>
