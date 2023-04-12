@extends('layouts.formador')

@section('content')
    <h1 class="font-medium text-4xl pt-0 ml-2 pl-2 mt-10 md:text-5xl ">Bootcamps</h1>
    <img src="img/trainer/bootcamps.svg"alt="bootcamp"
        class="w-full h-60 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" />

    <button
        class="text-white w-80 justify-around text-base my-10  ml-10 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-[orange-600]/50 rounded-lg  px-0.5 py-4 inline-flex ">
        <a class="no-underline text-white" href="{{ route('addPromotion.create') }}">Agregar Bootcamp</a>
        <svg class="flex h-7 ml-4 -mr-1 w-8 " aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
        </svg>
    </button>

    <ul>
        @foreach ($promotions as $promotion)
            <li>
                <strong>{{ $promotion->name }}</strong>
                <br>
                Formador principal: {{ $promotion->trainer }}
                <br>
                Fecha de inicio: {{ $promotion->start_date }}
                <br>
                Fecha de final:{{ $promotion->end_date }}
                <br>
                Enlace al Zoom:{{ $promotion->zoom_url }}
                <br>
                Enlace al Slack: {{ $promotion->slack_url }}
                <br>
                <a href="{{ route('editPromotion.edit', $promotion) }}"> Editar </a>
                <form action="{{ route('deletePromotion.destroy', $promotion) }}" method="POST">

                    @csrf
                    @method('delete')
                    <button type="submit">Eliminar</button>

                </form>
                <br>
            </li>
        @endforeach

    </ul>

    <h3 class="font-medium text-2xl  ml-10 ">Lista de bootcamps</h3>

    <div class="max-w-sm p-6 mx-5 border ml-10 mt-4 border-gray-200 rounded-lg shadow bg-[#111827]">
        <h5 class="flex-row ml-0.5 mb-2 text-2xl font-medium text-white">
            FemCoders Norte</h5>
        <a href="#">
            <svg class="flex h-7 w-8 text-white" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                    fill="currentColor"d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
            </svg>
        </a>

        <input type="submit" value="Ver"class="flex-row text-white mr-4 cursor-pointer"></input>
        <input type="submit" value="Editar"class=" flex-row text-white mr-4 cursor-pointer"></input>
        <input type="submit" value="Eliminar"class="flex-row text-orange-600 cursor-pointer"></input>

    </div>

    <button type="button"
        class="text-white w-80 justify-around text-base my-10  ml-10 bg-[#111827] hover:bg-[#111827]/80 focus:ring-4 focus:outline-none focus:ring-[#111827]/50 rounded-lg text-md py-4  text-center inline-flex items-center">
        Frontend Gijón
        <svg class="flex h-7 ml-4 -mr-1 w-8" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="arrow"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
        </svg>
    </button>
@endsection