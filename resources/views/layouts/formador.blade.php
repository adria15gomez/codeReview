<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    @php
        $links = [['url' => '/coders', 'title' => 'Coders'], ['url' => '/promociones', 'title' => 'Bootcamps'], ['url' => '/topic', 'title' => 'Topics']];
    @endphp
    @include('components.navbar', ['links' => $links])
    <section class="min-h-screen">
        @yield('content')
    </section>
    @include('components.footer')
</body>

</html>
