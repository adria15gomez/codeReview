@extends('layouts.coder')

@section('content')
<div class="flex flex-col items-center justify-center px-5">
  <h1 class="font-regular text-3xl text-center mt-5">Evaluación 1</h1>
  <h2 class="font-regular text-xl text-center text-orange-600 mt-5 mb-5">Autoevaluación</h2>
  <div class="flex justify-center mb-8">
    <p class="max-w-lg text-base text-center">Estás a punto de realizar tu autoevaluación, selecciona el nivel en el que te encuentras en cada habilidad. 
      Es importante que puedas identificar tus fortalezas y áreas de mejora.<br>
      <span class="font-semibold">¡El éxito es la suma de pequeños esfuerzos repetidos día tras día!</span>
    </p>
  </div>
  <div class="flex justify-center mb-8">
    <img class="h-40" src="..\img\coder\reviewToEvaluate.svg" alt="Leyenda">
  </div>
  
  <form action="{{route('evaluation.store')}}" method="POST" id="rating-form">
    @csrf
      
    <input type="hidden" name="evaluationType" value="autoevaluacion">
    
    <div class="rating">
      @foreach ($topics as $topic)
        <p class="font-bold mb-2 text-center">{{$topic->name}}</p>  
        <div class="flex mb-10 justify-center gap-4">
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-1" value="1" class="cara-input" />
          <label for="{{$topic->id}}-rating-1" class="cara" title="Saber Investigar"><img src="img/coder/1cara.svg" alt="Saber Investigar"/></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-2" value="2" class="cara-input" />
          <label for="{{$topic->id}}-rating-2" class="cara" title="Saber Recordar"><img src="img/coder/2cara.svg" alt="Saber"/></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-3" value="3" class="cara-input" />
          <label for="{{$topic->id}}-rating-3" class="cara" title="Saber Comprender"><img src="img/coder/3cara.svg" alt="Saber Comprender"/></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-4" value="4" class="cara-input" />
          <label for="{{$topic->id}}-rating-4" class="cara" title="Saber Aplicar"><img src="img/coder/4cara.svg" alt="Saber Aplicar"/></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-5" value="5" class="cara-input" />
          <label for="{{$topic->id}}-rating-5" class="cara" title="Saber Analizar"><img src="img/coder/5cara.svg" alt="Saber Analizar"/></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-6" value="6" class="cara-input" />
          <label for="{{$topic->id}}-rating-6" class="cara" title="Saber Crear"><img src="img/coder/6cara.svg" alt="Saber Crear"/></label>
        </div>
      @endforeach
      <button class="bg-gray-900 text-white text-sm font-light  py-2 px-4 rounded-lg mx-auto block">Enviar autoevaluación</button>
    </div>
  </form>
  
  <a href="{{route('evaluations')}}" class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-24">Cancelar</a>
</div>
@endsection