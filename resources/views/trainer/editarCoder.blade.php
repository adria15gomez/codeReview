@extends('layouts.formador')
@section('content')

<div class="md:items-center">
        <h1 class="font-medium text-4xl pt-0 ml-2 pl-2 mt-10 md:text-5xl grid ">Editar Coder</h1>
        <img src="{{('img/trainer/agregareditarbootcamp.svg')}}"alt="bootcamp"
            class="w-full h-60 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy"/>
             <div class="flex md:justify-center">
        <form class="justify-center my-10 mx-4"action="{{ route('addPromotion.store') }}" method="POST">

            <div class="mb-6">
                <label for="name" class="block mb-2 text-medium font-medium">Nombre</label>
                <input type="text" id="name"
                    class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5"
                    placeholder="Introduce el nombre">

            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-medium font-medium">Email</label>
                <input type="text" id="email"
                    class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5"
                    placeholder="Introduce el email">

            </div>
             <button
                class="text-white w-80 justify-around text-base mt-10  ml-4 md:ml-2 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-[orange-600]/50 rounded-lg  px-0.5 py-4 inline-flex ">
                <a class="no-underline text-white" href="">Agregar coder</a>
            </button>
            <button
                class="text-white w-80 justify-around text-base my-6  ml-4 bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 rounded-lg  px-0.5 py-4 inline-flex ">
                <a class="no-underline text-white" href="">Cancelar</a>
            </button>

        </form>
            </div>
@endsection

