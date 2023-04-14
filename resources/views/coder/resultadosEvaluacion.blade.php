@extends('layouts.coder')

@section('content')
    <p class="font-regular text-3xl text-left mt-5 ml-10">Mis Evaluaciones</p>
    <p class="font-regular text-xl text-left text-orange-600 mt-5 ml-10 mb-5">Resultados evaluación</p>
    <div class=" bg-gray-900 w-72 ml-10 rounded-xl mt-1" >
        @foreach ($evaluations as $evaluation)
            <a class="text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block"> {{$evaluation->evaluation_date}} </a>
        @endforeach
    </div>
    <a href="{{route('evaluations')}}" class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-1/5">Volver</a>
@endsection