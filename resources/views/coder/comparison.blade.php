@extends('layouts.coder')

@section('content')
    <h2 class="font-regular text-3xl text-left mt-5 ml-10 xl:text-center">Resultados Evaluación </h2>
    <h1 class="font-regular text-xl text-left text-orange-600 mt-5 ml-10 mb-5 xl:text-center">Evaluación de la fecha {{$date}}</h1>    
    <p class="xl:text-center">En este apartado, puedes comparar la percepción de tus habilidades con la opinión de tu compañero.</p>

    <h2 class="font-regular text-xl text-left text-orange-600 mt-5 ml-10 mb-5 xl:text-center">Autoevaluación</h2>
    @if($autoevaluation->isNotEmpty())
        @foreach ($autoevaluation as $auto)
            <div class="ratingGroup">
                <h4 class="font-medium">{{ $auto->name }}</h4>
                <div class="flex">
                    <label for="{{$auto->name}}-rating-1" class="{{ $auto->level === 1 ? 'opacity-100' : 'cara' }}" title="Mal"><img
                            src="/img/coder/1cara.svg" alt="Mal" /></label>

                    <label for="{{$auto->name}}-rating-2" class="{{ $auto->level === 2 ? 'opacity-100' : 'cara' }}"
                        title="Regular"><img src="/img/coder/2cara.svg" alt="Regular" /></label>

                    <label for="{{$auto->name}}-rating-3" class="{{ $auto->level === 3 ? 'opacity-100' : 'cara' }}"
                        title="Bien"><img src="/img/coder/3cara.svg" alt="Bien" /></label>

                    <label for="{{$auto->name}}-rating-4" class="{{ $auto->level === 4 ? 'opacity-100' : 'cara' }}"
                        title="Muy bien"><img src="/img/coder/4cara.svg" alt="Muy bien" /></label>

                    <label for="{{$auto->name}}-rating-5" class="{{ $auto->level === 5 ? 'opacity-100' : 'cara' }}"
                        title="Genio/a"><img src="/img/coder/5cara.svg" alt="Genio/a" /></label>

                    <label for="{{$auto->name}}-rating-6" class="{{ $auto->level === 6 ? 'opacity-100' : 'cara' }}"
                        title="Experto/a"><img src="/img/coder/6cara.svg" alt="Experto/a" /></label>
                </div>
            </div>
        @endforeach
    @endif

    <h2 class="font-regular text-xl text-left text-orange-600 mt-5 ml-10 mb-5">Coevaluación</h2>
    @if($coevaluations->isNotEmpty())
        @foreach ($coevaluations as $coeval)
            <div class="ratingGroup">
                <h4 class="font-medium">{{ $coeval->name }}</h4>
                <div class="flex">

                <label for="{{$coeval->name}}-rating-1" class="{{ $coeval->level === 1 ? 'cara-dark' : 'cara' }}"
                    title="Mal"><img src="/img/coder/1cara.svg" alt="Mal" /></label>

                <label for="{{$coeval->name}}-rating-2" class="{{ $coeval->level === 2 ? 'cara-dark' : 'cara' }}"
                    title="Regular"><img src="/img/coder/2cara.svg" alt="Regular" /></label>

                <label for="{{$coeval->name}}-rating-3" class="{{ $coeval->level === 3 ? 'cara-dark' : 'cara' }}"
                    title="Bien"><img src="/img/coder/3cara.svg" alt="Bien" /></label>

                <label for="{{$coeval->name}}-rating-4" class="{{ $coeval->level === 4 ? 'cara-dark' : 'cara' }}"
                    title="Muy bien"><img src="/img/coder/4cara.svg" alt="Muy bien" /></label>

                <label for="{{$coeval->name}}-rating-5" class="{{ $coeval->level === 5 ? 'cara-dark' : 'cara' }}"
                    title="Genio/a"><img src="/img/coder/5cara.svg" alt="Genio/a" /></label>

                <label for="{{$coeval->name}}-rating-6" class="{{ $coeval->level === 6 ? 'cara-dark' : 'cara' }}"
                    title="Experto/a"><img src="/img/coder/6cara.svg" alt="Experto/a" /></label>
            </div>
        @endforeach
    @endif
@endsection