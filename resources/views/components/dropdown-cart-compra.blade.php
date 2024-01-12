<!-- Search button -->
<div id="cartComponent" class="relative inline-flex mx-4">
    <!-- Button -->
    <button id="cartButton"
        class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full"
        aria-haspopup="true">
        <span class="sr-only">Carrito</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart w-4 h-4">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        @auth
            <div
                class="absolute bottom-4 left-6 w-5 h-5 bg-rose-500 border-1 border-white dark:border-[#182235] rounded-full flex items-center justify-center">
                <span id="cantidad-carrito" class="text-xxs text-white">
                    @if (isset(Auth::user()->ordens->where('tipo', \App\Models\Orden::CARRITO)->first()->imagenesOrden))
                        {{ count(Auth::user()->ordens->where('tipo', \App\Models\Orden::CARRITO)->first()->imagenesOrden) }}
                    @else
                        0
                    @endif
                </span>
            </div>
            {{-- @if (count(Auth::user()->orden->images) > 0)
                <div
                    class="absolute bottom-4 left-6 w-5 h-5 bg-rose-500 border-1 border-white dark:border-[#182235] rounded-full flex items-center justify-center">
                    <span class="text-xxs text-white">{{ count(Auth::user()->orden->images) }}</span>
                </div>
            @else
                <div
                    class="absolute top-0 right-0 w-2.5 h-2.5 bg-rose-500 border-2 border-white dark:border-[#182235] rounded-full">
                </div>
            @endif --}}
        @endauth

    </button>
    <!-- Modal dialog -->
    <div id="cartModal"
        class="origin-top-left absolute top-full right-1 z-10 min-w-80 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1"
        style="display: none;">

        @auth
            <ul id="list-cart">
                @php
                    $ordenes = Auth::user()->ordens->where('tipo', \App\Models\Orden::CARRITO);
                @endphp
                @if (isset($ordenes->first()->imagenesOrden))
                    @foreach ($ordenes->first()->imagenesOrden as $imagen)
                        <li id="li{{ $imagen->id }}{{ Auth::user()->id }}"
                            class="border-b border-slate-200 dark:border-slate-700 last:border-0">
                            {{-- <a class="relative block hover:bg-slate-50 dark:hover:bg-slate-700/20" href="#carrito"> --}}
                            <div class="p-2 flex bg-white hover:bg-gray-100 border-b border-gray-100">
                                <a class="relative block hover:bg-slate-50 dark:hover:bg-slate-700/20" href="#carrito">
                                    <div class="w-16"><img src="{{ $imagen->url }}" class="w-full h-full object-cover"
                                            alt="img product" oncontextmenu="return false;" draggable="false"></div>
                                </a>
                                <div class="flex-auto text-sm w-32 px-1">
                                    <div class="font-bold">{{ $imagen->image->titulo }}</div>
                                    {{-- <div class="truncate">
                                        {{ Auth::user()->ordens->where('tipo', \App\Models\Orden::CARRITO)->first()->imagenesOrden }}
                                    </div> --}}
                                    {{-- <div class="text-gray-400">Qt: 2</div> --}}
                                </div>
                                <div class="flex flex-col w-18 font-medium items-end">
                                    <div data-image="{{ $imagen->id }}" data-user="{{ Auth::user()->id }}"
                                        class="btn-del w-5 h-5 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </div>
                                    {{ $imagen->costo }} Bs
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
                <li class="border-b border-slate-200 dark:border-slate-700 last:border-0">
                    <div class="p-4 justify-center flex">
                        <a id="btn-total" href="{{ route('cliente.carrito.index') }}"
                            class="text-base  undefined  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
            hover:bg-teal-700 hover:text-teal-100 
            bg-teal-100 
            text-teal-700 
            border duration-200 ease-in-out 
            border-teal-600 transition">Total
                            @if (isset($ordenes->first()->imagenesOrden))
                                {{ $ordenes->first()->total }}
                            @else
                                0
                            @endif
                            Bs</a>
                    </div>
                </li>
            </ul>
        @endauth


    </div>
</div>
{{-- css --}}
<style>
    .text-xxs {
        font-size: 0.6rem;
    }
</style>

{{-- js --}}
<script>
    document.getElementById('cartButton').addEventListener('click', function(event) {
        event.preventDefault();
        var cartModal = document.getElementById('cartModal');
        if (cartModal.style.display === "none") {
            cartModal.style.display = "block";
        } else {
            cartModal.style.display = "none";
        }
    });

    window.addEventListener('click', function(event) {
        var cartModal = document.getElementById('cartModal');
        if (!document.getElementById('cartComponent').contains(event.target)) {
            cartModal.style.display = "none";
        }
    });
    // var btnsDel = document.querySelectorAll('.btn-del');
    // btnsDel.forEach(function(btnDel) {
    //     btnDel.addEventListener('click', function(event) {
    //         event.stopPropagation();
    //         var imageId = event.currentTarget.dataset.image;
    //         var userId = event.currentTarget.dataset.user;
    //         console.log('Image ID: ', imageId);
    //         console.log('User ID: ', userId);
    //         var liParent = event.target.closest('li');
    //         var apiUrl = new URL('/api/cliente/del-cart', window.location.origin);
    //         console.log(apiUrl)
    //         var data = {
    //             image_orden_id: imageId,
    //             user_id: userId
    //         };
    //         fetch(apiUrl, {
    //                 method: 'POST',
    //                 headers: {
    //                     'Content-Type': 'application/json',
    //                 },
    //                 body: JSON.stringify(data),
    //             })
    //             .then(response => response.json())
    //             .then(data => {
    //                 console.log('Success:', data.data);
    //                 // Aquí puedes agregar el código que quieras ejecutar si la petición fue exitosa
    //                 document.getElementById('cantidad-carrito').textContent = data
    //                     .data.imagenes_orden
    //                     .length; // Reemplaza 'data.nuevaCantidad' con la propiedad correspondiente de la respuesta
    //                 document.getElementById('btn-total').textContent = "Total " + data.data.total +
    //                     "Bs";
    //                 liParent.remove();
    //             })
    //             .catch((error) => {
    //                 console.error('Error:', error);
    //                 // Aquí puedes agregar el código que quieras ejecutar si ocurrió un error
    //             });
    //     });
    // });
</script>
