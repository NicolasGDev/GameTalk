<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/menu.js'])
</head>

<body class="bg-gray-950  bg-cover bg-center   bg-no-repeat">
    <!--Navbar-->
    <header class="bg-gray-950 pb-24">
        <x-nav-bar />
    </header>
    <main class="container mx-auto  px-4 py-8 max-w-[1280px] w-[90%]">
        <section class="mb-12">
            <h2 class="text-3xl text-white font-bold mb-6">Noticias Destacadas</h2>
            <div class="grid bg-[url('/')] grid-cols-1 md:grid-cols-2 gap-6">
                <article class="rounded-lg shadow-md overflow-hidden">
                    <img src="https://bloody-disgusting.com/wp-content/uploads/2024/05/littlenightmares3.jpg"
                        alt="Noticia Destacada 1" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="text-2xl text-main font-semibold mb-2">Titular de la Noticia Destacada 1</h3>
                        <p class="text-white">Descripción detallada de la noticia destacada 1. Este es un resumen más
                            extenso del contenido principal, proporcionando más contexto e información al lector.</p>
                        <a href="#"
                            class="inline-block mt-4 rounded-md hover:bg-white hover:text-black font-semibold border border-white px-6 py-2 text-white">Leer
                            más</a>
                    </div>
                </article>
                <article class="bg-gray-900 rounded-lg shadow-md overflow-hidden">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7JkYlcbwvGbsJ6Ez8XsZhdlppYlVnpBZ8Vg&s"
                        alt="Noticia Destacada 2" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="text-2xl text-main font-semibold mb-2">Titular de la Noticia Destacada 2</h3>
                        <p class="text-white">Descripción detallada de la noticia destacada 2. Este es un resumen más
                            extenso del contenido principal, proporcionando más contexto e información al lector.</p>
                        <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Leer más</a>
                    </div>
                </article>
            </div>
        </section>
        <section class="mb-12 bg-gray-900 p-6">
            <h2 class="text-3xl text-white font-bold mb-6">Últimas Noticias</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://tec.com.pe/wp-content/uploads/2016/04/Nameless-750x430.jpg" alt="Noticia 1"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Titular de la Noticia 1</h3>
                        <p class="text-gray-600">Breve descripción de la noticia 1. Esto es un resumen del contenido
                            principal.</p>
                        <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Leer más</a>
                    </div>
                </article>
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/placeholder.svg?height=200&width=400" alt="Noticia 2" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Titular de la Noticia 2</h3>
                        <p class="text-gray-600">Breve descripción de la noticia 2. Esto es un resumen del contenido
                            principal.</p>
                        <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Leer más</a>
                    </div>
                </article>
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/placeholder.svg?height=200&width=400" alt="Noticia 3" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Titular de la Noticia 3</h3>
                        <p class="text-gray-600">Breve descripción de la noticia 3. Esto es un resumen del contenido
                            principal.</p>
                        <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Leer más</a>
                    </div>
                </article>

            </div>
        </section>

        <section>
            <h2 class="text-3xl text-white font-bold mb-6">Reseñas Destacadas</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <article class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row">
                    <img src="/placeholder.svg?height=200&width=200" alt="Reseña 1"
                        class="w-full md:w-1/3 h-48 md:h-auto object-cover">
                    <div class="p-4 w-full md:w-2/3">
                        <h3 class="text-xl font-semibold mb-2">Título de la Reseña 1</h3>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-500">★★★★☆</span>
                            <span class="ml-2 text-gray-600">4.0</span>
                        </div>
                        <p class="text-gray-600">Breve resumen de la reseña 1. Aquí se describe el producto o servicio
                            evaluado, destacando sus principales características y la opinión general del revisor.</p>
                        <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Leer reseña
                            completa</a>
                    </div>
                </article>
                <article class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row">
                    <img src="/placeholder.svg?height=200&width=200" alt="Reseña 2"
                        class="w-full md:w-1/3 h-48 md:h-auto object-cover">
                    <div class="p-4 w-full md:w-2/3">
                        <h3 class="text-xl font-semibold mb-2">Título de la Reseña 2</h3>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-500">★★★★★</span>
                            <span class="ml-2 text-gray-600">5.0</span>
                        </div>
                        <p class="text-gray-600">Breve resumen de la reseña 2. Aquí se describe el producto o servicio
                            evaluado, destacando sus principales características y la opinión general del revisor.</p>
                        <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Leer reseña
                            completa</a>
                    </div>
                </article>
            </div>
        </section>
    </main>
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-wrap justify-between">
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-2">MiPortal</h3>
                    <p class="text-gray-400">Tu fuente confiable de noticias y reseñas.</p>
                </div>
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-2">Enlaces Rápidos</h3>
                    <ul class="text-gray-400">
                        <li><a href="#" class="hover:text-white">Acerca de Nosotros</a></li>
                        <li><a href="#" class="hover:text-white">Política de Privacidad</a></li>
                        <li><a href="#" class="hover:text-white">Términos de Servicio</a></li>
                        <li><a href="#" class="hover:text-white">Contacto</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/3">
                    <h3 class="text-xl font-bold mb-2">Síguenos</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 text-center text-sm text-gray-400">
                © 2023 MiPortal. Todos los derechos reservados.
            </div>
        </div>
    </footer>

    <script>
        const profileButton = document.getElementById("profileButton");
        const dropdownMenu = document.getElementById("dropdownMenu");
        const profileDropdown = document.getElementById("profileDropdown");

        profileButton.addEventListener("click", function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", function(e) {
            if (!profileDropdown.contains(e.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    </script>

</body>

</html>
