@extends('layouts.formador')

{{-- Hay que ponerle funcionalidad, a poder ser, sin tocar los estilos --}}
@section('content')
<div class="flex flex-col items-center justify-center">
    <h1 class="font-regular text-3xl text-center mt-5">Editar Bootcamp</h1>
    <img src="{{('../img/trainer/agregareditarbootcamp.svg')}}"alt="bootcamp"
        class="h-50 xl:h-80 mt-5" />
    <div>
        <form class="justify-center my-10 mx-4" action="{{ route('editPromotion.update', $promotion) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="name" class="block mb-2 text-medium font-medium">Nombre</label>
                <input type="text" id="name" name="name" class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" value="{{$promotion->name}}" placeholder="Nombre" />
            </div>
            
            <div class="mb-6">
                <label for="trainer" class="block mb-2 text-medium font-medium">Formador/a</label>
                <select id="trainer" name="trainer"
                    class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5">
                    <option selected>Formador/a</option>
                    {{-- @foreach ($users as $user)
                        <option value="{{$user->name}}">{{$user->name}}</option>
                    @endforeach --}}
                </select>
            </div>

            <div class="mb-6">
                <label for="fecha_inicio" class="block mb-2 text-medium font-medium">Fecha inicio</label>
                <input type="date" name="start_date" class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="Fecha inicio" />
            </div>

            <div class="mb-6">
                <label for="fecha_inicio" class="block mb-2 text-medium font-medium">Fecha fin</label>
                <input type="date" name="end_date" class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="Fecha inicio" />
            </div>

            <div>
                <p class="block mb-2 text-medium font-medium">Selecciona las habilidades</p>
                <div class="mb-6 bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 flex flex-col w-full p-2.5">
                    {{-- @foreach ($topics as $topic)
                    <label for="{{ $topic->id }}">
                        <input type="checkbox" id="{{ $topic->id }}" name="topics[]" value="{{ $topic->id }}">{{ $topic->name }}</label>
                    @endforeach --}}
                </div>
            </div>
            <div id="new-topic-input" style="display: none;">
                <label for="new-topic">New topic:</label>
                <input type="text" name="new_topic" id="new-topic">
            </div>

            <div class="mb-6">
                <label for="fecha_1" class="block mb-2 text-medium font-medium">Fecha evaluación 1</label>
                <input type="date" name="evaluation1" class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="Fecha inicio" />
            </div>
            
            <div class="mb-6">
                <label for="fecha_2" class="block mb-2 text-medium font-medium">Fecha evaluación 2</label>
                <input type="date" name="evaluation2" class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="Fecha inicio" />
            </div>
            
            <div class="mb-6">
                <label for="fecha_3" class="block mb-2 text-medium font-medium">Fecha evaluación 3</label>
                <input type="date" name="evaluation3" class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="Fecha inicio" />
            </div>

            <div class="mb-6">
                <label for="fecha_4" class="block mb-2 text-medium font-medium">Fecha evaluación 4</label>
                <input type="date" name="evaluation4" class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="Fecha inicio" />
            </div>

            <div class="mb-6">
                <label for="url_1" class="block mb-2 text-medium font-medium">Zoom URL</label>
                <input type="text" name="zoom_url" id="zoom_url" class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="Introducir la URl de Zoom" />
            </div>

            <div class="mb-6">
                <label for="url_2" class="block mb-2 text-medium font-medium">Slack URL</label>
                <input type="text" name="slack_url" id="slack_url" class="bg-white border border-orange-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="Introducir la URl de Slack" />
            </div>

            <button type="submit" class="bg-orange-600 text-white text-sm font-light py-2 px-10 rounded-lg mx-auto block hover:bg-black">
                <p class="no-underline">Agregar bootcamp</p>
            </button>
        </form>
        <div>
            <button class="bg-gray-900 text-white text-sm font-light py-2 rounded-lg mx-auto block text-center w-40 hover:bg-black">
                <a class="no-underline" href="{{ route('trainer.promotions') }}">Cancelar</a>
            </button>
        </div>
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