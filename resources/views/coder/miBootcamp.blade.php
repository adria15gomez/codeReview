@extends('layouts.coder')

@section('content')

    <div class="flex flex-col  mt-2 py-8 px-2 md:items-center">
        <h1 class="font-normal text-4xl pt-0 ml-2 pl-2 md:text-5xl">Mi bootcamp</h1>
        <h2 class="font-normal text-orange-600 text-4xl pt-6 ml-2 pl-2 md:text-5xl">{{$promotions->name}}</h2>
    </div>

    <img src="img/coder/mibootcamp.svg"
        alt=" bootcamp"class="w-full h-60 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" 
    />


    <div class="mr-5 mt-2 py-2 px-2 ml-10 md:ml-50 pb-10 md:justify-center">            
        <p><strong>Formador:</strong>{{$promotions->trainer}}</p>
        <p><strong>Fecha de inicio:</strong>{{$promotions->start_date}}</p>
        <p><strong>Fecha de fin:</strong>{{$promotions->end_date}}</p>
    </div>

    <div class="justify-center py-10 md:items-center block text-center">
        <button type="button " class="text-white m-2 bg-[#111827] hover:bg-[#111827]/80 focus:ring-4 focus:outline-none focus:ring-[#111827]/50 font-medium rounded-lg text-md px-5 py-2.5  text-center inline-flex items-center dark:hover:bg-[#111827]/40 dark:focus:ring-gray-600 mr-2 mb-2">
        Zoom
        <svg class="inline-flex items-center justify-end w-8 h-7 ml-52 -mr-1" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="zoom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V384c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1V320 192 174.9l14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z"/></svg>
        </button>
        <button type="button" class="text-white m-2 bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-md px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
        Slack
        <svg class="inline-flex items-center justify-end w-9 h-7 ml-52 -mr-1" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="slack" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M94.12 315.1c0 25.9-21.16 47.06-47.06 47.06S0 341 0 315.1c0-25.9 21.16-47.06 47.06-47.06h47.06v47.06zm23.72 0c0-25.9 21.16-47.06 47.06-47.06s47.06 21.16 47.06 47.06v117.84c0 25.9-21.16 47.06-47.06 47.06s-47.06-21.16-47.06-47.06V315.1zm47.06-188.98c-25.9 0-47.06-21.16-47.06-47.06S139 32 164.9 32s47.06 21.16 47.06 47.06v47.06H164.9zm0 23.72c25.9 0 47.06 21.16 47.06 47.06s-21.16 47.06-47.06 47.06H47.06C21.16 243.96 0 222.8 0 196.9s21.16-47.06 47.06-47.06H164.9zm188.98 47.06c0-25.9 21.16-47.06 47.06-47.06 25.9 0 47.06 21.16 47.06 47.06s-21.16 47.06-47.06 47.06h-47.06V196.9zm-23.72 0c0 25.9-21.16 47.06-47.06 47.06-25.9 0-47.06-21.16-47.06-47.06V79.06c0-25.9 21.16-47.06 47.06-47.06 25.9 0 47.06 21.16 47.06 47.06V196.9zM283.1 385.88c25.9 0 47.06 21.16 47.06 47.06 0 25.9-21.16 47.06-47.06 47.06-25.9 0-47.06-21.16-47.06-47.06v-47.06h47.06zm0-23.72c-25.9 0-47.06-21.16-47.06-47.06 0-25.9 21.16-47.06 47.06-47.06h117.84c25.9 0 47.06 21.16 47.06 47.06 0 25.9-21.16 47.06-47.06 47.06H283.1z"></path></svg>
        </button>

    </div>
    <h3 class="font-medium text-2xl px-10 pb-2 pt-2 ml-2 pl-2">Lista de Topics</h3>

    @foreach ($competences as $competence)
        <div class="mr-5 mt-2 py-2 px-2 ml-10 flex">
            <p class="mr-3"><strong>{{$competence->name}}:</strong></p>
            @foreach ($topics as $topic)
            <p class="mr-1">{{$topic->name}},</p>
            @endforeach  
        </div> 
    @endforeach

    <div class="mr-5 mt-2 items-center px-2 ml-28">
        <a type="submit"  value= "Volver" href="{{route('evaluations')}}"
        class=" flex text-white bg-[#050708] hover:bg-[#050708] transition-colors cursor-pointer
        uppercase font-medium w-36 p-3 rounded-lg justify-center">Volver</a>
    </div>
@endsection
