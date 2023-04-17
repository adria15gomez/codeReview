@extends('layouts.coder')

@section('content')
    <p class="font-regular text-3xl text-left mt-5 ml-10 xl:text-center">Mis Evaluaciones</p>
    <p class="font-regular text-xl text-left text-orange-600 mt-5 ml-10 mb-5 xl:text-center">Resultados evaluación</p>
    <img src="../img/trainer/coderdetail.svg" class="h-50 mx-auto" alt="Agregar competencia" />
    @foreach ($evaluations as $evaluation)
        <div class=" bg-gray-900 w-72 rounded-xl mt-1 block justify-center text-center" >
            <a href="{{ route('coder.comparison', ['user_id' => $user->id, 'date' => $evaluation->evaluation_date]) }}" class="py-2 px-4 mt-4 rounded-lg flex"> 
                <h5 class="flex-row ml-0.5 mb-2 text-2 font-medium text-white text-center">{{$evaluation->evaluation_date}}</h5> 
                <svg class="flex h-7 w-8 text-white ml-28" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        fill="currentColor"d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                </svg>
            </a>            
        </div>
    @endforeach
    <a href="{{route('evaluations.index')}}" class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-24 text-center">Volver</a>
@endsection