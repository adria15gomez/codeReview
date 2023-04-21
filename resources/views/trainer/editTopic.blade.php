@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center">
    <h1 class="font-regular text-3xl text-center mt-5">Editar Topic</h1>
    <img src="../img/trainer/topics.svg" class="h-50 mb-5 xl:h-72 mt-5" alt="topic" />
    <form action="{{route('editTopic.update', $topic)}}" method="POST">
        
        @csrf
        @method('put')

        <div class="mb-6">
            <label for="name" class="block mb-2 text-medium font-medium">Nombre</label>
            <input type="text" name="name" value="{{ $topic->name }}"
                class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5"
                placeholder="Nombre " />
        </div>
        <div>
            <p class="block mb-2 text-medium font-medium">Selecciona una competencia</p>
            <div class="mb-10 bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 flex flex-col w-full p-2.5">
                @foreach ($competences as $competence)
                    <label for="{{ $competence->id }}">
                    <input type="checkbox" id="{{ $competence->id }}" name="competence_id" value="{{ $competence->id }}">
                        {{ $competence->name }} - {{$competence->description}}
                    </label>
                @endforeach
            </div>
        </div>
        <button type="submit"
            class="bg-orange-600 text-white text-sm font-light py-2 px-10 rounded-lg mx-auto my-5 block hover:bg-black">
            <p class="no-underline">Editar topic</p>
        </button>
    
    </form>
    <a class="bg-gray-900 text-white text-sm font-light py-2 rounded-lg mx-auto block text-center w-40 hover:bg-black"
        href="{{ route('topic') }}">
        <p class="no-underline">Cancelar</p>
    </a>
    @endsection
</div>
