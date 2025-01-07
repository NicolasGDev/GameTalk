<div class="py-2 px-6 bg-gray-900 flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg md:hidden text-white font-semibold sidebar-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 6l16 0" />
            <path d="M4 12l16 0" />
            <path d="M4 18l16 0" />
        </svg>
    </button>

    <ul class="ml-auto flex items-center">

        <li class="">
            <button type="button"
                class=" text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler text-white  hover:text-main icons-tabler-outline icon-tabler-bell">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                </svg>
            </button>
        </li>
        <button id="fullscreen-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler text-white hover:text-main icons-tabler-outline icon-tabler-maximize">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
            </svg>
        </button>
        <script></script>

        <li class="ml-3">
            <button type="button" class="dropdown-toggle flex items-center">
                <div class="flex-shrink-0 w-10 h-10 relative">
                    <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                        <img class="w-8 h-8 rounded-full" src="{{ asset(auth()->user()->profile_image) }}"
                            alt="" />
                        <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400   rounded-full animate-ping">
                        </div>
                        <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500   rounded-full">
                        </div>
                    </div>
                </div>
                <div class="p-2 md:block text-left">
                    <h2 class="text-sm font-semibold text-main">{{ Auth::user()->name }}</h2>
                    <p class="text-xs text-gray-500"></p>
                </div>
            </button>
            <ul
                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-lg bg-gray-900 border fixed w-full max-w-[140px]">
                <li>
                    <a
                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-300 hover:text-black hover:bg-main">Profile</a>
                </li>
                <li>
                    <a
                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-300 hover:text-black hover:bg-main">Settings</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('user.logout') }}"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            class="block hover:text-black text-gray-300 px-4 py-2 text-sm  hover:bg-main">
                            Cerrar sesión
                        </a>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <script></script>

</div>
