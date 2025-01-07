@extends('layouts.app')
@section('content')
    <section class="max-w-[1280px] w-[90%] my-14  mx-auto px-4 py-8">
        <article class="flex flex-col gap-4  lg:flex-row items-center ">
            <div class=" lg:w-1/2 md:pr-24">
                <h2 class="text-main font-bold text-4xl md:text-5xl">Estamos trabajando para crear la seccion de foros</h2>
                <p class="text-white text-2xl md:text-3xl py-4">Pronto podras participar en foros y crear los tuyos, generar
                    conversacion
                    acerca
                    del
                    mundo
                    gaming</p>
            </div>
            <div class="lg:w-1/2 ">
                <img src="{{ asset('images/videogames.webp') }}" class="rounded-xl" alt="">
            </div>
        </article>
    </section>
@stop
