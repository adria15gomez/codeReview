@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center gap-4">
    <h1 class="font-regular text-3xl text-center mt-5">Topics</h1>
    <img src="{{ 'img/trainer/topics.svg' }}"alt="topic"
        class="h-50 xl:h-72 mt-5" loading="lazy" />
    <div class="md:flex md:justify-center">
        <button
            class="flex items-center justify-between w-72 px-4 py-2 bg-orange-600 font-regular text-left text-white rounded-xl mt-5 hover:bg-black">
            <a class="no-underline text-white" href="{{ route('addTopic.create') }}">
                Agregar Topic</a><svg class="w-7 text-white" aria-hidden="true" focusable="false" data-prefix="fab"
                data-icon="arrow"role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                    fill="currentColor"d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
            </svg>
        </button>
    </div>

    <p class="font-regular text-xl mt-5 mb-3 text-center">Lista de Topics</p>
    <div class="flex flex-wrap justify-center gap-5 px-3">
        @foreach ($topics as $topic)
            <div class="mb-6">
                <div class="w-72 p-4 bg-gray-900 font-medium text-left text-white rounded-xl">
                    {{ $topic->name }}
                </div>
                <div class="bg-gray-900 w-72 rounded-xl mt-1">
                    <div class="flex justify-center items-center">
                        <a class="no-underline font-light text-sm text-white" href="{{ route('editTopic.edit', $topic) }}">Editar</a>
                        <span class="mx-4 text-white">|</span>
                        <form action="{{ route('deleteTopic.distroy', $topic) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="no-underline font-light text-sm text-orange-500 px-2 py-2" type="submit">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</div>
@endsection
