<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body p-5">
                <div class="space-y-6">
                    <div>
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-700 dark:text-white">Galería
                                </h2>

                                {{-- <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240
                                    vendors</span> --}}
                            </div>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Galeria del evento
                                {{ $evento->titulo }}</p>
                        </div>
                        <div class="flex items-center mt-4 gap-x-3">
                            <a href="{{ route('fotografo.evento.galeria.agregar', $evento->id) }}"
                                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Agregar Imágen</span>
                            </a>
                        </div>
                        {{-- componente --}}
                        <div>
                            <!-- component -->
                            <section class="text-gray-600 body-font">
                                <div class="container py-12 mx-auto">
                                    {{-- <div class="flex flex-col text-center w-full mb-20">
                                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                                            Master Cleanse Reliac Heirloom</h1>
                                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag
                                            tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke
                                            farm-to-table. Franzen you probably haven't heard of them man bun deep
                                            jianbing selfies heirloom.</p>
                                    </div> --}}
                                    <div class="flex flex-wrap -m-4">
                                        @foreach ($images as $image)
                                            <div class="lg:w-1/3 sm:w-1/2 p-4">
                                                <div class="flex relative">
                                                    <img alt="gallery"
                                                        class="absolute inset-0 w-full h-full object-contain object-center"
                                                        src="{{ $image->url }}">
                                                    <div
                                                        class="px-8 py-5 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">

                                                        <div class="flex items-center gap-x-3">
                                                            <h2
                                                                class="py-1 font-medium tracking-widest text-sm title-font text-indigo-500 mb-1">
                                                                {{ $image->precio }} Bs</h2>
                                                            {{-- <h2
                                                        class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                                        {{$image->precio}} Bs</h2> --}}
                                                            @if ($image->categoria == \App\Models\Image::PUB)
                                                                <span
                                                                    class="px-3 py-1 text-xs text-emerald-600 bg-emerald-100 rounded-full dark:bg-gray-800 dark:text-emerald-400">
                                                                    Público
                                                                </span>
                                                            @elseif ($image->categoria == \App\Models\Image::PRIV)
                                                                <span
                                                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                                                                    Privado
                                                                </span>
                                                            @endif
                                                            @if ($image->analizado)
                                                                <span
                                                                    id="span-analizado{{ $image->id }}{{ $evento->id }}"
                                                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                                                                    Analizado
                                                                </span>
                                                                <span
                                                                    id="span-no-analizado{{ $image->id }}{{ $evento->id }}"
                                                                    class="px-3 py-1 text-xs text-gray-600 bg-gray-200 rounded-full dark:bg-gray-800 dark:text-gray-400"
                                                                    style="display: none">
                                                                    Sin analizar
                                                                </span>
                                                            @elseif(!$image->analizado)
                                                                <span
                                                                    id="span-no-analizado{{ $image->id }}{{ $evento->id }}"
                                                                    class="px-3 py-1 text-xs text-gray-600 bg-gray-200 rounded-full dark:bg-gray-800 dark:text-gray-400">
                                                                    Sin analizar
                                                                </span>
                                                                <span
                                                                    id="span-analizado{{ $image->id }}{{ $evento->id }}"
                                                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400"
                                                                    style="display: none">
                                                                    Analizado
                                                                </span>
                                                            @endif

                                                            @if ($image->estado)
                                                                <span
                                                                    id="span-true{{ $image->id }}{{ Auth::user()->id }}"
                                                                    class="px-3 py-1 text-xs text-violet-600 bg-violet-600 rounded-full dark:bg-gray-800 dark:text-violet-400">
                                                                    <svg width="20" height="20"
                                                                        viewBox="0 0 400 400" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M175.391 76.1717C121.641 83.203 74.375 112.187 45.0781 156.015C34.5312 171.875 25 192.656 25 200C25 209.14 37.8125 234.922 51.25 252.812C57.1875 260.781 71.1719 275.234 80.0781 282.656C106.562 304.844 140.625 319.375 176.562 323.906C193.359 326.015 220.312 325.078 236.719 321.875C266.562 316.094 297.344 301.562 319.922 282.656C328.75 275.312 342.734 260.781 348.516 253.125C362.188 234.922 375 209.14 375 200C375 190.859 362.188 165.078 348.516 146.875C342.734 139.219 328.75 124.687 319.922 117.344C293.516 95.1561 259.453 80.5467 224.141 76.1717C212.422 74.7655 186.562 74.7655 175.391 76.1717ZM219.141 101.64C245.938 104.453 271.719 114.453 295.703 131.328C304.453 137.578 322.422 155.234 328.906 164.062C339.062 177.89 349.062 197.422 348.047 201.406C347.109 205.156 339.219 220.547 334.531 227.734C318.125 252.969 293.125 273.984 265.234 285.937C243.281 295.39 224.062 299.297 199.688 299.297C175.859 299.219 156.406 295.234 135 286.094C112.344 276.328 89.9219 259.453 74.8438 240.703C65.9375 229.687 53.8281 208.906 51.9531 201.406C50.9375 197.422 60.9375 177.89 71.0938 164.062C77.6562 155.156 95.625 137.5 104.453 131.25C138.984 107.031 176.875 97.1874 219.141 101.64Z"
                                                                            fill="white" />
                                                                        <path
                                                                            d="M184.375 126.172C156.484 132.422 135.156 152.5 127.188 180.156C125.625 185.547 125.391 188.047 125.391 200C125.391 211.953 125.625 214.453 127.188 219.844C134.766 245.938 154.062 265.234 180.156 272.812C185.547 274.375 188.047 274.609 200 274.609C211.953 274.609 214.453 274.375 219.844 272.812C245.938 265.234 265.234 245.938 272.812 219.844C274.375 214.453 274.609 211.953 274.609 200C274.609 188.047 274.375 185.547 272.812 180.156C265.312 154.219 246.016 134.844 220.234 127.266C212.656 125.078 192.188 124.453 184.375 126.172ZM207.422 151.172C224.062 152.969 239.766 165.859 246.641 183.203C248.672 188.281 248.828 189.453 248.828 200C248.828 210.938 248.75 211.562 246.328 217.578C241.719 228.984 232.031 239.453 221.406 244.531C214.297 247.969 208.359 249.297 200 249.297C191.641 249.297 185.703 247.969 178.594 244.531C167.969 239.453 158.281 228.984 153.672 217.578C151.25 211.562 151.172 210.938 151.172 200C151.172 189.453 151.328 188.281 153.359 183.203C158.984 169.062 169.375 158.672 183.125 153.516C188.281 151.562 197.578 150 201.562 150.469C202.656 150.625 205.312 150.938 207.422 151.172Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                </span>
                                                                <span
                                                                    id="span-false{{ $image->id }}{{ Auth::user()->id }}"
                                                                    class="px-3 py-1 text-xs text-white-600 bg-black rounded-full"
                                                                    style="display: none;">
                                                                    <svg width="20" height="20"
                                                                        viewBox="0 0 400 400" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M30.625 26.5625C26.875 28.8282 25 32.4219 25 37.3438C25 39.6094 25.3906 42.2657 25.8594 43.2032C26.3281 44.1407 41.0938 59.2969 58.6719 76.9532L90.5469 108.984L82.9688 115C58.4375 134.375 38.9062 160.547 27.8125 188.828C24.0625 198.516 24.0625 201.641 28.125 211.719C36.7188 233.359 48.125 250.938 64.4531 267.891C83.4375 287.656 103.359 301.25 127.891 311.25C150.938 320.703 173.516 325 200 325C229.453 325 254.609 319.609 280.156 307.813L286.562 304.844L320.391 338.828C339.062 357.5 355.234 373.281 356.406 373.906C357.578 374.531 360.391 375 362.656 375C370.234 375 375 370.234 375 362.656C375 360.391 374.609 357.734 374.141 356.797C373.672 355.859 358.906 340.625 341.328 323.047L309.375 291.016L315 286.719C322.578 281.016 337.188 266.797 344.141 258.516C355.078 245.391 365.547 227.891 371.797 211.953C376.016 201.406 376.016 198.594 371.797 188.047C363.594 167.266 351.641 148.828 335.547 132.109C312.656 108.359 286.953 92.5 255.859 82.8907C237.656 77.3438 221.328 75 200 75C170.625 75 145.234 80.3907 120.234 92.0313L113.438 95.1563L79.6094 61.1719C60.9375 42.5 44.7656 26.7188 43.5938 26.0938C40.4688 24.4532 33.75 24.6875 30.625 26.5625ZM219.141 101.641C245.938 104.453 271.719 114.453 295.703 131.328C304.453 137.578 322.422 155.234 328.906 164.063C339.062 177.891 349.062 197.422 348.047 201.406C347.109 205.156 339.219 220.547 334.531 227.734C328.125 237.656 321.797 245.234 312.422 254.375C305.234 261.328 292.188 271.875 290.781 271.875C290.469 271.875 283.828 265.469 276.016 257.578L261.797 243.359L264.922 238.359C268.828 231.875 272.188 223.125 273.828 214.922C275.703 205.859 275.078 188.047 272.734 179.766C265.234 154.141 245.859 134.766 220.234 127.266C211.953 124.922 194.141 124.297 185.078 126.172C176.875 127.813 168.125 131.172 161.641 135.078L156.641 138.203L145.156 126.719C138.75 120.391 133.594 115 133.594 114.766C133.594 113.984 147.656 108.828 156.406 106.328C175.938 100.859 196.875 99.2969 219.141 101.641ZM123.984 142.344L138.203 156.641L135.078 161.641C131.172 168.125 127.812 176.875 126.172 185.078C124.297 194.141 124.922 211.953 127.266 220.234C134.766 245.859 154.141 265.234 179.766 272.734C188.047 275.078 205.859 275.703 214.922 273.828C223.125 272.188 231.875 268.828 238.359 264.922L243.359 261.797L254.922 273.281C261.25 279.609 266.406 285 266.406 285.234C266.406 285.938 252.812 291.016 244.766 293.359C234.688 296.328 221.406 298.516 210.078 299.063C170.938 301.172 136.406 291.25 104.453 268.75C95.625 262.5 77.6562 244.844 71.0938 235.938C60.9375 222.109 50.9375 202.578 51.9531 198.594C52.8906 194.844 60.7812 179.453 65.4688 172.266C71.875 162.344 78.2031 154.766 87.5781 145.625C94.7656 138.672 107.812 128.125 109.219 128.125C109.531 128.125 116.172 134.531 123.984 142.344ZM207.422 151.172C224.062 152.969 239.766 165.859 246.641 183.203C248.672 188.281 248.828 189.453 248.828 200C248.828 211.016 248.75 211.484 246.25 217.734C244.766 221.328 243.438 224.219 243.125 224.219C242.422 224.219 175.781 157.578 175.781 156.875C175.781 156.641 178.594 155.234 182.109 153.906C188.047 151.641 197.266 150 201.562 150.469C202.656 150.625 205.312 150.938 207.422 151.172ZM190.781 209.141C209.219 227.578 224.219 242.813 224.219 243.125C224.219 243.359 221.406 244.688 217.969 246.016C190.234 256.719 159.297 240.703 151.875 211.641C150.938 207.969 150.703 204.375 150.938 197.656C151.25 189.844 151.641 187.813 153.828 182.188C155.234 178.672 156.562 175.781 156.875 175.781C157.188 175.781 172.422 190.781 190.781 209.141Z"
                                                                            fill="white" />
                                                                    </svg>

                                                                </span>
                                                            @elseif(!$image->estado)
                                                                <span
                                                                    id="span-false{{ $image->id }}{{ Auth::user()->id }}"
                                                                    class="px-3 py-1 text-xs text-white-600 bg-black rounded-full">
                                                                    <svg width="20" height="20"
                                                                        viewBox="0 0 400 400" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M30.625 26.5625C26.875 28.8282 25 32.4219 25 37.3438C25 39.6094 25.3906 42.2657 25.8594 43.2032C26.3281 44.1407 41.0938 59.2969 58.6719 76.9532L90.5469 108.984L82.9688 115C58.4375 134.375 38.9062 160.547 27.8125 188.828C24.0625 198.516 24.0625 201.641 28.125 211.719C36.7188 233.359 48.125 250.938 64.4531 267.891C83.4375 287.656 103.359 301.25 127.891 311.25C150.938 320.703 173.516 325 200 325C229.453 325 254.609 319.609 280.156 307.813L286.562 304.844L320.391 338.828C339.062 357.5 355.234 373.281 356.406 373.906C357.578 374.531 360.391 375 362.656 375C370.234 375 375 370.234 375 362.656C375 360.391 374.609 357.734 374.141 356.797C373.672 355.859 358.906 340.625 341.328 323.047L309.375 291.016L315 286.719C322.578 281.016 337.188 266.797 344.141 258.516C355.078 245.391 365.547 227.891 371.797 211.953C376.016 201.406 376.016 198.594 371.797 188.047C363.594 167.266 351.641 148.828 335.547 132.109C312.656 108.359 286.953 92.5 255.859 82.8907C237.656 77.3438 221.328 75 200 75C170.625 75 145.234 80.3907 120.234 92.0313L113.438 95.1563L79.6094 61.1719C60.9375 42.5 44.7656 26.7188 43.5938 26.0938C40.4688 24.4532 33.75 24.6875 30.625 26.5625ZM219.141 101.641C245.938 104.453 271.719 114.453 295.703 131.328C304.453 137.578 322.422 155.234 328.906 164.063C339.062 177.891 349.062 197.422 348.047 201.406C347.109 205.156 339.219 220.547 334.531 227.734C328.125 237.656 321.797 245.234 312.422 254.375C305.234 261.328 292.188 271.875 290.781 271.875C290.469 271.875 283.828 265.469 276.016 257.578L261.797 243.359L264.922 238.359C268.828 231.875 272.188 223.125 273.828 214.922C275.703 205.859 275.078 188.047 272.734 179.766C265.234 154.141 245.859 134.766 220.234 127.266C211.953 124.922 194.141 124.297 185.078 126.172C176.875 127.813 168.125 131.172 161.641 135.078L156.641 138.203L145.156 126.719C138.75 120.391 133.594 115 133.594 114.766C133.594 113.984 147.656 108.828 156.406 106.328C175.938 100.859 196.875 99.2969 219.141 101.641ZM123.984 142.344L138.203 156.641L135.078 161.641C131.172 168.125 127.812 176.875 126.172 185.078C124.297 194.141 124.922 211.953 127.266 220.234C134.766 245.859 154.141 265.234 179.766 272.734C188.047 275.078 205.859 275.703 214.922 273.828C223.125 272.188 231.875 268.828 238.359 264.922L243.359 261.797L254.922 273.281C261.25 279.609 266.406 285 266.406 285.234C266.406 285.938 252.812 291.016 244.766 293.359C234.688 296.328 221.406 298.516 210.078 299.063C170.938 301.172 136.406 291.25 104.453 268.75C95.625 262.5 77.6562 244.844 71.0938 235.938C60.9375 222.109 50.9375 202.578 51.9531 198.594C52.8906 194.844 60.7812 179.453 65.4688 172.266C71.875 162.344 78.2031 154.766 87.5781 145.625C94.7656 138.672 107.812 128.125 109.219 128.125C109.531 128.125 116.172 134.531 123.984 142.344ZM207.422 151.172C224.062 152.969 239.766 165.859 246.641 183.203C248.672 188.281 248.828 189.453 248.828 200C248.828 211.016 248.75 211.484 246.25 217.734C244.766 221.328 243.438 224.219 243.125 224.219C242.422 224.219 175.781 157.578 175.781 156.875C175.781 156.641 178.594 155.234 182.109 153.906C188.047 151.641 197.266 150 201.562 150.469C202.656 150.625 205.312 150.938 207.422 151.172ZM190.781 209.141C209.219 227.578 224.219 242.813 224.219 243.125C224.219 243.359 221.406 244.688 217.969 246.016C190.234 256.719 159.297 240.703 151.875 211.641C150.938 207.969 150.703 204.375 150.938 197.656C151.25 189.844 151.641 187.813 153.828 182.188C155.234 178.672 156.562 175.781 156.875 175.781C157.188 175.781 172.422 190.781 190.781 209.141Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                </span>
                                                                <span
                                                                    id="span-true{{ $image->id }}{{ Auth::user()->id }}"
                                                                    class="px-3 py-1 text-xs text-violet-600 bg-violet-600 rounded-full dark:bg-gray-800 dark:text-violet-400"
                                                                    style="display:none">
                                                                    <svg width="20" height="20"
                                                                        viewBox="0 0 400 400" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M175.391 76.1717C121.641 83.203 74.375 112.187 45.0781 156.015C34.5312 171.875 25 192.656 25 200C25 209.14 37.8125 234.922 51.25 252.812C57.1875 260.781 71.1719 275.234 80.0781 282.656C106.562 304.844 140.625 319.375 176.562 323.906C193.359 326.015 220.312 325.078 236.719 321.875C266.562 316.094 297.344 301.562 319.922 282.656C328.75 275.312 342.734 260.781 348.516 253.125C362.188 234.922 375 209.14 375 200C375 190.859 362.188 165.078 348.516 146.875C342.734 139.219 328.75 124.687 319.922 117.344C293.516 95.1561 259.453 80.5467 224.141 76.1717C212.422 74.7655 186.562 74.7655 175.391 76.1717ZM219.141 101.64C245.938 104.453 271.719 114.453 295.703 131.328C304.453 137.578 322.422 155.234 328.906 164.062C339.062 177.89 349.062 197.422 348.047 201.406C347.109 205.156 339.219 220.547 334.531 227.734C318.125 252.969 293.125 273.984 265.234 285.937C243.281 295.39 224.062 299.297 199.688 299.297C175.859 299.219 156.406 295.234 135 286.094C112.344 276.328 89.9219 259.453 74.8438 240.703C65.9375 229.687 53.8281 208.906 51.9531 201.406C50.9375 197.422 60.9375 177.89 71.0938 164.062C77.6562 155.156 95.625 137.5 104.453 131.25C138.984 107.031 176.875 97.1874 219.141 101.64Z"
                                                                            fill="white" />
                                                                        <path
                                                                            d="M184.375 126.172C156.484 132.422 135.156 152.5 127.188 180.156C125.625 185.547 125.391 188.047 125.391 200C125.391 211.953 125.625 214.453 127.188 219.844C134.766 245.938 154.062 265.234 180.156 272.812C185.547 274.375 188.047 274.609 200 274.609C211.953 274.609 214.453 274.375 219.844 272.812C245.938 265.234 265.234 245.938 272.812 219.844C274.375 214.453 274.609 211.953 274.609 200C274.609 188.047 274.375 185.547 272.812 180.156C265.312 154.219 246.016 134.844 220.234 127.266C212.656 125.078 192.188 124.453 184.375 126.172ZM207.422 151.172C224.062 152.969 239.766 165.859 246.641 183.203C248.672 188.281 248.828 189.453 248.828 200C248.828 210.938 248.75 211.562 246.328 217.578C241.719 228.984 232.031 239.453 221.406 244.531C214.297 247.969 208.359 249.297 200 249.297C191.641 249.297 185.703 247.969 178.594 244.531C167.969 239.453 158.281 228.984 153.672 217.578C151.25 211.562 151.172 210.938 151.172 200C151.172 189.453 151.328 188.281 153.359 183.203C158.984 169.062 169.375 158.672 183.125 153.516C188.281 151.562 197.578 150 201.562 150.469C202.656 150.625 205.312 150.938 207.422 151.172Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                </span>
                                                            @endif
                                                        </div>

                                                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                                            {{ $image->titulo }}</h1>
                                                        <p class="leading-relaxed">
                                                        <p id="cantidad{{ $image->id }}{{ $evento->id }}">
                                                            Clientes:
                                                            @if (isset($image->clientes))
                                                                {{ count(json_decode($image->clientes, true)) }}
                                                            @else
                                                                0
                                                            @endif
                                                        </p>
                                                        <p>
                                                            Compras: {{ $image->cantidad_vendido }}
                                                        </p>
                                                        </p>
                                                        <div
                                                            class="mt-10 grid grid-cols-1 gap-x-1 gap-y-8 sm:grid-cols-3">
                                                            <div class="col-span-1 mx-1">
                                                                <button data-user="{{ Auth::user()->id }}"
                                                                    data-image="{{ $image->id }}"
                                                                    class="btn-estado w-full rounded-md bg-amber-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">
                                                                    @if ($image->estado)
                                                                        Ocultar
                                                                    @else
                                                                        Mostrar
                                                                    @endif
                                                                </button>
                                                            </div>
                                                            <div class="col-span-1 mx-1">
                                                                <a href="{{ route('fotografo.evento.galeria.editar', $image->id) }}"
                                                                    class="inline-block w-full rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-center">Editar</a>
                                                            </div>
                                                            <div class="col-span-1 mx-1">
                                                                <button data-evento="{{ $evento->id }}"
                                                                    data-image="{{ $image->id }}"
                                                                    class="btn-analizar w-full rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">Analizar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        {{-- <div class="lg:w-1/3 sm:w-1/2 p-4">
                                            <div class="flex relative">
                                                <img alt="gallery"
                                                    class="absolute inset-0 w-full h-full object-cover object-center"
                                                    src="https://dummyimage.com/601x361">
                                                <div
                                                    class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                                    <h2
                                                        class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                                        THE SUBTITLE</h2>
                                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The
                                                        Catalyzer</h1>
                                                    <p class="leading-relaxed">Photo booth fam kinfolk cold-pressed
                                                        sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lg:w-1/3 sm:w-1/2 p-4">
                                            <div class="flex relative">
                                                <img alt="gallery"
                                                    class="absolute inset-0 w-full h-full object-cover object-center"
                                                    src="https://dummyimage.com/603x363">
                                                <div
                                                    class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                                    <h2
                                                        class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                                        THE SUBTITLE</h2>
                                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The
                                                        400 Blows</h1>
                                                    <p class="leading-relaxed">Photo booth fam kinfolk cold-pressed
                                                        sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lg:w-1/3 sm:w-1/2 p-4">
                                            <div class="flex relative">
                                                <img alt="gallery"
                                                    class="absolute inset-0 w-full h-full object-cover object-center"
                                                    src="https://dummyimage.com/602x362">
                                                <div
                                                    class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                                    <h2
                                                        class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                                        THE SUBTITLE</h2>
                                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                                        Neptune</h1>
                                                    <p class="leading-relaxed">Photo booth fam kinfolk cold-pressed
                                                        sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lg:w-1/3 sm:w-1/2 p-4">
                                            <div class="flex relative">
                                                <img alt="gallery"
                                                    class="absolute inset-0 w-full h-full object-cover object-center"
                                                    src="https://dummyimage.com/605x365">
                                                <div
                                                    class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                                    <h2
                                                        class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                                        THE SUBTITLE</h2>
                                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Holden
                                                        Caulfield</h1>
                                                    <p class="leading-relaxed">Photo booth fam kinfolk cold-pressed
                                                        sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lg:w-1/3 sm:w-1/2 p-4">
                                            <div class="flex relative">
                                                <img alt="gallery"
                                                    class="absolute inset-0 w-full h-full object-cover object-center"
                                                    src="https://dummyimage.com/606x366">
                                                <div
                                                    class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                                    <h2
                                                        class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                                        THE SUBTITLE</h2>
                                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Alper
                                                        Kamu</h1>
                                                    <p class="leading-relaxed">Photo booth fam kinfolk cold-pressed
                                                        sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    {{-- js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if (session('mensaje'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            console.log("ingresa a success");
            toastr.success("{{ session('mensaje') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            console.log("ingresa a error")
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    <script>
        $(".btn-analizar").on("click", function() {
            var eventoId = $(this).data('evento');
            var imageId = $(this).data('image');
            console.log("evento id: ", eventoId);
            console.log("image id: ", imageId);

            var formData = new FormData();
            formData.append('evento_id', eventoId);
            formData.append('image_id', imageId);
            $.ajax({
                url: '/api/fotografo/evento/galeria/imagen/analizar',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(respuesta) {
                    console.log("success: ", respuesta.data.clientes.length);
                    $('#span-analizado' + imageId + eventoId).show();
                    $('#span-no-analizado' + imageId + eventoId).hide();
                    $('#cantidad' + imageId + eventoId).text("Clientes: " + respuesta.data.clientes
                        .length);
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    console.log("ingresa a success");
                    toastr.success("Imagen analizada exitosamente");
                },
                error: function(error) {
                    console.log("Error al subir las imágenes: ", error);
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    console.log("ingresa a error")
                    toastr.error("Error al analizar la imágen");
                }
            });
        });
        $(".btn-estado").on("click", function() {
            var userId = $(this).data('user');
            var imageId = $(this).data('image');
            console.log("user id: ", userId);
            console.log("image id: ", imageId);

            var formData = new FormData();
            formData.append('user_id', userId);
            formData.append('image_id', imageId);

            var button = $(this); // Guarda una referencia al botón

            $.ajax({
                url: '/api/fotografo/evento/galeria/imagen/estado',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(respuesta) {
                    console.log("success: ", respuesta);

                    var buttonText = button.text().trim().toLowerCase(); // Usa la referencia al botón
                    console.log("button text: ", button.text());
                    if (buttonText == "ocultar") {
                        $('#span-true' + imageId + userId).hide();
                        $('#span-false' + imageId + userId).show();
                        button.text("Mostrar");
                    } else if (buttonText == "mostrar") {
                        $('#span-true' + imageId + userId).show();
                        $('#span-false' + imageId + userId).hide();
                        button.text("Ocultar");
                    }
                },
                error: function(error) {
                    console.log("Error al subir las imágenes");
                }
            });
            console.log("click estado");
        });
    </script>
</x-app-layout>
