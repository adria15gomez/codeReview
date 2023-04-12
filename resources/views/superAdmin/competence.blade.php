@extends('layouts.superadmin')

@section('content')
    <p class="font-regular text-3xl text-left mt-5 ml-10">Competencias</p>
    <img src="img\admin\competencias.svg" class="h-50 mx-auto" alt="competencias" />
    <button
        class="text-white w-5/6 justify-around text-base mt-9  ml-8 md:ml-2 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-[orange-600]/50 rounded-lg  px-0.5 py-2 inline-flex ">
        <p class="no-underline text-white" href="{{ route('addCompetence.create') }}">Agregar Competencia</p>
        <svg class="flex h-7 ml-4 -mr-1 w-8 " aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
        </svg>
    </button>
    <p class="font-regular text-xl text-left mt-10 ml-10 mb-5">Lista de competencias</p>
    <div class="bg-gray-900 w-5/6 ml-10 rounded-xl mt-1 p-4 shadow-md">
        <ul>
            <li>
                @foreach ($competences as $competence)
                    <div>
                        <p class="no-underline text-white text-lg font-medium text-justify">{{ $competence->name }}</p>
                        <p class="no-underline text-white">{{ $competence->description }}</p>
                        <a class="fonthref="{{ route('editCompetence.edit', $competence) }}">Editar</a>
                        <form action="{{ route('deleteCompetence.distroy', $competence) }}" method="POST">

                            @csrf
                            @method('delete')

                            <button type="submit">Eliminar</button>
                        </form>
                    </div>
                @endforeach

            </li>
        </ul>
    </div>
@endsection
