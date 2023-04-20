@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center">
    <p class="font-light text-2xl text-center mt-5">Hola, <span class="text-orange-600 font-medium">{{Auth::user()->name}}</span></p>
    <p class="font-regular text-3xl text-center mt-5">Coders</p>
    <img src="{{('img/trainer/coders.svg')}}"alt="bootcamp"
        class="h-50 xl:h-80 mt-5" loading="lazy" 
    />
            <button class="flex items-center justify-between w-72 px-4 py-2 bg-orange-600 font-regular text-left text-white rounded-xl hover:bg-black">
                <a class="font-regular text-md text-white" href="{{route('addCoder.create')}}">Agregar Coder</a>
                <svg class="flex h-7 w-8 text-white" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                </svg>
            </button>

        <div class="md:w-6/12 p-6 ">
            <h3 class="font-regular text-xl mt-5 text-center">Lista de coders</h3>
                @foreach ($users as $user)
                <div class="text-white w-5/6 justify-around text-base my-10  ml-10 bg-[#111827] hover:bg-[#111827]/80 focus:ring-4 focus:outline-none focus:ring-[#111827]/50 rounded-lg text-md py-4 px-2  text-center items-center block">
                    <div class="pt-4 mb-1">
                        <div class="flex pl-2">
                            <span class="text-lg font-medium text-white md:text-center">{{$user->name}}</span>
                            <svg class="w-8 text-white ml-20 md:ml-96" aria-hidden="true" focusable="false" data-prefix="fab"
                                data-icon="arrow" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    fill="currentColor"d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                            </svg>
                        </div>
                    
                        <div class="w-full bg-gray-200 rounded-full my-10">
                            <div class="h-6 bg-orange-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                style="width: 75%">75%</div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{route('coderDetail.show', $user->id)}}" class="flex-row text-white mr-4 cursor-pointer">Ver</a>
                        <span class="mx-4 text-white">|</span>
                        <a href="{{route('editCoder.edit', $user->id)}}" class=" flex-row text-white mr-4 cursor-pointer">Editar</a>
                        <span class="mx-4 text-white">|</span>
                        <form action="{{route('deleteCoder.destroy', $user->id)}}" method="POST">
        
                            @csrf
                            @method('delete')
        
                            <button class="flex-row text-orange-600 cursor-pointer" type="submit">Eliminar</button>
                        </form>  
                    </div> 
                </div>
            @endforeach
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection