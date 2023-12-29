<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .subtitle {
            text-align: center;
            font-style: italic;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .details {
            margin-top: 30px;
            text-align: center;
        }

        .details p {
            margin: 5px 0;
        }
    </style>
    <title>Tabla Estilizada con Subtítulo</title>
</head>

<body>
    <h1>Consultorio San Santiago</h1>
    <div class="subtitle">Historia Clinica</div>
    <div class="subtitle">Ficha de identificacion</div>
    <table>
        <thead>

        </thead>
        <tbody>

            <tr>
                <td>Nombre</td>
                <td>: {{ $paciente->name }} {{ $paciente->lastname }}</td>
                {{-- <td></td>
                <td></td> --}}
                <td>Sexo</td>
                <td>: {{ $paciente->genero == 'M' ? 'Masculino' : 'Femenino' }}</td>
            </tr>
            <tr>
                <td>Residencia</td>
                <td>: {{ $paciente->residencia_actual }}</td>
                <td>Email</td>
                <td>: {{ $paciente->email }}</td>
            </tr>
            <tr>
                <td>Celular</td>
                <td>: {{ $paciente->celular }}</td>
                <td>Fecha de nacimiento</td>
                <td>: {{ $paciente->birth_date }}</td>
            </tr>
            <tr>
                <td>Ci</td>
                <td>: {{ $paciente->ci }}</td>
                <td>Ocupacion</td>
                <td>: {{ $paciente->ocupacion }}</td>
            </tr>
        </tbody>
    </table>
    <h2>Antecedentes personales</h2>
    <table>
        <thead>

        </thead>
        <tbody>
            @foreach ($datos_medicos as $item)
                <tr>
                    <td>{{ $item->titulo }}</td>
                    <td>: {{ $item->detalle }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Consultas realizadas</h2>
    <table>
        <thead>
            <tr>
                <th>fecha</th>
                <th>Motivo</th>
                <th>Examen Fisico</th>
                <th>Observacion</th>
                <th>Diagnostico</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $item)
                <tr>
                    <td>{{substr($item->fecha, 0, 10)  }}</td>
                    <td>{{ $item->motivo }}</td>
                    <td>{{ $item->examen_fisico }}</td>
                    <td>{{ $item->observaciones }}</td>
                    <td>{{ $item->diagnostico }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <table>
    <thead>
        <tr>
            <th>Servicio</th>
            <th>Fecha atencion</th>
            <th>Costo de servicio</th>
            <th>Descuento</th>
            <th>total</th>
            <th>Pago</th>

        </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{str_replace('_', ' ', $orden->servicio)}}</td>
                <td>{{$orden->fecha_atencion}}</td>
                <td>{{$orden->costo_servicio}}</td>
                <td>{{str_replace('_', '.', $orden->descuento)}}</td>
                <td>{{str_replace('_', '.', $orden->costo)}}</td>
                <td>{{$orden->pagado? 'Pagado' : 'Impago'}}</td>
            </tr>
    </tbody>
</table> --}}

    <div class="details">
        {{-- <p>fecha emision: {{$orden->fecha_emision}}</p> --}}
        {{-- <p>Persona de Contacto: Nombre Apellido</p> --}}
    </div>

</body>

</html>
