<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="position-absolute top-0 end-80 p-0 " hidden>
    <div class="form-check form-switch custom-switch d-flex justify-content-end p-4">
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
        <label class="form-check-label ms-3" for="flexSwitchCheckChecked"> Modo Oscuro </label>
    </div>
</div>



<!-- Scripts de Bootstrap y Popper.js (si es necesario) por CDN -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Aplicar el tema almacenado al cargar la página
    var switchCheckbox = document.getElementById('flexSwitchCheckChecked');
    document.addEventListener('DOMContentLoaded', () => {
        const savedTheme = getAttributeLocally('theme');
        if (savedTheme === 'dark') {
            changeThemeDark();
        } else {
            changeThemeLight();
        }

        switchCheckbox.addEventListener('change', function() {
            // Lógica que se ejecutará cuando se cambie el valor del switch
            if (switchCheckbox.checked) { //  modo dark
                changeThemeDark();
            } else { // modo light
                changeThemeLight();
            }
        });
    });

    function getTheme() {
        const body = document.body;
        const temaActual = body.getAttribute('data-bs-theme');
        return temaActual;
    }

    function changeThemeDark() {
        const body = document.body;
        body.setAttribute('data-bs-theme', 'dark');
        saveAttributeLocally('theme', 'dark');
    }

    function changeThemeLight() {
        const body = document.body;
        body.setAttribute('data-bs-theme', 'light');
        saveAttributeLocally('theme', 'light');
    }
    // Guardar un atributo localmente
    function saveAttributeLocally(nombreAtributo, valor) {
        localStorage.setItem(nombreAtributo, valor);
    }
    // Obtener un atributo guardado localmente
    function getAttributeLocally(nombreAtributo) {
        return localStorage.getItem(nombreAtributo);
    }

    function validateNumber(input) {
        // Elimina caracteres no numéricos (excepto el punto para decimales)
        input.value = input.value.replace(/[^0-9.]/g, '');
        // Si se ingresan múltiples puntos, elimina todos menos el primero
        var puntos = input.value.split('.');
        if (puntos.length > 2) {
            input.value = puntos[0] + '.' + puntos.slice(1).join('');
        }
        // Limitar a dos decimales
        var decimales = input.value.split('.')[1];
        if (decimales && decimales.length > 2) {
            input.value = input.value.slice(0, -1);
        }
        // Si el campo está vacío, establecer el valor a 0
        if (input.value === '') {
            input.value = '0';
        }
    }

    function validateNumberWithGuion(input) {
        // Elimina caracteres no numéricos (excepto el punto para decimales)
        input.value = input.value.replace(/[^0-9-]/g, '');
        // Si se ingresan múltiples puntos, elimina todos menos el primero
        var puntos = input.value.split('-');
        if (puntos.length > 2) {
            input.value = puntos[0] + '-' + puntos.slice(1).join('');
        }
        // Limitar a dos decimales
        // var decimales = input.value.split('-')[1];
        // if (decimales && decimales.length > 2) {
        //     input.value = input.value.slice(0, -1);
        // }
        // // Si el campo está vacío, establecer el valor a 0
        // if (input.value === '') {
        //     input.value = '0';
        // }
    }
    
    function validateOnlyNumber(input) {
        // Elimina caracteres no numéricos (excepto el punto para decimales)
        var inputValue = input.value.replace(/[^0-9-]/g, '');
        // Limitar a un máximo de 8 caracteres
        if (inputValue.length > 8) {
            inputValue = inputValue.slice(0, 8);
        }
        input.value = inputValue;
    }
    function testQuery() {
        console.log('test query working');
    }

    function mostrarSwal(title, description, icon, isDark, onAccept, onCancel, data = null) {
        Swal.fire({
            title: '¡' + title + '!',
            text: description,
            icon: icon,
            showCancelButton: true, // Mostrar el botón de cancelar
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            // Agregar la clase 'dark' para el modo oscuro o 'light' para el modo light
            customClass: {
                popup: isDark == true ? 'sweetalert-dark' : '',
                header: isDark == true ? 'sweetalert-dark' : '',
                content: isDark == true ? 'sweetalert-dark' : '',
                confirmButton: isDark == true ? 'sweetalert-dark' : '',
                cancelButton: isDark == true ? 'sweetalert-dark' : '',
            },
        }).then((result) => {
            // El código que se ejecutará después de hacer clic en Aceptar o Cancelar
            if (result.isConfirmed) {
                if (onAccept && typeof onAccept === 'function') {
                    onAccept(data);
                }
            } else if (result.isDismissed) {
                // Acción cuando se hace clic en Cancelar
                if (onCancel && typeof onCancel === 'function') {
                    onCancel();
                }
            }
        });
    }

    function showSwalUnique(title, description, icon, isDark) {
        Swal.fire({
            title: title,
            text: description,
            icon: icon,
            confirmButtonText: 'Entendido',
            customClass: {
                popup: isDark == true ? 'sweetalert-dark' : '',
                header: isDark == true ? 'sweetalert-dark' : '',
                content: isDark == true ? 'sweetalert-dark' : '',
                confirmButton: isDark == true ? 'sweetalert-dark' : '',
                cancelButton: isDark == true ? 'sweetalert-dark' : '',
            },
        });
    }
</script>
<style>
    /* Agrega estilos según tus necesidades para un tema oscuro */
    .sweetalert-dark {
        background-color: #333;
        color: #fff;
        /* Otros estilos... */
    }
</style>
