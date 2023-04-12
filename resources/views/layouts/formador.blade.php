<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Para que el título se pueda modificar en cada view --}}
        <title>@yield('title')</title>

        {{-- Importando la fuente Poppins en las series Regular, Medium, Bold y Light --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>

    <body>
        {{-- Pasamos un array de los links que va a tener el navbar para el layout para las vistas de coder --}}
        @php
            $links = [
                ['url' => '/coders', 'title' => 'Coders'],
                ['url' => '/bootcamps', 'title' => 'Bootcamps'],
                ['url' => '/topics', 'title' => 'Topics']
            ];
        @endphp

        {{-- Importamos el componente Navbar y pasamos el array de links como parámetro --}}
        @include('components.navbar', ['links' => $links])

        {{-- Aqui va a ir el contenido de la vista --}}

            @yield('content')
           

        {{-- Importamos el componente footer --}}
        @include('components.footer')
    </body>
</html>