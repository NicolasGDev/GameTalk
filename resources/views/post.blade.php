@extends('layouts.app')
@section('content')
    <main class="">
        <div class="bg-gray-900">
            <section class="  max-w-[1280px] rounded-xl mx-auto w-[90%] py-20">
                <header class=" flex flex-col gap-4 h-full  text-white   ">
                    <h1 class="text-5xl  font-bold">{{ $post->title }}</h1>
                    <p class="text-2xl font-semibold">{{ $post->categories->name }}</p>
                    <div>
                        <img src="{{ asset($post->post_image) }}" width="100%">
                    </div>
                </header>

        </div>
        <article class="bg-gray-200 px-4 sm:px-10 md:px-32 lg:px-80 xl:px-80 py-10">

            <div class="flex items-center p-3 w-72    rounded-md shadow-lg">
                <section class="flex justify-center items-center w-14 h-14 rounded-full shadow-md overflow-hidden">
                    <img src="{{ asset($post->users->profile_image) }}" alt="Profile Image"
                        class="w-full h-full object-cover rounded-full">
                </section>

                <section class="block border-l  border-gray-900 m-3">
                    <div class="pl-3">
                        <p class="text-red-500 font-bold text-md">
                            {{ $post->created_at->locale('es')->diffForHumans() }}</p>
                        <h3 class=" text-black text-lg font-bold">
                            {{ $post->users->name }}</h3>
                    </div>
                    <div class="pl-3 flex gap-2">
                        <a href="" class="hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline  icon-tabler-brand-instagram">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M16.5 7.5l0 .01" />
                            </svg>
                        </a>
                        <a href="" class="hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                            </svg>
                        </a>

                    </div>
                </section>
            </div>
            <div class="w-full mt-10">
                <p class="text-2xl">{!! $post->body !!}</p>
            </div>
        </article>
        </section>
        <section id="comments" class="bg-white  dark:bg-gray-900 py-8 lg:py-16 antialiased">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comentarios
                        ({{ $comments_count }})</h2>
                </div>
                @auth
                    <form method="POST" action="{{ route('comment.store') }}" class="mb-6">
                        @csrf
                        <div
                            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" rows="6" name="body"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none 
                            dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                placeholder="Escribe un comentario..."></textarea>
                            <input type="hidden" name="post" value="{{ $post->id }}">
                        </div>
                        <button type="submit"
                            class="inline-flex bg-main items-center py-2.5 px-4 text-md font-medium text-center text-black rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Publicar
                        </button>
                    </form>
                @else
                    <div class="w-full border flex justify-center rounded-3xl  border-gray-600 p-4">
                        <div class="flex gap-4 items-center py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler text-main icons-tabler-outline icon-tabler-brand-apple-arcade">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path
                                    d="M20 12.5v4.75a.734 .734 0 0 1 -.055 .325a.704 .704 0 0 1 -.348 .366l-5.462 2.58a5 5 0 0 1 -4.27 0l-5.462 -2.58a.705 .705 0 0 1 -.401 -.691l0 -4.75" />
                                <path
                                    d="M4.431 12.216l5.634 -2.332a5.065 5.065 0 0 1 3.87 0l5.634 2.332a.692 .692 0 0 1 .028 1.269l-5.462 2.543a5.064 5.064 0 0 1 -4.27 0l-5.462 -2.543a.691 .691 0 0 1 .028 -1.27z" />
                                <path d="M12 7l0 6" />
                            </svg>
                            <p class="text-white text-xl font-semibold">necesitas <a
                                    href="{{ route('login', ['redirect' => url()->current()]) }}"
                                    class="text-main underline">Iniciar sesión</a> para compartir
                                tus opiniones
                            </p>
                        </div>
                    </div>
                @endauth
                @if ($post->comments->isEmpty())
                    <div class="w-full flex justify-center py-10">
                        <div class="flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler text-main icons-tabler-outline icon-tabler-speakerphone">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18 8a3 3 0 0 1 0 6" />
                                <path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5" />
                                <path
                                    d="M12 8h0l4.524 -3.77a.9 .9 0 0 1 1.476 .692v12.156a.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8" />
                            </svg>
                            <p class="text-white text-xl font-semibold">Aun no hay comentarios, rompe el hielo
                            </p>
                        </div>
                    </div>
                @else
                    @foreach ($comments as $comment)
                        <article class="p-6 bg-white rounded-lg dark:bg-gray-900">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center w-full">
                                    <div
                                        class="inline-flex  items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white">
                                        <img class="mr-2 w-12 h-12 rounded-full"
                                            src="{{ asset($comment->user->profile_image) }}"
                                            alt="{{ $comment->user->username }}">
                                        {{ $comment->user->username }}
                                    </div>

                                    <div class="flex items-cente">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            <time datetime="{{ $comment->created_at }}"
                                                title="{{ $comment->created_at->format('d/m/Y H:i') }}">
                                                {{ $comment->created_at->locale('es')->diffForHumans() }}
                                            </time>
                                        </p>
                                    </div>
                                </div>
                            </footer>

                            <p class="text-gray-800 dark:text-gray-200">{{ $comment->body }}</p>
                            <div class="flex gap-4">
                                <button type="button"
                                    class="mt-2 text-sm text-gray-500 hover:underline dark:text-gray-400"
                                    onclick="toggleReplyForm({{ $comment->id }})">
                                    Responder
                                </button>
                                <form action="{{ route('comment.report', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="mt-2 text-sm text-red-500 report-button hover:underline">
                                        Reportar
                                    </button>
                                </form>
                            </div>

                            <!-- Botón para responder -->

                            <!-- Formulario para responder -->
                            @auth
                                <form action="{{ route('comment.store') }}" method="POST" class="hidden mt-4"
                                    id="reply-container-{{ $comment->id }}">
                                    @csrf
                                    <p class="text-gray-400">Respondiendo a <span
                                            class="text-main">{{ $comment->user->username }}</span></p>
                                    <textarea name="body" rows="3" class="w-full p-2 rounded-lg dark:bg-gray-800 dark:text-white"
                                        placeholder="Escribe tu respuesta..."></textarea>
                                    <input type="hidden" name="parent" value="{{ $comment->id }}">
                                    <input type="hidden" name="post" value="{{ $post->id }}">
                                    <button type="submit" class="mt-2 px-4 py-2 bg-main text-black rounded-lg">
                                        Responder
                                    </button>
                                </form>
                            @endauth
                            <!-- Mostrar respuestas anidadas -->
                            @if ($comment->replies->count() > 0)
                                <div class="ml-4 mt-4 ">
                                    @foreach ($comment->replies as $reply)
                                        <article class="p-4 bg-gray-100 rounded-lg overflow-hidden  dark:bg-gray-800">
                                            <div class="flex items-center mb-2">
                                                <img class="mr-2 w-8 h-8 rounded-full"
                                                    src="{{ asset($reply->user->profile_image) }}"
                                                    alt="{{ $reply->user->username }}">
                                                <p class="text-sm  text-white font-semibold">
                                                    {{ $reply->user->name }}
                                                </p>
                                                <p class="text-xs text-gray-400">
                                                    <time class="pl-3" datetime="{{ $reply->created_at }}">
                                                        {{ $reply->created_at->locale('es')->diffForHumans() }}
                                                    </time>
                                                </p>
                                            </div>
                                            <p class="text-gray-800 dark:text-gray-200">{{ $reply->body }}</p>
                                            <form class="report-form" action="{{ route('comment.report', $reply->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="mt-2 text-sm text-red-500 report-button hover:underline">
                                                    Reportar
                                                </button>
                                            </form>
                                        </article>
                                    @endforeach
                                </div>
                            @endif
                        </article>
                    @endforeach
                @endif
            </div>
        </section>
    </main>
    <script src="{{ asset('js/report.js') }}"></script>
    <script src="{{ asset('js/answer.js') }}"></script>

@endsection
