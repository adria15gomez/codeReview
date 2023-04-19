@extends('layouts.coder')

@section('content')
<div class="flex flex-col items-center justify-center px-5">
    <p class="font-regular text-3xl mt-5 text-center">Evaluación 1</p>
    <p class="font-regular text-xl text-orange-600 mt-5 mb-5 text-center">Coevaluación</p>
    
    <div class="flex justify-center mb-8">
        <p class="max-w-lg text-base text-center">Estás a punto de realizar una coevaluación, elige a tu compañero y selecciona el nivel en el que consideras se encuestra en cada habilidad.<br>
          <span class="font-semibold">¡Es importante que puedas identificar sus fortalezas y áreas de mejora para su evolución!</span>
        </p>
    </div>
    <div class="flex justify-center mb-8">
        <img class="h-40" src="..\img\coder\reviewToEvaluate.svg" alt="Reseña">
    </div>

    <form action="{{route('evaluation.store')}}" method="POST">
        @csrf

        <input type="hidden" name="evaluationType" value="coevaluacion">

        <div class="text-center mb-4">
            <label for="user"></label>
            <select name="id_user_coevaluator" id="id_user_coevaluator" class=" border-orange-600 rounded-lg">
                <option value="">Selecciona un Coder</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select><br>
        </div>

        <div class="rating mt-10">
            @foreach ($topics as $topic)
                <p class="font-bold mb-2 text-center">{{$topic->name}}</p>  
                    <div class="flex mb-10 justify-center gap-4">
                    <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-1" value="1" class="cara-input" />
                    <label for="{{$topic->id}}-rating-1" class="cara" title="Saber Investigar"><img src="img/coder/1cara.svg" alt="Saber Investigar"/></label>
                    
                    <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-2" value="2" class="cara-input" />
                    <label for="{{$topic->id}}-rating-2" class="cara" title="Saber Recordar"><img src="img/coder/2cara.svg" alt="Saber Recordar" /></label>
                    
                    <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-3" value="3" class="cara-input" />
                    <label for="{{$topic->id}}-rating-3" class="cara" title="Saber Comprender"><img src="img/coder/3cara.svg" alt="Saber Comprender" /></label>
                    
                    <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-4" value="4" class="cara-input" />
                    <label for="{{$topic->id}}-rating-4" class="cara" title="Saber Aplicar"><img src="img/coder/4cara.svg" alt="Saber Aplicar" /></label>
                    
                    <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-5" value="5" class="cara-input" />
                    <label for="{{$topic->id}}-rating-5" class="cara" title="Saber Analizar"><img src="img/coder/5cara.svg" alt="Saber Analizar"/></label>
                    
                    <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}-rating-6" value="6" class="cara-input" />
                    <label for="{{$topic->id}}-rating-6" class="cara" title="Saber Crear"><img src="img/coder/6cara.svg" alt="Saber Crear"/></label>
                </div>
            @endforeach
            <button class="bg-gray-900 text-white text-sm font-light  py-2 px-4 rounded-lg mx-auto block">Enviar coevaluación</button>
        </div>
    </form>
    
    <a href="{{route('evaluations')}}" class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-24">Cancelar</a>
</div>
@endsection