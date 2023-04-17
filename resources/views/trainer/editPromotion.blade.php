@extends('layouts.formador')

@section('content')
    <h1 class="gap-6 mb-6 grid-cols-2 font-medium text-4xl pt-0 ml-2 pl-2 mt-10 md:text-5xl xl:text-center">Editar Bootcamp</h1>
    <img src="{{('../img/trainer/agregareditarbootcamp.svg')}}"alt="bootcamp"
        class="w-full h-60 my-8 sm:h-52 sm:col-span-2 md:h-80 w-100 items-center col-span-full" loading="lazy" 
    />
    
    <div class="flex md:justify-center relative">
        <form class="justify-center my-10 mx-4"action="{{ route('editPromotion.update', $promotion) }}" method="POST">

            @csrf
            @method('put')

            <div class="mb-6">
                <label for="name" class="block mb-2 text-medium font-medium">Nombre</label>
                <input type="text" id="name" name="name" value="{{$promotion->name}}"
                    class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5"
                    placeholder="Nombre ">
            </div>
            <div class="mb-6">

                <label for="formador" class="block mb-2 text-medium font-medium">Formador</label>
                <select id="formador" name="trainer"
                    class="bg-white border border-orange-600  text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5">
                    <option selected>Formador</option>
                    <option value="Manuela">Manuela </option>
                    <option value="Gabriela">Gabriela</option>
                    <option value="Diego">Diego</option>
                    <option value="Pedro">Pedro</option>
                </select>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-6">
                    <label for="fecha_inicio" class="block mb-2 text-medium font-medium"> Fecha de inicio</label>
                    <input type="date" name="start_date" value="{{$promotion->start_date}}"
                        class="bg-white border border-orange-600 placeholder-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5">
                </div>

                <div class="mb-6">
                    <label for="fecha_inicio" class="block mb-2 text-medium font-medium"> Fecha de Fin</label>
                    <input type="date" value="{{$promotion->end_date}}"
                        name="end_date"class="bg-white border border-orange-600 placeholder-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5">
                </div>
            </div>

            <div>
                <p class="text-medium font-medium mb-6">Selecciona las habilidades</p>
                <div class="bg-white border border-orange-600 text-medium rounded-lg focus:ring-orange-600 focus:border-orange-600 flex flex-col w-full p-2.5">
                    @foreach ($topics as $topic)
                        <label for="{{ $topic->id }}">
                            <input type="checkbox" id="{{ $topic->id }}" name="topics[]" value="{{ $topic->id }}">
                            {{ $topic->name }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div id="new-topic-input" style="display: none;">
                <label for="new-topic">New topic:</label>
                <input type="text" name="new_topic" id="new-topic">
            </div>

            <br><br>

            <div class="mb-6">
                <label for="fecha_1" class="block mb-2 text-medium font-medium"> Fecha de evaluacion 1</label>
                <input type="date" value="{{$promotion->evaluation1}}"
                    name="evaluation1"class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5">
            </div>
            <div class="mb-6">
                <label for="fecha_2" class="block mb-2 text-medium font-medium"> Fecha de evaluacion 2</label>
                <input type="date" value="{{$promotion->evaluation2}}"
                    name="evaluation2"class="bg-white border border-orange-600  text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5">
            </div>
            <div class="mb-6">
                <label for="fecha_3" class="block mb-2 text-medium font-medium"> Fecha de evaluacion 3</label>
                <input type="date" value="{{$promotion->evaluation3}}"
                    name="evaluation3"class="bg-white border border-orange-600  text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5">
            </div>
            <div class="mb-6">
                <label for="fecha_4" class="block mb-2 text-medium font-medium"> Fecha de evaluacion 4</label>
                <input type="date" value="{{$promotion->evaluation4}}"
                    name="evaluation4"class="bg-white border border-orange-600  text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5">
            </div>
            <div class="mb-6">
                <label for="url_1" class="block mb-2 text-medium font-medium">Zoom Url</label>
                <input type="text" id="zoom_url" name="zoom_url" value="{{$promotion->zoom_url}}"
                    class="bg-white border border-orange-600  text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5"
                    placeholder="Introducir Url Zoom">
                <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">
            </div>
            <div class="mb-6">
                <label for="url_2" class="block mb-2 text-medium font-medium">Slack Url</label>
                <input type="text" id="slack_url" name="slack_url" value="{{$promotion->slack_url}}"
                    class="bg-white border border-orange-600  text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5"
                    placeholder="Introducir Url Slack">
                <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">
            </div>
            <button type="submit"
                class="text-white w-80 justify-around text-base mt-10  ml-4 md:ml-2 bg-orange-600 hover:bg-orange-600/80 focus:ring-4 focus:outline-none focus:ring-[orange-600]/50 rounded-lg  px-0.5 py-4 inline-flex ">
                <p class="no-underline text-white">Editar bootcamp</p>
            </button>
        </form>
        <div class="absolute -bottom-11">
            <button
                class="text-white w-80 justify-around text-base my-6  ml-3 bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 rounded-lg  px-0.5 py-2 inline-flex ">
                <p class="no-underline text-white" href="{{route('trainer.promotions')}}">Cancelar</p>
            </button>
        </div>      
    </div>


    <script>
        const selectElement = document.getElementById('topics');
        const newTopicInput = document.getElementById('new-topic-input');

        selectElement.addEventListener('change', () => {
            const selectedValue = selectElement.value;
            if (selectedValue === '') {
                newTopicInput.style.display = 'block';
            } else {
                newTopicInput.style.display = 'none';
            }
        });
    </script>
@endsection
