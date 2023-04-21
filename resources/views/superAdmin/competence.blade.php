@extends('layouts.superadmin')

@section('content')
    <div class="flex flex-col items-center justify-center">
        <h1 class="font-regular text-4xl text-left mt-5">Competencias</h1>
        <img src="../img/admin/competencias.svg" class="mx-auto lg= scale-125 pt-10 h-50 xl:h-80" alt="competencias" />
        <a class="flex items-center justify-center w-72 px-4 py-2 bg-orange-600 font-regular text-left text-white rounded-xl mt-8 hover:bg-black"
            href="{{ route('addCompetence.create') }}">
            <p class="no-underline mr-1">Agregar Competencia</p>
        </a>
        <p class="font-regular text-xl mt-8 mb-5 text-center">Lista de competencias</p>
        <div class="flex flex-wrap justify-center gap-5 px-3">
            @foreach ($competences as $competence)
                <div id="accordion-collapse-{{ $competence->id }}" data-accordion="collapse" class="mb-6">
                    <button id="accordion-collapse-heading-{{ $competence->id }}" class="w-72 p-4 bg-gray-900 font-medium text-left text-white rounded-xl flex justify-between" 
                        data-accordion-target="#accordion-collapse-body-{{ $competence->id }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $competence->id }}" x-data="{ isOpen: false }" x-bind:class="{ 'collapsed': !isOpen }" @click="isOpen = !isOpen">
                        <h2 class="block text-white"> 
                            <p>{{ $competence->name }}</p>
                            <p>{{ $competence->description }}</p>
                        </h2>
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" x-bind:class="{ 'rotate-180': isOpen }"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div id="accordion-collapse-body-{{ $competence->id }}" class="hidden bg-gray-900 w-72 rounded-xl mt-1" aria-labelledby="accordion-collapse-heading-{{ $competence->id }}">
                        <div class="flex justify-center items-center">
                            <a class="no-underline text-white text-sm"
                                href="{{ route('editCompetence.edit', $competence) }}">Editar</a>
                            <span class="mx-4 text-white">|</span>
                            <form action="{{ route('deleteCompetence.distroy', $competence) }}" method="POST">

                                @csrf
                                @method('delete')

                                <button class="no-underline text-orange-500 px-2 py-2 text-sm" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>         
                </div>
            @endforeach
        </div>
    </div>
@endsection
