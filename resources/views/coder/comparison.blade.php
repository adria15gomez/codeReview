@extends('layouts.coder')

@section('content')
<h1>Evaluación de la fecha {{$date}}</h1>
<h2>Resultados evaluación </h2>
<p>En este apartado, puedes comparar la percepción de tus habilidades con la opinión de tu compañero.</p>

<h2>Autoevaluación</h2>
@if($autoevaluation->isNotEmpty())
@foreach ($autoevaluation as $auto)

<li>{{ $auto->name }} - {{ $auto->level }}</li>
@endforeach
@endif

<h2>Coevaluación</h2>
@if($coevaluations->isNotEmpty())
@foreach ($coevaluations as $coeval)
<li>{{ $coeval->name }} - {{ $coeval->level }}</li>
@endforeach
@endif
@endsection