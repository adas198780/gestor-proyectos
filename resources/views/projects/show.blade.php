<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $project->title }}</h2>
            <a href="{{ route('projects.edit', $project) }}"
               class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Editar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 shadow sm:rounded-lg space-y-2">
                <p class="text-gray-700">{{ $project->description ?? 'Sin descripción.' }}</p>
                <p class="text-sm text-gray-500">Propietario: {{ $project->owner->name }}</p>
                <p class="text-sm text-gray-500">Estado: {{ $project->status }}</p>
                <p class="text-sm text-gray-500">Fecha límite: {{ $project->deadline ?? 'Sin fecha' }}</p>
            </div>

            <form method="POST" action="{{ route('projects.destroy', $project) }}"
                  onsubmit="return confirm('¿Eliminar este proyecto?')">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 bg-red-600 text-white rounded-md text-sm">Eliminar proyecto</button>
            </form>

            <a href="{{ route('projects.index') }}" class="text-sm text-gray-500 underline">Volver a la lista</a>
        </div>
    </div>
</x-app-layout>