@extends('layouts.coder')

@section('content')
<h1>Evaluación de la fecha {{$date}}</h1>
<h2>Resultados evaluación </h2>
<p>En este apartado, puedes comparar la percepción de tus habilidades con la opinión de tu compañero.</p>

<h2>Autoevaluación</h2>
@if($autoevaluation->isNotEmpty())
@foreach ($autoevaluation as $auto)
<div class="ratingGroup">
    <h4>{{ $auto->name }}</h4>
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

<h2>Coevaluación</h2>
@if($coevaluations->isNotEmpty())
@foreach ($coevaluations as $coeval)
<div class="ratingGroup">
    <h4>{{ $coeval->name }}</h4>
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

    <script>
    const images = document.querySelectorAll('.rating img');

    // img.addEventListener('click', () => {
    //     images.forEach(otherImg => otherImg.style.opacity = 0.3);
    //     img.style.opacity = 1;
    //     const input = img.parentElement.previousElementSibling;
    //     input.checked = true;
    // });

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