@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center">
    <h1 class="font-regular text-3xl text-center mt-5">Agregar Topic</h1>
    <img src="{{ 'img/trainer/topics.svg' }}" alt="topic" class="h-50 xl:h-72 mt-5" loading="lazy" />
    <div>
        <form class="justify-center my-10 mx-4" action="{{ route('addTopic.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-medium font-medium">Nombre</label>
                <input type="text" name="name" class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="Nombre" />
            </div>
            <div>
                <p class="block mb-2 text-medium font-medium">Selecciona una competencia</p>
                <div class="mb-10 bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 flex flex-col w-full p-2.5">
                    @foreach ($competences as $competence)
                    <label class="" for="{{ $competence->id }}">
                        <input type="checkbox" id="{{ $competence->id }}" name="competence_id" value="{{ $competence->id }}">
                        {{ $competence->name }} - {{ $competence->description }}
                    </label>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="bg-orange-600 text-white text-sm font-light py-2 px-10 rounded-lg mx-auto block hover:bg-black">
                <p class="no-underline">Agregar topic</p>
            </button>
        </form>
        <div>
            <button class="bg-gray-900 text-white text-sm font-light py-2 rounded-lg mx-auto block text-center w-40 hover:bg-black">
                <a class="no-underline" href="{{ route('topic') }}">Cancelar</a>
            </button>
        </div>
    </div>
</div>
@endsection

