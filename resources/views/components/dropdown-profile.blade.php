<div class="relative inline-flex">
    <button id="dropdownButton" class="inline-flex justify-center items-center group">
        <img class="w-8 h-8 object-cover rounded-full" src="{{ Auth::user()->url_photo }}" width="32" height="32"
            alt="{{ Auth::user()->name }}"/>
        <div class="flex items-center truncate">
            <span
                class="truncate ml-2 text-sm font-medium dark:text-slate-300 group-hover:text-slate-800 dark:group-hover:text-slate-200">{{ Auth::user()->name }}</span>
            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
            </svg>
        </div>
    </button>
    <div id="dropdownContent"
        class="origin-top-right right-1 z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1"
        style="display: none;">
        <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200 dark:border-slate-700">
            <div class="font-medium text-slate-800 dark:text-slate-100">{{ Auth::user()->name }}</div>
            <div class="text-xs text-slate-500 dark:text-slate-400 italic">
                @if (Auth::user()->tipo == 'O')
                    Organizador
                @endif
                @if (Auth::user()->tipo == 'F')
                    Fotografo
                @endif
            </div>
        </div>
        <ul>
            <li>
                <a class="font-medium text-sm text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3"
                    href="{{Auth::user()->tipo=="F"? route('fotografo.perfil'):(Auth::user()->tipo=="O"? route('organizador.perfil'):'') }}">Perfil</a>
            </li>
            <li>


                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="font-medium text-sm text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3">
                    Salir
                </a>

                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>

<script>
    document.getElementById('dropdownButton').addEventListener('click', function(event) {
        event.preventDefault();
        var dropdownContent = document.getElementById('dropdownContent');
        if (dropdownContent.style.display === "none") {
            dropdownContent.style.display = "block";
        } else {
            dropdownContent.style.display = "none";
        }
    });

    document.addEventListener('click', function(event) {
        var dropdownButton = document.getElementById('dropdownButton');
        var dropdownContent = document.getElementById('dropdownContent');
        var isClickInside = dropdownButton.contains(event.target);

        if (!isClickInside && dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        }
    });
</script>
