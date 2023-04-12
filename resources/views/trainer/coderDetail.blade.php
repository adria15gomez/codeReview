@extends('layouts.formador')
@section('content')
    <div class="md:items-center">
        <h1 class="font-medium text-4xl pt-0 ml-2 pl-2 mt-10 md:text-5xl grid ">Laura Garcia</h1>
        <img src="img/trainer/coderdetail.svg"alt="bootcamp"
            class="w-full h-60 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" />

        <h3 class="font-medium text-2xl  py-4 ml-10 md:items-center">Media global</h3>

        <div class="max-w-sm p-4 mx-5 border-transparent ml-10 mt-2 rounded-lg ">
            <div class="w-full bg-gray-500 rounded-lg">
                <div class="h-6 bg-orange-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-lg"
                    style="width: 75%">75%
                </div>
            </div>
        </div>


        <div class="max-w-sm p-6 mx-5 border ml-10 mt-4 border-gray-200 rounded-lg shadow bg-[#111827]">
            <div class="flex justify-between pt-4 mb-1">
                <span class="text-lg font-medium text-white">Evaluacion 1</span>
                <span>
                    <svg class="flex h-7 w-8 text-white" aria-hidden="true" focusable="false" data-prefix="fab"
                        data-icon="arrow" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            fill="currentColor"d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                    </svg>
                </span>
            </div>
            <div>
                <input type="submit" value="Ver resultados"class=" ml-20 pt-5 text-orange-600 cursor-pointer"></input>
            </div>
        </div>
        <button type="button"
            class="text-white w-80 justify-around text-base my-10  ml-10 bg-[#111827] hover:bg-[#111827]/80 focus:ring-4 focus:outline-none focus:ring-[#111827]/50 rounded-lg text-md py-4  text-center inline-flex items-center">
            Evaluacion 2
            <svg class="flex h-7 ml-4 -mr-1 w-8" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                    d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
            </svg>
        </button>


        <div class="-center ml-20">
            <input type="submit" value="Volver"
                class="py-5 px-8 ml-10 mb-8 text-white bg-[#050708] hover:bg-[#050708] transition-colors cursor-pointer
        uppercase font-medium w-40 p-3 rounded-lg">
            </input>
        </div>
@endsection