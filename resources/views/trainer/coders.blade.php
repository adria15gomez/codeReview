@extends('layouts.formador')

@section('content')
  <div class="flex flex-col items-center justify-center">
    <p class="font-light text-2xl text-center mt-5">Hola, <span class="text-orange-600 font-medium">{{Auth::user()->name}}</span></p>
    <h1 class="font-regular text-3xl text-center mt-5">Coders</h1>
    <img src="{{('img/trainer/coders.svg')}}"alt="bootcamp"
      class="h-50 xl:h-80 mt-5" loading="lazy" 
    />
    <a href="{{route('addCoder.create')}}"
      class="flex items-center justify-between w-72 px-4 py-2 bg-orange-600 font-regular text-left text-white rounded-xl hover:bg-black">
      <p class="font-regular">Asignar Coder</p>
    </a>
    <div class="md:w-6/12 p-6 ">
      <h3 class="font-regular text-xl mt-5 text-center mb-3">Lista de coders</h3>
      <div class="flex-col justify-center">
        @foreach ($users as $user)
          <div id="accordion-collapse-{{ $user->id }}" data-accordion="collapse" class="mb-6">
            <button class="m w-full p-4 bg-gray-900 font-medium text-left text-white rounded-xl flex justify-between" id="accordion-collapse-heading-{{ $user->id }}" data-accordion-target="#accordion-collapse-body-{{ $user->id }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $user->id }}" x-data="{ isOpen: false }" x-bind:class="{ 'collapsed': !isOpen }" @click="isOpen = !isOpen">
              <div class="flex flex-col pl-2">
                <span class="text-xl font-medium text-white mb-2">{{$user->name}}</span>
                <x-progressBar :userId="$user->id" :average="$progressBarData[$user->id]['average']"/>
              </div>
              <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" x-bind:class="{ 'rotate-180': isOpen }"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
                    
            <div class="bg-gray-900 w-full rounded-xl mt-1 hidden" id="accordion-collapse-body-{{ $user->id }}" aria-labelledby="accordion-collapse-heading-{{ $user->id }}">
              <div class="flex justify-center items-center">
                <a href="{{route('coderDetail.show', $user->id)}}" class="flex-row font-light text-white mr-4 cursor-pointer">Ver</a>
                <span class="mx-4 text-white">|</span>
                <a href="{{route('editCoder.edit', $user->id)}}" class="flex-row font-light text-white mr-4 ml-4 cursor-pointer">Editar</a>
                <span class="mx-4 text-white">|</span>
                <form action="{{route('deleteCoder.destroy', $user->id)}}" method="POST">
                  @csrf

                  @method('delete')

                  <button class="flex-row font-light text-orange-600 cursor-pointer" type="submit">Eliminar</button>
                </form>  
              </div>
            </div> 
          </div>
        @endforeach
      </div>          
      {{ $users->links() }}
    </div>
  </div>
@endsection