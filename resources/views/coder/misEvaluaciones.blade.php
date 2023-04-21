@extends('layouts.coder')

@section('content')
    <div class="flex flex-col items-center justify-center">
        <p class="font-light text-2xl text-center mt-5">Hola, <span class="text-orange-600 font-medium">{{ Auth::user()->name }}</span></p>
        <h1 class="font-regular text-3xl text-center mt-5">Mis evaluaciones</h1>
        <img src="img\coder\misevaluaciones.svg" class="h-50 xl:h-80 mt-5" alt="Factoria F5 Logo" />
        <p class="font-regular text-xl text-center mt-5">Media global</p>
        <div class="mt-5">
            <x-progressBar :userId="$user->id" :average="$progressBarData['average']" />
        </div>
        <p class="font-regular text-xl text-center mt-10">Gestionar evaluaciones</p>
        <div class="w-72 mt-5 flex justify-center">
            <div id="accordion-collapse" data-accordion="collapse">
                <h2 id="accordion-collapse-heading-1">
                    <button type="button"
                            class="flex items-center justify-between w-72 px-4 py-2 bg-gray-900 font-medium text-left text-white border border-b-0 border-gray-200 rounded-xl"
                            data-accordion-target="#accordion-collapse-body-1" aria-expanded="false" aria-controls="accordion-collapse-body-1"
                            x-data="{ isOpen: false }" x-bind:class="{ 'collapsed': !isOpen }" @click="isOpen = !isOpen">
                            Evaluaciones
                        <svg data-accordion-icon class="w-6 h-6 rotate-180" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" x-bind:class="{ 'rotate-180': isOpen }">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-1" class="hidden bg-gray-900 w-72 rounded-xl mt-1"
                    aria-labelledby="accordion-collapse-heading-1">
                    <a href="{{route('evaluation.create')}}"
                    class="block py-2 px-4 font-thin text-white text-xs ml-2 hover:bg-orange-600">Autoevaluar</a>
                    <a href="{{route('evaluation.createCoevalua')}}"
                    class="block py-2 px-4 font-thin text-white text-xs ml-2 hover:bg-orange-600">Coevaluar</a>
                    <a href="{{route('evaluations.index')}}"
                    class="block py-2 px-4 font-thin text-white text-xs ml-2 hover:bg-orange-600">Ver resultados</a>
                </div>
            </div>
        </div>
    </div>
@endsection

