@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center">
    <p class="font-light text-2xl text-center mt-5">Hola, <span class="text-orange-600 font-medium">{{Auth::user()->name}}</span></p>
    <p class="font-regular text-3xl text-center mt-5">Coders</p>
    <img src="{{('img/trainer/coders.svg')}}"alt="bootcamp"
        class="h-50 xl:h-80 mt-5" loading="lazy" 
    />
            <button class="flex items-center justify-between w-72 px-4 py-2 bg-orange-600 font-regular text-left text-white rounded-xl hover:bg-black">
                <a class="font-regular text-md text-white" href="{{route('addCoder.create')}}">Asignar Coder</a>
            </button>

        <div class="md:w-6/12 p-6 ">
            <h3 class="font-regular text-xl mt-5 text-center">Lista de coders</h3>
            <div class="flex-col flex-wrap justify-center">
                @foreach ($users as $user)
                  <div class=" text-white justify-around text-base my-10 bg-[#111827] hover:bg-[#111827]/80 focus:ring-4 focus:outline-none focus:ring-[#111827]/50 rounded-lg text-md py-4 px-2 text-center items-center block">
                    <div class="pt-4 mb-1">
                      <div class="flex pl-2">
                        <span class="text-xl font-medium text-white md:text-center">{{$user->name}}</span>
                      </div>
                                                
                      <div class="w-full bg-gray-200 rounded-full my-10">
                        <div class="h-6 bg-orange-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 75%">75%</div>
                      </div>
                    </div>
                            
                    <div class="flex justify-center">
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
                @endforeach
              </div>
              
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection