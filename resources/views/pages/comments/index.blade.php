@extends('layouts.admin')
@section('content')
    <div class="flex flex-col gap-6">
        <h1 class="text-3xl text-white font-bold ">Gestion de comentarios reportados</h1>



    </div>

    <div class="relative mt-20 overflow-x-auto border border-gray-500">

        <table class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
            <thead class="text-xs  uppercase bg-gray-900 text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Comentario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                </tr>

            </thead>

            @if ($comments->isEmpty())
                <th scope="row" colspan="4"
                    class="px-6 py-4 text-white font-medium text-center whitespace-normal break-words max-w-xs">
                    No hay comentarios reportados
                </th>
            @endif
            @foreach ($comments as $comment)
                <tbody class="bg-gray-900 text-gray-200">
                    <tr class="border-b  dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-normal break-words max-w-xs">
                            {{ $comment->body }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $comment->user->username }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $comment->created_at }}
                        </th>
                        <td class="px-6 py-4 flex gap-2">



                            <form method="POST" action="{{ route('comment.allow', $comment->id) }}">
                                @method('PUT')
                                @csrf
                                <button type="submit"
                                    class="px-6  py-2 bg-green-700 flex max-w-32 items-center gap-2  hover:bg-green-600 font-semibold rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-circle-dashed-check">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" />
                                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" />
                                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" />
                                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69" />
                                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" />
                                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" />
                                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" />
                                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" />
                                        <path d="M9 12l2 2l4 -4" />
                                    </svg>Permitir
                                </button>
                            </form>
                            <form method="POST" class="delete-form" action="{{ route('comment.destroy', $comment->id) }}">
                                @method('DELETE')
                                @csrf
                                <x-delete-button delete-buton />
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
