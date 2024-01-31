<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fotografía Social</title>
    @php
        $logo = session('logo');
    @endphp
    <link rel="icon" href="{{ asset('estilos_tecno/img/logo_fotografia.png') }}" type="image/png">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @livewireStyles

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
            document.querySelector('html').classList.remove('dark');
            document.querySelector('html').style.colorScheme = 'light';
        } else {
            document.querySelector('html').classList.add('dark');
            document.querySelector('html').style.colorScheme = 'dark';
        }
    </script>
</head>

<body class="font-inter antialiased bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400"
    :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">

    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>

    <!-- Page wrapper -->
    <div class="flex h-screen overflow-hidden">

        <x-app.sidebar />

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden @if ($attributes['background']) {{ $attributes['background'] }} @endif"
            x-ref="contentarea">

            <x-app.header />

            <main>
                {{ $slot }}
            </main>

        </div>

    </div>

    @livewireScripts
    @auth
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
        <script>
            var firebaseConfig = {
                apiKey: "AIzaSyBGP3CaBi0iuhfptdT3Sct-qoRaxqdfz9Y",
                authDomain: "push-notification-b18d2.firebaseapp.com",
                projectId: "push-notification-b18d2",
                storageBucket: "push-notification-b18d2.appspot.com",
                messagingSenderId: "959738834438",
                appId: "1:959738834438:web:2671554cd95552ea28dd87",
                measurementId: "G-8F0172YKBF"
            };
            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();

            function startFCM() {
                messaging
                    .requestPermission()
                    .then(function() {
                        return messaging.getToken()
                    })
                    .then(function(response) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '{{ route('store.token') }}',
                            type: 'POST',
                            data: {
                                token: response
                            },
                            dataType: 'JSON',
                            success: function(response) {
                                console.log('Token stored.');
                            },
                            error: function(error) {
                                console.log(error);
                            },
                        });
                    }).catch(function(error) {
                        console.log(error);
                    });
            }
            messaging.onMessage(function(payload) {
                const title = payload.notification.title;
                const options = {
                    body: payload.notification.body,
                    icon: payload.notification.icon,
                };
                new Notification(title, options);
                // Obtén el div de notificación
                var notificationDiv = document.getElementById('notification');
                console.log("notificationDiv: ", notificationDiv);
                // Verifica si el div tiene un elemento span
                var span = notificationDiv.querySelector('span');

                if (span) {
                    console.log("tiene span")
                    // Si el div ya tiene un span, incrementa el valor del texto en uno
                    var count = parseInt(span.textContent);
                    span.textContent = count + 1;
                } else {
                    console.log("no tiene span");
                    // Si el div no tiene un span, elimina las clases antiguas
                    notificationDiv.classList.remove('top-0', 'right-0', 'w-2.5', 'h-2.5');

                    // Añade las nuevas clases al div
                    notificationDiv.classList.add('bottom-4', 'left-6', 'w-5', 'h-5', 'flex', 'items-center',
                        'justify-center');
                    // Si el div no tiene un span, crea uno y establece su valor en 1
                    span = document.createElement('span');
                    span.className = 'text-xxs text-white';
                    span.textContent = 1;

                    // Agrega el nuevo span al div de notificación
                    notificationDiv.appendChild(span);
                }
                // ***************************INSERTANDO EL <li>
                // Obtén el div de notificación
                var notificationDiv = document.getElementById('new-notification');
                // Verifica si el div tiene un elemento span con id 'sin-notificacion-nueva'
                var sinNotificacionNueva = document.getElementById('sin-notificacion-nueva');

                if (sinNotificacionNueva) {
                    // Si el div tiene un span con id 'sin-notificacion-nueva', lo elimina
                    sinNotificacionNueva.remove();
                }
                // Crea un nuevo elemento li
                var li = document.createElement('li');
                li.className = 'border-b border-slate-200 dark:border-slate-700 last:border-0';

                // Crea el enlace a
                var a = document.createElement('a');
                a.className = 'block py-2 px-4 hover:bg-slate-50 dark:hover:bg-slate-700/20';
                a.href = payload.data.url;

                // Crea los elementos span
                var span1 = document.createElement('span');
                span1.className = 'block text-sm mb-2';
                span1.innerHTML =
                    '📣 <span class="font-medium text-slate-800 dark:text-slate-100">' + payload.notification.title +
                    '</span> ' + payload.notification
                    .body; // Asegúrate de reemplazar 'notification.titulo' con el título de la notificación real

                var span2 = document.createElement('span');
                span2.className = 'block text-xs font-medium text-slate-400 dark:text-slate-500';
                span2.textContent = notification
                    .time; // Asegúrate de reemplazar 'notification.time' con la hora de la notificación real

                // Agrega los elementos span al enlace a
                a.appendChild(span1);
                a.appendChild(span2);

                // Agrega el enlace a al elemento li
                li.appendChild(a);

                // Agrega el nuevo elemento li al div de notificación
                //  notificationDiv.appendChild(li);
                var parentDiv = notificationDiv.parentNode;

                // inserta 'li' después de 'notificationDiv'
                parentDiv.insertBefore(li, notificationDiv.nextSibling);
                console.log("llega una notificación....", payload);
            });
            document.addEventListener('DOMContentLoaded', (event) => {
                startFCM();
            });
        </script>
    @endauth
</body>

</html>
