<nav id="nav" class="fixed top-0 right-0 h-full hidden shadow-lg text-center bg-gray-950 p-6 w-full  z-50">
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
        <img src="{{ 'images/Logo2.png' }}" width="250px" alt="">
        <div class="flex justify-center gap-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon hover:text-main text-white icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                <path d="M16.5 7.5l0 .01" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                fill="currentColor"
                class="icon hover:text-main icon-tabler text-white icons-tabler-filled icon-tabler-brand-discord">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M14.983 3l.123 .006c2.014 .214 3.527 .672 4.966 1.673a1 1 0 0 1 .371 .488c1.876 5.315 2.373 9.987 1.451 12.28c-1.003 2.005 -2.606 3.553 -4.394 3.553c-.732 0 -1.693 -.968 -2.328 -2.045a21.512 21.512 0 0 0 2.103 -.493a1 1 0 1 0 -.55 -1.924c-3.32 .95 -6.13 .95 -9.45 0a1 1 0 0 0 -.55 1.924c.717 .204 1.416 .37 2.103 .494c-.635 1.075 -1.596 2.044 -2.328 2.044c-1.788 0 -3.391 -1.548 -4.428 -3.629c-.888 -2.217 -.39 -6.89 1.485 -12.204a1 1 0 0 1 .371 -.488c1.439 -1.001 2.952 -1.459 4.966 -1.673a1 1 0 0 1 .935 .435l.063 .107l.651 1.285l.137 -.016a12.97 12.97 0 0 1 2.643 0l.134 .016l.65 -1.284a1 1 0 0 1 .754 -.54l.122 -.009zm-5.983 7a2 2 0 0 0 -1.977 1.697l-.018 .154l-.005 .149l.005 .15a2 2 0 1 0 1.995 -2.15zm6 0a2 2 0 0 0 -1.977 1.697l-.018 .154l-.005 .149l.005 .15a2 2 0 1 0 1.995 -2.15z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                fill="currentColor"
                class="icon hover:text-main icon-tabler text-white icons-tabler-filled icon-tabler-brand-facebook">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M18 2a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -.883 .993l-.117 .007h-3v1h3a1 1 0 0 1 .991 1.131l-.02 .112l-1 4a1 1 0 0 1 -.858 .75l-.113 .007h-2v6a1 1 0 0 1 -.883 .993l-.117 .007h-4a1 1 0 0 1 -.993 -.883l-.007 -.117v-6h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-4a1 1 0 0 1 .883 -.993l.117 -.007h2v-1a6 6 0 0 1 5.775 -5.996l.225 -.004h3z" />
            </svg>
        </div>
        <a class=" w-full transition-colors" href="/">
            <li class="hover:bg-main hover:text-black font-bold px-4 py-2 rounded-lg">
                <p>Noticias</p>
            </li>
        </a>

        <a class="w-full transition-colors" href="/menu">
            <li class="hover:bg-main hover:text-black font-bold px-4 py-2 rounded-lg">
                <p>Analisis</p>
            </li>
        </a>
        <a class="w-full transition-colors" href="{{ route('login') }}">
            <li class="hover:bg-main hover:text-black font-bold px-4 py-2 rounded-lg">
                <p>Iniciar sesion</p>
            </li>
        </a>
    </ul>
</nav>

<header class="fixed w-full z-40 bg-gray-950 ">
    <nav class="py-4 max-w-screen-xl  w-[90%] mx-auto flex  items-center justify-between">
        <a href="{{ route('home') }}">
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

            <li><a class="hover:text-main text-lg font-semibold" href="#">Noticias</a></li>
            <li class="relative">
                <a
                    class="hover:text-main flex profileDropdown items-center gap-2 text-lg font-semibold focus:outline-none">
                    Categorias
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-caret-down">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M18 9c.852 0 1.297 .986 .783 1.623l-.076 .084l-6 6a1 1 0 0 1 -1.32 .083l-.094 -.083l-6 -6l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057v-.118l.005 -.058l.009 -.06l.01 -.052l.032 -.108l.027 -.067l.07 -.132l.065 -.09l.073 -.081l.094 -.083l.077 -.054l.096 -.054l.036 -.017l.067 -.027l.108 -.032l.053 -.01l.06 -.01l.057 -.004l12.059 -.002z" />
                    </svg>
                </a>
                <div id="dropdownMenu"
                    class="absolute right-0 mt-2 w-48 bg-gray-900 rounded-md shadow-lg py-1 z-10 text-white hidden">

                    <a href="profile" class="block hover:text-black px-4 py-2 text-sm  hover:bg-main">
                        Mundo abierto
                    </a>
                    <a href="profile" class="block hover:text-black px-4 py-2 text-sm  hover:bg-main">
                        Shoters
                    </a>
                    <a href="profile" class="block hover:text-black px-4 py-2 text-sm  hover:bg-main">
                        RPG
                    </a>
                    <a href="profile" class="block hover:text-black px-4 py-2 text-sm  hover:bg-main">
                        Terror
                    </a>
                    <a href="profile" class="block hover:text-black px-4 py-2 text-sm  hover:bg-main">
                        Aventura
                    </a>
                </div>
            </li>
            <li><a class="hover:text-main text-lg font-semibold" href="#">Analisis</a></li>
            <li><a class="hover:text-main text-lg font-semibold" href="#">Guias</a></li>

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
                            <a href="profile" class="block hover:text-black px-4 py-2 text-sm  hover:bg-main">
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
