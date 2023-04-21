@extends('layouts.superadmin')

@section('content')
    <div class="flex flex-col items-center justify-center">
        <h1 class="font-regular text-3xl text-center mt-5">Editar Competencia</h1>
        <img src="../img/admin/agregareditarcompetencia.svg" class="h-50 mt-5 xl:h-80" alt="Editar competencia" />

        <form action="{{ route('editCompetence.update', $competence) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="name" class="block mb-2 text-medium font-medium">Marco de competencias</label>
                <input type="text" name="name" value="{{ $competence->name }}"
                    class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-72 p-2.5"
                    placeholder="Nombre " />
            </div>

            <div class="mb-6">
                <label for="name" class="block ml-8 mb-2 text-medium font-medium">Competencia</label>
                <input type="text" name="description" value="{{ $competence->description }}"
                    class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-72 p-2.5"
                    placeholder="Descripción" />
            </div>
            <button type="submit"
                class="bg-orange-600 text-white text-sm font-light py-2 px-10 rounded-lg mx-auto block hover:bg-black">
                <p class="no-underline">Editar competencia</p>
            </button>

        </form>
        <a class="bg-gray-900 text-white text-sm font-light py-2 rounded-lg mx-auto block text-center w-40 hover:bg-black mt-6"
            href="{{ route('competence') }}">
            <p class="no-underline">Cancelar</p>
        </a>
    </div>
@endsection