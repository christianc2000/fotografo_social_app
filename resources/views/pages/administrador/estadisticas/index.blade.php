@extends('app')
@section('content')
    <br>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
    <div class="card mt-3">
        <center>
            <div class="card-header d-inline">
                <h1>FICHAS</h1>
            </div>
        </center>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <a class="navbar-brand">Listar</a>
                        <select class="form-select" id="limit" name="limit">
                            @foreach ([10, 20, 50, 100] as $limit)
                                <option value="{{ $limit }}"
                                    @if (isset($_GET['limit'])) {{ $_GET['limit'] == $limit ? 'selected' : '' }} @endif>
                                    {{ $limit }}</option>
                            @endforeach
                        </select>
                        <?php
                        if (isset($_GET['page'])) {
                            $pag = $_GET['page'];
                        } else {
                            $pag = 1;
                        }
                        if (isset($_GET['limit'])) {
                            $limit = $_GET['limit'];
                        } else {
                            $limit = 10;
                        }
                        $comienzo = $limit;
                        ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <a class="navbar-brand">Buscar</a>
                        <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search"
                            aria-label="Search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                    </div>
                </div>
                <div class="col-1">
                    <a href="{{ route('fichas.create') }}">
                        <i class="fas fa-plus"></i>
                        Agregar</a>
                </div>
                @if ($fichas->total() > 10)
                    {{ $fichas->links() }}
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Paciente</th>
                            <th>Doctor</th>
                            <th>Servicio</th>
                            <th>Room</th>
                            <th>Costo Bs</th>
                            <th>Fecha de Registro</th>
                            <th>Recepcionista</th>
                            <th>Control</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $valor = 1;
                        if ($pag != 1) {
                            $valor = $comienzo + 1;
                        }
                        //$valor = 1;
                        ?>
                        @foreach ($fichas as $ficha)
                            <tr>
                                <th scope="row">{{ $valor++ }}</th>
                                <td>{{ $ficha->code }}</td>
                                <td>{{ $ficha->patient_name }}</td>
                                <td>{{ $ficha->doctor_name }}</td>
                                <td>{{ $ficha->service_name }}</td>
                                <td>{{ $ficha->room_name }}</td>
                                <td>{{ $ficha->cost }}</td>
                                <td>{{ $ficha->registration_date }}</td>
                                <td>{{ $ficha->reception_name }}</td>
                                @if ($ficha->control == true)
                                    <td>Terminado</td>
                                @else
                                    <td>Sin Terminar</td>
                                @endif
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <div class="container">
                                            <a href="{{ route('fichas.show', $ficha->code) }}"><i
                                                    class="fas fa-eye"></i></a>
                                        </div>
                                        <div class="container">
                                        <a href="{{ route('fichas.edit', $ficha->code) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="container">
                                        <button type="submit" form="delete_{{ $ficha->code }}"
                                            onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form action="{{ route('fichas.destroy', $ficha->code) }}"
                                            id="delete_{{ $ficha->code }}" method="POST" enctype="multipart/form-data"
                                            hidden>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            @if ($fichas->total() > 10)
                {{ $fichas->links() }}
            @endif
        </div>
    </div>
    </div>
    <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('fichas.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('fichas.index') }}?limit=" + $('#limit').val() + '&search=' +
                    $(this).val()
            }
        })
    </Script>
@endsection
