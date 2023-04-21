@extends('layouts.formador')
@section('content')
<div class="flex flex-col items-center justify-center">
        <h1 class="font-regular text-3xl text-center mt-5">Editar Coder</h1>
        <img src="{{('../img/trainer/agregareditarbootcamp.svg')}}"alt="bootcamp"
            class="h-50 xl:h-80 mt-5" loading="lazy"
        />
    
        <form class="justify-center my-10 mx-4" action="{{ route('editCoder.update', $coder->id) }}" method="POST">

            @csrf
            @method('put')

                <div class="mb-6 bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 flex flex-col w-full p-2.5">
                    <label for="promotion" class="block mb-2 text-medium font-medium ">Bootcamp</label>
                    @foreach ($promotions as $promotion)
                    <label for="{{ $promotion->id }}">
                        <input type="checkbox" id="{{ $promotion->id }}" name="promotion_id" value="{{ $promotion->id }}" class=" border-orange-600">
                        {{ $promotion->name }}
                    </label>
                    <br>
                    @endforeach
                </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-medium font-medium">Email</label>
                <input type="text" id="email" name="email" value="{{ $coder->email }}"
                    class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5"
                    placeholder="Introduce el email">

            </div>
            <button type="submit"
                class="bg-orange-600 text-white text-sm font-light py-2 px-10 rounded-lg mx-auto block hover:bg-black">
                <p class="no-underline text-white">Editar coder</p>
            </button>          
        </form>

        <a href="{{route('coders')}}"
            class="bg-gray-900 text-white text-sm font-light py-2 rounded-lg mx-auto block text-center w-40 hover:bg-black">
            <p class="no-underline text-white" >Cancelar</p>
        </a>
    </div>
</div>
@endsection