<nav id="nav" class="fixed top-0 right-0 h-full hidden shadow-lg text-center bg-gray-950 p-6 w-2/3  z-50">
    <div class="absolute top-0 right-0 px-6 py-6">
        <button id="cerrar">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler text-main icons-tabler-outline icon-tabler-x">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
            </svg>
        </button>
    </div>
    <ul
        class="[&>a>li]:text-white [&>li>a]:font-bold [&>a>li>p]:text-xl flex flex-col h-full justify-center items-center gap-8 ">


        <a class=" w-full transition-colors {{ Route::is('news') ? 'bg-main' : 'hover:text-main' }}"
            href="{{ route('news') }}">
            <li class="hover:bg-main hover:text-black font-bold px-4 py-2 rounded-lg">
                <p>Noticias</p>
            </li>
        </a>

        <a class="w-full transition-colors {{ Route::is('reviews') ? 'bg-main' : 'hover:text-main' }}"
            href="{{ route('reviews') }}">
            <li class="hover:bg-main hover:text-black font-bold px-4 py-2 rounded-lg">
                <p>Reseñas</p>
            </li>
        </a>
        <a class="w-full transition-colors" href="/menu">
            <li class="hover:bg-main hover:text-black font-bold px-4 py-2 rounded-lg">
                <p>Guias</p>
            </li>
        </a>
        <a class="w-full transition-colors {{ Route::is('forums') ? 'bg-main' : 'hover:text-main' }}"
            href="{{ route('forums') }}">
            <li class="hover:bg-main hover:text-black font-bold px-4 py-2 rounded-lg">
                <p>Foros</p>
            </li>
        </a>
        @if (Route::has('login'))
            @auth
                <a class="w-full transition-colors cursor-pointer" id="perfil-toggle">
                    <li
                        class="hover:bg-main hover:text-black font-bold px-4  py-2 rounded-lg flex justify-center items-center">
                        <p>Dashboard</p>
                    </li>
                </a>
                <a class="w-full transition-colors cursor-pointer" id="config">
                    <li
                        class="hover:bg-main open-modal hover:text-black font-bold px-4  py-2 rounded-lg flex justify-center items-center">
                        <p>Configuracion</p>
                    </li>
                </a>
                <a class="w-full transition-colors cursor-pointer" id="perfil-toggle">
                    <li
                        class="hover:bg-main hover:text-black font-bold px-4  py-2 rounded-lg flex justify-center items-center">
                        <p>Cerrar sesion</p>
                    </li>
                </a>
            @else
                <a class="w-full transition-colors" href="{{ route('login') }}">
                    <li class="hover:bg-main hover:text-black font-bold px-4 py-2 rounded-lg">
                        <p>Iniciar sesion</p>
                    </li>
                </a>
            @endauth
        @endif

    </ul>
</nav>

<header class="fixed w-full z-40 bg-gray-900 border-b border-gray-800">
    <nav class="py-4 max-w-screen-xl  w-[90%] mx-auto flex  items-center justify-between">
        <a href="{{ route('home') }}" class="">
            <img src="{{ asset('images/logo2.png') }}" width="250px" alt="">
        </a>

        <button class="md:hidden" id="abrir">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler text-white icons-tabler-outline icon-tabler-menu-2">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 6l16 0" />
                <path d="M4 12l16 0" />
                <path d="M4 18l16 0" />
            </svg>
        </button>
        <ul class="hidden md:flex gap-6  text-white [&>li>a]:transition-colors justify-center ">

            <li>
                <a class="hover:text-main text-lg font-semibold {{ Route::is('news') ? 'text-main' : 'hover:text-main' }}"
                    href="{{ route('news') }}">
                    Noticias
                </a>
            </li>

            <li>
                <a class="hover:text-main text-lg font-semibold {{ Route::is('reviews') ? 'text-main' : 'hover:text-main' }}"
                    href="{{ route('reviews') }}">
                    Reseñas
                </a>
            </li>
            <li>
                <a class="hover:text-main text-lg font-semibold" href="#">
                    Guias
                </a>
            </li>
            <li>
                <a class="hover:text-main text-lg font-semibold {{ Route::is('forums') ? 'text-main' : 'hover:text-main' }}"
                    href="{{ route('forums') }}">
                    Foros
                </a>
            </li>
            @if (Route::has('login'))
                @auth

                    <li class="relative">
                        <a
                            class="hover:text-main profileDropdown  flex items-center gap-2 text-lg font-semibold focus:outline-none">
                            Perfil
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-caret-down">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M18 9c.852 0 1.297 .986 .783 1.623l-.076 .084l-6 6a1 1 0 0 1 -1.32 .083l-.094 -.083l-6 -6l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057v-.118l.005 -.058l.009 -.06l.01 -.052l.032 -.108l.027 -.067l.07 -.132l.065 -.09l.073 -.081l.094 -.083l.077 -.054l.096 -.054l.036 -.017l.067 -.027l.108 -.032l.053 -.01l.06 -.01l.057 -.004l12.059 -.002z" />
                            </svg>
                        </a>
                        <div id="dropdownMenu"
                            class="absolute right-0 mt-2 w-48 bg-gray-900 rounded-md shadow-lg py-1 z-10 text-white hidden">
                            @can('dashboard')
                                <a href="{{ route('dashboard') }}"
                                    class="block hover:text-black px-4 py-2 text-sm  hover:bg-main">
                                    Dashboard
                                </a>
                            @endcan
                            <a href="#" id="configuration"
                                class="block hover:text-black px-4 py-2 open-modal text-sm  hover:bg-main">
                                Configuración
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="block hover:text-black px-4 py-2 text-sm  hover:bg-main">
                                    Cerrar sesión
                                </a>
                            </form>

                        </div>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="hover:text-main text-lg font-semibold">
                            Iniciar sesion
                        </a>
                    </li>
                @endauth
            @endif

        </ul>
    </nav>
</header>
