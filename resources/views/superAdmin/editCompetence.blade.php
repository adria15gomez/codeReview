@extends('layouts.superadmin')

@section('content')
    <p class="font-regular text-3xl text-left mt-5 ml-10">Editar Competencia</p>
    <img src="../img/admin/agregareditarcompetencia.svg" class="h-50 mx-auto" alt="Editar competencia" />

    <form action="{{ route('editCompetence.update', $competence) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-6">
            <label for="name" class="block ml-8 mb-2 text-medium font-medium">Nombre</label>
            <input type="text" name="name" value="{{ $competence->name }}"
                class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 w-5/6  ml-8 md:ml-2"
                placeholder="Nombre " />
        </div>

        <div class="mb-6">
            <label for="name" class="block ml-8 mb-2 text-medium font-medium">Descripcion</label>
            <input type="text" name="description" value="{{ $competence->description }}"
                class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 w-5/6  ml-8 md:ml-2"
                placeholder="Descripción" />
        </div>
        <button type="submit"
            class="text-white w-5/6 justify-around text-base mt-9  ml-8 md:ml-2 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-[orange-600]/50 rounded-lg  px-0.5 py-2 inline-flex ">
            <p class="no-underline text-white">Editar competencia</p>
        </button>

    </form>
    <a class="text-white w-5/6 justify-around text-base my-6  ml-8 bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 rounded-lg  px-0.5 py-2 inline-flex "
        href="{{ route('competence') }}">
        <p class="no-underline text-white">Cancelar</p>
    </a>
@endsection