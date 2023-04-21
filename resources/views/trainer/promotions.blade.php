@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center">
    <h1 class="font-regular text-3xl text-center mt-5">Bootcamps</h1>
    <img src="{{('img/trainer/bootcamps.svg')}}" alt="bootcamp"
        class="h-50 xl:h-80 mt-5"" loading="lazy" />
    <button
        class="flex items-center justify-between w-72 px-4 py-2 bg-orange-600 font-regular text-left text-white rounded-xl hover:bg-black">
        <a class="font-regular text-md text-white" href="{{ route('addPromotion.create') }}">Agregar Bootcamp</a>
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
