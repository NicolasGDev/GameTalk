<div class="fixed left-0 top-0 w-64 h-full bg-gray-950 p-4 z-50 sidebar-menu transition-transform">
    <a href="{{ route('dashboard') }}" class="flex items-center pb-4 border-b border-b-gray-800">

        <img src="{{ asset('images/Logo2.png') }}" width="160px" alt="">
    </a>
    <ul class="mt-4">
        @can('users.manage.index')
            <span class="text-gray-300 font-bold">ADMIN</span>
            <li class="mb-1 group ">
                <a href="{{ route('dashboard') }}"
                    class="flex font-semibold items-center py-2 px-4 gap-4 {{ request()->routeIs('dashboard') ? 'bg-main text-black' : 'text-white' }}    hover:bg-main hover:text-black rounded-md ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-home-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M10 12h4v4h-4z" />
                    </svg>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="{{ route('users.manage.index') }}"
                    class="flex font-semibold items-center py-2 px-4 gap-4 rounded-md
                    {{ request()->routeIs('users.manage.index') ? 'bg-main text-black' : 'text-white' }}
                    hover:bg-main hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon justify-end icon-tabler icons-tabler-outline icon-tabler-users">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                    </svg>
                    <span class="text-sm">Users</span>
                </a>
            </li>

            {{-- <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-4 gap-4 text-white hover:bg-main hover:text-black rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon justify-end icon-tabler icons-tabler-outline icon-tabler-users">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                </svg>
                <span class="text-sm">Users</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="currentColor" class="icon icon-tabler pl-2 icons-tabler-filled icon-tabler-caret-down">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M18 9c.852 0 1.297 .986 .783 1.623l-.076 .084l-6 6a1 1 0 0 1 -1.32 .083l-.094 -.083l-6 -6l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057v-.118l.005 -.058l.009 -.06l.01 -.052l.032 -.108l.027 -.067l.07 -.132l.065 -.09l.073 -.081l.094 -.083l.077 -.054l.096 -.054l.036 -.017l.067 -.027l.108 -.032l.053 -.01l.06 -.01l.057 -.004l12.059 -.002z" />
                </svg>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                <li class="p-2 hover:bg-gray-900 rounded-md">
                    <a href=""
                        class="text-white text-sm flex items-center hover:text-main before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All</a>
                </li>
                <li class="p-2 hover:bg-gray-900 rounded-md">
                    <a href=""
                        class="text-white text-sm flex items-center hover:text-main before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Roles</a>
                </li>
            </ul>
        </li> --}}

            <li class="mb-1 group">
                <a href="{{ route('users.manage.index') }}"
                    class="flex font-semibold items-center {{ request()->routeIs('users.manage.index') ? 'bg-main text-black' : 'text-white' }} py-2 px-4 gap-4  hover:bg-main hover:text-black rounded-md ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-key">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z" />
                        <path d="M15 9h.01" />
                    </svg>
                    <span class="text-sm">Roles y permisos</span>
                </a>
            </li>
        @endcan
        <span class="text-white font-bold">BLOG</span>
        <li class="mb-1 group text-white">
            <a href="{{ route('posts.manage.index') }}"
                class="flex font-semibold items-center py-2 px-4 gap-4   hover:bg-main hover:text-black rounded-md {{ request()->routeIs('posts.manege.index') ? 'bg-main text-black' : 'text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-pencil-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                    <path d="M13.5 6.5l4 4" />
                    <path d="M16 19h6" />
                    <path d="M19 16v6" />
                </svg>
                <span class="text-sm">Post</span>

            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ route('categories.manage.index') }}"
                class="flex font-semibold items-center {{ request()->routeIs('categories.manege.index') ? 'bg-main text-black' : 'text-white' }} py-2 px-4 gap-4  hover:bg-main hover:text-black rounded-md ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-category-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 4h6v6h-6zm10 0h6v6h-6zm-10 10h6v6h-6zm10 3h6m-3 -3v6" />
                </svg>
                <span class="text-sm">Categorias</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ route('tags.manage.index') }}"
                class="flex font-semibold items-center {{ request()->routeIs('tags.manege.index') ? 'bg-main text-black' : 'text-white' }} py-2 px-4 gap-4  hover:bg-main hover:text-black rounded-md ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-tags">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M3 8v4.172a2 2 0 0 0 .586 1.414l5.71 5.71a2.41 2.41 0 0 0 3.408 0l3.592 -3.592a2.41 2.41 0 0 0 0 -3.408l-5.71 -5.71a2 2 0 0 0 -1.414 -.586h-4.172a2 2 0 0 0 -2 2z" />
                    <path d="M18 19l1.592 -1.592a4.82 4.82 0 0 0 0 -6.816l-4.592 -4.592" />
                    <path d="M7 10h-.01" />
                </svg>
                <span class="text-sm">Etiquetas</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ route('comment.index') }}"
                class="flex font-semibold items-center {{ request()->routeIs('tags.manege.index') ? 'bg-main text-black' : 'text-white' }} py-2 px-4 gap-4  hover:bg-main hover:text-black rounded-md ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-message">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 9h8" />
                    <path d="M8 13h6" />
                    <path
                        d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
                </svg>
                <span class="text-sm">Comentarios</span>
            </a>
        </li>
    </ul>
</div>
