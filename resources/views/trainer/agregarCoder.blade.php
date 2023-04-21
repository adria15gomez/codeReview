@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center">
    <h1 class="font-regular text-3xl text-center mt-5">Asignar Coder</h1>
    <img src="img/trainer/agregareditarcoder.svg" alt="bootcamp"
        class="h-50 xl:h-80 mt-5" loading="lazy" 
    />
    <div class="text-left">
        <form class="justify-center my-10 mx-4 relative" action="{{ route('addCoder.assignToBootcamp') }}" method="POST">
            
            @csrf

            <p class="block mb-2 text-medium font-medium">Bootcamp</p>
            <div class="mb-6 bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 flex flex-col w-full p-2.5">
                @foreach ($promotions as $promotion)
                <label for="{{ $promotion->id }}">
                    <input type="checkbox" id="{{ $promotion->id }}" name="promotion_id" value="{{ $promotion->id }}">
                    {{ $promotion->name }}
                </label>
                <br>
                @endforeach
            </div>

            <div class="text-center mb-4">
                <label for="email"></label>
                <select name="email" id="email" class=" border-orange-600 rounded-lg">
                    <option value="">Selecciona un Coder</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->email}}</option>
                    @endforeach
                </select><br>
            </div>

            <button type="submit"
                class="bg-orange-600 text-white text-sm font-light py-2 px-10 rounded-lg mx-auto block hover:bg-black">
                <p class="no-underline">Agregar coder</p>
            </button>
        </form>
        <a href="{{route('coders')}}"
            class="bg-gray-900 text-white text-sm font-light py-2 rounded-lg mx-auto block text-center w-40 hover:bg-black">
            <p class="no-underline">Cancelar</p>
        </a>
    </div>

@endsection