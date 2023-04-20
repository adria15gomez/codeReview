<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/login.css', 'resources/js/app.js'])
    <title>Login</title>

    {{-- Importando la fuente Poppins en las series Regular, Medium, Bold y Light --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="flex items-center justify-center h-screen">
        <div class="p-8 max-w-4xl w-full">
            <img src="img\whiteLogo.svg" alt="logo" class="w-60 mx-auto my-auto mb-20">
            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-white">Correo electrónico</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Escribe tu email" required>
                    @error('email')
                        <p class="mt-2 text-black">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-white">Contraseña</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Escribe tu contraseña" required>
                    @error('password')
                        <p class="mt-2 text-black">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="text-white bg-zinc-900 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center flex justify-center md:justify-center xl:justify-center md:w-full xl:w-full">Iniciar
                    sesión</button>
            </form>
            <p class="mb-2 mt-5 text-sm font-regular text-white xl:ml-0 flex justify-center">
                ¿Aún no tienes una cuenta?
                <a href="{{ route('register') }}" class="text-sm ml-1 font-semibold text-black">Regístrate</a>
            </p>
        </div>
    </section>
</body>

</html>
