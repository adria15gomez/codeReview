@extends('layouts.coder')

@section('content')
    <div class="flex flex-col items-center justify-center">
        <h1 class="font-regular text-3xl text-center mt-5">Mi bootcamp</h1>
        <h2 class="font-regular text-2xl text-center mt-5 text-orange-600">{{ $promotions->name }}</h2>

        <img src="img/coder/mibootcamp.svg" alt="bootcamp" class="h-50 xl:h-80 mt-5" loading="lazy">

        <div class="py-2 px-2 mt-2">
            <p><strong>Formador/a:</strong> {{ $promotions->trainer }}</p>
            <p><strong>Fecha de inicio:</strong> {{ $promotions->start_date }}</p>
            <p><strong>Fecha de fin:</strong> {{ $promotions->end_date }}</p>
        </div>

        <div class="flex-col gap-3 mt-10">

            <a type="button" href="{{ $promotions->zoom_url }}" target="_blank"
                class="flex justify-between items-center text-white bg-gray-900 w-72 h-12 mb-5 px-4 rounded-xl hover:bg-black">
                Zoom
                <svg class="w-9 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="zoom" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path fill="currentColor"
                        d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V384c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1V320 192 174.9l14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z" />
                </svg>
            </a>

            <a type="button" href="{{ $promotions->slack_url }}" target="_blank"
                class="flex justify-between items-center text-white bg-orange-600 w-72 h-12 px-4 rounded-xl hover:bg-black">
                Slack
                <svg class="w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="slack" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M94.12 315.1c0 25.9-21.16 47.06-47.06 47.06S0 341 0 315.1c0-25.9 21.16-47.06 47.06-47.06h47.06v47.06zm23.72 0c0-25.9 21.16-47.06 47.06-47.06s47.06 21.16 47.06 47.06v117.84c0 25.9-21.16 47.06-47.06 47.06s-47.06-21.16-47.06-47.06V315.1zm47.06-188.98c-25.9 0-47.06-21.16-47.06-47.06S139 32 164.9 32s47.06 21.16 47.06 47.06v47.06H164.9zm0 23.72c25.9 0 47.06 21.16 47.06 47.06s-21.16 47.06-47.06 47.06H47.06C21.16 243.96 0 222.8 0 196.9s21.16-47.06 47.06-47.06H164.9zm188.98 47.06c0-25.9 21.16-47.06 47.06-47.06 25.9 0 47.06 21.16 47.06 47.06s-21.16 47.06-47.06 47.06h-47.06V196.9zm-23.72 0c0 25.9-21.16 47.06-47.06 47.06-25.9 0-47.06-21.16-47.06-47.06V79.06c0-25.9 21.16-47.06 47.06-47.06 25.9 0 47.06 21.16 47.06 47.06V196.9zM283.1 385.88c25.9 0 47.06 21.16 47.06 47.06 0 25.9-21.16 47.06-47.06 47.06-25.9 0-47.06-21.16-47.06-47.06v-47.06h47.06zm0-23.72c-25.9 0-47.06-21.16-47.06-47.06 0-25.9 21.16-47.06 47.06-47.06h117.84c25.9 0 47.06 21.16 47.06 47.06 0 25.9-21.16 47.06-47.06 47.06H283.1z">
                    </path>
                </svg>
            </a>
        </div>

        <h3 class="font-regular text-xl text-center mt-10 mb-5">Lista de Topics</h3>
        <table class="table-auto border-2 border-collapse border-orange-600 rounded-lg">
            <thead class="border-2 px-4 py-2 border-orange-600 rounded-lg">
                <tr>
                    <th>COMPETENCIAS</th>
                    <th class="border-2 px-4 py-2 border-orange-600 rounded-lg">TOPICS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($competences as $competence)
                    <tr class="border-2 px-4 py-2 border-orange-600 rounded-lg">
                        <td class="px-4 py-2 w-96"><strong>{{ $competence->name }}<br><span
                                    class="text-sm font-medium">{{ $competence->description }}</span></strong></td>
                        <td class="border-2 px-4 py-2 border-orange-600 rounded-lg">
                            @foreach ($topics as $topic)
                                @if ($topic->competence_id == $competence->id)
                                    <p>{{ $topic->name }}</p>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            <a href="{{ route('evaluations') }}"
                class="bg-black text-white text-sm font-light py-2 px-4 mt-4 rounded-lg mx-auto block w-24 text-center">
                Volver
            </a>
        </div>
    </div>
@endsection
