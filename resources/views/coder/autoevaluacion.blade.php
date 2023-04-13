@extends('layouts.coder')

@section('content')
    <p class="font-regular text-3xl text-left mt-5 ml-10">Evaluación 1</p>
    <p class="font-regular text-xl text-left text-orange-600 mt-5 ml-10 mb-5">Autoevaluación</p>
    <form action="{{route('evaluation.store')}}" method="POST">
        @csrf

        <input type="hidden" name="evaluationType" value="autoevaluacion">

        {{-- <div class="clasificacion">
            @foreach ($topics as $topic)
                <p> {{$topic->name}} </p>  
                @for ($i = 1; $i <= 6; $i++)          
                    <input type="radio" name="topics[{{$topic->id}}]" value="{{$i}}" id="{{$topic->id}}_{{$i}}" >
                    <label for="{{$topic->id}}_{{$i}}">★</label>
                @endfor
            @endforeach
        </div> --}}
        <div class="clasificacion">
            @foreach ($topics as $topic)
                <p> {{$topic->name}} </p>    
                <input type="radio" name="topics[{{$topic->id}}]" value="1" id="{{$topic->id}}" >
                <label for="{{$topic->id}}"></label>
                <input type="radio" name="topics[{{$topic->id}}]" value="2" id="{{$topic->id}}" >
                <label for="{{$topic->id}}"></label>
                <input type="radio" name="topics[{{$topic->id}}]" value="3" id="{{$topic->id}}" >
                <label for="{{$topic->id}}"></label>
                <input type="radio" name="topics[{{$topic->id}}]" value="4" id="{{$topic->id}}" >
                <label for="{{$topic->id}}"></label>
                <input type="radio" name="topics[{{$topic->id}}]" value="5" id="{{$topic->id}}" >
                <label for="{{$topic->id}}"></label>
                <input type="radio" name="topics[{{$topic->id}}]" value="6" id="{{$topic->id}}" >
                <label for="{{$topic->id}}"></label>
            @endforeach
        </div>

        <button class="bg-gray-900 text-white text-sm font-light  py-2 px-4 rounded-lg mx-auto block">Enviar autoevaluación</button>
    </form>
    
    <button class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block">Cancelar</button>
@endsection