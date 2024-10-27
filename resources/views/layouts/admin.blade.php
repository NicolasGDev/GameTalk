<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->



    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <!-- sidenav -->
    @include('components.sidebar')
    <!-- end sidenav -->

    <main
        class=" relative flex flex-col w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-900 min-h-screen transition-all main">
        <!-- navbar -->


        @include('components.admin-nav')


        <!-- end navbar -->
        <div class="relative flex-1 p-6">
            <div class=" border border-gray-500 rounded-lg p-6">
                @yield('content')
            </div>
        </div>

    </main>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Evita el envío del formulario por defecto.

                    const form = this.closest(
                        '.delete-form'); // Selecciona el formulario asociado al botón.

                    Swal.fire({
                        title: '¿Estás segur@?',
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
                            }, 500);
                            // Envia el formulario si se confirma la acción.
                        }
                    });
                });
            });
        });

        // Espera a que la página esté completamente cargada
    </script>

</body>


</html>
