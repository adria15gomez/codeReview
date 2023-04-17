@extends('layouts.coder')

@section('content')
    <p class="font-regular text-3xl text-left mt-5 ml-10 xl:text-center">Mis Evaluaciones</p>
    <p class="font-regular text-xl text-left text-orange-600 mt-5 ml-10 mb-5 xl:text-center">Resultados evaluación</p>
    <img src="../img/trainer/coderdetail.svg" class="h-50 mx-auto" alt="Agregar competencia" />
    @foreach ($evaluations as $evaluation)
        <div class=" bg-gray-900 w-72 rounded-xl mt-1 block justify-center" >
            <a href="{{ route('coder.comparison', ['user_id' => $user->id, 'date' => $evaluation->evaluation_date]) }}" class="text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block text-center"> {{$evaluation->evaluation_date}} </a>
        </div>
    @endforeach
    <a href="{{route('evaluations')}}" class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-24 text-center">Volver</a>
@endsection