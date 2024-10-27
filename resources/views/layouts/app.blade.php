<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/menu.js'])
</head>
<style>

</style>

<body class=" flex flex-col  bg-cover bg-center   bg-no-repeat">

    <!--Navbar-->
    <x-nav-bar />

    <main class="pt-20 bg-gray-100">
        @yield('content')
    </main>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.querySelectorAll('.profileDropdown').forEach((dropdown) => {
            const menu = dropdown.nextElementSibling;

            dropdown.addEventListener('click', function(e) {
                e.stopPropagation();
                menu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target)) {
                    menu.classList.add('hidden');
                }
            });
        });
    </script>

</body>

</html>
