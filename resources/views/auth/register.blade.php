<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/register.css', 'resources/js/app.js'])
    <title>Register</title>

    {{-- Importando la fuente Poppins en las series Regular, Medium, Bold y Light --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 max-w-4xl w-full">
            <img src="img\orangeLogo.svg" alt="logo" class="w-60 mx-auto my-auto mb-20">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-6">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-black dark:text-white">Nombre</label>
                    <input type="text" id="nombre" name="name"
                        class="bg-gray-50 border-2 border-solid border-orange-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Escribe tu nombre" required>
                </div>
                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-black dark:text-white">Email</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border-2 border-solid border-orange-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Escribe tu email" required>
                </div>
                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-black dark:text-white">Contraseña</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border-2 border-solid border-orange-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Escribe tu contraseña" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-black dark:text-white">Repite tu
                        contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="bg-gray-50 border-2 border-solid border-orange-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Repite tu contraseña" required>
                </div>
                <button type="submit"
                    class="text-white bg-gray-900 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    href="{{ route('login') }}">Registrarse</button>
            </form>
            <p class="block mb-2 mt-5 ml-8 text-sm font-regular text-black">¿Ya tienes una cuenta?<a
                    href="{{ route('login') }}" class="text-sm ml-1 font-semibold text-orange-600">Inicia Sesión</a></p>
        </div>
    </section>
</body>

</html>
