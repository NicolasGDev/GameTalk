@extends('layouts.admin')
@section('content')
    <script src="https://cdn.tiny.cloud/1/zqf45aa90pd8gspqebzl3ufwnopa6t3bn9mc2x92juynrspy/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div>
        <h2 class="text-white text-2xl font-semibold mb-6">Publicar un post</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{ route('posts.manage.update', $post->id) }}">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="title" :value="__('Titulo')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $post->title }}"
                autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="category" :value="__('Categoria')" />
            <select name="category" id="category" class="bg-gray-700 mt-2 w-full text-white py-2 px-2 rounded-md">
                <option value="">Seleccione una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="body" :value="__('Cuerpo del post')" />
            <textarea name="body" id="mytextarea"
                class="shadow appearance-none border-none bg-gray-700 rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">{{ $post->body }}</textarea>
            <x-input-error :messages="$errors->get('body')" class="mt-2" />
        </div>



        <div class="mt-6">
            <x-input-label for="name" :value="__('Tags de la publicacion')" />
            <div class="grid grid-cols-3 gap-4 mt-2">
                @foreach ($tags as $tag)
                    <div class="flex items-center gap-2">
                        <input id="default-checkbox-{{ $tag->id }}" type="checkbox" name="tags[]"
                            value="{{ $tag->id }}"
                            class="w-4 h-4 text-main bg-gray-800 hover:bg-main rounded focus:ring-main focus:ring-2"
                            {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                        <label for="default-checkbox-{{ $tag->id }}" class="text-gray-200">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6">
            <x-input-label for="name" :value="__('Portada de la publicacion')" />
            <input
                class="block w-full text-sm  text-main border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file" name="image">
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>


        <div class="flex justify-center gap-5 items-center mt-4">
            <x-primary-button class="text-md font-bold text-black ">
                {{ __('Registrar') }}
            </x-primary-button>

            <x-secondary-button back>
                {{ __('Cancelar') }}
            </x-secondary-button>
        </div>
    </form>
    </div>
    <script src="{{ asset('js/tinyMCE.js') }}"></script>
    <script src="{{ asset('js/imageInput.js') }}"></script>
@endsection
