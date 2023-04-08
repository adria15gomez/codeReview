@extends('layouts.coder')

@section('content')
    <p class="font-light text-2xl text-left mt-5 ml-10">Hola, <span class="text-orange-600 font-medium">Coder</span></p>
    <p class="font-regular text-3xl text-left mt-5 ml-10">Mis evaluaciones</p>
    <img src="img\coder\misevaluaciones.svg" class="h-50 mx-auto" alt="Factoria F5 Logo" />
    <p class="font-regular text-xl text-left mt-5 ml-10 mb-5">Media global</p>
    @include('components.progressBar')
    <p class="font-regular text-xl text-left mt-10 ml-10 mb-5">Lista de evaluaciones</p>

    <div id="accordion-collapse" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-1">
            <button type="button" class="flex items-center justify-between w-72 p-4 ml-10 bg-gray-900 font-medium text-left text-white border border-b-0 border-gray-200 rounded-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                <span>Evaluación 1</span>
                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden bg-gray-900 w-72 ml-10 rounded-xl mt-1" aria-labelledby="accordion-collapse-heading-1">
            <a href="#" class="block py-2 px-4 font-thin text-white text-xs ml-2 hover:bg-orange-600">Autoevaluar</a>
            <a href="#" class="block py-2 px-4 font-thin text-white text-xs ml-2 hover:bg-orange-600">Coevaluar</a>
            <a href="#" class="block py-2 px-4 font-thin text-white text-xs ml-2 hover:bg-orange-600">Ver resultados</a>
        </div>
    </div>
@endsection