<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor de proyectos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <header class="max-w-6xl mx-auto px-6 py-6 flex justify-between items-center">
        <span class="text-xl font-bold">Gestor de proyectos</span>

        <nav class="flex items-center gap-4 text-sm">
            @auth
                <a href="{{ route('projects.index') }}"
                   class="px-4 py-2 bg-gray-800 text-white rounded-md">Mis proyectos</a>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Iniciar sesión</a>
                <a href="{{ route('register') }}"
                   class="px-4 py-2 bg-gray-800 text-white rounded-md">Registrarse</a>
            @endauth
        </nav>
    </header>

    <main>
        <section class="max-w-4xl mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight">
                Organiza tus proyectos y trabaja en equipo
            </h1>
            <p class="mt-6 text-lg text-gray-600">
                Crea proyectos, invita a otras personas, asígnales un rol y lleva la cuenta
                de las horas que dedica cada una.
            </p>

            <div class="mt-10 flex justify-center gap-4">
                @auth
                    <a href="{{ route('projects.index') }}"
                       class="px-6 py-3 bg-gray-800 text-white rounded-md">Ir a mis proyectos</a>
                @else
                    <a href="{{ route('register') }}"
                       class="px-6 py-3 bg-gray-800 text-white rounded-md">Crear una cuenta</a>
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 border border-gray-300 rounded-md">Ya tengo cuenta</a>
                @endauth
            </div>
        </section>

        <section class="max-w-6xl mx-auto px-6 pb-20 grid gap-6 md:grid-cols-3">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-semibold text-lg">Proyectos</h3>
                <p class="mt-2 text-gray-600 text-sm">
                    Define un título, una descripción, una fecha límite y el estado de cada proyecto.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-semibold text-lg">Equipos con roles</h3>
                <p class="mt-2 text-gray-600 text-sm">
                    Añade usuarios a tus proyectos como desarrolladores, diseñadores, testers…
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-semibold text-lg">Control de horas</h3>
                <p class="mt-2 text-gray-600 text-sm">
                    Anota cuántas horas ha dedicado cada participante a cada proyecto.
                </p>
            </div>
        </section>
    </main>

    <footer class="text-center text-sm text-gray-400 pb-8">
        Práctica final de Laravel · DWES
    </footer>
</body>
</html>