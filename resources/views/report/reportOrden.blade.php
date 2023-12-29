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

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
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
<div class="subtitle">Dirección de la Empresa: {{str_replace('_', ' ', $orden->direccion_consultorio)}}</div>

<table>
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
</table>

<div class="details">
    <p>fecha emision: {{$orden->fecha_emision}}</p>
    {{-- <p>Persona de Contacto: Nombre Apellido</p> --}}
</div>

</body>
</html>
