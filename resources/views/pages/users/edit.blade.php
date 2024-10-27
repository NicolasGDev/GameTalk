@extends('layouts.admin')
@section('content')
    <div class="">
        <div>
            <h2 class="text-white text-2xl font-semibold mb-6">Editar usuario</h2>
        </div>
        <form method="POST" action="{{ route('users.manage.update', $user->id) }}">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" value="{{ $user->name }}" name="name"
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="username" :value="__('Nombre de usuario')" />

                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                    autocomplete="username" value="{{ $user->username }}" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo electronico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    value="{{ $user->email }}" autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="rol" :value="__('Rol del usuario')" />
                <select name="role" id="role"
                    class="shadow appearance-none border-none bg-gray-700 rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Seleccione un rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
@endsection
