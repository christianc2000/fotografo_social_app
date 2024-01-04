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
@php
    $orden = json_decode($orden);
@endphp

<body>
    <h1>Fotografia Social</h1>
    <div class="subtitle">Orden: {{ str_replace('_', ' ', $orden->id) }}</div>
    <div class="subtitle">Total: {{ str_replace('_', ' ', $orden->total) }}</div>

    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Cantidad de imágenes</th>
                <th>Fecha de entrega</th>
                <th>total</th>
                <th>Pago</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ str_replace('_', ' ', $orden->tipo_entrega) }}</td>
                <td>{{ $cantidad }}</td>
                <td style="text-align: center; vertical-align: middle;">
                    @if (isset($orden->fecha_entrega))
                        {{ str_replace('_', ' ', $orden->fecha_entrega) }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ str_replace('_', '.', $orden->total) }}</td>

                <td>{{ $orden->fecha_orden ? 'Pagado' : 'Impago' }}</td>
            </tr>
        </tbody>
    </table>

    <div class="details">
        <p>fecha emision: {{ $orden->created_at }}</p>
        {{-- <p>Persona de Contacto: Nombre Apellido</p> --}}
    </div>

</body>

</html>
