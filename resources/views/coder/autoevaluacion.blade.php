@extends('layouts.coder')

@section('content')
    <p class="font-regular text-3xl text-left mt-5 ml-10">Evaluación 1</p>
    <p class="font-regular text-xl text-left text-orange-600 mt-5 ml-10 mb-5">Autoevaluación</p>
    <form action="{{route('evaluation.store')}}" method="POST">
        @csrf

        <input type="hidden" name="evaluationType" value="autoevaluacion">

        <div class="clasificacion">
            @foreach ($topics as $topic)
                <p> {{$topic->name}} </p>  
                @for ($i = 1; $i <= 6; $i++)          
                    <input type="radio" name="topics[{{$topic->id}}]" value="{{$i}}" id="{{$topic->id}}_{{$i}}" >
                    <label for="{{$topic->id}}_{{$i}}">★</label>
                @endfor
            @endforeach
        </div>

        <button class="bg-gray-900 text-white text-sm font-light  py-2 px-4 rounded-lg mx-auto block">Enviar autoevaluación</button>
    </form>
    
    <a href="{{route('evaluations')}}" class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-1/4">Cancelar</a>
@endsection