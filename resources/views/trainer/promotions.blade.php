@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center">
    <h1 class="font-regular text-3xl text-center mt-5">Bootcamps</h1>
    <img src="{{('img/trainer/bootcamps.svg')}}" alt="bootcamp"
        class="h-50 xl:h-80 mt-5"" loading="lazy" />
    <button
        class="flex items-center justify-between w-72 px-4 py-2 bg-orange-600 font-regular text-left text-white rounded-xl hover:bg-black">
        <a class="font-regular text-md text-white" href="{{ route('addPromotion.create') }}">Agregar Bootcamp</a>
        <svg class="flex h-7 w-8 text-white" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
        </svg>
    </button>

    <h3 class="font-regular text-xl mt-10 mb-5 text-center">Lista de bootcamps</h3>
    
    <div class="flex flex-wrap justify-center items-stretch px-3">
        @foreach ($promotions as $promotion)
        <div class="max-w-sm w-full p-6 mx-5 border mt-4 border-gray-200 rounded-lg shadow bg-[#111827] flex flex-col">
            <a href="{{route('promotions.show', ['promotion' => $promotion->id])}}" class="flex">
                <h5 class="flex-row ml-0.5 mb-2 text-2xl font-medium text-white">{{ $promotion->name }}</h5>
            </a>
            <div class="flex">
                <a href="{{route('promotions.show', ['promotion' => $promotion->id])}}" class="flex-row font-light text-white mr-3 cursor-pointer">Ver</a>
                <span class="mx-4 text-white">|</span>
                <a href="{{route('editPromotion.edit', ['promotion' => $promotion->id])}}"
                    class=" flex-row font-light text-white mr-3 ml-3 cursor-pointer">Editar</a>
                <span class="mx-4 text-white">|</span>
                <form action="{{route('deletePromotion.destroy', $promotion)}}" method="POST">
    
                    @csrf
                    @method('delete')
    
                    <button class="flex-row font-light text-orange-600 cursor-pointer ml-3" type="submit">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection
