@extends('layouts.formador')

@section('content')

    <div class="md:items-center mb-0 flex flex-col">
    <h1 class="font-medium text-4xl pt-0 ml-2 pl-2 mt-10 md:text-5xl grid ">Agregar Coder</h1>
    <img src="img/trainer/agregareditarcoder.svg" alt="bootcamp"
        class="w-full h-60 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" 
    />
    <div class="flex md:justify-center">
        <form class="justify-center my-10 mx-4 relative" action="{{ route('addCoder.assignToBootcamp') }}" method="POST">
            @csrf

            <p class="block mb-2 text-medium font-medium">Bootcamp</p>
            <div class="mb-6 bg-white border border-orange-600 text-medium rounded-lg focus:ring-orange-600 focus:border-orange-600 flex flex-col w-full p-2.5">
                @foreach ($promotions as $promotion)
                <label for="{{ $promotion->id }}">
                    <input type="checkbox" id="{{ $promotion->id }}" name="promotion_id" value="{{ $promotion->id }}">
                    {{ $promotion->name }}
                </label>
                <br>
                @endforeach
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-medium font-medium">Email</label>
                <input type="text" id="email" name="email"
                    class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5"
                    placeholder="Introduce el email">
            </div>
            <button type="submit"
                class="text-white w-80 justify-around text-base mt-10  ml-4 md:ml-2 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-[orange-600]/50 rounded-lg  px-0.5 py-4 inline-flex ">
                <p class="no-underline text-white">Agregar coder</p>
            </button>
        </form>
        <a href="{{route('coders')}}"
            class="text-white w-80 justify-around text-base my-6  ml-4 bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 rounded-lg  px-0.5 py-4 inline-flex mt-auto ">
            <p class="no-underline text-white" >Cancelar</p>
        </a>
    </div>

@endsection