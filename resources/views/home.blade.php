@extends('layouts.app')
@section('content')
    <main>
        <div class=" bg-gray-900">
            <section class=" py-10 md:max-w-[1280px] mx-auto  md:w-[90%]">
                <h2 class="text-white px-4 md:px-0 font-bold text-3xl">Lo ultimo</h2>
                <div class="grid pt-8 grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($headerPosts as $post)
                        <a href="{{ route('page.show', $post->id) }}">
                            <article
                                class="rounded-lg   relative flex bg-center bg-no-repeat bg-cover items-end h-[400px] md:h-[600px] shadow-md bg-[url('{{ $post->post_image }}')] overflow-hidden"
                                style="background-image: url('{{ $post->post_image }}')">
                                <div class="absolute inset-0 bg-black opacity-30"></div>
                                <div class="p-4 z-30">
                                    <div class="flex">
                                        <p class="text-white text-2xl font-bold">
                                            {{ $post->categories->name }}
                                        </p>
                                    </div>
                                    <h3 class="text-2xl md:text-3xl text-white font-semibold mb-2">{{ $post->title }}</h3>
                                </div>
                            </article>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
        <div class="bg-grayColor1 py-6">
            <section class="max-w-[1280px] mx-auto  md:w-[90%]">
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
                                    <h3 class="text-2xl text-white font-semibold mb-2">
                                        {{ $post->title }}
                                    </h3>
                                </div>
                            </article>
                        </a>
                    @endforeach
                </div>
                <section>
        </div>
        <div class=" bg-gray-900 py-10">
            <div class="md:flex gap-4 md:max-w-[1280px] md:w-[90%] mx-auto">
                <section class="md:w-3/5 flex flex-col">
                    <h2 class="text-white px-4 md:px-0 font-bold pb-4 text-2xl md:text-3xl">Tambien te puede interesar</h2>
                    @foreach ($normalPosts as $posts)
                        <a href="{{ route('page.show', $posts->id) }}">
                            <article
                                class="bg-gray-950 my-2  rounded-xl w-full hover:shadow-main hover:shadow-sm transition-colors ">
                                <div class="flex">
                                    <div class="w-3/5 py-8 px-4 md:py-4 lg:py-12 ">
                                        <h2 class="text-white text-md lg:text-lg">{{ $posts->title }}</h2>
                                        <p class="text-main"> {{ $posts->created_at->locale('es')->diffForHumans() }}</p>
                                    </div>
                                    <div class="w-2/5 h-vh bg-cover md:bg-contain bg-center"
                                        style="background-image: url('{{ $posts->post_image }}');">
                                    </div>
                                </div>
                            </article>
                        </a>
                    @endforeach
                    <a href="{{ route('news') }}"
                        class="bg-main px-8 mt-4 py-2 rounded-md md:w-52 text-center font-bold hover:bg-main3 mx-2">Ver
                        mas</a>
                </section>
                <section class=" my-10 md:my-0 h-full  shadow-main md:w-2/5 rounded-xl">
                    <article class="py-3 px-4 bg-gray-950">
                        <h2 class="text-white text-center text-2xl font-bold ">Reseñas</h2>
                        <div class="grid grid-cols-2 py-6 gap-4">
                            @foreach ($reviews as $reviews)
                                <a href="{{ route('page.show', $reviews->id) }}">
                                    <div class="w-full relative p-4 h-48 bg-center bg-cover overflow-hidden"
                                        style="background-image: url({{ $reviews->post_image }})">
                                        <div class="absolute inset-0 bg-black opacity-20 z-10"></div>
                                        <h2 class="text-xl z-20 text-white font-bold relative">{{ $reviews->title }}</h2>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="#" class="text-main hover:underline md:text-xl">Lee mas de nuestras honestas reseñas
                            aqui</a>
                    </article>

                    <article class="py-3 px-4 my-10 bg-gray-950 h-dvh text-white flex justify-center items-center">
                        Publicidad
                    </article>
                </section>
            </div>
        </div>

    </main>




    </body>

    </html>
@endsection
