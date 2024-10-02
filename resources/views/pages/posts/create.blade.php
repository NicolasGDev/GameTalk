@extends('layouts.admin')
@section('content')
    <script src="https://cdn.tiny.cloud/1/zqf45aa90pd8gspqebzl3ufwnopa6t3bn9mc2x92juynrspy/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div>
        <h2 class="text-white text-2xl font-semibold mb-6">Publicar un post</h2>
    </div>
    <form method="POST" action="{{ route('post.store') }}">
        @csrf
        <div>
            <x-input-label for="title" :value="__('Titulo')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus
                autocomplete="title" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="category" :value="__('Categoria')" />
            <select name="category" id="category" class="bg-gray-700 mt-2 text-white py-2 px-2 rounded-md">
                <option value="">Seleccione una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-6">
            <x-input-label for="name" :value="__('Cuerpo del post')" />
            <textarea name="body" id="mytextarea"></textarea>
        </div>



        <div class="mt-6">
            <x-input-label for="name" :value="__('Tags de la publicacion')" />
            <div class="grid grid-cols-3 gap-4 mt-2">
                @foreach ($tags as $tag)
                    <div class="flex items-center gap-2">
                        <input id="default-checkbox-{{ $tag->id }}" type="checkbox" name="tags[]"
                            value="{{ $tag->id }}"
                            class="w-4 h-4 text-main bg-gray-800 hover:bg-main rounded focus:ring-main focus:ring-2">
                        <label for="default-checkbox-{{ $tag->id }}" class="text-gray-200">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <section class="container w-full mx-auto items-center mt-6">
            <x-input-label for="name" :value="__('Portada de la publicacion')" />
            <div class="w-full mx-auto bg-gray-800 rounded-lg shadow-md overflow-hidden items-center">
                <div class="px-4 py-6">
                    <div id="image-preview"
                        class="w-full p-6 mb-4  border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                        <input id="upload" type="file" class="hidden" name="image" accept="image/*" />
                        <label for="upload" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8 text-main mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-main">Subir imagen</h5>
                            <p class="font-normal text-sm text-white md:px-6">El tamaño de la imagen seleccionada debe ser
                                menor que <b class="text-main">2mb</b></p>
                            <p class="font-normal text-sm text-white md:px-6">y el formato debe ser<b class="text-main">
                                    PNG o JPG</b></p>
                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                    </div>

                </div>
            </div>
        </section>


        <div class="flex justify-center gap-5 items-center mt-4">
            <x-primary-button class="text-md font-bold text-black ">
                {{ __('Registrar') }}
            </x-primary-button>

            <x-secondary-button>
                {{ __('Cancelar') }}
            </x-secondary-button>
        </div>
    </form>
    </div>
    <script src="{{ asset('js/tinyMCE.js') }}"></script>
    <script src="{{ asset('js/imageInput.js') }}"></script>
@endsection
