@extends('layouts.formador')

@section('content')
    <div class="flex flex-col items-center justify-center px-5">
        <h1 class="font-regular text-3xl text-center mt-5">Evaluación con fecha {{$date}}</h1>
        <h2 class="font-regular text-xl text-orange-600 mt-5 mb-5 text-center">Resultados de la evaluación </h2>

        @if($autoevaluation->isNotEmpty())
        <div class="flex justify-center mb-4">
            <p class="max-w-lg text-base text-center">En este apartado, puedes observar la comparativa de la autoevaluación y coevaluación de las habilidades de <span class="font-semibold">{{$user->name}}</span> según la percepción de si
            mismo/a con la opinión de su compañero. De izquierda a derecha, la escala cubre desde "Saber investigar" hasta
                "Saber crear".
            </p>
        </div>

        <div class="flex justify-center mb-8">
            <img class="h-40" src="\img\coder\reviewToEvaluate.svg" alt="Reseña">
        </div>

        @endif
        @if(!$autoevaluation->isNotEmpty())
        <p class="font-regular text-lg text-left mt-5 ml-10 mb-5">Debes autoevaluarte antes de ver la opinión de tu compañero/a.
        </p>
        @endif

        <div class="text-center mb-4">
            @if($autoevaluation->isNotEmpty())
            @foreach ($autoevaluation as $auto)
            <div class="ratingGroup mt-5">
                <h2 class="font-regular text-lg text-center font-bold">{{ $auto->name }}</h2>
                <h3 class="font-regular text-sm text-center mt-2 mb-2 flex justify-center gap-1 text-gray-900"><span class="font-medium">Autoevaluación:</span>
                    @if($auto->level == 1)
                    <p class="text-sm">Saber Investigar</p>
                    @endif
                    @if($auto->level == 2)
                    <p class="text-sm">Saber Recordar</p>
                    @endif
                    @if($auto->level == 3)
                    <p class="text-sm">Saber Comprender</p>
                    @endif
                    @if($auto->level == 4)
                    <p class="text-sm">Saber Aplicar</p>
                    @endif
                    @if($auto->level == 5)
                    <p class="text-sm">Saber Analizar</p>
                    @endif
                    @if($auto->level == 6)
                    <p class="text-sm">Saber Crear</p>
                    @endif
                </h3>
                <div class="ratingGroup mt-5">
                    <div class="flex max-w-sm justify-between md:gap-2 xl:gap-3">
                        <label for="{{$auto->name}}-rating-1" class="{{ $auto->level === 1 ? 'opacity-100' : 'cara' }}" title="Saber Investigar"><img src="/img/coder/1cara.svg" alt="Saber Investigar" /></label>

                        <label for="{{$auto->name}}-rating-2" class="{{ $auto->level === 2 ? 'opacity-100' : 'cara' }}" title="Saber Recorar"><img src="/img/coder/2cara.svg" alt="Saber Recordar"/></label>

                        <label for="{{$auto->name}}-rating-3" class="{{ $auto->level === 3 ? 'opacity-100' : 'cara' }}" title="Saber Comprender"><img src="/img/coder/3cara.svg" alt="Saber Comprender" /></label>

                        <label for="{{$auto->name}}-rating-4" class="{{ $auto->level === 4 ? 'opacity-100' : 'cara' }}" title="Saber Aplicar"><img src="/img/coder/4cara.svg" alt="Saber Aplicar" /></label>

                        <label for="{{$auto->name}}-rating-5" class="{{ $auto->level === 5 ? 'opacity-100' : 'cara' }}" title="Saber Analizar"><img src="/img/coder/5cara.svg" alt="Saber Analizar" /></label>

                        <label for="{{$auto->name}}-rating-6" class="{{ $auto->level === 6 ? 'opacity-100' : 'cara' }}" title="Saber Crear"><img src="/img/coder/6cara.svg" alt="Saber Crear"/></label>
                    </div>
                </div>
                @foreach ($coevaluations as $coeval)
                @if($coeval->name === $auto->name)
                <h2 class="font-regular text-sm text-center mt-5 mb-2 flex justify-center gap-1 text-orange-600"><span class="font-medium">Evaluación de mi compañero/a:</span>
                    @if($coeval->level == 1)
                    <br><p class="text-sm">Saber Investigar</p>
                    @endif
                    @if($coeval->level == 2)
                    <p class="text-sm">Saber Recordar</p>
                    @endif
                    @if($coeval->level == 3)
                    <p class="text-sm">Saber Comprender</p>
                    @endif
                    @if($coeval->level == 4)
                    <p class="text-sm">Saber Aplicar</p>
                    @endif
                    @if($coeval->level == 5)
                    <p class="text-sm">Saber Analizar</p>
                    @endif
                    @if($coeval->level == 6)
                    <p class="text-sm">Saber Crear</p>
                    @endif
                </h2>
                <div class="ratingGroup mt-5">
                    <div class="flex max-w-sm justify-between md:gap-2 xl:gap-3">

                        <label for="{{$coeval->name}}-rating-1" class="{{ $coeval->level === 1 ? 'cara-dark' : 'cara' }}" title="Saber Investogar"><img src="/img/coder/1cara.svg" alt="Saber Investogar" /></label>

                        <label for="{{$coeval->name}}-rating-2" class="{{ $coeval->level === 2 ? 'cara-dark' : 'cara' }}" title="Saber Recordar"><img src="/img/coder/2cara.svg" alt="Saber Recordar" /></label>

                        <label for="{{$coeval->name}}-rating-3" class="{{ $coeval->level === 3 ? 'cara-dark' : 'cara' }}" title="Saber Comprender"><img src="/img/coder/3cara.svg" alt="Saber Comprender" /></label>

                        <label for="{{$coeval->name}}-rating-4" class="{{ $coeval->level === 4 ? 'cara-dark' : 'cara' }}" title="Saber Aplicar"><img src="/img/coder/4cara.svg" alt="Saber Aplicar" /></label>

                        <label for="{{$coeval->name}}-rating-5" class="{{ $coeval->level === 5 ? 'cara-dark' : 'cara' }}" title="Saber Analizar"><img src="/img/coder/5cara.svg" alt="Saber Analizar" /></label>

                        <label for="{{$coeval->name}}-rating-6" class="{{ $coeval->level === 6 ? 'cara-dark' : 'cara' }}" title="Saber Crear"><img src="/img/coder/6cara.svg" alt="Saber Crear" /></label>
                    </div>
                    @endif
                    @endforeach

                </div>
                @endforeach
                @endif
            </div>

            <div class="mt-5 items-center px-2 flex flex-col">
                <a type="submit" value="Volver" href="{{route('coders')}}" class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-24">Volver</a>
            </div>        
        </div>
    </div>
@endsection