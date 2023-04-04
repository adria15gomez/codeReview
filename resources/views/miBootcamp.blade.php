@extends('layouts.coder')

@section('content')

<main  class=" mr-5 mt-2 py-4 px-2">
    <h1 class="font-semibold text-4xl pt-0 ml-2 pl-2">Mi bootcamp</h1>
    <h2 class="font-semibold text-orange-600 text-4xl dark:text-orange-600 pt-6 ml-2 pl-2">FemCoders Norte</h2>
<div>
    <img  src="img/coder/mibootcamp.svg" alt=" bootcamp"  class="w-full h-60 object-cover rounded-lg sm:h-52 sm:col-span-2 lg:col-span-full" loading="lazy" />
</div>
<div class="mr-5 mt-2 py-4 px-2">
    <p><strong>Formador:</strong> Monica Álvarez</p>
    <p><strong>Fecha de inicio:</strong> 09/10/22</p>
    <p><strong>Fecha de fin:</strong> 25/04/23</p>
</div>

<div class="items-center mx-0">
    <button type="button " class="text-white m-2 bg-[#111827] hover:bg-[#111827]/80 focus:ring-4 focus:outline-none focus:ring-[#111827]/50 font-medium rounded-lg text-sm px-5 py-2.5  text-center inline-flex items-center dark:hover:bg-[#111827]/40 dark:focus:ring-gray-600 mr-2 mb-2">
    Zoom
    <svg class="inline-flex items-center justify-end w-8 h-5 ml-60 -mr-1" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="zoom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V384c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1V320 192 174.9l14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z"/></svg>
    </button>

    <button type="button" class="text-white m-2 bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
    Slack
    <svg class="inline-flex items-center justify-end w-8 h-5 ml-60 -mr-1" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="slack" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M94.12 315.1c0 25.9-21.16 47.06-47.06 47.06S0 341 0 315.1c0-25.9 21.16-47.06 47.06-47.06h47.06v47.06zm23.72 0c0-25.9 21.16-47.06 47.06-47.06s47.06 21.16 47.06 47.06v117.84c0 25.9-21.16 47.06-47.06 47.06s-47.06-21.16-47.06-47.06V315.1zm47.06-188.98c-25.9 0-47.06-21.16-47.06-47.06S139 32 164.9 32s47.06 21.16 47.06 47.06v47.06H164.9zm0 23.72c25.9 0 47.06 21.16 47.06 47.06s-21.16 47.06-47.06 47.06H47.06C21.16 243.96 0 222.8 0 196.9s21.16-47.06 47.06-47.06H164.9zm188.98 47.06c0-25.9 21.16-47.06 47.06-47.06 25.9 0 47.06 21.16 47.06 47.06s-21.16 47.06-47.06 47.06h-47.06V196.9zm-23.72 0c0 25.9-21.16 47.06-47.06 47.06-25.9 0-47.06-21.16-47.06-47.06V79.06c0-25.9 21.16-47.06 47.06-47.06 25.9 0 47.06 21.16 47.06 47.06V196.9zM283.1 385.88c25.9 0 47.06 21.16 47.06 47.06 0 25.9-21.16 47.06-47.06 47.06-25.9 0-47.06-21.16-47.06-47.06v-47.06h47.06zm0-23.72c-25.9 0-47.06-21.16-47.06-47.06 0-25.9 21.16-47.06 47.06-47.06h117.84c25.9 0 47.06 21.16 47.06 47.06 0 25.9-21.16 47.06-47.06 47.06H283.1z"></path></svg>
    </button>
</div>

<div>
    <h3 class="font-semibold text-2xl pt-0 ml-2 pl-2">Lista de Topics</h3><br>
    <p><strong>Frontend:</strong> HTML, CSS, JavaScript </p>
    <p><strong>Backend:</strong> PHP,MySQL</p>
    <p><strong>Trasversales:</strong> Agile, Atomic Desing</p>
</div>
</main>
@endsection


