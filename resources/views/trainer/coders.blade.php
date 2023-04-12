@extends('layouts.formador')

@section('content')
    <div class="md:justify-center">
        <p class="gap-6 mb-6 grid-cols-2 font-normal text-3xl pt-0 ml-2 pl-2 mt-10 md:text-2xl grid ">Hola,Formador</p>
        <h1 class="gap-6 mb-6 grid-cols-2 font-medium text-4xl pt-0 ml-2 pl-2 mt-10 md:text-5xl grid ">Coders</h1>
        <img src="img/trainer/coders.svg"alt="bootcamp"
            class="w-full h-60 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" />

        <button
            class="text-white w-80 justify-around text-base my-10  ml-10 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-[orange-600]/50 rounded-lg  px-0.5 py-4 inline-flex ">
            <a class="no-underline text-white" href="">Agregar Coder</a>
            <svg class="flex h-7 ml-4 -mr-1 w-8 " aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                    d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
            </svg>
        </button>

        <h3 class="font-medium text-2xl  py-8 ml-10 ">Lista de coders</h3>

        <div class="max-w-sm p-6 mx-5 border ml-10 mt-4 border-gray-200 rounded-lg shadow bg-[#111827]">

            <div class="flex justify-between pt-4 mb-1">
                <span class="text-lg font-medium text-white">Laura Garcia</span>
                <span>
                    <svg class="flex h-7 w-8 text-white" aria-hidden="true" focusable="false" data-prefix="fab"
                        data-icon="arrow" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            fill="currentColor"d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                    </svg>
                </span>
            </div>


            <div class="w-full bg-gray-200 rounded-full my-10">
                <div class="h-6 bg-orange-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                    style="width: 75%">75%</div>
            </div>
            <div class="row-grid">
            <input type="submit" value="Ver"class="text-white ml-10 cursor-pointer"></input>
            <input type="submit" value="Editar"class="text-white mx-10 cursor-pointer"></input>
            <input type="submit" value="Eliminar"class=" mr-4 text-orange-600 cursor-pointer"></input>
            </div>
        </div>

        <button type="button"
            class="text-white w-80 justify-around text-base my-10  ml-10 bg-[#111827] hover:bg-[#111827]/80 focus:ring-4 focus:outline-none focus:ring-[#111827]/50 rounded-lg text-md py-4  text-center inline-flex items-center">
            Sergio González
            <svg class="flex h-7 ml-4 -mr-1 w-8" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                    d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
            </svg>
        </button>


    </div>
@endsection
