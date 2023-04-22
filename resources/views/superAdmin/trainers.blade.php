@extends('layouts.superadmin')

@section('content')
    <div class="flex flex-col items-center justify-center">        
        <p class="font-light text-2xl text-center mt-5">Hola, <span class="text-orange-600 font-medium">{{Auth::user()->name}}</span></p>
        <h1 class="font-regular text-3xl text-center mt-5">Formadores</h1>
        <img src="{{('..\img\admin\formadores.svg')}}" class="h-50 xl:h-80 mt-5" alt="bootcamp"/>
        <h3 class="font-regular text-xl mt-5 mb-3 text-center">Lista de Formadores</h3>
        <div class="flex flex-wrap justify-center gap-5 px-3 mb-3">
            @foreach ($trainers as $trainer)
            <div id="accordion-collapse-{{ $trainer->id }}" data-accordion="collapse" class="mt-2">
                <div>
                    <button id="accordion-collapse-heading-{{ $trainer->id }}" class="w-72 flex items-center justify-between p-4 bg-gray-900 font-medium text-left border border-b-0 border-gray-200 rounded-xl focus:ring-4" data-accordion-target="#accordion-collapse-body-{{ $trainer->id }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $trainer->id }}"
                        x-data="{ isOpen: false }" x-bind:class="{ 'collapsed': !isOpen }" @click="isOpen = !isOpen">
                        <h2 class="block text-white"> 
                            <p>{{ $trainer->name }}</p>
                            <p>{{ $trainer->description }}</p>
                        </h2>
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="#FFFFFF" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" x-bind:class="{ 'rotate-180': isOpen }"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div id="accordion-collapse-body-{{ $trainer->id }}" class="hidden bg-gray-900 w-72 rounded-xl mt-1" aria-labelledby="accordion-collapse-heading-{{ $trainer->id }}">
                        <div class="flex justify-center items-center">
                            <form action="{{route('deleteTrainer.destroy', $trainer->id)}}" method="POST">

                                @csrf
                                @method('delete')

                                <button class="no-underline text-orange-500 px-2 py-2" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>           
            </div>
            @endforeach
        </div>
        {{ $trainers->links() }}
    </div>
@endsection

       