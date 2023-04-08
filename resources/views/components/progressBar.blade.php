{{-- Hay que pasarle como variables los datos de la base de datos --}}
@php
    $autoevaluacion = 75;
    $coevaluacion = 85;
    $average = progressBar($autoevaluacion, $coevaluacion);
@endphp

@php
    function progressBar($autoevaluacion, $coevaluacion) {
        $average = round(($autoevaluacion + $coevaluacion) / 2, 2);
        return $average;
    };
@endphp

{{-- Falta arreglar responsive para desktop --}}
<div class="w-72 bg-gray-300 rounded-full ml-10 dark:bg-gray-700">
    <div class="bg-gradient-to-r from-orange-600 to-gray-900 text-xs font-medium text-blue-100 text-center p-1 leading-none rounded-full" style="width: {{ $average }}%" aria-valuenow="{{ $average }}" aria-valuemin="0" aria-valuemax="10">{{ $average }}</div>
</div>
