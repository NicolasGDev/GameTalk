@extends('layouts.app')
@section('content')
    <section class="max-w-[1280px] mx-auto  md:w-[90%] my-10">
        <div class="pb-4 px-4 md:px-0">
            <h2 class="text-white font-bold text-2xl pb-5">Nuestra selección de noticias</h2>
            <div class="w-full max-w-sm bg-white min-w-[200px]">
                <div class="relative flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="absolute w-5 h-5 top-2.5 left-2.5 text-gray-900">
                        <path fill-rule="evenodd"
                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <input id="searchBar"
                        class="w-full bg-transparent placeholder:text-gray-600 text-slate-700 text-sm border border-slate-200 rounded-md pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                        placeholder="Buscar..." />
                </div>
            </div>
        </div>

        <div id="results" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($news as $item)
                <a href="{{ route('page.show', $item->id) }}" class="post-item">
                    <article
                        class="rounded-lg relative flex bg-center hover:border-2 border-main bg-no-repeat bg-cover items-end h-[300px] shadow-md bg-[url('{{ $item->post_image }}')] overflow-hidden"
                        style="background-image: url('{{ $item->post_image }}')">
                        <div class="absolute inset-0 bg-black opacity-40"></div>
                        <div class="p-4 z-30">
                            <h3 class="post-title text-2xl text-white font-semibold mb-2">
                                {{ $item->title }}
                            </h3>
                            <p class="text-white font-bold">Autor:
                                <span class="text-main">
                                    {{ $item->users->name }}
                                </span>
                            </p>
                            <p>
                            <p class="text-white font-bold text-md">
                                {{ $item->created_at->locale('es')->diffForHumans() }}
                            </p>
                            </p>
                        </div>
                    </article>
                </a>
            @endforeach
        </div>
        <section>
            <script src="{{ asset('js/searchBar.js') }}"></script>
        @stop
