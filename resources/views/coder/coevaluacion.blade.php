@extends('layouts.coder')

@section('content')
    <p class="font-regular text-3xl text-left mt-5 xl:text-center">Evaluación 1</p>
    <p class="font-regular text-xl text-left text-orange-600 mt-5 mb-5 xl:text-center">Coevaluación</p>
    <form action="{{route('evaluation.store')}}" method="POST">
        @csrf

        <input type="hidden" name="evaluationType" value="coevaluacion">

        <div class=" xl:text-center mb-4">
            <label for="user"></label>
            <select name="id_user_coevaluator" id="id_user_coevaluator" class=" border-orange-600 rounded-lg">
                <option value="">Selecciona un Coder</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select><br>
        </div>

        <div class="rating">
            @foreach ($topics as $topic)
                <p class="font-bold mb-2 xl:text-center">{{$topic->name}}</p>  
                    <div class="flex mb-10 justify-center gap-4">
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
            <button class="bg-gray-900 text-white text-sm font-light  py-2 px-4 rounded-lg mx-auto block">Enviar coevaluación</button>
        </div>
    </form>
    
    <a href="{{route('evaluations')}}" class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-24">Cancelar</a>
@endsection