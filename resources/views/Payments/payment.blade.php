@extends('layouts.appconsultorio')


{{-- @section('title', 'Pagos') --}}

@section('contenido')
    @include('layouts.modeDarkBootstrap')
<div class="body-background">
    {{-- @section('content') --}}
    {{-- <div class="card w-100 body-background"> --}}
    <div id="loadingSpinner" class="d-none vh-100 vw-100 d-flex justify-content-center align-items-center flex-column body-background">
        <!-- Icono de carga de Bootstrap -->
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
        <!-- Mensaje de carga -->
        <br>
        <p class="mt-2">Cargando...</p>
    </div>

    <div class="row px-4 py-3 mx-auto body-background" id="content">
        <div class="col-sm-6 mb-3 mb-sm-0 ">
            <div class="card body-background">
                <div class="card-body body-background">
                    <h5 class="card-title subtitulo1">{{ $servicio->nombre }}</h5>
                    <p class="card-text" id="service_id" data-service="{{ $servicio->id }}" hidden>servicio_id :
                        {{ $servicio->id }} </p>
                    <div class="row">
                        <div class="row col-md-6">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text card-background" id="basic-addon1">Costo Bs </span>
                                <input type="text" class="form-control card-background" placeholder="Costo del servicio "
                                    aria-label="cost" aria-describedby="basic-addon1" id="cost"
                                    value="{{ $servicio->costo }}" oninput="validateNumber(this)">
                            </div>
                            <span id="error_cost" style="color: red;"></span>
                        </div>
                        <div class="row col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Descuento Bs </span>
                                <input type="text" class="form-control" placeholder="Descuento del servicio "
                                    aria-label="cost" aria-describedby="basic-addon1" id="discount" value=""
                                    oninput="validateNumber(this)">
                            </div>
                            <span id="error_discount" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <select class="form-select" id="doctor_id" aria-label="Floating label select example">
                                <option selected value="">Seleccione un medico</option>
                                @foreach ($medicos as $name)
                                    <option value={{ $name['id'] }}>{{ $name['name'] }} {{ $name['lastname'] }}</option>
                                @endforeach
                            </select>
                            <label for="doctor_id">Seleccione el medico: </label>
                        </div>
                        <span id="error_doctor_id" style="color: red;"></span>
                    </div>
                    <div class="mb-3">
                        @php
                            $fechaActual = now()->format('Y-m-d');
                        @endphp
                        <div>
                            <label for="" class="subtitulo4">Seleccione fecha de servicio</label>
                            <input class="form-control" id="dateService" type="date" min="{{ $fechaActual }}">
                        </div>
                        <span id="error_dateService" style="color: red;"></span>
                    </div>
                    <div class="mb-3 body-background" id="horarioContent" hidden>
                        <label for="" class="mb-3 body-background subtitulo4 " >Horario de atencion : </label>
                        <br>
                        <label id="day_atentions" class="subtitulo4 " >{{ $day }}</label>
                        <div id="horarioContainer">
                            @foreach ($horarios as $key => $hora)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="schedule" id="horario_id"
                                        value="{{ $hora['id'] }}" {{ $key === 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for={{ $hora['id'] }}>
                                        {{ $hora['schedule'] }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <span id="error_horario_id" style="color: red;"></span>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <select class="form-select" id="type_service" aria-label="Floating label select example">
                                <option value="1">Pagar por Qr</option>
                                <option value="2">Pagar por tigo money</option>
                            </select>
                            <label for="type_service">Seleccione tipo de servicio: </label>
                        </div>
                        <span id="error_type_service" style="color: red;"></span>
                    </div>
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 body-background">
            <div class="card">
                <div class="card-body body-background">
                    <h5 class="card-title subtitulo1">Datos del pago</h5>
                    <div class="mb-3">
                        <label for="basic-url" class="form-label subtitulo4">Nit </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">#</span>
                            <input type="text" class="form-control" placeholder="Introduzca Nit o carnet de identidad"
                                aria-label="Username" aria-describedby="basic-addon1" id="nit"
                                value="{{ $paciente->nit }}" oninput="validateNumberWithGuion(this)">
                            <br>
                        </div>
                        <span id="error_nit" style="color: red;"></span>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url" class="form-label subtitulo4">Razon social </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">#</span>
                            <input type="text" class="form-control" placeholder="Introduzca Razon social o nombre"
                                aria-label="Username" aria-describedby="basic-addon1" id="businessName"
                                value="{{ $paciente->razon_social }}">
                        </div>
                        <span id="error_businessName" style="color: red;"></span>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url" class="form-label subtitulo4">Correo </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="email" class="form-control" placeholder="Introduzca su correo"
                                aria-label="Username" aria-describedby="basic-addon1" id="email"
                                value="{{ $paciente->email }}">
                        </div>
                        <span id="error_email" style="color: red;"></span>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url" class="form-label subtitulo4">Celular </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">#</span>
                            <input type="text" class="form-control" placeholder="Introduzca su numero de celular"
                                aria-label="Username" aria-describedby="basic-addon1" id="cellphone"
                                value="{{ $paciente->celular }}" oninput="validateOnlyNumber(this)">
                        </div>
                        <span id="error_cellphone" style="color: red;"></span>
                    </div>
                    <div class="mb-3">
                        <label for="basic-url" class="form-label subtitulo4">Costo total </label>
                        <div class="input-group mb-3 card-background">
                            <span class="input-group-text card-background" id="basic-addon1">Bs </span>
                            <input type="text" class="form-control card-background" placeholder="Costo total a pagar"
                                aria-label="Username" id="totalCost" aria-describedby="basic-addon1"
                                oninput="validateNumber(this)" disabled>
                        </div>
                        <span id="error_totalCost" style="color: red;"></span>
                    </div>
                    <div class="text-center ">
                        <button type="button" onclick="generatePayment()"
                            class="btn btn-primary background-button">Generar
                            pago</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade body-background" id="qrCodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered body-background" role="document">
                <div class="modal-content body-background">
                    <div class="modal-header body-background">
                        <h5 class=" subtitulo1" id="exampleModalLabel">Código QR</h5>
                        <button type="button" class="close background-button" data-dismiss="modal" aria-label="Close"
                            onclick="cerrarModal()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center body-background">
                        <button id="downloadButton" class="btn btn-primary background-button" onclick="download()">Descargar Código
                            QR</button>

                        <img id="qrCodeImage" alt="Código QR" class="img-fluid">
                    </div>
                    <div class="body-background">
                        <div class="modal-footer">
                            <button type="button" onclick="cerrarModal()" class="btn btn-secondary background-button"
                                data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        var paciente = @json($paciente);
        var servicio = @json($servicio);
        let orden = {};
        document.addEventListener('DOMContentLoaded', function() {
            var cost = document.getElementById('cost').value;

            var discountInput = document.getElementById('discount');
            discountInput.value = cost - 0.01;
            calculateTotalCost();

            var select_doctor_id = document.getElementById('doctor_id');
            select_doctor_id.addEventListener('change', function() {
                var selectedValue = select_doctor_id.value;
                console.log('Valor seleccionado del doctor => ', selectedValue, cost);
            });
            var costServicio = document.getElementById('cost');
            costServicio.addEventListener('input', function() {
                var selectedValue = costServicio.value;
                console.log('Valor seleccionado del costo del servicio => ', selectedValue);
                calculateTotalCost();
            });
            var discount = document.getElementById('discount');
            discount.addEventListener('input', function() {
                var selectedValue = discount.value;
                console.log('Valor seleccionado del descuento del servicio => ', selectedValue);
                calculateTotalCost();
            });
            var dateService = document.getElementById('dateService');
            dateService.addEventListener('change', function() {
                var selectedValue = dateService.value;
                var dayNames = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"];
                // Obtener el día de la semana (0 = domingo, 1 = lunes, ..., 6 = sába
                var dateObject = new Date(selectedValue);
                var dayOfWeek = dateObject.getDay();
                var dayOfWeekName = dayNames[dayOfWeek];
                var doctor_id = getValueWithValidation('doctor_id', 'campo requerido');
                // Obtener el valor del atributo data-service
                var serviceIdElement = document.getElementById('service_id');
                var servicioId = serviceIdElement.getAttribute('data-service');
                console.log('Valor seleccionado de la fecha => ', servicioId, doctor_id, dayOfWeekName);
                modifiedLabel('day_atentions', dayOfWeekName);
                getTurn(servicioId, doctor_id, dayOfWeekName);
            });
        });

        function dataForGetTurn() {
            var doctor_id = getValueWithValidation('doctor_id', 'campo requerido');
            var dateService = getValueWithValidation('dateService', 'campo requerido');
            var data = {
                cost: cost,
                discount: discount,
                doctor_id: doctor_id,
                dateService: dateService,
                schedule_id: schedule_id,
                nit: nit,
                businessName: businessName,
                email: email,
                cellphone: cellphone,
                totalCost: totalCost,
                type_service: type_service,
                success: success
            }
            return data;
        }

        function calculateTotalCost() {
            var cost = document.getElementById('cost').value;
            var discount = document.getElementById('discount').value;

            var totalCost = document.getElementById('totalCost');
            totalCost.value = (cost - discount).toFixed(2);
        }

        function generatePayment() {
            let data = detailsToMakePayment();
            var themeActually = getTheme() == 'dark' ? true : false;
            if (data.success == false) {
                console.log('falta rellenar datos => ', data);
                return;
            }
            mostrarSwal('Alerta', 'Esta seguro de continuar con el pago', 'warning', themeActually, makeThePayment,
                cancelThePayment, data);
        }

        function detailsToMakePayment() {
            var cost = getValueWithValidation('cost', 'campo requerido');
            var discount = getValueWithValidation('discount', 'campo requerido');
            var doctor_id = getValueWithValidation('doctor_id', 'campo requerido');
            var dateService = getValueWithValidation('dateService', 'campo requerido');
            try {
                var radioButtons = document.querySelectorAll('input[name="schedule"]:checked');
                var schedule_id = radioButtons[0].value;
                document.getElementById('error_horario_id').innerText = '';
            } catch (error) {
                console.error(error);
                document.getElementById('error_horario_id').innerText = 'Debe seleccionar un horario';
                var schedule_id = '';
            }
            var nit = getValueWithValidation('nit', 'campo requerido');
            var businessName = getValueWithValidation('businessName', 'campo requerido');
            var email = getValueWithValidation('email', 'campo requerido');
            var cellphone = getValueWithValidation('cellphone', 'campo requerido');
            var totalCost = getValueWithValidation('totalCost', 'campo requerido');
            var type_service = getValueWithValidation('type_service', 'campo requerido');

            let success = true;
            if ((totalCost && cellphone && email && businessName && nit && schedule_id && dateService && doctor_id &&
                    discount && cost) == '') {
                success = false;
            }
            var data = {
                cost: cost,
                discount: discount,
                doctor_id: doctor_id,
                dateService: dateService,
                schedule_id: schedule_id,
                nit: nit,
                businessName: businessName,
                email: email,
                cellphone: cellphone,
                totalCost: totalCost,
                type_service: type_service,
                paciente_id: paciente.id,
                servicio_id: servicio.id,
                success: success
            }
            return data;
        }

        function getValueWithValidation(nameInput, valueShow) {
            try {
                var dataValue = document.getElementById(nameInput).value;
                if (dataValue.trim() === '') {
                    document.getElementById('error_' + nameInput).innerText = valueShow;
                } else {
                    document.getElementById('error_' + nameInput).innerText = '';
                }
                return dataValue;
            } catch (error) {
                console.error('ha obcurrido un error en getValueWithValidation => ', error);
                return null; // Puedes devolver un valor predeterminado o null en caso de error
            }
        }

        function makeThePayment(data) {
            console.log('realiza el pago', data);
            // Con fetch API (sin jQuery)
            showLoadingSpinner();
            // var url = new URL('/payments/generate_payment', window.location.origin);
            var url = new URL('/inf513/grupo01sc/proyTecno/public/index.php/payments/generate_payment', 'https://mail.tecnoweb.org.bo');
         
            url.search = new URLSearchParams(data).toString();
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    abrirModal();
                    console.log('response de makethepayment', data.success);

                    var qrCodeImage = document.getElementById('qrCodeImage');
                    qrCodeImage.src = data.img;
                    orden = data.orden;
                    hideLoadingSpinner();
                })
                .catch(error => {
                    hideLoadingSpinner();
                    showSwalUnique('!Error!', 'ha ocurrido un error, intente nuevamente ', 'error', true);
                    console.error('Error en la petición fetch', error);
                });
        }

        function cancelThePayment() {
            console.log('cancela el pago');
        }

        function abrirModal() {
            document.getElementById('qrCodeModal').classList.add('show');
            document.getElementById('qrCodeModal').style.display = 'block';
            document.body.classList.add('modal-open');
        }

        function cerrarModal() {
            document.getElementById('qrCodeModal').classList.remove('show');
            document.getElementById('qrCodeModal').style.display = 'none';
            document.body.classList.remove('modal-open');
            abrirVentana();
            window.location.href = '/inf513/grupo01sc/proyTecno/public/index.php/servicios';
        }
        function abrirVentana() {
            // Llama a tu endpoint para generar el PDF
            // let path = window.location.origin;
            // let url = path + "/report/order/pdf?"+ JSON.stringify(orden);;
            var url = new URL('/inf513/grupo01sc/proyTecno/public/index.php/report/order/pdf?'+ JSON.stringify(orden), 'https://mail.tecnoweb.org.bo');
         
            var win = window.open(url, "_blank");
            win.focus();

        }
        function download() {
            var base64Image = document.getElementById('qrCodeImage').src;
            // Crea un enlace temporal
            var downloadLink = document.createElement('a');
            downloadLink.href = base64Image;
            downloadLink.download = 'codigo-qr.png';
            // Simula el clic en el enlace para iniciar la descarga
            downloadLink.click();
        }
        // Función para mostrar el indicador de carga
        function showLoadingSpinner() {
            document.getElementById('loadingSpinner').classList.remove('d-none');
            document.getElementById('content').classList.add('d-none');
        }

        // Función para ocultar el indicador de carga
        function hideLoadingSpinner() {
            document.getElementById('loadingSpinner').classList.add('d-none');
            document.getElementById('content').classList.remove('d-none');
        }

        function getTurn(servicioId, doctor_id, dayOfWeekName) {
            var data = {
                service_id: servicioId,
                doctor_id: doctor_id,
                dayOfWeekName: dayOfWeekName,
                _token: '{{ csrf_token() }}',
            }
            showLoadingSpinner();
            var url = new URL('/inf513/grupo01sc/proyTecno/public/index.php/attentions/get_attentions_turn', 'https://mail.tecnoweb.org.bo');
          //  var url = new URL('/attentions/get_attentions_turn', window.location.origin);
            var requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', // Ajusta el tipo de contenido según tu backend
                },
                body: JSON.stringify(data), // Convierte los datos a formato JSON
            };
            fetch(url, requestOptions)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    selectSchedules(data);
                    hideLoadingSpinner();
                })
                .catch(error => {
                    hideLoadingSpinner();
                    console.error('Error en la petición fetch', error);
                });
        }

        function modifiedLabel(id_label, new_value) {
            var labelElement = document.getElementById(id_label);
            // Verifica si el elemento existe antes de intentar cambiar su valor
            if (labelElement) {
                // Asigna el nuevo valor al contenido del elemento label
                labelElement.innerHTML = new_value;
            } else {
                console.error('No se encontró el elemento con el ID day_atentions');
            }
        }

        function selectSchedules(data) {
            var horarioContent = document.getElementById('horarioContent');
            horarioContent.hidden = false;
            var horarioContainer = document.getElementById('horarioContainer');
            while (horarioContainer.firstChild) {
                horarioContainer.removeChild(horarioContainer.firstChild);
            }
            data.forEach(function(valor, indice) {
                console.log('aaaaaaaaa', valor);
                var radioButton = document.createElement('input');
                radioButton.type = 'radio';
                radioButton.name =
                'schedule'; // Asegúrate de asignar el mismo nombre a todos los nuevos radio buttons
                radioButton.id = 'horario_' + indice; // Asigna un ID único a cada radio button si es necesario
                radioButton.value = valor.id;
                
                var label = document.createElement('label');
                label.innerHTML = valor.schedule;
                label.setAttribute('for', 'horario_' + indice);
                // Crear label
                var label = document.createElement('label');
                label.innerHTML = valor.schedule;
                label.setAttribute('for', 'horario_' + indice);
                // Añadir una clase al elemento label
                label.classList.add('subtitulo4'); // Reemplaza 'tu-clase-aqui' con la clase que desees

                // Establecer margen a la derecha del radio button
                radioButton.style.marginRight = '15px'; // Puedes ajustar el valor según tus preferencias

                // Añadir radio button y label al contenedor
                horarioContainer.appendChild(radioButton);
                horarioContainer.appendChild(label);
                radioButton.addEventListener('change', function() {
                    // Actualizar la variable con el valor seleccionado
                    let valorSeleccionado = radioButton.value;
                    console.log(valorSeleccionado, 'sssssssssss');
                });
            });
        }
    </script>

@endsection
