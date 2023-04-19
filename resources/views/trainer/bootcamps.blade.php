@extends('layouts.coder')

@section('content')
<div class="flex flex-col  mt-2 py-8 px-2 md:items-center">
        <h1 class="font-normal text-4xl pt-0 ml-2 pl-2 md:text-5xl">Bootcamps</h1>
         <img src="{{'img/trainer/bootcamps.svg'}}"alt="bootcamp"
        class="w-full h-60 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" />

    </div>

    <button type="button"class="ease-in duration-300 text-white w-80 justify-around my-10 ml-10 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-orange-600/50 rounded-lg text-md py-4 inline-flex ">Agregar bootcamp
        <svg class="flex h-7 ml-4 -mr-1 w-8" aria-hidden="true" focusable="false" data-prefix="fab"data-icon="arrow"role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
        </svg>
    </button>

    <div class="sm:w-80 sm:h-30 sm:flex sm:justify-center md:flex md:justify-center px-4 py-2 mr-6  border ml-10 mt-0.5 border-gray-200 rounded-lg shadow bg-[#111827]">
        <div class="flex justify-between pt-4 mb-1">
            <span class="text-lg font-medium text-white mb-4">FemCoders Norte</span>
             <svg class="flex h-7 w-8 text-white" aria-hidden="true" focusable="false" data-prefix="fab"
                    data-icon="arrow" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        fill="currentColor"d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                </svg>
        </div>

        <div class="row-grid mb-8 mt-4">
            <input type="submit" value="Ver"class="text-white ml-6 cursor-pointer"></input>
            <span class="text-white ml-4 cursor-pointer">&#8739</span>
            <input type="submit" value="Editar"class="text-white mx-6 cursor-pointer"></input>
            <span class="text-white mr-4 cursor-pointer">&#8739</span>
            <input type="submit" value="Eliminar"class=" mr-4 text-orange-600 cursor-pointer"></input>
        </div>
    </div>

    <button type="button"class="ease-in duration-300 text-white w-80 justify-around my-10 ml-10 bg-[#111827] hover:bg-[#111827]/80 focus:ring-4 focus:outline-none focus:ring-[#111827]/50 rounded-lg text-md py-4 inline-flex ">Frontend Gijón
        <svg class="flex h-7 ml-4 -mr-1 w-8" aria-hidden="true" focusable="false" data-prefix="fab"data-icon="arrow"role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
        </svg>
    </button>





@endsection