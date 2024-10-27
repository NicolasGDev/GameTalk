@extends('layouts.admin')
@section('content')
    <div class="flex flex-col gap-6">
        <h1 class="text-3xl text-white font-bold ">Publicaciones</h1>
        <p class="text-gray-200 text-xl">Listado de las Publicaciones realizadas</p>
        <x-create-button :route="route('posts.manage.create')"></x-create-button>
    </div>

    <div class="relative mt-20 overflow-x-auto border border-gray-500">

        <table class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
            <thead class="text-xs  uppercase bg-gray-900 text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Escritor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de creacions
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Etiquetas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            @foreach ($posts as $post)
                <tbody class="bg-gray-900 text-gray-200">
                    <tr class="border-b  dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-normal break-words max-w-xs">
                            {{ $post->title }}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $post->categories->name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $post->users->name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $post->created_at }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            @if ($post->tags->isNotEmpty())
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($post->tags as $tag)
                                        <div class="flex flex-col">
                                            #{{ $tag->name }}
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-400">Sin tags</span>
                            @endif
                        </th>


                        <th class="px-6 py-4 flex flex-col gap-2">
                            @can('posts.manage.edit')
                                <a href="{{ route('posts.manage.edit', $post->id) }}" data-id="{{ $post->id }}"
                                    class="px-6   py-2 bg-blue-600 flex max-w-32 items-center gap-2  hover:bg-blue-500 font-semibold rounded-md">
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
                            @can('posts.manage.destroy')
                                <form method="POST" class="delete-form"
                                    action="{{ route('posts.manage.destroy', $post->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="post" value="{{ $post->id }}">
                                    <x-delete-button />
                                </form>
                            @endcan
                        </th>
                    </tr>

                </tbody>
                {!! $post->body !!}
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
