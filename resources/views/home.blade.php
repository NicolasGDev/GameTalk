@extends('layouts.app')
@section('content')
    <main>
        <div class=" bg-gray-900">
            <section class=" px-4 py-8 max-w-[1280px] mx-auto  w-[90%]">
                <h1 class="text-white text-3xl font-bold">Ultimas noticias</h1>
                <div class="grid  grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($headerPosts as $post)
                        <a href="{{ route('page.show', $post->id) }}">
                            <article
                                class="rounded-lg relative flex bg-center bg-no-repeat bg-cover items-end h-[500px] shadow-md bg-[url('{{ $post->post_image }}')] overflow-hidden"
                                style="background-image: url('{{ $post->post_image }}')">
                                <div class="absolute inset-0 bg-black opacity-30"></div>
                                <div class="p-4 z-30">
                                    <div class="flex">
                                        <p class="text-white text-2xl font-bold">{{ $post->categories->name }}</p>

                                    </div>

                                    <h3 class="text-4xl text-white font-semibold mb-2">{{ $post->title }}</h3>
                                </div>
                            </article>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
        <div class="bg-gray-950 py-6">
            <section class="max-w-[1280px] mx-auto  w-[90%]">
                <section class=" p-6 ">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($otherPosts as $post)
                            <a href="{{ route('page.show', $post->id) }}">
                                <article
                                    class="rounded-lg relative flex bg-center bg-no-repeat bg-cover items-end h-[300px] shadow-md bg-[url('{{ $post->post_image }}')] overflow-hidden"
                                    style="background-image: url('{{ $post->post_image }}')">
                                    <div class="absolute inset-0 bg-black opacity-30"></div>
                                    <div class="p-4 z-30">
                                        <div class="flex">
                                            <p class="text-white text-2xl font-bold">{{ $post->categories->name }}</p>
                                        </div>
                                        <h3 class="text-2xl text-white font-semibold mb-2">{{ $post->title }}</h3>
                                    </div>
                                </article>
                            </a>
                        @endforeach
                    </div>
                </section>
        </div>
        <div class="py-20 bg-gray-900">

        </div>
    </main>


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
@endsection
