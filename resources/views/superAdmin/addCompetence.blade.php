@extends('layouts.superadmin')

@section('content') 
    <section class="flex flex-col items-center justify-center">
        <h1 class="font-regular text-3xl text-center mt-5">Agregar Competencia</h1>
        <img src="../img/admin/agregareditarcompetencia.svg" class="h-50 mt-5 xl:h-80" alt="Agregar competencia" />

        <form action="{{ route('addCompetence.store') }}" method="POST">
            @csrf

            <div>
                @if ($errors->has('name'))
                    <div class="alert alert-danger mb-1 text-center font-bold">{{ $errors->first('name') }}</div>
                @endif

                @if ($errors->has('description'))
                    <div class="alert alert-danger mb-1 text-center font-bold">{{ $errors->first('description') }}</div>
                @endif
            </div>

            <div class="mb-6">
                <label for="name" class="block mb-2 text-medium font-medium">Marco de competencias</label>
                <input type="text" name="name"
                    class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-72 p-2.5"
                    placeholder="Nombre " 
                />
            </div>

            <div class="mb-6">
                <label for="name" class="block mb-2 text-medium font-medium">Competencias</label>
                <input type="text" name="description"
                    class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-72 p-2.5"
                    placeholder="Nombre " />
            </div>
            <button type="submit"
                class="bg-orange-600 text-white text-sm font-light py-2 px-10 rounded-lg mx-auto block hover:bg-black">
                <p class="no-underline">Agregar competencia</p>
            </button>

        </form>
        <a  href="{{ route('competence') }}"
            class="bg-gray-900 text-white text-sm font-light py-2 rounded-lg mx-auto block text-center w-40 hover:bg-black mt-6">
            <p class="no-underline">Cancelar</p>
        </a>        
    </section>
@endsection
