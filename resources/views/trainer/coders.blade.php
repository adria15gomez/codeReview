@extends('layouts.formador')

@section('content')
    <div>
        <div class="flex flex-col mt-2 py-8 px-2 md:-mt-6">
            <p class="font-light text-2xl text-left mt-5 ml-10">Hola, <span class="text-orange-600 font-medium">{{Auth::user()->name}}</span></p>
        </div>
        <p class="font-regular text-4xl text-left mt-5 ml-10 md:text-center md:-mt-6">Coders</p>
    </div>

    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 md:-mt-36">
            <img src="{{('img/trainer/coders.svg')}}"alt="bootcamp"
                class="w-full h-60 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" 
            />
            <button
                class="text-white w-5/6 justify-around my-2  ml-10 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-[orange-600]/50 rounded-lg  px-0.5 py-4 inline-flex ">
                <a class="no-underline text-md text-white" href="">Agregar Coder</a>
                <svg class="flex h-7 ml-4 -mr-1 w-8 " aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                </svg>
            </button>
        </div>

        <div class="md:w-6/12 p-6 ">
            <h3 class="font-medium text-2xl pt-8 ml-10 md:flex md:justify-center">Lista de coders</h3>

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
@endsection
