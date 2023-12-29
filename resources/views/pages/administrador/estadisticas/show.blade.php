@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <center>
                <div class="card-header d-inline">
                    <h1>Grafica - Cantidad de {{$nombre}}</h1>
                </div>
            </center>
            <div class="card-header d-inline-flex">
                <a href="{{ route('estadisticas.create') }}">
                    <i class="fas fa-arrow-left"></i>
                    Volver</a>
            </div>
            <div class="card-body">
                <!-- Crea el lienzo para la gráfica -->
                <canvas id="myChart"></canvas>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
    <!-- Incluye la biblioteca de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Obtiene los datos preparados para Chart.js
        var dates = <?php echo json_encode($timestamps); ?>;
        var quantities = <?php echo json_encode($values); ?>;
        var nombre = <?php echo json_encode($nombre); ?>;
        // Configura y dibuja la gráfica
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: nombre,
                    data: quantities,
                    borderColor: 'red',
                    fill: true,
                    backgroundColor: '#ffc4c4', // Color y transparencia del área
                }, ]
            },
            options: {
                // Personaliza las opciones de la gráfica según tus necesidades
            }
        });
    </script>
@endsection
