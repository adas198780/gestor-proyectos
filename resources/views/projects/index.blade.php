<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Proyectos</h2>
            <a href="{{ route('projects.create') }}"
               class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Nuevo proyecto</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($projects as $project)
                <div class="bg-white p-6 shadow sm:rounded-lg">
                    <h3 class="font-semibold text-lg">{{ $project->title }}</h3>
                    <p class="text-sm text-gray-500">Propietario: {{ $project->owner->name }}</p>
                    <p class="text-sm text-gray-500">Estado: {{ $project->status }}</p>
                </div>
            @empty
                <p class="text-gray-500">Todavía no hay proyectos.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>