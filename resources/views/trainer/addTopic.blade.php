@extends('layouts.formador')

@section('content')
    <h1 class="font-medium text-4xl pt-10 ml-2 pl-2 mt-2 md:text-5xl md:flex md:justify-center">Agregar Topic</h1>
    <img src="{{ 'img/trainer/topics.svg' }}"alt="topic"
        class="w-full h-60 pt-10 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" />
    <div class="md:flex md:justify-center">

        <div class="flex md:justify-center">

            <form class="justify-center my-10 mx-4" action="{{ route('addTopic.store') }}" method="POST">

                @csrf
                
                <div class="mb-6">
                    <label for="name" class="block ml-8 mb-2 text-medium font-medium">Nombre</label>
                    <input type="text" name="name"
                        class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 w-5/6  ml-8 md:ml-2"
                        placeholder="Nombre " />
                </div>

                <div>
                    <p class="text-medium font-medium mb-2">Selecciona una competencia</p>
                    <div
                        class="bg-white border border-orange-600 text-medium rounded-lg focus:ring-orange-600 focus:border-orange-600 flex flex-col w-full p-2.5">
                        @foreach ($competences as $competence)
                            <label for="{{ $competence->id }}">
                                <input type="checkbox" id="{{ $competence->id }}" name="competence_id" value="{{ $competence->id }}">
                                {{ $competence->name }} - {{ $competence->description }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <button
                    class="text-white w-80 justify-around text-base mt-10  ml-4 md:ml-2 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-[orange-600]/50 rounded-lg  px-0.5 py-4 inline-flex ">
                    <a class="no-underline text-white" href="">
                        Agregar topic</a>
                </button>

            </form>
    <div>
        <p class="text-medium font-medium mb-6">Selecciona una competencia</p>
        <div class="bg-white border border-orange-600 text-medium rounded-lg focus:ring-orange-600 focus:border-orange-600 flex flex-col w-full p-2.5">
            @foreach ($competences as $competence)
                <label for="{{ $competence->id }}">
                <input type="checkbox" id="{{ $competence->id }}" name="competence_id" value="{{ $competence->id }}"> 
                    {{ $competence->name }} - {{$competence->description}}
                </label>
            @endforeach
        </div>
        <button class="text-white w-80 justify-around text-base my-6  ml-4 bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 rounded-lg  px-0.5 py-4 inline-flex ">
                    <a class="no-underline text-white" href="{{ route('topic') }}">
                        Cancelar</a>
        </button>
    </div>

@endsection
