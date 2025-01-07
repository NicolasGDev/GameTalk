<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GameTalk novedades gaming</title>

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

<body id="bg" class="flex z-40 flex-col  bg-cover bg-center   bg-no-repeat">

    <!--Navbar-->
    <x-nav-bar />

    <main class=" pt-20 bg-gray-900 relative">
        @yield('content')
        <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-70 z-40"></div>
        <x-config-modal />
    </main>
    <!--Footer-->
    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/configModal.js') }}"></script>
    <script src="{{ asset('js/navbarDropdown.js') }}"></script>
</body>

</html>
