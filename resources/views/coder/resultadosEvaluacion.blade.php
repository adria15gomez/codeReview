@extends('layouts.coder')

@section('content')
<div class="flex flex-col items-center justify-center px-5">
    <p class="font-regular text-3xl mt-5 text-center">Mis Evaluaciones</p>
    <p class="font-regular text-xl text-orange-600 mt-5 mb-5 text-center">Resultados evaluación</p>
    <img src="../img/trainer/coderdetail.svg" class="h-50 mx-auto xl:h-80" alt="Agregar competencia" />
        @foreach ($evaluations as $evaluation)
            <div class="flex-col justify-center px-4 py-2 w-72 h-20 rounded-lg shadow bg-gray-900">
                <div class="mb-1">
                    <p><span class="text-lg font-medium text-white">Evaluacion {{$evaluation->evaluation_date}}</span></p>
                </div>
                <div>
                    <a href="{{ route('coder.comparison', ['user_id' => $user->id, 'date' => $evaluation->evaluation_date]) }}" class="font-light text-orange-600 cursor-pointer">Ver resultados</a>
                </div>
            </div>
        @endforeach
        <a href="{{route('evaluations')}}" class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-24 text-center">Volver</a>
</div>
@endsection
