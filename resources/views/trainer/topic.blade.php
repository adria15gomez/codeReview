@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center gap-4">
    <h1 class="font-regular text-3xl text-center mt-5">Topics</h1>
    <img src="{{ 'img/trainer/topics.svg' }}"alt="topic"
        class="h-50 xl:h-72 mt-5" loading="lazy" 
    />
    <div class="md:flex md:justify-center">
        <a  href="{{ route('addTopic.create') }}"
           class="flex items-center justify-center w-72 px-4 py-2 bg-orange-600 font-regular text-left text-white rounded-xl mt-5 hover:bg-black">
            <p class="no-underline">Agregar Topic</p>
        </a>
    </div>
    <p class="font-regular text-xl mt-5 mb-3 text-center">Lista de Topics</p>
    <div class="flex flex-wrap justify-center gap-5 px-3">
        @foreach ($topics as $topic)
            <div class="mb-6" id="accordion-collapse-{{ $topic->id }}" data-accordion="collapse" >
                <button class="w-72 p-4 bg-gray-900 font-medium text-left text-white rounded-xl flex justify-between" id="accordion-collapse-heading-{{ $topic->id }}" data-accordion-target="#accordion-collapse-body-{{ $topic->id }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $topic->id }}" x-data="{ isOpen: false }" x-bind:class="{ 'collapsed': !isOpen }" @click="isOpen = !isOpen">
                    {{ $topic->name }}
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" x-bind:class="{ 'rotate-180': isOpen }"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div class="bg-gray-900 w-72 rounded-xl mt-1 hidden" id="accordion-collapse-body-{{ $topic->id }}" aria-labelledby="accordion-collapse-heading-{{ $topic->id }}">
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
