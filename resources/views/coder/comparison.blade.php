@extends('layouts.coder')

@section('content')
<h1 class="font-regular text-3xl text-left mt-5 ml-10">Evaluación con fecha {{$date}}</h1>
<h2 class="font-regular text-xl text-left text-orange-600 mt-5 ml-10 mb-5">Resultados de la evaluación </h2>
<p class="font-regular text-lg text-left mt-5 ml-10 mb-5">En este apartado, puedes comparar la percepción de tus
    habilidades con la opinión de tu compañero. <br>De izquierda a derecha, la escala cubre desde "Mal" hasta
    "Experto/a". <strong>¡Mira tu evolución con otros ojos!</strong>
</p>
<div class="mt-5 ml-10 mb-5">
    @if($autoevaluation->isNotEmpty())
    @foreach ($autoevaluation as $auto)
    <div class="ratingGroup mt-5">
        <h2 class="font-regular text-xl text-left uppercase font-bold">{{ $auto->name }}</h2>
        <h3 class="font-regular text-xl text-left mt-2 mb-2 ml-3">Autoevaluación :
            @if($auto->level == 1)
            Mal
            @endif
            @if($auto->level == 2)
            Regular
            @endif
            @if($auto->level == 3)
            Bien
            @endif
            @if($auto->level == 4)
            Muy bien
            @endif
            @if($auto->level == 5)
            Genio
            @endif
            @if($auto->level == 6)
            Experto
            @endif
        </h3>
        <div class="flex max-w-lg justify-between mr-3.5">
            <label for="{{$auto->name}}-rating-1" class="{{ $auto->level === 1 ? 'opacity-100' : 'cara' }}" title="Mal"><img src="/img/coder/1cara.svg" alt="Mal" /></label>

            <label for="{{$auto->name}}-rating-2" class="{{ $auto->level === 2 ? 'opacity-100' : 'cara' }}" title="Regular"><img src="/img/coder/2cara.svg" alt="Regular" /></label>

            <label for="{{$auto->name}}-rating-3" class="{{ $auto->level === 3 ? 'opacity-100' : 'cara' }}" title="Bien"><img src="/img/coder/3cara.svg" alt="Bien" /></label>

            <label for="{{$auto->name}}-rating-4" class="{{ $auto->level === 4 ? 'opacity-100' : 'cara' }}" title="Muy bien"><img src="/img/coder/4cara.svg" alt="Muy bien" /></label>

            <label for="{{$auto->name}}-rating-5" class="{{ $auto->level === 5 ? 'opacity-100' : 'cara' }}" title="Genio/a"><img src="/img/coder/5cara.svg" alt="Genio/a" /></label>

            <label for="{{$auto->name}}-rating-6" class="{{ $auto->level === 6 ? 'opacity-100' : 'cara' }}" title="Experto/a"><img src="/img/coder/6cara.svg" alt="Experto/a" /></label>
        </div>
        @foreach ($coevaluations as $coeval)
        @if($coeval->name === $auto->name)
        <h2 class="font-regular text-xl text-left mt-4 mb-2 ml-3">Evaluación de mi compañero/a:
            @if($coeval->level == 1)
            Mal
            @endif
            @if($coeval->level == 2)
            Regular
            @endif
            @if($coeval->level == 3)
            Bien
            @endif
            @if($coeval->level == 4)
            Muy bien
            @endif
            @if($coeval->level == 5)
            Genio
            @endif
            @if($coeval->level == 6)
            Experto
            @endif
        </h2>
        <div class="ratingGroup">
            <div class="flex max-w-lg justify-between mr-3.5">

                <label for="{{$coeval->name}}-rating-1" class="{{ $coeval->level === 1 ? 'cara-dark' : 'cara' }}" title="Mal"><img src="/img/coder/1cara.svg" alt="Mal" /></label>

                <label for="{{$coeval->name}}-rating-2" class="{{ $coeval->level === 2 ? 'cara-dark' : 'cara' }}" title="Regular"><img src="/img/coder/2cara.svg" alt="Regular" /></label>

                <label for="{{$coeval->name}}-rating-3" class="{{ $coeval->level === 3 ? 'cara-dark' : 'cara' }}" title="Bien"><img src="/img/coder/3cara.svg" alt="Bien" /></label>

                <label for="{{$coeval->name}}-rating-4" class="{{ $coeval->level === 4 ? 'cara-dark' : 'cara' }}" title="Muy bien"><img src="/img/coder/4cara.svg" alt="Muy bien" /></label>

                <label for="{{$coeval->name}}-rating-5" class="{{ $coeval->level === 5 ? 'cara-dark' : 'cara' }}" title="Genio/a"><img src="/img/coder/5cara.svg" alt="Genio/a" /></label>

                <label for="{{$coeval->name}}-rating-6" class="{{ $coeval->level === 6 ? 'cara-dark' : 'cara' }}" title="Experto/a"><img src="/img/coder/6cara.svg" alt="Experto/a" /></label>
            </div>
            @endif
            @endforeach

        </div>

        @endforeach
        @endif
    </div>
    <script>
        const images = document.querySelectorAll('.rating img');

        img.addEventListener('mouseover', () => {
            const tooltip = img.nextElementSibling;
            tooltip.classList.add('show');
        });

        img.addEventListener('mouseout', () => {
            const tooltip = img.nextElementSibling;
            tooltip.classList.remove('show');
        });
    </script>
    <style>
        .rating input[type="radio"] {
            display: none;
        }

        .cara-input {
            display: none;
        }

        .cara .cara-dark {
            margin-right: 1em;
            padding: 1px;
            transition: opacity 0.2s;
            position: relative;
        }

        .cara {
            opacity: 0.4;
        }

        .cara-dark {
            opacity: 1;
        }

        .cara:hover {
            cursor: pointer;
        }

        .cara:hover::before {
            content: attr(title);
            font-family: 'Poppins';
            position: absolute;
            top: -4em;
            left: 50%;
            padding: 0.5em;
            border-radius: 0.5em;
            background-color: #333;
            color: #fff;
            white-space: nowrap;
            z-index: 1;
            opacity: 0;
            transform: translate(-50%, -10px);
            transition: all 0.2s;
        }

        .cara:hover::after {
            content: "";
            position: absolute;
            top: -1em;
            left: 50%;
            border: 0.5em solid transparent;
            border-top-color: #333;
            z-index: 1;
            opacity: 0;
            transform: translate(-50%, -10px);
            transition: all 0.2s;
        }

        .cara:hover::before,
        .cara:hover::after {
            opacity: 1;
            transform: translate(-50%, -20px);
        }

        .cara-input:checked+.cara {
            opacity: 1;
        }
    </style>
    @endsection