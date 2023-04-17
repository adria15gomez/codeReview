@extends('layouts.formador')

@section('content')
    <p class="font-regular text-3xl text-left mt-5 ml-10 lg:text-6xl lg:text-center">Topics</p>
    <img src="../img/trainer/topics.svg" class="mx-auto lg= scale-125 lg= mt-4" alt="topic" />
    <a class="text-white w-5/6 justify-around text-base mt-9 ml-8 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-[orange-600]/50 rounded-lg  px-0.5 py-2 inline-flex "
        href="{{ route('addTopic.create') }}">
        <p class="no-underline text-white lg= text-center">Agregar Topic</p>
        <svg class="flex h-7 ml-4 -mr-1 w-8 " aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
        </svg>
    </a>
    <p class="font-regular text-xl text-left mt-10 ml-10 mb-5">Lista de Topics</p>
    @foreach ($topics as $topic)
        <div id="accordion-collapse" data-accordion="collapse" class="mb-6">
            <h2 id="accordion-collapse-heading-1">
                <button type="button" class="flex items-center justify-between w-72 p-4 ml-10 bg-gray-900 font-medium text-left text-white border border-b-0 border-gray-200 rounded-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                    {{$topic->name}}
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden bg-gray-900 w-72 ml-10 rounded-xl mt-1" aria-labelledby="accordion-collapse-heading-1">
                <div class="flex justify-center items-center">
                    <a class="no-underline text-white"
                        href="{{route('editTopic.edit', $topic)}}">Editar</a>
                    <span class="mx-4 text-white">|</span>
                    <form action="{{route('deleteTopic.distroy', $topic)}}" method="POST">

                        @csrf
                        @method('delete')

                        <button class="no-underline text-orange-500 px-2 py-2" type="submit">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
