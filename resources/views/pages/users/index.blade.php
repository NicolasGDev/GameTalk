@extends('layouts.admin')
@section('content')
    <div class="flex flex-col gap-6">
        <h1 class="text-3xl text-white font-bold ">Usuarios</h1>
        <p class="text-gray-200 text-xl">Listado de los usuarios registrados en el sistema</p>
        <a href="{{ route('user.create') }}"
            class="px-8 py-3 flex gap-4 max-w-40 text-main cursor-pointer items-center hover:bg-main hover:text-black rounded-md font-semibold border border-main">
            Añadir
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
        </a>
    </div>

    <div class="relative mt-20 overflow-x-auto border border-gray-500">

        <table class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
            <thead class="text-xs  uppercase bg-gray-900 text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rol
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            @foreach ($users as $user)
                <tbody class="bg-gray-900 text-gray-200">
                    <tr class="border-b  dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            Undefined
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 ">

                            undefined
                        </td>

                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{ route('user.edit', $user->id) }}" data-id="{{ $user->id }}"
                                class="px-6   py-2 bg-blue-600 flex items-center gap-2  hover:bg-blue-500 font-semibold rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                    <path d="M13.5 6.5l4 4" />
                                </svg>Editar</a>
                            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                @method('DELETE')
                                @csrf
                                <x-delete-button />
                            </form>

                        </td>
                    </tr>

                </tbody>
            @endforeach
        </table>
    </div>
    </div>


    <!-- Modal -->

    <script>
        // Seleccionar elementos
        // const openModalBtn = document.querySelector('.abrirModal');
        // const closeModalBtn = document.getElementById('closeModalBtn');
        // const modal = document.getElementById('modal');

        // // Mostrar el modal
        // openModalBtn.addEventListener('click', () => {
        //     modal.classList.remove('hidden');
        //     console.log('hola');
        // });

        // // Cerrar el modal
        // closeModalBtn.addEventListener('click', () => {
        //     modal.classList.add('hidden');
        // });

        // // Cerrar el modal al hacer clic fuera del contenido
        // window.addEventListener('click', (e) => {
        //     if (e.target === modal) {
        //         modal.classList.add('hidden');
        //     }
        // });
    </script>
@endsection
