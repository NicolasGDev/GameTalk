@extends('layouts.admin')
@section('content')
    <div class="flex flex-col gap-6">
        <h1 class="text-3xl text-white font-bold ">Usuarios</h1>
        <p class="text-gray-200 text-xl">Listado de los usuarios registrados en el sistema</p>
        @can('users.manage.create')
            <x-create-button :route="route('users.manage.create')"></x-create-button>
        @endcan
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
                @if ($user->id !== auth()->id())
                    <!-- Filtrar al usuario logueado -->
                    <tbody class="bg-gray-900 text-gray-200">
                        <tr class="border-b  dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->username }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}

                            </td>
                            <td class="px-6 py-4 ">

                                {{ $user->getRoleNames()->first() ?? 'Sin rol' }}

                            </td>

                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('users.manage.edit', $user->id) }}" data-id="{{ $user->id }}"
                                    class="px-6   py-2 bg-blue-600 flex items-center gap-2  hover:bg-blue-500 font-semibold rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                        <path d="M13.5 6.5l4 4" />
                                    </svg>Editar</a>
                                @can('users.manage.destroy')
                                    <form method="POST" class="delete-form"
                                        action="{{ route('users.manage.destroy', $user->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <x-delete-button />

                                    </form>
                                @endcan
                            </td>
                        </tr>

                    </tbody>
                @endif
            @endforeach
        </table>
    </div>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Evita el envío del formulario por defecto.

                    const form = this.closest(
                        '.delete-form'); // Selecciona el formulario asociado al botón.

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'No podrás revertir esta acción.',
                        icon: 'warning',
                        color: '#FFFFFF',
                        iconColor: '#FACC15',
                        background: '#1F2937',
                        showCancelButton: true,
                        confirmButtonColor: '#2563EB',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar',

                    }).then((result) => {
                        if (result.isConfirmed) {

                            Swal.fire({

                                title: "Eliminado!",
                                text: "Registro eliminado correctamente",
                                icon: "success",
                                background: '#1F2937',
                                color: '#FFFFFF',
                            });
                            setTimeout(() => {
                                form
                                    .submit(); // Enviar el formulario después de mostrar el mensaje
                            }, 800);
                            // Envia el formulario si se confirma la acción.
                        }
                    });
                });
            });
        });
    </script>
@endsection
