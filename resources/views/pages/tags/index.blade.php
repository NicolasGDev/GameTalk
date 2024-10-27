@extends('layouts.admin')
@section('content')
    <div class="flex flex-col gap-6">
        <h1 class="text-3xl text-white font-bold ">Etiquetas</h1>
        <p class="text-gray-200 text-xl">Listado de los tags pertenecientes a los posts</p>
        @can('tags.manage.create')
            <x-create-button :route="route('tags.manage.create')"></x-create-button>
        @endcan
    </div>

    <div class="relative mt-20 overflow-x-auto border border-gray-500">

        <table class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
            <thead class="text-xs  uppercase bg-gray-900 text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre categoria
                    </th>


                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            @foreach ($tags as $tag)
                <tbody class="bg-gray-900 text-gray-200">
                    <tr class="border-b  dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $tag->name }}
                        </th>


                        <td class="px-6 py-4 flex gap-2">
                            @can('tags.manage.edit')
                                <a href="{{ route('tags.manage.edit', $tag->id) }}" data-id="{{ $tag->id }}"
                                    class="px-6   py-2 bg-blue-600 flex items-center gap-2  hover:bg-blue-500 font-semibold rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                        <path d="M13.5 6.5l4 4" />
                                    </svg>Editar
                                </a>
                            @endcan
                            @can('tags.manage.destroy')
                                <form method="POST" class="delete-form" action="{{ route('tags.manage.destroy', $tag->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <x-delete-button />
                                </form>
                            @endcan
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
