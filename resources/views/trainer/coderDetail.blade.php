@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center">
    <h1 class="font-regular text-3xl text-center mt-5">{{$coder->name}}</h1>
    <img src="{{ '../img/trainer/coderdetail.svg' }}" alt="bootcamp" class="h-50 xl:h-80 mt-5" loading="lazy" />
    <h3 class="font-regular text-xl mt-5 text-center">Media global</h3>
    
    
    <h3 class="font-regular text-xl mt-5 text-center">Lista de evaluaciones</h3>
    <div class="flex flex-col gap-4">
        @foreach ($evaluations as $evaluation)
            <div class="max-w-2xl p-6 mx-5 border border-gray-200 rounded-lg shadow bg-[#04070e]">
                <div class="flex justify-between pt-4 mb-1">
                    <a href="{{ route('trainer.comparisonEvaluation', ['user_id' => $coder->id, 'date' => $evaluation->evaluation_date]) }}" class="flex"><span class="text-lg font-medium text-white">Evaluacion {{$evaluation->evaluation_date}}</span>
                </div>
                <div>
                    <a href="{{ route('trainer.comparisonEvaluation', ['user_id' => $coder->id, 'date' => $evaluation->evaluation_date]) }}" class="pt-5 text-orange-600 cursor-pointer">Ver resultados</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex flex-col items-center mt-8">
        <a href="{{route('coders')}}" class="bg-gray-900 text-white text-sm font-light py-2 rounded-lg mx-auto block text-center w-40 hover:bg-black">Volver</a>
    </div>
</div>
@endsection