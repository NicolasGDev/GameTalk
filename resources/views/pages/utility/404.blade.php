@extends('layouts.admin')
@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div class="max-w-2xl m-auto mt-14">

            <div class="text-center px-4">
                <div class="inline-flex mb-8">
                    <img class="" src="{{ asset('images/404.png') }}" width="300" height="176"
                        alt="404 illustration" />

                </div>
                <div class="mb-16 text-2xl text-white font-semibold">mmm...Esta pagina no existe, intenta buscar otra cosa
                </div>
                <a href="{{ route('dashboard') }}"
                    class="px-10 py-4 bg-main rounded-md hover:bg-mainClaro text-black font-semibold">Volver
                    al dashboard</a>
            </div>

        </div>

    </div>
@endsection
