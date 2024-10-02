@extends('layouts.admin')
@section('content')
    <div>
        <h2 class="text-white text-2xl font-semibold mb-6">Registrar categoria</h2>
    </div>
    <form method="POST" action="{{ route('category.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Categoria')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
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
@endsection
