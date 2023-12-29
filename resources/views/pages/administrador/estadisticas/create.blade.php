<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body p-5">
                <center>
                    <div class="card-header d-inline">
                        <h1>Crear Consulta Para Graficar</h1>
                    </div>
                </center>
                <center>
                    <div class="card-body">
                        <form action="{{ route('estadistica.store') }}" method="POST" enctype="multipart/form-data"
                            id="create">
                            @include('pages.administrador.estadisticas.partials.form')
                        </form>
                    </div>
                </center>
                    <div class="card-footer pt-4">
                      <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"  form="create">Guardar</button>
                    </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
