@auth
    <section id="modal"
        class="bg-gray-950 border border-gray-600 rounded-lg z-50 min-w-96 hidden flex flex-col justify-center gap-6 items-center fixed top-1/2 left-1/2 px-10 py-10 transform -translate-x-1/2 -translate-y-1/2">
        <div class="w-full">
            <div class="absolute cursor-pointer right-0 top-0" id="close">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler text-main icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </div>
            <h2 class="text-white text-xl pb-4 font-bold">Configuracion de cuenta</h2>
            <form method="POST" action="{{ route('user.selfupdate') }}" enctype="multipart/form-data" class="">
                @method('PUT')
                @csrf
                <div class="mb-5">
                    <x-input-label for="username" :value="__('Nombre de usuario*')" />

                    <x-text-input id="text" class="block mt-1 w-full" type="text" name="username"
                        value="{{ Auth::user()->username }}" autocomplete="username" />

                    <x-input-error :messages="$errors->get('username')" class="mt-2" />

                </div>

                @if (Auth::user()->google_id === null)
                    <div class="mb-5">
                        <x-input-label for="password" :value="__('contraseña actual')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                            :value="old('password')" autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-5">
                        <x-input-label for="password" :value="__('nueva contraseña')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                            :value="old('password')" autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                @endif

                <div class="mb-5">
                    <x-input-label for="profile_pic" :value="__('Foto de perfil')" />
                    <input
                        class="block w-full text-sm  text-main border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file" name="image">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <button type="submit" class="bg-main px-10 py-2 w-full text-black font-bold">
                    Guardar
                </button>
            </form>

        </div>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Éxito!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>

            </div>
        @endif
    </section>
@endauth
