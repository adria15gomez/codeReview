@extends('layouts.coder')

@section('content')
  <p class="font-regular text-3xl text-left mt-5 ml-10 xl:text-center">Evaluación 1</p>
  <p class="font-regular text-xl text-left text-orange-600 mt-5 ml-10 mb-5 xl:text-center">Autoevaluación</p>
  <form action="{{route('evaluation.store')}}" method="POST" id="rating-form">
    @csrf
      
    <input type="hidden" name="evaluationType" value="autoevaluacion">
    
    <div class="rating">
      @foreach ($topics as $topic)
        <p class="font-bold ml-10 mb-2 xl:text-center">{{$topic->name}}</p>  
        <div class="flex mb-10 justify-center">
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-1" value="1" class="cara-input" />
          <label for="{{$topic->id}}-rating-1" class="cara" title="Mal"><img src="img/coder/1cara.svg" alt="Mal" /></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-2" value="2" class="cara-input" />
          <label for="{{$topic->id}}-rating-2" class="cara" title="Regular"><img src="img/coder/2cara.svg" alt="Regular" /></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-3" value="3" class="cara-input" />
          <label for="{{$topic->id}}-rating-3" class="cara" title="Bien"><img src="img/coder/3cara.svg" alt="Bien" /></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-4" value="4" class="cara-input" />
          <label for="{{$topic->id}}-rating-4" class="cara" title="Muy bien"><img src="img/coder/4cara.svg" alt="Muy bien" /></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-5" value="5" class="cara-input" />
          <label for="{{$topic->id}}-rating-5" class="cara" title="Genio/a"><img src="img/coder/5cara.svg" alt="Genio/a" /></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-6" value="6" class="cara-input" />
          <label for="{{$topic->id}}-rating-6" class="cara" title="Experto/a"><img src="img/coder/6cara.svg" alt="Experto/a" /></label>
        </div>
      @endforeach
      <button class="bg-gray-900 text-white text-sm font-light  py-2 px-4 rounded-lg mx-auto block">Enviar autoevaluación</button>
    </div>
  </form>
  
  <a href="{{route('evaluations')}}" class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-24">Cancelar</a>

@endsection