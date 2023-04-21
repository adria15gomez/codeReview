@extends('layouts.formador')

@section('content')
    <div class="flex flex-col items-center justify-center">
        <h1 class="font-regular text-3xl text-center mt-5">Bootcamps</h1>
        <img src="{{('img/trainer/bootcamps.svg')}}" alt="bootcamp"
            class="h-50 xl:h-80 mt-5" loading="lazy" 
        />
        <a  href="{{ route('addPromotion.create') }}"
            class="flex items-center justify-center w-72 px-4 py-2 bg-orange-600 font-regular text-left text-white rounded-xl hover:bg-black">
            <p class="font-regular text-md text-white">Agregar Bootcamp</p>
        </a>
        <h3 class="font-regular text-xl mt-10 mb-5 text-center">Lista de bootcamps</h3>        
        <div class="flex flex-wrap justify-center gap-5 px-3">
            @foreach ($promotions as $promotion)
                <div class="mb-6" id="accordion-collapse-{{ $promotion->id }}" data-accordion="collapse">
                    <button class="w-72 p-4 bg-gray-900 font-medium text-left text-white rounded-xl flex justify-between" id="accordion-collapse-heading-{{ $promotion->id }}" data-accordion-target="#accordion-collapse-body-{{ $promotion->id }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $promotion->id }}" x-data="{ isOpen: false }" x-bind:class="{ 'collapsed': !isOpen }" @click="isOpen = !isOpen">
                    {{ $promotion->name }}
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" x-bind:class="{ 'rotate-180': isOpen }"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div class="bg-gray-900 w-72 rounded-lg mt-1 hidden py-1" id="accordion-collapse-body-{{ $promotion->id }}" aria-labelledby="accordion-collapse-heading-{{ $promotion->id }}">
                        <div class="flex justify-center items-center">
                            <a href="{{route('promotions.show', ['promotion' => $promotion->id])}}" class="no-underline font-light text-sm text-white cursor-pointer">Ver</a>
                            <span class="mx-4 text-white">|</span>
                            <a href="{{route('editPromotion.edit', ['promotion' => $promotion->id])}}"
                                class="no-underline font-light text-sm text-white cursor-pointer">Editar</a>
                            <span class="mx-4 text-white">|</span>
                            <form action="{{route('deletePromotion.destroy', $promotion)}}" method="POST">
                
                                @csrf
                                @method('delete')
                
                                <button class="no-underline font-light text-sm text-orange-600" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>    
    </div>
@endsection
