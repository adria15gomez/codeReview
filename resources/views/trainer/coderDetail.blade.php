@extends('layouts.formador')

@section('content')
    <h1 class="font-medium text-4xl ml-2 pl-2 mt-10 md:text-5xl grid md:flex md:justify-center md:text-center">{{$coder->name}}</h1>
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12">
            <img src="{{ '../img/trainer/coderdetail.svg' }}"alt="bootcamp"
                class="w-full h-60 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" 
            />

            <h3 class="font-medium text-2xl md:text-medium py-8 ml-10 md:flex md:justify-center">Media global</h3>

            <div class="max-w-sm border-solid rounded-lg md:ml-48">
                <div class="w-35 bg-gray-500 rounded-lg">
                    <div class=" h-6 bg-gradient-to-r from-orange-300 via-orange-600 to-zinc-950 leading-none rounded-lg"
                        style="width:75%">
                    </div>
                </div>
                <div class="row-span-1 col-span-1">75%</div>
            </div>
        </div>

        <div>
            <h3 class="font-medium text-2xl md:text-medium py-4 ml-10 my-8 md:flex md:justify-center">Lista de evaluaciones</h3>

            @foreach ($evaluations as $evaluation)
                <div class="max-w-2xl p-6 mx-5 border ml-10 mt-4 border-gray-200 rounded-lg justify-center shadow bg-[#04070e] md:w-96">
                    <div class="flex justify-between pt-4 mb-1">
                        <a href="{{ route('trainer.comparisonEvaluation', ['user_id' => $coder->id, 'date' => $evaluation->evaluation_date]) }}" class="flex"><span class="text-lg font-medium text-white">Evaluacion {{$evaluation->evaluation_date}}</span>
                        <span>
                            <svg class="flex h-7 w-8 text-white ml-20" aria-hidden="true" focusable="false" data-prefix="fab"
                                data-icon="arrow" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    fill="currentColor"d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                            </svg>
                        </span></a>
                    </div>
                    <div>
                        <a href="{{ route('trainer.comparisonEvaluation', ['user_id' => $coder->id, 'date' => $evaluation->evaluation_date]) }}" class=" ml-20 pt-5 text-orange-600 cursor-pointer">Ver resultados</a>
                    </div>
                </div>
            @endforeach
        </div>        
        <div class="flex flex-col items-center mt-auto mx-auto md:mt-auto md:flex md:justify-items-center">
            <a href="{{route('coders')}}" class="py-5 justify-center mb-8 text-white bg-[#050708] hover:bg-[#050708] transition-colors cursor-pointerinline-flex uppercase font-medium w-40 rounded-lg text-center">
                Volver
            </a>
        </div>
        
    </div>    
@endsection
