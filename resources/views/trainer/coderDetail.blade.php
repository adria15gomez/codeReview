@extends('layouts.formador')

@section('content')
<div class="flex flex-col items-center justify-center">
    <h1 class="font-medium text-4xl mt-10 md:text-5xl">{{$coder->name}}</h1>
    <img src="{{ '../img/trainer/coderdetail.svg' }}" alt="bootcamp" class="w-full h-60 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" />
    <h3 class="font-medium text-2xl py-8 md:text-medium">Media global</h3>
    
    
    <h3 class="font-medium text-2xl py-4 md:text-medium">Lista de evaluaciones</h3>
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
        <a href="{{route('coders')}}" class="py-5 mb-8 text-white bg-[#050708] hover:bg-[#050708] transition-colors cursor-pointer inline-flex uppercase font-medium w-40 rounded-lg text-center">Volver</a>
    </div>
</div>
@endsection